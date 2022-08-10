
<?php require_once('views/web/layouts/indexAuth.php')?>

<?php startblock('title')?>
  Đăng ký
<?php endblock()?>


<?php startblock('content')?>
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('<?php echo asset('assets/admin/assets/img/illustrations/illustration-signup.jpg')?>'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Đăng ký</h4>
                  <p class="mb-0">Nhập tên tài khoản, Email và mật khẩu để đăng ký</p>
                  <?php if(Flash::has('error')) { ?>
                  
                  <div class="invalid-feedback" style="display: inline;">
                  
                    <?php echo Flash::get('error')?>
                  </div>
                <?php } ?>
                </div>
                
                
                <div class="card-body">
                  <form role="form" method="POST" action="<?php echo url('auth/handleRegister')?>" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Tên tài khoản</label>
                    <input name="account_name" type="text" id="validationCustomUsername" class="form-control">
                    <?php if(isset($errors['account_name'])) { ?>
                      <div class="invalid-feedback" style="display: block;">
                        <?php echo $errors['account_name']?>
                      </div>
                    <?php } ?>
                  </div>

                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" id="validationCustomUsername" class="form-control">
                    <?php if(isset($errors['email'])) { ?>
                      <div class="invalid-feedback" style="display: block;">
                        <?php echo $errors['email']?>
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
                    
                    
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nhập lại mật khẩu</label>
                      <input name="confirmPassword" type="password" class="form-control">
                    <?php if(isset($errors['confirmPassword'])) { ?>
                      <div class="invalid-feedback" style="display: block;">
                        <?php echo $errors['confirmPassword']?>
                      </div>
                    <?php } ?>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng ký</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Đã có tài khoản?
                    <a href="<?php echo url('auth/login')?>" class="text-primary text-gradient font-weight-bold">Đăng nhập</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php endblock()?>