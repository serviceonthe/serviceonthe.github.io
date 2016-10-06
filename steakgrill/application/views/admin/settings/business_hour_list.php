<div class="template-page-wrapper">
    <div class="templatemo-content">
    <!--here is start changable content -->
    <!--all code here -->
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
<!--                            DataTables Advanced Tables-->
                </div>

                            <?php if($this->session->flashdata('message')) { ?>
                                <div class="alert alert-success" id="mydiv">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <span><?php if($this->session->flashdata('message')) {
                                echo '<div class="message"> ';
                                echo ''.$this->session->flashdata('message').'';
                                //$this->session->keep_flashdata('message');
                                echo'</div>';
                                }?></span> 
                                </div>    
                                <script>
                                setTimeout(function() {
                                $('#mydiv').fadeOut('fast');
                                }, 2000); // <-- time in milliseconds
                                </script>
                                <?php } ?>

            <?php echo form_open('admin/settings/business_hour_update'); ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table>
                            <TABLE id="dataTable" width="950px" border="0">
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Sunday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sun_from1']; ?>" class="form-control" size="10" name="sun_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sun_to1']; ?>" class="form-control" size="10" name="sun_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sun_from2']; ?>" class="form-control" size="10" name="sun_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sun_to2']; ?>" class="form-control" size="10" name="sun_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Monday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['mon_from1']; ?>" class="form-control" size="10" name="mon_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['mon_to1']; ?>" class="form-control" size="10" name="mon_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['mon_from2']; ?>" class="form-control" size="10" name="mon_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['mon_to2'];?>" class="form-control" size="10" name="mon_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Tuesday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['tue_from1']; ?>" class="form-control" size="10" name="tue_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['tue_to1']; ?>" class="form-control" size="10" name="tue_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['tue_from2']; ?>" class="form-control" size="10" name="tue_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['tue_to2']; ?>" class="form-control" size="10" name="tue_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Wednesday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['wed_from1']; ?>" class="form-control" size="10" name="wed_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['wed_to1']; ?>" class="form-control" size="10" name="wed_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['wed_from2']; ?>" class="form-control" size="10" name="wed_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['wed_to2']; ?>" class="form-control" size="10" name="wed_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Thursday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['thus_from1']; ?>" class="form-control" size="10" name="thus_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['thus_to1']; ?>" class="form-control" size="10" name="thus_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['thus_from2']; ?>" class="form-control" size="10" name="thus_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['thus_to2']; ?>" class="form-control" size="10" name="thus_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Friday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['fri_from1']; ?>" class="form-control" size="10" name="fri_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['fri_to1']; ?>" class="form-control" size="10" name="fri_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['fri_from2']; ?>" class="form-control" size="10" name="fri_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['fri_to2']; ?>" class="form-control" size="10" name="fri_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                                <TR>
                                    <td>&nbsp;</td>
                                    <td>Sunday</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sat_from1']; ?>" class="form-control" size="10" name="sat_from1" placeholder="First Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sat_to1']; ?>" class="form-control" size="10" name="sat_to1" placeholder="First Shift End"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sat_from2']; ?>" class="form-control" size="10" name="sat_from2" placeholder="Second Shift Start"/></TD>
                                    <td>&nbsp;</td>
                                    <TD><INPUT type="text" value="<?php echo $businessHour[0]['sat_to2']; ?>" class="form-control" size="10" name="sat_to2" placeholder="Second Shift End" value="" /></TD>
                                    <td>&nbsp;</td>
                                </TR>
                            </TABLE>
                        </table>
                </div>
                <!-- /.table-responsive -->
            </div>

                <table cellpadding="">
                    <tr><td align="center"><input type="submit"  class="btn btn-lg btn-danger" value="Update Business Hour"/></td></tr>
                    <br/>
                </table>
           <?php echo form_close();?>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
</div>
    <!--all code here -->
    <!--here is end changable content -->
    </div>
</div>