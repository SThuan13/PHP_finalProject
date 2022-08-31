<div class="footer">
	<div class="container">
		<div class="footer-top">
			<div class="col-md-8 top-footer">
				<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.91163207516!2d2.3470599!3d48.85885894999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1436340519910" allowfullscreen=""></iframe> -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14903.458076656721!2d105.7718272!3d20.9579552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1661579610442!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			<div class="col-md-4 top-footer1">
				<h2>Newsletter</h2>
					<form>
						<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
						<input type="submit" value="SUBSCRIBE">
					</form>
			</div>
			<div class="clearfix"> </div>	
		</div>	
	</div>
	<div class="footer-bottom">
		<div class="container">
				<div class="col-md-3 footer-bottom-cate">

					<h6 >Danh mục</h6>
					<ul >
							<?php foreach($categories as $category) { ?>
									<li>
										<a href="#"><?php echo $category['name']?></a>
									</li>
							<?php } ?>
					</ul>
				</div>
				<div class="col-md-3 footer-bottom-cate">
					<h6>Feature Projects</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						
					</ul>
				</div>
				<div class="col-md-3 footer-bottom-cate">
					<h6>Top Brands</h6>
					<ul>
						<li><a href="#">Curabitur sapien</a></li>
						<li><a href="#">Dignissim purus</a></li>
						<li><a href="#">Tempus pretium</a></li>
						<li><a href="#">Dignissim neque</a></li>
						<li><a href="#">Ornared id aliquet</a></li>
						<li><a href="#">Ultrices id du</a></li>
						<li><a href="#">Commodo sit</a></li>
						
					</ul>
				</div>
				<div class="clearfix"> </div>
				<p class="footer-class"> © 2015 Fashion Mania. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
	</div>
</div>

<!-- slide -->
<script src="<?php echo asset('assets/web/js/jquery.min.js')?>"></script>
<script src="<?php echo asset('assets/web/js/imagezoom.js')?>"></script>

<!-- start menu -->
<link href="<?php echo asset('assets/web/css/memenu.css')?>" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo asset('assets/web/js/memenu.js')?>"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="<?php echo asset('assets/web/js/simpleCart.min.js')?>"> </script>
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

<!-- FlexSlider -->
<script defer src="<?php echo asset('assets/web/js/jquery.flexslider.js')?>"></script>
<link rel="stylesheet" href="<?php echo asset('assets/web/css/flexslider.css')?>" type="text/css" media="screen" />

<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>

<!---pop-up-box---->
<link href="<?php echo asset('assets/web/css/popuo-box.css')?>" rel="stylesheet" type="text/css" media="all"/>
<script src="<?php echo asset('assets/web/js/jquery.magnific-popup.js')?>" type="text/javascript"></script>
<!---//pop-up-box---->
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
<!--//footer-->