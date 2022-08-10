<?php

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/Admin/CreateUpdateUserRequest.php');
require_once('app/Models/User.php');
require_once('app/Models/UserDetail.php');
require_once('app/Models/role.php');
require_once('core/Flash.php');
// require_once('core/Auth.php');

class UserController extends BackendController
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
    // if (Auth::getUser('user'))
    // {
    //   return $this->view('user/list.php', compact('users'));
    // }
    // else 
    // {
    //   return redirect('admin/auth/login');
    // }

    $this->pagination();
    $page = $this->page;
    $take = $this->take;

    $users = new User();
    $sql = "SELECT users.id, account_name, email, roles.name as role_name from users, roles 
            where users.role_id = roles.id 
            LIMIT $this->take OFFSET $this->offSet";
    $users =  $users->getAll($sql);

    //dd($users);

    return $this->view('user/list.php', compact('users', 'page', 'take'));
  }

  public function detail()
  {
    $id = $_GET['id'];
    $user = new User();
    $user =  $user->find($id);

    $userID = $user['id'];
    $userDetail = new UserDetail();
    $userDetail = $userDetail->find($userID);

    $roles = new Role();
    $roles = $roles->findAll();

    // print_r($user);
    // print_r($userDetail);
    // die();
    return $this->view('user/form.php', compact('user', 'userDetail', 'roles'));
  }

  public function create()
  {
    $roles = new Role;
    $sql = "SELECT * FROM roles";
    $roles = $roles->getAll($sql);
    return $this->view('user/form.php', compact('roles'));
  }

  public function handleCreate()
  {
    $cruRequest = new CreateUpdateUserRequest();
    $errors = $cruRequest->validateCreateUpdate($_POST);
    if ($errors) {
      $user = new User();
      $_POST['password'] = md5($_POST['password']);
      try {
        if ($user->create($_POST)) {
          $user = $user->getId($_POST);

          $userDetail = new UserDetail();

          $details['user_id'] = $user['id'];
          //
          if ($_POST['name'] != '') {
            $details['name'] = $_POST['name'];
          }
          if ($_POST['identification_number'] != '') {
            $details['identification_number'] = $_POST['identification_number'];
          }
          if ($_POST['phone_number'] != '') {
            $details['phone_number'] = $_POST['phone_number'];
          }
          if ($_POST['phone_number'] != '') {
            $details['address'] = $_POST['address'];
          }
          // print_r($user['id']);
          // die();
          if ($userDetail->create($details)) {
            Flash::set('success', 'Tạo tài khoản thành công!');
          } else {
            throw new Exception('Tạo thông tin người dùng không thành công!');
          }
        } else {
          throw new Exception('Tạo tài khoản không thành công!');
        }
      } catch (Exception $e) {
        Flash::set('error', $e->getMessage());
      } finally {
        return redirect('admin/user/create');
      }
    } else {
      return redirect('admin/user/create');
    }
  }

  public function handleUpdate()
  {
    //print_r($_POST);
    // $_POST['user_id'] = $_POST['id'];
    // $userDetail = new UserDetail() ;
    // $user_id = $userDetail->getId($_POST);
    // print_r($user_id['id']);
    //die();
    $user = new User();
    $_POST['password'] = md5($_POST['password']);
    try {
      if ($user->update($_POST, $_POST['id'])) {
        $userDetail = new UserDetail();

        $_POST['user_id'] = $_POST['id'];

        $user_id = $userDetail->getId($_POST);
        //
        $details['user_id'] = $_POST['user_id'];
        ($_POST['name'] == '') ? $details['name'] = NULL : $details['name'] = $_POST['name'];
        ($_POST['identification_number'] == '') ? $details['identification_number'] = NULL : $details['identification_number'] = $_POST['identification_number'];
        ($_POST['phone_number'] == '') ? $details['phone_number'] = NULL : $details['phone_number'] = $_POST['phone_number'];
        ($_POST['phone_number'] == '') ? $details['address'] = NULL : $details['address'] = $_POST['address'];
        // 
        //print_r($details);
        //die();
        if ($userDetail->update($details, $user_id['id'])) {
          Flash::set('success', 'Sửa tài khoản thành công!');
        } else {
          throw new Exception('Sửa tài khoản không thành công!');
        }
      } else {
        throw new Exception('Sửa tài khoản không thành công!');
      }
    } catch (Exception $e) {
      Flash::set('error', $e->getMessage());
    } finally {
      return redirect('admin/user/detail', ['id' => $_POST['id']]);
    }
  }
}
