<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-12">

        <!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)-->
<div class="card" xmlns="http://www.w3.org/1999/html">
    <div class="card-body">
        <a class="btn btn-success" style="float: right;" href="<?php echo site_url('product/add_product');?>">ADD PRODUCT </a>
        </br>
        </br>

        <?php echo form_open('') ?>

        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed" style="color: #0050e3" border="1">
                <tr>
                    <th><span  style="color: #0D0A0A">SLNo:</span></th>  <th><span  style="color: #0D0A0A">Product  Name:</span></th>
                    <th><span  style="color: #0D0A0A">Product Category Code:</span></th>
                    <th><span  style="color: #0D0A0A">Product Price:</span></th>
                    <th><span  style="color: #0D0A0A">Product Quantity:</span></th>
<!--                    <th>Add</th>-->

                    <th><span  style="color: #0D0A0A">Edit</span></th>

                    <th><span  style="color: #0D0A0A">Delete</span></th>
                </tr>
                <?php foreach($product as $item) {?>
                    <tr>
                        <td> <?php echo $item->id; ?></td>
                        <td><?php echo $item->product_name; ?></td>
                        <td><?php echo $item->product_type; ?></td>
                        <td><?php echo $item->product_price; ?></td>
                        <td><?php echo $item->product_quantity; ?></td>
<!--                        <td><a href="--><?php //echo site_url('product/add_product/'.$item->id)?><!--">ADD</a></td>-->
                        <td><a href="<?php echo site_url('product/edit_product/'.$item->id)?>"><span  style="color: darkorange">EDIT</span></a></td>

                        <td><a href="<?php echo site_url('product/delete_product/'.$item->id)?>"><span style="color: #CC0000">DELETE</span></a></td>
                    </tr>


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
