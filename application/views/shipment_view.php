
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Shipped Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="table-responsive clearfix">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ProductName</th>
                            <th>Total</th>
                            <th>Address</th>
                            <th>ShippedDate</th>
                            <th>DeliveredDate</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  foreach($products as $item){?>
                        <tr>
                            <td>
                                <h5><?php echo $item->product_name;?></h5>
                            </td>
                            <td>
                                <h5><?php echo $item->total;?></h5>
                            </td>
                            <td>
                                <h5><?php echo $item->address;?></h5>
                            </td>
                            <td>
                               <h5><?php echo $item->shiped_date?></h5>
                            </td>
                            <td>
                               <h5><?php echo $item->delivered_date?></h5>
                            </td>
                            <td>
                                <?php if($item->status==1){?>
                                    <a class="btn btn-success" href="#">Ship</a>
                                <?php }?>
                            </td>
                            <?php }?>
                        </tr>
                        </tbody>
                    </table>
                </div>
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

