<?php
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/Admin/CategoryRequest.php');
require_once('app/Models/Category.php');
require_once('core/Flash.php');
// require_once('core/Auth.php');

class CategoryController extends BackendController
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

    $categories = new Category();
    $sql = "SELECT * 
            FROM categories 
            LIMIT $this->take OFFSET $this->offSet";
    $categories =  $categories->getAll($sql);

    return $this->view('category/list.php', compact('categories', 'page', 'take')) ;
  }

  public function detail()
  {
    $id = $_GET['id'];
    $category = new Category();
    $category =  $category->find($id);
    
    return $this->view('category/form.php', compact('category')) ;
  }

  public function create()
  {
    return $this->view('category/form.php') ;
  }
  
  public function handleCreate()
  {
    $request = new categoryRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
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
    }
    else 
    {
      return redirect('admin/category/create');
    }
  }

  public function handleUpdate()
  {
    $request = new categoryRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
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
        return redirect('admin/category/detail', ['id'=>$_POST['id']]);
      }
    }
    else 
    {
      return redirect('admin/category/detail', ['id'=>$_POST['id']]);
    }
  }

  
}
?>