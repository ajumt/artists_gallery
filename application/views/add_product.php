<div class='content-wrapper'>
    <div class="row">
        <h4 style="margin-left: 150px;margin-top: 40px;">Add New Product</h4>
        <br>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card" style="margin-left: 50px;">
                <div class="card-body" style="margin-left: 10px;">
                    <?php echo form_open_multipart('');?>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label('product Category','id');
                            echo form_error('id');
                            ?> </br>
                            <?php echo form_dropdown('product_type',$parent,'','class="form-control" onchange="subProduct(this)" id="parent"');  ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label('Product Sub Category','id');
                            echo form_error('id');
                            ?> </br>
                            <?php echo form_dropdown('subcat','','','class="form-control" data-default-value="'.set_value('subcat',0).'" id="sub"');  ?>
                        </div>
                    </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Product  Name','product_name');
                        echo form_error('product_name');
                        echo form_input('product_name',set_value('product_name'),'class="form-control"'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Product Price ','product_price');
                        echo form_error('product_price');
                        echo form_input('product_price',set_value('product_price'),'class="form-control"'); ?>
                    </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Product Quantity ','product_quantity');
                        echo form_error('product_quantity');
                        echo form_input('product_quantity',set_value('product_quantity'),'class="form-control"'); ?>
                    </div>

                </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            echo form_label('Product Description ','product_des');
                            echo form_error('product_des');
                            echo form_textarea('product_des',set_value('product_des'),'class="form-control"'); ?>
                        </div>

                    </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <?php
                                echo form_label('Image','userfile');
                                echo form_error('userfile'); ?>
                                <input type="file" name="userfile" size="20"/>
                            </div>
                        </div>




                    <!-- <div class="row">
                        <div class="row submitRow">
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <h4 class="topicTitle">Properties
                                    <button  onclick="addSemRow(1)" class=" btn btn-warning" title="add new row" type="button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </h4>
                            </div>
                        </div>
                    </div>


                    <div class="row semDetailRow">
                        <div class="col-lg-5 form-group">
                            <?php

                            echo form_error(' product_property_name');
                            echo form_input('product_property_name[]','',' class="form-control HoUrS" placeholder="eg:Color"'); ?>
                        </div>

                        <div class="col-lg-5 form-group">

                            <?php

                            echo form_error(' product_property');
                            echo form_input('product_property[]','',' class="form-control HoUrS1" placeholder="eg:  Red"');
                            ?>
                        </div>
                        <div class="col-lg-2">

                            <button  onclick="removeRow(this)" class=" btn btn-warning" title="remove row" type="button">
                                <i class="fa fa-minus" style="height: 4px;"></i>
                            </button>
                        </div>


                    </div>
                    <br><br> -->
                    <?php echo form_submit('add','Add ','class="btn btn-success pull-right" onclick="submitsubject()"');?>

                    <?php echo form_close();?>
    </div>
</div>
</div>
</div>
</div>
<footer class="footer_area clearfix" style="width: 100%;height: 1px;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-12">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="sitedashboard.php"><img src="<?php echo site_url('assets/amado/img/core-img/logo2.png')?>" alt=""></a>
                    </div>
                    <!-- Copywrite Text -->
                    <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)--><!--End of form (Batches)-->
<script>

    function subProduct(productInp){
//                    alert(1);
        str=productInp.value;
        console.log(str);
//      var  url:base_url+'Product/get_subproduct/'+str,

        var url=site_url+"Product/get_subproduct/"+ str;
        var semSelect= $('#sub');
        console.log(semSelect);
        if(semSelect.attr('data-default-value')>0)
            url=site_url+"Product/get_subproduct/" + str+'/'+semSelect.attr('data-default-value');
        semSelect.html('<option value="0">-Select Option-</option>');
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'html',
            success:function (data) {
                semSelect.html(data);
                semSelect.trigger('change');
            }
        });
    }


    function addSemRow(num) {
        //alert(1);
        for(i=0;i<parseInt(num);i++) {
            var currRow = $('.semDetailRow').last();
            var newROw= currRow.clone();
            var ghjfg=  newROw.find('input.product_property_name');
            var ghjfgf=  newROw.find('input.product_property');
            ghjfg.val('');
            ghjfgf.val('');
            newROw.insertAfter($('.topicTitle'));

        }
    }


    function removeRow(obj){
        $(obj).closest('.semDetailRow').remove();
    }

</script>


            <style>
                .semDetailRow{
                    margin-top:20px;
                }
            </style>