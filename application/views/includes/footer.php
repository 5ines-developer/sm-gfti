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
									<img src="<?php echo base_url() ?>assets/images/icons/phone.png" alt="">
								</div>
								<div class="info">
									<p class="questions">Got Questions ? Call us 9am to 7pm</p>
									<p class="phone">Call Us: <a href="tel:08040909198">080 4090 9198</a></p>
									<p class="address">
									#16, 1st 'C' Cross,<br>
									Lalbagh Road, Sudham Nagar<br>
									Bangalore – 27
									</p>
								</div>
							</div><!-- /.widget-content -->
						</div><!-- /.widget-about -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<?php if($this->session->userdata('sid') != ''){ ?>
						<div class="col-lg-3 col-md-6">
							<div class="widget-ft widget-categories-ft">
								<div class="widget-title">
									<h3>Find By Categories</h3>
								</div>
								<ul class="cat-list-ft">
									<?php 
									
										foreach ($this->data['categories']['full'] as $key => $value) { 
											if($key < 6){
											$link = str_replace(' ','+', $value->name);
											$nlink = str_replace('&','%26', $link);
									?>
										<li>
											<a href="<?php echo base_url('search?q=&c=').$nlink ?>" title="">  <?php echo $value->name ?></a>
										</li>
									<?php } } ?>
								</ul><!-- /.cat-list-ft -->
							</div><!-- /.widget-categories-ft -->
						</div><!-- /.col-lg-3 col-md-6 -->
					<?php } ?>
					<div class="col-lg-2 col-md-6">
						<div class="widget-ft widget-menu">
							<div class="widget-title">
								<h3>Customer Care</h3>
							</div>
							<ul>
								<li><a href="<?php echo base_url() ?>" > Home </a></li>
								<li>
									<a href="<?php echo base_url() ?>contact-us" title="">
										Contact us
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>about-us" title="">
										About Us
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>account" title="">
										My Account
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>my-orders" title="">
										My orders
									</a>
								</li>
								
								<li>
									<a href="<?php echo base_url() ?>privacy-policy" title="">
										Privacy Policy
									</a>
								</li>
							</ul>
						</div><!-- /.widget-menu -->
					</div><!-- /.col-lg-2 col-md-6 -->
					<div class="col-lg-4 col-md-6">
						<div class="widget-ft widget-newsletter">
							<div class="widget-title">
								<h3>Products & Seasonal gifts</h3>
							</div>
							<p>Sign Up For New Products & Seasonal gifts</p>
							<p>Make sure that you never miss our interesting <br />
							New Products & Seasonal gifts updates
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
						<p class="copyright"> All Rights Reserved © Gifiting Xpress <?php echo date('Y') ?> | Developed by <a href="http://www.5ines.com" target="_blank">5ines</a> </p>
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