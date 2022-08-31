<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/category.php');
require_once('app/Models/Brand.php');



class BrandController extends WebController
{
    public function index()
    {
      $id = $_GET['id'];
      $brand = new Category();
      $brand = $brand->find($id);

      $categories = new Category();
      $categories = $categories->findAll();

      $products = new Product();
      $sql = "SELECT * FROM products where brand_id = $id";
      $products = $products->getAll($sql);

      return $this->view('products/index.php', compact('products','categories','brand'));
    }
}
