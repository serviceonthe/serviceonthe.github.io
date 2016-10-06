<?php extract($edit_fetch)?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
  		<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">Edit Payment Method</h4>
        </div>
    </div>    
        <?php  
         $query=mysql_query("Select payment_method_name From payment_method  where payment_method_id = '$payment_method_id'");
              $result=  mysql_fetch_array($query);
              if(!empty($result)){
                // echo '<pre>';
                // print_r($result);
                // echo '</pre>';
                //echo $result[0]; 

              }
        ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--                            DataTables Advanced Tables-->
                </div>

                <h3><?php echo $result[0]; ?></h3>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <?php echo form_open('admin/settings/update_payment_method');?>   
                            <table cellpadding="20" class="table-hover">
                                <tr><td>Currency</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Currency" value="<?php echo $currency; ?>" name="currency" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Installation Id</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Installation Id" value="<?php echo $installation_id; ?>" name="installation_id" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>       
                                <tr><td>Merchant Id</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Merchant Id" value="<?php echo $merchant_id; ?>" name="    merchant_id" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>        
                                <tr><td>Payment Mode</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Payment Mode" value="<?php echo $payment_mode; ?>" name="payment_mode" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><td>Payment Email</td><td style="height:20px"><input class="form-control" type="text" placeholder="Enter Payment Email" value="<?php echo $payment_method_email; ?>" name="payment_method_email" size="60"/></td></tr>
                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                                <tr><input type="hidden"  name="payment_method_info_id" value="<?php echo $payment_method_info_id; ?>"></tr>
                                <tr><input type="hidden"  name="payment_method_id" value="<?php echo $payment_method_id; ?>"></tr>
                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Save"/></td></tr>
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