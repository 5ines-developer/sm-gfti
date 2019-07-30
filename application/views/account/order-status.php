<!DOCTYPE html>

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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/stylesheets/order-status.css">
    <link rel="icon" type="image/png" sizes="60x60" href="<?php echo base_url() ?>assets/favicon/favicon.png">

</head>

<body class="header_sticky background">
    <div class="boxed">

        <?php  $this->load->view('includes/header');
        
        ?>



        <main id="account-settings">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <?php $this->load->view('includes/ds_sidebar'); ?>
                        <!-- /.sidebar -->
                    </div><!-- /.col-lg-3 col-md-4 -->
                    <div class="col-lg-9 col-md-8">
                        <div class="order-tracking">
                            
                            <div>
                                <?php foreach ($orderStatus as $key => $order) { ?>
                                    <div class="title">
                                        <h3><?php echo $order->title ?></h3>
                                    </div>

                                    <div class="order-status-heading">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="left-t"><span >Order Id : </span><?php echo $order->order_id ?></p>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <p  class="right-t"><span >Order Date : </span><?php echo date('M d, Y',strtotime($order->orderd_on)) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content3">
                                        <div class="shipment">
                                            <div
                                                class="confirm <?php echo($order->status == 1 ||  $order->status == 2 || $order->status == 3 || $order->status == 4 || $order->status == 5 )? 'cupdate': '' ?>">
                                                <div class="imgcircle">
                                                    <img src="<?php echo base_url() ?>admin-panel/assets/images/confirm.png"
                                                        alt="confirm order">
                                                </div>
                                                <span class="line"></span>
                                                <p>Confirmed Order</p>
                                            </div>
                                            <div
                                                class="process <?php echo($order->status == 2 || $order->status == 3 || $order->status == 4 || $order->status == 5)? 'cupdate': '' ?>">
                                                <div class="imgcircle">
                                                    <img src="<?php echo base_url() ?>admin-panel/assets/images/process.png"
                                                        alt="process order">
                                                </div>
                                                <span class="line"></span>
                                                <p>Processing Order</p>
                                            </div>
                                            <div
                                                class="quality <?php echo($order->status == 3 || $order->status == 4 || $order->status == 5)? 'cupdate': '' ?>">
                                                <div class="imgcircle">
                                                    <img src="<?php echo base_url() ?>admin-panel/assets/images/quality.png"
                                                        alt="quality check">
                                                </div>
                                                <span class="line"></span>
                                                <p>Quality Check</p>
                                            </div>
                                            <div
                                                class="dispatch <?php echo($order->status == 4 || $order->status == 5)? 'cupdate': '' ?>">
                                                <div class="imgcircle">
                                                    <img src="<?php echo base_url() ?>admin-panel/assets/images/dispatch.png"
                                                        alt="dispatch product">
                                                </div>
                                                <span class="line"></span>
                                                <p>Dispatched Item</p>
                                            </div>
                                            <div class="delivery <?php echo($order->status == 5)? 'cupdate': '' ?>">
                                                <div class="imgcircle">
                                                    <img src="<?php echo base_url() ?>admin-panel/assets/images/delivery.png"
                                                        alt="delivery">
                                                </div>
                                                <p>Product Delivered</p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                <?php } ?>
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
    <?php $this->load->view('includes/searchq'); ?>

</body>

</html>