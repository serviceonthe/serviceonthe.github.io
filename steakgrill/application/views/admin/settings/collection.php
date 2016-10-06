<div class="template-page-wrapper">
	<div class="templatemo-content">
    	<?php echo form_open('admin/settings/collection',array('id'=>'collection_settings')); ?>
    	<div class="row">
    		<div class="col-md-3"></div>		
    		<div class="col-md-6">
    			<div class="row _title">
                    <div class="col-md-5">
                        Day
                    </div>
                    <div class="col-md-7">
                        Collection Time
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-7">
                        <input style="background-color:green; color:white;"
                            type="text" readonly="true"
                            placeholder="" 
                            value="1st">
                        <input style="background-color:green; color:white;"
                            type="text" readonly="true"
                            placeholder="" 
                            value="2nd">
                    </div>
                    <div class="col-md-5">
                        <label for="Saturday">Saturday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['saturday_1st']; ?>" 
                            name="saturday_1st" 
                            id="Saturday">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['saturday_2nd']; ?>" 
                            name="saturday_2nd" 
                            id="Saturday">
                    </div>
                    <div class="col-md-5">
                        <label for="Sunday">Sunday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['sunday_1st']; ?>" 
                            name="sunday_1st" 
                            id="Sunday">

                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['sunday_2nd']; ?>" 
                            name="sunday_2nd" 
                            id="Sunday">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-5">
                        <label for="Monday">Monday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['monday_1st']; ?>" 
                            name="monday_1st" 
                            id="Monday">

                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['monday_2nd']; ?>" 
                            name="monday_2nd" 
                            id="Monday">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-5">
                        <label for="Tuesday">Tuesday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['tuesday_1st']; ?>" 
                            name="tuesday_1st" 
                            id="Tuesday">

                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['tuesday_2nd']; ?>" 
                            name="tuesday_2nd" 
                            id="Tuesday">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-5">
                        <label for="Wednesday">Wednesday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['wednesday_1st']; ?>" 
                            name="wednesday_1st" 
                            id="Wednesday">

                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['wednesday_2nd']; ?>" 
                            name="wednesday_2nd" 
                            id="Wednesday">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-5">
                        <label for="Thursday">Thursday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['thursday_1st']; ?>" 
                            name="thursday_1st" 
                            id="Thursday">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['thursday_2nd']; ?>" 
                            name="thursday_2nd" 
                            id="Thursday">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="Friday">Friday</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['friday_1st']; ?>" 
                            name="friday_1st" 
                            id="Friday">

                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $delivery['friday_2nd']; ?>" 
                            name="friday_2nd" 
                            id="Friday">
                    </div>
                </div>
    			<div class="row">
    				<div class="col-md-5"></div>
    				<div class="col-md-7">
    					<input type="submit" class="btn btn-success" value="Submit" name="submit">
    				</div>
    			</div>
    		</div>		    		
    		<div class="col-md-3"></div>		
    	</div>
    	
    	<?php echo form_close(); ?>
	</div>
</div>