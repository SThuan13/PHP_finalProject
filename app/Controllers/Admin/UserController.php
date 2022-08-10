<?php
  
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/Admin/CreateUpdateUserRequest.php');
require_once('app/Models/User.php');
require_once('app/Models/UserDetail.php');
require_once('app/Models/role.php');
require_once('core/Flash.php');
// require_once('core/Auth.php');

class UserController extends BackendController
{
  public function index()
  {
    $users = new User();
    $sql = "SELECT users.id, account_name, email, roles.name as role_name from users, roles where users.role_id = roles.id";
    $users =  $users->getAll($sql);
    require_once('views/admin/user/list.php') ;
  }

  public function detail()
  {
    $id = $_GET['id'];
    $user = new User();
    $sql = "SELECT * from users where (users.id = $id) ";
    $user =  $user->getFirst($sql);

    $userID = $user['id'];
    $userDetail = new UserDetail();
    $sql= "SELECT * FROM user_details WHERE user_id = $userID ";
    $userDetail = $userDetail->getFirst($sql);
    
    $roles = new Role();
    $sql = "SELECT * FROM roles";
    $roles = $roles->getAll($sql);

    // print_r($user);
    // print_r($userDetail);
    // die();
    require_once('views/admin/user/form.php') ;
  }

  public function create()
  {
    $roles = new Role;
    $sql = "SELECT * FROM roles";
    $roles = $roles->getAll($sql);
    require_once('views/admin/user/form.php') ;
  }
  
  public function handleCreate()
  {
    $cruRequest = new CreateUpdateUserRequest();
    $errors = $cruRequest->validateCreateUpdate($_POST);
    if( $errors )
    {
      $user = new User();
      $_POST['password'] = md5($_POST['password']);
      try 
      {
        if ( $user->create($_POST) )
        {
          $user = $user->getId($_POST);

          $userDetail = new UserDetail() ;

          $details['user_id'] = $user['id'];
          //
          if($_POST['name'] != '' ){ $details['name'] = $_POST['name']; }
          if($_POST['identification_number'] != '' ) { $details['identification_number'] = $_POST['identification_number']; }
          if($_POST['phone_number'] != '' ) { $details['phone_number'] = $_POST['phone_number']; }
          if($_POST['phone_number'] != '' ) { $details['address'] = $_POST['address']; }
          // print_r($user['id']);
          // die();
          if( $userDetail->create($details) )
          { 
            Flash::set('success', 'Tạo tài khoản thành công!');
          }
          else {
            throw new Exception('Tạo thông tin người dùng không thành công!');
          }
        }
        else {
          throw new Exception('Tạo tài khoản không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/user/create' );
      }
    }
    else 
    {
      return redirect('admin/user/create');
    }
  }

  public function handleUpdate()
  {
    //print_r($_POST);
    // $_POST['user_id'] = $_POST['id'];
    // $userDetail = new UserDetail() ;
    // $user_id = $userDetail->getId($_POST);
    // print_r($user_id['id']);
    //die();
    $user = new User();
    $_POST['password'] = md5($_POST['password']);
    try 
    {
      if ( $user->update($_POST, $_POST['id']) )
      {
        $userDetail = new UserDetail() ;

        $_POST['user_id'] = $_POST['id'];

        $user_id = $userDetail->getId($_POST);
        //
        $details['user_id'] = $_POST['user_id'];
        ($_POST['name'] == '' ) ? $details['name']= NULL : $details['name'] = $_POST['name'] ;
        ($_POST['identification_number'] == '' ) ? $details['identification_number'] = NULL : $details['identification_number'] = $_POST['identification_number']; 
        ($_POST['phone_number'] == '' ) ? $details['phone_number'] = NULL : $details['phone_number'] = $_POST['phone_number']; 
        ($_POST['phone_number'] == '' ) ? $details['address'] = NULL : $details['address'] = $_POST['address']; 
        // 
        //print_r($details);
        //die();
        if( $userDetail->update($details, $user_id['id']) )
        { 
          Flash::set('success', 'Sửa tài khoản thành công!');
        }
        else {
          throw new Exception('Sửa tài khoản không thành công!');
        }
      }
      else {
        throw new Exception('Sửa tài khoản không thành công!');
      }
    }
    catch (Exception $e)
    {
      Flash::set('error', $e->getMessage());
    }
    finally
    {
      return redirect('admin/user/detail', ['id'=>$_POST['id']] );
    }
  }

  
}
?>