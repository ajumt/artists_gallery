<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <?php echo form_open('');?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <a class="btn btn-danger" href="<?php echo site_url('Seller/active_bid/')?>">Active</a>
                                </div>
                                <div class="col-lg-4">
                                    <a class="btn btn-success" href="<?php echo site_url('Seller/completed_bid/')?>">Completed</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>

   