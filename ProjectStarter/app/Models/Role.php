
<?php

require_once('app/Models/Model.php');

class Role extends Model
{
  protected $table = 'roles';

  protected $fillable = ['id', 'name'];
  
}
?>