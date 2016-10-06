<?php
	class Tele_Operator_Data_Model extends CI_Model{
		/*function __construct(){
			parent::__construct()
		}*/
            function update($id,$table_name,$data,$table_id){
                $this->db->where($table_id,$id);
                $this->db->update($table_name,$data);
            }
            public function get_all_order($limit=false, $start=0, $perpage='')               
            {   
                $con = "where 1 ";
                if ($_POST){
                    if ($_REQUEST['order_id']) { 
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['order_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }
                     
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                     }
                 }
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
            }
            function  get_one_order_details($res_id,$order_id,$customer_id){
                $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.*,customer_info.*   
                FROM customer_food_order 
                INNER JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id
                INNER JOIN customer_info ON customer_info.customer_id = customer_food_order.customer_id 
                WHERE customer_food_order.res_id = $res_id AND customer_food_order.customer_id=$customer_id AND customer_food_order.order_id=$order_id");    
                return $query->result_array();
            }
            public function get_all_order_by_order_status_filter($order_status, $limit=false, $start=0, $perpage='')               
            {   
                //echo $status; exit;
                $con = "where 1 AND customer_food_order.is_paid=$order_status";
                if ($_POST){
                    if ($_REQUEST['order_id']) { 
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['order_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }
                     
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                     }
                 }
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
            }
            public function get_all_order_by_call_status_filter($call_status, $limit=false, $start=0, $perpage='')               
            {   
                //echo $status; exit;
                $con = "where 1 AND customer_food_order.call_status=$call_status";
                if ($_POST){
                    if ($_REQUEST['order_id']) { 
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['order_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }
                     
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                     }
                 }
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
            }

            public function get_all_reservation($limit = true, $start=0, $perpage='15')  
            { 
                $con = "where 1 "; 
                if ($_POST){
                    if ($_REQUEST['reservation_id']) { 
                           $con.=" and indi_reservation_info.reservation_id like '%{$_REQUEST['reservation_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                     }
                 }
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                //echo $start; exit;
                }
               $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.*,customer_info.*  
                                          FROM indi_reservation_info         
                                          INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                          LEFT JOIN customer_info ON indi_reservation_info.customer_id = customer_info.customer_id $con 
                                          ORDER BY indi_reservation_info.reservation_id DESC $limit_sql");                      
               return $query->result_array();
            }
            function  get_one_reservation_details($res_id,$reservation_id,$customer_id){
                $query = $this->db->query("SELECT indi_reservation_info.*, indi_res_info.*,customer_info.*   
                FROM indi_reservation_info 
                INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                INNER JOIN customer_info ON customer_info.customer_id = indi_reservation_info.customer_id 
                WHERE indi_reservation_info.restaurant_id = $res_id AND indi_reservation_info.customer_id=$customer_id AND indi_reservation_info.reservation_id=$reservation_id");    
                return $query->result_array();
            }
            public function get_all_reservation_by_order_status_filter($order_status, $limit=false, $start=0, $perpage='15')               
            {   
                //echo $status; exit;
                $con = "where 1 AND indi_reservation_info.reservation_status=$order_status";
                if ($_POST){
                    if ($_REQUEST['order_id']) { 
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['order_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }
                     
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                     }
                 }
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }
                $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.*,customer_info.*  
                                          FROM indi_reservation_info         
                                          INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                          LEFT JOIN customer_info ON indi_reservation_info.customer_id = customer_info.customer_id $con 
                                          ORDER BY indi_reservation_info.reservation_id DESC $limit_sql");    
                return $query->result_array();
            }
            public function get_all_reservation_by_call_status_filter($call_status, $limit=false, $start=0, $perpage='15')               
            {   
                //echo $status; exit;
                $con = "where 1 AND indi_reservation_info.call_status=$call_status";
                if ($_POST){
                    if ($_REQUEST['order_id']) { 
                           $con.=" and customer_food_order.order_id like '%{$_REQUEST['order_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                     }
                     
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                     }
                 }
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }
                $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.*,customer_info.*  
                                          FROM indi_reservation_info         
                                          INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                          LEFT JOIN customer_info ON indi_reservation_info.customer_id = customer_info.customer_id $con 
                                          ORDER BY indi_reservation_info.reservation_id DESC $limit_sql");    
                return $query->result_array();
            }
            
            
            
            
            
            
            
            
            
            
            
             public function get_all_order_report($limit=false, $start=0, $perpage='')               
            {   
                $con = "where 1 ";
                // $con = "where 1 and indi_reservation_info.restaurant_id = $res_id "; 
                if ($_POST){ 
                    if ($_REQUEST['month'] && $_REQUEST['year']) { 
                        $day=$_REQUEST['day'];
                        $month=$_REQUEST['month'];
                        $year=$_REQUEST['year']; 
                        $day2=$_REQUEST['day2'];
                        $month2=$_REQUEST['month2'];
                        $year2=$_REQUEST['year2']; 
                           $con.=" and customer_food_order.call_status_update_date BETWEEN  '$year-$month-$day' AND  '$year2-$month2-$day2'";  
                     }
                 }
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }
                $query = $this->db->query("SELECT customer_food_order.*, indi_res_info.*,customer_info.first_name,customer_info.last_name   
                FROM customer_food_order 
                INNER JOIN indi_res_info ON customer_food_order.res_id = indi_res_info.res_id
                INNER JOIN customer_info ON customer_info.customer_id = customer_food_order.customer_id  $con
                ORDER BY customer_food_order.order_id DESC ");  
                return $query->result_array();
            }
            public function get_all_reservation_report($limit = true, $start=0, $perpage='15')  
            { 
                $con = "where 1 "; 
                if ($_POST){
                     if ($_REQUEST['month'] && $_REQUEST['year']) { 
                        $day=$_REQUEST['day'];
                        $month=$_REQUEST['month'];
                        $year=$_REQUEST['year']; 
                        $day2=$_REQUEST['day2'];
                        $month2=$_REQUEST['month2'];
                        $year2=$_REQUEST['year2']; 

                           //$con.=" and customer_food_order.call_status_update_date BETWEEN  '$year-$month-$day' AND  '$year2-$month2-$day2'";  
                        $con.=" and indi_reservation_info.call_status_update_date BETWEEN  '$year-$month-$day' AND  '$year2-$month2-$day2'";  
                     }
                 }
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                //echo $start; exit;
                }
               $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.*,customer_info.*  
                                          FROM indi_reservation_info         
                                          INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                          LEFT JOIN customer_info ON indi_reservation_info.customer_id = customer_info.customer_id $con 
                                          ORDER BY indi_reservation_info.reservation_id DESC $limit_sql");                      
               return $query->result_array();
            }
            
            
            
            
            /*
            public function get_all_reservation($limit=false, $start=0, $perpage='')               
            { 
                //echo "faisal"; exit;
                $con = "where 1 "; 
                //echo $con; exit;
                 if ($_POST){
                    if ($_REQUEST['reservation_id']) { 
                           $con.=" and indi_reservation_info.reservation_id like '%{$_REQUEST['reservation_id']}%'";  
                     }
                    if ($_REQUEST['customer_name']) { 
                           $con.=" and customer_info.first_name like '%{$_REQUEST['customer_name']}%'"; 
                    }
                    if ($_REQUEST['restaurant_name']) { 
                           $con.=" and indi_res_info.res_name like '%{$_REQUEST['restaurant_name']}%'"; 
                    }
                 }
                $limit_sql='';
                if ($limit) {
                $limit_sql=" limit $start,$perpage"; 
                }
               $query = $this->db->query("SELECT indi_reservation_info.*,indi_res_info.res_name,indi_res_info.res_address,indi_res_info.res_id,customer_info.first_name,customer_info.last_name,customer_info.customer_id  
                                          FROM indi_reservation_info         
                                          INNER JOIN indi_res_info ON indi_reservation_info.restaurant_id = indi_res_info.res_id
                                          LEFT JOIN customer_info ON indi_reservation_info.customer_id = customer_info.customer_id $con 
                                          ORDER BY indi_reservation_info.reserve_submission_date DESC $limit_sql ");                      
               return $query->result_array();
            }
             
             */










        
        
}



