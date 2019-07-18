<section class="flat-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="">
                    <ul class="icons">
                        
                        <li class="filter waves-effect">
                            <span class="f-icon"><i class="fa fa-filter" aria-hidden="true"></i></span>
                            <span class="f-text">Filter</span>
                            
                        </li>
                    </ul><!-- /.icons -->
                    <div class="box-filter">
                        <div class="widget widget-categories">
                            <div class="widget-title">
                                <h3>Categories<span></span></h3>
                            </div>
                            <ul class="cat-list style1 widget-content">
                                <li>
                                    <span>Accessories<i>(03)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">TV</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Monitors</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Software</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Cameras<i>(19)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Go Pro</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Video</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Software</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <span>Computers<i>(56)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Desktop</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Monitors</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Software</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <span>Laptops<i>(03)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Desktop</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Monitors</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Software</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Networking<i>(03)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Monitors</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Software</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Old Products<i>(89)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Monitors</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Software</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Smartphones<i>(90)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Apple</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">HTC</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Sony</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Samsung</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">LG</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Software<i>(23)</i></span>
                                    <ul class="cat-child">
                                        <li>
                                            <a href="#" title="">Desktop</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">Monitors</a>
                                        </li>
                                        <li>
                                            <a href="#" title="">BKAV</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- /.cat-list -->
                        </div><!-- /.widget-categories -->
                        <div class="widget widget-price">
                            <div class="widget-title">
                                <h3>Price<span></span></h3>
                            </div>
                            <div class="widget-content">
                                <p>Price</p>
                                <form action="<?php echo base_url('search') ?>" method="GET">
                                    <div class="price search-filter-input">
                                        <input name="q" value="<?php echo (!empty($_GET['q'])? $_GET['q'] : '') ?>" type="hidden">
                                        <input name ="c"  value="<?php echo (!empty($_GET['c'])? $_GET['c'] : '') ?>" type="hidden">
                                        <div class="input-sets">
                                            <label for="">MIN</label>
                                            <input  value="<?php echo (!empty($_GET['min'])? $_GET['min'] : '0') ?>" name="min" type="text">
                                        </div>
                                        <div class="input-sets">
                                            <label for="">MAX</label>
                                            <input  value="<?php echo (!empty($_GET['max'])? $_GET['max'] : '999999') ?>" name="max" type="text">
                                        </div>
                                        <div class="input-sets">
                                            <button type="submit">Submit</button>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.widget widget-price -->
                        
                    </div><!-- /.box-filter -->
                    
                    <div class="clearfix"></div>
                </div><!-- /.sort-product style1 -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>

