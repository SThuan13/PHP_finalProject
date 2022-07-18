<?php

  require_once('app/Requests/BaseRequest.php');

  class CreateUpdateUserRequest extends BaseRequest
  {
    
    public function validateCreateUpdate( $data )
    {
      if ( empty($data['email']) )
      {
        $this->errors['email'] = 'email không được để trống!';
      }

      if ( empty($data['account_name']) )
      {
        $this->errors['account_name'] = 'Tên tài khoản không được để trống!';
      }

      if ( empty($data['password']) )
      {
        $this->errors['password'] = 'Password không được để trống!';
      }

      return $this->errors;
    }
  }



?>