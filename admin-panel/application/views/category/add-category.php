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
                            <h3></h3>
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
                                    <h2>Add Category</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form action="<?php echo base_url() ?>insert-category" method="post"
                                        enctype="multipart/form-data" id="submitform" 
                                        class="form-horizontal form-label-left">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">

                                                <?php if(!empty($category['image']))
                                                {?>
                                                    <div class="form-group">
                                                        <input type="hidden" name="edit" value="edit">
                                                        <div class="col-md-6 col-md-offset-3" id="edt-image">
                                                            <div class="">
                                                                <div class="image view view-first">
                                                                    <img style="width: 100%; display: block;"
                                                                    src="<?php echo $this->config->item('web_url').$category['path'] ?>"
                                                                    alt="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
                                                <?php }?>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                        for="first-name">Category Name<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <input type="text" id="first-name" required="required"
                                                            class="form-control col-md-7 col-xs-12" name="category"
                                                            value="<?php echo (!empty($category['name']))?$category['name']:''; ?>">
                                                    </div>
                                                </div>

                                                <input name="image" class="ipimg" type="hidden" value="<?php echo (!empty($category['image']))?$category['image']:''  ?>">
                                                <input type="hidden" value="<?php echo (!empty($category['uniqid']))?$category['uniqid']:random_string('alnum','20');  ?>"
                                                    name="uniq">

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12 mb-20"
                                                        for="upload">Select Image<span class="required">*</span></label>
                                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                                        <input type="file" id="upload" class="form-control col-md-7 col-xs-12"
                                                        <?php echo (empty($category['name']))?'required="required"':''; ?>  >
                                                        <br><br>
                                                        <p><small>(For good view use 1000 x 451px ratio image)</small>
                                                        </p>
                                                        <input name="bancheck" class="bancheck" type="hidden" value="">
                                                    </div>
                                                </div><br>
                                                <div class="form-group">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                        <button type="submit"
                                                            class="btn btn-success upload-result">Submit</button>
                                                        <button class="btn btn-primary" type="reset">Reset</button>
                                                    </div>
                                                </div><br>
                                            </div>

                                            <div class="col-md-5 text-center">
                                                    <div id="upload-demo" style="padding: 0;"></div>
                                                </div><br>




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
    <script src="<?php echo base_url()?>assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url()?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url()?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url()?>assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>

    <script src="<?php echo base_url()?>assets/build/js/croppie.js"></script>

    <script>
    $(document).ready(function() {
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 390,
                height: 201,
                type: 'box'
            },
            boundary: {
                width: 450,
                height: 250
            }
        });

        $('#upload').on('change', function() {
             $('.bancheck').val($('.bancheck').val() + '1');
            var reader = new FileReader();
            reader.onload = function(e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('.upload-result').on('click', function(ev) {
            $(".loder-box").css("display", "flex");

            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport',
                format: 'jpeg',
                quality: 1


            }).then(function(resp) {
                $('.ipimg').val(resp);
                $('#submitform').submit();
            });
        });

    });
    </script>


    <script>
    $(document).ready(function() {
        $('#message1').toggleClass('in');
        setTimeout(function() {
            $('.alert').fadeOut(3000)
        }, 4000);
    });
    </script>

</body>

</html>