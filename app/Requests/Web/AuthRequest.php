<?php

  require_once('app/Requests/BaseRequest.php');

  class AuthRequest extends BaseRequest
  {
    public function validateRegister( $data )
    {
      //echo($data);
      if ( empty($data['account_name']) )
      {
        $this->errors['account_name'] = 'Accountname không được để trống!';
      }
      if ( empty($data['email']) )
      {
        $this->errors['email'] = 'Email không được để trống!';
      }

      if ( empty($data['password']) )
      {
        $this->errors['password'] = 'Password không được để trống!';
      }

      if ( empty($data['confirmPassword']) )
      {
        $this->errors['confirmPassword'] = 'Nhập lại Password không được để trống!';
      }
      else if($data['password'] != $data['confirmPassword']){
        $this->errors['confirmPassword'] = 'Password phải giống Confirm Password';
      }
      //dd($this->errors);
      return $this->errors;
    }
    
    public function validateLogin( $data )
    {
      if ( empty($data['username']) )
      {
        $this->errors['username'] = 'Username không được để trống!';
      }

      if ( empty($data['password']) )
      {
        $this->errors['password'] = 'Password không được để trống!';
      }
      return $this->errors;
    }
    
    public function validateReset($data)
    {
      if ( empty($data['account_name']) )
      {
        $this->errors['account_name'] = 'Tên tài khoản không được để trống!';
      }
      return $this->errors;
    }
  }

?>