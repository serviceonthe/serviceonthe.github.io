<style type="text/css">
	#social_link{

	}
	#social_link label,
	#social_link input,
	#social_link textarea
	{
		padding: 5px;
		margin: 5px;
	}
	#social_link input[type='text'],
	#social_link textarea
	{
		width: 300px;
	}
	#social_link input[type='submit']{
		width: 100px;
	}


</style>
<h2 style="text-align:center;"><?php echo $email_type; ?> Email Settings</h2>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    	<?php echo form_open('admin/settings/email/'.$email_type,array('id'=>'social_link')); ?>
        <input type="hidden" name="type" value="<?php echo $email_type; ?>"/>
    	<div class="row">
    		<style type="text/css">
    			
    		</style>
    		<!-- <div class="col-md-3"></div>		 -->
    		<div class="col-md-12">
    			<div class="row">
                    <div class="col-md-5">
                        <label for="form">From Mail</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $email['form']; ?>" 
                            name="form" 
                            id="form">
                    </div>
                </div>
<!-- 
                <div class="row">
                    <div class="col-md-5">
                        <label for="to">To Mail</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="Aditional email address to send" 
                            value="<?php echo $email['to']; ?>" 
                            name="to" 
                            id="to">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="cc">CC Mail</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="Aditional email address to send" 
                            value="<?php echo $email['cc']; ?>" 
                            name="cc" 
                            id="cc">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="bcc">BCC Mail</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="Aditional email address to send" 
                            value="<?php echo $email['bcc']; ?>" 
                            name="bcc" 
                            id="bcc">
                    </div>
                </div>
                 -->
                
                <div class="row">
                    <div class="col-md-5">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="col-md-7">
                        <input 
                            type="text" 
                            placeholder="" 
                            value="<?php echo $email['subject']; ?>" 
                            name="subject" 
                            id="subject">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email_header" class="col-sm-2 control-label">Email Header</label>
                    <div class="col-sm-8">
                        <textarea id="email_header" class="ckeditor form-control" name="email_header" rows="13" cols="75" ><?php echo $email['email_header']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email_footer" class="col-sm-2 control-label">Email Header</label>
                    <div class="col-sm-8">
                        <textarea id="email_footer" class="ckeditor form-control" name="email_footer" rows="13" cols="75" ><?php echo $email['email_footer']; ?></textarea>
                    </div>
                </div>

    			<div class="row">
    				<div class="col-md-5"></div>
    				<div class="col-md-7">
    					<input type="submit" value="Submit" name="submit">
    				</div>
    			</div>
    		</div>		    		
    		<!-- <div class="col-md-3"></div>		 -->
    	</div>
    	
    	<?php echo form_close(); ?>
	</div>
</div>