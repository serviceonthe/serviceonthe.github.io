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
    div.sub_page_link_sec{
        text-align: center;
    }
    a.sub_page_link{
        background-color: #ddd;
        padding: 5px 20px;
    }


</style>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    	<div class="row">	
            <div class="sub_page_link_sec">
                <a class="sub_page_link" href="<?php echo site_url('admin/settings/delivery'); ?>">Delivery Settings</a>
                <a class="sub_page_link" href="<?php echo site_url('admin/settings/collection'); ?>">Collection Settings</a>
            </div>	            
    	</div>
	</div>
</div>