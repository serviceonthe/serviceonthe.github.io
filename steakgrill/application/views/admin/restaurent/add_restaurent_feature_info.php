<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

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

<style type="text/css">
/*placeholder{color:#096;}
*/
</style>

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
    
  		 	<a href=""><button type="button" class="btn btn-success">Restaurant Information </button></a>
    		<a href=""><button type="button" class="btn btn-success">Feature Information </button></a>
            <a href=""><button type="button" class="btn btn-success">Restaurant Menu Setting >></button></a>
    
    <div id="login_error" class="error"></div>
   <?php echo form_open('admin/restaurent/add_restaurent_feature_info'); ?>
<fieldset class="scheduler-border">
            <legend class="scheduler-border">Restaurant Business Hours</legend>
            <table>
                <INPUT type="button" value="Add Row" onclick="addRow('dataTable')"/>
                <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')"/>
                <TABLE id="dataTable" width="950px" border="0">
                    <TR>
                        <TD><INPUT type="checkbox" name="chk"/></TD>
                        <td>&nbsp;</td>
                        <TD>
                            <select class="form-control" name="business_day[]">
                                <option value="">Select a Day</option>
                                <option value="sunday">Sunday</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                            </select>
                        </TD>
                        <td>&nbsp;</td>
                        <TD><INPUT type="text" class="form-control" size="10" name="first_shift_start[]" placeholder="First Shift Start"/></TD>
                        <td>&nbsp;</td>
                        <TD><INPUT type="text" class="form-control" size="10" name="first_shift_end[]" placeholder="First Shift End"/></TD>
                        <td>&nbsp;</td>
                        <TD><INPUT type="text" class="form-control" size="10" name="second_shift_start[]" placeholder="Second Shift Start"/></TD>
                        <td>&nbsp;</td>
                        <TD><INPUT type="text" class="form-control" size="10" name="second_shift_end[]" placeholder="Second Shift End" value="" /></TD>
                        <td>&nbsp;</td>
                    </TR>
                </TABLE>
            </table>
        </fieldset>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Restaurant Meta Data Information </legend>
        <table cellpadding="0">
       <tr>
       <h5>Food Hygiene Rating--</h5>
       	<td>
        	<select name="food_hygiene_rating" id="select" class="form-control">
            	<option value="">---Select Rating---</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">Not Known</option>
    		</select>
    	</td>
    <td style="color: #F00;">*<div align="center" class="error"></div></td></tr>
    </table>
    <table cellpadding="5" width="80%"  >

       <tr>
       		<td><h3>Restaurant name : "<?php echo $this->session->userdata('res_name');?>"</h3></td>
       </tr>
        <tr>
        	<td><input type="checkbox" name="car_parking" id="car_parking" value="yes"/> Car Parking Available? </td>
        	<td><input type="checkbox" name="air" id="air" value="yes"/> Air Conditioned ? </td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="access" id="access" value="yes"/> Disable Access Available ? </td>
        	<td><input type="checkbox" name="live_music" id="live_music" value="yes"/> Live Music ? </td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="bar" id="bar" value="yes"/> Bar Service ? </td>
        	<td><input type="checkbox" name="event" id="event" value="yes"/> Corporate Event Facilities ? </td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="romantic_dinner" id="romantic_dinner" value="yes"/> Romantic Dinner Suitable ? </td>
        	<td><input type="checkbox" name="smoking" id="smoking" value="yes"/> Smoking facilities ? </td>
        </tr>
         <tr>
        	<td><input type="checkbox" name="party_booking" id="party_booking" value="yes"/> Private Party Booking Available ? </td>
        	<td><input type="checkbox" name="service" id="service" value="yes"/> Catering Service Available ? </td>
        </tr>
         <tr>
        	<td><input type="checkbox" name="atmosphere" id="atmosphere" value="yes"/> Kids Freindly Atmosphere ? </td>
        	<td><input type="checkbox" name="buffet" id="buffet" value="yes"/> Sunday Buffet Lunch ? </td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="day_buffet" id="day_buffet" value="yes"/> All Day Buffet ? </td>
        	<td><input type="checkbox" name="olive_oil" id="olive_oil" value="yes"/> Can Cooke item using olive oil on request ? </td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="notice" id="notice" value="yes"/> On Table Reservation Advance notice required ? </td>
        </tr>
        <tr><td><strong>Dining /Takeaway for:</strong><br/>
        <tr>
        	<td><input type="checkbox" name="breakfast" id="breakfast" value="yes"/> Breakfast ? </td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="lunch" id="lunch" value="yes"/> Lunch ? </td>
        </tr>
         <tr>
        	<td><input type="checkbox" name="dinner" id="dinner" value="yes"/> Dinner ? </td>
        </tr>
        <tr>
            <td><input type="hidden" name="res_id" value="<?php echo $this->session->userdata('last_insert_id');?>" /></td>
            <td><input type="hidden" name="res_name" value="<?php echo $this->session->userdata('res_name');?>" /></td>
            <td><input type="hidden" name="res_cuisine_type" value="<?php echo $this->session->userdata('res_cuisine_type');?>" /></td>
        </tr>
    </table>
</fieldset>
      <table cellpadding="">
        <tr><td align="center"><input type="submit" name="add_restaurent_feature_info"  class="btn btn-lg btn-danger" value="Add Restaurant Feature Information>>"/></td></tr>
<br/>
    </table>
    
     <?php echo form_close();?>
    <!--all code here -->
    <!--here is end changable content -->
	</div>
</div>

<?php
	$this->load->view('admin/footer');
?>


<?php echo validation_errors();?>