<?php require_once('core/Flash.php') ?>
<?php require_once('core/Auth.php') ?>
<?php require_once('views/web/layouts/index.php') ?>

<?php startblock('title') ?>
    Đăng ký thành công
<?php endblock() ?>

<?php startblock('content') ?>
<?php require_once('views/web/layouts/includes/header.php') ?>
<div class="container">

    <div class="register">
        <h1>
            <?php
            echo "Đăng ký thành công!!!";
            ?></h1>
    </div>

</div>

<?php require_once('views/web/layouts/includes/footer.php') ?>
<?php endblock() ?>