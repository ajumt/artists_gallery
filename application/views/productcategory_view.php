
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card" xmlns="http://www.w3.org/1999/html">
        <div class="card-body">
        <a class="btn btn-success" style="float: right; height: 30px; font-size: small;" href="<?php echo site_url('productcategory/add_product_category');?>">ADD PRODUCT CATEGORY</a>
        </br>
        </br>

        <?php echo form_open('') ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed" style="color: #0050e3" border="1">
                <tr>
                    <th><span  s style="color: #0D0A0A">SLNo:</span></th>  <th></th>
                    <th></th>
                    <th><span  style="color: #0D0A0A">Edit</span></th>
                           <th><span  style="color: #0D0A0A">Delete</span></th>
                </tr>
                <?php foreach($productcategory as $item) {?>
                    <tr>
                        <td> <?php echo $item['details']->id; ?></td>
                        <td><?php echo $item['details']->procat_name; ?></td>
                        <td><?php echo $item['details']->procat_code; ?></td>
<!--                        <td><a href="--><?php //echo site_url('productcategory/add_product_category/'.$item['details']->id)?><!--">ADD</a></td>-->
                        <td><a href="<?php echo site_url('productcategory/edit_productcategory/'.$item['details']->id)?>"><span  style="color: darkorange">EDIT</span></a></td>
                          <td><a href="<?php echo site_url('productcategory/delete_productcategory/'.$item['details']->id)?>"><span  style="color: #CC0000">DELETE</span></a></td>
                    </tr>
                    <?php if(count($item['childrens'])>0){?>
                        <?php foreach($item['childrens'] as $subcat) {?>
                            <tr>
                                <td> &nbsp;</td>
                                <td> <?php echo $subcat->id; ?></td>
                                <td><?php echo $subcat->procat_name; ?></td>
                                <td><?php echo $subcat->procat_code; ?></td>
                                <td><a href="<?php echo site_url('productcategory/edit_productcategory/'.$subcat->id)?>"><span  style="color: darkorange">EDIT</span></a></td>
                                   <td><a href="<?php echo site_url('productcategory/delete_productcategory/'.$subcat->id)?>"><span  style="color: #CC0000">DELETE</span></a></td>
                            </tr>
                        <?php }?>
                    <?php }?>
                <?php }?>
            </table>

        </div>


            <?php echo form_close(); ?>
    </div>
</div>
</div>
            </div>
            </div>
        </div>
    </div>


