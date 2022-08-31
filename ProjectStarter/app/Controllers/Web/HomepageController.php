<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');


class HomepageController extends WebController
{
    public function index()
    {
        $products = new Product();
        $products = $products->findAll();

        $categories = new Category();
        $categories = $categories->findAll();

        return $this->view('homepage/index.php', compact('products','categories'));
    }
}
