<?php

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/Admin/OrderRequest.php');
require_once('app/Models/Order.php');
require_once('app/Models/OrderDetail.php');
require_once('app/Models/User.php');
require_once('app/Models/Product.php');
require_once('core/Flash.php');
require_once('core/Storage.php');
// require_once('core/Auth.php');

class OrderController extends BackendController
{

  protected $page = 1, $take = 10, $offSet;

  public function pagination()
  {
    if(isset($_GET['page']))
    {
      if ($_GET['page'] > 0)
      {
        $this->page = $_GET['page'];
      }
      else {$this->page = 1;}
    }
    else 
    {
      $this->page = 1;
    }

    if(isset($_POST['take']))
    {
      $this->take = $_POST['take'];
    }
    else 
    {
      $this->take = 10;
    }

    $page = $this->page;
    $this->offSet = ($page - 1) * $this->take;
  }

  public function index()
  {
    $this->pagination();
    $page = $this->page;
    $take = $this->take;

    $orders = new Order();

    $sql = "SELECT orders.id, note, status, users.account_name as name, date_created from orders, users 
            where users.id = orders.user_id 
            LIMIT $this->take OFFSET $this->offSet";
    //dd($sql);
    $orders =  $orders->getAll($sql);

    return $this->view('order/list.php', compact('orders','page','take'));
  }

  public function detail()
  {
    $id = $_GET['id'];
    $order = new Order();
    $order =  $order->find($id);

    $orderDetails = new OrderDetail();
    $sql = "SELECT * FROM order_details WHERE order_details.order_id = $id";
    $orderDetails = $orderDetails->getAll($sql);
    //$orderDetail = $orderDetail->find($)

    $products = new Product();
    $products  = $products->findAll();

    $users = new User();
    $users = $users->findAll();
    // $user_id = $order['user_id'];
    // $sql = "SELECT * FROM users WHERE users.id = $user_id";

    return $this->view('order/form.php', compact('order', 'orderDetails','users','products')) ;

  }

  public function create()
  {
    $users = new User();
    $users = $users->findAll();

    $products = new Product();
    $products = $products->findAll();

    return $this->view('order/form.php', compact('users', 'products')) ;
  }
  
  public function handleCreate()
  {
    $request = new orderRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
      try 
      {
        $order = new Order();
        $orderDetail = new OrderDetail();

        $product = new Product();

        $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
        $_POST['date_created'] = $date->format('Y-m-d H:i:s');
        
        if( $order->create($_POST) )
        { 
          $id = $order->getId($_POST);
          $order_id = $id['id'];
          $_POST['finalPrice'] = 0;

          $detail = array();
          for ( $i = 0 ; $i < count($_POST['orderDetail']['product']['product_id']); $i ++)
          {
            $detail[$i] = array('product_id'=>$_POST['orderDetail']['product']['product_id'][$i], 'quantity'=>$_POST['orderDetail']['product']['quantity'][$i], 'order_id'=>$order_id);
          }

          foreach($detail as $item)
          {
            if ($orderDetail->create($item))
            {
              $product = $product->find($item['product_id']);
              //dd($product);
              $_POST['finalPrice'] += $item['quantity'] * ($product['basePrice'] + $product['tax']);
            }
          }

          //dd($_POST);
          $order->update($_POST, $order_id );

          Flash::set('success', 'Tạo đơn hàng thành công!');
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
        return redirect('admin/order/create' );
      }
    }
    else 
    {
      return redirect('admin/order/create');
    }

  }

  public function handleUpdate()
  {
    //dd($_POST);
    $request = new orderRequest();
    $errors = $request->validateCreateUpdate($_POST);
    if( $errors )
    {
      try 
      {
        $date = new DateTime("now", new DateTimeZone('Asia/Ho_Chi_Minh') );
        $_POST['date_modified'] = $date->format('Y-m-d H:i:s');
        //dd($_POST);
        $order = new Order();
        if ( $order->update($_POST, $_POST['id']) )
        { 
          $this->handleUpdateProductList();
          $order->update($_POST, $_POST['id']);
          // if ($order->update($_POST, $_POST['id'])){
          Flash::set('success', 'Chỉnh sửa đơn hàng thành công!');
          // }
          // dd($_POST);
        }
        else {  
          throw new Exception('Chỉnh sửa đơn hàng không thành công!');
        }
      }
      catch (Exception $e)
      {
        Flash::set('error', $e->getMessage());
      }
      finally
      {
        return redirect('admin/order/detail', ['id'=>$_POST['id']]);
      }
    }
    else 
    {
      return redirect('admin/order/detail', ['id'=>$_POST['id']]);
    }
  }

