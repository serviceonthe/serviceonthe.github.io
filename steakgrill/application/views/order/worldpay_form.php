
<section>
  <div class="row">
    <div class="small-10 small-centered columns">
        <article class="featured news-entry">
                <div class="large-6 columns">

                    <div class="page-body animated zoomIn">
                    <h2 id="review">Card Payment</h2>

                        <?php       
                        $paymentURL = 'https://secure-test.worldpay.com/wcc/purchase'; 
                        //$paymentURL = 'https://secure.worldpay.com/wcc/purchase'; 
                        $currency = 'GBP';
                        $paymentMode = '100';
                        $installationId = '1099146'; 
                        ?>

                        <table>
                            <tr>
                                <td>Amount: </td>
                                <td>
                                    <?php echo "&pound;".$total_price; ?>
                                </td>
                            </tr>
                        </table>

                        <form action="<?php echo $paymentURL;?>" method="POST">
                            <table>
                                <input type="hidden" name="MC_success" value="http://localhost/indi_chef">
                                <tr>
                                    
                                        <input type="hidden" name="instId" value="<?php echo $installationId;?>">
                                        <input type="hidden" name="cartId" value="<?php echo $order_id;?>">
                                        <input type="hidden" name="testMode" value="<?php echo $paymentMode;?>">

                                        <input type="hidden" readonly="readonly" name="amount" value="<?php echo $total_price;?>" readonly />                                
                                        <input type="hidden" readonly="readonly"name="currency" value="<?php echo $currency;?>"  readonly />
                                        <input type="hidden" name="name" value="<?php echo $address_line1;?>" readonly >
                                        <input type="hidden" name="address1" value="<?php echo $address_line1;?>" readonly >

                                        <input type="hidden" name="address2" value="<?php echo $address_line2;?>" readonly >
                                        <input type="hidden" name="city" value="<?php echo $city;?>" readonly >
                                        <input type="hidden" name="postcode" value="<?php echo $post_code;?>" readonly >
                                        <input type="hidden" name="country" value="UK" readonly >
                                        <input type="hidden" name="mobile" value="<?php echo $mobile;?>" readonly >
                                        <input type="hidden" name="email" value="<?php echo $email;?>" readonly >

                                    <td colspan="2"><input class="btn btn-success" type=submit value="Confirm Order"></td>
                                </tr>
                            </table>
                        </form>

                    </div>
                    

                </div>
                     
            </article>
            <ul class="pagination" role="menubar" aria-label="Pagination">
                <li class="current">1</li>
            </ul>
    </div>
  </div>
</section>

