<?php require_once('views/admin/layouts/index.php')?>

<?php startblock('title')?>
  User detail
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  

  <main class="main-content position-relative max-height-vh-100 h-vh-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>

    <div class="container-fluid py-4 position-relative">
      <div class="card p-3">
        <div class="row ">
          <div class="col">
            <span>NGƯỜI DÙNG</span>
          </div>
          <div class="col-1">
            <a href="" class="btn bg-gradient-primary ">Khóa</a>
          </div>
        </div>

      <form action="<?php echo url('admin/user/handlecreate')?>" method="post">
      <div class="row gx-5">
          <div class="col ">
            <div class="input-group input-group-static input-group-outline  my-3">
              <label class="=">ID</label>
              <input type="text" class="form-control" value="<?php echo $user['id'];?>"  disabled>
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-static my-3">
              <label class="=">Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo $user['email'];?>">
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col ">
            <div class="input-group input-group-static  my-3">
              <label class="=">Tên tài khoản</label>
              <input type="text" name="account_name" class="form-control"  value="<?php echo $user['account_name'];?>">
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-static my-3">
              <label class="=">Mật khẩu</label>
              <input type="text" name="password" class="form-control" value="<?php echo $user['password'];?>">
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col ">
            <div class="input-group input-group-static my-3">
              <label class="=">Số CMND/CCCD</label>
              <input type="text" name="identification_number" class="form-control"  value="<?php echo $user['identification_number'];?>">
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Tên</label>
              <input type="text" name="name" class="form-control" value="<?php echo $user['name'];?>">
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col ">
            <div class="input-group input-group-static my-3">
              <label class="=">Số điện thoại</label>
              <input type="text" name="phone_number" class="form-control"  value="<?php echo $user['phone_number'];?>">
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Địa chỉ</label>
              <input type="text" name="address" class="form-control" value="<?php echo $user['address'];?>">
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Chức vụ</label>
              <select class="form-control form-select" name="role_id">
                <?php
                  foreach($role as $role){?>
                  <option value="<?php echo $role['id']?>" <?php ($user['role_id'] == $role['id']) ? 'checked' : '' ?>><?php echo $role['name']?></option>
                <?php }?>
              </select>
            </div>
          </div>
        </div>

        <div class="gx-5">
          <button class="btn btn-primary" type="submit">Xác nhận</button>
          <a href="<?php echo url('admin/user/')?>" class="btn btn-outline-secondary">Trở lại</a>
        </div>
        
      </form>
      </div>

    
    
      
    
    </div>
  </main>
<?php endblock() ?>