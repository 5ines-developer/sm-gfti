<div class="overlay"></div>

<!-- Preloader -->
<!-- <div class="preloader">
    <div class="clear-loading loading-effect-2">
        <span></span>
    </div>
</div> -->
<!-- /.preloader -->
<?php
if($this->session->userdata('sid') != ''){ 
    $heder_l = '';
}else{
    $heder_l = 'b-heder';
}

?>
<section id="header" class="header <?php echo $heder_l ?>">

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 hidden-sm-down">
                    <div id="logo" class="logo">
                        <a href="<?php echo base_url() ?>" title="">
                            <img src="<?php echo base_url() ?>assets/images/img/logo.svg" alt="">
                        </a>
                    </div><!-- /#logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-6 col-8">
                    <div class="top-search">
                        <form action="<?php echo base_url('search') ?>" method="get" class="form-search" accept-charset="utf-8">
                            
                            <div class="box-search">
                                <input type="text" name="q" autocomplete="off"
                                    placeholder="Search products...">
                                <span class="btn-search">
                                    <button type="submit" class="waves-effect"><img
                                            src="<?php echo base_url() ?>assets/images/icons/search.png"
                                            alt=""></button>
                                </span>
                                <!-- suggetion box -->
                                <div class="sg-box" id="sg-box">
                                    <div class="title">Search Suggestions</div>
                                    <ul class="sg-result"> </ul>
                                </div>
                               
                            </div><!-- /.box-search -->
                        </form><!-- /.form-search -->
                    </div><!-- /.top-search -->

                    <div class="nav-ul">
                        <ul>
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="<?php echo base_url() ?>register">Register</a></li>
                            <li><a href="<?php echo base_url() ?>login">Login</a></li>
                        </ul>
                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-md-3 col-4 pd0">
                    <div class="box-cart">
                        <div class="inner-box">
                            <ul class="menu-compare-wishlist">
                                <li class="wishlist">
                                    <a href="<?php echo base_url() ?>account" title="">
                                        <img src="<?php echo base_url() ?>assets/images/user.png" alt="">
                                    </a>
                                    
                                </li>
                            </ul><!-- /.menu-compare-wishlist -->
                        </div><!-- /.inner-box -->
                        <div class="inner-box">
                            <a href="<?php echo base_url() ?>cart" title="">
                                <div class="icon-cart">
                                    <img src="<?php echo base_url() ?>assets/images/icons/cart.png" alt="">
                                    <span><?php echo $this->data['cart_item']; ?></span>
                                </div>
                            </a>
                            <!-- <div class="dropdown-box">
                                <ul>
                                    <li>
                                        <div class="img-product">
                                            <img src="<?php echo base_url() ?>assets/images/product/other/img-cart-1.jpg"
                                                alt="">
                                        </div>
                                        <div class="info-product">
                                            <div class="name">
                                                Samsung - Galaxy S6 4G LTE <br />with 32GB Memory Cell Phone
                                            </div>
                                            <div class="price">
                                                <span>1 x</span>
                                                <span>$250.00</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <span class="delete">x</span>
                                    </li>
                                    <li>
                                        <div class="img-product">
                                            <img src="<?php echo base_url() ?>assets/images/product/other/img-cart-2.jpg"
                                                alt="">
                                        </div>
                                        <div class="info-product">
                                            <div class="name">
                                                Sennheiser - Over-the-Ear Headphone System - Black
                                            </div>
                                            <div class="price">
                                                <span>1 x</span>
                                                <span>$250.00</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <span class="delete">x</span>
                                    </li>
                                </ul>
                                <div class="total">
                                    <span>Subtotal:</span>
                                    <span class="price">$1,999.00</span>
                                </div>
                                <div class="btn-cart">
                                    <a href="shop-cart.html" class="view-cart" title="">View Cart</a>
                                    <a href="shop-checkout.html" class="check-out" title="">Checkout</a>
                                </div>
                            </div> -->
                        </div><!-- /.inner-box -->
                    </div><!-- /.box-cart -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-middle -->

    <div class="height"></div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div id="mega-menu">
                        <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                        <ul class="menu">
                        <?php foreach ($this->data['categories']['full'] as $key => $value) { 
                           $link = str_replace(' ','+', $value->name);
                           $nlink = str_replace('&','%26', $link); 
                        ?>
                            <li>
                                <a href="<?php echo base_url('search?q=&c=').$nlink ?>" title="">
                                    <span class="menu-title">
                                        <?php echo $value->name ?>
                                    </span>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>

                    <div class="hidden-md-up mob-logo">
                        <a href="<?php echo base_url() ?>">
                            <img src="<?php echo base_url()  ?>assets/images/img/logo.png" alt="">
                        </a>
                    </div>
                </div><!-- /.col-md-3 col-2 -->
                <div class="col-md-9 col-6">
                    <div class="nav-wrap">
                        <div id="mainnav" class="mainnav">
                            <ul class="menu">
                            <li class="column-1">
                                    <a href="<?php echo base_url() ?>" title="">Home</a>
                                    
                                </li>
                            <?php foreach ($this->data['categories']['five'] as $key => $value) { 
                                $link = str_replace(' ','+', $value->name);
                                $nlink = str_replace('&','%26', $link); 
                            ?>
                                
                                <li class="column-1">
                                    <a href="<?php echo base_url('search?q=&c=').$nlink ?>" title=""><?php echo $value->name ?></a>
                                    
                                </li>
                            <?php } ?>
                            </ul><!-- /.menu -->
                        </div><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                    <?php if($this->session->userdata('sid') == '') {?>
                    <div class="today-deal">
                        <a href="<?php echo base_url() ?>login" title="">Login</a>
                        <span class="link-di"> | </span>
                        <a href="<?php echo base_url() ?>register" title="">Register</a>
                    </div><!-- /.today-deal -->
                    <?php } ?>
                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
                </div><!-- /.col-md-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-bottom -->
</section><!-- /#header -->

<!-- <?php if(!empty($breadcrumbs) == true) { ?>
<section class="flat-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs">
                    <li class="trail-item">
                        <a href="#" title="">Home</a>
                        <span><img src="<?php echo base_url() ?>assets/images/icons/arrow-right.png" alt=""></span>
                    </li>
                    <li class="trail-item">
                        <a href="#" title="">Shop</a>
                        <span><img src="<?php echo base_url() ?>assets/images/icons/arrow-right.png" alt=""></span>
                    </li>
                    <li class="trail-end">
                        <a href="#" title="">Smartphones</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php } ?> -->

<?php 

if(!empty($this->data['categories']['marquee']) && $this->session->userdata('sid') != ''){ ?>
    
        
            <section class="marquee-section">
                <div class="container">
                    <div class="col-sm-12">
                        <marquee >
                        <?php foreach ($this->data['categories']['marquee'] as $key => $value) {  ?>
                            <a href="<?php echo $value->link ?>"><?php echo $value->title ?></a> &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                        <?php } ?>
                        </marquee>
                    </div>
                </div>
            </section>

    
                        <?php } ?>