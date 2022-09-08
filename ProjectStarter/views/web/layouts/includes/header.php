
<?php 
	if (isset($_COOKIE['cart'])) 
	{
		// code...
		$json = $_COOKIE['cart'];
		$cart = json_decode($json, true);
		$count = 0;
		foreach ($cart as $item) {
				// code...
				// $count++; //Đếm số sản phẩm trong giỏ hàng
				$count += $item['num'];
		}
	}
?>

<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="col-md-4 world">
			</div>
			<div class="col-md-4 logo">
				<a href="<?php echo url('homepage/index')?>"><img src="<?php echo asset('assets/web/images/logo.png') ?>" alt=""></a>
			</div>

			<div class="col-md-4 header-left">
				<p class="log">
					<a href="<?php echo url('auth/login') ?>">Đăng nhập</a>
					<a href="<?php echo url('auth/register') ?>">Đăng ký</a>
				</p>
				<div class="cart box_1">
					<a href="<?php echo url('checkout/index') ?>">
						<h3>
							<div class="total">
								<span class="cart_total"></span>
							</div>
							<img src="<?php echo asset('assets/web/images/cart.png') ?>" alt="" />
						</h3>
					</a>
					<p>
						<a href="<?php echo url('checkout/index') ?>" class="simpleCart_empty">
							<?php if(isset($count) && ($count > 0)) {echo $count ;} else { echo 'Empty Cart';}?>
						</a>
					</p>

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="container">
		<div class="head-top">
			<div class="col-md-2 number">
				<span><i class="glyphicon glyphicon-phone"></i>090 444 2946</span>
			</div>
			<div class="col-sm-8 h_menu4">
				<ul class="memenu skyblue">
					<li class="grid">
						<a href="<?php echo url('homepage/index') ?>">Home</a>
					</li>
					<li>
						<a href="<?php echo url('products/index') ?>">All Clothing</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										<ul>
											<?php foreach($categories as $category ) {?>
												<li>
													<a href="<?php echo url('category/index', ['id'=>$category['id']])?>"><?php echo $category['name']?></a>
												</li>
											<?php } ?>

										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li><a class="color6" href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="col-md-2 search">
				<a class="play-icon popup-with-zoom-anim" href="small-dialog"><i class="glyphicon glyphicon-search"> </i> </a>
			</div>
			<div class="clearfix"> </div>
			<!---pop-up-box---->
			<script type="text/javascript" src="<?php echo asset('assets/web/js/modernizr.custom.min.js') ?>"></script>
			<link href="<?php echo asset('assets/web/css/popuo-box.css') ?>" rel="stylesheet" type="text/css" media="all" />
			<script src="<?php echo asset('assets/web/js/jquery.magnific-popup.js') ?>" type="text/javascript"></script>
			<!---//pop-up-box---->
			<div id="small-dialog" class="mfp-hide">
				<div class="search-top">
					<!-- <div class="login">
						<input type="submit" value=""> -->
						<!-- <input type="text" value="Type something..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"> -->
					<!-- </div> -->
					<!-- <p> Shopping</p> -->
				</div>
			</div>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});

				});
			</script>
			<!---->
		</div>
	</div>
</div>
<!--//header-->