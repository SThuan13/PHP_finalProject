<?php

require_once('app/Models/Model.php');

class Voucher extends Model
{
  protected $table = 'vouchers';

  protected $fillable = ['id', 'name', 'description', 'code', 'type_id', 'criteria', 'value', 'status', 'date_created', 'date_modified', 'date_start', 'date_end'];

}
?>