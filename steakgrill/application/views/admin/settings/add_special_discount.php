<script>
    $(document).ready(function () {
        var currDate = new Date();
        $('#datetimepicker6').datetimepicker({
            format: 'YYYY/MM/DD', 
            minDate: currDate,
            widgetPositioning:{
                horizontal: 'right',
                vertical: 'bottom'
             }
        });
        $('#datetimepicker7').datetimepicker({
            format: 'YYYY/MM/DD',
            minDate: currDate,
            widgetPositioning:{
                horizontal: 'right',
                vertical: 'bottom'
             }
        });
        $("#datetimepicker6").on("dp.change",function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
             var new_date = moment(e.date, "YYYY/MM/DD");
            new_date.add(1, 'days'); 
            $('#booking_end_date').val(new_date.format('YYYY/MM/DD'));
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
                    <h3 class="panel-title">Special Discount Details</h3>
                </div>
                <div class="form-panel">
                    <!--here is start changable content -->
                    <!--all code here -->
                    <a href="<?php echo site_url('admin/settings/add_special_discount'); ?>"><button type="button" class="btn btn-success">Add Special Discount</button></a>
                    <a href="<?php echo site_url('admin/settings/bulk_coupon_list'); ?>"><button type="button" class="btn btn-success">View Special Discount</button></a>
                    <div id="login_error" class="error"></div>
                    <?php
                    if (validation_errors()) {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php

                        print_r($specialDiscount); exit; 

                    }
                    ?>
                    <br>
                    <div class="form-horizontal style-form">
                        <?php echo form_open('admin/settings/add_special_discount'); ?>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Birthday</label>
                            <div class="col-sm-8">
                                <div class="col-sm-4">
                                    <input type='text' name="bday_amount" required  class="form-control" placeholder='Enter amonut' value="<?php echo $specialDiscount->bday_amount; ?>"/>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control"  name='bday_value_type'>
                                        <option value='fixed'> Fixed</option>
                                        <option value='percentage'> Percentage</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Partner's Birthday</label>
                            <div class="col-sm-8">
                                <div class="col-sm-4">
                                    <input class="form-control"  required name='partner_bday_amount' type='text' placeholder='Enter amonut' >
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control"  name='partner_bday_value_type'>
                                        <option value='fixed'> Fixed</option>
                                        <option value='percentage'> Percentage</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Anniversary</label>
                            <div class="col-sm-8">
                                <div class="col-sm-4">
                                    <input class="form-control"  required name='anniversary_amount' type='text' placeholder='Enter amonut' >
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control"  name='anniversary_value_type'>
                                        <option value='fixed'> Fixed</option>
                                        <option value='percentage'> Percentage</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Special Day</label>
                            <div class="col-sm-8">
                                <div class="col-sm-4">
                                    <input class="form-control"  required name='special_day_amount' type='text' placeholder='Enter amonut' >
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control"  name='special_day_value_type'>
                                        <option value='fixed'> Fixed</option>
                                        <option value='percentage'> Percentage</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls"> 
                                <input type="submit" class="btn btn-primary" value="Add Coupon" name="submit">
                            </div>
                        </div><?php echo form_close(); ?>
                        <!--all code here -->
                        <!--here is end changable content -->
                    </div>
                </div>
            </div>
    </section>
</section>
