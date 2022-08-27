
<?php require_once('core/Auth.php')?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo asset('assets/admin/assets/assets/img/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?php echo asset('assets/admin/assets/assets/img/favicon.png')?>">
  <title>
    <?php defineblock('title'); ?>
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700')?>" />
  <!-- Nucleo Icons -->
  <link href="<?php echo asset('assets/admin/assets/css/nucleo-icons.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('assets/admin/assets/css/nucleo-svg.css')?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo asset('assets/admin/assets/css/material-dashboard.css?v=3.0.4')?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  
      <!-- Bắt đầu content -->
      <?php defineblock('content'); ?>
      <!-- Kết thúc content -->

</body>     
  
  <!--   Core JS Files   -->
  <script src="<?php echo asset('assets/admin/assets/js/core/popper.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/core/bootstrap.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo asset('assets/admin/assets/js/material-dashboard.min.js?v=3.0.4')?>"></script>
</body>

</html>