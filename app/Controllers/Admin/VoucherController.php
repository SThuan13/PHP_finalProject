<?php
  
require_once('app/Controllers/Admin/BackendController.php');
//require_once('app/Requests/Admin/CreateUpdateCategoryRequest.php');
require_once('app/Models/Voucher.php');
require_once('core/Flash.php');
// require_once('core/Auth.php');

class VoucherController extends BackendController
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
    $vouchers = new Voucher();
    $sql = "SELECT * 
            FROM vouchers
            LIMIT $this->take OFFSET $this->offSet";
    $vouchers =  $vouchers->getAll($sql);

    return $this->view('voucher/list.php', compact('vouchers', 'page', 'take')) ;
  }

  public function detail()
  {
    // $id = $_GET['id'];
    // $category = new Category();
    // $category =  $category->find($id);
    
    return $this->view('voucher/form.php', compact('voucher')) ;
  }

  public function create()
  {
    return $this->view('voucher/form.php') ;
  }
  
  public function handleCreate()
  {
    // $cruRequest = new CreateUpdateCategoryRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
      // try 
      // {
      //   $category = new Category();
      //   if ( $category->create($_POST) )
      //   { 
      //       Flash::set('success', 'Tạo danh mục thành công!');
      //   }
      //   else {
      //     throw new Exception('Tạo danh mục không thành công!');
      //   }
      // }
      // catch (Exception $e)
      // {
      //   Flash::set('error', $e->getMessage());
      // }
      // finally
      // {
      //   return redirect('admin/category/create' );
      // }
    // }
    // else 
    // {
    //   return redirect('admin/category/create');
    // }
  }

  public function handleUpdate()
  {
    // $cruRequest = new CreateUpdateCategoryRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
    // try 
    // {
    //   $category = new Category();
    //   if ( $category->update($_POST, $_POST['id']) )
    //   { 
    //       Flash::set('success', 'Chỉnh sửa danh mục thành công!');
    //   }
    //   else {
    //     throw new Exception('Chỉnh sửa danh mục không thành công!');
    //   }
    // }
    // catch (Exception $e)
    // {
    //   Flash::set('error', $e->getMessage());
    // }
    // finally
    // {
    //   return redirect('admin/category/detail', ['id'=>$_POST['id']]);
    // }
    // }
    // else 
    // {
    //   return redirect('admin/category/create');
    // }
  }

  
}
?>