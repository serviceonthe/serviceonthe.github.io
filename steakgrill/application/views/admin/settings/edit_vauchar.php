<script>
    $(document).ready(function () {
        var date = new Date();
        var day = date.getDate();
        var monthIndex = date.getMonth() + 1;
        var year = date.getFullYear();
        var mdate = year + "-" + monthIndex + "-" + day;
        $('#datetimepicker6').datetimepicker({
            format: 'YYYY-MM-DD', 
            widgetPositioning:{
                horizontal: 'right',
                vertical: 'bottom'
             }
        });
        $('#datetimepicker7').datetimepicker({
            format: 'YYYY-MM-DD',
            widgetPositioning:{
                horizontal: 'right',
                vertical: 'bottom'
             }
        });
        $("#datetimepicker6").on("dp.change",function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
             //var new_date = moment(e.date, "YYYY-MM-DD");
            //new_date.add(1, 'days'); 
            //$('#expire_date').val(new_date.format('YYYY-MM-DD'));
        });
        $("#datetimepicker7").on("dp.change",function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script> 

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-9">
                <div class="form-panel">
                    <h3 class="panel-title"> Loyalty Discount Edit </h3>
                </div>
                <div class="form-panel">
                    <!--here is start changable content -->
                    <!--all code here -->
                    <a href="<?php echo site_url('admin/settings/add_voucher'); ?>"><button type="button" class="btn btn-success">Add Loyalty Discount </button></a>
                    <a href="<?php echo site_url('admin/settings/voucher_list'); ?>"><button type="button" class="btn btn-success">List Loyalty Discount </button></a>
                    <a href="<?php echo site_url('admin/settings/coupon_use_history'); ?>"><button type="button" class="btn btn-success">Loyalty Usage History</button></a>
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
                        <?php echo form_open('admin/settings/edit_voucher'); ?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Loyalty Discount Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" name='voucher_type' id='voucher_type'>
                                    <option <?php if($voucher->voucher_type=='one time'){echo 'selected';} ?> value='one time'>One Time</option>
                                    <option <?php if($voucher->voucher_type=='permanent'){echo 'selected';} ?> value='permanent'>Permanent</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="form-group"> 
                            <label for="start_date" class="col-sm-3 control-label">Start date:</label>
                            <div class="col-sm-8"> 
                                <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' name="start_date" required  class="form-control"  value="<?php echo $voucher->start_date; ?>"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label for="expire_date" class="col-sm-3 control-label">Expire date:</label>
                            <div class="col-sm-8"> 
                                <div class='input-group date' id='datetimepicker7'>
                                    <input type='text' name="expire_date"  id="expire_date"  required  class="form-control" value="<?php echo $voucher->expire_date; ?>"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        
<!--                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">start_date</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='start_date' type='text' placeholder='Enter start date' value="<?php echo $voucher->start_date; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">expire_date</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='expire_date' type='text' placeholder='Enter expire date' value="<?php echo $voucher->expire_date; ?>" />
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Loyalty Discount Value Type</label>
                            <div class="col-sm-8">
                                <select class="form-control" name='voucher_value_type'>
                                    <option <?php if($voucher->voucher_value_type=='fixed'){echo 'selected';}?> value='fixed'>Fixed</option>
                                    <option <?php if($voucher->voucher_value_type=='percentage'){echo 'selected';}?> value='percentage'> Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='voucher_amount' type='text' placeholder='Enter expire date' value="<?php echo $voucher->voucher_amount; ?>" />
                            </div>
                        </div>
                        <input name='voucher_id' type='hidden' value="<?php echo $voucher->voucher_id; ?>" > 
                        <div class="control-group">
                            <div class="controls"> 
                                <input type="submit" class="btn btn-primary" value="Edit Coupon" name="submit">
                            </div>
                        </div><?php echo form_close(); ?>
                        <!--all code here -->
                        <!--here is end changable content -->
                    </div>
                </div>
            </div>
    </section>
</section>
