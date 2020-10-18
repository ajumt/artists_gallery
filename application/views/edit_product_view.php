<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
             <div class="col-lg-12 d-flex align-items-stretch grid-margin">
                 <div class="row flex-grow">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-body">
<!--                                 Product/edit_product-->
                                <?php echo form_open('') ?>
                                <?php foreach($users as $item){?>
                                <div class="form-group">
                                  <h5>Product Name:</h5>
                                  <input type="text" class="form-control" name="product_name" value="<?php echo $item->product_name;?>" size="50" />
                                </div>
                                <div class="form-group">
                                    <h5>Product Category  Name:</h5>
                                    <input type="text" class="form-control" name="product_cat_name" value="<?php echo $item->product_cat_type;?>" size="50" />
                                </div>
                                 <div class="form-group">
                                     <h5>Product Price: </h5>
                                     <input type="text" class="form-control" name="product_price" value="<?php echo $item->product_price;?>" size="50" />
                                 </div>
                                 <div class="form-group">
                                     <h5>Product Category Quantity: </h5>
                                     <input type="text" class="form-control" name="product_quantity" value="<?php echo $item->product_quantity;?>" size="50" />
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