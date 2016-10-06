<?php

class Business_Data_Model extends CI_Model{ 

	function __construct(){
			parent::__construct();
		}  	 	
		
		function insert_data_to_database($table_name,$login_data){
			$this->db->insert($table_name,$login_data);
		}
		
		function is_valid_user($user_id,$password){

			//echo $user_id; echo $password; exit;
			$sql = "SELECT * FROM  indi_res_info WHERE res_id= ? AND res_telephone1 = ?";        
			$query = $this->db->query($sql, array($user_id, $password)); 
			if ($query->num_rows() > 0) {  
				//$this->do_login($query->row_array());
				return true;
			}else {
				return false;
			}
    	}
		
		
		
	public function update_restaurant()            
    {    
	
		  $res_id=  $this->session->userdata("user_email");     
		  
		   $array = array(
		   'res_name' => $_REQUEST['res_name'], 
		   'res_email' => $_REQUEST['res_email'],
		   'res_telephone1' => $_REQUEST['res_telephone1'], 
		   'res_telephone2' => $_REQUEST['res_telephone2'],
		   'res_address' => $_REQUEST['res_address'],
		   'res_post_code' => $_REQUEST['res_post_code'],
           'res_manager_name' => $_REQUEST['res_manager_name'],
           'res_manager_contact_number' => $_REQUEST['res_manager_contact_number']);  
		   
		   
	   $result = $this->db->update("indi_res_info", $array, array('res_id' => $res_id));      
		            
        if($result)
         { 
             return true;             
         }
         else
         {
             return false;            
         }
    }	
		
		
		
		
	function password_change() { 
	
       $array = array('password' => md5(md5($_REQUEST['new_password']))); 
       $res_id=$this->session->userdata("user_email");
	   $result = $this->db->update("indi_res_info", $array, array('res_id' => $res_id));     

	   if($result)
	   {
	      return true;
	   }
	   else
	   {
	      return false;
	   }
    }
	
	
	
	public function business_restaurant_reservation($limit=false, $start=0, $perpage='')           
    {   
	    $res_id=  $this->session->userdata("user_email");
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
	
	
	public function business_order_details($limit=false, $start=0, $perpage='')      
    {   
	   
	    $res_id=  $this->session->userdata("user_email");

        $limit_sql='';     
		if ($limit) {
        $limit_sql=" limit $start,$perpage"; 
        }		

	    $res_id=  $this->session->userdata("user_email");    
	 
        $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.* 		
									FROM customer_food_order 
									INNER JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id
									WHERE customer_food_order.res_id = 1 
									ORDER BY customer_food_order.order_id DESC $limit_sql");                    
									
       return $query->result_array();  
    }
	
	
	public function get_a_restaurant($res_id)
        {
            $query = $this->db->query("SELECT * FROM indi_res_info LEFT JOIN indi_users ON indi_res_info.res_owner_id = indi_users.user_id WHERE res_id='$res_id'");
            $result = $query->result();
            return $result;
        }


       public function get_menu_for_restaurant($res_id)
        {

            $query = $this->db->query("SELECT * FROM indi_menu_restaurant_relation "
                . "LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id "
                . "LEFT JOIN indi_catagories ON indi_catagories.catagory_id = indi_items.item_catagory_id "
                . "LEFT JOIN indi_res_info ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id  "
                . "WHERE menu_restaurant_relation_restaurant_id = '$res_id'");
            //$query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE item_restaurant_id = '$restaurant_id'");
            $result = $query->result();
            return $result;
        } 
		
		
		public function get_menus($res_id = null) 
        {
		   
            $sql = "SELECT * FROM indi_items " 
                . "LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id "
                . "LEFT JOIN indi_menu_restaurant_relation ON indi_items.item_id = indi_menu_restaurant_relation.menu_restaurant_relation_menu_id "
                . "WHERE menu_restaurant_relation_restaurant_id = '$res_id'";    

            $query = $this->db->query($sql);
            $result = $query->result();
            return $result;
        }

        public function add_menu_price($restaurant_id,$price,$menu_id)
        {
            $result = $this->db->query("INSERT INTO `indi_menu_restaurant_relation` (`menu_restaurant_relation_restaurant_id`,`menu_restaurant_relation_menu_id`,`menu_restaurant_relation_price`) VALUES ('$restaurant_id','$menu_id','$price')");
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function update_item_price($restaurant_id,$item_id,$item_price)
        {
            $result = $this->db->query("UPDATE indi_menu_restaurant_relation SET `menu_restaurant_relation_price` = '$item_price' WHERE `menu_restaurant_relation_restaurant_id` = '$restaurant_id' AND `menu_restaurant_relation_menu_id` = '$item_id'");
            return $result;
        }
	


}



