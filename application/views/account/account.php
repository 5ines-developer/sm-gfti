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
                        <div class="sidebar ">
                            <div class="widget widget-categories">
                                <div class="widget-title">
                                    <h3>Dashboard<span></span></h3>
                                </div>
                                <ul class="cat-list style1 widget-content">
                                    <li><span><a href="<?php echo base_url() ?>account">My Profile</a></span></li>
                                    <li>
                                        <span>Accessories<i>(03)</i></span>
                                        <ul class="cat-child">
                                            <li>
                                                <a href="#" title="">TV</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul><!-- /.cat-list -->
                            </div><!-- /.widget-categories -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-lg-3 col-md-4 -->
                    <div class="col-lg-9 col-md-8">
                        <div class="form-register">
                                
                            <div class="col-md-10 col-lg-7">
                            <div class="widget-title mb-30">
                                    <h3>My Profile<span></span></h3>
                                </div>
                                <form action="<?php echo base_url('account') ?>" method="post" id="accountsettings" accept-charset="utf-8">
                                    <div class="form-box">
                                        <label for="name">Full Name</label>
                                        <input type="text" value="<?php echo $profile['name'] ?>" id="name" name="name">
                                    </div><!-- /.form-box -->
                                    <div class="form-box">
                                        <label for="email">Email address <span class="error">*</span> </label>
                                        <input type="text" value="<?php echo $profile['email'] ?>" readonly id="email" name="email">
                                    </div><!-- /.form-box -->
                                    <div class="form-box">
                                        <label for="phone">Phone number <span class="error">*</span></label>
                                        <input type="text" value="<?php echo $profile['phone'] ?>" id="phone" name="phone">
                                    </div><!-- /.form-box -->
                                    <div class="form-box">
                                        <a href="<?php echo base_url('change-psw') ?>">Change password</a>
                                    </div>
                                    <div class="form-box">
                                        <button type="submit" class="register">Update Profile</button>
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
                phone: {
                    required: true,
                    
                },

                email: {
                    required: true,
                    email: true
                },

            },
            messages: {
                phone:  "Please provide a Phone number",
                email: "Please enter a valid email address",
            }
        });
    });
    </script>

</body>

</html>