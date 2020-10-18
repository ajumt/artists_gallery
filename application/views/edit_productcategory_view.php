<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
             <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                 <div class="row flex-grow">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-body">
                                <?php echo form_open('Productcategory/edit_productcategory') ?>
                                <?php  foreach($users as $item){?>
                                <div class="form-group">
                                    <?php
                                    //echo form_label('procat_name','id');
                                    echo form_error('id');
                                    ?> </br>
                                       </div>
                                 <div class="form-group">
                                     <h5>Product Category  Name:</h5>
                                     <input type="text" class="form-control" name="procat_name" value="<?php echo $item->procat_name;?>" size="50" />
                                 </div>
                                 <div class="form-group">
                                     <h5>Product Category : </h5>
                                     <input type="text" class="form-control" name="procat_code" value="<?php echo $item->procat_code;?>" size="50" />
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