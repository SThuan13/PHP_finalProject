<?php

require_once('app/Models/Model.php');

class Brand extends Model
{
  protected $table = 'brands';

  protected $fillable = ['id', 'name', 'status','img'];

}
?>