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
                        <!-- /.sidebar -->
                    </div><!-- /.col-lg-3 col-md-4 -->
                    <div class="col-lg-9 col-md-8">
                        <?php
                        if(!empty($orders)){ 
                            foreach ($orders as $key => $value) {
                                $toatalP = 0;
                                foreach ($value as $keysd => $valuesd) {
                                    $date = date('d M Y', strtotime($valuesd->orderd_on));
                                    $toatalP =  $toatalP + $valuesd->price;
                                }
                        ?>
                        <div class="cart-items">
                            <div class="cart-item">

                                <div class="ord-header">
                                    <a href="#!" class="track-order">Track order</a>
                                    <ul class="ord-header-list">
                                        <li>
                                            <p>Order Placed</p>
                                            <span><?php echo $date; ?></span>
                                        </li>
                                        <li>
                                            <p>Total</p>
                                            <span> &#8377; <?php echo $toatalP; ?></span>
                                        </li>
                                        <li>
                                            <p>Order id:</p>
                                            <span># <?php echo $key ?></span>
                                        </li>
                                    </ul>

                                </div>
                                <?php
                            foreach ($value as $vkey => $vale2) { ?>
                                <div class="row order-list">
                                    <div class="col-4">
                                        <div class="cart-item-image">
                                            <img src="<?php echo base_url().$vale2->image_path ?>" class=""
                                                alt="">

                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="cart-item-content">
                                            <div class="c-title">
                                                <span><a href="<?php echo base_url().$vale2->product_id ?>"><?php echo $vale2->ptitle ?></a></span>
                                            </div>
                                            <div class="c-category">
                                                <p><span><?php echo $vale2->name ?></span></p>
                                                <p><span>SKU: </span> <?php echo $vale2->product_id ?></p>
                                                <p><span>Quantity: </span> <?php echo $vale2->quantity ?></p>
                                            </div>
                                            <div class="c-price">
                                                <p>Price : ₹ <span><?php echo $vale2->price ?></span></p>
                                            </div>
                                            <div class="brand-charge">
                                                <div class="footer-detail">
                                                    <div class="quanlity-box">

                                                    </div><!-- /.quanlity-box -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <?php    } ?>
                            </div>
                        </div>




                        <?php       
                            }
                        }
                        else{ 

                        } 
                    ?>




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
                phone: "Please provide a Phone number",
                email: "Please enter a valid email address",
            }
        });
    });
    </script>

</body>

</html>