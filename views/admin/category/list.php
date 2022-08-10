<?php require_once('views/admin/layouts/index.php')?>

<?php startblock('title')?>
  Category management
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>
    
    <div class="container-fluid py-4 position-relative">
      <div class="content h-100">
      <div class="row">
        <div class="col-6 col-sm-10">
          <span>DANH MỤC</span>
        </div>
        <div class="col-6 col-sm-2">
          <a href="<?php echo url('admin/category/create')?>" class="btn bg-gradient-primary ">Tạo danh mục</a>
        </div>
        
      </div>
      

      <div class="card h-100">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">mô tả</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($categories as $category) {?>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <?php echo $category['id'];?>
                      <!-- <h6 class="mb-0 text-xs">John Michael</h6>
                      <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                    </div>
                  </div>
                </td>
                <td>
                  <?php echo $category['name'];?>
                </td>
                <td class="text-sm">
                  <?php echo $category['description'];?>
                </td>
                <td class="align-middle">
                  <a href="<?php echo url('admin/category/detail', ['id'=>$category['id']])?>" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip">
                    Edit
                  </a>
                </td>
                <!-- <td class="align-middle">
                  <a href="" class="text-secondary font-weight-normal text-xs" data-toggle="tooltip" data-original-title="Edit cate$category">
                    Delete
                  </a>
                </td>  -->
              </tr>
              <?php }?>
              
              <tr>
                <!-- 
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
                -->
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>

    </div>
  </main>
  
<?php endblock() ?>