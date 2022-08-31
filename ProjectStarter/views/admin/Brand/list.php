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
  Brand management
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
                <h6>NHÃN HIỆU</h6>
              </div>
              <div class="col-6 col-sm-1 col-md-2 col-lg-1">
                <a href="<?php echo url('admin/brand/create')?>" class="btn bg-gradient-primary ">Tạo</a>
              </div>
            </div>
          </div>

          <div class="card-body px-0 py-0">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IMG</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if($brands)
                  {
                    foreach($brands as $brand) {?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <?php echo $brand['id'];?>
                          <!-- <h6 class="mb-0 text-xs">John Michael</h6>
                          <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                        </div>
                      </div>
                    </td>
                    <td>
                      <?php echo $brand['name'];?>
                    </td>
                    <td class="text-sm">
                      <?php echo $brand['status'];?>
                    </td>
                    <td class="">
                      <?php $img = json_decode($brand['img'])?>
                        <img class="img shadow border-radius-xl" 
                          style="width:125px ; height:125px; object-fit: contain"
                          src="<?php echo asset("storage/{$img[0]}") ?>" 
                          alt=""
                        >               
                    </td>
                    <td class="align-middle">
                      <a href="<?php echo url('admin/brand/detail', ['id'=>$brand['id']])?>" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip">
                        Edit
                      </a>
                    </td>
                    <!-- <td class="align-middle">
                      <a href="" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit cate$category">
                        Delete
                      </a>
                    </td>  -->
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

          <?php if($brands) {?>
            <div class="card-footer p-1"> 
              <ul class="offset-sm-9 col-sm-2 pagination pagination-primary mb-1">
                <li class="page-item">
                  <a class="page-link" href="<?php echo url('admin/brand')?>">
                    <i class="fas fa-caret-left"></i>
                  </a>
                </li>

                <li class="page-item <?php if( $page == 1 ) { echo "disabled"; } ?>">
                  <a class="page-link" 
                    onclick="<?php if($page > 1) {$page -= 1;} ?>" 
                    href="<?php 
                      echo url('admin/brand', ['page'=>$page])
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

                <li class="page-item <?php if(count($categories) < ($page*$take)){echo "disabled";} ?>">
                  <a class="page-link" 
                    onclick="<?php $page = $_GET['page'] + 1; ?>" 
                    href="<?php 
                      echo url('admin/brand', ['page'=>$page]);
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
                </li>
              </ul>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </main>
  
<?php endblock() ?>