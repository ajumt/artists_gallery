<div class="row" style="width: 70%;">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="width: 92%; margin-top: 100px;margin-left: 80px;">
            <div class="card-body">
                <h3>Change Password</h3>
                <br>
                <?php echo form_open('Site/change_password/')?>

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('User Name','user_name');
                        echo form_error('user_name');
                        echo form_input('user_name',$users->username,'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Password','password');
                        echo form_error('password');
                        echo form_password('password',$users->password,'class="form-control"'); ?>
                    </div>
                </div>

                <?php echo form_submit('change_password','Change Password','class="btn btn-success"');?>
            </div>
            <?php echo form_close();?>
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
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>