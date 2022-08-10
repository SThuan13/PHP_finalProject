<?php require_once('views/admin/layouts/index.php')?>
<?php require_once('core/Flash.php')?>

<?php startblock('title')?>
  Product
<?php endblock()?>

<?php startblock('content') ?>
<?php require_once('views/admin/layouts/includes/sidenav.php')?>
  
  <main class="main-content position-relative max-height-vh-100 h-vh-100 border-radius-lg ">
    
    <?php require_once('views/admin/layouts/includes/navbar.php') ?>

    <?php require_once('views/admin/layouts/includes/alert.php') ?>

    <div class="container-fluid py-4 position-relative">
      <div class="card p-3">
        <div class="row ">
          <div class="col-6 col-sm-10 col-md-10 ">
            <span>SẢN PHẨM</span>
          </div>
        </div>

        <form 
          action="<?php if(isset($product)) {echo url('admin/product/handleupdate');}  else{echo url('admin/product/handlecreate');}  ?>"  
          method="post"
        >
        <?php if(isset ($product)) {?>
          <input type="text" name="id" value="<?php echo $product['id'];?> " hidden>
        <?php }?>
        <div class="row gx-5">
          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="">Tên
                <span style="color: red;">*</span> 
                <?php if(Flash::has('name-error')) { ?>
                  <div class="invalid-feedback" style="display: inline;">
                    <?php echo Flash::get('name-error')?>
                  </div>
                <?php } ?>              
              </label>
              <input type="text" name="name" class="form-control" 
                <?php if(isset($product)) {?>value="<?php echo $product['name'];?>" <?php }?>
              >
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="">Mô tả</label>
              <input type="text" name="description" class="form-control"  
              <?php if(isset($product)) {?> 
                value="<?php if(isset($product['description'])){echo $product['description'];} else {echo '';}?>" 
              <?php }?>>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col-md-6">

          </div>
          
          <div class="col-md-6">

          </div>
        </div>

        <div class="gx-5">
          <button class="btn btn-primary" type="submit">Xác nhận</button>
          <a href="<?php echo url('admin/product/')?>" class="btn btn-outline-secondary">Trở lại</a>
        </div>
        
        </form>
      </div>
    </div>
  </main>
<?php endblock() ?>