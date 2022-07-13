<?php require_once('views/admin/layouts/index.php')?>

<?php startblock('title')?>
  Dashboard
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>
    
    <div class="container-fluid py-4 position-relative">

      <p>Đây là trang Dashboard</p>
    
      <?php require_once('views/admin/layouts/includes/footer.php') ?>
    
    </div>
  </main>
  
<?php endblock() ?>