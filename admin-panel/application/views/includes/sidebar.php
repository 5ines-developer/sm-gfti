<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a  class="site_title"><img class="dash-logo" src="<?php echo base_url() ?>assets/images/logo.svg" alt="Gift Express"></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></li>
                  <li><a><i class="fa fa-list-alt" aria-hidden="true"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>add-category">Add Category</a></li>
                      <li><a href="<?php echo base_url() ?>manage-category">Manage Category</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-list-alt" aria-hidden="true"></i> Brand <i class="fa fa-bandcamp" aria-hidden="true"></i></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>add-brand">Add Brand</a></li>
                      <li><a href="<?php echo base_url() ?>manage-brand">Manage Brand</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-cubes" aria-hidden="true"></i>Product<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>add-product">Add Product</a></li>
                      <li><a href="<?php echo base_url() ?>manage-product">Manage Product</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-picture-o" aria-hidden="true"></i> Banner<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>add-banner">Add Banner</a></li>
                      <li><a href="<?php echo base_url() ?>manage-banner">Manage Banner</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-server" aria-hidden="true"></i>Domain<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>add-domain">Add Domain</a></li>
                      <li><a href="<?php echo base_url() ?>manage-domain">Manage Domain</a></li>
                      </ul>
                  </li>
                <li><a href="<?php echo base_url() ?>manage-employee"><i class="fa fa-users" aria-hidden="true"></i>Manage Employee</a></li>
                <li>
                    <a > <i class="fa fa-cart-plus" aria-hidden="true"></i>orders <span class="fa fa-chevron-down"></span> </a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>orders">All Orders</a></li>
                      <li><a href="<?php echo base_url() ?>orders?q=payment-orders&scode=1">Payment Orders</a></li>
                      <li><a href="<?php echo base_url() ?>orders?q=place-orders&scode=2">Purchase Request</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-newspaper-o" aria-hidden="true"></i> Billing Address<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url() ?>add-billing-address">Add Billing Address</a></li>
                      <li><a href="<?php echo base_url() ?>manage-billing-address">Manage Billing Address</a></li>
                      </ul>
                  </li>
                  <li><a href="<?php echo base_url() ?>manage-enquiry"><i class="fa fa-comment" aria-hidden="true"></i>Manage Enquiry</a></li>
                  <li><a href="<?php echo base_url() ?>product-ratings"><i class="fa fa-star-half-o" aria-hidden="true"></i>Product Ratings</a></li>
                  <li><a href="<?php echo base_url() ?>escalation"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Product Escalation</a></li>
                  <li><a href="<?php echo base_url() ?>newsletter-subscribers"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Newsletter Subscribers</a></li>
                  <li><a href="<?php echo base_url() ?>manage-offers"><i class="fa fa-tags" aria-hidden="true"></i>Offers</a></li>
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           <!--  <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url() ?>logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>