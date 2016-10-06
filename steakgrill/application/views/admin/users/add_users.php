<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
  		<div id="page-wrapper">
    <?php
    if(validation_errors())
    {
        ?>    
            <div class="alert alert-danger alert-dismissable">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <?php echo validation_errors(); ?>
                
            </div>
        <?php
    }
    ?>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add User</h1>
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
                        <?php echo form_open('admin/users/add_user'); ?> 
                           
                            <table cellpadding="20" class="table-hover">
                                
                                <tr><td style="width: 130px;">First Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter First Name" value="<?php echo set_value('user_first_name'); ?>" name="user_first_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Last Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Last Name" value="<?php echo set_value('user_last_name'); ?>" name="user_last_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>User Name</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Username" value="<?php echo set_value('user_name'); ?>" name="user_name" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Password</td><td style="height:20px"><input class="form-control" type="password" placeholder="Enter Password" value="<?php echo set_value('user_password'); ?>" name="user_password" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Confirm Password</td><td style="height:20px"><input class="form-control" type="password" placeholder="Enter Confirm Password" value="<?php echo set_value('confirm_password'); ?>" name="confirm_password" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Email</td><td style="height:20px"><input class="form-control" type="email" placeholder="Enter Email" value="<?php echo set_value('user_email'); ?>" name="user_email" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Address</td><td style="height:20px"><textarea class="form-control" cols="57" rows="2" name="user_address" placeholder="Enter Address" size="60"><?php echo set_value('user_address'); ?></textarea></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Mobile</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Mobile No" value="<?php echo set_value('user_mobile'); ?>" name="user_mobile" size="60"/></td></tr>        
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>       
                                <tr><td>City</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter City" value="<?php echo set_value('user_city'); ?>" name="user_city" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Post Code</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Post Code" value="<?php echo set_value('user_post_code'); ?>" name="user_post_code" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>  

                                <tr>
                                    <td>User Type</td>
                                    <td style="height:20px">
                                        <select class="form-control" name="user_type">
                                            <option>Select a User Type</option>
                                            <option value="admin"<?php echo set_select('user_type','admin');?> >Admin</option>
                                            <option value="tele_operator"<?php echo set_select('user_type','tele_operator');?> >Tele Operator</option>
                                            <option value="data_operator"<?php echo set_select('user_type','data_operator');?> >Data Operator</option>
                                        </select>                
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr> 

                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Add User"/></td></tr>                                
                            </table>
                            <?php echo form_close(); ?> 

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