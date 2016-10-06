<?php 

class Order_model extends CI_Model{


    public function insertItemOrder($data)
    {
           $order_time=date("h:i:s A"); 
           $order_date=date("d/m/Y");  

           //print_r($data); exit; 

           //echo $data['order_pin']; exit; 

            $orderData = array(
                //'customer_id'           => $data['customer_id'],
                'order_date'            => $order_date,
                'order_time'            => $order_time,
                'customer_id'           => $data['customer_id'],  
                'order_type'            => $data['order_type'],
                'delivery_date'         => $data['delivery_date'],
                'delivery_time'         => $data['delivery_time'],
                'item_price'            => $data['item_price'],   
                'delivery_charge'       => $data['delivery_charge'],
                'pin_discount'          => $data['pin_discount'],
                'discount_percentage'   => $data['discount_percentage'],
                'date_discount_value'   => $data['date_discount_value'],
                'total_price'           => $data['total_price'],
                'payment_method'        => $data['paymentMethod'],  
                'first_name'            => $data['first_name'],
                'last_name'             => $data['last_name'],
                'address_line1'         => $data['address_line1'],
                'address_line2'         => $data['address_line2'],
                'post_code'             => $data['post_code'],
                'city'                  => $data['city'],
                'email'                 => $data['email'],
                'phone'                 => $data['phone'], 
                'order_pin'             => $data['order_pin'], 
                'mobile'                => $data['mobile']                
            );
        
        if($this->db->insert('customer_food_order', $orderData)) {
            $order_id = $this->db->insert_id();         
            $this->session->set_userdata('order_id', $order_id); 

            $updateData1=array(
                        'is_used'         => '1'
                    );  
             //echo $data['coupon_id']; exit;
            $this->db->update('bulk_coupon', $updateData1, array('coupon_id' => $data['coupon_id']));

            return $order_id;
        } else {
            return false;
        }
    }

    public function order_details($data)           
    { 

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';exit;

        $item_id=$data['id_of_item'];  
        $num_of_item=count($item_id);
        $order_id =$this->session->userdata('order_id'); 
        $order_time=date("h:i:s A"); 
        $order_date=date("d/m/Y");   

        for($i=0; $i<$num_of_item; $i++) 
           { 
               $item_total_price=$data['unit_price'][$i] * $data['quantity'][$i];

               $orderArray = array(
                'order_id'          => $order_id, 
                'item_name'         => $data['item_name'][$i],
                'item_id'           => $data['id_of_item'][$i],
                'item_quantity'     => $data['quantity'][$i],
                'item_price'        => $data['unit_price'][$i],
                'customer_id'       => $data['customer_id'],
                'res_id'            => $data['resturent_id'],
                'order_time'        => $order_time,
                'order_date'        => $order_date,          
                'delivery_date'     => $data['delivery_date'],   
                'delivery_time'     => $data['delivery_time'],        
                'item_total_price'  => $item_total_price
            );  
           
             $result=$this->db->insert("order_history", $orderArray);    
            }

        if($result)
         { 
             return true;             
         }
         else
         {
             return false;            
         }
    }

    function insert_order_data($table_name, $data){

      //echo "insert"; exit; 

        //print_r($data);  
        //echo $table_name; exit; 

      // echo $data['order_pin'];
      // echo $data['customer_group'];
      // echo $data['coupon_id'];    exit; 

                $array = array(
                   'first_name'     => $data['first_name'], 
                   'last_name'      => $data['last_name'],
                   'address_line1'  => $data['address_line1'],
                   'address_line2'  => $data['address_line2'],
                   'post_code'      => $data['post_code'],
                   'city'           => $data['city'],
                   'email'          => $data['email'],
				   'password'       => $data['password'],
                   'phone'          => $data['phone'],
                   // 'birthday'       => $data['birthday'],
                   // 'partner_birthday'=> $data['partner_birthday'],
                   // 'anniversary_date'=> $data['anniversary_date'],
                   // 'special_day'    => $data['special_day'],    
                   'order_pin'      => $data['order_pin'], 
                   'customer_group' => $data['customer_group'],     
                   'coupon_id' => $data['coupon_id'],  
                   'special_note'   => $data['special_note'], 
                   'allergy_problem'=> $data['allergy_problem'],    
                   'mobile'         => $data['mobile']); 

                    $updateData1=array(
                        'is_used'         => '1'
                    );  
                    //echo $data['coupon_id']; exit;
                    $this->db->insert($table_name,$array); 
                    $insert_id = $this->db->insert_id();
                    $this->db->update('bulk_coupon', $updateData1, array('coupon_id' => $data['coupon_id']));
                    return $insert_id;  
        }

