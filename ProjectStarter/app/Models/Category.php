<?php

require_once('app/Models/Model.php');

class Category extends Model
{
  protected $table = 'categories';

  protected $fillable = ['id', 'name', 'description'];

}
?>