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

        <section class="flat-shop-cart  ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="flat-row-title style1">
                            <h3>Shopping Cart</h3>
                        </div>

                        <?php  foreach ($cart as $key => $value) { ?>
                          
                            <div class="cart-items">
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="cart-item-content">
                                                <div class="c-title">
                                                    <span><a href="<?php echo base_url('product/').$value->product_id ?>"><?php echo $value->ptitle ?></a></span>
                                                </div>
                                                <div class="c-category">
                                                    <p><span><?php echo $value->name ?></p>
                                                    <p><span>SKU: </span> <?php echo $value->product_id ?></p>
                                                </div>
                                                <div class="c-price">
                                                    <p>&#8377; <span><?php echo ($value->price * $value->qty) + ($value->qty * $value->bprice )?></span></p>
                                                </div>
                                                <div class="brand-charge">
                                                    <div class="footer-detail">
                                                        <div class="quanlity-box">
                                                            <div class="colors">
                                                                <select name="color">
                                                                    <option value="">Select Color</option>
                                                                    <option value="">Black</option>
                                                                    <option value="">Red</option>
                                                                    <option value="">White</option>
                                                                </select>
                                                            </div>
                                                        </div><!-- /.quanlity-box -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="cart-item-image">
                                                <img src="http://localhost/siemens/product-image/pro%20(48).jpg" class=""
                                                    alt="">
                                                <div class="quanlity">
                                                    <span class="btn-down"></span>
                                                    <input type="number" class="qtyi" name="number" value="<?php echo $value->qty ?>" min="1" max="100"
                                                        placeholder="Quanlity">
                                                    <span class="btn-up"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div><!-- /.col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="cart-totals ">
                            <h3>Cart Totals</h3>
                            <form action="#" method="get" accept-charset="utf-8">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td class="subtotal">$2,589.00</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="btn-radio">
                                                <div class="radio-info">
                                                    <input type="radio" id="flat-rate" checked name="radio-flat-rate">
                                                    <label for="flat-rate">Flat Rate: <span>$3.00</span></label>
                                                </div>
                                                <div class="radio-info">
                                                    <input type="radio" id="free-shipping" name="radio-flat-rate">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="btn-shipping">
                                                    <a href="#" title="">Calculate Shipping</a>
                                                </div>
                                            </td><!-- /.btn-radio -->
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td class="price-total">$1,591.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btn-cart-totals">

                                    <a href="#" class="checkout" title="">Proceed to Checkout</a>
                                </div><!-- /.btn-cart-totals -->
                            </form><!-- /form -->
                        </div><!-- /.cart-totals -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-shop-cart -->

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
    $(document).ready(function() {
        $('.quanlity').find('.btn-down').click(function(e) {
            e.preventDefault();
            var qty = $(this).siblings('.qtyi').val();

            if (qty > 1) {
                var newqty = qty -= 1;
                $(this).siblings('.qtyi').val(newqty);
            }
        });
        $('.quanlity').find('.btn-up').click(function(e) {
            e.preventDefault();
            var qty = $(this).siblings('.qtyi').val();
            var newqty = parseInt(qty) + parseInt(1);
            $(this).siblings('.qtyi').val(newqty);
        });
    });
    </script>
</body>

</html>