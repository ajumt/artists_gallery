<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">
        <div class="row">
                <?php foreach($bid as $item){?>
                    <div class="col-md-3 grid-margin" style="margin-bottom:10px;">
                        <div class="card">
<!--                            <div class="card-body">-->
<!--                                <h4>--><?php //echo $item->first_name.' '.$item->last_name?><!--</h4>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-12">-->
<!--                                        <a href="--><?php //echo site_url('site/artist_detailed_data/'.$item->id);?><!--"><img src="--><?php //echo base_url('media/uploads/'.$item->aimage)?><!--" style="width: 100px;height: 100px;"></a>-->
<!--                                        --><?php //echo $item->email?>
<!--                                        --><?php //echo $item->city.','?>
<!--                                        --><?php //echo $item->district.','?>
<!--                                        --><?php //echo $item->mobile_number?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
            <?php }?>
        </div>
    </div>
</div>
