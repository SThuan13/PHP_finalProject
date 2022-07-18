<?php

require_once('app/Models/Model.php');

class User extends Model
{
  protected $table = 'users';

  protected $fillable = ['id', 'email', 'password', 'account_name' , 'role_id'];

  public function authenticate( $data )
  {
    $username = $data['username'];
    $password = $data['password'];
    $sql = "SELECT * FROM users WHERE ( email = '$username' OR account_name = '$username' ) AND password = md5($password) ";
    // print_r($sql);
    // die();
    return $this->getAll($sql);
  }

  
}
?>