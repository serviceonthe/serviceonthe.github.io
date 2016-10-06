<style type="text/css">
	#collection_settings{

	}
	#collection_settings label,
	#collection_settings input,
	#collection_settings textarea
	{
		padding: 5px;
		margin: 5px;
	}
	#collection_settings input[type='text']
	{
		width: 150px;
	}
	#collection_settings input[type='submit']{
		width: 100px;
	}

    ._title{
          font-weight: bolder;
          color: #221;
          border-bottom: 2px solid rgba(204, 204, 204, 0.58);
          box-shadow: 1px 1px 1px 1px rgba(204, 204, 204, 0.2);
          padding: 10px;
          margin-left: 0px;
          margin-right: -25px;
    }


</style>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    	
    	<div class="row">		
    		<div class="col-md-6">

                 <h4 style="text-align:center;">Edit Allergy</h4>
                <?php echo form_open_multipart('admin/food/edit_allergy/'.$this_allergy['id'],array('id'=>'collection_settings')); ?>
        			
                    <div class="row">
                        <div class="col-md-5">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-md-7">
                            <input 
                                type="text" 
                                placeholder="" 
                                value="<?php echo $this_allergy['name']; ?>" 
                                name="name" 
                                id="name">
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-3">
                                <label for="allergy_icon">Icon</label>
                            </div>
                            <div class="col-md-2">
                            <img style="width:40px; height:40px;" src="<?php  echo base_url(); ?>assets/admin_assets/allergyicon/<?php echo $this_allergy['allergy_icon_name']; ?>" alt="img">
                            <input type="hidden" name="allergy_icon_name" value="<?php echo $this_allergy['allergy_icon_name']; ?>">
                            </div>
                        <div class="col-md-7">
                            <input  
                                type="file" 
                                placeholder="Allergy Icon" 
                                value=""
                                name="allergy_icon" 
                                id="allergy_icon">
                        </div>
                    </div>

        			<div class="row">
        				<div class="col-md-5"></div>
        				<div class="col-md-7">
        					<input type="submit" class="btn btn-success" value="Submit" name="submit">
        				</div>
        			</div>
                <?php echo form_close(); ?>
    		</div>		    		
    		<div class="col-md-6">
                <h4 style="text-align:center;">Allergy List</h4>
                <div class="row" style="  
                                      font-weight: bold;
                                      color: #111;
                                      border-bottom: 1px solid #ddd;
                                      padding: 5px;">
                    <div class="col-md-1">SL</div>
                    <div class="col-md-5">Allergy Name</div>
                    <div class="col-md-3">Icon</div>
                    <div class="col-md-3">Action</div>
                </div> 
                <?php 
                    if($allergy):
                        $i=1;
                        foreach ($allergy as $key => $value):
                            ?>
                            <div class="row" style="border-bottom: 1px solid #ddd;padding: 5px;">
                                <div class="col-md-1"><?php echo $i; ?></div>
                                <div class="col-md-5"><?php echo $value['name']; ?></div>
                                <div class="col-md-3"><img style="width:40px; height:40px;" src="<?php  echo base_url(); ?>assets/admin_assets/allergyicon/<?php echo $value['allergy_icon_name']; ?>" alt="img"></div>
                                <div class="col-md-3">
                                    <?php echo anchor('admin/food/delete_allergy/'.$value['id'],'<button type="button" class="btn btn-danger">Delete</button>',array("onclick"=>"return confirm('Are you sure?')"));?>
                                    <a href="<?php echo site_url('admin/food/edit_allergy/'.$value['id']); ?>" ><button type="button" class="btn btn-success">Edit</button></a>
                                </div>
                            </div>                            
                            <?php
                            $i++;
                        endforeach;
                    else:
                        echo "Not Found";
                    endif;
                ?>      
            </div>		
    	</div>
    	
    	
	</div>
</div>