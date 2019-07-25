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

   /*--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--*/


.clear {
	clear:both;
}

.content{
	margin:3% auto 0 auto;
	height:460px;
	background-color:#F5F5F5;
}
.content1 {
	background-color:#98d091;
	text-align:center;
	padding:2em;
}
.content1 h2 {
	font-family: 'Open Sans', sans-serif;
	text-transform:uppercase;
	margin:0;
	color:#fff;
}
.content2 {
	background-color:#b5e6ae;
}
.content2-header1 {
	float:left;
	width:27%;
	text-align:center;
	padding:1.5em;
}
.content2-header1 p {
	font-family: 'Open Sans', sans-serif;
	font-size:16px;
	font-weight:700;
	color:#4E7D48;
	margin:0;
}
.content2-header1 span {
	font-size:14px;
	font-weight:400;
}
.shipment {
	width:100%;
	margin-top:10%;
}
span.line {
    height: 5px;
    width: 90px;
    background-color:#F5998E;
    display: block;
    position: absolute;
    top: 36%;
    left: 37%;
}
.confirm{
	text-align:center;
	width:20%;
	position:relative;
	float:left;
	margin-left:5%;
}
.confirm .imgcircle , .process .imgcircle, .quality .imgcircle {
	background-color:#98D091;
}
.confirm span.line, .process span.line {
	background-color:#98D091; 
}
.content3 p {
	margin-left:-50%;
	font-size:15px;
	font-weight:600;
} 
.imgcircle {
	height:75px;
	width:75px;
	border-radius:50%;
	background-color:#F5998E;
	position:relative;
}
.imgcircle img {
	height:30px;
	position:absolute;
	top: 28%;
	left: 30%;
}
.process{
	position:relative;
	width:20%;
	text-align:center;
	float:left;
}
.quality {
	position:relative;
	width:20%;
	text-align:center;
	float:left;
}
.dispatch{
	position:relative;
	width:20%;
	text-align:center;
	float:left;
}
.delivery{
	position:relative;
	width:20%;
	text-align:center;
	float:left;
	margin-right:-9%;
}


/*---- responsive-design -----*/
@media(max-width:1920px){
	span.line {
	width:157px;
	left:32%;
	}
	.shipment{
		margin-top:6%;
	}
.content3 p{
margin-left:-65%;
}
}

@media(max-width:1680px){
	.content3 p {
    margin-left: -60%;
}
span.line {
    width: 127px;
    left: 37%;
}
}

@media(max-width:1600px){
span.line {
    width: 138px;
    left: 39%;
}
}

@media(max-width:1440px){
.content3 p {
    margin-left: -53%;
}
span.line {
    width: 99px;
    left: 43%;
}
}

@media (max-width: 1366px){
span.line {
    width: 138px;
    left:37%;
}
.shipment {
    margin-top: 10%;
}
}

@media (max-width: 1280px){
span.line {
    width: 80px;
    left: 48%;
	top:29%;
}
}

@media (max-width: 1080px){
.content {
width: 75%;
}
span.line {
    width: 88px;
left: 46%;
}
}

@media (max-width: 1050px){
span.line {
    width: 84px;
    left: 47%;
}
}

@media (max-width: 1024px){
	.content{
		width:77%;
	}
	.content3 p {
		font-size:14px;
	}
}

@media (max-width: 991px){
	.content {
    width: 80%;
}
span.line {
    width: 84px;
    left: 47%;
}
}

@media (max-width: 900px){
.content {
    width: 85%;
}
span.line {
    width: 78px;
    left: 49%;
}
}

@media (max-width: 800px){
.content {
    width: 95%;
}
.content2-header1 p {
	margin: 0 0 0 -7%;
}
}

@media (max-width: 768px){
	.content {
    width: 90%;
}
.content2-header1 {
	width: 25%;
}
.content2-header1 p {
    margin: 0 -19% 0 -10%;
}
span.line {
    width: 72px;
    left: 51%;
}
}

@media (max-width: 736px){
	span.line {
    width: 62px;
    left: 55%;
}
}

@media (max-width: 667px){
	.content2-header1 p {
	font-size:14px;
	}
	.content2-header1 span {
    font-size: 13px;
}
.shipment {
    margin-top: 13%;
}
.content3 p {
    font-size: 12px;
	margin-left: -35%;
}
.confirm{
	margin-left:4%;
}
span.line {
    width: 49px;
    left: 60%;
}
}

@media (max-width: 600px){
	.content1 {
		padding:1.2em;
	}
.content2-header1 p {
    font-size: 13px;
}
.content2-header1 span {
    font-size: 12px;
}
.content2-header1 {
    width: 24%;
}
.imgcircle {
    height: 65px;
    width: 65px;
}
.imgcircle img{
	top: 26%;
    left: 27%;
}
.content3 p {
	margin-left: -38%;
	font-size:11px;
}
.content {
	height: 395px;
}
span.line {
    width: 50px;
    left: 58%;
}
}

@media (max-width: 568px){
	.content{
		height:380px;
}
	.content1{
	padding: 1em;
}
	span.line {
    width: 56px;
    left: 47%;
}
	.content2-header1 {
    width: 23%;
}
	.imgcircle {
    height: 50px;
    width: 50px;
}
	.imgcircle img {
    height: 25px;
    top: 27%;
    left: 25%;
}
	.content3 p {
    font-size: 10px;
    margin-left: -46%;
}
	.confirm {
    margin-left: 5%;
}
}

