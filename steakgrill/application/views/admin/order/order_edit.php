<script>
    $(document).ready(function () {
        
        $('#item_quantity').keyup(function () {
            var item_price = $('#item_price').val();
            var item_quantity = $('#item_quantity').val();
            var item_total_price = item_price * item_quantity;
            var final_item_total_price=item_total_price.toFixed(2);
            // $('#item_total_price').val(item_price * item_quantity);
            //alert(rooms);
            if(item_quantity.length>0){
                if(!isNaN(item_quantity)){
                    if(item_quantity < 0){
                        $('#item_quantity').val(0);
                        $('#item_total_price').val(0);
                    }else{
                        $('#item_quantity').val(item_quantity);
                        $('#item_total_price').val(final_item_total_price);
                    }
                }else{
                    $('#item_quantity').val(0);
                    $('#item_total_price').val(0);
                }
            }else{
                $('#item_total_price').val(item_total_price);
            }
        });
    });
</script>

<?php extract($edit_fetch); ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-9">
                <div class="form-panel">
                    <h3 class="panel-title"> Edit Order</h3>
                </div>
                <div class="form-panel">
                    <?php
                    if ($this->session->flashdata('success') || $this->session->flashdata('danger')) {
                        ?>    
                        <div class="alert alert-<?php echo ($this->session->flashdata('success')) ? 'success' : 'danger'; ?> alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <?php echo ($this->session->flashdata('success')) ? $this->session->flashdata('success') : $this->session->flashdata('danger'); ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="panel-body">
                        <div class="form-horizontal style-form">
                            <?php echo form_open('admin/Dashboard/order_edit_update'); ?>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Order ID</label>
                                <div class="col-sm-8">		
                                    <input class="form-control" type="text" readonly=""  value="<?php echo $order_id; ?>" name="order_id" size="60"/>				
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Item name</label>
                                <div class="col-sm-8">		
                                    <input class="form-control" type="text" readonly="" value="<?php echo $item_name; ?>" name="item_name" size="60"/>					
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Item price</label>
                                <div class="col-sm-8">      
                                    <input class="form-control" id="item_price" type="text" readonly=""  value="<?php echo $item_price; ?>" name="item_price" size="60"/>                    
                                    <input class="form-control" id="old_item_price" type="hidden" readonly=""  value="<?php echo $item_price; ?>" name="old_item_price" size="60"/>                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Item quantity</label>
                                <div class="col-sm-8">		
                                    <input class="form-control" id="item_quantity" type="text"  value="<?php echo $item_quantity; ?>" name="item_quantity" size="60"/>                   
                                    <input class="form-control" id="old_item_quantity" type="hidden"  value="<?php echo $item_quantity; ?>" name="old_item_quantity" size="60"/>					
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Item total price</label>
                                <div class="col-sm-8">		
                                    <input class="form-control" id="item_total_price" type="text" readonly="" value="<?php echo $item_total_price; ?>" name="item_total_price" size="60"/>                    
                                    <input class="form-control" id="old_item_total_price" type="hidden" readonly="" value="<?php echo $item_total_price; ?>" name="old_item_total_price" size="60"/>					
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <input type="hidden"  name="order_history_id" value="<?php echo $order_history_id; ?>">
                                    <input class="btn btn-info" type="submit" value="Submit Modify"/>												
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->

            </div>
            <!-- /.col-lg-12 -->
        </div>
    </section>
</section>
