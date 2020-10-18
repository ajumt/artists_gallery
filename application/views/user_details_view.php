<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="margin-left: 50px">
                    <div class="card-body" style="margin-left: 50px">
                        <h2 class="card-title" style="color: #3300aa">User View</h2>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="cart-title mt-10">
                                </div>
                                <div class="card" style="margin-left:  10px">
                                    <div class="cart-table clearfix">
                                        <table class="table table-responsive" style="width:100%">
                                            <thead>
                                            <tr style="height: 70px">
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="cart_product_img">
                                                        <a href="#"><img src="<?php echo base_url('media/uploads/'.$user->uimage)?>"></a>
                                                    </td>

                                                    <td>
                                                        <?php echo $user->first_name.' '.$user->last_name; ?><br>
                                                        <?php echo $user->mobile_number;?><br>
                                                        <?php echo $user->email;?><br>
                                                        <?php echo $user->city; ?><br>
                                                        <?php echo $user->district;?><br>
                                                        <?php echo $user->pin;?><br>
                                                    </td>
                                                </tr>
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

    </div>
</div>
