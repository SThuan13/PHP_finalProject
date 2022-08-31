<?php include_once('views/web/layouts/index.php') ?>

<?php startblock('content') ?>

<?php require_once('views/web/layouts/includes/header.php') ?>

  <!--================Single Product Area =================-->
<div class="single">

  <div class="container">
    <div class="col-md-9">
      <div class="col-md-5 grid">		
        <div class="flexslider">
          <ul class="slides">

            <?php foreach(json_decode($product['img']) as $item) { ?>
              <li data-thumb="<?php echo asset("storage/{$item}") ?>">
                  <div class="thumb-image"> 
                    <img  data-imagezoom="true" class="img-responsive"
                      src="<?php echo asset("storage/{$item}") ?>" 
                      alt="<?php echo $item ?>"
                    > 
                  </div>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>	
      
      <div class="col-md-7 single-top-in">
        <div class="single-para simpleCart_shelfItem">
          <h1><?php echo $product['name']?></h1>
          <p>
            Thương hiệu: <a href="<?php echo url('brand/index', ['id'=>$product['brandId']])?>"><?php echo $product['brandName']?></a>
          </p>
          <p>
            Danh mục: <a href="<?php echo url('category/index', ['id'=>$product['categoryId']])?>"><?php echo $product['categoryName']?></a>
          </p>
          
          <label class="add-to item_price"><?php echo $product['basePrice']?></label>
          
          <div class="available">
            <h6>Available Options :</h6>
            <ul>
              <li>Size:
                <select>
                  <option>Large</option>
                  <option>Medium</option>
                  <option>small</option>
                  <option>Large</option>
                  <option>small</option>
                </select>
              </li>
            </ul>
          </div>
          <form action="<?php echo url('Cart/addToCart')?>" method="POST">
            <input type="text" hidden name="id" value="<?php echo $product['id']?>">
            <button type="submit" class="btn btn-success" >
              Add to cart
            </button>
          </form>
          
        </div>
      </div>
      <div class="clearfix"> </div>
      <div class="content-top1">
        <h1>Mô tả</h1>
        <div class="bordered" style="padding: 5%;">
          <?php echo $product['description']?>
        </div>
      </div>
  </div>

  
</div>

<!--initiate accordion-->
<script type="text/javascript">
  $(function() {
      var menu_ul = $('.menu-drop > li > ul'),
              menu_a  = $('.menu-drop > li > a');
      menu_ul.hide();
      menu_a.click(function(e) {
          e.preventDefault();
          if(!$(this).hasClass('active')) {
              menu_a.removeClass('active');
              menu_ul.filter(':visible').slideUp('normal');
              $(this).addClass('active').next().stop(true,true).slideDown('normal');
          } else {
              $(this).removeClass('active');
              $(this).next().stop(true,true).slideUp('normal');
          }
      });
  
  });
</script>



<!--================End Single Product Area =================-->

<?php require_once('views/web/layouts/includes/footer.php') ?>

<?php endblock()?>