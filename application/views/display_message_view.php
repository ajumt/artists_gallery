<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
                        <div class="col-md-12">
                            <?php if(count($message))
                            foreach($message as $item){?>
                                <div class="panel panel-success">
                                    <div class="panel-heading" data-toggle="collapse" data-target="#demo<?php echo $item->mid;?>">
                                        <?php echo $item->subject;?>
                                    </div>
                                    <div class="panel-body" id="demo<?php echo $item->id;?>" class="collapse">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?php echo form_open('Site/update_status_accept/');?>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a href="#"><img src="<?php echo base_url('media/uploads/messages/'.$item->file)?>" width="100px"></a>
                                                        </td>
                                                        <td>
                                                            <?php echo $item->message;?>
                                                        </td>
                                                    </tr>
                                                    <tr style="border-top:1px solid black;">
                                                        <td>
                                                            <input type="hidden" name="artist_id" value="<?php echo $item->artist_id;?>">
                                                            <input type="hidden" name="msg_id" value="<?php echo $item->mid;?>">
                                                            <input type="hidden" name="typeid" value="<?php echo $item->type_id;?>">
                                                            <label>Amount:</label>
                                                            <?php if($item->status==-1){?>
                                                            <input type="text" name="amount" value="<?php echo $item->image_amount;?>">
                                                            <?php }else{?>
                                                                <h3>
                                                                    Rs.<?php echo $item->image_amount;?>/-
                                                                </h3>
                                                            <?php }?>

                                                        </td>
                                                        <td style="text-align: right">

                                                            <?php if($item->status==-1){?>
                                                                <?php echo form_submit('accept','Accept ','class="btn btn-success"');?>
                                                                <a class="btn btn-danger" href="<?php echo site_url('Site/update_status_decline/'.$item->mid);?>">Decline</a>
                                                            <?php }elseif($item->status==0){?>
                                                                <h3 style="color:red;"><?php echo "You did not accepted the job";?></h3>
                                                            <?php }else{?>
                                                                <h3 style="color:green;"><?php echo "Accepted the job";?></h3>
                                                            <?php }?>

                                                        </td>
                                                    </tr>
                                                </table>
                                                <?php echo form_close()?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{?>
                                <h3>No messages</h3>
                            <?php }?>
                        </div>
                    </div>
    </div>
</div>