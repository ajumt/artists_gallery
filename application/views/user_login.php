

<div class="row" style="width: 70%;">
    <div class="col-md-12 grid-margin stretch-card"style="width: 70%; padding-top: 55px; height: 70%;">
        <div class="card" style="width: 90%; padding-top: 20px;padding-bottom: 40px;">
            <div class="card-body"style="width: 70%;">
                <h4 class="card-title">Login</h4>
                <br>
                <?php echo form_open('')?>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('UserName','username');
                        echo form_error('username');
                        ?> </br>
                        <?php echo form_input('username','','class="form-control"  id="course_name"');  ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?php
                        echo form_label('Password','password');
                        echo form_error('password');
                        echo form_password('password',set_value('password'),'class="form-control"'); ?>
                    </div>
                </div>
              <div class="row">
                <div class="col-md-12">
                    <td> <input type='submit' name='Submit' class="btn btn-success pull-right" value='Login' /></td>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
</div>
</div>


















<!--<center>-->
<!--<div class="cart-table-area section-padding-100" width="560" height="350">-->
<!--    <div class="container-fluid">-->
<!--        <div class="row">-->
<!--            <div class="col-12 col-lg-8">-->
<!--                <div class="cart-title mt-50">-->
<!--                    <h2> Login</h2>-->
<!--                </div>-->
<!--                <div class="cart-table clearfix">-->
<?php //echo form_open('main/loginuser')?>
<!---->
<!--    <fieldset >-->
<!--        <table><tr>-->
<!--          <input type='hidden' name='submitted' id='submitted' value='1'/>-->
<!--        <td>-->
<!--          <label for='username'> UserName*: </label></td>-->
<!--             <td><input type='text' name='username' id='username'  maxlength="50" /></td></tr>-->
<!--                 <tr>-->
<!--                     <td>-->
<!--                         <label for='password' > Password*: </label>-->
<!--                     </td>-->
<!---->
<!--                     <td>-->
<!--                        <input type='password' name='password' id='password' maxlength="50" />-->
<!--                     </td>-->
<!--                 </tr>-->
<!--    </fieldset>-->
<!---->
<?php //echo form_close('')?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->
<!--    </div>-->
<!--    </table>-->
<!--</center>-->
<!---->
<!---->
