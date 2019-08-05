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
                                <li data-thumb="<?php echo base_url() . $product->image_path ?>">
                                    <a href='#' id="zoom" class='zoom'><img
                                            src="<?php echo base_url() . $product->image_path ?>"
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
if ($product->available_stock > 0) {
    echo '<span class="green">In stock</span>';
} else {
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
                                            <?php echo (!empty($product->discount)) ? $product->discount . ' % off' : '' ?>
                                        </span>
                                    </div>
                                    <div class="sale">
                                        &#8377;
                                        <?php $discount = ($product->price * $product->discount) / 100;
echo $product->price - $discount;?>
                                    </div>
                                </div>
                                <div class="info-text">
                                    <?php echo mb_strimwidth($product->des, 0, 120, "...") ?>
                                </div>
                                <div class="product-id">
                                    HSN: <span class="id"><?php echo $product->hsn ?></span>
                                </div>
                            </div><!-- /.content-detail -->
                            <div class="footer-detail">
                                <form action="<?php echo base_url('add-cart/') . $product->product_id ?>" method="post">

                                <?php if ($product->available_stock > 0) { ?>
                                    <div class="quanlity-box ">
                                        <div class="quanlity float-left mr8" id='qantity-box'>
                                            <span class="btn-down"></span>
                                            <input type="number" name="qty" value="1" min="1" id="qty" max="1000"
                                                placeholder="Quanlity">
                                            <span class="btn-up"></span>
                                        </div>
                                    </div><!-- /.quanlity-box -->

                                


                                    <div class="clearfix"></div>
                                    <?php if (!empty($size)) {?>
                                    <div class="size-box">
                                        <span class="size-text">Size:</span>
                                        <ul>
                                            <?php foreach ($size as $key => $value) {?>
                                            <li>
                                                <label for="" class="<?php echo ($key == 0) ? 'cheked' : '' ?>">
                                                    <span class="c-box"><?php echo $value->size_name ?></span>
                                                    <input <?php echo ($key == 0) ? 'checked' : '' ?> type="radio"
                                                        value="<?php echo $value->id ?>" name="size" id="">
                                                </label>
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <?php }?>

                                    <?php if (!empty($brand)) {?>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div id="accordion">
                                                <div class="accordion-box">
                                                    <div class="card-header" data-toggle="collapse" href="#collapseOne">
                                                        <a class="card-link">
                                                            Select Branding Charges
                                                        </a>
                                                        <span class="float-right">&#43;</span>
                                                    </div>
                                                    <div id="collapseOne" class="collapse show"
                                                        data-parent="#accordion">
                                                        <div class="card-body">
                                                            <p>Note : You can select maximum of 5 Branding Charges</p>
                                                            <?php foreach ($brand as $key => $value) { ?>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox"
                                                                        class="form-check-input brandcheck"
                                                                        name="brand[]" value="<?php echo $value->id ?>">
                                                                    <span
                                                                        class="pl25"><?php echo $value->title.' &nbsp; - &nbsp;  &#8377;'.$value->price ?></span>
                                                                </label>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end accordian -->
                                        </div>

                                    </div>

                                    <?php } }?>

                                    <div class="box-cart style2">
                                        <div class="btn-add-cart">
                                            <?php

                                        if ($product->available_stock > 0) { ?>
                                            <button class="add-cart"
                                                type="<?php echo ($product->available_stock <= 0) ? 'disabled' : '' ?>"
                                                ><img
                                                    src="<?php echo base_url() ?>assets/images/icons/add-cart.png"
                                                    alt="">Add to Cart</button>
                                            <?php }else{ ?>
                                            <button type="button" class="add-cart con-stock"
                                                data-value="<?php echo $product->product_id?>" data-toggle="modal"
                                                data-target="#cnt-update">Contact for stock update</button>
                                            <?php } ?>
                                        </div>

                                    </div><!-- /.box-cart -->
                                </form>


                            </div><!-- /.footer-detail -->
                        </div><!-- /.product-detail -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-product-detail -->
        <?php if (!empty($product->des)) {?>
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


        <!-- ratings -->
        <?php }if (!empty($rating)) {

    $ratingSum = 0;
    $num1 = 0;
    $num2 = 0;
    $num3 = 0;
    $num4 = 0;
    $num5 = 0;
    foreach ($rating as $key => $value) {
        $ratingSum += $value->rating;
        if ($value->rating == 1) {$num1 += 1;} elseif ($value->rating == 2) {$num2 += 1;} elseif ($value->rating == 3) {$num3 += 1;} elseif ($value->rating == 4) {$num4 += 1;} elseif ($value->rating == 5) {$num5 += 1;}
    }
    $avg = $ratingSum / count($rating);
    ?>
        <section class="rating-section">
            <div class="container">
                <div class="row">
                    <div class="push  col-md-6">
                        <div class="rating">
                            <div class="title">
                                Based on <?php echo count($rating) ?> reviews
                            </div>
                            <div class="score">
                                <div class="average-score">
                                    <p class="numb"><?php echo round($avg, 1); ?></p>
                                    <p class="text">Average score</p>
                                </div>
                                <div class="queue">
                                    <?php

    for ($i = 0; $i < 5; $i++) {
        if ($i < round($avg, 0, PHP_ROUND_HALF_DOWN)) {$startCheck = 'ratingStar';} else { $startCheck = '';}
        echo ' <i class="fa fa-star avg-start ' . $startCheck . '" aria-hidden="true"></i>';
    }
    ?>
                                </div>
                            </div>
                            <ul class="queue-box">
                                <li class="five-star">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="start-count"><?php echo $num5 ?></span>
                                    <span class="start-progress">
                                        <span class="start-bar"
                                            style="width: <?php echo (($num5 / count($rating)) * 100) ?>%"></span>
                                    </span>
                                </li>
                                <li class="four-star">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="start-count"><?php echo $num4 ?></span>
                                    <span class="start-progress">
                                        <span class="start-bar"
                                            style="width:<?php echo (($num4 / count($rating)) * 100) ?>%"></span>
                                    </span>
                                </li>
                                <li class="three-star">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="start-count"><?php echo $num3 ?></span>
                                    <span class="start-progress">
                                        <span class="start-bar"
                                            style="width:<?php echo (($num3 / count($rating)) * 100) ?>%"></span>
                                    </span>

                                </li>
                                <li class="two-star">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="start-count"><?php echo $num2 ?></span>
                                    <span class="start-progress">
                                        <span class="start-bar"
                                            style="width:<?php echo (($num2 / count($rating)) * 100) ?>%"></span>
                                    </span>
                                </li>
                                <li class="one-star">
                                    <span>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                    <span class="start-count"><?php echo $num1 ?></span>
                                    <span class="start-progress">
                                        <span class="start-bar"
                                            style="width:<?php echo (($num1 / count($rating)) * 100) ?>%"></span>
                                    </span>
                                </li>
                            </ul>
                        </div><!-- /.rating -->
                    </div><!-- /.col-md-6 -->

                    <div class="col-md-6">
                        <ul class="review-list">
                            <?php foreach ($rating as $key => $value) {?>
                            <li>
                                <div class="review-metadata">
                                    <div class="name">
                                        <?php echo (!empty($value->name)) ? $value->name : 'Unknown';
        echo ' : <span> ' . date("M d, Y", strtotime($value->created_on)) . '</span>' ?>
                                    </div>
                                    <div class="queue">
                                        <?php
for ($i = 0; $i < 5; $i++) {
            if ($i < $value->rating) {$startCheck = 'ratingStar';} else { $startCheck = '';}
            echo ' <i class="fa fa-star avg-start ' . $startCheck . '" aria-hidden="true"></i>';
        }

        ?>

                                    </div>
                                </div><!-- /.review-metadata -->
                                <div class="review-content">
                                    <p>
                                        <?php echo '<span class="bold">' . $value->headline . '</span><br>' . $value->comments ?>
                                    </p>
                                </div><!-- /.review-content -->
                            </li>
                            <?php }?>
                        </ul><!-- /.review-list -->
                    </div><!-- /.col-md-12 -->


                </div>

            </div>
        </section>
        <?php }?>
        <?php $this->load->view('includes/footer');?>

    </div><!-- /.boxed -->


     <!-- The Modal -->
     <div class="modal fade" id="cnt-update">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Contact for stock update</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="col-sm-10 offset-sm-1">
                                                                <!-- contact for stock update form -->
                                                                <form action="<?php echo base_url()?>contact-stockupdate"
                                                                method="post">
                                                                <input type="hidden" name="cn_product" class="products" value="<?php echo $product->product_id ?>">
                                                                <input type="hidden" name="cn_pname" class="products" value="<?php echo $product->title ?>">
                                                                <div class="form-group">
                                                                    <label for="cnt-qty">Enter a Quantity</label>
                                                                    <input type="number" name="cn_quantity" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="">Description</label>
                                                                    <textarea rows="5" class="form-control" name="cn_desc"></textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <button class="checkout" type="submit">Submit</button>
                                                                </div>
                                                            </form>

                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

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

    <?php $this->load->view('includes/searchq');?>
    <script>
    $(function() {

        $(document).on('change', '.brandcheck', function() {
            var ln = $(".brandcheck:checked").length
            if (ln >= 5) {
                $(".brandcheck:not(:checked)").attr("disabled", true);
            } else {
                $(".brandcheck:not(:checked)").removeAttr("disabled");
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
                        '"><td class="brand-td"> <div class="quanlity-box selectbrand" id="selectbrand"> <?php if (!empty($brand)) {?> <div class="colors float-left"> <select name="brand[]" class="brandng-charge"> <option value="">Branding Charges</option> <?php $i=0; foreach ($brand as $key => $value) {echo '<option  value="' . $value->id .'">' . $value->title . '</option>';} $i+=1; ?> </select> </div> <?php }?> </div> </td><td class="brand-td"> <div class="quanlity-box selectbrand" id="selectbrand"> <div class=""> <p class="brandc-price">Price : </p><input type="hidden" name="brandprice[]" class="brandprice"></div> <span class="more-brandc"> <a id="brand-close" class="brandclose"><i class="fa fa-close" aria-hidden="true"></i> </a> </span> </div> </td></tr>'
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