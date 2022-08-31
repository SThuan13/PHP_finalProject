<?php

  require_once('app/Requests/BaseRequest.php');
  require_once('core/Flash.php');

  class orderRequest extends BaseRequest
  {
    
    public function validateCreateUpdate( $data )
    {
      //dd($data);
      $flag = 0;
      
      if(!$data['orderDetail'])
      {
        Flash::set('orderDetail-error', 'Danh sách sản phẩm không được để trống!');
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