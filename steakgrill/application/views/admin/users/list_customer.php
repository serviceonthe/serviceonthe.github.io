<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
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
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Postcode</th>
                                    <th>Registration Date</th>
                                    <th></th>
                               </tr>
                            </thead>
                            <tbody> 
                             <?php 

                             if($all_users > 0 ){
                             foreach($all_users as $key){?>       
                                     <tr>                        
                                        <td><?php echo $key['first_name'].' '.$key['last_name'];?></td>
                                        <td><?php echo $key['email'];?></td>
                                        <td><?php echo $key['post_code'];?></td>
                                        <td><?php echo $key['registration_date'];?></td>
                                        <td><?php echo anchor('admin/dashboard/get_customer/'.$key['customer_id'],'View');?></td>
                                     </tr>
                           <?php } }else{?> 
                        
                        </tbody>      
                    </table>
                          <h2>No customer</h2> 
                           <?php } ?>  
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