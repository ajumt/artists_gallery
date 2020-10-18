<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <h2>Active Bids Details</h2>
        <div class="row">
            <div class="col-lg-12">
            <a class="btn btn-success pull-right" href="<?php echo site_url('Artist/completed_bid/')?>">Completed</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo form_open('');?>
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-12">

                                    <table class="table">
                                        <thead>
                                            <th>Slno</th>
                                            <th>Bid Name</th>
                                            <th>start Date</th>
                                            <th>End Date</th>
                                            <th>ProductName</th>
                                            <th>StartingPrice</th>
                                        </thead>

                                        <tbody>
                                        <?php foreach($bids as $i=>$item){?>
                                            <tr>
                                                <td>
                                                    <?php echo $i+1;?>
                                                </td>
                                                <td>
                                                    <?php echo $item->bid_name;?>
                                                </td>
                                                <td>
                                                    <?php echo $item->start_date;?>
                                                </td>
                                                <td>
                                                    <?php echo $item->end_date;?>
                                                </td>
                                                <td>
                                                    <a href="#"><?php echo $item->product_name;?></a>
                                                </td>
                                                <td>
                                                    <?php echo $item->starting_price;?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>

