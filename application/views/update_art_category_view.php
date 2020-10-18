<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="margin-left: 50px">
                    <div class="card-body" style="margin-left: 50px">
                        <h2 class="card-title" style="color: #3300aa">Update Art Category Form</h2>
                        <?php echo form_open('');?>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <?php
                                    echo form_label('Art Category Name','art_category_name');
                                    echo form_error('art_category_name');
                                    echo '<div class="input-group">';
                                    echo form_input('art_category_name',$art_category->art_category_name,'class="form-control"');
                                    echo form_submit('update','Update','class="btn btn-success pull-right"');
                                    echo '</div>';
                                    ?>
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
