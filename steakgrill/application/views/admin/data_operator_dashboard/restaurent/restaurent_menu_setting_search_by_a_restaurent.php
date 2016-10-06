<script>    
    
   $('.search_item_price').click(function()
         {
            if($(this).is(':checked'))  
            {
                
                alert('sljlkjvdlkfgjdaeh')
                var value = this.id;               
                var item_id_restaurant_id = value.replace("search_check","");   
                var result = item_id_restaurant_id.split("_");

                if ($('#price_box_'+result[0]).is(":hidden"))
                {
                   //$('#change_'+id).css("display","block");        
                   $('#price_box_'+result[0]).hide().slideDown('slow');            
                }
                else
                {
                    $('#price_box_'+result[0]).slideUp("slow");            
                }                               
            }
            else
            {
               var value = this.id;               
               var item_id_restaurant_id = value.replace("search_check","");  
               var result = item_id_restaurant_id.split("_");              
               
               $('#price_box_'+result[0]).slideUp("slow");                                          
            }
         });

        $('.search_item_price').click(function()
        {
           if($(this).prop('checked')== false)
           {
               var value = this.id;               
               var item_id_restaurant_id = value.replace("search_check","");  
               var result = item_id_restaurant_id.split("_");
               
               
               jQuery.post(site_url+"/user/delete_item_from_a_restaurant",{restaurant_id:result[1],item_id:result[0]},function(data)
                {
                   if(data)
                   {
                        jQuery('#message').html('<div class="alert alert-success alert-dismissable">\n\
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>\n\
                  Item updated successfully.</div>').hide();
                       
                        jQuery('#message').fadeIn(1500);
                   }
                });                
           }
        });   
    
</script>

 <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size: 10px;">
                                        <thead>
                                        <tr>
                                            <th>Selection</th>
                                            <th>Item Name</th>
                                            <th>Item ID</th>
                                            <th>Item Category</th>
                                            <th>Relation</th> 
                                            <th>Restaurant Id</th> 
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										
                                        <?php
										
					     $res_id=$this->session->userdata('last_insert_id');
										
                                        foreach($other_menu as $result)  
                                        {
										
                                        ?>
											
                                                <tr id="tr_del<?php echo $result->item_id;?>">   
                                                    <td width="20">
							<input class="item_price" <?php if($result->menu_restaurant_relation_id > 0 ){?> checked="checked" <?php } ?> id="check<?php echo $result->item_id;?>_<?php echo $restaurant[0]->res_id;?>" type="checkbox" name="items"/></td>

                                                    <td><?php echo $result->item_name;?></td>
                                                    <td><?php echo $result->item_id;?></td>
                                                    <td><?php echo $result->catagory_name; ?></td>
                                                    <td><?php echo $result->menu_restaurant_relation_id; ?></td>
                                                    <td><?php echo $restaurant[0]->res_id; ?></td> 
                                                    <td>
                                                        <div id="price_box_search<?php echo $result->item_id;?>">
															
							<?php if($result->menu_restaurant_relation_id > 0  ) {      
                                                            
                                                                 echo form_open('admin/data_operator_restaurent/search_update_menu_price'); 
                                                            }
                                                            else{
                                                                
                                                              
                                                            echo form_open('admin/data_operator_restaurent/search_add_menu_price'); 
                                                            }
                                                            ?>		
                                                            <input name = "item_id" type="hidden" value="<?php echo $result->item_id;?>"/>
                                                            <input name = "restaurant_id" type="hidden" value="<?php echo $restaurant[0]->res_id;?>"/>

                                                            <input name= "menu_restaurant_relation_price" value="<?php echo $result->menu_restaurant_relation_price;?>" type="text"/>   
                                                            <input name = "menu_restaurant_relation_id" value="<?php echo $result->menu_restaurant_relation_id;?>" type="hidden"/>  
                                                            <input type = "submit" value="Submit"/>  

                                                            <?php echo form_close();?> 

                                                        </div>
                                                    </td>

                                                </tr>
                                            <?php
                                           
                                        }
                                        ?>
                                        </tbody>
                                    </table>