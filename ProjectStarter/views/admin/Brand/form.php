<?php require_once('views/admin/layouts/index.php')?>
<?php require_once('core/Flash.php')?>

<?php startblock('title')?>
  NHÃN HIỆU
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
            <span>NHÃN HIỆU</span>
          </div>
        </div>

        <form 
          action="<?php if(isset($brand)) {echo url('admin/brand/handleupdate');}  else{echo url('admin/brand/handlecreate');}  ?>"  
          method="post"
          enctype="multipart/form-data"
        >
        <?php if(isset ($brand)) {?>
          <input type="text" name="id" value="<?php echo $brand['id'];?> " hidden>
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
                <?php if(isset($brand)) {?>value="<?php echo $brand['name'];?>" <?php }?>
              >
            </div>
          </div>

          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="">Status</label>
              <select class="form-control" name="status" aria-label="Default select example">
                <option value="1">Hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
              </select> 
            </div>
          </div>
        </div>
        <div class="row">
          <label for="floatingInput" class="col-form-label">Image</label>
          <input type="file" class="form-group btn" id="floatingInput" name="upload[]">
        </div>

        <?php if(isset($brand) && isset($brand['img'])) {?>
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Image
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body text-dark ">
                  <div id="images">
                    <div class="row">
                    <?php
                        $index = 0; 
                        foreach(json_decode($brand['img']) as $img) {?>
                      <div class="col-xl-3 col-md-6 mb-xl-0 my-4">
                        <div class="card card-blog card-plain">
                          <div class="card-header p-0 mt-n4 mx-3">
                            <button type="button" class=" d-block shadow-xl border-radius-xl img-thumbnail" data-bs-toggle="modal" data-bs-target="#img<?php echo $index; ?>">
                              <img class="img-fluid  shadow border-radius-xl"
                                src="<?php echo asset("storage/{$img}") ?>" 
                                alt="<?php echo $img ?>" 
                              >
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade" id="img<?php echo $index; $index ++;?>" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content bg-transparent border-0">
                              <div class="row">
                                <div class="col-12">
                                  <img class="img-fluid" src="<?php echo asset("storage/{$img}") ?>" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>

        <div class="gx-5">
          <button class="btn btn-primary" type="submit">Xác nhận</button>
          <a href="<?php echo url('admin/brand/')?>" class="btn btn-outline-secondary">Trở lại</a>
        </div>
        
        </form>
      </div>
    </div>
  </main>
<?php endblock() ?>