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

        <section class="flat-checkout">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="flat-row-title mb15 style1">
                            <h3 class="title">Ship my order to&hellip;</h3>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="box-checkout">


                            <form action="#" method="get" class="" accept-charset="utf-8">

                                <div class="list-group">
                                    <div class="list-group-item">
                                        <div class="list-group-item-heading">
                                            <div class="row radio">
                                                <div class="col-xs-3">
                                                    <label>
                                                        <input type="radio" name="optionShipp" id="optionShipp1"
                                                            value="option2">
                                                        1509 Latona St
                                                    </label>
                                                </div>
                                                <div class="col-xs-5">
                                                    <dl class="dl-small">
                                                        <dt>Miguel Perez</dt>
                                                        <dd>1509 Latona St, Philadelphia, PA 19146 </dd>
                                                    </dl>
                                                    <button class="btn btn-sm">Edit</button>
                                                    <button class="btn btn-sm btn-link">Delete this address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="list-group-item-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="optionShipp" id="optionShipp2"
                                                                value="option2" checked>
                                                            A new address
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-9">
                                                    <form role="form" class="">
                                                        <div class="form-group">
                                                            <label for="inputname">Name</label>
                                                            <input type="text" class="form-control form-control-large"
                                                                id="inputname" placeholder="Enter name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddress1">Street address 1</label>
                                                            <input type="text" class="form-control form-control-large"
                                                                id="inputAddress1" placeholder="Enter address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddress2">Street address 2</label>
                                                            <input type="text" class="form-control form-control-large"
                                                                id="inputAddress2" placeholder="Enter address">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                    <label for="inputZip">ZIP Code</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-small"
                                                                        id="inputZip" placeholder="Enter zip">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <div class="form-group">
                                                                    <label for="inputCity">City</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputCity" placeholder="Enter city">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputState" class="control-label">State</label>
                                                            <select class="form-control form-control-large">
                                                                <option>Select state</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                    <button class="btn btn-sm">Save Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form><!-- /.checkout -->
                        </div><!-- /.box-checkout -->
                    </div><!-- /.col-md-7 -->
                    <div class="col-md-5">
                        <div class="cart-totals style2">
                            <h3>Your Order</h3>
                            <form action="#" method="get" accept-charset="utf-8">
                                <table class="product">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Apple iPad Mini<br>G2356</td>
                                            <td>$99.00</td>
                                        </tr>
                                        <tr>
                                            <td>Beats Pill + Portable<br>Speaker</td>
                                            <td>$100.00</td>
                                        </tr>
                                    </tbody>
                                </table><!-- /.product -->
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Total</td>
                                            <td class="subtotal">$1,999.00</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td class="btn-radio">
                                                <div class="radio-info">
                                                    <input type="radio" checked="" id="flat-rate"
                                                        name="radio-flat-rate">
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
                                            <td class="price-total">$1,999.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btn-radio style2">
                                    <div class="radio-info">
                                        <input type="radio" id="flat-payment" checked="" name="radio-cash-2">
                                        <label for="flat-payment">Check Payments</label>
                                        <p>Please send a check to Store Name, Store Street, Store <br>Town, Store State
                                            / County, Store Postcode.</p>
                                    </div>
                                    <div class="radio-info">
                                        <input type="radio" id="bank-transfer" name="radio-cash-2">
                                        <label for="bank-transfer">Direct Bank Transfer</label>
                                    </div>
                                    <div class="radio-info">
                                        <input type="radio" id="cash-delivery" name="radio-cash-2">
                                        <label for="cash-delivery">Cash on Delivery</label>
                                    </div>
                                    <div class="radio-info">
                                        <input type="radio" id="paypal" name="radio-cash-2">
                                        <label for="paypal">Paypal</label>
                                    </div>
                                </div><!-- /.btn-radio style2 -->
                                <div class="checkbox">
                                    <input type="checkbox" id="checked-order" name="checked-order" checked="">
                                    <label for="checked-order">I’ve read and accept the terms &amp; conditions *</label>
                                </div><!-- /.checkbox -->
                                <div class="btn-order">
                                    <a href="#" class="order" title="">Place Order</a>
                                </div><!-- /.btn-order -->
                            </form>
                        </div><!-- /.cart-totals style2 -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
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
</body>

</html>