<?php require_once('views/web/layouts/index.php')?>
<?php startblock('title') ?>
  Trang chủ
<?php endblock() ?>
<?php startblock('content')?>
<?php require_once('views/web/layouts/includes/header.php') ?>

<?php require_once('views/web/layouts/includes/banner.php') ?>

<div class="content">
	<div class="container">
		<div class="content-top">
			<h1>Recent Products</h1>
			<div class="content-top1">
        <div class="row">
        <?php foreach($products as $product) {?>
          <div class="col-md-3 m-5">
            <div class="col-md1 simpleCart_shelfItem" style="width: 263px; height: 336px;">
              <a href="<?php echo url('products/detail', ['id'=>$product['id']])?>">
                <?php $img = json_decode($product['img'])?>
                  <img class="img-responsive" 
                    style="width:185px ; height:207px; object-fit: contain"
                    src="<?php echo asset("storage/{$img[0]}") ?>" 
                    alt=""
                  >
              </a>
              <h3>
                <a href=""><?php echo $product['name']?></a>
              </h3>
              <div class="price" style="text-align: center;">
                  <h3><?php echo $product['basePrice']?></h3>
                  <div class="clearfix"> </div>
              </div>
            </div>
          </div>	
        <?php }?>	
      </div>
		</div>
	</div>
</div>
<!--//content-->

<?php require_once('views/web/layouts/includes/footer.php')?>
<?php endblock('content')?>

