<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = "products";

    protected $fillable = ['id', 'name', 'img','description', 'brand_id','manufacturerCountry', 'tax', 'basePrice', 'category_id'];

    protected $primaryKey = "id";
}