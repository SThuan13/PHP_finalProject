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
    $user = new User();
    $sql = "SELECT users.id, account_name, email, roles.name as role_name from users, roles where users.role_id = roles.id";
    $user =  $user->getAll($sql);

    //print_r($user);
    // echo $user['id'];
    require_once('views/admin/user/list.php') ;
  }

  public function detail()
  {
    $id = $_GET['id'];
    // echo $id;
    // die();
    $user = new User();
    //$sql = "SELECT * FROM users";
    $sql = "SELECT users.id, account_name, password, user_details.name, identification_number, phone_number, user_details.address ,email, role_id, roles.name as role_name from users, roles, user_details where (users.id = $id) AND (users.role_id = roles.id) And ($id = user_details.user_id)";
    //echo $sql;
    $user =  $user->getFirst($sql);

    
    $role = new Role;
    $sql = "SELECT * FROM roles";
    $role = $role->getAll($sql);
    //print_r($user);
    //die();
    require_once('views/admin/user/detail.php') ;
  }

  public function create()
  {
    $role = new Role;
    $sql = "SELECT * FROM roles";
    $role = $role->getAll($sql);
    require_once('views/admin/user/form.php') ;
  }
  
  public function handleCreate()
  {
    $user = new User();
    $_POST['password'] = md5($_POST['password']);
      // if ( $user->create($_POST) )
      // {
      //   print_r($_POST);
      //   $userDetail = new UserDetail() ;

      //   if( $userDetail->create($_POST) )
      //   { 
      //     Flash::set('error', 'Tạo tài khoản thành công!');
      //     return redirect('admin/user/form' );
      //   }
      //   else {
      //     Flash::set('error', 'Tạo tài khoản không thành công!');
      //   return redirect('admin/user/create' );
      //   }
      // }
      // else {
      //   Flash::set('error', 'Tạo tài khoản không thành công!');
      //   return redirect('admin/user/create' );
      // }
    try 
    {
      if ( $user->create($_POST) )
      {
        $userDetail = new UserDetail() ;
        if( $userDetail->create($_POST) )
        { 
          Flash::set('error', 'Tạo tài khoản thành công!');
        }
        else {
          throw new Exception('Tạo tài khoản không thành công!');
        }
      }
      else {
        throw new Exception('Tạo tài khoản không thành công!');
      }
    }
    catch (Exception $e)
    {
      Flash::set('error', 'Tạo tài khoản không thành công!'.$e->getMessage());
    }
    finally
    {
      return redirect('admin/user/create' );
    }
  }

  public function handleUpdate()
  {
    //echo "Xử lý create update";
    // $CreateUpdateUserRequest = new CreateUpdateUserRequest();
    // $errors = $CreateUpdateUserRequest->validateCreateUpdate($_POST);
    // if( count($errors) == 0 )
    // {
    //   $user = new User();
    //   $user = $user->update($_POST, $id);
      
    //   if ( $user )
    //   {
    //     Auth::setUser('user', $user);
    //     return redirect('admin/user/detail');
    //   }

    //   Flash::set('error', 'Đăng nhập thất bại!');
    //   return redirect('admin/user/detail' );
      
    // }
    // return redirect('admin/user/detail', ['errors' => $errors] );
    //return $this->view('user/detail.php', ['errors' => $errors]);
    //return $this->view('auth/register.php');
  }

  
}
?>