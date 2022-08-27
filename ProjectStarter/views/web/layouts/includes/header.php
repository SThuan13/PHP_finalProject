<?php require_once('app/Models/Category.php'); ?>
<?php require_once('core/Auth.php'); ?>

<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="col-md-4 world">
				<ul>
					<li>
						<select class="in-drop">
							<option>English</option>
							<option>Japanese</option>
							<option>French</option>
						</select>
					</li>
					<li><select class="in-drop1">
							<option>Dollar</option>
							<option>Euro</option>
							<option>Yen</option>
						</select>
					</li>
				</ul>
			</div>
			<div class="col-md-4 logo">
				<a href="index.html"><img src="<?php echo asset('assets/web/images/logo.png') ?>" alt=""></a>
			</div>

			<div class="col-md-4 header-left">
				<p class="log"><a href="<?php echo url('auth/login') ?>">Đăng nhập</a>
					<a href="<?php echo url('auth/register') ?>">Đăng ký</a>
				</p>
				<div class="cart box_1">
					<a href="checkout.html">
						<h3>
							<div class="total">
								<span class="simpleCart_total"></span>
							</div>
							<img src="<?php echo asset('assets/web/images/cart.png') ?>" alt="" />
						</h3>
					</a>
					<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

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
			<div class="col-md-8 h_menu4">
				<ul class="memenu skyblue">
					<li class=" grid"><a href="index.html">Home</a></li>
					<li><a href="#">Men</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										<h4>All Clothing</h4>
										<ul>
											<li><a href="products.html">Shirts</a></li>
											<li><a href="products.html">Sports Wear</a></li>
											<li><a href="products.html">Shorts</a></li>
											<li><a href="products.html">Suits & Blazers</a></li>
											<li><a href="products.html">Formal Shirts</a></li>
											<li><a href="products.html">Sweatpants</a></li>
											<li><a href="products.html">Swimwear</a></li>
											<li><a href="products.html">Trousers & Chinos</a></li>
											<li><a href="products.html">T-Shirts</a></li>
											<li><a href="products.html">Underwear & Socks</a></li>

										</ul>
									</div>
								</div>
								<div class="col1">
									<div class="h_nav">
										<h4>Footwear</h4>
										<ul>
											<li><a href="products.html">Formal Shoes</a></li>
											<li><a href="products.html">Boots</a></li>
											<li><a href="products.html">Sports Shoes</a></li>
											<li><a href="products.html">Casual Shoes</a></li>
											<li><a href="products.html">Running Shoes</a></li>
											<li><a href="products.html">Sneakers</a></li>
											<li><a href="products.html">Loafers</a></li>
											<li><a href="products.html">Slippers</a></li>
											<li><a href="products.html">Sandals</a></li>
											<li><a href="products.html">Flip-flops</a></li>

										</ul>
									</div>
								</div>
								<div class="col1">
									<div class="h_nav">
										<h4>Popular Brands</h4>
										<ul>
											<li><a href="products.html">Levis</a></li>
											<li><a href="products.html">Persol</a></li>
											<li><a href="products.html">Nike</a></li>
											<li><a href="products.html">Edwin</a></li>
											<li><a href="products.html">New Balance</a></li>
											<li><a href="products.html">Jack & Jones</a></li>
											<li><a href="products.html">Paul Smith</a></li>
											<li><a href="products.html">Ray-Ban</a></li>
											<li><a href="products.html">Wood Wood</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="grid"><a href="#"> Women</a>
						<div class="mepanel">
							<div class="row">
								<div class="col1">
									<div class="h_nav">
										<h4>All Clothing</h4>
										<ul>
											<li><a href="products.html">Shirts & Tops</a></li>
											<li><a href="products.html">Sports Wear</a></li>
											<li><a href="products.html">Kurtas & Kurties</a></li>
											<li><a href="products.html">Suits & Blazers</a></li>
											<li><a href="products.html">Sarees</a></li>
											<li><a href="products.html">Sweatpants</a></li>
											<li><a href="products.html">Swimwear</a></li>
											<li><a href="products.html">Night-Suits</a></li>
											<li><a href="products.html">T-Shirts</a></li>
											<li><a href="products.html">Jeans</a></li>

										</ul>
									</div>
								</div>
								<div class="col1">
									<div class="h_nav">
										<h4>Footwear</h4>
										<ul>
											<li><a href="products.html">Heels</a></li>
											<li><a href="products.html">Flats</a></li>
											<li><a href="products.html">Sports Shoes</a></li>
											<li><a href="products.html">Casual Shoes</a></li>
											<li><a href="products.html">Running Shoes</a></li>
											<li><a href="products.html">Wedges</a></li>
											<li><a href="products.html">Boots</a></li>
											<li><a href="products.html">Pumps</a></li>
											<li><a href="products.html">Slippers</a></li>
											<li><a href="products.html">Flip-flops</a></li>

										</ul>
									</div>
								</div>
								<div class="col1">
									<div class="h_nav">
										<h4>Popular Brands</h4>
										<ul>
											<li><a href="products.html">Levis</a></li>
											<li><a href="products.html">Persol</a></li>
											<li><a href="products.html">Nike</a></li>
											<li><a href="products.html">Edwin</a></li>
											<li><a href="products.html">New Balance</a></li>
											<li><a href="products.html">Jack & Jones</a></li>
											<li><a href="products.html">Paul Smith</a></li>
											<li><a href="products.html">Ray-Ban</a></li>
											<li><a href="products.html">Wood Wood</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li><a href="typo.html">Blog</a></li>
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