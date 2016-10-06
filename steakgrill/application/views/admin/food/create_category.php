    <div class="template-page-wrapper">
        <div class="templatemo-content">
            <div id="page-wrapper">
                <div id="message"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create Category
						<a style="font-size: 40%;" href="<?php echo site_url('admin/food/fatch_category'); ?>">Category List</a>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                            	<div class="table-responsive">
			                        <?php echo form_open('admin/food/create_category'); ?>
			                            <table cellpadding="20" class="table-hover">
			                                <tr>
			                                <td width="150">Catagory Name</td>
			                                <td style="height:20px">
			                                <input class="form-control" type="text" placeholder="Catagory Name" value="" name="catagory_name" size="60"/></td></tr>
			                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			                                <tr>
			                                <td width="150">Status</td>
			                                <td style="height:20px">
			                                	<input 
					    						type="radio" 
					    						id="active" 
					    						name="catagory_status" 
					    						value="1" 
					    						/>
												<label for="active">Active</label>
					    						<input 
					    						type="radio" 
					    						id="inactive" 
					    						name="catagory_status" 
					    						value="0" 
					    						/>
					    						<label for="inactive">Inactive</label>
			                                </td></tr>
			                                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>

			                                <tr><td style="height:20px" align="center" colspan="2"><input class="btn btn-lg btn-success" type="submit" value="Create Category"/></td></tr>
			                            </table>
			                            <?php echo form_close(); ?>
			                        <?php echo validation_errors(); ?>
			                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>