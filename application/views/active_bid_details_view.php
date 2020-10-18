
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
            <?php foreach($active_bid as $item){?>

<!--                <input type="hidden" name="pid" value="--><?php //echo $item->product_id;?><!--">-->
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
                                <?php
                                $now=time();
                                $start = strtotime($item->start_date);
                                $end = strtotime($item->end_date);
//                                echo date('Y-m-d H:i:s',$now).'<br/>'.date('Y-m-d H:i:s',$start).' <br/>'.date('Y-m-d H:i:s',$end);
                                if($item->completed==0){?>

                                    <?php if($now<strtotime($item->start_date)){?>

                                        <div class="setbid_data text-right">
                                            <a class="btn btn-primary" >
                                                <?php
                                                echo date('d/m/Y',strtotime($item->start_date));?>
                                            </a>
                                        </div>

                                    <?php }elseif($now>strtotime($item->start_date)&&$now<strtotime($item->end_date)){?>

                                        <div class="setbid_data text-right">
                                            <a class="btn btn-primary" href= "<?php echo site_url('Buyer/start_bidding/'.$item->bid);?>">
                                                Attend
                                            </a>
                                        </div>
                                    <?php }elseif($now>strtotime($item->end_date)){?>

                                        <div class="setbid_data text-right">
                                            <a class="btn btn-primary" href= "<?php echo site_url('Buyer/completed_bidding/'.$item->bid.'/'.$item->product_id);?>">Completed, View Details</a>
                                        </div>

                                    <?php }}?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

        </div>
    </div>
</div>

