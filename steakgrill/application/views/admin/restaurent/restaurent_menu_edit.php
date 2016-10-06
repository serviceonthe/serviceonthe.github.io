<?php
	$this->load->view('admin/header_link');
	$this->load->view('admin/header');
	$this->load->view('admin/menu');

?>
  <script type="text/javascript">  
        function showHide() { 
            if (document.getElementById('Checkbox1').checked) { 
                document.getElementById('Text1').style.visibility = 'visible'; 
            } 
            else { 
                document.getElementById('Text1').style.visibility = 'hidden'; 
            } 
        }  
    </script> 

<div class="template-page-wrapper">
	<div class="templatemo-content">
    <!--here is start changable content -->
	<!--all code here -->
<!--    	<a href="add_restaurent"><button type="button" class="btn btn-success">Restaurant Information </button></a>
    		<a href=""><button type="button" class="btn btn-success">Feature Information </button></a>
            <a href=""><button type="button" class="btn btn-success">Restaurant Menu Setting >></button></a>      -->
    
    
        <div id="page-wrapper">
            <div id="message"></div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menus Selection for</h1>
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                    <thead>                                
                                        <tr>
                                            <th>Selection</th>
                                            <th>Item Name</th>
                                            <th>Item Catagory</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php //foreach($menu_fatch as $key){ ?>
                                            <td width="20"><input id="Checkbox1" type="checkbox" onClick="showHide()" /></td>
                                            <td><?php //echo $key['item_name'];?></td>
                                            <td><?php //echo $key['catagory_name'];?></td>
                                            <td>
                                            <input id="Text1" type="text" /> 
                                            <input type="submit" name="submit" id="item_price" value="Submit"/></td>
                                            <td></td>
                                          </tr> 
                                  <?php // } ?>    
                                </tbody>       
                            </table>
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
            </div>
        </div>

<?php
	$this->load->view('admin/footer');
?>