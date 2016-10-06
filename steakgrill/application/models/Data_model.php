<?php
	class Data_model extends CI_Model{
            
            /*function __construct(){
                
			parent::__construct()
		}*/
		// common insert query for normal insert
		function insert_data_to_database($table_name,$data){
            $this->db->insert($table_name,$data);
            return 1; 
        }
        function insert_to_database($table_name,$data){
			$this->db->insert($table_name,$data);
            return $this->db->insert_id(); 
		}


        function insert_data_of_item($table_name,$data){
            //echo $table_name; exit; 
            $result=$this->db->insert($table_name,$data);
                $item_id = $this->db->insert_id();
                if ($result) {
                    return $item_id;
                } else {
                    return false;
                }
        }

        function check_subscribe_email($email ){


            //echo $email; exit; 

            $sql = "SELECT * FROM email_subscribe WHERE subscribe_email = '$email' ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
               return 'true';
              }else{
                return 'false';
              } 
        }

		// common fatch query for normal fatch from one table all data
		function fatch_all_data($table_name){
            $sql = "SELECT * FROM $table_name";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
        } 

        function fatch_data_where($table_name,$where=null){
            if($where){
                $w=" WHERE 1=1 ";
                foreach ($where as $key => $value) {
                    $w.='AND '.$key.' = "'.$value.'"'; 
                }
                $sql = "SELECT * FROM $table_name".$w;
            }else{
               $sql = "SELECT * FROM $table_name"; 
           }			
			$query = $this->db->query($sql);
			if ($query->num_rows() > 1) {
				 return $query->result_array();
			}elseif($query->num_rows() == 1){
               return $query->row_array(); 
            }
		}

        function delete_data_by_id($table_name,$data){
            $this->db->delete($table_name,$data);
            return true;
        }
         function delete_data($table_name,$res_id){
            $this->db->delete($table_name,array('res_id'=>$res_id));
        }
        function delete_signature_item_by_a_restaurent($table_name,$signature_item_id){
            $this->db->delete($table_name,array('signature_item_id'=>$signature_item_id));
        }
        function fatch_signature_item_by_a_restaurent($table_name,$column_name){
            $sql="SELECT * FROM `$table_name` WHERE res_id='$column_name'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }
		function insert_restaurent($table_name,$data){
			$this->db->insert($table_name,$data);
			$insert_id = $this->db->insert_id();
		  	return  $insert_id;
			//echo $insert_id; exit;
		}
		function fatch_restaurent_menu_setting(){
			$sql = "SELECT indi_items.*, indi_catagories.* FROM  indi_items INNER JOIN indi_catagories ON indi_items.item_catagory_id=indi_catagories.catagory_id";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				 return $query->result_array();
			}
		}
        function fetch_to_edit_by_a_restaurent($table,$id,$table_id){
            return $this->db->get_where($table,array($table_id=>$id))->row_array();
        }
		function restaurent_menu_setting_complate($data,$table_name){
			$this->db->insert($table_name,$data);
		}
		function is_valid_user($user_email,$user_password,$user_type){

            // echo $user_email;  
            // echo $user_password;  
            // echo $user_type; exit; 
            $sql = "SELECT * FROM  indi_users WHERE user_email= ? AND user_password = ? AND user_type= ? ";
           
            $query = $this->db->query($sql, array($user_email, $user_password, $user_type));

            if ($query->num_rows() > 0) {
                //$this->do_login($query->row_array());
                return true;
            }else {
                return false;
            }
        }
        function is_valid_customer($user_email,$user_password){

			$sql = "SELECT * FROM  customer_info WHERE email= ? AND password = ?";
			$query = $this->db->query($sql, array($user_email, $user_password));
            // var_dump($query);exit;
			if ($query->num_rows() > 0) {
				return $query->row_array();
				return true;
			}else {
				return false;
			}
    	}


		function category_filter($catetgory_name,$table_name){
            $sql="SELECT * from $table_name where cuisine_item_category='$catetgory_name'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        function view_signature_item($column_value){
            /*$sql="SELECT * FROM $table_name WHERE '$column_name'=$column_value";*/
            $sql="SELECT * FROM `signature_item` WHERE res_name = '$column_value'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        // edit and update operation start hare

        function fetch_to_edit($table,$id,$table_id){
            return $this->db->get_where($table,array($table_id=>$id))->row_array();
        }
        function update($id,$table_name,$data,$table_id){
            $this->db->where($table_id,$id);
            $this->db->update($table_name,$data);
            return 1; 
        }
        function updates($field_name,$field_value,$table_name,$data){
            // echo $field_name;
            // echo $field_value;
            // echo $table_name;
            // exit; 
            $this->db->where($field_name,$field_value);
            $this->db->update($table_name,$data);
        }


        public function get_reservation_info($cid)                
            {     
                 $query = $this->db->query("SELECT *
                                            FROM bedford_reservation                       
                                            WHERE reservation_id = $cid " );  
                 return $query->result_array(); 
            }
 
       
        public function get_menu_for_restaurant($last_insert_id)
        {
            $query = $this->db->query("SELECT * FROM indi_menu_restaurant_relation "
                . "LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id "
                . "LEFT JOIN indi_catagories ON indi_catagories.catagory_id = indi_items.item_catagory_id "
                . "LEFT JOIN indi_res_info ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id  "
                . "WHERE menu_restaurant_relation_restaurant_id = '$last_insert_id'");
            //$query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE item_restaurant_id = '$restaurant_id'");
            $result = $query->result();
            return $result;
        }
         public function get_menus($restaurant_id = null)
        {
            $sql = "SELECT * FROM indi_items "
                . "LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id "
                . "LEFT JOIN indi_menu_restaurant_relation ON indi_items.item_id = indi_menu_restaurant_relation.menu_restaurant_relation_menu_id "
                . "LEFT JOIN indi_res_info ON indi_items.item_restaurant_id = indi_res_info.res_id GROUP BY indi_items.item_id";
            if($restaurant_id)
            {
                $sql .= " WHERE indi_items.item_restaurant_id='$restaurant_id'";
            }
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
        public function add_menu_price_by_a_restaurent($restaurant_id,$price,$menu_id)
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
        public function update_item_price_by_a_restaurent($restaurant_id,$item_id,$item_price)
        {
            $result = $this->db->query("UPDATE indi_menu_restaurant_relation SET `menu_restaurant_relation_price` = '$item_price' WHERE `menu_restaurant_relation_restaurant_id` = '$restaurant_id' AND `menu_restaurant_relation_menu_id` = '$item_id'");
            return $result;
        }
        public function get_a_restaurant($last_insert_id)  
        {
            $query = $this->db->query("SELECT * FROM indi_res_info LEFT JOIN indi_users ON indi_res_info.res_owner_id = indi_users.user_id WHERE res_id='$last_insert_id'");
            $result = $query->result();
            return $result;
        }
        public function get_restaurant()  
        {
            $query = $this->db->query("SELECT * FROM indi_res_info LEFT JOIN indi_users ON indi_res_info.res_owner_id = indi_users.user_id WHERE res_id='$last_insert_id'");
            $result = $query->result();
            return $result;
        }

        public function get_a_restaurant_by_a_restaurent($last_insert_id)  
        {
            //echo $last_insert_id; exit;
            $query = $this->db->query("SELECT * FROM indi_res_info LEFT JOIN indi_users ON indi_res_info.res_owner_id = indi_users.user_id WHERE res_id='$last_insert_id'");
            $result = $query->result();
            return $result;
        }
        public function get_menu_for_restaurant_by_a_restaurent($last_insert_id)
        {
            $query = $this->db->query("SELECT * FROM indi_menu_restaurant_relation "
                . "LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id "
                . "LEFT JOIN indi_catagories ON indi_catagories.catagory_id = indi_items.item_catagory_id "
                . "LEFT JOIN indi_res_info ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id  "
                . "WHERE menu_restaurant_relation_restaurant_id = '$last_insert_id'");
            //$query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE item_restaurant_id = '$restaurant_id'");
            $result = $query->result();
            return $result;
        }
        public function search_other_menu($match) 
        {
              $res_id=$this->session->userdata('last_insert_id');
              
            $query = $this->db->query("SELECT indi_items.item_name,indi_items.item_id, indi_catagories.*,indi_menu_restaurant_relation.*
                    FROM  indi_items
                    LEFT OUTER JOIN indi_catagories
                    ON indi_items.item_catagory_id=indi_catagories.catagory_id
                    LEFT JOIN indi_menu_restaurant_relation  
                    ON (indi_items.item_id=indi_menu_restaurant_relation.menu_restaurant_relation_menu_id AND
					indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = $res_id OR  
					indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id IS NULL      
					)
                    WHERE indi_items.item_name LIKE '%$match%'   
                    
                    GROUP BY item_name");   
					
            $result = $query->result();
            return $result;
        }
        public function get_menus_by_a_restaurent($restaurant_id = null)
        {
            $sql = "SELECT * FROM indi_items "
                . "LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id "
                . "LEFT JOIN indi_menu_restaurant_relation ON indi_items.item_id = indi_menu_restaurant_relation.menu_restaurant_relation_menu_id "
                . "LEFT JOIN indi_res_info ON indi_items.item_restaurant_id = indi_res_info.res_id GROUP BY indi_items.item_id";
            if($restaurant_id)
            {
                $sql .= " WHERE indi_items.item_restaurant_id='$restaurant_id'";
            }

            $query = $this->db->query($sql);
            $result = $query->result();
            return $result;
        }
        public function search_add_menu_price($restaurant_id,$price,$menu_id)
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
        public function search_update_menu_price($menu_restaurant_relation_id,$restaurant_id,$price,$menu_id)
        {   
           
            $result = $this->db->query("UPDATE indi_menu_restaurant_relation SET `menu_restaurant_relation_price` = '$price' WHERE `menu_restaurant_relation_id` = '$menu_restaurant_relation_id' AND `menu_restaurant_relation_menu_id` = '$menu_id'"); 
            if($result) 
            { 
                return true; 
            }
            else
            {
                return false;
            }
        }
        public function front_info($res_id) {
        $query = $this->db->query("Select *From indi_res_info where res_id='$res_id' LIMIT 1");
        $result = $query->result();
        if (count($result) == 1) {

            return $result;
        }
        }
        public function gallery_info($res_id) {
        $query = $this->db->query("Select * From indi_gallery_image  where res_id = '$res_id' AND `title`!='logo';");
        $result = $query->result();
        if (count($result) > 0) {
            return $result;
        }
        }
        public function show_feature_info($res_id) {
        $query = $this->db->query("Select *From indi_feature_info where res_id='$res_id' LIMIT 1");
        $result = $query->result();
        if (count($result) == 1) {

            return $result;
        }
        }
        public function c_name($restaurant_id)
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
        return $result;         
       }
       public function res_pic($res_id)
        {
        $query = $this->db->query("Select * From indi_gallery_image  where res_id = '$res_id' AND `title`='logo';");
        $result = $query->result();
        if (count($result) > 0) {
            return $result;
        }  
        }
        
        
        function list_popular_dishes(){
        $query = $this->db->query("SELECT * FROM indi_items AS ii 
        ORDER BY ii.item_order_times DESC LIMIT 10  " );
        $result = $query->result();
        return $result;
       }
       
        function recent_post()
        {
        $query = $this->db->get('entry');
        return $query->result();
        }
        
        
        
        
        public function add_item($item_name,$restaurant_id = null,$item_ingredient = null,$item_types,$video_url = null,$catagory_name,$photo_name,$page_title = null,$item_meta_description = null,$item_meta_keyword = null,$item_short_description,$item_long_description = null,$alergies,$cooking_method = null,$preparation_time=null,$cooking_time=null,$serves=null)                   
    {      
        $result = $this->db->query("INSERT INTO `indi_items` (`item_name`,`item_restaurant_id`,`item_indegrediant`,`item_video_url`,`item_catagory_id`,`item_photo`,`item_page_title`,`item_meta_description`,`item_meta_keyword`,`item_short_description`,`item_long_description`,`item_cooking_method`,`preparation_time`,`cooking_time`,`serves`) VALUES ('$item_name','$restaurant_id','$item_ingredient','$video_url','$catagory_name','$photo_name','$page_title','$item_meta_description','$item_meta_keyword','$item_short_description','$item_long_description','$cooking_method','$preparation_time','$cooking_time','$serves')");
        $menu_id = $this->db->insert_id();    
        
        if($this->session->userdata('user_type') == 5)
        {
            $result = $this->db->query("INSERT INTO `indi_menu_restaurant_relation` (`menu_restaurant_relation_restaurant_id`,`menu_restaurant_relation_menu_id`) VALUES ('$restaurant_id','$menu_id')");
        }
        
        foreach($alergies as $alergy)
        {
            $this->db->query("INSERT INTO `indi_item_alergy_relation` (`item_alergy_relation_item_id`,`item_alergy_relation_alergy_id`) VALUES ('$menu_id','$alergy')");
        }
        
        foreach($item_types as $item_type)
        {
            $this->db->query("INSERT INTO `indi_menu_item_type_relation` (`menu_item_type_relation_menu_id`,`menu_item_type_relation_menu_type_id`) VALUES ('$menu_id','$item_type')");
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
        
        
        public function get_alergy()
        {
            $query = $this->db->query("SELECT * FROM indi_alergies");
            $result = $query->result();
            return $result; 
        }     
    
    
        public function add_alergy($alergy_name,$alergy_photo)
        {
            $result = $this->db->query("INSERT INTO `indi_alergies` (`alergy_name`,`alergy_photo`) VALUES ('$alergy_name','$alergy_photo')");
            if($result)
            {
                return true;            
            }
            else
            {
                return false;            
            }        
        }


        public function get_all_reservation()               
        { 

           $query = $this->db->query("SELECT *      
                                      FROM bedford_reservation                                
                                      ORDER BY reservation_id DESC ");                      
           return $query->result_array();
        }
            
        

        
			
			
			
		
           // public function get_all_reservation($limit=false, $start=0, $perpage='')               
           //  { 
               
           //       $con = "where 1 "; 
                 
           //       if ($_POST){
                     
           //          if ($_REQUEST['reservation_id']) { 
           //                 $con.=" and indi_reservation_info.reservation_id like '%{$_REQUEST['reservation_id']}%'";  
           //           }
                
           //          if ($_REQUEST['customer_name']) { 
           //                 $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
           //           }
                     
           //          if ($_REQUEST['restaurant_name']) { 
           //                 $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
           //           }
           //       }
               
                 
           //      $limit_sql='';
           //      if ($limit) {
           //      $limit_sql=" limit $start,$perpage"; 
           //      }
           //     $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.res_name,indi_res_info.res_address,indi_res_info.res_id,customer_info.first_name,customer_info.last_name,customer_info.customer_id		
           //                                FROM indi_reservation_info 								
           //                                INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
           //                                LEFT JOIN customer_info ON indi_reservation_info.customer_id = customer_info.customer_id $con 
           //                                ORDER BY indi_reservation_info.reservation_id DESC $limit_sql ");                      
           //     return $query->result_array();
           //  }
            
            
            
            // Update on 11/7/2015 at 3:03 PM - Mahabub
            public function get_all_order($limit=false, $start=0, $perpage='')               
            {   

                  $con = "where 1=1 "; 
                 
                 if ($_POST){
                     
                    if ($_REQUEST['order_id']) { 
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['order_id']}%'";  
                     }
                
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }                   
                 }
                 
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }                
                 $query = $this->db->query("SELECT customer_food_order.*, customer_info.first_name,customer_info.last_name  		
					    FROM customer_food_order 
                        INNER JOIN customer_info ON customer_info.customer_id = customer_food_order.customer_id  $con
					    ORDER BY customer_food_order.order_id DESC $limit_sql ");     
                 
            return $query->result_array();
            }
            
            
           /* public function get_order_statement($limit=false, $start=0, $perpage='')               
            {   
                
                 $con = "where 1 ";    
                 
                 if ($_POST){
                    if ($_REQUEST['o_id']) {                                                         
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['o_id']}%'";  
                           
                          // echo "o_id"; exit; 
                           
                     }
                    if ($_REQUEST['c_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['c_name']}%'";
                           //echo "c_name"; exit; 
                     }
                    if ($_REQUEST['r_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['r_name']}%'";
                          // echo "r_name"; exit;
                     }
                 } 
                 
                //echo $con; exit;       
                 
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }  
                
                 $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.*,customer_info.first_name,customer_info.last_name 		
					    FROM customer_food_order 
				            INNER JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id
                                            INNER JOIN customer_info ON customer_info.customer_id = customer_food_order.customer_id  $con
					    ORDER BY customer_food_order.order_id DESC $limit_sql ");    
                 
            return $query->result_array();
            }   */
            
            
             public function get_order_statement($limit=false, $start=0, $perpage='')               
            {   
                
                 $con = "where 1 ";    
                 
                 if ($_POST){

                    if ($_REQUEST['r_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['r_name']}%'";
                          // echo "r_name"; exit;
                     }
                 }      
                 
                $limit_sql='';            
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }  
                
                 $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.*, SUM(customer_food_order.total_price) AS TotalPrice   		
					    FROM customer_food_order 
                                            LEFT JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id $con 
					    GROUP BY customer_food_order.res_id 
                                            ORDER BY customer_food_order.order_id DESC ");    
                 return $query->result_array(); 
            }
            
            
            public function get_reservation_statement($limit=false, $start=0, $perpage='')               
            {   
                
                 $con = "where 1 ";    
                 
                 if ($_POST){

                    if ($_REQUEST['r_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['r_name']}%'";
                          // echo "r_name"; exit;
                     }
                 } 
                 
                //echo $con; exit;       
                 
                $limit_sql='';          
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }  
                
                 $query = $this->db->query("SELECT indi_reservation_info.*, indi_res_info.*		
					    FROM indi_reservation_info 
                                            LEFT JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id $con
					    GROUP BY indi_reservation_info.restaurant_id 
                                            ORDER BY indi_reservation_info.reservation_id DESC ");     
                 return $query->result_array(); 
            }
             public function get_restaurant_order_statement($limit=false, $start=0, $perpage='')               
            {   
                 
                   // $res_id = $this->session->userdata('restaurantId');                                 
                   // $con = "where 1 and statement.restaurant_id = $res_id and reservation_id= 0 "; 
                   $con = "where 1 and reservation_id= 0 "; 
                 
                 if ($_POST){
                     
                        if ($_REQUEST['month'] && $_REQUEST['year']) { 

                             $day1='01';
                             $day2='31'; 
                             $month=$_REQUEST['month'];
                             $year = $_REQUEST['year']; 

                                $con.=" and statement.submission_date BETWEEN  '$year-$month-$day1' AND  '$year-$month-$day2'";  
                          } 
                         if ($_REQUEST['ord_id1']) { 
                                $con.=" and statement.order_id like '%{$_REQUEST['ord_id1']}%'"; 
                          }
                         if ($_REQUEST['cus_name1']) { 
                             //echo $_REQUEST['cus_name1']; exit; 
                                $con.=" and customer_info.first_name like '%{$_REQUEST['cus_name1']}%'";        
                          }
                 } 
                 
                $limit_sql='';     
                if ($limit) {
                $limit_sql =" limit $start,$perpage"; 
                }  

            
            $query = $this->db->query("
                SELECT statement.*, customer_info.first_name,customer_info.last_name    
                FROM statement 
                INNER JOIN customer_info ON customer_info.customer_id = statement.customer_id $con
                ORDER BY statement.statement_id DESC  ");    
            return $query->result_array();              
            }
            public function get_restaurant_reservation_statement($limit=false, $start=0, $perpage='')               
            {   

                   // $res_id = $this->session->userdata('restaurantId');                                     
                   // $con = "where 1 and statement.restaurant_id = $res_id and order_id= 0 "; 
                   $con = "where 1 and order_id= 0 "; 
                   
                 if ($_POST){ 
                     
                    if ($_REQUEST['month'] && $_REQUEST['year']) { 
                         
                        $day1='01';
                        $day2='31';
                        $month=$_REQUEST['month'];
                        $year = $_REQUEST['year']; 

                           $con.=" and statement.submission_date BETWEEN  '$year-$month-$day1' AND  '$year-$month-$day2'";  
                     } 
                    if ($_REQUEST['ord_id1']) {                                                           
                           $con.=" and statement.reservation_id like '%{$_REQUEST['ord_id1']}%'";  
                     } 
                    if ($_REQUEST['cus_name1']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['cus_name1']}%'";
                     }
                 }  
                                  
                $limit_sql =''; 
                if ($limit) {
                $limit_sql =" limit $start,$perpage"; 
                }   
                 
                $query = $this->db->query("SELECT statement.*, customer_info.first_name, customer_info.last_name
                                           FROM statement
                                           INNER JOIN customer_info ON customer_info.customer_id = statement.customer_id $con
                                           ORDER BY statement.statement_id DESC ");      
                                            
            return $query->result_array();             
            }
            
            
            
            public function get_statement_summery($limit=false, $start=0, $perpage='')                 
            {
                
                $con = "where 1 "; 
                if ($_POST){ 
                     
                    if ($_REQUEST['month'] && $_REQUEST['year']) { 
                         
                        $day1='01';
                        $day2='31';
                        $month=$_REQUEST['month'];
                        $year = $_REQUEST['year']; 

                           $con.=" and statement.submission_date BETWEEN  '$year-$month-$day1' AND  '$year-$month-$day2'";    
                     } 
                 
                 }
                 
                 
                $limit_sql =''; 
                if ($limit) {
                $limit_sql =" limit $start,$perpage"; 
                }  
                 
                  
                    $query = $this->db->query("SELECT statement.*, indi_res_info.*,
                                                SUM(statement.total_price) AS TotalPrice, 
                                                SUM(statement.order_commission) AS OrderCommission, 
                                                SUM(statement.people) AS People,
                                                SUM(statement.reservation_commission) AS ReservationCommission
                                                FROM statement 
                                                LEFT JOIN indi_res_info ON statement.restaurant_id = indi_res_info.res_id $con   
                                                GROUP BY statement.restaurant_id     
                                                ORDER BY statement.statement_id DESC $limit_sql ");  
                
            return $query->result_array();     
            }
			
			
			public function get_user_info($cid)               
            {   
                 $query = $this->db->query("SELECT * from customer_info where customer_id= $cid ");  
                 return $query->result_array();
            }
			
			public function get_res_info($res_id)               
            {     
                 $query = $this->db->query("SELECT * from indi_res_info where res_id= $res_id ");  
                 return $query->result_array(); 
            }
			
			/*
            public function get_order_history($cid)               
            {     
                $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.*                   	
					    FROM customer_food_order 
				            INNER JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id
                                            WHERE customer_food_order.customer_id = $cid 
					    ORDER BY customer_food_order.order_date DESC LIMIT 0,100  ");  
                 
                 return $query->result_array(); 
            }
            */

            public function get_order_history($cid)               
            {     
                $query = $this->db->query("SELECT *                 
                        FROM customer_food_order 
                        WHERE customer_id = $cid 
                        ORDER BY customer_food_order.order_date DESC LIMIT 0,100  ");  
                 
                 return $query->result_array(); 
            }
            
            public function get_reservation_history($cid)                
            {     
                 $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.res_name,indi_res_info.res_address,indi_res_info.res_id		
                                          FROM indi_reservation_info 								
                                          INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                          WHERE indi_reservation_info.customer_id = $cid 
                                          ORDER BY indi_reservation_info.reserve_submission_date DESC LIMIT 0,100 
                                          ");                       
               return $query->result_array(); 
            }



    function insert_data($table,$data){
        $query = $this->db->get($table)->result();
        $indatabase=array();
        foreach ($query as $key => $value) {
            $indatabase[]=$value->slug;
        }
        foreach ($data as $key => $val) {
            if(in_array($key, $indatabase)){
                $insert = array(
                   'social_link'    => $val
                );
                $this->db->where('slug', $key);
                $this->db->update($table, $insert); 
            }else{
                $insert = array(
                   'name'           => $key,
                   'slug'           => $key,
                   'social_link'    => $val
                );
                $this->db->insert($table, $insert);
            }
        }
    }
    function insert_settings_data($table,$data){

        //echo "hi"; exit; 

        $query = $this->db->get($table)->result();
        $indatabase=array();
        foreach ($query as $key => $value) {
            $indatabase[]=$value->slug;
        }
        foreach ($data as $key => $val) {
            if(in_array($key, $indatabase)){
                $insert = array(
                   'value'    => $val
                );
                $this->db->where('slug', $key);
                $this->db->update($table, $insert); 
            }else{
                $insert = array(
                   'name'           => $key,
                   'slug'           => $key,
                   'value'    => $val
                );
                $this->db->insert($table, $insert);
            }
        }
    }
           /************** For Payment Method start***************/

    public function get_payment_method_list()               
    {     
        $query = $this->db->query("SELECT * from payment_method");   
         
         return $query->result_array(); 
    }

    public function getAllPaymentMethod()               
    {     
        $query = $this->db->query("SELECT * from payment_method where payment_method_status=1");   
         
         return $query->result_array(); 
    }

    /************** For Payment Method end*****************/
    /************** For business hour start ***************/

    public function getBusinessHour(){
        $query = $this->db->query("SELECT * from indi_res_business_hour");   
        return $query->result_array(); 
    }

    /************** For business hour end ***************/


    // function getAllItems($table_name){
    //     $sql = "SELECT * FROM $table_name";
    //     $query = $this->db->query($sql);
    //     if ($query->num_rows() > 0) {
    //          return $query->result_array();
    //     }
    // }

    /************** For voucher Start ***************/

    public function addVoucher($data) {
        $voucher_type = $data['voucher_type'];
        $voucher_number = rand(1000000, 9999999);
        $generated_date = date('d/m/Y');

        $voucherData = array(
            'voucher_type' => $data['voucher_type'],
            'voucher_number' => $voucher_number,
            'voucher_value_type' => $data['voucher_value_type'],
            'voucher_amount' => $data['voucher_amount'],
            'generated_by' => 'user',
            'generated_date' => $generated_date,
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date']
        );

        if ($this->db->insert('voucher', $voucherData)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteVoucher($id) {
        if ($this->db->delete('voucher', array('voucher_id' => $id))) {
            return true;
        }
        return FALSE;
    }

    public function getVoucherByID($id) {
        $myQuery = "SELECT *
                       FROM voucher
                       WHERE voucher_id = $id ";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function editVoucher($data, $id) {
        $voucher_type = $data['voucher_type'];
        $update_date = date('d/m/Y');

        $voucherData = array(
            'voucher_type' => $data['voucher_type'],
            'voucher_value_type' => $data['voucher_value_type'],
            'voucher_amount' => $data['voucher_amount'],
            'update_date' => $update_date,
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date']
        );

        if ($this->db->update('voucher', $voucherData, array('voucher_id' => $data['voucher_id']))) {
            return true;
        } else {
            return false;
        }
    }

    function insert_coupon_use_history($coupon_use_history) {
        $this->db->insert('coupon_use_history', $coupon_use_history);
        return TRUE;
    }

    public function coupon_use_history() {
        $sql = 'SELECT * FROM coupon_use_history';
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->result_array();
        }
    }

    //////////////////////// For discount ////////////

    public function deleteDsicount($id) {
        if ($this->db->delete('discounts', array('id' => $id))) {
            return true;
        }
        return FALSE;
    }

    /////////////////////////// For Newsletter ////////////////

    public function delete_newsletter($newsletter_id) {
        $this->db->query("DELETE FROM newsletter WHERE newsletter_id = '$newsletter_id'");
        return True;
    }

    public function fatch_newsletter_by_id($newsletter_id) {
        $sql = "SELECT newsletter_id, newsletter_title, newsletter_body
                   FROM newsletter
                   WHERE newsletter_id=$newsletter_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
    }

    public function filter_group1($six_munth_ago_date, $twelve_munth_ago_date) {

  // echo $six_munth_ago_date; 
  // echo $twelve_munth_ago_date;

        $sql = "SELECT userEmail FROM bulk_email
                  WHERE (create_date BETWEEN '$twelve_munth_ago_date' AND '$six_munth_ago_date')";
        //echo $sql; exit; 
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function filter_group2($twelve_munth_ago_date, $thirty_munth_ago_date) {
        $sql = "SELECT userEmail FROM bulk_email
                  WHERE (create_date BETWEEN '$thirty_munth_ago_date' AND '$twelve_munth_ago_date')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function filter_group3() {
        $sql = "SELECT subscribe_email FROM subscribe";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function filter_group4() {
        $sql = "SELECT GROUP_CONCAT(userEmail) FROM bulk_email";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    //////////////// for bulk coupon ////////////////

    public function addBulkCoupon($data) {
       // echo $data['couponId']; exit; 
        for($i=0; $i<$data['mumber_of_coupon']; $i++){

            $voucher_type = $data['coupon_type'];
            $voucher_number = $data['couponId'].rand(100000, 999999); 
            $generated_date = date('Y-m-d');

            $voucherData = array(
                'coupon_type' => $data['coupon_type'],
                'coupon_number' => $voucher_number,
                'coupon_value_type' => $data['coupon_value_type'],
                'coupon_amount' => $data['coupon_amount'],
                'regular_discount' => $data['regular_discount'],
                'coupon_group' => $data['coupon_group'],
                'generated_by' => 'user',
                'generated_date' => $generated_date,
                'start_date' => $data['start_date'],
                'bday_discount_amount' => $data['bday_discount_amount'],
                'partner_bday_discount_amount' => $data['partner_bday_discount_amount'],
                'anniversary_discount_amount' => $data['anniversary_discount_amount'],
                'special_day_discount_amount' => $data['special_day_discount_amount'],
                'unknown_custome_discount_amount' => $data['unknown_custome_discount_amount'],
                'expire_date' => $data['expire_date']
            );

            $result=$this->db->insert('bulk_coupon', $voucherData);
        }

        if ($result){
            return true;
        } else {
            return false;
        }
    }

    public function deleteBulkCoupon($id) {  
        if ($this->db->delete('bulk_coupon', array('coupon_id' => $id))) {
            return true;
        }
        return FALSE;
    }

    public function getBulkCouponByID($id) {
        $myQuery = "SELECT *
                       FROM bulk_coupon
                       WHERE coupon_id = $id ";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function editBulkCoupon($data, $id) {
        $voucher_type = $data['coupon_type'];
        $update_date = date('d/m/Y');

        $voucherData = array(
            'coupon_type' => $data['coupon_type'],
            'coupon_value_type' => $data['coupon_value_type'],
            'coupon_amount' => $data['coupon_amount'],
            'update_date' => $update_date,
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date']
        ); 

        if ($this->db->update('bulk_coupon', $voucherData, array('coupon_id' => $data['coupon_id']))) {
            return true;
        } else {
            return false;
        }
    }

    function downloadBulkCoupon()
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $query = $this->db->query("SELECT * FROM bulk_coupon");  
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download('Bulk_Coupon.csv', $data);
    }


    /****** For Review ******/

        function get_valid_order_number($current_valid_order_number) {
        $sql = "SELECT * FROM customer_food_order WHERE order_id = '$current_valid_order_number' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return FALSE;
        }
    }

    /********** For Order list **********/
    
    public function getOrderListBypin($email,$order_pin){

             $sql="SELECT * FROM customer_food_order WHERE email='$email' AND order_pin='$order_pin' ";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
            }

    }

    /******************* For Category Item ************/

    // function get_category_item($id){
    //         $sql = "SELECT indi_items.*,indi_catagories.catagory_name
    //                 FROM indi_items
    //                 LEFT JOIN indi_catagories
    //                 ON indi_items.item_catagory_id=indi_catagories.catagory_id
    //                 WHERE indi_items.item_catagory_id='$id' ";
    //                 $query = $this->db->query($sql);
    //                 if ($query->num_rows() > 0) {
    //              return $query->result_array();
    //         }
    // }

    // function get_category_item($id){
    //         $sql = "SELECT indi_items.*, item_image_gallery.url, item_image_gallery.id 
    //                 FROM indi_items 
    //                 LEFT JOIN item_image_gallery
    //                 ON item_image_gallery.item_id=indi_items.item_id
    //                 where item_catagory_id='$id' ";
    //         $query = $this->db->query($sql);
    //         if ($query->num_rows() > 0) {
    //              return $query->result_array();
    //         }
    // }

    
    // function get_category_item($id){
    //         $sql = "SELECT indi_items.*,indi_catagories.catagory_name
    //                 FROM indi_items
    //                 LEFT JOIN indi_catagories
    //                 ON indi_items.item_catagory_id=indi_catagories.catagory_id
    //                 WHERE indi_items.item_catagory_id='$id'
    //                 AND indi_items.parent_item_id='0' ";
    //                 $query = $this->db->query($sql);
    //                 if ($query->num_rows() > 0) {
    //              return $query->result_array();
    //         }
    // }


    function get_category_item($id){


            $sql = "SELECT indi_items.*, item_image_gallery.url, item_image_gallery.id,indi_catagories.catagory_name
                    FROM indi_items 
                    LEFT JOIN item_image_gallery
                    ON item_image_gallery.item_id=indi_items.item_id
                    LEFT JOIN indi_catagories
                    ON indi_items.item_catagory_id=indi_catagories.catagory_id
                    where indi_items.item_catagory_id='$id' 
                    AND indi_items.parent_item_id='0'
                    GROUP BY indi_items.item_id";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
    }

    function get_items($id=null){
        if($id):
            $sql = "SELECT indi_items.*,indi_catagories.catagory_name
                    FROM indi_items
                    LEFT JOIN indi_catagories
                    ON indi_items.item_catagory_id=indi_catagories.catagory_id
                    WHERE indi_items.item_catagory_id='$id' ";
        else:
            $sql = "SELECT indi_items.*,indi_catagories.catagory_name
                    FROM indi_items
                    LEFT JOIN indi_catagories
                    ON indi_items.item_catagory_id=indi_catagories.catagory_id LIMIT 0, 20";
        endif;
                   $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
    }

    function getAllOrder($table_name){
        //echo 'LSKAF'; exit; 
            $sql = "SELECT * FROM $table_name ORDER BY order_id DESC";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
    }  

    function get_order_history_data($id){
            $sql = "SELECT * FROM order_history where order_id='$id' ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
    }
	function get_order_history_data_asc($id){
            //$sql = "SELECT * FROM order_history where order_id='$id' ";
            $sql = "SELECT order_history.*, indi_items.item_catagory_id 
					FROM `order_history` 
					LEFT JOIN indi_items ON indi_items.item_id = order_history.item_id
					WHERE order_id='$id'
					ORDER BY indi_items.item_catagory_id ASC ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
    } 

    /********** For special Discount *********/

    public function getSpecialDiscountByID($id) {
        $myQuery = "SELECT *
                       FROM bulk_coupon
                       WHERE coupon_id = $id ";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
    public function editSpecialDiscount($data, $id){

        $voucher_type = $data['coupon_type'];
        $update_date = date('d/m/Y');

        $voucherData = array(
            'coupon_type' => $data['coupon_type'],
            'coupon_value_type' => $data['coupon_value_type'],
            'coupon_amount' => $data['coupon_amount'],
            'update_date' => $update_date,
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date']
        ); 
        if ($this->db->update('bulk_coupon', $voucherData, array('coupon_id' => $data['coupon_id']))) {
            return true;
        } else {
            return false;
        }

    }

    public function getCustomerInfoByID($id) {
        $myQuery = "SELECT *
                       FROM customer_info
                       WHERE customer_id = $id ";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getCouponForCustomer() {
        $myQuery = "SELECT coupon_number as couponNumber, coupon_id, coupon_group, coupon_amount, coupon_value_type
                    FROM bulk_coupon
                    WHERE coupon_group = 'general' AND is_used = '0' ";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getCouponDataForCustomer($order_pin) {
        $myQuery = "SELECT coupon_number as couponNumber, coupon_id, coupon_group
                    FROM bulk_coupon
                    WHERE coupon_number = $order_pin ";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    /********** Mahbub ************/


    function get_all_data($fields="*",$table_name){
            $sql = "SELECT $fields FROM $table_name";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                 return $query->result_array();
            }
    }

    function get_all_data_where($fields="*",$table_name,$where=null,$order=null){
        if($where){            
            $this->db->where($where); 
        }
        if($order){
            $this->db->order_by($order); 
        }
        $this->db->select($fields);
        $this->db->from($table_name);
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
             return $query->result();
        }
    }

    /*function get_all_dataarray_where($fields="*",$table_name,$where=null){
        if($where){            
            $this->db->where($where); 
        }
        $this->db->select($fields);
        $this->db->from($table_name);
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
             return $query->result_array();
        }
    }*/

    function custom_query($q){
        $query = $this->db->query($q);
        if ($query->num_rows() > 0) {
             return $query->result();
        }
    }

    /*********** Order Status Change *************/

    public function order_status_update($order_id, $status) {
        $sql = "UPDATE `customer_food_order` SET `order_status` = $status WHERE `order_id` = $order_id";
        $query = $this->db->query($sql);
        return TRUE;
    }

    public function payment_status_update($order_id, $status) {
        $sql = "UPDATE `customer_food_order` SET `is_paid` = $status WHERE `order_id` = $order_id";
        $query = $this->db->query($sql);
        return TRUE;
    }

    public function pin_for_new_user(){
        $sql = "SELECT coupon_id, coupon_number FROM bulk_coupon where coupon_number=(select min(coupon_number) from bulk_coupon where coupon_group='general' and is_used=0)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function get_pin_where($id=null){
        if($id){
            $sql = "SELECT * FROM bulk_coupon where coupon_number=$id and is_used=0";
            $query = $this->db->query($sql);
            return $query->result();
        }else{
            return false;
        }
    }

    public function update_notification($id=null,$type=null)
    {
        if($id){
            $this->db->where('order_id', $id);
            $this->db->where('type', $type);
            $this->db->update('notifications', array('isRead'=>1)); 
            return true;
        }
    }


    public function get_where_like($fields='*',$table,$where=null,$like=null)
    {
        $this->db->select($fields);
        if($like){
            $this->db->like($like);
        }
        if($where){
            $this->db->where($where); 
        }
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_where_like_o($fields='*',$table,$where=null,$like=null)
    {
        $this->db->select($fields);
        if($like){
            $this->db->like($like);
        }
        if($where){
            $this->db->where($where); 
        }
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }


    //=============================faisal========================
    
    public function get_all_dataarray_where($fields="*",$table_name,$where=null){
        if($where){            
            $this->db->where($where); 
        }
        $this->db->select($fields);
        $this->db->from($table_name);
        $query=$this->db->get();
        if ($query->num_rows() > 0) {
             return $query->result_array();
        }
    }

    public function admin_fatch_all_reviews(){
        // $con = "where 1 ";
        //  $limit_sql='';
        //         if ($limit) {
        //         $limit_sql=" limit $start,$perpage"; 
        //         }
        $sql = "SELECT review . * , customer_info.`first_name` , customer_info.`last_name` 
                FROM review
                LEFT JOIN customer_info ON customer_info.customer_id = review.customer_id
                ORDER BY review.id DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function fatch_all_reviews($limit=false, $start=0, $perpage=''){
        $con = "where 1 ";
         $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }
        $sql = "SELECT review . * , customer_info.`first_name` , customer_info.`last_name` 
                FROM review
                LEFT JOIN customer_info ON customer_info.customer_id = review.customer_id
                $con
                ORDER BY review.id DESC $limit_sql";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function update_review_status($id, $curent_status) {
        $sql = "UPDATE review SET status = $curent_status WHERE id=$id";
        $query = $this->db->query($sql);
        return true;
    }

    public function review_delete($review_id) {
        $query = $this->db->query("DELETE FROM review WHERE id = '$review_id'");
        return $query;
    }

}



