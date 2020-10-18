<div class='content-wrapper'>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                            <h1 class="card-title " style="color: #672e8d"> PRODUCT REGISTRATION FORM</h1>
                    <?php echo form_open_multipart('')?>


                    <!--                            <div class="col-md-6">-->
                    <!--                                <div class="form-group">-->
                    <!--                                    --><?php
                    //                                    echo form_label('Batch Name','batch_name');
                    //                                    echo form_error('batch_name');
                    //                                    echo form_input('batch_name',set_value('batch_name'),'class="form-control"'); ?>
                    <!--                                </div>-->

<!--                <div class="col-md-6">-->
<!--                    <div class="form-group">-->
<!--                        --><?php
//                        echo form_label(' First Name','first_name');
//                        echo form_error('first_name');
//                        echo form_input('first_name',set_value('first_name'),'class="form-control"'); ?>
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-6">-->
<!--                    <div class="form-group">-->
<!--                        --><?php
//                        echo form_label('Last Name ','last_name');
//                        echo form_error('last_name');
//                        echo form_input('last_name',set_value('last_name'),'class="form-control"'); ?>
<!--                    </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6">-->
<!--                    <div class="form-group">-->
<!--                        --><?php
//                        echo form_label('Email','email');
//                        echo form_error('email');
//                        echo form_input('email',set_value('email'),'class="form-control"'); ?>
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--                    <div class="col-md-6">-->
<!--                        <div class="form-group">-->
<!--                            --><?php
//                            echo form_label('Password','password');
//                            echo form_error('password');
//                            echo form_input('password',set_value('password'),'class="form-control"'); ?>
<!--                        </div>-->
<!---->
<!--                    </div>-->

                    </div> <div class="col-md-6">
                        <div class="form-group">


                            <select class= "input" name="type" required>
<!--                                <option value= "" > --Select  Type--</option>-->
                                 <option value= "Seller" >Seller </option>
<!--                                <option value= "Buyer" >Buyer </option>-->
                            </select>
                        </div>




                        <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Product Name','product_name');
                            echo form_error('product_name');
                            echo form_input('product_name',set_value('product_name'),'class="form-control"'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Product Quantity','product_quantity');
                            echo form_error('product_quantity');
                            echo form_input('product_quantity',set_value('product_quantity'),'class="form-control"'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Product Price','product_price');
                            echo form_error('product_price');
                            echo form_input('product_price',set_value('product_price'),'class="form-control"'); ?>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Product Description','product_description');
                            echo form_error('product_description');
                            echo form_input('product_description',set_value('product_description'),'class="form-control"'); ?>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            echo form_label('Image','userfile');
                            echo form_error('userfile'); ?>
                            <input type="file" name="userfile" size="20"/>
                        </div>

                    </div>


                    <div class="row">
                        <div class="row submitRow">
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <h4 class="topicTitle">Properties
                                    <button  onclick="addSemRow(1)" class=" btn btn-danger" type="button">
                                        <i class="mdi mdi-plus"></i>
                                    </button>
                                </h4>
                            </div>
                        </div>
                    </div>


                    <div class="row semDetailRow">
                        <div class="col-lg-4 form-group">
                            <?php

                            echo form_error(' product_property_name');
                            echo form_input('product_property_name[]','',' class="form-control HoUrS" placeholder="eg:                                                                                                                                                                                Color"');
                            ?>
                        </div>
                        <div class="col-lg-1"></div>

                        <div class="col-lg-4 form-group">

                            <?php

                            echo form_error(' product_property');
                            echo form_input('product_property[]','',' class="form-control HoUrS1" placeholder="eg:  Red"');
                            ?>
                        </div>
                        <div class="row submitRow">
                            <div class="col-lg-12" style="margin-top: 20px;">


                                <button  onclick="removeRow(this)" class=" btn btn-danger" type="button">
                                    <i class="mdi mdi-minus"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <?php echo form_submit('add','Add ','class="btn btn-success"');?>

                    <?php echo form_close();?>
                            </div>
                        </div>

