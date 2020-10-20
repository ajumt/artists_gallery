
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cart-title mt-50">
                    <h2>My Products View <span style="float:right;">
                        <!-- <a href="<?php echo site_url('product/my_product_view');?>" class="btn btn-success"><i class="fa fa-plus"></i></a></span> -->
                        <a href="<?php echo site_url('product/add_product');?>" class="btn btn-success"><i class="fa fa-plus"></i></a></span>
                    </h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
<!--                            product-->
                            <?php foreach($seller as $item){?>
                            <td class="cart_product_img">
                                <a href="<?php echo site_url('seller/product_details/'.$item->id);?>"><img src="<?php echo base_url('media/uploads/'.$item->image)?>" alt="Product"></a>
                            </td>
                            <td class="cart_product_desc">
                                <h5><?php echo $item->product_name;?></h5>
                            </td>
                            <td class="price">
                                <h5><?php echo $item->product_price;?></h5>
                            </td>
                            <td class="qty">
                                <div class="qty-btn d-flex">
                                    <div class="quantity">
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="<?php echo $item->product_quantity;?>">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-xs btn-flat"  href="<?php echo site_url('Product/edit_product/'.$item->id);?>" class="qty-edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a class="btn btn-xs btn-flat"  href="<?php echo site_url('Product/delete_product/'.$item->id);?>" class="qty-trash"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>

<!--                        <div class="row">-->
<!--                            <div class="col-lg-12">-->
<!--                                <!-- Pagination -->
<!--                                <nav aria-label="navigation">-->
<!--                                    <ul class="pagination justify-content-end mt-50">-->
<!--                                        --><?php
//                                        $max_page = $meta['total']/$meta['limit']; $active='';
//                                        for($i=0;$i<$max_page;$i++){
//                                            if(($i+1)==$meta['page']+1) $active='active'; else $active='';
//                                            ?>
<!--                                            <li class="page-item --><?php //echo $active;?><!--"><a class="page-link" href="--><?php //echo site_url('Seller/'.($i+1));?><!--">--><?php //echo $i+1;?><!--</a></li>-->
<!--                                        --><?php //}?>
<!--                                    </ul>-->
<!--                                </nav>-->
<!--                            </div>-->
<!--                        </div>-->

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
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