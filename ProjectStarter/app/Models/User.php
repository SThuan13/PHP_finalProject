<?php

require_once('app/Models/Model.php');

class User extends Model
{
  protected $table = 'users';

  protected $fillable = ['id', 'email', 'password', 'account_name' , 'role_id'];

  public function authenticate( $data )
  {
    $email = $data['email'];
    $username = $data['username'];
    $password = $data['password'];
    $sql = "SELECT * FROM users WHERE ( email = ' $email' OR account_name = '$username' ) AND (password = md5($password)) AND (role_id = 1) ";
    return $this->getAll($sql);
  }

  public function getId($data)
  {
    $email = $data['email'];
    $username = $data['account_name'];
    $sql = "SELECT id FROM users WHERE ( email = '$email' AND account_name = '$username' ) ";
    // print_r($sql);
    // die();
    return $this->getFirst($sql);
  }
  
}
?>