<?php
  
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('app/Models/Brand.php');
require_once('app/Requests/Admin/ProductRequest.php');
require_once('core/Flash.php');
require_once('core/Storage.php');
require_once('core/Auth.php');

class ProductController extends BackendController
{
  protected $page = 1, $take = 10, $offSet;

  public function pagination()
  {
    if(isset($_GET['page']))
    {
      if ($_GET['page'] > 0)
      {
        $this->page = $_GET['page'];
      }
      else {$this->page = 1;}
    }
    else 
    {
      $this->page = 1;
    }

    if(isset($_POST['take']))
    {
      $this->take = $_POST['take'];
    }
    else 
    {
      $this->take = 10;
    }
    $page = $this->page;
    $this->offSet = ($page - 1) * $this->take;
  }

  public function index()
  {
    $this->pagination();
    $page = $this->page;
    $take = $this->take;

    $products = new Product();
    $sql = "SELECT * 
            from products 
            LIMIT $this->take OFFSET $this->offSet";
    $products = $products->getAll($sql);
    return $this->view('product/list.php', compact('products','page','take')) ;
    
  }

  public function detail()
  {
    $id = $_GET['id'];
    $product = new Product();
    $product = $product->find($id);
    
    $categories = new Category();
    $categories = $categories->findAll();

    $brands = new Brand();
    $brands = $brands->findAll();


    return $this->view('product/form.php', compact('product', 'categories','brands')) ;
  }

  public function create()
  {
    $categories = new Category();
    $categories = $categories->findAll();
    $brands = new Brand();
    $brands = $brands->findAll();

    return $this->view('product/form.php', compact('categories','brands'));
  }
  
  public function handleCreate()
  {
    //dd($_POST);
    $request = new productRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
      //dd(1);
      $product = new Product();
      //$product->create($_POST);
      //dd($product->create($_POST));
      //dd($_POST);
      try 
      {
        $this->handleUploadImages();
        //if ($_POST['category_id'] == 0 ){ $_POST['category_id'] = null; } 

        if ( $product->create($_POST) )
        { 
            Flash::set('success', 'Tạo sản phẩm thành công!');
        }
        else {
          throw new Exception('Tạo sản phẩm không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/product/create' );
      }
    }
    else 
    {
      return redirect('admin/product/create');
    }
  }

  public function handleUploadImages()
  {
    $storage = new Storage();
    $storage->upload('images', $_FILES);

    $image = array();
    $index = 0;
    //$count = count($_FILES['upload']['name']);
    foreach( $_FILES['upload']['name'] as $item)
    {
      $image += array($index=>"images/$item");
      $index += 1;
    }

    $_POST['img'] = json_encode($image);
  }

  public function handleUpdateImages()
  {
    if(empty($_FILES))
    {
      unset($_POST['img']);
    }
    else
    {
      $this->handleUploadImages();
    }
  }

  public function handleUpldate()
  {
    dd(1);
    $request = new productRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
      try 
      {
        $this->handleUpdateImages();
        $product = new Product();
        if ( $product->update($_POST, $_POST['id']) )
        { 
            Flash::set('success', 'Chỉnh sửa sản phẩm thành công!');
        }
        else {
          throw new Exception('Chỉnh sửa sản phẩm không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/product/detail', ['id'=>$_POST['id']]);
      }
    }
    else 
    {
      return redirect('admin/product/detail', ['id'=>$_POST['id']]);
    }
  }

  public function handleDelete()
  {
    $id = $_GET['id'];
    try 
    {
      $product = new Product();
      if ( $product->delete($id) )
      {
        Flash::set('success', 'Xoá sản phẩm thành công!');
      }
      else
      {
        throw new Exception('Xóa sản phẩm không thành công!');
      }
    }
    catch (Exception $e)
    {
      Flash::set('error', $e->getMessage());
    }
    finally
    {
      return redirect('admin/product');
    }
  }
}
?>