  public function handleUpdateProductList()
  {
    $id = $_POST['id'];
    $orderDetails = new OrderDetail();
    $orderDetail = new OrderDetail();
    $sql = "SELECT * FROM order_details WHERE order_details.order_id = $id";
    $orderDetails = $orderDetails->getAll($sql);

    $detail = array();
    for ( $i = 0 ; $i < count($_POST['orderDetail']['product']['product_id']); $i ++)
    {
      $detail[$i] = array('id'=>$_POST['orderDetail']['product']['id'][$i] ,'product_id'=>$_POST['orderDetail']['product']['product_id'][$i], 'quantity'=>$_POST['orderDetail']['product']['quantity'][$i], 'order_id'=>$id);
    }

    $finalPrice = 0;

    foreach( $detail as $item)
    {
      $itemId = $item['product_id'];
      
      $product = new Product();
      $product = $product->find($itemId);
      
      if ($item['id'] != 0)
      {
        //so sánh 
        if ($this->exactRecord($orderDetails, $item))
        {
          $orderDetail->update($item, $item['id']);
        }
      }
      else 
      {
        $orderDetail->create($item);
      }
      $finalPrice += $item['quantity'] * ($product['basePrice'] + $product['tax']);
    }
    //dd($finalPrice);   
    //dd($_POST);
    //dd($detail);
    $_POST['finalPrice'] = $finalPrice;
    // echo "<pre>";
    // echo "Old";
    //   echo "<br>";
    // print_r($orderDetails);
    // echo "New";
    //   echo "<br>";
    // print_r($detail);

    $this->deleteRecord($orderDetails,$detail);
    //die();

    //dd($_POST);
  }

  //hàm xét xem 1 bản ghi có giống hết với bản ghi ở trong csdl không; có return false; không return true
  public function exactRecord($orderDetails, $item)
  {
    foreach($orderDetails as $baseDetail)
    {
      if($baseDetail == $item)
      {
        return false;
      }
    }
    return true; 
  }

  public function deleteRecord($firstArr, $secondArr)
  {

    //dd($_POST);
    $orderDetails = new OrderDetail();
    foreach($firstArr as $baseDetail)
    {
      //echo "------>";
      //print_r($baseDetail);
      //echo "------";
      $flag = 0;
      // if($this->exactRecord($secondArr,$baseDetail))
      // {
      //   $flag = 1;
      // }
      
      foreach($secondArr as $detail)
      {
        print_r($detail);
        // if($detail == $baseDetail)
        // {
        //   $flag = 1;
        //   break;
        // }
        
        if($this->isEqualRecord($baseDetail, $detail))
        {
          $flag = 1;
          break;
        }
      }
      //echo $flag;
      // die();
      if ($flag == 0)
      {
        //echo "delete";
        //print_r($baseDetail);
        $orderDetails->delete($baseDetail['id']);
      }
      //echo "------>";
      //echo "<br>";
    }
  }

  public function isEqualRecord($record1 , $record2)
  {
    $r1 = implode(" ",$record1);
    //$a11 = str_replace(' ',' ',$a1);
    $r11 = "";
    for( $i = 0 ; $i < strlen($r1) ; $i++)
    {
      if ($r1[$i] != " ")
      {
        echo $r1[$i];
        $r11 .= $r1[$i];
      }
    }
    //echo '<br>';

    $r2 = implode(" ",$record2);

    //$a12 = str_replace(' ',' ',$a2);
    $r12 = "";
    for( $i = 0 ; $i < strlen($r2) ; $i++)
    {
      if ($r2[$i] != " ")
      {
        //echo $r2[$i];
        $r12 .= $r2[$i];
      }
    }
    //echo '<br>';
    //echo $r11.' '.$r12.'<br>';
    //echo strcasecmp($r11, $r12)."<br>";
    if (strcasecmp($r11, $r12) == 0)
    {
      return true;
    }
    return false;
  }
}
?>