<?php
  
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('core/Flash.php');
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

    //dd(count($products));
    //echo $page;
    return $this->view('product/list.php', compact('products','page','take')) ;
    
  }

  public function detail()
  {
    $id = $_GET['id'];
    $product = new Product();
    $product = $product->find($id);
    
    $categories = new Category();
    $categories = $categories->findAll();

    return $this->view('product/form.php', compact('product', 'categories')) ;
  }

  public function create()
  {
    $categories = new Category();
    $categories = $categories->findAll();
    return $this->view('product/form.php', compact('categories'));
  }
  
  public function handleCreate()
  {
    // $cruRequest = new CreateUpdateUserRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
      $product = new Product();
      try 
      {
        if ($_POST['category_id'] == 0 ){ $_POST['category_id'] = null; } 
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
    // }
    // else 
    // {
    //   return redirect('admin/user/create');
    // }
  }

  public function handleUpdate()
  {
    try 
    {
      $product = new Product();
      if ( $product->update($_POST, $_POST['id']) )
      { 
          Flash::set('success', 'Chỉnh sửa danh mục thành công!');
      }
      else {
        throw new Exception('Chỉnh sửa danh mục không thành công!');
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
      return redirect('admin/product/list');
    }
  }
}
?>