@media (max-width: 414px){
	.header {
    margin-top: 8%;
}
	.content {
    width: 70%;
	height:750px;
	margin-top:9%;
	padding:10%;
}
	.content1 {
	margin: -14% 0 0 -14%;
	width:116%;
}
	.content1 h2 {
	font-size:22px;
}
	.content2 {
    margin-left: -14%;
	width: 127.5%;
}
	.content2-header1 {
	padding:0.7em;
    width: 80%;
	margin-left: 3%;
}
	.content2-header1 p {
    font-size: 19px;
}
	.content2-header1 span {
    font-size: 16px;
}
	.confirm {
	width:100%;
}
	.process {
	width:100%;
	margin: 22% 0 0 5%;
}
	.quality{
	width:100%;
	margin: 22% 0 0 5%;
}
	.dispatch{
	width:100%;
	margin: 22% 0 0 5%;
}
	.delivery{
	width:100%;
	margin: 22% 0 0 5%;
}
	.imgcircle {
    height: 70px;
    width: 70px;
	margin-left: 35%;
}
	.imgcircle img {
    height: 30px;
    top: 27%;
    left: 28%;
}
	span.line {
    width: 6px;
    left: 46%;
    height: 48px;
	top:124%;
}
	.content3 p {
    font-size: 15px;
    margin: -16% 0 4% -81%;
}
	.shipment {
    margin-left: 16%;
}
	.footer {
	padding:1%;
}
	.footer p {
	font-size:16px;
}
}

@media (max-width: 384px){
	.header {
    margin-top: 9%;
}
	.content1 {
	width:115%;
}
	.content1 h2 {
    font-size: 21px;
}
	.content3 p {
    margin: -18% 0 6% -85%;
}
	.shipment {
    margin-top: 15%;
}
	span.line {
	top:118%;
	left:47%;
	height:47px;
}
	.content {
    height: 770px;
}

}

@media (max-width: 375px){
	.content {
    height: 755px;
	width:68%;
}
	.content2{
	width:128%;
}
	.content1 h2 {
    font-size: 19px;
}
	.content3 p {
    margin: -18% 0 8% -86%;
}
	span.line {
    top: 105%;
    left: 47.5%;
    height: 52px;
}
	.shipment {
    margin-left: 17%;
}
}

@media (max-width: 320px){
	.header {
    margin-top: 10%;
}
	.content{
	width:66%;
	margin-top: 10%;
	padding:12%;
    height: 709px;
}
	.content1 {
    padding: 0.7em;
	width:125%;
	margin:-18% 0 0 -18%;
}
	.header h1{
	font-size:30px;
}
	.content2 {
	margin-left: -18%;
	width: 136.5%;
}
	.content1 h2 {
    font-size: 16px;
}
	.content2-header1 span {
    font-size: 15px;
}
	.content3 p {
    margin: -23% 0 12% -99%;
}
	.shipment {
	margin: 16% 0 0 19%;
}
	span.line {
    top: 102%;
    left: 50%;
	height:44px;
}
	.footer {
	margin-top: 1%;
}
	.footer p {
    font-size: 14px;
}
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
                            <h3></h3>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <?php if ($this->session->flashdata('success')) { ?>
                                <div class="col-sm-12 ">
                                    <div class="alert alert-success" role="alert" id="message1">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                        <p><strong>Success!
                                            </strong>&nbsp;&nbsp;<span><?php echo $this->session->flashdata('success') ?></span>
                                        </p>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php if ($this->session->flashdata('error')) { ?>
                                <div class="col-sm-12 ">
                                    <div class="alert alert-danger" role="alert" id="message1">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                        <p><strong>Error!
                                            </strong>&nbsp;&nbsp;<span><?php echo $this->session->flashdata('error') ?></span>
                                        </p>
                                    </div>
                                </div>
                                <?php } ?>

                                
                                <div class="x_content">
                                    <div class="content">
                                        <div class="content1">
                                            <h2>Order Tracking: Order No</h2>
                                        </div>
                                        <div class="content2">
                                            <div class="content2-header1">
                                                <p>Shipped Via : <span>Ipsum Dolor</span></p>
                                            </div>
                                            <div class="content2-header1">
                                                <p>Status : <span>Checking Quality</span></p>
                                            </div>
                                            <div class="content2-header1">
                                                <p>Expected Date : <span>7-NOV-2015</span></p>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="content3">
                                            <div class="shipment">
                                                <div class="confirm">
                                                    <div class="imgcircle">
                                                        <img src="<?php echo base_url() ?>assets/images/confirm.png" alt="confirm order">
                                                    </div>
                                                    <span class="line"></span>
                                                    <p>Confirmed Order</p>
                                                </div>
                                                <div class="process">
                                                    <div class="imgcircle">
                                                        <img src="<?php echo base_url() ?>assets/images/process.png" alt="process order">
                                                    </div>
                                                    <span class="line"></span>
                                                    <p>Processing Order</p>
                                                </div>
                                                <div class="quality">
                                                    <div class="imgcircle">
                                                        <img src="<?php echo base_url() ?>assets/images/quality.png" alt="quality check">
                                                    </div>
                                                    <span class="line"></span>
                                                    <p>Quality Check</p>
                                                </div>
                                                <div class="dispatch">
                                                    <div class="imgcircle">
                                                        <img src="<?php echo base_url() ?>assets/images/dispatch.png" alt="dispatch product">
                                                    </div>
                                                    <span class="line"></span>
                                                    <p>Dispatched Item</p>
                                                </div>
                                                <div class="delivery">
                                                    <div class="imgcircle">
                                                        <img src="<?php echo base_url() ?>assets/images/delivery.png" alt="delivery">
                                                    </div>
                                                    <p>Product Delivered</p>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <?php $this->load->view('includes/footer'); ?>
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

        $(".exdelete").click(function() {
            if (!confirm("Are you sure you want to delete this item?")) {
                return false;
            }
        });
    })
    </script>


</body>

</html>