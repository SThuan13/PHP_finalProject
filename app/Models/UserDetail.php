
<?php

require_once('app/Models/Model.php');

class UserDetail extends Model
{
  protected $table = 'user_details';

  protected $fillable = ['id', 'user_id', 'name', 'identification_number', 'phone_number', 'address'];
  
  public function getId($data)
  {
    $userId = $data['user_id'];
    $sql = "SELECT id FROM user_details WHERE `user_id` = $userId ";
    //print_r($sql);
    // die();
    return $this->getFirst($sql);
  }
}
?>