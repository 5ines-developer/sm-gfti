<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Gifting Express</title>

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
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

</head>

<body class="header_sticky background">
    <div class="boxed">

        <div class="overlay"></div>

        <?php $this->load->view('includes/header');?>




        <!-- slider -->
        <section class="banner">
            <div class="slick-slider">
                <?php foreach ($banner as $key => $value)  { ?>
                    <div class="slick-slider-iteme">
                        <a href="<?php echo $value->link ?>">
                            <img src="<?php echo base_url().$value->path ?>" class="img-responsive" alt="<?php echo $value->title ?>">
                        </a>
                    </div>
                <?php } ?>    
            </div>
        </section>

        <!-- offers -->
        <section class="flat-row flat-banner-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="banner-box one-half style2">
                            <div class="inner-box">
                                <a href="#" title="">
                                    <img src="https://dummyimage.com/390x200/49c9b8/eff0f7" alt="">
                                </a>
                            </div><!-- /.inner-box -->
                            <div class="inner-box">
                                <a href="#" title="">
                                    <img src="https://dummyimage.com/390x200/49c9b8/eff0f7" alt="">
                                </a>
                            </div><!-- /.inner-box -->
                            <div class="clearfix"></div>
                        </div><!-- /.box -->
                        <div class="banner-box">
                            <div class="inner-box">
                                <a href="#" title="">
                                    <img src="https://dummyimage.com/785x241/49c9b8/eff0f7" alt="">
                                </a>
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col-md-8 -->
                    <div class="col-md-4">
                        <div class="stylebox banner-box">
                            <div class="inner-box">
                                <a href="#" title="">
                                    <img src="https://dummyimage.com/380x470/49c9b8/eff0f7" alt="">
                                </a>
                            </div>
                        </div><!-- /.counter -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-banner-box -->


        <!-- /.flat-banner-box -->

        <section class="flat-row flat-imagebox">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-list tab-list-full">
                                <?php 
                                    foreach ($categoryProduct['category'] as $key => $value) {
                                        $active = ($key == 0) ? "active" : "" ;
                                        echo '<li class="'.$active.'">'.$value->name.'</li>';
                                    }?>
                            </ul>
                        </div><!-- /.product-tab -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="box-product">
                    <?php foreach ($categoryProduct['category'] as $key => $value) {  ?>

                    <div class="row mob-plr5">

                        <?php foreach ($categoryProduct['products'] as $key_prd => $value_prd) { 
                                if($value->id == $value_prd->category){
                            ?>
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
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="<?php echo base_url('product/').$value_prd->product_id ?>"
                                                title="<?php echo $value_prd->title ?>"><span
                                                    class="bg-white"><?php echo $value->name ?></span></a>
                                        </div>
                                        <div class="product-name">
                                            <a href="<?php echo base_url('product/').$value_prd->product_id ?>"
                                                title="<?php echo $value_prd->title ?>"><?php echo $value_prd->title ?></a>
                                        </div>
                                        <div class="price">
                                            <span class="sale">&#8377; <?php echo $value_prd->price ?></span>
                                        </div>
                                    </div><!-- /.box-content -->
                                    <div class="box-bottom">
                                        <div class="btn-add-cart">
                                            <a href="<?php echo base_url('add-cart/').$value_prd->product_id ?>"
                                                title="">
                                                <img src="<?php echo base_url() ?>assets/images/icons/add-cart.png"
                                                    alt="">Add to Cart
                                            </a>
                                        </div>

                                    </div><!-- /.box-bottom -->
                                </div><!-- /.imagebox -->
                            </div>
                        </div>
                        <?php } } ?>

                    </div>

                    <?php    } ?>


                </div><!-- /.box-product -->
            </div><!-- /.container -->
        </section><!-- /.flat-imagebox -->

        <section class="flat-row flat-imagebox style1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-row-title">
                            <h3>Our Products</h3>
                        </div><!-- /.flat-row-title -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12 owl-carousel-10">
                        <?php foreach ($ourproduct as $key => $value) { ?>
                        <div class="owl-carousel-item">
                            <div class="product-box style1">
                                <div class="imagebox style1">
                                    <div class="box-image">
                                        <a href="<?php echo base_url('product/').$value->product_id ?>" title="">
                                            <img src="<?php echo base_url().$value->image_path ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="cat-name">
                                            <a href="<?php echo base_url('product/').$value->product_id ?>"
                                                title=""><?php echo $value->name ?>
                                        </div>
                                        <div class="product-name">
                                            <a href="<?php echo base_url('product/').$value->product_id ?>">
                                                <?php 
														$tag = explode(',', $value->tags);
														echo $value->title .'<br/>'. $tag['0']
													?>
                                            </a>
                                        </div>
                                        <div class="price">
                                            <span class="sale">&#8377; <?php echo $value->price ?></span>
                                        </div>
                                    </div>
                                    <div class="box-bottom">
                                        <div class="btn-add-cart">
                                            <a href="<?php echo base_url('add-cart/').$value->product_id ?>" title="">
                                                <img src="<?php echo base_url() ?>assets/images/icons/add-cart.png"
                                                    alt="">Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /.imagebox style1 -->
                            </div><!-- /.product-box style1 -->
                        </div><!-- /.owl-carousel-item -->
                        <?php } ?>
                    </div><!-- /.owl-carousel-10 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-imagebox style1 -->

        <section class="flat-row flat-imagebox style4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-row-title">
                            <h3>Recently added Product</h3>
                        </div><!-- /.flat-row-title -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3">
                            <?php foreach ($recent as $key => $value) { ?>
                            <div class="imagebox style4 ">
                                <div class="box-image">
                                    <a href="<?php echo base_url('product/').$value->product_id ?>" title="">
                                        <img src="<?php echo base_url().$value->image_path ?>" alt="">
                                    </a>
                                </div><!-- /.box-image -->
                                <div class="box-content ">

                                    <div class="product-name ">
                                        <a href="<?php echo base_url('product/').$value->product_id ?>" title="">
                                            <?php 
													$tag = explode(',', $value->tags);
													echo $value->title?>
                                        </a>
                                    </div>
                                    <div class="cat-name">
                                        <a href="<?php echo base_url('product/').$value->product_id ?>"
                                            title=""><?php echo $value->name ?></a>
                                    </div>
                                    <div class="price">
                                        <span class="sale">&#8377; <?php echo $value->price ?></span>
                                    </div>
                                </div><!-- /.box-content -->
                            </div><!-- /.imagebox style4 v1 -->

                            <?php } ?>
                        </div><!-- /.owl-carousel-3 -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-imagebox style4 -->

        <section class="flat-row flat-iconbox style1 background">
            <div class="container" style="background-color: transparent; box-shadow: none;">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="iconbox style1 v1">
                            <div class="box-header">
                                <div class="image">
                                    <img src="<?php echo base_url() ?>assets/images/icons/car.png" alt="">
                                </div>
                                <div class="box-title">
                                    <h3>Pan India Shipping</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.box-header -->
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="iconbox style1 v1">
                            <div class="box-header">
                                <div class="image">
                                    <img src="<?php echo base_url() ?>assets/images/icons/order.png" alt="">
                                </div>
                                <div class="box-title">
                                    <h3>Order Online Service</h3>

                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.box-header -->
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="iconbox style1 v1">
                            <div class="box-header">
                                <div class="image">
                                    <img src="<?php echo base_url() ?>assets/images/icons/payment.png" alt="">
                                </div>
                                <div class="box-title">
                                    <h3>Payment</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.box-header -->
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="iconbox style1 v1">
                            <div class="box-header">
                                <div class="image">
                                    <img src="<?php echo base_url() ?>assets/images/icons/return.png" alt="">
                                </div>
                                <div class="box-title">
                                    <h3>Warranty</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- /.box-header -->
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-iconbox -->

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
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.slick-slider').slick({
            centerMode: true,
            centerPadding: '320px',
            slidesToShow: 1,
            dots: true,
            focusOnSelect: true,
            infinite: true,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 3000,
            responsive: [{
                    breakpoint: 982,
                    settings: {
                        centerPadding: '0px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        centerMode: false,
                        centerPadding: '0px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
    </script>

    <?php $this->load->view('includes/searchq'); ?>

</body>

</html>