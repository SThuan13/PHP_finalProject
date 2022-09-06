<?php
require_once('app/controllers/Web/WebController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('app/Models/Order.php');
require_once('app/Models/OrderDetail.php');
require_once('core/Flash.php');
require_once('core/Auth.php');

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
        //dd($_POST);
        //dd(Auth::getUser('user')[0]['id']);
        try 
        {
            $order = new Order();
            $_POST['user_id'] = Auth::getUser('user')[0]['id'];
            $_POST['finalPrice'] = $_POST['total'];
            $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
            $_POST['date_created'] = $date->format('Y-m-d H:i:s');
            $_POST['status'] = 1;

            //debug dữ liệu
            // $cart = $_GET['cart'];
            // $detail = array();
            //     for ( $i = 0 ; $i < count($cart); $i ++)
            //     {
            //         $detail[$i] = array('product_id'=>$cart[$i]['id'], 'quantity'=>$cart[$i]['num'], 'order_id'=>1);
            //     }
            //     dd($detail);
            
            //dd($_POST);
            //end

            if( $order->create($_POST) )
            { 
                $id = $order->getId($_POST);
                $order_id = $id['id'];
                
                $cart = $_GET['cart'];

                $detail = array();
                for ( $i = 0 ; $i < count($cart); $i ++)
                {
                    $detail[$i] = array('product_id'=>$cart[$i]['id'], 'quantity'=>$cart[$i]['num'], 'order_id'=>$order_id);
                }
                //dd($detail);
                $orderDetail = new OrderDetail();

                foreach($detail as $item)
                {
                    $orderDetail->create($item);
                    // if ($orderDetail->create($item))
                    // {
                    //$product = $product->find($item['product_id']);
                    //$_POST['finalPrice'] += $item['quantity'] * ($product['base_price'] + $product['tax']);
                    //}
                }
                Flash::set('web-success', 'Thanh toán đơn hàng thành công!');

                setcookie("cart", "", time()-3600*25, "/");
            }
            else 
            {
                throw new Exception('Tạo đơn hàng không thành công!');
            }
        }
        catch (Exception $e)
        {
            Flash::set('error', $e->getMessage());
        }
        finally
        {
            //dd($_COOKIE['cart']);
            return redirect('checkout/index' );
        }
    }
    
}
?>