<?php
require_once('app/controllers/Web/WebController.php');
require_once('app/Models/Cart.php');

class CartController extends WebController
{
    public function index()
    {
        return $this->view('cart/index.php');
    }
}