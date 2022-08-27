<?php

require_once('app/Controllers/Web/Webcontroller.php');

class ProductsController extends WebController
{
    public function index()
    {
        return $this->view('products/index.php');
    }
}