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
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url()?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url()?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url()?>assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url()?>assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/build/css/croppie.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
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
                            <!--  <h3>Product</h3> -->
                        </div>
                        <div class="title_right">
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('success')) { ?>
                    <div class="col-sm-12 ">
                        <div class="alert alert-success" role="alert" id="message1">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
                            <p><strong>Success!
                                </strong>&nbsp;&nbsp;<span><?php echo $this->session->flashdata('success') ?></span></p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                    <div class="col-sm-12 ">
                        <div class="alert alert-danger" role="alert" id="message1">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
                            <p><strong>Error!
                                </strong>&nbsp;&nbsp;<span><?php echo $this->session->flashdata('error') ?></span></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Add Product</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?php echo base_url() ?>insert-product" method="post"
                                        enctype="multipart/form-data" id="productform"
                                        class="form-horizontal form-label-left">
                                        <div class="row">
                                            <div class="col-md-10 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name">Product Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="text" id="first-name" required="required"
                                                            class="form-control col-md-7 col-xs-12" name="product"
                                                            value="<?php echo (!empty($product['title']))?$product['title']:''; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select
                                                        Category<span class="required">*</span></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <select class="form-control" name="category"
                                                            required="required">
                                                            <option value="">-----Select-----</option>
                                                            <?php
                                                                                foreach ($category as $key => $value) { ?>
                                                            <option value="<?php echo $value->id ?>"
                                                                <?php if(!empty($product['category']) && $value->id == $product['category']){ echo 'selected'; } ?>>
                                                                <?php echo $value->name ?> </option>
                                                            <?php  } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name">Price<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="number" id="first-name" required="required"
                                                            class="form-control col-md-7 col-xs-12" name="price"
                                                            value="<?php echo (!empty($product['price']))?$product['price']:''; ?>">
                                                    </div>
                                                </div>






                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name"><span class="required"></span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <div class="brand-pricing <?php echo(!empty($brand))?'collapsed':''; ?>" data-toggle="collapse"
                                                            data-target="#marquee">
                                                            <h5>Marquee<span class="branddown"><i
                                                                        class="fa fa-chevron-down"
                                                                        aria-hidden="true"></i> </span></h5>
                                                        </div>
                                                        <div id="marquee" class="brand-pricing collapse <?php echo(!empty($brand))?'in':''; ?>">



                                                            <?php 
                                                            if(!empty($marquee)){
                                                            foreach ($marquee as $key => $value) { ?>

                                                            <div class="row" id="marqaddnext">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 mar-12">
                                                                <input type="text" class="form-control " name="marquee_title[]" placeholder="Marquee title" value="<?php  echo(!empty($value->title))?$value->title:'';  ?>">

                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <input type="test" class="form-control "
                                                                        name="marquee_link[]" placeholder="Marquee link" value="<?php  echo(!empty($value->link))?$value->link:'';  ?>">
                                                                        <input type="hidden" value="<?php  echo(!empty($value->uniq))?$value->uniq:'';  ?>" name="marqueeunq[]">
                                                                </div>
                                                                <div class="col-md-2 col-sm-2">
                                                                    <a id="brandremove" class="marqueeremove brandplus remov" value="<?php echo $value->id ?>"><i
                                                                            class="fa fa-times" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <?php } } ?>
                                                            <div class="row" id="marqaddnext">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 mar-12">
                                                                    <input type="text" class="form-control "
                                                                        name="marquee_title[]" placeholder="Marquee title" value="">
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <input type="test" class="form-control "
                                                                        name="marquee_link[]" placeholder="Marquee link" value="">
                                                                </div>
                                                                <div class="col-md-2 col-sm-2">
                                                                    <a id="marqueeplus" class="marqueeplus"><i
                                                                            class="fa fa-plus" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>













                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name">Total Stock<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="number" id="first-name" required="required"
                                                            class="form-control col-md-7 col-xs-12" name="stock"
                                                            value="<?php echo (!empty($product['total_stock']))?$product['total_stock']:''; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="control-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Input
                                                            Tags</label>
                                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                                            <input id="tags_1" type="text" class="tags form-control"
                                                                value="<?php echo (!empty($product['tags']))?$product['tags']:''; ?>"
                                                                name="tags" />
                                                            <p style="color:red"><small>(Please press enter or comma For
                                                                    seperate tags)</small>
                                                                <!-- <div id="suggestions-container"
                                                                                        style="position: relative; float: left; width: 250px; margin: 10px;">
                                                                                    </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name"><span class="required"></span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <div class="brand-pricing <?php echo(!empty($brand))?'collapsed':''; ?>" data-toggle="collapse"
                                                            data-target="#demo">
                                                            <h5>Add Brand Charges <span class="branddown"><i
                                                                        class="fa fa-chevron-down"
                                                                        aria-hidden="true"></i> </span></h5>
                                                        </div>
                                                        <div id="demo" class="brand-pricing collapse <?php echo(!empty($brand))?'in':''; ?>">



                                                            <?php 
                                                            if(!empty($brand)){
                                                            foreach ($brand as $key => $value) { ?>

                                                            <div class="row" id="addnext">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 mar-12">
                                                                    <input type="text" class="form-control "
                                                                        name="brand_title[]" placeholder="Brand title"
                                                                        value="<?php  echo(!empty($value->title))?$value->title:'';  ?>">
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <input type="number" class="form-control "
                                                                        name="brand_price[]" placeholder="Brand price"
                                                                        value="<?php  echo(!empty($value->title))?$value->price:'';  ?>">
                                                                        <input type="hidden" value="<?php  echo(!empty($value->brand_uniq))?$value->brand_uniq:'';  ?>" name="brndunq[]">
                                                                </div>
                                                                <div class="col-md-2 col-sm-2">
                                                                    <a id="brandremove" class="brandremove brandplus remov" value="<?php echo $value->id ?>"><i
                                                                            class="fa fa-times" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <?php } } ?>
                                                            <div class="row" id="addnext">
                                                                <div class="col-md-6 col-sm-6 col-xs-12 mar-12">
                                                                    <input type="text" class="form-control "
                                                                        name="brand_title[]" placeholder="Brand title" value="">
                                                                </div>
                                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                                    <input type="number" class="form-control "
                                                                        name="brand_price[]" placeholder="Brand price" value="">
                                                                </div>
                                                                <div class="col-md-2 col-sm-2">
                                                                    <a id="brandplus" class="brandplus"><i
                                                                            class="fa fa-plus" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name">Description<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <textarea name="description" id="editor"
                                                            class="form-control col-md-7 col-xs-12"><?php echo (!empty($product['des']))?$product['des']:''; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12 mb-20"
                                                        for="upload ">Product Image<span
                                                            class="required">*</span></label>
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                        <input type="file" id="upload"
                                                            class="form-control col-md-7 col-xs-12" name="pimage"
                                                            <?php echo (empty($product['image_thumbnail']))?'required="required"':''; ?>
                                                           >
                                                        <p style="color:red"><small>Only PNG|JPG|JPEG Files are
                                                                allowed</small>
                                                    </div>
                                                </div>

                                                <?php if(!empty($product['image_thumbnail']))
                                                                        {?>
                                                <div class="form-group">
                                                    <input type="hidden" name="edit" value="edit">
                                                    <div class="col-md-4 col-md-offset-3" id="edt-image">
                                                        <div class="">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;"
                                                                    src="<?php echo $this->config->item('web_url').'product-image/'.$product['image_thumbnail'] ?>"
                                                                    alt="image">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>


                                                <input type="hidden"
                                                    value="<?php echo (!empty($product['product_id']))?$product['product_id']:random_string('numeric','8');  ?>"
                                                    name="uniq">
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit"
                                                            class="btn btn-success upload-result">Submit</button>
                                                        <button class="btn btn-primary" type="reset">Reset</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
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
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url()?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url()?>assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url()?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <!-- <script src="<?php echo base_url()?>assets/vendors/parsleyjs/dist/parsley.min.js"></script> -->
    <!-- Autosize -->
    <script src="<?php echo base_url()?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url()?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url()?>assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/build/js/croppie.js"></script>
    <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
    <!-- <script>
    initSample();
</script> -->
    <script>
    CKEDITOR.replace('editor');
    </script>
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

        $(function() {
            $('#brandplus').on('click', function(e) {
                e.preventDefault();
                $('<div class="row"><div class="col-md-6 col-sm-6 col-xs-12 mar-12"><input type="text"class="form-control " name="brand_title[]" placeholder="Brand title"></div> <div class="col-md-4 col-sm-4 col-xs-12"> <input type="number"class="form-control" name="brand_price[]" placeholder="Brand price"> </div> <div class="col-md-2 col-sm-2"> <a id="brandplus" class="brandplus remov"><i class="fa fa-times" aria-hidden="true"></i></a></div></div>')
                    .append().insertAfter('#addnext');

            });
            $(document).on('click', '.brandplus.remov', function(e) {
                e.preventDefault();
                $(this).closest('div.row').remove();
            });
        });
    });
    </script>


    <script>
    $(document).ready(function() {

        $(function() {
            $('#marqueeplus').on('click', function(e) {
                e.preventDefault();
                $('<div class="row"><div class="col-md-6 col-sm-6 col-xs-12 mar-12"><input type="text"class="form-control " name="marquee_title[]" placeholder="Marquee title"></div> <div class="col-md-4 col-sm-4 col-xs-12"> <input type="text"class="form-control" name="marquee_link[]" placeholder="Marquee link"> </div> <div class="col-md-2 col-sm-2"> <a id="brandplus" class="marqueeplus remov"><i class="fa fa-times" aria-hidden="true"></i></a></div></div>')
                    .append().insertAfter('#marqaddnext');

            });
            $(document).on('click', '.marqueeplus.remov', function(e) {
                e.preventDefault();
                $(this).closest('div.row').remove();
            });
        });
    });
    </script>

    
<script>
    $(document).ready(function() {
        $('.brandremove').on('click', function(e) {
            e.preventDefault();
            var brandid = $(this).attr('value');

            if (!confirm("Are you sure you want to delete this item?")){
                  return false;
                }else{
                    $.ajax({
                    url: "<?php echo base_url();?>delete-brand",
                    type: "get",
                    data: {
                        "brandid": brandid,
                    },
                    success: function(data) {
                        if (!empty(data)) {
                            alert('ok');
                        }else{
                            alert('not ok')
                        }
                    }
                });
            }
        });
    });
    </script>


<script>
    $(document).ready(function() {
        $('.marqueeremove').on('click', function(e) {
            e.preventDefault();
            var marqueid = $(this).attr('value');

            if (!confirm("Are you sure you want to delete this item?")){
                  return false;
                }else{
                    $.ajax({
                    url: "<?php echo base_url();?>delete-marquee",
                    type: "get",
                    data: {
                        "marqueid": marqueid,
                    },
                    success: function(data) {
                        if (!empty(data)) {
                            alert('ok');
                        }else{
                            alert('not ok')
                        }
                    }
                });
            }
        });
    });
    </script>

</body>

</html>