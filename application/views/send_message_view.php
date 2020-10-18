
<div class="shop_sidebar_area">


    <div class="text-center">
        <h4 style="color: #f4c01a;" class="widget-title mb-30"><?php echo $artist->first_name.' '.$artist->last_name; ?><br></h4>
        <a><img  style="border-radius: 50%;" src="<?php echo base_url('media/uploads/'.$artist->aimage)?>"></a><br>
        <!--      --><?php //echo $artist->first_name.' '.$artist->last_name; ?><!--<br>-->
       <br>
        <?php echo $artist->email;?><br>
        <?php echo $artist->mobile_number;?><br>
        <?php echo $artist->city; ?><br>
        <?php echo $artist->district;?><br>
        <?php echo $artist->pin;?><br>
    </div>
    <br><br>
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

        <div class="row">
            <div class="col-md-12">
                <?php echo form_open('');?>
<!--                 --><?php //print_r($id);?>
                <div class="form-group">
                    <?php
                    echo form_label('Subject','subject');
                    echo form_error('subject');
                    echo form_input('subject',set_value('subject'),'class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Message','message');
                    echo form_error('message');
                    echo form_textarea('message',set_value('message'),'class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('File(*.jpg,*.png,*.zip,*.gif)','file');
                    echo form_error('file'); ?>
                    <input type="file" name="file" size="20"/>
                </div>
                <div>
                    <?php echo form_submit('submit','Submit ','class="btn btn-warning pull-right" tab-index="1"');?>
                </div>
                <?php echo form_close()?>
            </div>
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
