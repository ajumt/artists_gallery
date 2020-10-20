
    <!-- Header Area End -->

    <div class="shop_sidebar_area">

        <!-- ##### Single Widget ##### -->
        <div class="widget catagory mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30"> Product Catagories</h6>

            <!--  Product Catagories  -->
            <div class="catagories-menu">
                <ul>
                    <?php foreach($category as $item){?>
                    <li class="active"><a href="?category=<?php echo $item->id ?>"><?php echo $item->procat_name;?></a></li>
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
                                <a href="<?php echo   site_url('product/add_product')?>"><i class="fa fa-plus" aria-hidden="true" title="Add New Products"></i></a>
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
                                        <option value="value">12</option>
                                        <option value="value">24</option>
                                        <option value="value">48</option>
                                        <option value="value">96</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            <?php foreach($product as $item){?>
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
                                <div class="setbid_data text-right">
                                    <a class="btn btn-primary" href="<?php echo site_url('Buyer/set_bid/'.$item->id);?>">Set Bid</a>
                                </div>
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
                                <li class="page-item <?php echo $active;?>"><a class="page-link" href="<?php echo site_url('seller/my_product_view/'.($i+1));?>"><?php echo $i+1;?></a></li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
    </div>
</div>

<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix" style="width: 100%;height: 1px;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-12">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="sitedashboard.php"><img src="<?php echo site_url('assets/amado/img/core-img/logo2.png')?>" alt=""></a>
                    </div>
                    <!-- Copywrite Text -->
                    <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
            </div>
            </div>
    </footer>
