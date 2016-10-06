<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function add_signup_user($first_name,$last_name,$gender,$address_line1,$address_line2,$post_code,$city,$country,$email,$phone,$mobile,$captcha,$password)  
    {
      $result = $this->db->query("INSERT INTO `customer_info` (`first_name`,`last_name`,`gender`,`address_line1`,`address_line2`,`post_code`,`city`,`country`,`email`,`phone`,`mobile`,`captcha`,`password`) VALUES ('$first_name','$last_name','$gender','$address_line1','$address_line2','$post_code','$city','$country','$email','$phone','$mobile','$captcha','$password')"); 
        if($result)
         {
             return true;             
         }
         else
         {
             return false;            
         }
    }

    public function insert_user($data)
    {
        $result=$this->db->insert('customer_info', $data);
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
        $query = $this->db->query("SELECT * FROM customer_info WHERE email = '$email' AND password ='$password'");
        $result = $query->result();
        if(count($result) == 1)
        {
            return $result;
        }         
    }

    function password_change() {
    
       $array = array('password' => md5(md5($_REQUEST['new_password']))); 
       $customer_id=$this->session->userdata("customer_id");
       $result = $this->db->update("customer_info", $array, array('customer_id' => $customer_id));

       if($result)
       {
          return true;
       }
       else
       {
          return false;
       }
    }
    
    public function update_customer_account()           
    {    
    
          $customer_id=$this->session->userdata('customer_id');
          
           $array = array(
           'first_name' => $_REQUEST['first_name'], 
           'last_name' => $_REQUEST['last_name'],
           'address_line1' => $_REQUEST['address_line1'],
           'address_line2' => $_REQUEST['address_line2'],
           'post_code' => $_REQUEST['post_code'],
           'city' => $_REQUEST['city'],
           'country' => $_REQUEST['country'],  
           'email' => $_REQUEST['email'],
           'phone' => $_REQUEST['phone'],   
           'mobile' => $_REQUEST['mobile']);  
           
       $result = $this->db->update("customer_info", $array, array('customer_id' => $customer_id));
                    
        if($result)
         { 
             return true;             
         }
         else
         {
             return false;            
         }
    }

    public function customer_order_details1()   
    {   
        $query = $this->db->query("SELECT c . * , i. * , r. * , mr. *
                                    FROM indi_catagories c
                                    LEFT OUTER JOIN indi_items i ON c.catagory_id = i.item_catagory_id
                                    LEFT OUTER JOIN indi_menu_restaurant_relation mr ON i.item_id = mr.menu_restaurant_relation_menu_id
                                    LEFT OUTER JOIN indi_res_info r ON mr.menu_restaurant_relation_restaurant_id = r.res_id
                                    WHERE r.res_id = '$restaurant_id'
                                    GROUP BY catagory_name
                                    LIMIT 0 , 15");                             
        $result = $query->result();
        if(count($result) > 0 ) 
        {
            return $result;
        }  
    }
    
    public function customer_order_details($limit=false, $start=0, $perpage='')     
    {   
        $customer_id=$this->session->userdata('customer_id');
        $limit_sql='';
        if ($limit) {
        $limit_sql=" limit $start,$perpage"; 
        }       
     
        $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.*        
                                    FROM customer_food_order 
                                    INNER JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id
                                    WHERE customer_food_order.customer_id = '$customer_id'
                                    ORDER BY customer_food_order.order_date DESC $limit_sql  ");                  
                                    
       return $query->result_array();  
    }

    public function customer_restaurant_reservation($limit=false, $start=0, $perpage='')          
    {   
        $customer_id=$this->session->userdata('customer_id'); 
        $limit_sql='';
        if ($limit) {
        $limit_sql=" limit $start,$perpage"; 
        }
       $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.res_name,indi_res_info.res_address       
                                   FROM indi_reservation_info                               
                                   INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                   WHERE indi_reservation_info.restaurant_id = 144
                                   ORDER BY indi_reservation_info.reserve_submission_date DESC $limit_sql 
                                   ");                  
       return $query->result_array(); 

    }

    //=======================faisal==========================================================
    public function order_last_48_hour($customer_id){
        $sql="SELECT * from customer_food_order WHERE customer_id = $customer_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
            return false; 
        }
    } 

    public function order_list($customer_id){
        $sql="SELECT * from customer_food_order WHERE customer_id = $customer_id ORDER BY order_id DESC ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
            return false; 
        }
    }
    public function order_list_by_order_id($customer_id,$order_id){
        $sql="SELECT * from customer_food_order WHERE customer_id = $customer_id AND order_id = $order_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
            return false; 
        }
    } 
    public function order_list_last_5($customer_id){
        $sql="SELECT * from customer_food_order WHERE customer_id = $customer_id ORDER BY order_id DESC  LIMIT 0, 5 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
            return false; 
        }
    } 
    public function order_details($order_id){
        $sql="SELECT * from order_history WHERE order_id = $order_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
            return false; 
        }
    }
    public function insert_order_review($data){
        $result=$this->db->insert('review', $data);
        if($result) {
             return true;             
         } else {
             return false;            
         }
    } 

    public function review_details($customer_id){
        $sql="SELECT * from review WHERE customer_id = $customer_id";
        $result=$this->db->query($sql);
        if($result->num_rows()>0) {
             return $result->result_array();             
         } else {
             return false;            
         }
    }
    public function address_update($data,$customer_id){
      $this->db->where('customer_id', $customer_id);
      $result=$this->db->update('customer_info', $data);
      if($result) {
           return true;             
       } else {
           return false;            
       }
    }

    public function check_review_exist($order_id){
      $sql="SELECT * from review WHERE order_id = $order_id";
      $result=$this->db->query($sql);
      if($result->num_rows()>0) {
           return true;
       } else {
           return false;            
       }
    }

    public function loginUser($email,$order_pin){
        //$sql="SELECT * FROM customer_info WHERE email='$email' AND (order_pin='$order_pin' OR password=$order_pin) ";
        $sql="SELECT * FROM customer_info WHERE email='$email' AND (order_pin='$order_pin' OR password='$order_pin') ";
		$query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
	
	
	
	
	
	
    public function check_email($email){
      $sql="SELECT * from customer_info WHERE email='$email'";
      $result=$this->db->query($sql);
      if($result->num_rows()>0) {
           return $result->row_array();
       } else {
           return false;            
       }
    }
}