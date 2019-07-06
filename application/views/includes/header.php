<div class="overlay"></div>

<!-- Preloader -->
<!-- <div class="preloader">
    <div class="clear-loading loading-effect-2">
        <span></span>
    </div>
</div> -->
<!-- /.preloader -->

<section id="header" class="header">

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="logo" class="logo">
                        <a href="index.html" title="">
                            <img src="<?php echo base_url() ?>assets/images/img/logo.svg" alt="">
                        </a>
                    </div><!-- /#logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="top-search">
                        <form action="<?php echo base_url('search') ?>" method="get" class="form-search" accept-charset="utf-8">
                            <div class="cat-wrap">
                                <select name="c">
                                    <option hidden value="">All Category</option>
                                    <option hidden value="">Cameras</option>
                                    <option hidden value="">Computer</option>
                                    <option hidden value="">Laptops</option>
                                </select>
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                <div class="all-categories">
                                    <div class="cat-list-search">
                                        <div class="title">
                                            Electronics
                                        </div>
                                        <ul>
                                            <li>Components</li>
                                            <li>Laptop</li>
                                            <li>Monitor</li>
                                            <li>Mp3 player</li>
                                            <li>Scanners</li>
                                        </ul>
                                    </div><!-- /.cat-list-search -->
                                    <div class="cat-list-search">
                                        <div class="title">
                                            Furniture
                                        </div>
                                        <ul>
                                            <li>Bookcases</li>
                                            <li>Barstools</li>
                                            <li>TV stands</li>
                                            <li>Desks</li>
                                            <li>Accent chairs</li>
                                        </ul>
                                    </div><!-- /.cat-list-search -->
                                    <div class="cat-list-search">
                                        <div class="title">
                                            Accessories
                                        </div>
                                        <ul>
                                            <li>Software</li>
                                            <li>Mobile</li>
                                            <li>TV stands</li>
                                            <li>Printers</li>
                                            <li>Media</li>
                                        </ul>
                                    </div><!-- /.cat-list-search -->
                                </div><!-- /.all-categories -->
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                            </div><!-- /.cat-wrap -->
                            <div class="box-search">
                                <input type="text" name="q" autocomplete="off"
                                    placeholder="Search what you looking for ?">
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
                </div><!-- /.col-md-6 -->
                <div class="col-md-3">
                    <div class="box-cart">
                        <div class="inner-box">
                            <ul class="menu-compare-wishlist">
                                <li class="wishlist">
                                    <a href="wishlist.html" title="">
                                        <img src="<?php echo base_url() ?>assets/images/icons/wishlist.png" alt="">
                                    </a>
                                    <!-- <div class="price">
                                    account
                                </div> -->
                                </li>
                            </ul><!-- /.menu-compare-wishlist -->
                        </div><!-- /.inner-box -->
                        <div class="inner-box">
                            <a href="#" title="">
                                <div class="icon-cart">
                                    <img src="<?php echo base_url() ?>assets/images/icons/cart.png" alt="">
                                    <span>4</span>
                                </div>
                                <div class="price">
                                    $0.00
                                </div>
                            </a>
                            <div class="dropdown-box">
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
                            </div>
                        </div><!-- /.inner-box -->
                    </div><!-- /.box-cart -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-middle -->


    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-2">
                    <div id="mega-menu">
                        <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                        <ul class="menu">
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/01.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Laptops & Mac
                                    </span>
                                </a>
                                <div class="drop-menu">
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Laptop And Mac
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Networking & Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Laptops, Desktops & Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Computer Accessories</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Audio & Video
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Headphones & Speakers</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Home Entertainment Systems</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">MP3 & Media Players</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-01.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-02.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-03.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/02.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Mobile & Tablet
                                    </span>
                                </a>
                                <div class="drop-menu">
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Laptop And Computer
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Networking & Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Laptops, Desktops & Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Printers & Ink</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Networking & Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Computer Accessories</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Audio & Video
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Headphones & Speakers</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Home Entertainment Systems</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">MP3 & Media Players</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-01.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-02.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-03.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/03.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Home Devices
                                    </span>
                                </a>
                                <div class="drop-menu">
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Home Devices
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Desktops & Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Networking</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Audio
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Home Entertainment Systems</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">MP3 & Media Players</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-01.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-02.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-03.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title="">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/04.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Software
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/05.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        TV & Audio
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/06.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Sports & Fitness
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/07.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Games & Toys
                                    </span>
                                </a>
                                <div class="drop-menu">
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Games & Toys
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Desktops & Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Networking</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Audio
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Home Entertainment Systems</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">MP3 & Media Players</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-01.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-02.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-03.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title="">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/08.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Video Cameras
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/09.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Accessories
                                    </span>
                                </a>
                                <div class="drop-menu">
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Accessories
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Desktops & Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Networking</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Audio
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Home Entertainment Systems</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">MP3 & Media Players</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-01.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-02.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-03.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#" title="" class="dropdown">
                                    <span class="menu-img">
                                        <img src="<?php echo base_url() ?>assets/images/icons/menu/10.png" alt="">
                                    </span>
                                    <span class="menu-title">
                                        Security
                                    </span>
                                </a>
                                <div class="drop-menu">
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Security
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Internet Devices</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Desktops & Monitors</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Networking</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <div class="cat-title">
                                            Audio
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#" title="">Home Entertainment Systems</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">MP3 & Media Players</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Software</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Hard Drives & Memory Cards</a>
                                            </li>
                                            <li>
                                                <a href="#" title="">Networking</a>
                                            </li>
                                        </ul>
                                        <div class="show">
                                            <a href="#" title="">Shop All</a>
                                        </div>
                                    </div>
                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-01.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-02.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img
                                                                src="<?php echo base_url() ?>assets/images/icons/right-2.png"
                                                                alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="<?php echo base_url() ?>assets/images/banner_boxes/menu-03.png"
                                                        alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.col-md-3 col-2 -->
                <div class="col-md-9 col-10">
                    <div class="nav-wrap">
                        <div id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li class="column-1">
                                    <a href="index.html" title="">Home</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="index.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 01</a>
                                        </li>
                                        <li>
                                            <a href="index-v2.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 02</a>
                                        </li>
                                        <li>
                                            <a href="index-v3.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 03</a>
                                        </li>
                                        <li>
                                            <a href="index-v4.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 04</a>
                                        </li>
                                        <li>
                                            <a href="index-v5.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 05</a>
                                        </li>
                                        <li>
                                            <a href="index-v6.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 06</a>
                                        </li>
                                        <li>
                                            <a href="index-v7.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 07</a>
                                        </li>
                                        <li>
                                            <a href="index-v8.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 08</a>
                                        </li>
                                        <li>
                                            <a href="index-v9.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 09</a>
                                        </li>
                                        <li>
                                            <a href="index-v10.html" title=""><i class="fa fa-angle-right"
                                                    aria-hidden="true"></i>Home Layout 10</a>
                                        </li>
                                    </ul>
                                </li>
                                
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

<?php if(!empty($breadcrumbs) == true) { ?>
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
                </ul><!-- /.breacrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-breadcrumb -->
<?php } ?>