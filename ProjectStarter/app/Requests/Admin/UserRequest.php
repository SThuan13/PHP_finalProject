<?php

  require_once('app/Requests/BaseRequest.php');
  require_once('core/Flash.php');

  class CreateUpdateUserRequest extends BaseRequest
  {
    
    public function validateCreate( $data )
    {
      $flag = 0;
      if ( empty($data['email']) )
      {
        Flash::set('email-error', 'email không được để trống!');
        $flag = 1;
      }

      if ( empty($data['account_name']) )
      {
        Flash::set('account_name-error', 'Tên tài khoản không được để trống!');
        $flag = 1;
      }

      if ( empty($data['password']) )
      {
        Flash::set('password-error', 'Password không được để trống!');
        $flag = 1;
      }

      if ($flag == 1)
      {
        return false;
      }
      return true;
    }

    public function validateUpdate( $data )
    {
      $flag = 0;
      if ( empty($data['email']) )
      {
        Flash::set('email-error', 'email không được để trống!');
        $flag = 1;
      }

      if ( empty($data['account_name']) )
      {
        Flash::set('account_name-error', 'Tên tài khoản không được để trống!');
        $flag = 1;
      }

      if ($flag == 1)
      {
        return false;
      }
      return true;
    }
  }



?>