        function update_customer_data($table_name, $data){

        //print_r($data);  
        //echo $table_name; exit; 

          //echo "update"; exit;  

                $arrayData = array(
                   'first_name'     => $data['first_name'], 
                   'last_name'      => $data['last_name'],
                   'address_line1'  => $data['address_line1'],
                   'address_line2'  => $data['address_line2'],
                   'post_code'      => $data['post_code'],
                   'city'           => $data['city'],
                   'email'          => $data['email'],
                   'phone'          => $data['phone'],
                   // 'birthday'       => $data['birthday'],
                   // 'partner_birthday'=> $data['partner_birthday'],
                   // 'anniversary_date'=> $data['anniversary_date'], 
                   // 'special_day'    => $data['special_day'],     
                   'order_pin'      => $data['order_pin'], 
                   'customer_group' => $data['customer_group'],     
                   'coupon_id'      => $data['coupon_id'], 
                   'special_note'   => $data['special_note'], 
                   'allergy_problem'=> $data['allergy_problem'],    
                   'mobile'         => $data['mobile']);

                    // $updateData1=array(
                    //     'is_used'         => '1',
                    //     'coupon_amount'   => '15'
                    // ); 

                    $customerId=$this->session->userdata('customer_id');
                    $this->db->update($table_name, $arrayData, array('customer_id' => $customerId));
                    //$this->db->update('bulk_coupon', $updateData1, array('coupon_id' => $data['coupon_id']));
                    return 1; 
        }

    public function getvoucherData($voucher_number) {

        $myQuery = "Select * from bulk_coupon where coupon_number = $voucher_number";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }

    public function geItemData($item_id) {

        $myQuery = "Select * from indi_items where item_id = $item_id";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }
    public function getvoucherDataForGeneral() {

        $myQuery = "Select MIN(coupon_id) AS couponId,coupon_type,coupon_value_type,coupon_group,coupon_amount,regular_discount from bulk_coupon where coupon_group = 'general'";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }

    public function getDeliveryCharge() {

        $myQuery = "Select * from delivery_charge";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }

    public function search_for_email($email) {

        $myQuery = "Select * from customer_info where email = '$email'";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }

    public function search_PostCode_data($post_code){
        
        //echo $res_post_code; exit; 
            $post_code = str_replace(" ", "", $post_code);
            $url = "http://maps.googleapis.com/maps/api/geocode/json?&components=postal_code:$post_code&sensor=false";
            $data = @file_get_contents($url);
            //print_r($data);
        return $data;
    } 

    public function search_postdata_on_api($post_code){
        
        //echo $res_post_code; exit; 
            $post_code = str_replace(" ", "", $post_code);
            //$url = "https://api.getAddress.io/v2/uk/$post_code";
            $url = "http://uk-postcodes.com/postcode/$post_code.json";
            $data = @file_get_contents($url);
            //print_r($data);
        return $data;
    } 

    public function loginUser($email,$order_pin,$password){ 

             //$sql="SELECT * FROM customer_info WHERE email='$email' AND order_pin='$order_pin' ";
			 $sql="SELECT * FROM customer_info WHERE email='$email' AND (order_pin='$order_pin' OR password='$password') ";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
            }

    }

    public function geOrderPinbyEmail($email) {

        $myQuery = "Select * from customer_info where email = '$email'";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }

    public function updateOrderForWorldpay($orderID, $worldPayTransactionId, $paidAmount, $paidCurrency) {
    
            $data = array(
                   'paid_amount' => $paidAmount,
                   'paid_currency' => $paidCurrency, 
                   'worldPayTransactionId' => $worldPayTransactionId, 
                   'is_paid' => 3 
                );    
            $this->db->where('order_id', $orderID);     
            $this->db->update('customer_food_order', $data);
            
            return TRUE;
  
    }

}