<section id="main-content">
    <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-9">
                <div class="form-panel">
                    <h3 class="panel-title">Edit Discount</h3>
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
                        <?php echo form_open('admin/settings/discount_edit'); ?>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='name' value="<?php echo $discount['name']; ?>" type='text' placeholder='Enter Discount Title' >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Discount Value</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='discount' value="<?php echo $discount['discount']; ?>" type='text' placeholder='Enter Discount Value' >
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Discount Type</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='type' id='type'>
                                    <option <?php if($discount['type']=='percentage'){ ?> selected <?php } ?> value='percentage'>Percentage</option>
                                    <option <?php if($discount['type']=='fixed'){ ?> selected <?php } ?> value='fixed'>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-3 control-label">Discount Type</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='discount_type' id='discount_type'>
                                    <option <?php if($discount['discount_type']=='one_time'){ ?> selected <?php } ?> value='one_time'>One Time</option>
                                    <option <?php if($discount['discount_type']=='permanent'){ ?> selected <?php } ?> value='permanent'>Permanent</option>
                                </select>
                            </div>
                        </div>
                         <input class="form-control" type="hidden"  required name='id' value="<?php echo $discount['id']; ?>" type='text' placeholder='Enter Discount Title' >

                        <div class="control-group">
                            <div class="controls"> 
                                <input type="submit" class="btn btn-primary" value="Edit Discount" name="submit">
                            </div>
                        </div><?php echo form_close(); ?>
                        <!--all code here -->
                        <!--here is end changable content -->
                    </div>
                </div>
            </div>
    </section>
</section>
