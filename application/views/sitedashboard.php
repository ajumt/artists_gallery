<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">


        <?php foreach($products as $item){?>
        <div class="single-products-catagory clearfix">
            <a href="<?php echo site_url('Seller/product_details/'. $item->id);?>">
<!--              / <img src="media\uploads\images.jpg" alt="">-->
                <img src="<?php echo base_url("media/uploads/".$item->image);?>" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>From $<?php echo $item->product_price;?></p>
                    <h4><?php echo $item->product_name;?></h4>
                </div>
            </a>
        </div>
        <?php }?>

    </div>
</div>
<!-- Product Catagories Area End -->
</div>

<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
<!---->