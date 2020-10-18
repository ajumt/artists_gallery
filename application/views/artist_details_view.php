<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <?php echo form_open('Buyer/artists_details');?>
                    <div class="form-group">
                        <?php
                        echo form_label('Artist Name','artist_name');
                        echo form_error('artist_name');
                        echo form_input('artist_name',set_value('artist_name'),'class="form-control"'); ?>
                    </div>
            </div>
            <div class="col-md-2" style="margin-top: 30px;">
                <?php echo form_submit('submit','Search ','class="btn btn-warning pull-right" tab-index="1"');?>                <?php echo form_close()?>
            </div>
        </div>
        <br>
        <div class="row">
            <?php if(count($artists)!=null){?>
            <?php foreach($artists as $item){?>
            <div class="col-md-3 grid-margin" style="margin-bottom:10px;">
                <div class="card text-center" style="width: 200px; height: 350px;background-color: #f3c17a;">
                    <div class="card-body">
                            <h4><?php echo $item->first_name.' '.$item->last_name?></h4>
                            <div class="row">
                                <div class="col-md-12">
                                  <a href="<?php echo site_url('site/artist_detailed_data/'.$item->id);?>"><img src="<?php echo base_url('media/uploads/'.$item->aimage)?>" style="width: 100px;height: 100px;border-radius: 50%;"></a>
                                       <br>
                                    <?php echo $item->email?>
                                       <?php echo $item->city.','?>
                                        <?php echo $item->district.','?>
                                       <?php echo $item->mobile_number?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php }else{?>
                <?php echo "Artist Not Fount"?>
            <?php }?>
        </div>
    </div>
</div>
