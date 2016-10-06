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
                    <h3 class="panel-title">Bulk Coupon Details</h3>
                </div>
                <div class="form-panel">
                    <!--here is start changable content -->
                    <!--all code here -->
                    <a href="<?php echo site_url('admin/settings/add_bulk_coupon'); ?>"><button type="button" class="btn btn-success">Add Bulk Coupon</button></a>
                    <a href="<?php echo site_url('admin/settings/bulk_coupon_list'); ?>"><button type="button" class="btn btn-success">List Bulk Coupon</button></a>
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
                        <?php echo form_open('admin/settings/add_bulk_coupon'); ?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Coupon Type</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='coupon_type' id='coupon_type'>
                                    <option value='one time'>One Time</option>
                                    <option value='permanent'>Permanent</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="start_date" class="col-sm-3 control-label">Start date:</label>
                            <div class="col-sm-8"> 
                                <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' name="start_date" required value="" class="form-control" placeholder='Enter start date'/>
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
                                    <input type='text' name="expire_date" required value="" class="form-control" placeholder='Enter expire date'/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div> 
                        </div> 

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Coupon Value Type</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='coupon_value_type'>
                                    <option value='fixed'> Fixed</option>
                                    <option value='percentage'> Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Group Name</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='coupon_group' id='coupon_group'>
                                    <option value='1_Campaign 1'>Campaign 1</option>
                                    <option value='2_Campaign 2'>Campaign 2</option>
                                    <option value='3_general'>General</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">First Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='coupon_amount' type='text' placeholder='Enter amonut' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Regular Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='regular_discount' type='text' placeholder='Enter amonut' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Birthday Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='bday_discount_amount' type='text' placeholder='Enter Birthday Discount' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Partner Birthday Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='partner_bday_discount_amount' type='text' placeholder='Enter Partner Birthday Discount' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Anniversary Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='anniversary_discount_amount' type='text' placeholder='Enter Anniversary Discount' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Special Day Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='special_day_discount_amount' type='text' placeholder='Enter Special Day Discount' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Unknown Customer Discount</label>
                            <div class="col-sm-8">
                                <input class="form-control"  required name='unknown_custome_discount_amount' type='text' placeholder='Enter Unknown Customer Discount' >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Number of Coupon</label>
                            <div class="col-sm-8">
                                <select class="form-control"  name='mumber_of_coupon' id='mumber_of_coupon'>
                                    <option value='25'>25</option>
                                    <option value='50'>50</option>
                                    <option value='100'>100</option>
                                    <option value='250'>250</option>
                                    <option value='500'>500</option>
                                    <option value='1000'>1000</option>
                                    <option value='5000'>5000</option>
                                </select>
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
