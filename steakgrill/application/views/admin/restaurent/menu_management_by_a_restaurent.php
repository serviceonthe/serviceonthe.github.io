
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

<script>
    $(document).ready(function(){
        $('#myTable').dataTable();
    });
</script>

<style>
    .search{ width: 250px; height: 35px; margin-left: 715px;}
</style>

<div class="template-page-wrapper">
    <div class="templatemo-content">
    <!--here is start changable content -->
    <!--all code here -->
    
    <table width="100%">
        <tr>
          <td align="right"><a href="<?php echo base_url();?>/index.php/admin/restaurent/finish_restaurent_entry" class="btn btn-danger" margin-left="500px">Finish Entry</a></td>
        </tr>
    </table>
    
    
    

    <div id="page-wrapper">
    <div id="message"></div>
    <?php
    if($this->session->flashdata('success') || $this->session->flashdata('danger'))
    {
    ?>    
        <div class="alert alert-<?php echo ($this->session->flashdata('success'))?'success':'danger';?> alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <?php echo ($this->session->flashdata('success'))?$this->session->flashdata('success'):$this->session->flashdata('danger');?>
        </div>
    <?php
    }
    ?>
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Menus Selection for <?php echo ($restaurant)?$restaurant[0]->res_name:'';?></h1>
        </div>
    </div>
    <!--
    <from action="<?php //echo base_url();?>/index.php/admin/data_operator_restaurent/search_item" method="post"/>
        <input type="text" class="search" size="5" autocomplete="off" name="users" placeholder="Search Menu" onkeypress="showUser(this.value)" onkeyup="showUser(this.value)" />  
    </from>
    -->
                    
    <?php 
    if($results)
    {        
    ?>   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="txtHint">
                            <!--text hint start -->
                                <table class="table table-striped table-bordered table-hover" id="myTable" style="font-size: 10px;">
                                    <thead>
                                        <tr>
                                            <th>Selection</th>
                                            <th>Item Name</th>
                                            <th>Item Catagory</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($results as $result) 
                                    {
                                        if(in_array($result->item_id,$value))
                                        {
                                            ?>
                                                <tr id="tr_del<?php echo $result->item_id;?>">
                                                    <td width="20"><input class="item_price" checked="checked" id="check<?php echo $result->item_id;?>_<?php echo $restaurant[0]->res_id;?>" type="checkbox" name="items"/></td>
                                                    <td><?php echo $result->item_name;?></td>
                                                    <td><?php echo $result->catagory_name;?></td>
                                                    <td>
                                                        <?php
                                                            echo $result->menu_restaurant_relation_price;
                                                         ?>
                                                        <a id="ch_price_<?php echo $result->item_id;?>" class="change_price" href="">Change</a>
                                                        <div id="change_price<?php echo $result->item_id;?>" style="display: none">
                                                            <br/>
                                                            <?php echo form_open('admin/restaurent/change_item_price_by_a_restaurent'); ?>
                                                                <input type="hidden" name="restaurant_id" value="<?php echo $restaurant[0]->res_id;?>"/>
                                                                <input type="hidden" name="item_id" value="<?php echo $result->item_id;?>"/>
                                                                <input type="hidden" name="current_url" value="<?php echo current_url();?>"/>
                                                                <table>
                                                                    <tr><td><input type="text" name="item_price" size="20"/></td></tr>
                                                                    <tr><td align="center"><input type="submit" value="Change"/></td></tr>
                                                                </table>
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <tr id="tr_del<?php echo $result->item_id;?>">
                                                    <td width="20"><input class="item_price" id="check<?php echo $result->item_id;?>_<?php echo $restaurant[0]->res_id;?>" type="checkbox" name="items"/></td>
                                                    <td><?php echo $result->item_name;?></td>
                                                    <td><?php echo $result->catagory_name;?></td>
                                                    <td>
                                                        <div id="price_box_<?php echo $result->item_id;?>" style="display: none;">
                                                            <?php
                                                                echo form_open('admin/restaurent/add_menu_price_by_a_restaurent');
                                                            ?>
                                                            <input name = "item_id" type="hidden" value="<?php echo $result->item_id;?>"/>
                                                            <input name = "restaurant_id" type="hidden" value="<?php echo $restaurant[0]->res_id;?>"/>
                                                            <input name = "price" type="text"/>
                                                            <input type = "submit" value="Submit"/>

                                                            <?php echo form_close();?>

                                                        </div>
                                                    </td>

                                                </tr>



                                            <?php
                                        }
                                    }
                                 }
                                 else
                                 {
                                     echo 'There is no Item';
                                 }
                                 ?>
                                </tbody>
                                </table>
                            <!--text hint end -->
                    </div>

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
</div>
</div>
