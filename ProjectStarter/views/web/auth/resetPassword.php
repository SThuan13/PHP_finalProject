<?php require_once('views/web/layouts/index.php') ?>

<?php startblock('title') ?>

<?php endblock() ?>


<?php startblock('content') ?>
<div class="container">

    <form method="POST" action="<?php echo url('auth/handleReset') ?>">
        <div class="col-md-6  register-top-grid">
            <p>Nhập tên tài khoản, Email và mật khẩu để đăng ký</p>

            <div class="mation">
                <span>Tên tài khoản</span>
                <input name="account_name" type="text">
                <?php if (isset($errors['account_name'])) { ?>
                    <div class="invalid-feedback" style="display: block;">
                        <?php echo $errors['account_name'] ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Reset</button>
        </div>
    </form>




</div>
<?php endblock() ?>