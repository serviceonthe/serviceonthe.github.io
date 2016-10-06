<?php extract($edit_fetch)?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
  		<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
    </div>    
 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--                            DataTables Advanced Tables-->
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php echo form_open('admin/users/users_update'); ?>
                            <table cellpadding="20" class="table-hover">
                                <tr><td style="width: 130px;">First Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter First Name" value="<?php echo $user_first_name; ?>" name="user_first_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Last Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Last Name" value="<?php echo $user_last_name;; ?>" name="user_last_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>User Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Username" value="<?php echo $user_name; ?>" name="user_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Email</td><td style="height:20px"><input class="form-control" type="email" placeholder="Enter Email" value="<?php echo $user_email; ?>" name="user_email" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Address</td><td style="height:20px"><textarea class="form-control" cols="57" rows="2" name="user_address" placeholder="Enter Address" size="60"><?php echo $user_address; ?></textarea></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Mobile</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Mobile No" value="<?php echo $user_mobile; ?>" name="user_mobile" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>       
                                <tr><td>City</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter City" value="<?php echo $user_city; ?>" name="user_city" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Post Code</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Post Code" value="<?php echo $user_post_code; ?>" name="user_post_code" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><input type="hidden"  name="user_id" value="<?php echo $user_id; ?>"></tr>
                                <tr><input type="hidden"  name="user_password" value="<?php echo $user_password; ?>"></tr>
                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Edit User"/></td></tr>
                            </table>
                            <?php echo form_close(); ?>
                        <?php echo validation_errors(); ?>
                    </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>  
    <!--all code here -->
    <!--here is end changable content -->
	</div>
</div>