<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="widget-ft widget-about">
							<div class="logo logo-ft">
								<a href="index.html" title="">
									<img src="<?php echo base_url() ?>assets/images/img/logo.svg" alt="">
								</a>
							</div><!-- /.logo-ft -->
							<div class="widget-content">
								<div class="icon">
									<img src="<?php echo base_url() ?>assets/images/icons/call.png" alt="">
								</div>
								<div class="info">
									<p class="questions">Got Questions ? Call us 24/7!</p>
									<p class="phone">Call Us: (888) 1234 56789</p>
									<p class="address">
										PO Box CT16122 Collins Street West, Victoria 8007,<br />Australia.
									</p>
								</div>
							</div><!-- /.widget-content -->
							<ul class="social-list">
								<li>
									<a href="#" title="">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-pinterest" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-dribbble" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-google" aria-hidden="true"></i>
									</a>
								</li>
							</ul><!-- /.social-list -->
						</div><!-- /.widget-about -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="widget-ft widget-categories-ft">
							<div class="widget-title">
								<h3>Find By Categories</h3>
							</div>
							<ul class="cat-list-ft">
								<li>
									<a href="#" title="">Desktops</a>
								</li>
								<li>
									<a href="#" title="">Laptops & Notebooks</a>
								</li>
								<li>
									<a href="#" title="">Components</a>
								</li>
								<li>
									<a href="#" title="">Tablets</a>
								</li>
								<li>
									<a href="#" title="">Software</a>
								</li>
								<li>
									<a href="#" title="">Phones & PDAs</a>
								</li>
								<li>
									<a href="#" title="">Cameras</a>
								</li>
							</ul><!-- /.cat-list-ft -->
						</div><!-- /.widget-categories-ft -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-2 col-md-6">
						<div class="widget-ft widget-menu">
							<div class="widget-title">
								<h3>Customer Care</h3>
							</div>
							<ul>
								<li>
									<a href="#" title="">
										Contact us
									</a>
								</li>
								<li>
									<a href="#" title="">
										Site Map
									</a>
								</li>
								<li>
									<a href="#" title="">
										My Account
									</a>
								</li>
								<li>
									<a href="#" title="">
										Wish List
									</a>
								</li>
								<li>
									<a href="#" title="">
										Delivery Information
									</a>
								</li>
								<li>
									<a href="#" title="">
										Privacy Policy
									</a>
								</li>
								<li>
									<a href="#" title="">
										Terms & Conditions
									</a>
								</li>
							</ul>
						</div><!-- /.widget-menu -->
					</div><!-- /.col-lg-2 col-md-6 -->
					<div class="col-lg-4 col-md-6">
						<div class="widget-ft widget-newsletter">
							<div class="widget-title">
								<h3>Sign Up To New Letter</h3>
							</div>
							<p>Make sure that you never miss our interesting <br />
								news by joining our newsletter program
							</p>
							<form action="#" class="subscribe-form" method="get" accept-charset="utf-8">
								<div class="subscribe-content">
									<input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
									<button type="submit"><img src="<?php echo base_url() ?>assets/images/icons/right-2.png" alt=""></button>
								</div>
							</form><!-- /.subscribe-form -->
							
						</div><!-- /.widget-newsletter -->
					</div><!-- /.col-lg-4 col-md-6 -->
				</div><!-- /.row -->
				
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<section class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright"> All Rights Reserved © Gifiting express <?php echo date('Y') ?></p>
						<p class="btn-scroll">
							<a href="#" title="">
								<img src="<?php echo base_url() ?>assets/images/icons/top.png" alt="">
							</a>
						</p>
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.footer-bottom -->



<?php if($this->session->flashdata('success')){ ?>
	<div id="popup1" class="overlay-popup">
		<div class="popup text-center">
			<i class="fa fa-check-circle text-success model-icon"></i>
			<h2 class="text-success mb15">Success</h2>
			<a class="close close-model" href="#">&times;</a>
			<div class="content">
				<p><?php echo $this->session->flashdata('success') ?></p>
			</div>
		</div>
	</div>
<?php } ?>


<?php if($this->session->flashdata('error')){ ?>
	<div id="popup1" class="overlay-popup">
		<div class="popup text-center">
			<i class="fa fa-times text-danger model-icon"></i>
			<h2 class="text-danger mb15">Error</h2>
			<a class="close close-model" href="#">&times;</a>
			<div class="content">
				<p><?php echo $this->session->flashdata('error') ?></p>
			</div>
		</div>
	</div>
<?php } ?>