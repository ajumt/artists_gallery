<div class="starting_bids section-padding-100">
    <div class="container-fluid">
        <h2>Bidding Details</h2><br>
        <?php echo form_open('Buyer/add_bid_details/'.$start_bid->bid1);?>
        <input type="hidden" name="created_on" value="<?php echo $start_bid->created_on;?>">
        <div class="row">
            <div class="col-lg-12 grid-margin" style="margin-bottom:50px;">
                <div class="card">
                    <div class="card-body text-center" style="margin-left: 40px;">
                        <h4><b style="font-size: 30px; color: #FF9D00;"><?php echo $start_bid->bid_name?></b></h4><br>
                                <a href="#"><img src="<?php echo base_url('media/uploads/'.$start_bid->image)?>" style="width: 600px;height: 200px;"></a><br>
                                        <b style="font-size:25px;"><?php echo $start_bid->product_name;?></b><br>
                                        <label><b style="font-size:25px; ">&#8377</b></label><b style="font-size:25px;"><?php echo $start_bid->starting_price;?>/-</b><br>
                                        <label><b>Start Date:</b></label><?php echo $start_bid->start_date;?><br>
                                        <label><b>End Date:</b></label><?php echo $start_bid->end_date;?><br>
                                        <?php echo $start_bid->description.','?>
                        </div>
                    </div><br>
                          <div class="row">
                             <div class="col-lg-10">
                                <b><label>Rs.</label></b><input class="form-control" type="text" name="amount">
                             </div>
                              <div class="col-lg-2"><br>
                                  <button class="btn btn-warning" type="submit" name="submit">Submit</button>
                              </div>
                          </div><br>

            </div>
            <?php if(count($buyers)>0){?>

            <div class="col-lg-12">
                        <?php foreach($buyers as $item) {?>

                            <div class="card">
                                <div class="card-body text-center">
<!--                                    <a href="#"><img src="--><?php //echo base_url('media/uploads/'.$item->image)?><!--" style="width: 300px;height: 200px;"></a><br>-->
                                    <div class="row">
                                        <div class="col-lg-12" style="font-size: 30px;">
                                            <b>&#8377</b><?php echo $item->max_amount;?>/-
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <b><?php echo $item->first_name.'.'.$item->last_name;?></b><br>
                                            <b><label>Starting On:</label></b><?php echo $item->created_on;?>
                                        </div>
                                    </div>

                                </div>
                            </div><br>
                        <?php }?>
                    </div>
            <?php }?>

        </div>
        </div><br>
    <?php if(count($bids)){?>
    <div class="row">
        <div class="col-lg-4">
           <ul>
               <li>
                  <b>Amount</b>
               </li>
           </ul>
        </div>
        <div class="col-lg-8">
            <ul>
                <li>
                   <b>Starting On</b>
                </li>
            </ul>
        </div>
    </div>
    <?php }?>
    <br>
    <?php foreach($bids as $item){?>
    <div class="row">
        <div class="col-lg-4">
             <ul>
                 <li>
                     <b>&#8377</b><?php echo number_format($item->amnt,2);?>
                 </li>
             </ul>
        </div>
        <div class="col-lg-8">
            <ul>
                <li>
                    <?php echo $item->start_date;?>
                </li>
            </ul>
        </div>
    </div>
  <?php }?>
    </div>
<br>
    <?php echo form_close()?>
</div>