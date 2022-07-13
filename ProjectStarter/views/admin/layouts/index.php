<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo asset('assets/admin/assets/assets/img/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?php echo asset('assets/admin/assets/assets/img/favicon.png')?>">
  <title>
    Dashboard
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
  
  <?php require_once('views/admin/layouts/includes/sidenav.php')?>
  

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>
    
    <div class="container-fluid py-4 position-relative">

      <!-- Bắt đầu content -->
      <?php defineblock('content'); ?>
      <!-- Kết thúc content -->

      <?php require_once('views/admin/layouts/includes/footer.php') ?>
      

    </div>
  </main>
  

  <!--   Core JS Files   -->
  <script src="<?php echo asset('assets/admin/assets/js/core/popper.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/js/core/bootstrap.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
  <script src="<?php echo asset('assets/admin/assets/assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo asset('assets/admin/assets/assets/js/material-dashboard.min.js?v=3.0.4')?>"></script>
</body>

</html>