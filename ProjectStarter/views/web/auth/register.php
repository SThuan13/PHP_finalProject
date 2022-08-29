<?php require_once('views/web/layouts/index.php') ?>

<?php startblock('content') ?>
<?php require_once('views/web/layouts/includes/header.php') ?>
<div class="container">
    <div class="register">
        <h1>Register</h1>
        <form method="POST" action="<?php echo url('auth/handleRegister') ?>">
            <div class="col-md-6  register-top-grid">

                <div class="mation">
                    <span>Tên tài khoản</span>
                    <input name="account_name" type="text">
                    <?php if (isset($errors['account_name'])) { ?>
                        <div class="invalid-feedback" style="display: block; color:red">
                            <?php echo $errors['account_name'] ?>
                        </div>
                    <?php } ?>

                    <span>Email</span>
                    <input name="email" type="text">
                    <?php if (isset($errors['email'])) { ?>
                        <div class="invalid-feedback" style="display: block; color:red">
                            <?php echo $errors['email'] ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class=" col-md-6 register-bottom-grid">

                <div class="mation">
                    <span>Mật khẩu</span>
                    <input name="password" type="text">
                    <?php if (isset($errors['password'])) { ?>
                        <div class="invalid-feedback" style="display: block; color:red">
                            <?php echo $errors['password'] ?>
                        </div>
                    <?php } ?>

                    <span>Nhập lại mật khẩu</span>
                    <input name="confirmPassword" type="text">
                    <?php if (isset($errors['confirmPassword'])) { ?>
                        <div class="invalid-feedback" style="display: block; color:red">
                            <?php echo $errors['confirmPassword'] ?>
                        </div>
                    <?php } ?>

                </div>

            </div>
            <div class="word-in">
                        
                        <input class="btn btn-info" type="submit" value="Đăng ký">
                    </div>
            <!-- <div class="clearfix"> </div>
            <div class="register-but">
                <form>
                    <input type="submit" value="submit">
                    <div class="clearfix"> </div>
                </form>
            </div> -->

        </form>
        


    </div>
</div>
<?php require_once('views/web/layouts/includes/footer.php') ?>
<?php endblock() ?>