<?php
  
require_once('app/Controllers/Admin/BackendController.php');

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
    return 1;
  }
}
?>