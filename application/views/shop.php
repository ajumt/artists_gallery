
    <!-- Header Area End -->
    <?php
    function filter($cat){
        $cats=isset($_GET['cats'])?$_GET['cats']:'';
        if(strpos($cats,$cat)==-1)
            $cats.='|'.$cat;
        $url = site_url('site/shop').'?cats='.$cats;
        return $url;
    }
    ?>
    <div class="shop_sidebar_area">

        <!-- ##### Single Widget ##### -->
        <div class="widget catagory mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30"> Product Catagories</h6>

            <!--  Product Catagories  -->
            <div class="catagories-menu">
                <ul>
                    <?php foreach($category as $item){?>
                    <li class="active"><a href="<?php echo filter($item->id);?>"><?php echo $item->procat_name;?></a></li>
                    <?php }?>
                </ul>
            </div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget price mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Price</h6>

            <div class="widget-desc">
                <div class="slider-range">
                    <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price">$10 - $1000</div>
                </div>
            </div>
        </div>
    </div>

    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                        <!-- Total Products -->
                        <div class="total-products">
                            <p>Showing 1-8 0f 25</p>
                            <div class="view d-flex">
                                <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <div class="sort-by-date d-flex align-items-center mr-15">
                                <p>Sort by</p>
                                <form action="#" method="get">
                                    <select name="select" id="sortBydate">
                                        <option value="value">Date</option>
                                        <option value="value">Newest</option>
                                        <option value="value">Popular</option>
                                    </select>
                                </form>
                            </div>
                            <div class="view-product d-flex align-items-center">
                                <p>View</p>
                                <form action="#" method="get">
                                    <select name="select" id="viewProduct">
                                        <option <?php echo $meta['limit']==4?'selected="selected"':'';?> value="value">4</option>
                                        <option <?php echo $meta['limit']==6?'selected="selected"':'';?> value="value">6</option>
                                        <option <?php echo $meta['limit']==12?'selected="selected"':'';?> value="value">12</option>
                                        <option <?php echo $meta['limit']==24?'selected="selected"':'';?> value="value">24</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <?php foreach($shop_products as $item){?>
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <a href="<?php echo site_url('Seller/product_details/'. $item->id);?>">

                            <div class="product-img">
                                <img src="<?php echo base_url('media/uploads/'.$item->image)?>" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="<?php echo base_url('assets/amado/img/product-img/product2.jpg')?>" alt="">
                            </div>
                            </a>
                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">$<?php echo $item->product_price;?></p>
                                    <a href="product-details.html">
                                        <h6><?php echo $item->product_name;?></h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>
<!--            --><?php //print_r($meta);?>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination justify-content-end mt-50">
                            <?php
                            $max_page = $meta['total']/$meta['limit']; $active='';
                            for($i=0;$i<$max_page;$i++){
                                if(($i+1)==$meta['page']+1) $active='active'; else $active='';
                                ?>
                                <li class="page-item <?php echo $active;?>"><a class="page-link" href="<?php echo site_url('site/shop/'.($i+1));?>"><?php echo $i+1;?></a></li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

