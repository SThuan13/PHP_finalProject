<?php

require_once('app/Controllers/Web/WebController.php');

class CategoryController extends WebController
{
    public function index()
    {
        return $this->view('category/index.php');
    }
}
