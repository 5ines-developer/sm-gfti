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

</head>

<body class="header_sticky background">
    <div class="boxed">

        <div class="overlay"></div>

        <?php $this->load->view('includes/header');?>

        <section class="flat-product-detail">

            <div class="loderbox">
                <div class="text-center">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="flexslider single-prd">
                            <ul class="slides">
                                <li data-thumb="<?php echo base_url().$product->image_path ?>">
                                    <a href='#' id="zoom" class='zoom'><img
                                            src="<?php echo base_url().$product->image_path ?>"
                                            alt='<?php echo $product->title ?>' width='400' height='300' /></a>
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

                                <div class="reviewed">
                                    <!-- <div class="review">
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="text">
											<span>3 Reviews</span>
											<span class="add-review">Add Your Review</span>
										</div>
									</div> -->
                                    <div class="status-product">
                                        Availablity
                                        <?php
                                            if($product->available_stock > 0){
                                                echo '<span class="green">In stock</span>';
                                            }else{
                                                echo '<span >Out of stock</span>';
                                            }
                                        ?>

                                    </div>
                                </div>

                            </div><!-- /.header-detail -->
                            <div class="content-detail">
                                <div class="price">
                                    <div>
                                        <span class="regular">
                                            &#8377; <?php echo $product->price ?>
                                        </span>
                                        <span class="percentace">
                                            <?php echo  (!empty($product->discount)) ? $product->discount.' % off' :'' ?>
                                        </span>
                                    </div>
                                    <div class="sale">
                                        &#8377;
                                        <?php  $discount =  ($product->price * $product->discount) / 100 ; echo $product->price - $discount; ?>
                                    </div>
                                </div>
                                <div class="info-text">
                                    <?php echo   mb_strimwidth($product->des, 0, 120, "...") ?>
                                </div>
                                <div class="product-id">
                                    HSN: <span class="id"><?php echo $product->hsn  ?></span>
                                </div>
                            </div><!-- /.content-detail -->
                            <div class="footer-detail">
                                <form action="<?php echo base_url('add-cart/').$product->product_id ?>" method="post">
                                    <div class="quanlity-box ">
                                        <div class="quanlity float-left mr8" id='qantity-box'>
                                            <span class="btn-down"></span>
                                            <input type="number" name="qty" value="1" min="1" id="qty" max="1000"
                                                placeholder="Quanlity">
                                            <span class="btn-up"></span>
                                        </div>
                                    </div><!-- /.quanlity-box -->
                                    <div class="clearfix"></div>
                                    <?php if(!empty($size)){ ?>
                                    <div class="size-box">
                                        <span class="size-text">Size:</span>
                                        <ul>
                                            <?php  foreach ($size as $key => $value) { ?>
                                            <li>
                                                <label for="" class="<?php echo ($key == 0)? 'cheked' : '' ?>">
                                                    <span class="c-box"><?php echo $value->size_name ?></span>
                                                    <input <?php echo ($key == 0)? 'checked' : '' ?> type="radio"
                                                        value="<?php echo $value->id ?>" name="size" id="">
                                                </label>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <?php } ?>

                                    <table id="brand-table">
                                        <tr id="brand-tr">
                                            <td class="brand-td">
                                                <div class="quanlity-box selectbrand" id="selectbrand">
                                                    <?php if(!empty($brand)) { ?>
                                                    <div class="colors float-left">
                                                        <select name="brand[]" class="brandng-charge">
                                                            <option value="">Branding Charges</option>
                                                            <?php foreach ($brand as $key => $value) {
                                                             echo '<option  value="'. $value->id.'">'.$value->title.'</option>';
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td class="brand-td">
                                            <?php if(!empty($brand)) { ?>
                                                <div class="quanlity-box selectbrand" id="selectbrand">
                                                    <div class="">
                                                        <p class="brandc-price">Price : </p>
                                                        <input type="hidden" name="brandprice[]" class="brandprice">
                                                    </div>
                                                    <span class="more-brandc">
                                                        <a id="brand-plus" class="brandplus"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                                                    </span>
                                                </div>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                    </table>
                                    <span>Note : You can select maximum of 5 Branding Charges</span>

                                    <div class="box-cart style2">
                                        <div class="btn-add-cart">
                                            <button class="add-cart"
                                                type="<?php echo($product->available_stock > 0) ? 'disabled' : 'disabled' ?>"><img
                                                    src="<?php echo base_url()?>assets/images/icons/add-cart.png"
                                                    alt="">Add to Cart</button>
                                        </div>

                                    </div><!-- /.box-cart -->
                                </form>

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
    <script>
$(function() {

$(document).on('change', '.brandng-charge', function() {
var id = $(this).closest('tr').attr('id');
var brand = $(this).val();
if (brand == '') {
    $('#'+id+'>td .brandc-price>span').remove();
    return false;
} else {
    loder(true);
    $.ajax({
        url: '<?php echo base_url() ?>Search/brand_price',
        datatype: 'html',
        data: {
            'brandid': brand
        }, // change this to send js object
        type: "get",
        success: function(data) {
            if (data != '') {
                $('#'+id+'>td .brandc-price>span').remove();
                $('#'+id+'>td .brandc-price').append("<span>&#8377; " + data + "</span>");
                $('#'+id+'>td .brandprice').val(data);
            }
            loder(false);
        }
    });
}
});



        $('.size-box ul li label').click(function(e) {
            e.preventDefault();
            $(this).find('input[type=radio]').prop("checked", true);
            $('.size-box ul li label').removeClass('cheked');
            $(this).addClass('cheked');
        });
        // fetch branding charges price and display
       


        // loder
        function loder(status) {
            if (status == true) {
                $('.loderbox').css('display', 'block');
            } else {
                $('.loderbox').css('display', 'none');
            }
        }


    });
    </script>
    <script>
    $(document).ready(function() {
        $('.btn-down').click(function(e) {
            e.preventDefault();
            var qty = $('#qty').val();
            if (qty > 1) {
                var newqty = qty -= 1;
                $('#qty').val(newqty);
            }
        });
        $('.btn-up').click(function(e) {
            e.preventDefault();
            var qty = $('#qty').val();
            var newqty = parseInt(qty) + parseInt(1);
            $('#qty').val(newqty);
        });

        




        $('#brand-plus').on('click', function(e) {
            e.preventDefault();
            var dt = new Date();
            var str = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            var time = str.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            var len = $('#brand-table tr').length;
            if (len < 5) {
                $('<tr id="' + time +
                        '"><td class="brand-td"> <div class="quanlity-box selectbrand" id="selectbrand"> <?php if(!empty($brand)) { ?> <div class="colors float-left"> <select name="brand[]" class="brandng-charge"> <option value="">Branding Charges</option> <?php foreach ($brand as $key => $value) { echo '<option  value="'. $value->id.'">'.$value->title.'</option>'; } ?> </select> </div> <?php } ?> </div> </td><td class="brand-td"> <div class="quanlity-box selectbrand" id="selectbrand"> <div class=""> <p class="brandc-price">Price : </p><input type="hidden" name="brandprice[]" class="brandprice"></div> <span class="more-brandc"> <a id="brand-close" class="brandclose"><i class="fa fa-close" aria-hidden="true"></i> </a> </span> </div> </td></tr>'
                        )
                    .append().insertBefore('#brand-tr');
            } else {
                return false;
            }


        });
        $(document).on('click', '.brandclose', function(e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });



    });
    </script>
</body>

</html>