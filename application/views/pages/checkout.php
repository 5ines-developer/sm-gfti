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

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon/favicon.png">

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


</head>

<body class="header_sticky background">
    <div class="boxed">

        <div class="overlay"></div>

        <?php $this->load->view('includes/header');?>

        <section class="flat-checkout">

            <div class="container">
                <div class="row">
                    <!-- <div class="col-sm-12">
                        <div class="flat-row-title mb15 style1">
                            <h3 class="title">Billing Address&hellip;</h3>
                        </div>
                    </div> -->

                    <div class="col-md-7">

                        <div class="col-sm-12">
                            <div class="flat-row-title mb15 style1">
                                <h3 class="title">Billing Address&hellip;</h3>
                            </div>
                        </div>
                        <div class="box-checkout">
                            <form role="form" method="post" action="<?php echo base_url() ?>save-shipping"
                                class="custom-form">

                                <div class="loderbox">
                                    <div class="text-center">
                                        <div class="spinner">
                                            <div class="double-bounce1"></div>
                                            <div class="double-bounce2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="list-group">
                                    <?php if (!empty($billing)) {?>
                                    <div class="list-group-item">
                                        <div class="list-group-item-heading">
                                            <div class="row ">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-lg" id="biilingaddress"
                                                            required>
                                                            <option value="">
                                                                -----Choose the billing address-----</option>
                                                            <?php foreach ($billing as $key => $value) {
                                                                echo '<option value=' . $value->id . '>' . $value->company_name . ',' . $value->street . '-' . $value->zip_code . '</option>';
                                                            }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline" id="make-ship-div">
                                                <input class="form-check-input" type="checkbox" id="make-ship"
                                                    name="make_ship" value="1">
                                                <label class="form-check-label" for="make-ship">Make this as shipping
                                                    address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </form>
                        </div>

                        <div class="ship-my-order">
                            <div class="col-sm-12">
                                <div class="flat-row-title mb15 style1">
                                    <h3 class="title">Ship my order to&hellip;</h3>
                                </div>
                            </div>
                            <div class="box-checkout">
                                <form role="form" method="post" action="<?php echo base_url() ?>save-shipping"
                                    class="custom-form">

                                    <div class="list-group">
                                        <?php if (!empty($shipping)) {
                                        $ncheck = '';
                                        foreach ($shipping as $key => $value) {?>
                                        <div class="list-group-item">
                                            <div class="list-group-item-heading">
                                                <div class="row radio">
                                                    <div class="col-sm-4">
                                                        <label>
                                                            <input type="radio"
                                                                <?php echo ($value->status == 1) ? 'checked' : '' ?>
                                                                name="optionShipp" class="shippoption"
                                                                value="<?php echo $value->id ?>">
                                                            <?php echo $value->name . ', ' . $value->street ?>
                                                        </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <dl class="dl-small">
                                                            <dt><?php echo $value->name ?></dt>
                                                            <dd><?php echo $value->street . ', ' . $value->street1 . ', ' . $value->city ?>
                                                            </dd>
                                                            <dd><?php echo $value->religion . ' - ' . $value->zip_code ?>
                                                            </dd>
                                                        </dl>
                                                        <button class="btn small-btn btn-info">Edit</button>
                                                        <a href="<?php echo base_url('delte-shipping/') . $value->id . '/checkout' ?>"
                                                            class="btn small-btn btn-link">Delete this address</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }} else { $ncheck = 'checked';}?>
                                        <div class="list-group-item">
                                            <div class="list-group-item-heading">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="radio">
                                                            <label class="bg-lable">
                                                                <input <?php echo $ncheck ?> type="radio"
                                                                    name="optionShipp" id="optionShipp2" value="new">
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
                                                                        placeholder="Enter Phone">
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
                                                                        <option>Andhra Pradesh</option>
                                                                        <option>Arunachal Pradesh</option>
                                                                        <option>Assam</option>
                                                                        <option>Bihar</option>
                                                                        <option>Chhattisgarh</option>
                                                                        <option>Goa</option>
                                                                        <option>Gujarat</option>
                                                                        <option>Haryana</option>
                                                                        <option>Himachal Pradesh</option>
                                                                        <option>Jammu and Kashmir</option>
                                                                        <option>Jharkhand</option>
                                                                        <option>Karnataka</option>
                                                                        <option>Kerala</option>
                                                                        <option>Madhya Pradesh</option>
                                                                        <option>Maharashtra</option>
                                                                        <option>Manipur</option>
                                                                        <option>Meghalaya</option>
                                                                        <option>Mizoram</option>
                                                                        <option>Nagaland</option>
                                                                        <option>Odisha</option>
                                                                        <option>Punjab</option>
                                                                        <option>Rajasthan </option>
                                                                        <option>Sikkim</option>
                                                                        <option>Tamil Nadu</option>
                                                                        <option>Telangana</option>
                                                                        <option>Tripura</option>
                                                                        <option>Uttar Pradesh</option>
                                                                        <option>Uttarakhand</option>
                                                                        <option>West Bengal</option>
                                                                        <option>Andaman and Nicobar</option>
                                                                        <option>Chandigarh</option>
                                                                        <option>Dadar and Nagar Haveli</option>
                                                                        <option>Daman and Diu</option>
                                                                        <option>Delhi</option>
                                                                        <option>Lakshadweep</option>
                                                                        <option>Puducherry</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="inputCity">City</label>
                                                                    <input name="city" type="text" class="form-control"
                                                                        id="inputCity" required
                                                                        placeholder="Enter city">
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

                        <div class="col-sm-12">
                            <div class="flat-row-title mb15 style1">
                                <h3 class="title">Team and Purpose of purchase&hellip;</h3>
                            </div>
                        </div>
                        <div class="box-checkout">
                            <form role="form" method="post" class="custom-form">
                                <div class="list-group">
                                    <?php if (!empty($billing)) {?>
                                    <div class="list-group-item">
                                        <div class="list-group-item-heading team-purpose">
                                            <div class="row ">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="team-department">Team & Department <span
                                                                class="error">*</span></label>
                                                        <textarea class="form-control team-d" id="team-department"
                                                            rows="1" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="purchase-purpose">Purpose of Purchase <span
                                                                class="error">*</span></label>
                                                        <textarea class="form-control team-d" id="purchase-purpose"
                                                            rows="1" required></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <?php }?>
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
                                    $total = 0;
                                    foreach ($cart as $key => $value) {?>
                                    <tr>
                                        <td><?php echo $value->name ?><br><?php echo $value->product_id . ' (' . $value->qty . ' piece)' ?>
                                        </td>
                                        <td>&#8377; <?php echo ($value->qty * $value->price) ?></td>
                                    </tr>
                                    <?php $total = ($total + ($value->qty * $value->price));
                                        }?>
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


                            <div class="">
                                <div id="addres-empty">
                                    <a class="btn small-btn btn-link">Purchase Order</a><br>
                                    <span class="error">Please add shipping address</span>
                                    <input type="hidden"
                                        value="<?php echo (!empty($shipping)) ? count($shipping) : '' ?>"
                                        id="ship-count">
                                </div>

                                <div id="place-chck">

                                    <?php if ($total >= 100000) {?>
                                    <form action="<?php echo base_url() ?>place-order" method="POST"
                                        id="place-order-more">
                                        <a href="#" class="razorpay-payment-button" id="more-lakh">Purchase Order</a>
                                        <input type="hidden" custom="Hidden Element" name="team" id="more-taem">
                                        <input type="hidden" custom="Hidden Element" name="purpose" id="more-purpose">
                                    </form>
                                    <?php } else {?>

                                    <form action="<?php echo base_url() ?>payment/success/" method="POST"
                                        style="float:left;margin-right:10px" id="pay-form">
                                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="rzp_test_ZPtHNE4hO3uWul" data-amount="<?php echo $total . '00' ?>"
                                            data-currency="INR" data-buttontext="Pay via Credit Card"
                                            data-name="Gifting express" data-description="Gifting express"
                                            data-image="<?php echo base_url() ?>assets/images/img/logo.svg"
                                            data-prefill.name="<?php echo $user["name"] ?>"
                                            data-prefill.email="<?php echo $user["email"] ?>"
                                            data-prefill.contact="<?php echo $user["phone"] ?>"
                                            data-theme.color="#009999">
                                        </script>
                                        <input type="hidden" custom="Hidden Element" name="hidden">
                                        <input type="hidden" custom="Hidden Element place-taem" name="team"
                                            id="pay-team">
                                        <input type="hidden" custom="Hidden Element place-purpose" name="purpose"
                                            id="pay-purpose">
                                    </form>

                                    <span style="float:left;line-height: 48px;margin-right:10px">OR</span>
                                    <form action="<?php echo base_url() ?>place-order" method="POST"
                                        id="place-order-less">
                                        <a href="#" class="razorpay-payment-button" id="less-lakh">Purchase Order</a>
                                        <input type="hidden" custom="Hidden Element place-taem" name="team"
                                            id="less-taem">
                                        <input type="hidden" custom="Hidden Element place-purpose" name="purpose"
                                            id="less-purpose">
                                        <input type="hidden" class="bill-val" name="bill_val">
                                    </form>
                                    <?php }?>
                                </div>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgsmDPjut14x5wk&region=GB"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/gmap3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/waves.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/jquery.countdown.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/javascript/main.js"></script>

    <?php $this->load->view('includes/searchq');?>
    <script>
    $(function() {

        //check shipcount - if 0 then show to add address
        var shipcount = $("#ship-count").val();
        if (shipcount > 0) {
            $('#place-chck').css('display', 'block');
            $('#addres-empty').css('display', 'none');
        } else {
            $('#addres-empty').css('display', 'block');
            $('#place-chck').css('display', 'none');
        }

        //destroy the session data
        "<?php echo $this->session->unset_userdata('bill_id'); ?>";



        $(document).on('load, change', '#optionShipp2,  input[type=radio]', function(e) {
            if ($('#optionShipp2').is(':checked')) {
                $('.new-ad-form').css('display', 'block');
            } else {
                $('.new-ad-form').css('display', 'none');
            }

        });



        $('.shippoption').change(function(e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>shipping-change",
                data: {
                    id: id
                },
                success: function(response) {

                }
            });

        });
    });

    //billing addres selected - show check box to make a ship address
    $(document).ready(function() {
        if ($('#optionShipp2').is(':checked')) {
            $('.new-ad-form').css('display', 'block');
        } else {
            $('.new-ad-form').css('display', 'none');
        }

        //select dropdown input
        $('#biilingaddress').select2();


        //billing address check box show
        $("#biilingaddress").change(function() {
            var bill = $("#biilingaddress option:selected").val();
            if (bill != '' && bill != '0') {
                $('#make-ship-div').css('display', 'block');
            } else {
                $('#make-ship-div').css('display', 'none');
            }
        });

        //send values if price is more than 1lakh 
        $("#more-lakh").click(function() {
            var team = $("#team-department").val();
            var purpose = $("#purchase-purpose").val();
            var bill = $("#biilingaddress option:selected").val();

            if (bill == '') {
                $("#biilingaddress").next(".error").remove();
                $("#biilingaddress").after(
                    "<span class ='error'> Please Select the billing address</span>");
                return false;
            }

            if (team != '' && purpose != '') {
                $("#more-taem").val(team);
                $("#more-purpose").val(purpose);
                $(".bill-val").val(bill);

                var taemval = $("#more-taem").val();
                var purposeval = $("#more-purpose").val();
                var billval = $(".bill-val").val();

                if (team != '' && purpose != '' && bill != '') {
                    $('#place-order-more').submit();
                } else {
                    return false;
                }

            } else {
                $(".team-d").next("span").remove();
                $("#team-department").after("<span class ='error'>Please enter a team detail</span>");
                $("#purchase-purpose").after(
                    "<span class ='error'> Please enter a purpose of purchase</span>");
                return false;
            }

        });

        //send values if price is more than 1lakh 
        $("#pay-form").submit(function() {
            var team = $("#team-department").val();
            var purpose = $("#purchase-purpose").val();
            var bill = $("#biilingaddress option:selected").val();

            if (bill == '') {
                $("#biilingaddress").next(".error").remove();
                $("#biilingaddress").after(
                    "<span class ='error'> Please Select the billing address</span>");
                return false;
            }

            if (team != '' && purpose != '') {
                $("#more-taem").val(team);
                $("#more-purpose").val(purpose);
                $(".bill-val").val(bill);

                var taemval = $("#pay-taem").val();
                var purposeval = $("#pay-purpose").val();
                var billval = $(".bill-val").val();

                if (team != '' && purpose != '' && bill != '') {
                    $('#pay-form').submit();
                } else {
                    return false;
                }

            } else {
                $(".team-d").next("span").remove();
                $("#team-department").after("<span class ='error'>Please enter a team detail</span>");
                $("#purchase-purpose").after(
                    "<span class ='error'> Please enter a purpose of purchase</span>");
                return false;
            }

        });




        //send values if price is less than 1lakh
        $("#less-lakh").click(function() {
            var team = $("#team-department").val();
            var purpose = $("#purchase-purpose").val();

            var bill = $("#biilingaddress option:selected").val();

            if (bill == '') {
                $("#biilingaddress").next(".error").remove();
                $("#biilingaddress").after(
                    "<span class ='error'> Please Select the billing address</span>");
                return false;
            }

            if (team != '' && purpose != '') {
                $("#less-taem").val(team);
                $("#less-purpose").val(purpose);
                $(".bill-val").val(bill);

                var taemval = $("#less-taem").val();
                var purposeval = $("#less-purpose").val();
                var billval = $(".bill-val").val();

                if (team != '' && purpose != '') {
                    $('#place-order-less').submit();
                } else {
                    return false;
                }

            } else {
                $(".team-d").next("span").remove();
                $("#team-department").after("<span class ='error'>Please enter a team detail</span>");
                $("#purchase-purpose").after(
                    "<span class ='error'> Please enter a purpose of purchase</span>");
                return false;
            }

        });





        // make billing address as shipping address
        $("#make-ship").click(function() {
            var bill = $("#biilingaddress option:selected").val();
            if ($("#make-ship").prop('checked') == true) {
                if (bill != '' && bill != '0') {
                    $('.ship-my-order').css('display', 'none');
                    loder(true);
                    $.ajax({
                        url: "<?php echo base_url(); ?>bill-session",
                        type: "get",
                        dataType: "html",
                        data: {
                            "biilid": bill
                        },
                        success: function(data) {
                            if (data > 0) {
                                $('#place-chck').css('display', 'block');
                                $('#addres-empty').css('display', 'none');
                            }
                            loder(false);
                        }
                    });
                }
            } else {
                "<?php echo $this->session->unset_userdata('bill_id'); ?>";
                $('.ship-my-order').css('display', 'block');
                var shipcount = $("#ship-count").val();
                if (shipcount > 0) {
                    $('#place-chck').css('display', 'block');
                    $('#addres-empty').css('display', 'none');
                } else {
                    $('#addres-empty').css('display', 'block');
                    $('#place-chck').css('display', 'none');
                }
            }
        });

        //page loader
        function loder(status) {
            if (status == true) {
                $('.loderbox').css('display', 'block');
            } else {
                $('.loderbox').css('display', 'none');
            }
        }
    });
    </script>
</body>

</html>