<?php

require_once('app/Models/Model.php');

class OrderDetail extends Model
{
  protected $table = 'order_details';

  protected $fillable = ['id', 'product_id', 'quantity', 'order_id'];

}
?>