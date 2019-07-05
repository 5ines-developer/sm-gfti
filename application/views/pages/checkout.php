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

                            <form role="form" method="post" action="<?php echo base_url() ?>save-shipping"
                                class="custom-form">

                                <div class="list-group">
                                    <?php if(!empty($shipping)){ 
                                            $ncheck = '';
                                         foreach ($shipping as $key => $value) { ?>
                                    <div class="list-group-item">
                                        <div class="list-group-item-heading">
                                            <div class="row radio">
                                                <div class="col-sm-4">
                                                    <label>
                                                        <input type="radio"
                                                            <?php echo($value->status == 1)? 'checked' : '' ?>
                                                            name="optionShipp" class="shippoption"
                                                            value="<?php echo $value->id ?>">
                                                        <?php echo $value->name. ', '.  $value->street ?>
                                                    </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <dl class="dl-small">
                                                        <dt><?php echo $value->name ?></dt>
                                                        <dd><?php echo $value->street.', '.$value->street1.', '.$value->city ?>
                                                        </dd>
                                                        <dd><?php echo $value->religion.' - '.$value->zip_code ?> </dd>
                                                    </dl>
                                                    <button class="btn small-btn btn-info">Edit</button>
                                                    <button class="btn small-btn btn-link">Delete this address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } } else{ $ncheck = 'checked';  }?>
                                    <div class="list-group-item">
                                        <div class="list-group-item-heading">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="radio">
                                                        <label class="bg-lable">
                                                            <input <?php echo $ncheck ?> type="radio" name="optionShipp"
                                                                id="optionShipp2" value="new">
                                                            A new address
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 new-ad-form">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputname">Name</label>
                                                                <input type="text"
                                                                    class="form-control form-control-large"
                                                                    id="inputname" name="name" required
                                                                    placeholder="Enter name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputname">Phone</label>
                                                                <input type="number"
                                                                    class="form-control form-control-large"
                                                                    id="inputname" name="phone" required
                                                                    placeholder="Enter name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputAddress1">Street address 1</label>
                                                                <input type="text"
                                                                    class="form-control form-control-large"
                                                                    id="inputAddress1" name="street" required
                                                                    placeholder="Enter address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputAddress2">Street address 2</label>
                                                                <input type="text"
                                                                    class="form-control form-control-large"
                                                                    id="inputAddress2" name="street1"
                                                                    placeholder="Enter address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputState"
                                                                    class="control-label">State</label>
                                                                <select name="state"
                                                                    class="form-control form-control-large">
                                                                    <option>Select state</option>
                                                                    <option>Karnataka</option>
                                                                    <option>Kerala</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputCity">City</label>
                                                                <input name="city" type="text" class="form-control"
                                                                    id="inputCity" required placeholder="Enter city">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="inputZip">ZIP Code</label>
                                                                <input name="zip" type="text"
                                                                    class="form-control form-control-small"
                                                                    id="inputZip" required placeholder="Enter zip">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="custom-btn" type="submit">Save Address</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="cart-totals style2">
                            <h3>Your Order</h3>
                            
                                <table class="product">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $total = 0 ;
                                            foreach ($cart as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value->name ?><br><?php  echo $value->product_id.' ('. $value->qty .' piece)'  ?>
                                            </td>
                                            <td>&#8377; <?php echo ($value->qty * $value->price) ?></td>
                                        </tr>
                                        <?php 
                                            $total = ($total +  ($value->qty * $value->price));
                                        } ?>
                                    </tbody>
                                </table><!-- /.product -->
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Total</td>
                                            <td class="price-total">&#8377; <?php echo $total ?></td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="btn-order">
                                    <a href="<?php echo base_url() ?>place-order" class="order" title="">Place Order</a>
                                </div><!-- /.btn-order -->
                            
                        </div><!-- /.cart-totals style2 -->
                    </div><!-- /.col-md-5 -->
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
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgsmDPjut14x5wk&region=GB"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waves.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.countdown.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/main.js"></script>

    <?php $this->load->view('includes/searchq'); ?>
    <script>
    $(function() {

        $(document).on('load, change', '#optionShipp2,  input[type=radio]', function(e) {
            if ($('#optionShipp2').is(':checked')) {
                $('.new-ad-form').css('display', 'block');
            } else {
                $('.new-ad-form').css('display', 'none');
            }

        });

        $('.shippoption').change(function (e) { 
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>shipping-change",
                data: {id : id},
                success: function (response) {
                   
                }
            });
            
        });
    });

    $(document).ready(function() {
        if ($('#optionShipp2').is(':checked')) {
            $('.new-ad-form').css('display', 'block');
        } else {
            $('.new-ad-form').css('display', 'none');
        }
    });
    </script>
</body>

</html>