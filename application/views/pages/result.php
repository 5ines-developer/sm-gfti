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

<body class="header_sticky background">
    <div class="boxed">

        <div class="overlay"></div>

        <?php $this->load->view('includes/header');?>

        <?php $this->load->view('includes/filter'); ?>

        <main id="shop" class="style2">
            <div class="container">
                <div class="row">



                    <div class="col-md-12">
                        <div class="main-shop">
                            <div class="wrap-imagebox">
                                <div class="flat-row-title style4">


                                    <div class="clearfix"></div>
                                </div><!-- /.flat-row-title style4 -->
                                <!-- <div class="sort-product style1">
                                    <ul class="icons">
                                        <li>
                                            <h3 class="text-capitize">
                                                <?php
                                                    $link = str_replace('-',' ', $this->input->get('c'));
                                                    $category = str_replace('and','&', $link); 

                                                    echo (!empty($_GET['q'])) ? $_GET['q'] : $category 
                                                ?>
                                            </h3>
                                        </li>

                                       
                                    </ul>

                                    <div class="sort">

                                       
                                    </div>
                                    <div class="clearfix"></div>
                                </div> -->

                                <div class="row mob-plr5">

                                    <?php foreach ($result as $key => $value_prd) { ?>
                                    <div class="col-lg-3 col-6 mob-2">
                                        <div class="product-box">
                                            <div class="imagebox style2">
                                                <!-- <span class="item-new">NEW</span> -->
                                                <div class="box-image">
                                                    <a href="<?php echo base_url('product/').$value_prd->product_id ?>"
                                                        title="<?php echo $value_prd->title ?>">
                                                        <img src="<?php echo base_url().$value_prd->image_path ?> "
                                                            alt="<?php echo $value_prd->title ?>">
                                                    </a>
                                                </div><!-- /.box-image -->
                                                <a href="<?php echo base_url('product/').$value_prd->product_id ?>"
                                                    title="<?php echo $value_prd->title ?>">
                                                    <div class="box-content">
                                                        <div class="cat-name">
                                                            <span class="bg-white"><?php echo $value_prd->name ?></span>
                                                        </div>
                                                        <div class="product-name">
                                                            <?php echo $value_prd->title ?>
                                                        </div>
                                                        <div class="price">
                                                            <span class="sale">&#8377; <?php 
                                                                $discount =  ($value_prd->price * $value_prd->discount) / 100 ;
                                                                echo $value_prd->price - $discount;
                                                            ?></span>
                                                            <?php 
                                                                if(!empty($value_prd->discount)){
                                                                    echo '<span class="regular">&#8377;'. $value_prd->price.'</span>';
                                                                }
                                                            ?>
                                                            
                                                        </div>
                                                    </div><!-- /.box-content -->
                                                </a>
                                                <!-- <div class="box-bottom">
                                                        <div class="btn-add-cart">
                                                            <a href="<?php echo base_url('add-cart/').$value_prd->product_id ?>"
                                                                title="">
                                                                <img src="<?php echo base_url() ?>assets/images/icons/add-cart.png"
                                                                    alt="">Add to Cart
                                                            </a>
                                                        </div>

                                                    </div>/.box-bottom -->
                                            </div><!-- /.imagebox -->
                                        </div>
                                    </div>
                                    <?php } 
                                        if(empty($result)){
                                            echo '
                                            <div class="col-md-6 offset-md-3 col-12">


                                            <div id="cart-box"><div class="cart-items text-center">
                                        <center><img src="'.base_url().'assets/images/emptycart.png" style="max-width: 260px; width: 100%;"><center> 
                                        <h2>No Result Found</h2> 
                                        </center></center></div></div>
                        
                                            </div>
                                            ';
                                        }
                                    ?>

                                </div><!-- /.row -->
                            </div><!-- /.wrap-imagebox -->
                            <?php echo $pagelink ?>

                        </div><!-- /.main-shop -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </main><!-- /#shop -->

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