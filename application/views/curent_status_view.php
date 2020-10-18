<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Product Status View</h2>
                </div>
                <div class="cart-table clearfix table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ProductName</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($orders as $item){?>
                        <tr>
                            <td>
                                <?php echo $item->product_name; ?>
                            </td>
                            <td class="price">
                                &#8377;<span id="price<?php echo $item->id?>"><?php echo $item->product_price;?></span>
                            </td>

                            <td>
                                <?php echo $item->product_quantity; ?>
                            </td>
                            <td class="cart_product_desc">
                                <h5><?php echo $item->total;?></h5>
                            </td>
                            <td class="cart_product_desc">
                                <h5><?php echo $item->address;?></h5>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
<br><br><br><br>
           <div class="row">
                 <div class="col-lg-5">
                    <h5>Customer Details:</h5>
                     <?php echo $address->address;?>
                 </div>
                 <div class="col-lg-2"></div>
                 <div class="col-lg-5">
                     <?php echo form_open('');?>
                     <input type="hidden" name="orderid" value="<?php echo $orderid;?>">
                     <h4>Ship Details</h4><br>
                     Ship Date:
                     <br>
                     <input type="date" name="shipdate" class="form-control">
                     <br>
                     Deliverd Date:
                     <br>
                     <input type="date" name="deliverd_date" class="form-control">
                     <br><br>
                         <input type="submit" class="btn btn-warning pull-right" name="submit" id="btn1" value="Ship">
                     <br>
                 </div>
               <?php echo form_close();?>
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

