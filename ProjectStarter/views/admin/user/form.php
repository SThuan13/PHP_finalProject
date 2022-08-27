<?php require_once('views/admin/layouts/index.php')?>
<?php require_once('core/Flash.php')?>

<?php startblock('title')?>
  User detail
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  
  <main class="main-content position-relative max-height-vh-100 h-vh-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>

    <?php require_once('views/admin/layouts/includes/alert.php') ?>

    <div class="container-fluid py-4 position-relative">
      <div class="card p-3">
        <div class="row ">
          <div class="col-6 col-sm-10 col-md-10 ">
            <span>NGƯỜI DÙNG</span>
          </div>
          <?php if(isset($user)) {?>
            <div class="col-6 col-sm-2 col-md-2 ">
              <a href="" class="my-0 btn bg-gradient-primary ">Khóa</a>
            </div>  
          <?php }?>
        </div>

        <form 
          action="<?php if(isset($user)) {echo url('admin/user/handleupdate');}  else{echo url('admin/user/handlecreate');}  ?>"  
          method="post"
        >
        <?php if(isset ($user)) {?>
          <input type="text" name="id" value="<?php echo $user['id'];?> " hidden>
        <?php }?>
        <div class="row gx-5">
          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="=">Email 
                <span style="color: red;">*</span> 
                <?php if(Flash::has('email-error')) { ?>
                  <div class="invalid-feedback" style="display: inline;">
                    <?php echo Flash::get('email-error')?>
                  </div>
                <?php } ?>              
              </label>
              <input type="email" name="email" class="form-control" 
                <?php if(isset($user)) {?>value="<?php echo $user['email'];?>" <?php }?>
              >
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="=">Số CMND/CCCD</label>
              <input type="text" name="identification_number" class="form-control"  
              <?php if(isset($user)) {?> 
                value="<?php if(isset($userDetail['identification_number'])){echo $userDetail['identification_number'];} else {echo '';}?>" 
              <?php }?>>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col-md-6 ">
            <div class="input-group input-group-static  my-3">
              <label class="=">Tên tài khoản 
                <span style="color: red;">*</span>
                <?php if(Flash::has('account_name-error')) { ?>
                  <div class="invalid-feedback" style="display: inline;">
                    <?php echo Flash::get('account_name-error')?>
                  </div>
                <?php } ?>
              </label>
              <input type="text" name="account_name" class="form-control" 
              <?php if(isset($user)) {?> value="<?php echo $user['account_name'];?>" <?php }?>>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-static  my-3">
              <label class="=">Tên </label>
              <input type="text" name="name" class="form-control " 
              <?php if(isset($user)) {?> 
                value="<?php if(isset($userDetail['name'])){echo $userDetail['name'];} else {echo '';}?>" 
              <?php }?>>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="=">Mật khẩu  
                <?php if(isset($user)) {?> mới 
                <?php } else if(Flash::has('password-error')) {?>
                    <div class="invalid-feedback" style="display: inline;">
                      <?php echo Flash::get('password-error')?>
                    </div>
                <?php ;}?> 
              <span style="color: red;">*</span>
            </label>
              <input type="password" name="password" class="form-control" >
            </div>
          </div>
          <div class="col-md-6 ">
            <div class="input-group input-group-static my-3">
              <label class="=">Số điện thoại</label>
              <input type="text" name="phone_number" class="form-control" 
              value="<?php if(isset($userDetail['phone_number'])){echo $userDetail['phone_number'];} else {echo '';}?>" 
            >
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Địa chỉ</label>
              <input type="text" name="address" class="form-control" 
              value="<?php if(isset($userDetail['address'])){echo $userDetail['address'];} else {echo '';}?>" 
            >
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col">
            <div class="input-group input-group-static  my-3">
              <label class="=">Chức vụ <span style="color: red;">*</span></label>
              <select class="form-control form-select" name="role_id">
                <?php
                  foreach($roles as $role){?>
                  <option 
                    value="<?php echo $role['id']?>" 
                    <?php if(isset($user)) {?>
                      <?php if($user['role_id'] == $role['id']) {echo 'selected'; } ?>
                    <?php }?>
                  >
                    <?php echo $role['name']?>
                  </option>
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