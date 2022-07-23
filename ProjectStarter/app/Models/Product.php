<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['id', 'name', 'img','description','manufacturer_country', 'tax', 'base_price', 'category_id'];

    protected $primaryKey = "id";
}