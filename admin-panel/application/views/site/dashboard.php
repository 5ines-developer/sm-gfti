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

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url()?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('includes/header.php'); ?>

            <?php $this->load->view('includes/sidebar.php'); ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count">
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                        <div class="total-ordr">
                            <div class="count_top"><i class="fa fa-cart-plus" aria-hidden="true"></i> Total Orders</div>
                            <div class="count blue"><a class="blue" href="<?php echo base_url('orders') ?>"><?php echo (!empty($order))?$order:'0' ;?></a> </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                        <div class="total-ordr">
                            <div class="count_top"><i class="fa fa-users" aria-hidden="true"></i> Total Users</div>
                            <div class="count purple"><a class="purple" href="<?php echo base_url('manage-employee') ?>"><?php echo (!empty($user))?$user:'0' ;?></a> </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                        <div class="total-ordr">
                            <div class="count_top"><i class="fa fa-cubes" aria-hidden="true"></i> Total Products</div>
                            <div class="count green"><a class="green" href="<?php echo base_url('manage-product') ?>"><?php echo (!empty($product))?$product:'0' ;?></a> </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                        <div class="total-ordr">
                            <div class="count_top"><i class="fa fa-list-alt" aria-hidden="true"></i> Categories</div>
                            <div class="count red"><a class="red" href="<?php echo base_url('manage-category') ?>"><?php echo (!empty($category))?$category:'0' ;?></a> </div>
                        </div>
                    </div>
                </div>
                <!-- /top tiles -->

                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Orders By Month</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                        <div class="total-ordr rightside">
                        	<div style="text-align: center;font-size: 19px;">
                        		<i class="fa fa-check" aria-hidden="true"></i>
                        	</div>
                        	
                            <div class="count_top"> Completed Orders</div>
                            <div class="count blue"><a class="blue" href="<?php echo base_url('orders') ?>"><?php echo (!empty($category))?$category:'0' ;?></a> </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                        <div class="total-ordr rightside">
                        	<div style="text-align: center;font-size: 19px;">
                        		<i class="fa fa-clock-o" aria-hidden="true"></i>
                        	</div>
                            <div class="count_top">Pending Orders</div>
                            <div class="count aero "><a class="dark" href="<?php echo base_url('orders') ?>"><?php echo (!empty($category))?$category:'0' ;?></a> </div>
                        </div>
                    </div>

                </div>
                <br />

                <!-- <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>To Do List <small>Sample tasks</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="">
                                    <ul class="to_do">
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Schedule meeting with new client
                                            </p>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>To Do List <small>Sample tasks</small></h2>
                            
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="">
                                    <ul class="to_do">
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Schedule meeting with new client
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>To Do List <small>Sample tasks</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div class="">
                                    <ul class="to_do">
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Schedule meeting with new client
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Create email address for new intern
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Copy backups to offsite location
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Create email address for new intern
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Copy backups to offsite location
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


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
    <!-- Chart.js -->
    <script src="<?php echo base_url()?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url()?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url()?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url()?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url()?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>

    <script>
    $(document).ready(function() {

                var lab = [];
                var con = [];
                var canCon = [];
                $.ajax({
                    url: '<?php echo base_url("Admin/getordergraph") ?>',
                    method: 'GET',
                    async: true,
                    dataType: 'json',
                    success: function (dat) {
                
                for (let i = 0; i < dat.length; i++) {
                            lab.push(dat[i].month);
                            con.push(dat[i].valeus);
                        }



                //   Chart.defaults.global.legend = { 
                //     enabled : false
                //   };

                var paramMeses = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
                var paramvalores = [65, 59, 80, 81, 56, 55, 40];



                // Line charts
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: lab,
                        datasets: [{
                            label: 'Orders',
                            fill: true,
                            lineTension: 0.0,
                            backgroundColor: 'rgba(75, 192, 192, 1)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: '#000',
                            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                            pointBorderWidth: 3,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: 'rgba(75, 192, 192, 1)',
                            pointHoverBorderColor: 'rgba(220, 220, 220, 1)',
                            pointHoverBorderWidth: 5,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: con,
                            spanGaps: false,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });



            } 
        });
    });
    </script>

</body>

</html>