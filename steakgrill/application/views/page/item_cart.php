<script type="text/javascript">
    $(document).ready(function() {

            $('.empty_cart').click(function(){
                //alert('hello');
                $.ajax({
                    url: "<?php echo base_url(); ?>order/empty_cart",
                    type: "POST",
                    data: {fake: 'item_id'},
                    async: false,
                    success: function (data) {
                    $("#item_cart_data").load("<?php echo base_url(); ?>order/item_cart_show");
                    $("#cart_header").load("<?php echo base_url(); ?>order/cart_header_show");
                    $("#item_cart_data_for_menu").load("<?php echo base_url(); ?>order/item_cart_show");
                    $("#current_contain").html('Cart (0) items:&pound; 0');
                    },
                    error: function (xhr, status, error) {
                        alert('Error');
                    }
                });

            });


            $(".cart-remove").on('click', '.remove_this', function () {
                var item_id = $(this).attr("name");
                //alert(item_id);
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/remove_from_cart",
                    type: "POST",
                    data: {item_id: item_id},
                    async: false,
                    dataType: "json",
                    success: function (data) {
                        $("#item_cart_data").load("<?php echo base_url(); ?>order/item_cart_show");
                        $("#cart_header").load("<?php echo base_url(); ?>order/cart_header_show");
                        $("#item_cart_data_for_menu").load("<?php echo base_url(); ?>order/item_cart_show");
                        $("#current_contain").html('Cart ('+data.qty+') items:&pound;'+data.price);
                    },
                    error: function (xhr, status, error) {
                        alert('Error');
                    }
                });

            });

            $(".qty").on('click', '.increase_item', function () {

                var item_id = $(this).attr("name");
                //alert(item_id);
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/increase_item_quantity",
                    type: "POST",
                    data: {item_id: item_id},
                    async: false,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        $("#item_cart_data").load("<?php echo base_url(); ?>order/item_cart_show");
                        $("#cart_header").load("<?php echo base_url(); ?>order/cart_header_show");
                        $("#item_cart_data_for_menu").load("<?php echo base_url(); ?>order/item_cart_show");
                        $("#current_contain").html('Cart ('+data.qty+') items:&pound;'+data.price);
                    },
                    error: function (xhr, status, error) {
                        alert('Error');
                    }
                });
            });



            $(".qty").on('click', '.decrease_item', function () {
                var item_id = $(this).attr("name");
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/decrease_item_quantity",
                    type: "POST",
                    data: {item_id: item_id},
                    async: false,
                    dataType: "json",
                    success: function (data) {
                        $("#item_cart_data").load("<?php echo base_url(); ?>order/item_cart_show");
                        $("#cart_header").load("<?php echo base_url(); ?>order/cart_header_show");
                        $("#item_cart_data_for_menu").load("<?php echo base_url(); ?>order/item_cart_show");
                        $("#current_contain").html('Cart ('+data.qty+') items:&pound;'+data.price);
                    },
                    error: function (xhr, status, error) {
                        alert('Error');
                    }
                });
            });
            
     });
</script>             

<style type="text/css">
    .cart-th th{
        text-align: center;
        font-weight: bold;
    }
    .cart-th th:first-child{
        text-align: left;
    }
    td.qty table tr td {
        padding: 0px;
        margin: 0px;
    }
    td.qty table {
        margin: 0px;
        padding: 0px;
    }
    .items{
        text-align: left;
    }
    tr.cart-th {
        text-transform: uppercase;
        font-size: 14px;
    }

</style>
        <?php if($cart): ?>
            <table id="example" class="dt-responsive primery-data" cellspacing="0" width="100%">
                <thead>
                    <tr class="cart-th">    
                        <th width="60%">Item</th>   
                        <!--<th width="15%" style="text-align: left;">Price </th>-->
                        <th width="15%"> Qty </th>
                        <th width="25%" style="text-align: right;"> Total</th>
                        <th width="10%" style="text-align: right;"> <i class="fa fa-trash"></i> </th>
                    </tr>
                </thead>
                <tbody valign="middle">                 
                <?php 

                    
                    $total=0;
                    foreach ($cart as $key => $item):
                        $total+=$item['subtotal'];
                        ?>
                    <tr>
                        <td class="items">
                            <input type="hidden" name="item_id[]" value="<?php echo $item['id']; ?>"/>
                            <input type="hidden" name="item_name[]" value="<?php echo $item['name']; ?>"/>
                            <?php echo $item['name']; ?>
                        </td>
                        <!--<td class="i-price" valign="middle" align="left">
                            <span><?php echo $item['price']; ?></span>
                            <input name="price[]" type="hidden" id="<?php echo 'price_'.$item['id']; ?>" value="<?php echo $item['price']; ?>">
                        </td>-->
                        <td class="qty">
                            <table>
                                <tr>
                                    <td>
                                        <input style="background-color: #333; color: #fff; padding: 3px; height: 28px; margin-top:12px;border: 1px solid #444;text-align: center;" class="idval" name="qty[]" id="<?php echo 'quantity_'.$item['id']; ?>" type="text" value="<?php echo $item['qty']; ?>"/>
                                    </td>
                                    <td>
                                        <span class="increase_item btn-info" name="<?php echo $item['rowid']; ?>"><i class="fa fa-plus"></i></span>
                                        <span class="decrease_item btn-info" name="<?php echo $item['rowid']; ?>"><i class="fa fa-minus"></i></span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="subtotal" align="right">
                            <input name="subtotal[]" type="hidden" id="<?php echo 'subtotal_'.$item['id']; ?>" value="<?php echo number_format((float) ($item['subtotal']), 2, '.', ''); ?>">
                            <span class="total-item-price"><?php echo currency.number_format((float) ($item['subtotal']), 2, '.', ''); ?></span>
                        </td>
                        <div class="">
                            <td class="cart-remove" align="right">
                                <span class="remove_this btn-danger" name="<?php echo $item['rowid']; ?>" ><i class="fa fa-times"></i></span>
                            </td>
                        </div>
                    </tr>

                <?php endforeach; ?>
                    <tr>
                        <td colspan="2">
                            <span class="tolal-cart-price">Total:</span>
                        </td>
                        <td colspan="2" align="right">
                            <strong class="tolal-cart-price"><?php echo currency.number_format((float) ($total), 2, '.', ''); ?></strong>
                        </td>
                        <td>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="cart-action">
                <button style="margin-bottom:0;" type="button" class="empty_cart" id=""><i class="fa fa-trash"></i> Empty Cart</button>
                <a href="<?php echo site_url('order/cart'); ?>" style="margin-bottom:0;" class="check-out" ><i class="fa fa-share"></i> Check out</a>
            </div>

            <?php 
                endif; 
            ?>

