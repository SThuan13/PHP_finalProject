<?php

  require_once('app/Requests/BaseRequest.php');
  require_once('core/Flash.php');

  class brandRequest extends BaseRequest
  {
    public function validateCreateUpdate( $data )
    {
      $flag = 0;
      if ( empty($data['name']) )
      {
        Flash::set('name-error', 'Tên nhãn hiệu không được để trống!');
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