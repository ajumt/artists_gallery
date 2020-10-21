
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php $summ=0;?>
                            <?php foreach($cart as $item){?>

                          <tr>
                            <td class="cart_product_img">
                                <a href="#"><img src="<?php echo base_url('media/uploads/'.$item->image);?>" alt="Product"></a>
                            </td>
                            <td class="cart_product_desc">
                                <h5><?php echo $item->product_name;?></h5>
                            </td>
                            <td class="price">
                                &#8377;<span id="price<?php echo $item->id?>"><?php echo $item->product_price;?></span>
                            </td>
                            <td class="qty">
                                <div class="qty-btn d-flex">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty<?php echo $item->id?>'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ){ effect.value--;effect.dispatchEvent(new Event('change'));}return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input data-id="<?php echo $item->id?>" type="number" class="qty-text" id="qty<?php echo $item->id?>" step="1" min="1" max="300" name="quantity" value="<?php echo $item->product_qty?>"  onchange="changeTotal(this);updateQty(this)">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty<?php echo $item->id?>'); var qty = effect.value; if( !isNaN( qty )) {effect.value++; effect.dispatchEvent(new Event('change'));}return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </td>
                            <td class="total">
                                <span class="ind-total" id="total<?php echo $item->id?>"><?php echo $item->product_price*$item->product_qty;?></span>
                            </td>
                            <td>
                                <a class="btn btn-danger"  href="<?php echo site_url('Site/delete_product/'.$item->id);?>" class="qty-trash"><i class="fa fa-trash" aria-hidden="true"></i></a>

                            </td>
                          </tr>
                        <?php  $summ=($summ+($item->product_price*$item->product_qty));?>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php echo form_open('');?>
            <div class="col-12 col-lg-12">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span id="grandtotal"><?php echo $summ;?></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span id="grandtot"><?php echo $summ;?></span></li>
                    </ul>

                    <?php if($this->session->userdata('username')){?>

                        <div>
                            <div class="cart-btn mt-100">
                                <input type="hidden" value="<?php echo $summ;?>" name="sum">
                                <a href="<?php echo site_url('site/checkout/'.$summ);?>" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>

                    <?php } else{?>
                    <div class="cart-btn mt-100">
                        <a href="<?php echo site_url('Main/login/')?>" class="btn amado-btn w-100">Login</a>
                    </div>
                     <?php } ?>
                </div>
            </div>
            <?php echo form_close();?>

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

<script>
    function changeTotal(qtytext){
        qtytext = $(qtytext);
//        console.log($(qtytext));
        var id= qtytext.attr('data-id');
//        console.log(id);
        var qty = parseInt(qtytext.val());
        console.log(qty);

        var price = parseFloat($('#price'+id).text());
//        var price=$('#price').val();
        console.log(price);

        var total = qty*price;
        $('#total'+id).text(total)
        console.log(total);
        var sum=0;
        $('.ind-total').each(function(i,d){
            console.log(d);
            sum+=parseFloat($(d).text());
        })
        console.log(sum);
        $('#grandtotal').text(sum);
        $('#grandtot').text(sum);

    }

    function updateQty(inp){
        var str=$(inp).val();
//        console.log(str);
        var id=$(inp).attr('data-id');
//        console.log(id);
        var url=site_url+"site/cart/"+id+"/"+str;
//            console.log(url);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'html',
            success:function (data) {
                location.reload();
            }
        });

    }
</script>