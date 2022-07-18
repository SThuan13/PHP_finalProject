
<?php

require_once('app/Models/Model.php');

class UserDetail extends Model
{
  protected $table = 'user_details';

  protected $fillable = ['id', 'user_id', 'name', 'identification_number', 'phone_number', 'address'];
  
}
?>