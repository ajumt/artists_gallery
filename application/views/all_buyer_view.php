<?php 
function toggleUserActivity($userData){
    $icon='fa-user-circle-o';
    $action='site/deactivate_user/buyer/'.$userData->id;
    $title='deactivate this user';
    $color=' #fd0000';
    if(!$userData->active){
        $icon='fa-ban';
        $color=' #00ff00';
        $action='site/activate_user/buyer/'.$userData->id;
        $title='activate this user';
    }
    $attrs='class="btn btn-xs btn-flat" style="background-color:'.$color.';height: 34px;width: 36px;"';
    $attrs.='onclick="return confirm(\'Are you sure that you want to '.$title.'?\')"';
    return '<a '.$attrs.' title="'.$title.'" href="'.site_url($action).'"><i class="fa '.$icon.'" aria-hidden="true"></i></a>';    
}
function deleteButton($item){
    $attrs='class="btn btn-xs btn-flat" style="background-color: #fdb813;height: 34px;width: 36px;" ';
    $attrs.='onclick="return confirm(\'Are you sure that you want to delete this user?\')"';
    $action='site/delete_buyer/'.$item->id;
    return '<a '.$attrs.' title="Delete Item" href="'.site_url($action).'"><i class="fa fa-trash" aria-hidden="true"></i></a>';    
}
?>

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                        <h4 class="card-title" style="margin-left: 10px;">All Buyers</h4>
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <div class="cart-title mt-10">
                                </div>
                                <div class="card">
                                    <div class="cart-table clearfix">
                                        <table class="table table-responsive" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Phone No</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>District</th>
                                                <th>Pin</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php  foreach($buyer as $i=>$item){?>

                                                <tr>
                                                    <td class="cart_product_img">
                                                        <a href="#"><img src="<?php echo base_url('media/uploads/'.$item->image)?>"></a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('Site/buyer_user_details/'.$item->id);?>"><?php echo $item->first_name; ?></a>
                                                    </td>
                                                    <td>
                                                        <?php echo $item->mobile_number; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item->email; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item->city; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item->district; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $item->pin; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo  toggleUserActivity($item)." ".deleteButton($item)?>
                                                    </td>
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
