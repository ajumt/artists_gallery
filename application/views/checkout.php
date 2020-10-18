<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2>Checkout</h2>
                    </div>

                        <?php echo form_open('');?>
                        <div class="col-12 mb-3">
                                Address:
                                <textarea name="address" class="form-control w-100" id="comment1" cols="30" rows="2" placeholder="Current Address/New Address"><?php if($current!=null){?><?php echo $current->first_name.' '. $current->last_name;?>
                                        Dist:  <?php echo $current->district;?>
                                        City:  <?php echo $current->city;?>
                                        Pincode: <?php echo $current->pin;?>
                                        Phone:<?php echo $current->mobile_number;?>
                                        Email:<?php echo $current->email;?>

                                    <?php }?>
                                </textarea>

                        </div>
                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="payment" class="custom-control-input" id="cod" onchange="view_cash_details()">
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- debit/credit -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="payment" class="custom-control-input" id='debit' onchange="view_debit_details()">
                                    <label class="custom-control-label" for="debit">Debit/Credit</label>
                                </div>
                            </div>
                        </div>
                    <div class="payment_details">
                        <label>Bank a/c No:</label><br><input type="text" name="bank"/><br>
                        <label>Card No:</label><br><input type="text" name="card_no"/><br>
                        <label>CVV:</label><br><input type="text" name="cvv"/><br>
                    </div>
            </div>
            <div class="row">
            <div class="col-12 mb-8">
                <div class="cart-summary">
                    <h5>Cart Total</h5>

                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span id="grandtotal"><?php echo $sum;?></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span id="grandtotal"><?php echo $sum;?></span></li>
                    </ul>

                    <div class="cart-btn mt-100">

                        <?php echo form_submit('submit','Checkout ','class="btn amado-btn w-100" onclick="check()"');?>
                    </div>

                </div>
            </div>
         </div>
        </div>
    </div>
</div>
</div>
<
<?php echo form_close();?>
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

<script>
    $(document).ready(function(){
        $('.payment_details').hide();
    });
    function view_cash_details()
    {
        $('.payment_details').hide();
    }
    function view_debit_details()
    {
        $('.payment_details').show();
    }
    function check()
    {
        alert('checkout process completed');
    }
</script>