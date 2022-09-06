<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Product.php');

class CartController extends WebController
{
    // public function index()
    // {
    //     $products = new Product();
    //     $products = $products->findAll();

    //     $categories = new Category();
    //     $categories = $categories->findAll();

    //     return $this->view('homepage/index.php', compact('products','categories'));
    // }

  public function addToCart()
  {
    if (isset ($_POST['id']) )
    {
      $id = $_POST['id'];
      $this->process($id );
      return redirect('products/detail', ['id'=>$id]);
    }
    
    else 
    {
      $id = $_GET['id'];
      $this->process($id );
      return redirect('checkout/index');
    }
    //dd($id);
  }

  public function process($id )
  {
    $cart = [];

    if (isset($_COOKIE['cart'])) 
    {
      // code...
      $json = $_COOKIE['cart'];
      $cart = json_decode($json, true); 
    }
    // code...
    $isFind = false;
    for ($i = 0; $i < count($cart); $i++) 
    {
      // code...
      if ($cart[$i]['id'] == $id) 
      {
        // code...
        $cart[$i]['num'] += 1;
        $isFind = true;
        break;
      }
    }   
    
    if (!$isFind) 
    {
      // code...
      $cart[] = [
          'id' => $id,
          'num' => 1
      ];
    }
    //dd(json_encode($cart));
    setcookie('cart', json_encode($cart), time ()+3600*24, "/");
  }

  public function decreaseQuantity()
  {
    $id = $_GET['id'];

    $cart = [];

    if (isset($_COOKIE['cart'])) 
    {
      // code...
      $json = $_COOKIE['cart'];
      $cart = json_decode($json, true); 
    }

    for ($i = 0; $i < count($cart); $i++) 
    {
      // code...
      if ($cart[$i]['id'] == $id) 
      {
      // code...
          $cart[$i]['num'] -= 1;
          break;
      }
    }
    setcookie('cart', json_encode($cart), time ()+30*24*60*60, "/");
    return redirect('checkout/index');  
  }

  public function delete()
  {
    $id = $_GET['id'];
    //dd($id);
    $cart = [];

    if (isset($_COOKIE['cart'])) 
    {
      // code...
      $json = $_COOKIE['cart'];
      $cart = json_decode($json, true); 
    }
    // code...
    for ($i=0; $i < count($cart); $i++) 
    {
      // code...
      if ($cart[$i]['id'] == $id) {
          array_splice($cart, $i, 1);
          break;                        
      }
    }
    setcookie('cart', json_encode($cart), time()+30*24*60*60, "/");

    return redirect('checkout/index');
  }
}
