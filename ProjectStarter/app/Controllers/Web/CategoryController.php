<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');


class CategoryController extends WebController
{
    public function index()
    {
      $id = $_GET['id'];
      $category = new Category();
      $category = $category->find($id);

      $categories = new Category();
      $categories = $categories->findAll();

      $products = new Product();
      $sql = "SELECT * FROM products where category_id = $id";
      $products = $products->getAll($sql);

      return $this->view('products/index.php', compact('products','categories','category'));
    }
}
