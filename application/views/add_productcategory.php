<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="margin-left: 50px">
                <div class="card-body">
                    <h3 class="card-title " style="color: #672e8d">PRODUCT CATEGORY DETAILS</h3>
                    <?php echo form_open('');?>
                      <div class="col-md-12">
                          <div class="form-group">
                            <?php
                            echo form_label('parent','id');
                            echo form_error('id');
                            ?> </br>
                            <?php echo form_dropdown('parent_id',$parent,'','class="form-control"  id="parent"');  ?>
                          </div>
                      </div>

                      <div class="col-md-12">
                           <div class="form-group">
                            <?php
                            echo form_label('Product Category Name','procat_name');
                            echo form_error('procat_name');
                            echo form_input('procat_name',set_value('procat_name'),'class="form-control"'); ?>
                           </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                           <?php
                           echo form_label('Product Category Code','procat_code');
                           echo form_error('procat_code');
                           echo form_input('procat_code',set_value('procat_code'),'class="form-control"'); ?>
                          </div>
                       </div>

                    <?php echo form_submit('add','Add ','class="btn btn-primary pull-right" tab-index="1"');?>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
