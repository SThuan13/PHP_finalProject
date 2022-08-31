<?php

require_once('app/Controllers/Web/Webcontroller.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');

class ProductsController extends WebController
{
    public function index()
    {
        $products = new Product();
        $products = $products->findAll();

        $categories = new Category();
        $categories = $categories->findAll();

        return $this->view('products/index.php', compact('products','categories'));
    }

    public function detail()
    {
        $id = $_GET['id'];
        $product = new Product();
        $sql = "SELECT products.id, products.name, products.img, products.description, brands.id as brandId, brands.name as brandName, manufacturerCountry, tax, basePrice, categories.name as categoryName, categories.id as categoryId
                FROM products, categories, brands 
                WHERE (products.id = $id) AND (products.category_id = categories.id) AND(products.brand_id = brands.id);";
        $product = $product->getFirst($sql);

        $categories = new Category();
        $categories = $categories->findAll();
        return $this->view('products/detail.php', compact('product' ,'categories')) ;
    }

    public function brandFilter()
    {

    }
}