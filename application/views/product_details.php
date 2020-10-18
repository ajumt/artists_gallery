<div class="single-product-area section-padding-100 clearfix" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <?php foreach($users as $item){?>
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item"><a href="#">Product Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $item->product_name;?></li>
                        <?php }?>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <?php foreach($users as $item){?>
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="<?php echo base_url("media/uploads/".$item->image);?>">
                                        <img class="d-block w-100" src="<?php echo base_url("media/uploads/".$item->image);?>" alt="First slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="<?php echo site_url('assets/amado/img/product-img/pro-big-2.jpg')?>">
                                        <img class="d-block w-100" src="<?php echo site_url('assets/amado/img/product-img/pro-big-2.jpg')?>" alt="Second slide">
                                    </a>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <h4><?php echo $item->product_name; ?></h4>

                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">$<?php echo $item->product_price; ?></p>
                            <a href="product-details.html">
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>

                            </div>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                        </div>
                        <br>
                        <div>
                            <a href="<?php echo site_url('site/cart/'.$item->id) ?>" style="width: 80px; height: 27px; font-size: 10px;" class="cart-nav btn btn-success">Add To Cart</a>
                        </div>
                        <br>
                        <div class="short_overview my-5">
                            <a href="#"><h5>About Product</h5></a>
                            <p><?php echo $item->description; ?></p>
                        </div>
                    </div>
                </div>

                <?php echo form_open('');?>
                    <div class="short_overview my-5">
                        <h2>  Comments: </h2>
                        <textarea name="comment"  rows="8" cols="100"></textarea>
                        <?php echo form_submit('submit','submit ','class="btn btn-success"');?>
                        <?php foreach($comment as $item1){ ?>

                            <p><b><?php  echo $item1->username;?></b><br>
                                <i class="fa fa-cloud" style="font-size:12px; color: black;"></i>
                                <?php echo $item1->comment; ?>
                            </p>
                        <?php } ?>

                    </div>
                <?php echo form_close();?>        
            <?php }?>
        </div>
    </div>
</div>
