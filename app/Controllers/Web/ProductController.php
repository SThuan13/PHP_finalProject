<?php

require_once('app/Controllers/Web/Webcontroller.php');

class ProductController extends WebController
{
    public function index()
    {
        return $this->view('product/index.php');
    }
}