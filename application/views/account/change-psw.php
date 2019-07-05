<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Techno Store - My Account</title>
    <meta name="author" content="CreativeLayers">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/style.css">
    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/responsive.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon/<?php echo base_url() ?>assets/favicon.png">

</head>

<body class="header_sticky">
    <div class="boxed">

        <?php  $this->load->view('includes/header');?>

        <section class="flat-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumbs">
                            <li class="trail-item">
                                <a href="#" title="">Home</a>
                                <span><img src="<?php echo base_url() ?>assets/images/icons/arrow-right.png"
                                        alt=""></span>
                            </li>
                            <li class="trail-item">
                                <a href="#" title="">Shop</a>
                                <span><img src="<?php echo base_url() ?>assets/images/icons/arrow-right.png"
                                        alt=""></span>
                            </li>
                            <li class="trail-end">
                                <a href="#" title="">Smartphones</a>
                            </li>
                        </ul><!-- /.breacrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-breadcrumb -->

        <main id="account-settings">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                    <?php $this->load->view('includes/ds_sidebar'); ?>
                    </div><!-- /.col-lg-3 col-md-4 -->
                    <div class="col-lg-9 col-md-8">
                        <div class="form-register">
                                
                            <div class="col-md-10 col-lg-7">
                            <div class="widget-title mb-30">
                                    <h3>Change Password<span></span></h3>
                                </div>
                                <form action="<?php echo base_url('change-psw') ?>" method="post" id="accountsettings" accept-charset="utf-8">
                                    <div class="form-box">
                                        <label for="opsw">Current Password <span class="error">*</span></label>
                                        <input type="text" value="" id="opsw" name="opsw">
                                        <span class="error"><?php echo form_error('opsw'); ?></span>
                                    </div><!-- /.form-box -->
                                    <div class="form-box">
                                        <label for="npsw">New Password <span class="error">*</span> </label>
                                        <input type="password" value=""  id="npsw" name="npsw">
                                        <span class="error"><?php echo form_error('npsw'); ?></span>
                                    </div><!-- /.form-box -->
                                    <div class="form-box">
                                        <label for="cpsw">Confirm New Password <span class="error">*</span></label>
                                        <input type="password" value="" id="cpsw" name="cpsw">
                                        <span class="error"><?php echo form_error('cpsw'); ?></span>
                                    </div><!-- /.form-box -->
                                    
                                    <div class="form-box">
                                        <button type="submit" class="register">Change Password</button>
                                    </div><!-- /.form-box -->
                                </form>
                            </div>
                        </div>
                    </div><!-- /.col-lg-9 col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </main><!-- /#shop -->

        <?php  $this->load->view('includes/footer');?>

    </div><!-- /.boxed -->

    <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/tether.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waypoints.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.circlechart.js"></script>
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#accountsettings").validate({
            rules: {
                opsw: { required: true, },
                npsw: {
                    required: true,
                    minlength: 5
                },
                cpsw: {
                    required: true,
                    minlength: 5,
                    equalTo: "#npsw"
                },
            },
            messages: {
                opsw: "Please enter your current password",
                npsw: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                cpsw: {
                    required: "Please provide a confirm password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            }
        });
    });
    </script>

</body>

</html>