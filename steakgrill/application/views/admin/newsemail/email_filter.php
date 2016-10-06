<section id="main-content">
    <section class="wrapper">
	<!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-9">
          	<div class="form-panel">
                    <h3 class="panel-title"><i class="fa fa-list-alt"></i> Email process</h3>
          	</div>
                <div>
                    <?php echo form_open('admin/mail/filter_email');?>
                    <label>Newsletter Category</label>
                    <select name="newsletter">
                        <option value="">Select Newsletter</option>
                        <?php foreach($newsletter as $key){?>
                            <option value="<?php echo $key['newsletter_id'];?>"><?php echo $key['newsletter_title'];?></option>
                        <?php  }?>
                    </select>
                    <label> Group </label>
                    <select name="group">
                        <option value="1">Reserve 6 Month Ago</option>
                        <option value="2">Reserve 12 Month Ago</option>
                        <option value="3">Unregietared User</option>
                        <option value="4" selected="selected">All users</option>
                    </select>
                    <input type="submit" name="filter" value="Filter Email" />
                    <?php echo form_close();?>
                </div>
                <?php 
                echo $newsletter_details_by_id['newsletter_body'];?>
                <div>
                    <?php if($filter_group){?>
                                <?php foreach($filter_group as $key){?>
                                    <?php echo $key['userEmail'].'<br />';?>
                                <?php }?>
                    <?php }?>
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

