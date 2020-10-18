<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                 <a href="#"><img src="<?php echo base_url('media/uploads/messages/'.$product->pimage)?>" style=" width:100%;height:40%;"></a>

                        <div class="row">
                            <br>
                            <br>
                        <div class="col-lg-4">
                            <label><h4>Name:</h4></label><span style="color: #1c7430;"><?php echo $product->product_name?></span><br>

                        </div>
                        <div class="col-lg-4">
                            <label><h4>Quantity:</h4></label><span style="color: #1c7430;"><?php echo $product->product_quantity?></span><br>

                        </div>
                        <div class="col-lg-4">
                            <label><h4>Price:</h4></label><span style="color: #1c7430;"><?php echo $product->product_price?></span>
                        </div>
                    </div>
                <?php echo form_open('Buyer/put_to_bid/'.$product->id);?>

                <input type="hidden" name="pname" value="<?php echo $product->product_name;?>"
                <input type="hidden" name="pquantity" value="<?php echo $product->product_quantity;?>"
                <input type="hidden" name="p_price" value="<?php echo $product->product_price;?>"
                <div class="row">
                    <br><br>
                    <div class="col-lg-12">
                        <h4 style="color: #d99500;">Bid Details</h4>
                        <div class="row">
                        <div class="col-lg-12">
                        <label>Bid Name:</label><input class="form-control" type="text" name="bid_name">
                        <label>Start date:</label><input class="form-control" type="date" name="start_date">
                        <label>End date:</label><input class="form-control" type="date" name="end_date">
                        <label>Start Time:</label><input class="form-control" type="time" name="start_time">
                        <label>End Time:</label><input class="form-control" type="time" name="end_time">
                        <label>Starting Price:</label><input class="form-control" type="text" name="start_price"><br><br>
                        <button class="btn btn-warning pull-right" type="submit" name="put_to_bid">Put to Bid</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



