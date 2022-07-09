<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['id', 'name', 'description'];

    protected $primaryKey = "product_id";
}