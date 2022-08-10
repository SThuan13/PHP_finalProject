<?php
  
require_once('app/Controllers/Admin/BackendController.php');
//require_once('app/Requests/Admin/CreateUpdateCategoryRequest.php');
require_once('app/Models/Category.php');
require_once('core/Flash.php');
// require_once('core/Auth.php');

class CategoryController extends BackendController
{
  public function index()
  {
    $categories = new Category();
    $sql = "SELECT * FROM categories";
    $categories =  $categories->getAll($sql);
    require_once('views/admin/category/list.php') ;
  }

  public function detail()
  {
    $id = $_GET['id'];
    $category = new Category();
    $sql = "SELECT * from categories where (id = $id) ";
    $category =  $category->getFirst($sql);
    
    require_once('views/admin/category/form.php') ;
  }

  public function create()
  {
    require_once('views/admin/category/form.php') ;
  }
  
  public function handleCreate()
  {
    // $cruRequest = new CreateUpdateCategoryRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
      try 
      {
        $category = new Category();
        if ( $category->create($_POST) )
        { 
            Flash::set('success', 'Tạo danh mục thành công!');
        }
        else {
          throw new Exception('Tạo danh mục không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/category/create' );
      }
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
    try 
    {
      $category = new Category();
      if ( $category->update($_POST, $_POST['id']) )
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
      return redirect('admin/category/create' );
    }
    // }
    // else 
    // {
    //   return redirect('admin/category/create');
    // }
  }

  
}
?>