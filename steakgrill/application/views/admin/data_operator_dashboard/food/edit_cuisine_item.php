<?php
$this->load->view('admin/data_operator_dashboard/header_link');
$this->load->view('admin/data_operator_dashboard/header');
$this->load->view('admin/data_operator_dashboard/menu');

?>
<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <?php extract($edit_fetch);?>

            <div class="panel-body">
                <div class="table-responsive">
                    <?php echo form_open('admin/data_operator_food/cuisine_item_update'); ?>
                        <fieldset class="scheduler-border"><legend class="scheduler-border">Edit Cuisine Item</legend>
                        <TABLE id="dataTable" width="950px" border="0">
                            <TR>
                                <TD><INPUT type="text" class="form-control" size="12" name="cuisine_item_name" value="<?php echo $cuisine_item_name; ?>" /></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="18" name="cuisine_item_short_discription" value="<?php echo $cuisine_item_short_discription; ?>"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="20" name="cuisine_item_alergy_notification" value="<?php echo $cuisine_item_alergy_notification;?>"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="12" name="cuisine_item_calorie_information" value="<?php echo $cuisine_item_calorie_information; ?>"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="3" name="cuisine_item_price" value="<?php echo $cuisine_item_price; ?>" /></TD>
                                <td>&nbsp;</td>
                                <!--
                                <TD>
                                    <select class="form-control" name="cuisine_item_category">
                                        <option value="">Select a Catagory</option>
                                        <?php /*
                                            if($cuisine_item_category=="cuisine_item_category")
                                            {
                                                echo '<option selected="selected" value="Married">Married</option>';
                                                echo '<option value="Unmarried">Unmarried</option>';
                                            }
                                            else
                                            {
                                                echo '<option selected="selected" value="Unmarried">Unmarried</option>';
                                                echo '<option value="Married">Married</option>';
                                            } */
                                        ?>
                                    </select>
                                </TD>   -->
                            </TR>
                            <tr><input type="hidden"  name="cuisine_item_id" value="<?php echo $cuisine_item_id; ?>"></tr>

                        </TABLE>
                            <table cellpadding="">
                                <tr>&nbsp;</tr><tr>&nbsp;</tr>
                                <tr><td align="center"><input type="submit" name="submit_button" class="btn btn-lg btn-danger" value="Edit Cuisine Item>>" /></td></tr>
                            </table>
                    <?php echo form_close(); ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
</div>
<?php
	$this->load->view('admin/data_operator_dashboard/footer');
     echo validation_errors();
?>