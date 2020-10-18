<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                        <h4 class="card-title" style="margin-left: 10px;">All Artists</h4>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="cart-title mt-10">
                                </div>
                                <div class="card">
                                    <div class="cart-table clearfix">
                                        <table class="table table-responsive" style="width:100%">
                                            <thead>
                                            <tr >
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Phone No</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>District</th>
                                                <th>Pin</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php  foreach($seller as $i=>$item){?>

                                            <tr>
                                                 <td class="cart_product_img">
                                                     <a href="#"><img src="<?php echo base_url('media/uploads/'.$item->image)?>"></a>
                                                 </td>
                                                <td>
                                                    <a href="<?php echo site_url('Site/user_details/'.$item->id);?>"><?php echo $item->first_name; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $item->mobile_number; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->email; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->city; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->district; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->pin; ?>
                                                </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
