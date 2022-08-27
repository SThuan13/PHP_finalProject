<?php

require_once('app/Models/Model.php');

class Order extends Model
{
  protected $table = 'orders';

  protected $fillable = ['id', 'description',  'user_id', 'voucher_id', 'final_price', 'status', 'date_created', 'date_modified'];

}
?>