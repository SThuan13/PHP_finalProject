<?php include_once('views/web/layouts/index.php') ?>
<?php startblock('title') ?>
  Danh sách sản phẩm
<?php endblock() ?>
<?php startblock('content') ?>


<?php require_once('views/web/layouts/includes/header.php') ?>

<!--content-->
<div class="products">
    <div class="container">
        <h1>Sản phẩm</h1>
        <div class="col-md-9">
            <div class="content-top1 ">
                <?php foreach($products as $product) {?>
                    <div class="col-md-4 " style="margin: 5px 0px;">
                        <div class="col-md1 simpleCart_shelfItem " style="width: 263px; height: 336px;">
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

                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 product-bottom">
            <!--categories-->
            <div class=" rsidebar span_1_of_left">
                <h3 class="cate">Categories</h3>
                <div class="h_nav">
                    <ul class="">
                        <?php foreach($categories as $category) { ?>
                            <li class="">
                                <a href="<?php echo url('category/index', ['id'=>$category['id']])?>">
                                    <?php echo $category['name']?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                
            </div>

            <!--initiate accordion-->
            <script type="text/javascript">
                $(function() {
                    var menu_ul = $('.menu-drop > li > ul'),
                        menu_a = $('.menu-drop > li > a');
                    menu_ul.hide();
                    menu_a.click(function(e) {
                        e.preventDefault();
                        if (!$(this).hasClass('active')) {
                            menu_a.removeClass('active');
                            menu_ul.filter(':visible').slideUp('normal');
                            $(this).addClass('active').next().stop(true, true).slideDown('normal');
                        } else {
                            $(this).removeClass('active');
                            $(this).next().stop(true, true).slideUp('normal');
                        }
                    });

                });
            </script>
            <!--//menu-->
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<?php require_once('views/web/layouts/includes/footer.php') ?>

<!--//content-->
<?php endblock('content')?>