<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    } 
    
    public function add_signup_user($first_name,$last_name,$gender,$address_line1,$address_line2,$post_code,$city,$country,$email,$phone,$mobile,$password)  
    {
	  $result = $this->db->query("INSERT INTO `customer_info` (`first_name`,`last_name`,`gender`,`address_line1`,`address_line2`,`post_code`,`city`,`country`,`email`,`phone`,`mobile`,`password`) VALUES ('$first_name','$last_name','$gender','$address_line1','$address_line2','$post_code','$city','$country','$email','$phone','$mobile','$password')");
      $customer_id = $this->db->insert_id();
      $this->session->set_userdata(array('customer_id' => $customer_id)); 
	  
        if($result)
         {
             return true;             
         }
         else
         {
             return false;            
         }
    }
	
	public function add_order($total_price,$res_id,$first_name,$last_name,$address_line1,$address_line2,$post_code,$city,$country,$email,$phone,$mobile)  
      {
		   $delivery_date= $_REQUEST['delivery_date']; 
		   $delivery_time= $_REQUEST['delivery_time'];    
		   $order_type= $_REQUEST['order_type'];
		   
           $order_time=date(" h:i:s A"); 
           $order_date=date("jS F Y");      

	  $customer_id=$this->session->userdata('customer_id');
	  $result = $this->db->query("INSERT INTO `customer_food_order` (`customer_id`,`total_price`,`res_id`,`order_date`,`order_time`,`delivery_date`,`delivery_time`,`order_type`,`first_name`,`last_name`,`address_line1`,`address_line2`,`post_code`,`city`,`country`,`email`,`phone`,`mobile`) VALUES ('$customer_id','$total_price','$res_id','$order_date','$order_time','$delivery_date','$delivery_time','$order_type','$first_name','$last_name','$address_line1','$address_line2','$post_code','$city','$country','$email','$phone','$mobile')");
          $order_id = $this->db->insert_id();         
	  $this->session->set_userdata(array('order_id' => $order_id)); 
 
        if($result)
         {
             return true;              
         }
         else
         {
             return false;            
         }
    }  
	
	public function order_details($order_id,$res_id)           
    { 
	      $item_name['item_name']=($this->session->userdata('product_names'));
          $product_ids['product_ids']=($this->session->userdata('product_ids'));
          $product_qtys['product_qtys']=($this->session->userdata('product_qtys'));
		  $unit_price['unit_price']=($this->session->userdata('unit_price'));
          $product_prices['product_prices']=($this->session->userdata('product_prices'));      
		    
		  $customer_id=$this->session->userdata('customer_id');
		  $num_of_item=count($product_ids['product_ids']);
		  $number_of_item=$num_of_item-1;
		  
		  $order_time=date(" h:i:s A");
          $order_date=date("jS F Y");  
  
		  $delivery_date= $_REQUEST['delivery_date']; 
		  $delivery_time= $_REQUEST['delivery_time']; 
		  
	      for($i=0; $i<=$number_of_item; $i++) 
		  { 
		   $array = array(
		   'order_id' => $order_id, 
		   'item_name' => $item_name['item_name'][$i],
		   'item_id' => $product_ids['product_ids'][$i],
		   'item_quantity' => $product_qtys['product_qtys'][$i],
		   'item_price' => $unit_price['unit_price'][$i],
           'customer_id' => $customer_id,
           'res_id' => $res_id, 
           'order_time' => $order_time,
           'order_date' => $order_date, 		   
           'delivery_date' => $delivery_date,    
           'delivery_time' => $delivery_time, 		   
		   'item_total_price' => $product_prices['product_prices'][$i]);  
		   
           $result=$this->db->insert("order_history", $array);   
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

	public function login($email,$password)
    { 
        $query = $this->db->query("SELECT * FROM customer_info WHERE email = '$email' AND password = '$password'");
        $result = $query->result();
		
	 if(count($result) == 1)
        {
            return $result;
        }        
    }
	
}

?>