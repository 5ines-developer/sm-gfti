<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Techno Store - Home 2</title>

    <meta name="author" content="CreativeLayers">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/responsive.css">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon/favicon.png">

</head>

<body class="header_sticky background">
    <div class="boxed">

        <div class="overlay"></div>

        <?php $this->load->view('includes/header');?>

        <section class="flat-product-detail">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="flexslider">
							<ul class="slides">
							    <li data-thumb="<?php echo base_url().$product->image_path ?>">
							      <a href='#' id="zoom" class='zoom'><img src="<?php echo base_url().$product->image_path ?>" alt='<?php echo $product->title ?>' width='400' height='300' /></a>
							      <!-- <span>NEW</span> -->
							    </li>
							</ul><!-- /.slides -->
						</div><!-- /.flexslider -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="product-detail">
							<div class="header-detail">
								<h4 class="name text-capitalize"><?php echo $product->title ?></h4>
								<div class="category">
                                 <?php echo $product->name ?>
								</div>
								
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="price">
									
									<div class="sale">
                                    &#8377; <?php echo $product->price ?>
									</div>
								</div>
								<div class="info-text">
                                    <?php echo   mb_strimwidth($product->des, 0, 120, "...") ?>
                                </div>
								<div class="product-id">
									SKU: <span class="id"><?php echo $product->product_id  ?></span>
								</div>
							</div><!-- /.content-detail -->
							<div class="footer-detail">
								<div class="quanlity-box ">
                                    <?php if(!empty($brand)) { ?>
									<div class="colors float-left">
										<select name="color">
											<option >Branding Charges</option>
											<?php foreach ($brand as $key => $value) {
                                                echo '<option  value="'. $value->id.'">'.$value->title.'</option>';
                                            } ?>
										</select>
                                    </div>
                                    <?php } ?>
									<div class="quanlity">
										<span class="btn-down"></span>
										<input type="number" name="number" value="1" min="1" max="1000" placeholder="Quanlity">
										<span class="btn-up"></span>
									</div>
								</div><!-- /.quanlity-box -->
								<div class="box-cart style2">
									<div class="btn-add-cart">
										<a href="#" title=""><img src="<?php echo base_url()?>assets/images/icons/add-cart.png" alt="">Add to Cart</a>
									</div>
									
								</div><!-- /.box-cart -->
								<div class="social-single">
									<span>SHARE</span>
									<ul class="social-list style2">
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
								</div><!-- /.social-single -->
							</div><!-- /.footer-detail -->
						</div><!-- /.product-detail -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-detail -->

        <section class="product-des">
            <div class="container">
                <div class="col-sm-12">
                    <div class="description-text">
                        <div class="box-text">
                            <h4>Description</h4>
                            <?php echo $product->des ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('includes/footer');?>

    </div><!-- /.boxed -->

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waypoints.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.circlechart.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/easing.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.zoom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/owl.carousel.js"></script>

    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery-ui.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waves.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.countdown.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/main.js"></script>

	<?php $this->load->view('includes/searchq'); ?>
</body>

</html>