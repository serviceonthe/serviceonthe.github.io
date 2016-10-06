<?php
	$this->load->view('admin/data_operator_dashboard/header_link');
	$this->load->view('admin/data_operator_dashboard/header');
	$this->load->view('admin/data_operator_dashboard/menu');

?>
    <script>
        function showUser(str)
        {
            if (str=="")
            {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","search_item?q="+str,true);
            xmlhttp.send();
        }
    </script>


<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/signature_item"><button type="button" class="btn btn-success">Add Signature Item</button></a>
        <a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/restaurent_menu_setting"><button type="button" class="btn btn-success">All Menu List</button></a>
        <div id="page-wrapper">
            <table width="30">
                <tr>
                <td>
                    <input type="text" style="width: 250px; height: 25px; margin-left: 715px;" size="5" autocomplete="off" name="users" placeholder="Search Menu" onkeypress="showUser(this.value)" onkeyup="showUser(this.value)" />
                </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            </table>

                <!--text hint start -->
            <?php echo form_open('admin/data_operator_restaurent/menu_filter_by_category'); ?>
            <select style="width: 200px; height: 25px; margin-left: 715px;" name="menu_filter_by_category_id">
                <option value="Select a Catagory">Filter Meny By Catagory</option>
                <?php
                $menu_filter_by_category=$this->db->select('catagory_id,catagory_name')->get('indi_catagories')->result();
               foreach($menu_filter_by_category as $key){?>
                <option value="<?php echo $key->catagory_id; ?>"> <?php echo $key->catagory_name;?></option>
                <?php } ?>
            </select>
            <input type="submit" name="menu_filter_by_category" value="Filter"/>
            <?php echo form_close(); ?>
            <div id="message"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menus Selection for "<?php echo $this->session->userdata('res_name');?>"</h1>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <div id="txtHint">
                                    <!--text hint start -->
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                        <thead>
                                        <tr>
                                            <th>Check</th>
                                            <th>Item Name</th>
                                            <th>Item Catagory</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php echo form_open('admin/data_operator_restaurent/restaurent_menu_setting_complate');?>
                                        <?php foreach($results as $key){ ?>





                                            <tr id="tr_del<?php echo $key['item_id'];?>">
                                                <td width="20"><input class="item_price" id="check<?php echo $key['item_id'];?>_<?php echo $this->session->userdata('last_insert_id');?>" type="checkbox" name="items"/></td>
                                                <td><?php echo $key['item_name'];?></td>
                                                <td><?php echo $key['catagory_name'];?></td>
                                                <td>
                                                    <div id="price_box_<?php echo $key['item_id'];?>" style="display: none;">

                                                        <?php echo form_open('menu/add_price');?>

                                                        <input name = "item_id" type="hidden" value="<?php echo $key['item_id'];?>"/>
                                                        <input name = "restaurant_id" type="hidden" value="<?php echo $this->session->userdata('last_insert_id');?>"/>
                                                        <input name = "price" type="text"/>
                                                        <input type = "submit" value="Submit"/></form>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
















                                            <!--
                                                <tr>
                                                <td width="50px"><input type="checkbox"><input type="hidden" class="form-control" size="12" name="menu_restaurent_relation_menu_id[]" value="<?php //echo $key['item_id'];?>"/></td>
                                                <!--<td width="20"><input type="checkbox" name="check" value="<?php //echo $key['item_id'];?>"/></td>    --
                                                <td width="200px"><?php //echo $key['item_name'];?></td>
                                                <td width="300px"><?php //echo $key['catagory_name'];?></td>
                                                <td width="100px"><input type="text"  size="30" name="menu_restaurant_relation_price[]" placeholder="Item Price" value=""/></td>
                                                </tr>
                                            -->

                                        <?php } ?>
                                        <td><input type="hidden" name="res_id" value="<?php echo $this->session->userdata('last_insert_id');?>" /></td>
                                        </tbody>
                                    </table>
                                    </fieldset>
                                    <table cellpadding="">
                                        <tr>
                                            <td><input type="submit" name="restaurent_menu_setting"  class="btn btn-lg btn-danger" value="Add Menus Price"/></td>
                                            <td width="650px">&nbsp;</td>
                                            <td align="right"><a href="<?php echo base_url();?>/index.php/admin/data_operator_restaurent/finish_restaurent_entry"><button type="button" class="btn btn-success">Finish Entry</button></a></td>
                                        </tr>
                                        <br/>
                                        <?php echo form_close();?>
                                    </table>
                                </div>
                                <!--text hint end -->
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->



                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
            <!--all code here -->
            <!--here is end changable content -->
<?php
	$this->load->view('admin/data_operator_dashboard/footer');
?>