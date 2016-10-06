<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-9">
                <div class="form-panel">
                    <h3 class="panel-title">Add Discount</h3>
                </div>
                <div class="form-panel">
                    <!--here is start changable content -->
                    <!--all code here -->
                    <a href="<?php echo site_url('admin/settings/discount_list'); ?>"><button type="button" class="btn btn-success">List Discount </button></a>
                    <div id="login_error" class="error"></div>
                    <?php
                    if (validation_errors()) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <br>
                    <div class="form-horizontal style-form">
                        <?php echo form_open('admin/settings/add_discount'); ?>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='name' type='text' placeholder='Enter Discount Title' >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Discount Value</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='discount' type='text' placeholder='Enter Discount Value' >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Discount Value Type</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='type' id='type'>
                                    <option value='percentage'>Percentage</option>
                                    <option value='fixed'>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Discount Type</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='discount_type' id='discount_type'>
                                    <option value='one_time'>One Time</option>
                                    <option value='permanent'>Permanent</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls"> 
                                <input type="submit" class="btn btn-primary" value="Add Discount" name="submit">
                            </div>
                        </div><?php echo form_close(); ?>
                        <!--all code here -->
                        <!--here is end changable content -->
                    </div>
                </div>
            </div>
    </section>
</section>
