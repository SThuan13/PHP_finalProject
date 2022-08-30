<?php
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/Admin/BrandRequest.php');
require_once('app/Models/Brand.php');
require_once('core/Flash.php');
require_once('core/Storage.php');
require_once('core/Auth.php');

class brandController extends BackendController
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

    $brands = new brand();
    $sql = "SELECT * 
            FROM brands
            LIMIT $this->take OFFSET $this->offSet";
    $brands =  $brands->getAll($sql);

    return $this->view('brand/list.php', compact('brands', 'page', 'take')) ;
  }

  public function detail()
  {
    $id = $_GET['id'];
    $brand = new Brand();
    $brand =  $brand->find($id);
    
    return $this->view('brand/form.php', compact('brand')) ;
  }

  public function create()
  {
    return $this->view('brand/form.php') ;
  }
  
  public function handleCreate()
  {
    $request = new brandRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
      try 
      {
        $this->handleUploadImages();
        $brand = new brand();

        if ( $brand->create($_POST) )
        { 
            Flash::set('success', 'Tạo nhãn hiệu thành công!');
        }
        else {
          throw new Exception('Tạo nhãn hiệu không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/brand/create' );
      }
    }
    else 
    {
      return redirect('admin/brand/create');
    }
  }

  public function handleUpdate()
  {
    $request = new brandRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
      try 
      {
        $this->handleUpdateImages();
        $brand = new brand();
        if ( $brand->update($_POST, $_POST['id']) )
        { 
            Flash::set('success', 'Chỉnh sửa nhãn hiệu thành công!');
        }
        else {
          throw new Exception('Chỉnh sửa nhãn hiệu không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/brand/detail', ['id'=>$_POST['id']]);
      }
    }
    else 
    {
      return redirect('admin/brand/create');
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

  
}
?>