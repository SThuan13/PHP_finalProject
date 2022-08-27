<?php
require_once('app/controllers/Web/WebController.php');
require_once('app/Models/Cart.php');
class CheckoutController extends WebController
{

    public function index()
    {
        return $this->view('checkout/index.php');
    }
}
?>