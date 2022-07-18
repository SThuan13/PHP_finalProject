<?php require_once('views/admin/layouts/index.php')?>

<?php startblock('title')?>
  User management
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>
    
    <div class="container-fluid py-4 position-relative">
      <div class="content h-100">
      <div class="row">
        <div class="col">
          <span>NGƯỜI DÙNG</span>
        </div>
        <div class="col-2">
          <a href="<?php echo url('admin/user/create')?>" class="btn bg-gradient-primary ">Tạo tài khoản</a>
        </div>
        
      </div>
      

      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chức vụ</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($user as $user) {?>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <?php echo $user['id'];?>
                      <!-- <h6 class="mb-0 text-xs">John Michael</h6>
                      <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                    </div>
                  </div>
                </td>
                <td>
                  <?php echo $user['account_name'];?>
                </td>
                <td class="text-sm">
                  <?php echo $user['email'];?>
                </td>
                <td class="">
                  <?php echo $user['role_name'];?>
                  <!-- <span class="text-secondary text-xs font-weight-normal">23/04/18</span> -->
                  
                </td>
                <td class="align-middle">
                  <a href="<?php echo url('admin/user/detail', ['id'=>$user['id']])?>" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                </td>
                <td class="align-middle">
                  <a href="" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Delete
                  </a>
                </td>
              </tr>
              <?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
      </div>
      
    
      
    
    </div>
  </main>
  
<?php endblock() ?>