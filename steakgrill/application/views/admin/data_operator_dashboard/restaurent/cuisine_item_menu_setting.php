<?php
    $this->load->view('admin/data_operator_dashboard/header_link');
    $this->load->view('admin/data_operator_dashboard/header');
    $this->load->view('admin/data_operator_dashboard/menu');
?>
    <SCRIPT language="javascript">
        function addRow(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            var colCount = table.rows[0].cells.length;
            for(var i=0; i<colCount; i++) {
                var newcell = row.insertCell(i);
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                        newcell.childNodes[0].value = "";
                        break;
                    case "checkbox":
                        newcell.childNodes[0].checked = false;
                        break;
                    case "select-one":
                        newcell.childNodes[0].selectedIndex = 0;
                        break;
                }
            }
        }
        function deleteRow(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                        if(rowCount <= 1) {
                            alert("Cannot delete all the rows.");
                            break;
                        }
                        table.deleteRow(i);
                        rowCount--;
                        i--;
                    }
                }
            }catch(e) {
                alert(e);
            }
        }
    </SCRIPT>

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->

        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/cuisine_category_menu_setting"><button type="button" class="btn btn-success">Add Caregory For Cuisine Type</button></a>
        <button type="button" class="btn btn-success">Add Cuisine Item</button>
        <?php echo form_open('admin/data_operator_restaurent/category_filter'); ?>
                <select style="width: 200px; height: 25px; margin-left: 715px;" name="cuisine_item_category">
                    <option value="Select a Catagory">Filter Catagory</option>
                    <?php
                    $cuisine_all_category=$this->db->select('cuisine_type_id,cuisine_type_category_name')->get('cuisine_type_category')->result();
                    foreach($cuisine_all_category as $key){?>
                        <option value="<?php echo $key->cuisine_type_category_name; ?>"> <?php echo $key->cuisine_type_category_name;?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="category_filter" value="Filter"/>
            <?php echo form_close(); ?>
            <?php if($_POST) { ?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                    <thead>
                         <tr>
                             <th><h5><b>Cuisine Item Category</b></h5></th>
                             <th><h5><b>Cuisine Item Name</b></h5></th>
                             <th><h5><b>Cuisine Item Price</b></h5></th>
                          </tr>
                    </thead>
                <tbody>
                 <?php foreach($filter as $key){?>
                    <tr>
                    <td><?php echo $key['cuisine_item_category'];?></a></td>
                    <td><?php echo $key['cuisine_item_name'];?></td>
                    <td><?php echo $key['cuisine_item_price'];?></td>
                 <?php } ?>
             <?php } ?>
    <div class="panel-body">
                <div class="table-responsive">
                    <?php echo form_open('admin/data_operator_restaurent/add_cuisine_item'); ?>
                        <fieldset class="scheduler-border"><legend class="scheduler-border">Add Cuisine Item "<?php echo $this->session->userdata('res_name');?>"</legend>
                        <INPUT type="button" value="Add Row" onclick="addRow('dataTable')"/>
                        <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')"/>
                        <TABLE id="dataTable" width="950px" border="0">
                            <TR>
                                <TD><INPUT type="checkbox" name="chk"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="12" name="cuisine_item_name[]" placeholder="Item Name" value="" /></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="18" name="cuisine_item_short_discription[]" placeholder="Short Description"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="20" name="cuisine_item_alergy_notification[]" placeholder="Alergy Notification"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="12" name="cuisine_item_calorie_information[]" placeholder="Calorie Info"/></TD>
                                <td>&nbsp;</td>
                                <TD><INPUT type="text" class="form-control" size="3" name="cuisine_item_price[]" placeholder="Price" value="" /></TD>
                                <td>&nbsp;</td>
                                <TD>
                                    <select class="form-control" name="cuisine_item_category[]">
                                        <option value="">Select a Catagory</option>
                                        <?php
                                             $cuisine_all_category=$this->db->select('cuisine_type_id,cuisine_type_category_name')->get('cuisine_type_category')->result();
                                            foreach($cuisine_all_category as $key){?>
                                                <option value="<?php echo $key->cuisine_type_category_name; ?>"> <?php echo $key->cuisine_type_category_name;?></option>
                                            <?php } ?>
                                    </select>
                                </TD>


                            </TR>
                        </TABLE>
                            <table cellpadding="">
                                <tr>
                                    <td><input type="hidden" name="res_id" value="<?php echo $this->session->userdata('last_insert_id');?>" /></td>
                                    <td><input type="hidden" name="res_name" value="<?php echo $this->session->userdata('res_name');?>" /></td>
                                    <td><input type="hidden" name="res_cuisine_type" value="<?php echo $this->session->userdata('res_cuisine_type');?>" /></td>
                                </tr>
                                <tr><td align="center"><input type="submit" name="submit_button" class="btn btn-lg btn-danger" value="Add Cuisine Item>>" /></td></tr>
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