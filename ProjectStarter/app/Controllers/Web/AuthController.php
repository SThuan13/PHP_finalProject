<?php
require_once('app/Controllers/web/WebController.php');
require_once('app/Models/User.php');
require_once('core/Flash.php');
require_once('core/Auth.php');
require_once('app/Requests/Web/AuthRequest.php');


class AuthController extends WebController
{
    public function login()
    {
        return $this->view('auth/login.php');
    }

    public function handleLogin()
    {
      $authRequest = new AuthRequest();
      $errors = $authRequest->validateLogin($_POST);
      
      if( count($errors) == 0 )
      {
        $user = new User();

        $user = $user->authenticate($_POST, 2);
        //dd($user);
        
        if ( $user )
        {
          Auth::setUser('user', $user);
          return redirect('homepage/index');
        }

        Flash::set('error', 'Đăng nhập thất bại!');
        return redirect('auth/login' );
        
      }
      return $this->view('auth/login.php', ['errors' => $errors]);
    }

    public function handleRegister()
    {
      dd($_POST);
      $authRequest = new AuthRequest();
      $errors = $authRequest->validateRegister($_POST);
      //dd($errors);
      if( count($errors) == 0 )
      {
        //dd('dang ky');
        // echo $errors;
        $user = new User();
        $_POST['role_id'] = 2;
        $_POST['password']=md5($_POST['password']);
        //dd($_POST);

        //dd($user->create($_POST));
        if($user->create($_POST))
        {
          //echo 1;
          Flash::set('error', 'Đăng ký thành công!');
          return redirect('auth/login');
        }
        else
        {
          //echo 0;
          Flash::set('error', 'Đăng ký thất bại!');
          return redirect('auth/register' );
        }

        // dd($_POST);
        // $user = $user->authenticate($_POST, 2);
        
        // if ( $user )
        // {
        //   Auth::setUser('user', $user);
        //   return redirect('homepage/index');
        // }

        // Flash::set('error', 'Đăng ký thất bại!');
        // return redirect('auth/register' );
        //echo 'That bai';
      }
      else {
        return $this->view('auth/register.php', compact('errors'));
      }
      //return $this->view('auth/login.php', compact('errors'));
    }

    public function register()
    {
        return $this->view('auth/register.php');
    }

    // public function handleReset(){
    //   $authRequest = new AuthRequest();
    //   $errors = $authRequest->validateReset($_POST);
    //   // if( count($errors) == 0 )
    //   // {
    //   //   $sql= "SELECT * FROM users WHERE email="
    //   //   //dd('dang ky');
    //   //   // echo $errors;
    //   //   // $user = new User();
    //   //   // $_POST['role_id'] = 2;
    //   //   // $_POST['password']=md5($_POST['password']);
    //   // }
    // }

    public function reset()
    {
      return $this->view('auth/resetPassword.php');
    }
}