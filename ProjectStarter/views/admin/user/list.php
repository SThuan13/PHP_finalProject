<?php require_once('views/admin/layouts/index.php')?>

<?php 
  if(isset($_GET['page']))
  {
    $page = $_GET['page'];
  }
  else 
  {
    $_GET['page'] = 1;
    $page = $_GET['page'];
  }
?>

<?php startblock('title')?>
  User management
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>
    
    <div class="container-fluid py-4 position-relative">
      <div class="content h-100">
        <div class="card min-vh-85">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-6 col-sm-11 col-md-10 col-lg-11">
                <h6>NGƯỜI DÙNG</h6>
              </div>
              <div class="col-6 col-sm-1 col-md-2 col-lg-1">
                <a href="<?php echo url('admin/user/create')?>" class="btn bg-gradient-primary ">Tạo</a>
              </div>
            </div>
          </div>

          <div class="card-body px-0 py-0">
            <div class="table-responsive ">
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
                  <?php 
                  if ($users) {
                    foreach($users as $user) {?>
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
                      <a href="<?php echo url('admin/user/handledelete', ['id'=>$user['id']])?>" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Delete
                      </a>
                    </td>
                  </tr>
                  <?php }
                  }
                  else {?>
                    <div class="position-absolute top-50 start-50 translate-middle">
                      <h6>Không có dữ liệu!</h6>
                    </div>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          
          <?php if ($users) {?>
            <div class="card-footer p-1"> 
              <ul class="offset-sm-9 col-sm-2 pagination pagination-primary mb-1">
                <li class="page-item">
                  <a class="page-link" href="<?php echo url('admin/user')?>">
                    <i class="fas fa-caret-left"></i>
                  </a>
                </li>
                <li class="page-item <?php if( $page == 1 ) { echo "disabled"; } ?>">
                  <a class="page-link" 
                    onclick="<?php if($page > 1) {$page -= 1;} ?>" 
                    href="<?php 
                      echo url('admin/user', ['page'=>$page])
                    ?>"
                  >
                    <i class="fas fa-angle-left"></i>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link text-white" >
                    <?php echo $_GET['page']?>
                  </a>
                </li>
                <li class="page-item <?php if(count($users) < ($page*$take)){echo "disabled";} ?>" >
                  <a class="page-link" 
                    onclick="<?php $page = $_GET['page'] + 1; ?>" 
                    href="<?php 
                      echo url('admin/user', ['page'=>$page]);
                    ?>"
                  >
                    <i class="fas fa-angle-right"></i>
                  </a>
                </li>
                <li class="page-item">
                  <button 
                    class="page-link"
                    onclick=""
                  >
                    <i class="fas fa-caret-right"></i>
                  </button>
                  <!-- <a class="page-link" href="#link">
                    
                  </a> -->
                </li>
              </ul>
            </div>
          <?php }?>
        </div>
      </div> 
    </div>
  </main>
  
<?php endblock() ?>