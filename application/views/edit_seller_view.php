<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
             <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                 <div class="row flex-grow">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-body">
                                <?php echo form_open_multipart('Seller/edit_product') ?>
                                <?php  foreach($users as $item){?>
                                <div class="form-group">
                                    <?php
                                    //echo form_label('procat_name','id');
                                    echo form_error('id');
                                    ?> </br>
                                       </div>
<!--                                 <div class="form-group">-->
<!--                                     <h5>First Name:</h5>-->
<!--                                     <input type="text" class="form-control" name="first_name" value="--><?php //echo $item->first_name;?><!--" size="50" />-->
<!--                                 </div>-->
<!--                                 <div class="form-group">-->
<!--                                     <h5>Last Name: </h5>-->
<!--                                     <input type="text" class="form-control" name="last_name" value="--><?php //echo $item->last_name;?><!--" size="50" />-->
<!--                                 </div>-->
<!--                                 <div class="form-group">-->
<!--                                     <h5>Email : </h5>-->
<!--                                     <input type="text" class="form-control" name="email" value="--><?php //echo $item->email;?><!--" size="50" />-->
<!--                                 </div>-->
<!---->
<!---->
<!--                                 <div class="form-group">-->
<!--                                     <h5>Password : </h5>-->
<!--                                     <input type="text" class="form-control" name="password" value="--><?php //echo $item->password;?><!--" size="50" />-->
<!--                                 </div>-->
<!---->
<!---->
                               <div class="form-group">
                                     <h5>Product Name : </h5>
                                     <input type="text" class="form-control" name="product_name" value="<?php echo $item->product_name;?>" size="50" />
                                 </div>


                                 <div class="form-group">
                                     <h5>Product Quantity : </h5>
                                     <input type="text" class="form-control" name="product_quantity" value="<?php echo $item->product_quantity;?>" size="50" />
                                 </div>


                                 <div class="form-group">
                                     <h5>Product Price : </h5>
                                     <input type="text" class="form-control" name="product_price" value="<?php echo $item->product_price;?>" size="50" />
                                 </div>


                                 <div class="form-group">
                                     <h5>Image : </h5>
                                     <img src="<?php echo base_url("media/uploads/".$item->image);?>" alt="">
                                     <input type="file" name="userfile" size="20"/>

                                 </div>



                                 <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" name="num" value="<?php echo $item->id;?>"
                                </div>
                                <?php }?>
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <button class="btn btn-light">Cancel</button>
                                <?php echo form_close(); ?>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>