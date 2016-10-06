<section id="main-content">
  <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-9">
				
          	<div class="form-panel">
				<h3 class="panel-title"><i class="fa fa-list-alt"></i> Add News Letter</h3>
          	</div>
			
		<div class="form-panel">
		
                <a href="<?php echo base_url();?>admin/mail/list_newsletter"><button type="button" class="btn btn-success">List News Letter</button></a>
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
                          <br>
                          <br>

                  <?php echo validation_errors(); ?>
                  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                        <div class="form-horizontal style-form">
                    <?php  echo form_open('admin/mail/add_newsletter');?>
			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">News Letter Title:</label>
                            <div class="col-sm-8">
                                <input type="text" name="newsletter_title" value="<?php echo set_value('newsletter_title');?>"class="form-control" />
                            </div>
			</div>

			<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">News Letter Body:</label>
                            <div class="col-sm-8">
                                <textarea class="ckeditor form-control" name="newsletter_body" rows="13" cols="75" ><?php echo set_value('newsletter_body');?></textarea>
                            </div>
			</div>

			<div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" value="Submit News Later" class="btn btn-info" /> &nbsp; <input  type="reset" value="Reset News Later" class="btn btn-danger"/>
                            </div>
			</div>
                    <?php echo form_close();?>
			</div>
		   </div>
            </div>
        </div>
    </section>
</section>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

