<?php require_once('views/admin/layouts/index.php')?>
<?php require_once('core/Flash.php')?>

<?php startblock('title')?>
  User detail
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  
  <main class="main-content position-relative max-height-vh-100 h-vh-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>

    <?php if( Flash::has('error') ) {?>
      <div class="row my-0">
        <div class="col">
          <div class="alert alert-danger alert-dismissible fade show text-light my-0" role="alert">
            <strong>Thất bại</strong> <?php echo Flash::get('error');?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    <?php }?>

    <div class="container-fluid py-4 position-relative">
      <div class="card p-3">
        <div class="row ">
          <div class="col">
            <span>NGƯỜI DÙNG</span>
          </div>
        </div>

      <form action="<?php echo url('admin/user/handlecreate')?>" method="post">
      <div class="row gx-5">
          <div class="col">
            <div class="input-group input-group-static my-3">
              <label class="=">Email</label>
              <input type="email" name="email" class="form-control">
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-static my-3">
              <label class="=">Số CMND/CCCD</label>
              <input type="text" name="identification_number" class="form-control">
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col ">
            <div class="input-group input-group-static  my-3">
              <label class="=">Tên tài khoản</label>
              <input type="text" name="account_name" class="form-control" >
            </div>
          </div>
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Tên</label>
              <input type="text" name="name" class="form-control" >
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col">
            <div class="input-group input-group-static my-3">
              <label class="=">Mật khẩu</label>
              <input type="text" name="password" class="form-control">
            </div>
          </div>
          <div class="col ">
            <div class="input-group input-group-static my-3">
              <label class="=">Số điện thoại</label>
              <input type="text" name="phone_number" class="form-control">
            </div>
          </div>
        </div>

        <div class="row gx-5">
          
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Địa chỉ</label>
              <input type="text" name="address" class="form-control" >
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
                  <option value="<?php echo $role['id']?>" ><?php echo $role['name']?></option>
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