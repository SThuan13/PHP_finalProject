
<?php require_once('views/admin/layouts/indexAuth.php')?>
<?php require_once('core/Flash.php')?>

<?php startblock('title')?>
  Đăng nhập
<?php endblock()?>


<?php startblock('content')?>
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="<?php echo url('admin/auth/handleLogin')?>" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Tên tài khoản</label>
                    <input name="username" type="text" id="validationCustomUsername" class="form-control">
                    <?php if(isset($errors['username'])) { ?>
                      <div class="invalid-feedback" style="display: block;">
                        <?php echo $errors['username']?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Mật khẩu</label>
                    <input name="password" type="password" class="form-control">
                    <?php if(isset($errors['password'])) { ?>
                      <div class="invalid-feedback" style="display: block;">
                        <?php echo $errors['password']?>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input name="checkbox" class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Ghi nhớ tôi</label>
                  </div>
                  <div class="text-center">
                    <button name="submit" type="submit"  class="btn bg-gradient-primary w-100 my-4 mb-2">Đăng nhập</button>
                  </div>
                  <?php if( Flash::has('error') ) {?>
                    <div class="invalid-feedback" style="display: block;">
                    <p class="mt-4 text-sm text-center"><?php echo Flash::get('error'); ?></p>
                    </div>
                  <?php }?>
                  <p class="mt-4 text-sm text-center">
                    Chưa có tài khoản?
                    <a href="<?php echo url('admin/auth/register')?>" class="text-primary text-gradient font-weight-bold">Đăng ký</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-white" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-white" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-white" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-white" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
<?php endblock()?>
