<?php
  
require_once('app/Controllers/Admin/BackendController.php');
//require_once('app/Requests/Admin/CreateUpdateCategoryRequest.php');
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

    $sql = "SELECT orders.id, description, user_details.name as name, date_created from orders, user_details 
            where user_details.id = orders.user_id 
            LIMIT $this->take OFFSET $this->offSet";
    $orders =  $orders->getAll($sql);

    return $this->view('order/list.php', compact('orders','page','take'));
  }

  public function detail()
  {
    $id = $_GET['id'];
    $order = new Order();
    $order =  $order->find($id);
    
    $orderDetail = new OrderDetail();
    $sql = "SELECT * FROM order_details WHERE order_details.order_id = $id";
    $orderDetail = $orderDetail->getFirst($sql);
    //$orderDetail = $orderDetail->find($)

    $user = new User();
    $user_id = $order['user_id'];
    $sql = "SELECT * FROM users WHERE users.id = $user_id";

    return $this->view('order/form.php', compact('order', 'orderDetail')) ;
  }

  public function create()
  {
    $users = new User();
    $users = $users->findAll();

    $products = new Product();
    $products = $products->findAll();
    //dd($products);
    //dd($user);

    //$orderDetail = 

    return $this->view('order/form.php', compact('users', 'products')) ;
  }
  
  public function handleCreate()
  {
    // $file = $_FILES['upload'];
    // dd($file);
    // dd($_POST);
    // $cruRequest = new CreateUpdateCategoryRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
      // try 
      // {
        // $order = new Order();
        // if($_FILES['upload']['error'] > 0 )
        // {
        //   $_POST['image'] = '';
        // }
        // else 
        // {
          $storage = new Storage();
          $upload = $storage->upload('images', $_FILES);
          //dd($upload);
        //}
        // if ( $order->create($_POST) )
        // { 
        //     Flash::set('success', 'Tạo đơn hàng thành công!');
        // }
        // else 
        // {
        //   throw new Exception('Tạo đơn hàng không thành công!');
        // }
      // }
      // catch (Exception $e)
      // {
      //   Flash::set('error', $e->getMessage());
      // }
      // finally
      // {
      //   return redirect('admin/order/create' );
      // }
    // }
    // else 
    // {
    //   return redirect('admin/category/create');
    // }
  }

  public function handleUpdate()
  {
    // $cruRequest = new CreateUpdateCategoryRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
    try 
    {
      $order = new Order();
      if ( $order->update($_POST, $_POST['id']) )
      { 
          Flash::set('success', 'Chỉnh sửa đơn hàng thành công!');
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
    // }
    // else 
    // {
    //   return redirect('admin/category/create');
    // }
  }

  
}
?>