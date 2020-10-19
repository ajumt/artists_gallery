<div class="buyer_details section section-padding-100 clearfix">
    <div class="container-fluid">
        <div class="row">
                <?php foreach($buyer as $item){?>
                    <div class="col-md-12 grid-margin" style="margin-bottom:10px;">
                        <div class="card" style="height: 600px;border-radius: 20px;">
                            <div class="card-body text-center">
                                <br>
                                <h3 style="color: #0000cc;"><?php echo $item->first_name.' '.$item->last_name?></h3><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?php echo site_url('//'.$item->id);?>"><img src="<?php echo base_url('media/uploads/'.$item->image)?>" style="width: 200px;height: 200px;"></a><br>
                                        <br>
                                        <h5>
                                        <?php echo $item->email?><br>
                                        <?php echo strtoupper($item->city);?><br>
                                        <?php echo strtoupper($item->district);?><br>
                                        <?php echo $item->mobile_number?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 "  style="padding-left: 200px;">
                    <a class="btn btn-primary pull-right" href=<?php echo site_url("Site/edit_profile/".$item->id)?>>Edit Profile</a>
                    <a class="btn btn-success pull-right" href=<?php echo site_url("Site/change_password/".$item->id)?>>Change password</a>
                    </div>
                <?php }?>
        </div>
    </div>
</div>