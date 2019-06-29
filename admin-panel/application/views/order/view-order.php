<?php
  $this->ci =& get_instance();
  $this->ci->load->model('Order_model');
  $this->ci->load->model('Product_model');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url()?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
        rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url()?>assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo base_url()?>assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url()?>assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url()?>assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <style>
    p {
        font-size: 12px;
    }

    .banner-button {
        float: right;
    }
    </style>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <?php $this->load->view('includes/header.php'); ?>

            <?php $this->load->view('includes/sidebar.php'); ?>




            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <!-- <h3>product</h3> -->
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>View Order</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="product-image">
                                                <img src="<?php echo $this->config->item('web_url').$this->ci->Order_model->productimage($order['product']) ?>"
                                                    alt="..." />

                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12" style="border:0px solid #e5e5e5;">

                                            <h3 class="prod_title ord">
                                            <?php echo $this->ci->Product_model->productname($order['product']) ?></h3>

                                            <table id="viewproduct">
                                                <tbody>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <td><?php echo (!empty($order['product']))?$order['product']:''?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quantity</th>
                                                        <td><?php echo (!empty($order['qty']))?$order['qty']:''?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ordered On</th>
                                                        <td><?php echo (!empty($order['orderd_on']))?$order['orderd_on']:''?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td><?php echo (!empty($order['price']))?$order['price'].' &#8377;':''?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ordered By</th>
                                                        <td><?php echo $this->ci->Order_model->orderby($order['order_by']) ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status</th>
                                                        <td><?php echo (!empty($order['status']))?$order['status']:''?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="x_panel">
                                <h2>Shipping Address</h2>
                                <div class="x_content">
                                    <?php $shippindaddress = $this->ci->Order_model->shipping($order['shipping']); 

                                if (!empty($shippindaddress)) {
                                    foreach ($shippindaddress as $key => $value) { ?>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="">
                                            <table id="shipping-box-address" class="table viedet "
                                                style="margin-bottom: 0px;">
                                                <tr>
                                                    <th>Street</th>
                                                    <td><?php echo (!empty($value->street))?$value->street:''  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td><?php echo (!empty($value->city))?$value->city:''  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td><?php echo (!empty($value->religion))?$value->religion:''  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td><?php echo (!empty($value->country))?$value->country:''  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Zip code</th>
                                                    <td><?php echo (!empty($value->zip_code))?$value->zip_code:''  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td><?php echo (!empty($value->phone))?$value->phone:''  ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?php echo (!empty($value->email))?$value->email:''  ?> </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } }  ?>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="x_panel">
                                <h2>Billing Address</h2>
                                <div class="x_content">
                                    <?php $billingaddress = $this->ci->Order_model->billing($order['billing']); 

                                if (!empty($billingaddress)) {
                                    foreach ($billingaddress as $key => $value) { ?>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="">
                                            <table id="shipping-box-address" class="table viedet "
                                                style="margin-bottom: 0px;">
                                                <tr>
                                                    <th>Street</th>
                                                    <td><?php echo (!empty($value->street))?$value->street:''  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>City</th>
                                                    <td><?php echo (!empty($value->city))?$value->city:''  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Religion</th>
                                                    <td><?php echo (!empty($value->religion))?$value->religion:''  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Country</th>
                                                    <td><?php echo (!empty($value->country))?$value->country:''  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Zip code</th>
                                                    <td><?php echo (!empty($value->zip_code))?$value->zip_code:''  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td><?php echo (!empty($value->phone))?$value->phone:''  ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?php echo (!empty($value->email))?$value->email:''  ?> </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <?php } }  ?>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    <p>©2019 Weaves! All Rights Reserved. Developed by - <a href="http://www.5ines.com/"
                            style="color: saddlebrown" target="_blank">5ine</a> </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js">
    </script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#message1').toggleClass('in');
        setTimeout(function() {
            $('.alert').fadeOut(3000)
        }, 4000);
    });
    </script>

    <script>
    $(document).ready(function() {

        $(".exdelete").click(function() {
            if (!confirm("Are you sure you want to delete this item?")) {
                return false;
            }
        });
    })
    </script>


</body>

</html>