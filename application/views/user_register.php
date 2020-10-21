<div class="row" style="width: 70%;">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card" style="width: 92%;">
            <div class="card-body">
                <h3>SignUp</h3>
                <br>
                <?php echo form_open_multipart('seller/add_user')?>

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label(' First Name','first_name');
                        echo form_error('first_name');
                        echo form_input('first_name',set_value('first_name'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Last Name ','last_name');
                        echo form_error('last_name');
                        echo form_input('last_name',set_value('last_name'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Email','email');
                        echo form_error('email');
                        echo form_input('email',set_value('email'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Mobile Number','mobile_number');
                        echo form_error('mobile_number');
                        echo form_input('mobile_number',set_value('mobile_number'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('City','city');
                        echo form_error('city');
                        echo form_input('city',set_value('city'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('District','district');
                        echo form_error('district');
                        echo form_input('district',set_value('district'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Pin','pin');
                        echo form_error('pin');
                        echo form_input('pin',set_value('pin'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('User Name','user_name');
                        echo form_error('user_name');
                        echo form_input('user_name',set_value('user_name'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Password','password');
                        echo form_error('password');
                        echo form_password('password',set_value('password'),'class="form-control"'); ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Confirm Password','confirm_password');
                        echo form_error('confirm_password');
                        echo form_password('confirm_password',set_value('confirm_password'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        Artists<input type="checkbox" name="check"/>
                    </div>
                </div>
                <!-- <div class="col-md-12">
                    <div class="form_group">
                        <?php
                        echo form_dropdown('artists',$artists,'','class="form-control"')?>
                    </div><br/>
                </div> -->
                <div class="col-md-12">
                    <div class="form_group">
                        <?php
                        echo form_dropdown('gender',$gender,'','class="form-control"')?>
                    </div><br/>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <?php
                        echo form_label('User Image','userfile');
                        echo form_error('userfile'); ?>
                        <input type="file" name="userfile" size="20"/>
                    </div>
                    <?php echo form_submit('add','Add','class="btn btn-success"');?>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <style>
        p.error{
            color:red;
        }
    </style>