<?php
require_once('app/controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('app/Models/Order.php');
require_once('app/Models/OrderDetail.php');

class CheckoutController extends WebController
{

    public function index()
    {
        $cartList = new Product();

        $categories = new Category();
        $categories = $categories->findAll();

        if (isset($_COOKIE['cart'])) 
        {
            // code...
             $json = $_COOKIE['cart'];
             $cart = json_decode($json, true);

            $idList = [];
            foreach($cart as $item)
            {
                $idList[] = $item['id'];
            }

            if(count($idList) > 0)
            {
                $idList = implode(',', $idList);
                $sql = "SELECT * FROM products WHERE id in (".$idList.")"; //id 1,3,4,5
                $cartList = $cartList->getAll($sql);
            }
            else
            {
                $cartList = [];
            }

            return $this->view('checkout/index.php',compact('cartList','categories'));
        }
        else
        {
            return $this->view('checkout/index.php',compact('cartList','categories'));
        }
    }

    public function handleCheckout()
    {
    //     try 
    //   {
    //     $order = new Order();
    //     $orderDetail = new OrderDetail();

    //     $product = new Product();

    //     $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
    //     $_POST['date_created'] = $date->format('Y-m-d H:i:s');
        
    //     if( $order->create($_POST) )
    //     { 
    //       $id = $order->getId($_POST);
    //       $order_id = $id['id'];

    //       $detail = array();
    //       for ( $i = 0 ; $i < count($_POST['orderDetail']['product']['product_id']); $i ++)
    //       {
    //         $detail[$i] = array('product_id'=>$_POST['orderDetail']['product']['product_id'][$i], 'quantity'=>$_POST['orderDetail']['product']['quantity'][$i], 'order_id'=>$order_id);
    //       }

    //       foreach($detail as $item)
    //       {
    //         if ($orderDetail->create($item))
    //         {
    //           $product = $product->find($item['product_id']);
    //           $_POST['finalPrice'] += $item['quantity'] * ($product['base_price'] + $product['tax']);
    //         }
    //       }


    //       Flash::set('success', 'Tạo đơn hàng thành công!');
    //     }
    //     else 
    //     {
    //       throw new Exception('Tạo đơn hàng không thành công!');
    //     }
    //   }
    //   catch (Exception $e)
    //   {
    //     Flash::set('error', $e->getMessage());
    //   }
    //   finally
    //   {
    //     return redirect('admin/order/create' );
    //   }
    }
}
?>