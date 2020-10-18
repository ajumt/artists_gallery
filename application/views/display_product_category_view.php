<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
        <a class="btn btn-warning pull-right" style="font-size: small; " href="<?php echo site_url('productcategory/add_product_category');?>">ADD CATEGORY</a>
                <div class="cart-title mt-50">
                    <h2>All Product Category</h2>
                </div>
                <div class="cart-table  ">
                    <table class="table">
                            <thead>
                            <tr>
                                <th>SLNo</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Operation</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($parent as $i=>$item) {?>
                            <tr>
                                <td colspan="2"> <?php echo $i+1; ?></td>
                                <td><?php echo  $item->procat_name;  ?></td>
                                <td><?php echo $item->procat_code; ?></td>
                                <td><a class="btn btn-xs btn-flat" style="background-color: #fdb813;height: 34px;width: 36px;" title="Delete Item" href="<?php echo site_url('Productcategory/delete_Productcategory/'.$item->id);?>" class="qty-trash"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                <td></td>
                            </tr>
                            <?php if(count($item->childrens)>0){?>
                            <?php foreach($item->childrens as $j=>$subcategory) {?>
                            <tr>
                                <td style="padding-left: 65px;" > <?php echo $j+1; ?></td>
                                <td><?php echo $subcategory->procat_name; ?></td>
                                <td><?php echo $subcategory->procat_code;?></td>
                                <td><a class="btn btn-xs btn-flat" style="background-color: #fdb813;height: 34px;width: 36px;" title="Delete Item" href="<?php echo site_url('Productcategory/delete_Productcategory/'.$subcategory->id);?>" class="qty-trash"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                                <?php }?>
                            <?php }?>
                            <?php }?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

