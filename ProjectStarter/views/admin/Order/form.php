<?php require_once('views/admin/layouts/index.php')?>
<?php require_once('core/Flash.php')?>

<?php startblock('title')?>
  Order
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
            <span>ĐƠN HÀNG</span>
          </div>
        </div>

        <form 
          action="<?php if(isset($order)) {echo url('admin/order/handleupdate');}  else{echo url('admin/order/handlecreate');}  ?>"  
          method="post"
        >

          <div class="row gx-5">
            <div class="col-md-6">
              <div class="input-group input-group-static my-3">
                <label class="">ID
                  <span style="color: red;">*</span> 
                  <?php if(Flash::has('id-error')) { ?>
                    <div class="invalid-feedback" style="display: inline;">
                      <?php echo Flash::get('id-error')?>
                    </div>
                  <?php } ?>              
                </label>
                <input type="text" name="id" class="form-control " disabled
                  <?php if(isset($order)) {?>value="<?php echo $order['id'];?>" <?php }?>
                >
              </div>
            </div>
              
            <div class="col-md-6">
              <div class="input-group input-group-static my-3">
                <label class="" for="status">Trạng thái</label>
                <input type="text" id="status" name="status" class="form-control ps-3">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="input-group input-group-static my-3">
                <label class="" for="final_price">Thành tiền</label>
                <input type="number" id="final_price" name="final_price" class="form-control ps-3" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-static my-3">
                <label class="" for="date_created">Ngày tạo</label>
                <input type="date" id="date_created" class="form-control ps-3" disabled
                  name="date_created"  
                  value="<?php 
                    if(isset($order))
                    {
                      //echo $oder.['date_created'];
                    }
                    else 
                    {
                      echo date("Y-m-d");
                    }
                  ?>"
                >
              </div>
            </div>
          </div>

          <div class="row gx-5">
            <div class="col-md-6">
              <div class="input-group input-group-static  my-3">
                <label class="=">Người tạo<span style="color: red;">*</span></label>
                <select class="form-control form-select" name="user_id">
                    <?php foreach($users as $user ) {?>
                      <option 
                        value="<?php echo $user['id']?>" 
                        <?php if(isset($order)) {?>
                          <?php if($order['user_id'] == $user['id']) {echo 'selected'; } ?>
                        <?php }?>
                      >
                        <?php echo $user['account_name']?>
                      </option>
                    <?php }?>

                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="input-group input-group-static my-3">
                <label class="" for="description">Mô tả</label>
                <textarea id="description" name="description" class="form-control" rows="1">
                </textarea> 
              </div>
            </div>
          </div>

          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Danh sách sản phẩm
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body text-dark ">
                  <div id="productList">

                  </div>

                  <template id="productPicker">
                    <div class="row">
                      <div class="col-5 mx-0">
                        <div class="input-group input-group-static  my-3">
                          <label class="" for="product">Sản phẩm</label>
                          <select class="form-control form-select" id="product" name="oderDetail[product][product_id][]">
                            <?php foreach($products as $product ) {?>
                              <option 
                                value="<?php echo $product['id']?>" >
                                <?php echo $product['name']?>
                              </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>

                      <div class="col-5 mx-0">
                        <div class="input-group input-group-static  my-3">
                          <label class="" for="product">Số lượng</label>
                          <input class="form-control" type="number" name="oderDetail[product][quantity][]"></input>
                        </div>
                      </div>

                      <div class="col-2 mx-0">
                        <button 
                          class="btn btn-delete"
                          type="button"
                        >
                          <i class="material-icons text-sm me-2">delete</i>
                        </button>
                      </div>
                    </div>
                  </template>

                  <div id="test">

                  </div>

                  <div class="d-flex align-items-center justify-content-between">
                    <button 
                      type="button" 
                      class="btn btn-outline-primary btn-sm mb-0 btn-add"
                      onclick="showContent()"
                    >
                      Thêm sản phẩm
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="">
            <button class="btn btn-primary" type="submit">Xác nhận</button>
            <a href="<?php echo url('admin/order/')?>" class="btn btn-outline-secondary">Trở lại</a>
          </div>

        </form>
      </div>
    </div>
  </main>

  <script>
    let template = document.getElementById("productPicker").content;
    const productList = document.getElementById("productList");
    

    function showContent() 
    {
      var temp = document.getElementsByTagName("template")[0];
      var clon = temp.content.cloneNode(true);
      productList.appendChild(clon);

      //add event bấm delete
      const deleteBtn = document.querySelectorAll('.btn-delete');
      for ( let i = 0 ; i < deleteBtn.length ; i ++)
      {
        deleteBtn[i].addEventListener('click', ()=> {
          deleteBtn[i].closest('.row').remove();
        })
      }
    }

  </script>

<?php endblock() ?>