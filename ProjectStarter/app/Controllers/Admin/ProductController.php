<?php
  
require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('core/Flash.php');
// require_once('core/Auth.php');

class ProductController extends BackendController
{
  public function index()
  {
    $products = new Product();
    $sql = "SELECT * FROM products";
    $products =  $products->getAll($sql);
    require_once('views/admin/product/list.php') ;
  }

  public function detail()
  {
    // $id = $_GET['id'];
    // $user = new User();
    // $sql = "SELECT * from users where (users.id = $id) ";
    // $user =  $user->getFirst($sql);

    // $userID = $user['id'];
    // $userDetail = new UserDetail();
    // $sql= "SELECT * FROM user_details WHERE user_id = $userID ";
    // $userDetail = $userDetail->getFirst($sql);
    
    // $roles = new Role();
    // $sql = "SELECT * FROM roles";
    // $roles = $roles->getAll($sql);

    // // print_r($user);
    // // print_r($userDetail);
    // // die();
    // require_once('views/admin/user/form.php') ;
  }

  public function create()
  {
    // $roles = new Role;
    // $sql = "SELECT * FROM roles";
    // $roles = $roles->getAll($sql);
    // require_once('views/admin/user/form.php') ;
  }
  
  public function handleCreate()
  {
    // $cruRequest = new CreateUpdateUserRequest();
    // $errors = $cruRequest->validateCreateUpdate($_POST);
    // if( $errors )
    // {
    //   $user = new User();
    //   $_POST['password'] = md5($_POST['password']);
    //   try 
    //   {
    //     if ( $user->create($_POST) )
    //     {
    //       $user = $user->getId($_POST);

    //       $userDetail = new UserDetail() ;

    //       $details['user_id'] = $user['id'];
    //       //
    //       if($_POST['name'] != '' ){ $details['name'] = $_POST['name']; }
    //       if($_POST['identification_number'] != '' ) { $details['identification_number'] = $_POST['identification_number']; }
    //       if($_POST['phone_number'] != '' ) { $details['phone_number'] = $_POST['phone_number']; }
    //       if($_POST['phone_number'] != '' ) { $details['address'] = $_POST['address']; }
    //       // print_r($user['id']);
    //       // die();
    //       if( $userDetail->create($details) )
    //       { 
    //         Flash::set('success', 'T???o t??i kho???n th??nh c??ng!');
    //       }
    //       else {
    //         throw new Exception('T???o th??ng tin ng?????i d??ng kh??ng th??nh c??ng!');
    //       }
    //     }
    //     else {
    //       throw new Exception('T???o t??i kho???n kh??ng th??nh c??ng!');
    //     }
    //   }
    //   catch (Exception $e)
    //   {
    //     Flash::set('error', $e->getMessage());
    //   }
    //   finally
    //   {
    //     return redirect('admin/user/create' );
    //   }
    // }
    // else 
    // {
    //   return redirect('admin/user/create');
    // }
  }

  public function handleUpdate()
  {
    //print_r($_POST);
    // $_POST['user_id'] = $_POST['id'];
    // $userDetail = new UserDetail() ;
    // $user_id = $userDetail->getId($_POST);
    // print_r($user_id['id']);
    //die();
    // $user = new User();
    // $_POST['password'] = md5($_POST['password']);
    // try 
    // {
    //   if ( $user->update($_POST, $_POST['id']) )
    //   {
    //     $userDetail = new UserDetail() ;

    //     $_POST['user_id'] = $_POST['id'];

    //     $user_id = $userDetail->getId($_POST);
    //     //
    //     $details['user_id'] = $_POST['user_id'];
    //     ($_POST['name'] == '' ) ? $details['name']= NULL : $details['name'] = $_POST['name'] ;
    //     ($_POST['identification_number'] == '' ) ? $details['identification_number'] = NULL : $details['identification_number'] = $_POST['identification_number']; 
    //     ($_POST['phone_number'] == '' ) ? $details['phone_number'] = NULL : $details['phone_number'] = $_POST['phone_number']; 
    //     ($_POST['phone_number'] == '' ) ? $details['address'] = NULL : $details['address'] = $_POST['address']; 
    //     // 
    //     //print_r($details);
    //     //die();
    //     if( $userDetail->update($details, $user_id['id']) )
    //     { 
    //       Flash::set('success', 'S???a t??i kho???n th??nh c??ng!');
    //     }
    //     else {
    //       throw new Exception('S???a t??i kho???n kh??ng th??nh c??ng!');
    //     }
    //   }
    //   else {
    //     throw new Exception('S???a t??i kho???n kh??ng th??nh c??ng!');
    //   }
    // }
    // catch (Exception $e)
    // {
    //   Flash::set('error', $e->getMessage());
    // }
    // finally
    // {
    //   return redirect('admin/user/detail', ['id'=>$_POST['id']] );
    // }
  }

  
}
?>