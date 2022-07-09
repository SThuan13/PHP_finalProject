<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->title; ?></title>
    <link rel="stylesheet" href="<?php echo asset('vendors/bootstrap/css/bootstrap.min.css') ?>"/>
</head>
<body>
    <?php include('views/admin/layouts/includes/navbar.php'); ?>
    
    <?php echo $content; ?>
</body>
</html>

