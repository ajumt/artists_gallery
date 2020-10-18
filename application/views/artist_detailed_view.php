
<div class="shop_sidebar_area">


     <div class="text-center">
         <h4 class="widget-title mb-30">  <?php echo $artist->first_name.' '.$artist->last_name; ?></h4>
      <a><img style="border-radius: 50%;" src="<?php echo base_url('media/uploads/'.$artist->aimage)?>"></a>
         <br><br>
      <?php echo $artist->email;?><br>
      <?php echo $artist->mobile_number;?><br>
      <?php echo $artist->city; ?><br>
      <?php echo $artist->district;?><br>
      <?php echo $artist->pin;?><br>
   <br><br>
     <div>
        <input type="hidden" name="artist_name" value="<?php echo $artist->id;?>">
     </div>
     <div>
      <a class="btn btn-warning" href="<?php echo site_url('Site/send_message/'.$artist->id);?>">Message</a>
     </div>
     </div>

</div>

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
       <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
      </div>
     </div>

     </div>
    </div>
   </div>
  </div>


  <div class="row">
   <?php foreach($gallery as $item){?>
    <!-- Single Product Area -->
    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
     <div class="single-product-wrapper">
      <!-- Product Image -->
<!--      <a href="--><?php //echo site_url('Seller/product_details/'. $item->id);?><!--">-->

       <div class="product-img" style="margin-left: 100px; width: 480px; height: 480px;">
        <img src="<?php echo base_url('media/uploads/'.$item->pimage)?>" alt="">
       </div>
<!--      </a>-->
      <!-- Product Description -->
<!--      <div class="product-description d-flex align-items-center justify-content-between">-->
       <!-- Ratings & Cart -->
       <div class="ratings-cart text-right" style="margin-left: 100px;">
        <div class="ratings">
         <i class="fa fa-star" style="color: #f4c01a;" aria-hidden="true"></i>
         <i class="fa fa-star" style="color: #f4c01a;" aria-hidden="true"></i>
         <i class="fa fa-star" style="color: #f4c01a;" aria-hidden="true"></i>
         <i class="fa fa-star" style="color: #f4c01a;" aria-hidden="true"></i>
         <i class="fa fa-star" style="color: #f4c01a;" aria-hidden="true"></i>
        </div>
       </div>
<!--      </div>-->
     </div>
    </div>
   <?php }?>

  </div>
 </div>
</div>



<footer class="footer_area clearfix" style="width: 100%;height: 1px;">
 <div class="container">
  <div class="row align-items-center">
   <div class="col-12 col-lg-12">
    <div class="single_widget_area">
     <div class="footer-logo mr-50">
      <a href="sitedashboard.php"><img src="<?php echo site_url('assets/amado/img/core-img/logo2.png')?>" alt=""></a>
     </div>
     <p class="copywrite">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    </div>
   </div>
  </div>
 </div>
</footer>
