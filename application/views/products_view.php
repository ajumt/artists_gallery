
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>All Products</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Seller Name</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php foreach($product as $item){?>
                            <td class="cart_product_img">
                                <a href="#"><img src="<?php echo base_url('media/uploads/'.$item->pimage)?>" alt="Product"></a>
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
                            <td class="price">
                                <h5><?php echo $item->first_name;?></h5>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>

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