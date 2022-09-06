<?php
  
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/Admin/AuthRequest.php');
require_once('app/Models/User.php');
require_once('core/Flash.php');
require_once('core/Auth.php');

class AuthController extends BackendController
{
  public function login()
  {
    return $this->view('auth/login.php');
  }

  public function register()
  {
    return $this->view('auth/register.php');
  }

  public function handleRegister()
  {
    // $authRequest = new AuthRequest();
    // $errors = $authRequest->validateRegister($_POST);
    // if( count($errors) == 0 )
    // {
    //   $user = new User();
    //   $_POST['role_id'] = 1;
    //   $isCreated = $user->create($_POST);
    //   if( $isCreated )
    //   {
    //     return redirect('admin/auth/login');
    //   }
    // }

    // return $this->view('auth/login.php', ['errors' => $errors]);
  }


  public function handleLogin()
  {
    $authRequest = new AuthRequest();
    $errors = $authRequest->validateLogin($_POST);
    if( count($errors) == 0 )
    {
      $user = new User();
      $user = $user->authenticate($_POST,1);
      
      if ( $user )
      {
        Auth::setUser('user', $user);
        return redirect('admin/dashboard/index');
      }

      Flash::set('error', 'Đăng nhập thất bại!');
      return redirect('admin/auth/login' );
      
    }
    return $this->view('auth/login.php', ['errors' => $errors]);
  }
}
?>