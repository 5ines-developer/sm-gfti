<?php
  $this->ci =& get_instance();
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>View Product </h2>
                                    <span class="hsn ">HSN: <span># <?php echo $product['hsn'] ?></span></span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content v-prd">

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <div class="product-image">
                                                <center>
                                                <img src="<?php echo $this->config->item('web_url').$product['image_path'] ?>" alt="..." />
                                            </center>
                                            </div>
                                        </div>

                                        <?php 
                                        if(!empty($brand)){ ?>
                                        <br />
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <h2>Branding Charges</h2>
                                            <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Price</th>
                                                </tr>
                                            <?php foreach ($brand as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo (!empty($value->title))?$value->title:''?></td>
                                                    <td><?php echo (!empty($value->price))?$value->price.' &#8377':''?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <br />
                                        <?php }  ?>

                                        <?php if(!empty($size)){ ?>
                                        <br />
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <h2>Branding Charges</h2>
                                            <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Size</th>
                                                </tr>
                                            <?php foreach ($size as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo (!empty($value->size_name))?$value->size_name:''?></td>
                                                    <td><?php echo (!empty($value->size))?$value->size:''?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <br />
                                        <?php } ?>


                                        <?php 
                                        if(!empty($marquee)){ ?>
                                        <br />
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <h2>Marquee</h2>
                                            <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Link</th>
                                                </tr>
                                            <?php foreach ($marquee as $key => $value) { ?>
                                                <tr>
                                                    <td><?php echo (!empty($value->title))?$value->title:''?></td>
                                                    <td><?php echo (!empty($value->link))?$value->link:''?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <br />
                                        <?php } ?>
                                        
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12" style="border:0px solid #e5e5e5;">

                                        <h3 class="prod_title"><?php echo (!empty($product['title']))?$product['title']:''?></h3>

                                        <table id="viewproduct">
                                            <tbody>
                                                <tr>
                                                    <th>Product Id</th>
                                                    <td># <?php echo (!empty($product['product_id']))?$product['product_id']:''?></td>
                                                </tr>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <td><?php echo (!empty($product['title']))?$product['title']:''?></td>
                                                </tr>
                                                <tr>
                                                    <th>Category</th>
                                                    <td><?php echo $this->ci->Category_model->categoryname($product['category']) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Stock</th>
                                                    <td><?php echo (!empty($product['total_stock']))?$product['total_stock']:''?></td>
                                                </tr>
                                                <tr>
                                                    <th>Available Stock</th>
                                                    <td><?php echo (!empty($product['available_stock']))?$product['available_stock']:''?></td>
                                                </tr>

                                                <tr class="divide">
                                                    <td colspan="2"></td>
                                                </tr>

                                                <tr>
                                                    <th>Orginal Price</th>
                                                    <td><?php echo (!empty($product['price']))?'&#8377; '.$product['price']:''?></td>
                                                </tr>
                                                <?php if(!empty($product['discount'])){ ?>
                                                <tr>
                                                    <th>Discount  -&nbsp; <?php echo $product['discount'].' %' ?></th>
                                                    <td><?php echo '&#8377; '. ($product['price'] * $product['discount']) / 100 ?></td>
                                                </tr>
                                                <?php } if(!empty($product['gst'])){ ?>
                                                <tr>
                                                    <th>GST -&nbsp; <?php echo (!empty($product['gst']))? $product['gst'].' %':''?></th>
                                                    <td><?php echo '&#8377; '. ($product['price'] * $product['gst']) / 100 ?></td>
                                                </tr>
                                                <?php } if(!empty($product['other_tax'])){ ?>
                                                <tr>
                                                    <th>Other Tax  -&nbsp; <?php echo (!empty($product['other_tax']))? $product['other_tax'].' %':''?></th>
                                                    <td><?php echo '&#8377; '. ($product['price'] * $product['other_tax']) / 100 ?></td>
                                                </tr>
                                                <?php }  ?>
                                                <tr>
                                                    <th>Selling Price</th>
                                                    <td><?php 
                                                        $discount = 0;
                                                        $gst = 0;
                                                        $otax = 0;
                                                        if(!empty($product['discount'])){
                                                            $discount = ($product['price'] * $product['discount']) / 100;
                                                        }
                                                        if(!empty($product['gst'])){
                                                            $gst = ($product['price'] * $product['gst']) / 100;
                                                        }
                                                        if(!empty($product['other_tax'])){
                                                            $otax = ($product['price'] * $product['other_tax']) / 100;
                                                        }
                                                        
                                                        echo  '<span class="rate">&#8377; '. (($gst +  $otax + $product['price']) - $discount) .'</span>';
                                                    
                                                    ?></td>
                                                </tr>
                                                <tr class="divide">
                                                    <td colspan="2"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Added By</th>
                                                    <td><?php echo $this->ci->Product_model->createdby($product['created_by']) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Added On</th>
                                                    <td><?php echo (!empty($product['created_on']))?$product['created_on']:''?></td>
                                                </tr>
                                                <tr>
                                                    <th>Updated On</th>
                                                    <td><?php echo (!empty($product['update_on']))?$product['update_on']:''?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <th>Tags</th>
                                                    <td><?php echo (!empty($product['tags']))?$product['tags']:''?></td>
                                                </tr> -->
                                            </tbody>
                                        </table>

                                        <div class="tagsblock">
                                            <h2>Tags</h2>
                                            <?php  if(!empty($product['tags'])){
                                                $tag = explode(',', $product['tags']);
                                                foreach ($tag as $key => $value) {
                                                    echo  '<span class="label label-primary">'.$value.'</span> &nbsp;&nbsp;' ;
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-10">
                                    <div class="descriptn v-prd">
                                        <h2>Description</h2>
                                        <p><?php echo (!empty($product['des']))?$product['des']:''?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <?php $this->load->view('includes/footer.php'); ?>
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