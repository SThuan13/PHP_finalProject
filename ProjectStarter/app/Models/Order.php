<?php

require_once('app/Models/Model.php');

class Order extends Model
{
  protected $table = 'orders';

  protected $fillable = ['id', 'note',  'user_id',  'finalPrice', 'status', 'date_created', 'date_modified'];


  public function getId($data)
  {
    // $desciption = $data['description'];
    $user_id = $data['user_id'];
    $date_created = $data['date_created'];
    // $id = $data['id'];
    // $id = $data['id'];
    $sql = "SELECT id FROM orders WHERE ( user_id = $user_id AND date_created = '$date_created') ";
    // print_r($sql);
    // die();
    return $this->getFirst($sql);
  }
}
?>