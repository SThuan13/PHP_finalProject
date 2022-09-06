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
          action="<?php if(isset($product)) {echo url('admin/product/handleUpdate');}  else{echo url('admin/product/handleCreate');}  ?>"  
          method="post"
          enctype="multipart/form-data"
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
              <label class="=">Nhãn hiệu <span style="color: red;">*</span></label>
              <select class="form-control form-select" name="brand_id">
                <?php
                  foreach($brands as $brand){?>
                  <option 
                    value="<?php echo $brand['id']?>" 
                    <?php if(isset($product)) {?>
                      <?php if($product['brand_id'] == $brand['id']) {echo 'selected'; } ?>
                    <?php }?>
                  >
                    <?php echo $brand['name']?>
                  </option>
                <?php }?>
              </select>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col-md-6">
            <div class="input-group input-group-static my-3">
              <label class="">Nước sản xuất</label>
              <input type="text" name="manufacturerCountry" class="form-control"  
              <?php if(isset($product)) {?> 
                value="<?php if(isset($product)){echo $product['manufacturerCountry'];} else {echo '';}?>" 
              <?php }?>>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-static  my-3">
              <label class="=">Danh mục <span style="color: red;">*</span></label>
              <select class="form-control form-select" name="category_id">
                <?php
                  foreach($categories as $category){?>
                  <option 
                    value="<?php echo $category['id']?>" 
                    <?php if(isset($product)) {?>
                      <?php if($product['category_id'] == $category['id']) {echo 'selected'; } ?>
                    <?php }?>
                  >
                    <?php echo $category['name']?>
                  </option>
                <?php }?>
              </select>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col-md-6">
            <div div class="input-group input-group-static my-3">
              <label class="">Giá gốc
                <span style="color: red;">*</span> 
                <?php if(Flash::has('basePrice-error')) { ?>
                  <div class="invalid-feedback" style="display: inline;">
                    <?php echo Flash::get('basePrice-error')?>
                  </div>
                <?php } ?> 
              </label>
              <input type="number" min=1 name="basePrice" class="form-control"  
              <?php if(isset($product)) {?> 
                value="<?php if(isset($product['basePrice'])){echo $product['basePrice'];} else {echo '';}?>" 
              <?php }?>>
            </div>
          </div>

          <div class="col-md-6">
            <div div class="input-group input-group-static my-3">
              <label class="">Tax
                <span style="color: red;">*</span> 
                  <?php if(Flash::has('tax-error')) { ?>
                    <div class="invalid-feedback" style="display: inline;">
                      <?php echo Flash::get('tax-error')?>
                    </div>
                  <?php } ?> 
              </label>
              <input type="number" min=1 name="tax" class="form-control"  
              <?php if(isset($product)) {?> 
                value="<?php if(isset($product['tax'])){echo $product['tax'];} else {echo '';}?>" 
              <?php }?>>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col">
            <div class="input-group input-group-static my-3">
              <label class="col-12" for="description">Mô tả</label>
              <textarea id="description" name="description" class="form-control" rows="1">
                <?php if(isset($product)) echo $product['description']; ?>
              </textarea> 
            </div>
          </div>

        </div>

        <div class="row">
          <label for="floatingInput" class="col-form-label">Image</label>
          <input type="file" class="form-group btn" id="floatingInput" multiple name="upload[]">
        </div>

        <?php if(isset($product) && isset($product['img'])) {?>
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Image List
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body text-dark ">
                  <div id="images">
                    <div class="row">
                      <?php
                        $index = 0; 
                        foreach(json_decode($product['img']) as $img) {?>
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

                                <!-- <div class="col-1 p-0 d-flex align-items-center">
                                  <button 
                                    type="button" 
                                    class="btn text-light"
                                    onclick="changeImg($index - 2)"
                                  >
                                    <i class="fas fa-angle-left"></i>
                                  </button>
                                </div> -->

                                <div class="col-12">
                                  <img class="img-fluid" src="<?php echo asset("storage/{$img}") ?>" alt="">
                                </div>
                                
                                <!-- <div class="col-1 p-0 d-flex align-items-center" >
                                  <button 
                                    type="button" 
                                    class="btn text-light"
                                    onclick="changeImg($index)"
                                  >
                                    <i class="fas fa-angle-right"></i>
                                  </button>
                                </div> -->
                                
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
          <a href="<?php echo url('admin/product/')?>" class="btn btn-outline-secondary">Trở lại</a>
        </div>
        
        </form>
      </div>
    </div>
  </main>

  <script>

  </script>
<?php endblock() ?>