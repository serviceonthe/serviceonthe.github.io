<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

?>
<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">All Restaurants List</h1>
                </div>
            </div>    
              
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow: scroll; height: 1000px;">
                                <table class="table table-striped table-bordered table-hover" id="myTable" style="font-size: 10px;">
                                    <thead>                                
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Postcode</th>
                                            <th>Email</th>
                                            <th>View</th>
                                            <th>Gallery</th>
                                            <th>Signature Item</th>
                                            <th>Menus</th>
                                            <th>Status</th>
                                            <th>Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php foreach($all_restaurent as $key){?>
                                        <tr>
                                            <td><?php echo $key['res_id'];?></td>
                                            <td><a href="<?php echo site_url('admin/restaurent/get_restaurent/'.$key['res_id']);?>"><?php echo $key['res_name'];?></a></td>
                                            <td><?php echo $key['res_address'];?></td>
                                            <td><?php echo $key['res_post_code'];?></td>
                                            <td><?php echo $key['res_email'];?></td>
                                            <td><?php echo anchor('restaurant/front_details/'.$key['res_id'],'Site');?></td> 
                                            <td><a href="<?php echo site_url('restaurant/gallery/'.$key['res_id']);?>">Gallery</a></td>
                                            <td><?php echo anchor('admin/food/fatch_signature_item_by_a_restaurent/'.$key['res_id'],'Signature Item');?></td>
                                            <!--<td><a href="">Cuisine Item</a></td>-->
                                            <td><?php echo anchor('admin/restaurent/menu_manage_by_a_restaurent/'.$key['res_id'],'Menu Manage');?></td>
                                            <!--<td><a href="">Feature</a></td>-->
                                            <td><?php echo anchor('admin/restaurent/menu_manage_by_a_restaurent/'.$key['res_id'],'Published');?></td>
                                            <td><?php echo anchor('admin/restaurent/restaurent_edit?d_edit='.$key['res_id'],'Edit');?>  &nbsp; <?php echo anchor('admin/restaurent/restaurent_delete/'.$key['res_id'],'Delete',array("onclick"=>"return confirm('Are you sure?')"));?></td>
                                   <?php } ?>
                                        </tr>
                                </tbody>      
                            </table>
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

<?php
	$this->load->view('admin/footer');
?>