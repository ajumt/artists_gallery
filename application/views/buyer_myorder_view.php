<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row table-responsive">
            <div class="col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Orders</h2>
                </div>
                <div class="cart-table clearfix">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Slno</th>
                                <th>Orders</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($product as $i=>$item){?>
                                <tr>
                                    <td>
                                        <h5><?php echo $i+1;?></h5>
                                    </td>

                                    <td>
                                        <a href="<?php echo site_url('Seller/buyer_product_view/'.$item->order_id)?>">#order<?php echo $item->order_id;?></a>
                                    </td>

                                    <td>
                                        <?php if($item->status==0){?>
                                        <button class="btn btn-danger" name="btn1">Not Ship</button>
                                        <?php } else if($item->status==1){ ?>
                                        <button class="btn btn-success" name="btn2">Ship</button>
                                        <?php } else{?>
                                        <button class="btn btn-success" name="btn3">Delivered</button>
                                        <?php } ?>
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
                </div>
            </div>
        </div>
    </div>
</footer>



