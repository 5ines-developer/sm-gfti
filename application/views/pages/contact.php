<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Gifting Xpress</title>

    <meta name="author" content="CreativeLayers">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/style.css">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/responsive.css">

    <link rel="icon" type="image/png" sizes="60x60" href="<?php echo base_url() ?>assets/favicon/favicon.png">

</head>

<body class="header_sticky ">
    <div class="boxed">

        <div class="overlay"></div>

        <?php $this->load->view('includes/header');?>

        <section class="flat-contact style2">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-7">
        				<div class="form-contact left">
        					<div class="form-contact-header">
        						<h3>Get in touch</h3>
        						<p>
        							MFill in these basic details and we will contact you within 15 minutes….! Alternatively you can use the contact form below.
        						</p>
        					</div><!-- /.form-contact-header -->
        					<div class="form-contact-content">
        						<form action="<?php echo base_url('bf_auth/enquiry') ?>" method="post" id="form-contact" accept-charset="utf-8">
									<div class="form-box one-half name-contact">
										<label for="name">Name*</label>
										<input type="text" id="name" name="name" required placeholder="">
									</div>
									<div class="form-box one-half password-contact">
										<label for="email">Email*</label>
										<input type="email" id="email" name="email" required placeholder="">
									</div>
									<div class="form-box one-half name-contact">
										<label for="phone">Phone</label>
										<input type="number" id="phone" name="phone" placeholder="">
									</div>
									<div class="form-box one-half password-contact">
										<label for="subject">Subject</label>
										<input type="text" id="subject" name="subject" placeholder="">
									</div>
									<div class="form-box">
										<label for="comment">Comment</label>
										<textarea id="comment" name="comment"></textarea>
									</div>
									<div class="form-box">
										<button type="submit" class="contact">Send</button>
									</div>
								</form><!-- /#form-contact -->
        					</div><!-- /.form-contact-content -->
        				</div><!-- /.form-contact left -->
        			</div><!-- /.col-md-7 -->
        			<div class="col-md-5">
        				<div class="box-contact">
        					<ul>
        						<li class="address">
        							<h3>Address</h3>
        							<p>
										#16, 1st ‘C’ Cross<br>
										Lalbagh Road, Sudham Nagar<br>
										Bangalore – 27 
        							</p>
        						</li>
        						<li class="phone">
        							<h3>Phone</h3>
        							<p>
										<a href="tel:+918022134444">+91 802 213 4444</a>
        							</p>
        							<p>
										<a href="tel:+918040909198">+91 804 090 9198</a>
        							</p>
        						</li>
        						<li class="email">
        							<h3>Email</h3>
        							<p>
										<a href="mailto:sales@giftingxpress.in ">sales@giftingxpress.in </a>
        							</p>
        						</li>
        						
        					</ul>
        				</div><!-- /.box-contact -->
        			</div><!-- /.col-md-5 -->
        		</div><!-- /.row -->
        	</div><!-- /.container -->
        </section><!-- /.flat-contact style2 -->

       

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

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery-ui.js"></script>
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