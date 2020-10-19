<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo"  style="border-bottom: solid black; height: 100px; margin-bottom:10px;">
        <a href="#"><img src="<?php echo base_url('assets/amado/img/core-img/logo.png')?>" alt=""></a>
    </div>
    <!--UserDetails-->
    <?php
//    print_r($this->session->userdata());
    if($this->session->userdata('username')){?>

        <div class="profile-image">
            <img style="width: 50px;" src="<?php echo base_url('media/uploads/'.$this->session->userdata('image'))?>">
        </div>
        <div style="border-bottom: solid black;padding-top: 0px; padding-bottom: 10px;">
            <a href=<?php echo site_url('site/profile/')?>>
            <?php echo $this->session->userdata('username');?>
            <br>UserType:<?php echo $this->session->userdata('type');?>
           </a>
        </div>
    <?php } ?>

    <!-- Amado Nav -->
    <nav class="amado-nav cart-fav-search mb-100">
        <ul>
            <?php foreach($sidebar_menu as $item){
                $active='';
            ?>
            <li class="<?php echo $active?> cart-nav"><a href="<?php echo  site_url($item['href'])?>">
                    <img src="<?php echo base_url('assets/amado/img/core-img/'.$item['img'])?>">
                    <?php echo $item['text'];?>
                </a>
            </li>
            <?php }?>

        </ul>
    </nav>
    <!-- Button Group -->
    <!-- <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">%Discount%</a>
        <a href="#" class="btn amado-btn active">New this week</a>
    </div> -->
    <!-- Cart Menu -->
    <!-- <div class="cart-fav-search mb-100">
        <a href="cart.html" class="cart-nav"><img src="<?php echo base_url('assets/amado/img/core-img/cart.png')?>"> Cart <span>(0)</span></a>
        <a href="#" class="fav-nav"><img src="<?php echo base_url('assets/amado/img/core-img/favorites.png')?>" alt=""> Favourite</a>
        <a href="#" class="search-nav"><img src="<?php echo base_url('assets/amado/img/core-img/search.png')?>" alt=""> Search</a>
    </div> -->
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
</header>