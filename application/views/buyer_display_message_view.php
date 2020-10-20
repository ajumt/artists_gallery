
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <?php foreach($message as $item){?>
                <?php echo form_open('Buyer/place_order/');?>
                    <input type="hidden" name="address" value="<?php echo $item->first_name;?>">
                    <input type="hidden" name="msg" value="<?php echo $item->artist_id;?>">
                    <input type="hidden" name="status" value="<?php echo $item->status;?>">
                    <input type="hidden" name="msg1" value="<?php echo $item->mid;?>">
                    <input type="hidden" name="amt" value="<?php echo $item->image_amount;?>">

                    <div class="panel panel-success">
                        <div class="panel-heading" data-toggle="collapse" data-target="#demo<?php echo $item->id;?>">
                            <?php echo $item->subject;?>
                        </div>
                        <div class="panel-body" id="demo<?php echo $item->id;?>" class="collapse">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td>
                                                <?php if($item->file!=''){?>
                                                    <a href="#"><img src="<?php echo base_url('media/uploads/messages/'.$item->file);?>" style="width: 200px;"></a>
                                                <?php }?>
                                                <?php if($item->type_id==0){?>

                                                    <?php if($item->status==0 || $item->status==-1){?>
                                                        <?php echo $item->status==0?'<h2 style="color: #990000;">Job not accepted</h2>':
                                                        '<h2 style="color: #009900;">Request pending</h2>'?>
                                                        <td>
<!--                                                           <a class="btn btn-xs btn-flat" style="background-color: #990000;height: 31px;width: 33px;" title="Delete Item" href="--><?php //echo site_url('Seller/delete_message/'.$item->id);?><!--"><i class="mdi mdi-delete"style="width: 80px;" aria-hidden="true"></i></a>-->

                                                           <a class="btn btn-danger pull-right" href="<?php echo site_url('Seller/delete_message/'.$item->mid);?>">Delete</a>


                                                        <td>
                                                    <?php } else{?>
                                                        <!-- <a href="#"><img src="<?php echo base_url('media/uploads/messages/'.$item->file);?>" style="width: 200px;"></a> -->
                                                        <h3 style="color: #008a00"><?php echo "Accepted the job";?></h3><br>
                                                        <label>Amount:</label><br>
                                                        <h2>Rs.<?php echo "$item->image_amount";?></h2><br>
                                                    <?php echo form_submit('place_order','Place Order ','class="btn btn-warning pull-right"');?><br>
                                                  <?php }?>
                                                   <?php } else{?>
                                                    <!-- <a href="#"><img src="<?php echo base_url('media/uploads/messages/'.$item->file);?>" style="width: 200px;"></a> -->
                                                    <h3 style="color: #008a00"><?php echo "Accepted the job";?></h3><br>
                                                    <label>Amount:</label><br>
                                                    <h2>Rs.<?php echo "$item->total";?></h2><br>
                                                   <?php }?>


                                               </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                 <?php }?>


                </div>
            </div>
        </div>
    </div>

