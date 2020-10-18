
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">

                <!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)-->
<div class="card" xmlns="http://www.w3.org/1999/html">
    <div class="card-body">
        <a class="btn btn-success" style="float: right;" href="<?php echo site_url('Buyer/add_buyer');?>">ADD BUYER DETAILS</a>
        </br>
        </br>

        <?php echo form_open('') ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-condensed" style="color: #0050e3" border="1">
                <tr>
                    <th><span  s style="color: #0D0A0A">SLNo:</span></th>  <th>First Name</th>
                    <th>Last_Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>State</th>
                    <th>District</th>
                    <th>City</th>
<!--                    <th>Add</th>-->

                    <th><span  style="color: #0D0A0A">Edit</span></th>
                           <th><span  style="color: #0D0A0A">Delete</span></th>
                </tr>
                <?php foreach($buyer as $item) {?>
                    <tr>
                        <td> <?php echo $item->id; ?></td>
                        <td><?php echo $item->first_name; ?></td>
                        <td><?php echo $item->last_name;?></td>
                        <td><?php echo $item->email; ?></td>
                        <td><?php echo $item->password; ?></td>
                        <td><?php echo $item->state; ?></td>
                        <td><?php echo $item->district; ?></td>
                        <td><?php echo $item->city; ?></td>

                        <td><a href="<?php echo site_url('buyer/edit_buyer/'.$item->id)?>"><span  style="color: darkorange">EDIT</span></a></td>
                          <td><a href="<?php echo site_url('buyer/delete_buyer/'.$item->id)?>"><span  style="color: #CC0000">DELETE</span></a></td>
                    </tr>

                <?php }?>
            </table>

        </div>


            <?php echo form_close(); ?>
    </div>
</div>
</div>
            </div>
            </div>
        </div>
    </div>


