<?php
$this->load->view('admin/data_operator_dashboard/header_link');
$this->load->view('admin/data_operator_dashboard/header');
$this->load->view('admin/data_operator_dashboard/menu');
?>
<div class="template-page-wrapper">
    <div class="templatemo-content">
<div id="page-wrapper">
    <?php
    if($this->session->flashdata('success') || $this->session->flashdata('danger'))
    {
    ?>    
        <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
        </div>
    <?php
    }
    ?>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Restaurant Details For "<?php echo $restautrant_details[0]->res_name;?>"</h1>
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
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <tr style="border:1px;">
                                <td><b>Name</b></td>
                                <td><?php echo $restautrant_details[0]->res_name;?></td>
                            </tr>
                            <tr>
                                <td><b>Owner</b></td>
                                <td><?php echo $restautrant_details[0]->res_owner_name;?></td>
                            </tr>
                            <tr>
                                <td><b>Postcode</b></td>
                                <td><?php echo $restautrant_details[0]->res_post_code;?></td>
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td><?php echo $restautrant_details[0]->res_address;?></td>
                            </tr>
                            <tr>
                                <td><b>Telephone</b></td>
                                <td><?php echo $restautrant_details[0]->res_telephone1;?></td>
                            </tr>
                            <tr>                                
                                <td><b>Fax Number</b></td>
                                <td><?php echo $restautrant_details[0]->res_fax_number;?></td>
                            </tr>        
                            <tr>
                                <td><b>Email</b></td>
                                <td><?php echo $restautrant_details[0]->res_email;?></td>
                            </tr>
                            <tr>
                                <td><b>Web Address</b></td>
                                <td><?php echo $restautrant_details[0]->res_web_address;?></td>
                            </tr>
                            <tr>
                                <td><b>Food Commission</b></td>
                                <td><?php echo $restautrant_details[0]->res_commission_food;?></td>
                            </tr>
                            <tr>
                                <td><b>Person Commission</b></td>
                                <td><?php echo $restautrant_details[0]->res_commission_person;?></td>
                            </tr>
                            <tr>
                                <td><b>Bank Name</b></td>
                                <td><?php echo $restautrant_details[0]->res_bank_name;?></td>
                            </tr>
                            <tr>
                                <td><b>Bank Account Name</b></td>
                                <td><?php echo $restautrant_details[0]->res_account_name;?></td>
                            </tr>
                            <tr>
                                <td><b>Bank Account Number</b></td>
                                <td><?php echo $restautrant_details[0]->res_account_number;?></td>
                            </tr>
                        </table>                                             
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>    
</div>
</div>
</div>

<?php
$this->load->view('admin/data_operator_dashboard/footer');
?>