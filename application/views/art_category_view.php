<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">

                        <h4 class="card-title" >Add Art Category</h4>
                <br>
                        <?php echo form_open('');?>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <?php
                                    echo form_label('Art Category Name','art_category_name');
                                    echo form_error('art_category_name');
                                    echo '<div class="input-group">';
                                    echo form_input('art_category_name',set_value('art_category_name'),'class="form-control"');
                                    echo form_submit('add','Add','class="btn btn-success pull-right"');
                                    echo '</div>';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close();?>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="cart-title mt-10">
                                    <h5>Art Categories</h5>
                                </div>
                                <div class="card" >
                                    <div class="cart-table clearfix">
                                        <table class="table table-responsive" style="width:100%">
                                            <thead>
                                            <tr style="height: 70px">
                                                <th>Slno</th>
                                                <th>Art Category</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php  foreach($category as $i=>$item){?>
                                            <tr >
                                                <td>
                                                    <?php echo $i+1; ?>
                                                </td>
                                                <td>
                                                    <?php echo $item->art_category_name; ?>
                                                </td>
                                                <td><a href="<?php echo site_url('Site/update_art_category/'.$item->id)?>">Edit</a></td>
                                                <td><a href="<?php echo site_url('Site/delete_art_category/'.$item->id)?>">Delete</a></td>
                                            </tr>
                                            <?php }?>
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

