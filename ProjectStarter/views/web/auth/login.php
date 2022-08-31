<?php require_once('core/Flash.php') ?>
<?php require_once('core/Auth.php') ?>
<?php require_once('views/web/layouts/index.php') ?>

<?php startblock('content') ?>
<?php require_once('views/web/layouts/includes/header.php') ?>
<div class="account">
    <div class="container">
        <h1>Account</h1>
        <div class="account_grid">
            <div class="col-md-6 login-right">
                <?php if(Flash::has('success')){
                    echo "Đăng ký thành công";
                } ?>

                <form method="POST" action="<?php echo url('auth/handleLogin') ?>">
                    <div>
                        <span>Địa chỉ email</span>
                        <input name="username" type="email" id="validationCustomUsername" class="form-control">
                        <?php if (isset($errors['username'])) { ?>
                            <div class="invalid-feedback" style="display: block; color:red">
                                <?php echo $errors['username'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div>
                        <span>Mật khẩu</span>
                        <input name="password" type="password" class="form-control">
                        <?php if (isset($errors['password'])) { ?>
                            <div class="invalid-feedback" style="display: block; color:red">
                                <?php echo $errors['password'] ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="word-in">
                        <a class="forgot" href="<?php echo url('auth/reset') ?>">Quên mật khẩu?</a>
                        <input type="submit" value="Đăng nhập">
                    </div>
                </form>
            </div>
            <?php if (Flash::has('error')) { ?>
                <div class="invalid-feedback" style="display: block; color:red">
                    <p class="mt-4 text-sm text-center"><?php echo Flash::get('error'); ?></p>
                </div>
            <?php } ?>
            <div class="col-md-6 login-left">
                <h4>Khách hàng mới</h4>
                <p>Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể thực hiện quy trình thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng, xem và theo dõi các đơn đặt hàng trong tài khoản của bạn và hơn thế nữa.</p>
                <a class="acount-btn" href="<?php echo url('auth/register') ?>"> Tạo tài khoản mới</a>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php require_once('views/web/layouts/includes/footer.php') ?>

<?php endblock() ?>
