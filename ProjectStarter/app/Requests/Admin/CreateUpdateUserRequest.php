<?php

  require_once('app/Requests/BaseRequest.php');
  require_once('core/Flash.php');

  class CreateUpdateUserRequest extends BaseRequest
  {
    
    public function validateCreateUpdate( $data )
    {
      if ( empty($data['email']) )
      {
        Flash::set('email-error', 'email không được để trống!');
      }

      if ( empty($data['account_name']) )
      {
        Flash::set('account_name-error', 'Tên tài khoản không được để trống!');
      }

      if ( empty($data['password']) )
      {
        Flash::set('password-error', 'Password không được để trống!');
      }

      return false;
    }
  }



?>