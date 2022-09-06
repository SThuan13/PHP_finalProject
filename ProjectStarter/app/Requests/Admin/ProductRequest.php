<?php

  require_once('app/Requests/BaseRequest.php');
  require_once('core/Flash.php');

  class productRequest extends BaseRequest
  {
    
    public function validateCreateUpdate( $data )
    {
      //dd($data);
      $flag = 0;
      if ( empty($data['name']) )
      {
        Flash::set('name-error', 'Tên sản phẩm không được để trống!');
        $flag = 1;
      }

      if ( empty($data['basePrice']) )
      {
        Flash::set('basePrice-error', 'Giá gốc không được để trống!');
        $flag = 1;
      }
      else {
        if ($data['basePrice'] < 0){
          Flash::set('basePrice-error', 'Giá gốc không được âm!');
          $flag = 1;
        }
        
      }

      if ( empty($data['tax']) )
      {
        Flash::set('tax-error', 'Thuế không được để trống!');
        $flag = 1;
      }
      else {
        if ($data['tax'] < 0)
        { 
          Flash::set('tax-error', 'Thuế không được âm!');
          $flag = 1;
        }
        
      }

      if ($flag == 1)
      {
        return false;
      }
      return true;
    }
  }



?>