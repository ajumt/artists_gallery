<div class='content-wrapper'>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title " style="color: #672e8d">BUYERS REGISTRATION FORM</h1>
                    <?php echo form_open('');?>


                    <!--                            <div class="col-md-6">-->
                    <!--                                <div class="form-group">-->
                    <!--                                    --><?php
                    //                                    echo form_label('Batch Name','batch_name');
                    //                                    echo form_error('batch_name');
                    //                                    echo form_input('batch_name',set_value('batch_name'),'class="form-control"'); ?>
                    <!--                                </div>-->

                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        echo form_label(' First Name','first_name');
                        echo form_error('first_name');
                        echo form_input('first_name',set_value('first_name'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        echo form_label('Last Name ','last_name');
                        echo form_error('last_name');
                        echo form_input('last_name',set_value('last_name'),'class="form-control"'); ?>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <?php
                        echo form_label('Email','email');
                        echo form_error('email');
                        echo form_input('email',set_value('email'),'class="form-control"'); ?>
                    </div>

                </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Password','password');
                            echo form_error('password');
                            echo form_input('password',set_value('password'),'class="form-control"'); ?>
                        </div>

                    </div>

                </div> <div class="col-md-6">
                    <div class="form-group">


                        <select class= "input" name="type" required>
                            <option value= "" > --Select  Type--</option>
                             <option value= "Seller" >Seller </option>
                            <option value= "Buyer" >Buyer </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('State','state');
                            echo form_error('state');
                            echo form_input('state',set_value('state'),'class="form-control"'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('District','district');
                            echo form_error('district');
                            echo form_input('district',set_value('district'),'class="form-control"'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('City','city');
                            echo form_error('city');
                            echo form_input('city',set_value('city'),'class="form-control"'); ?>
                        </div>

                    </div>




                    <?php echo form_submit('add','Add ','class="btn btn-success"');?>

                    <?php echo form_close();?>
    </div>
</div>
<!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)-->
