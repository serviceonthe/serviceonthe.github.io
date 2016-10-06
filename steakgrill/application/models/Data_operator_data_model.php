<?php
	class Data_Operator_Data_Model extends CI_Model{
		/*function __construct(){
			parent::__construct()
		}*/
		// common insert query for normal insert
		function insert_data_to_database($table_name,$data){
			$this->db->insert($table_name,$data);
		}
        // common delete query for one data delete
        function delete_data($table_name,$res_id){
            $this->db->delete($table_name,array('res_id'=>$res_id));
        }
        function delete_signature_item_by_a_restaurent($table_name,$signature_item_id){
            $this->db->delete($table_name,array('signature_item_id'=>$signature_item_id));
        }
		// common fatch query for normal fatch from one table all data
		function fatch_all_data($table_name){
			$sql = "SELECT * FROM $table_name";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				 return $query->result_array();
			}
		}
        function fatch_all_data_by_user_email($table_name,$column_name){
            $sql="SELECT * FROM `$table_name` WHERE user_email='$column_name'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
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
            //echo $this->db->last_query(); exit;
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
		function restaurent_menu_setting_complate($data,$table_name){
			$this->db->insert($table_name,$data);
		}
		function is_valid_user($user_email,$user_password,$user_type){
			$sql = "SELECT * FROM  indi_users WHERE user_email= ? AND user_password = ? AND user_type= ? ";
			$query = $this->db->query($sql, array($user_email, $user_password, $user_type));
			if ($query->num_rows() > 0) {
				//$this->do_login($query->row_array());
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
        function menu_filter_by_category($catetgory_id,$table_name){
            $sql="SELECT * FROM $table_name WHERE item_catagory_id='$catetgory_id'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        function view_signature_item($column_value){
            $sql="SELECT * FROM `signature_item` WHERE res_name = '$column_value'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        /* function ajax_search($match){

            /*$query = $this->db->query("SELECT * FROM `indi_items` "
                . "LEFT JOIN indi_res_info ON indi_items.item_restaurant_id = indi_res_info.res_id "
                . "LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE item_name LIKE '$match%'");
            $result = $query->result();
            return $result;
            
            $res_id=$this->session->userdata('last_insert_id');

                $query = $this->db->query("SELECT indi_items.item_name,indi_items.item_id, indi_catagories.*,indi_menu_restaurant_relation.*
                    FROM  indi_items
                    LEFT OUTER JOIN indi_catagories
                    ON indi_items.item_catagory_id=indi_catagories.catagory_id
                    LEFT JOIN indi_menu_restaurant_relation
                    ON indi_items.item_id=indi_menu_restaurant_relation.menu_restaurant_relation_menu_id 
                    WHERE indi_items.item_name LIKE '$match%' AND
                    indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id=$res_id      
                    GROUP BY item_name   
                    "); 
 
            $result = $query->result();
            return $result;
        /*$this->db->or_like('item_name',$match);
        $this->db->or_like('category_name',$match);
        return $this->db->get('indi_items')->result();         
        }  */
        
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
        public function search_other_menu_by_a_restaurent($match,$last_insert_id) 
        {
              $res_id=$last_insert_id;
              echo $res_id; exit;
              
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

        
        //search an item
        public function search_item($value)
        {
            $query = $this->db->query("SELECT * FROM `indi_items` "
                . "LEFT JOIN indi_res_info ON indi_items.item_restaurant_id = indi_res_info.res_id "
                . "LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE item_name LIKE '$value%'");
            $result = $query->result();
            return $result;
        }



        // edit and update operation start hare

        function fetch_to_edit($table,$id,$table_id){
            return $this->db->get_where($table,array($table_id=>$id))->row_array();
        }
        function fetch_to_edit_by_a_restaurent($table,$id,$table_id){
            return $this->db->get_where($table,array($table_id=>$id))->row_array();
        }
        function update($id,$table_name,$data,$table_id){
            $this->db->where($table_id,$id);
            $this->db->update($table_name,$data);
        }


        function fatch_menu_management_by_list_restaurent($res_id){
           // $sql = "SELECT indi_items.*, indi_catagories.* FROM  indi_items INNER JOIN indi_catagories ON indi_items.item_catagory_id=indi_catagories.catagory_id";

            $sql = "SELECT indi_items.item_name,indi_items.item_id, indi_catagories.*,indi_menu_restaurant_relation.*
                    FROM  indi_items
                    LEFT OUTER JOIN indi_catagories
                    ON indi_items.item_catagory_id=indi_catagories.catagory_id
                    LEFT OUTER JOIN indi_menu_restaurant_relation
                    ON indi_items.item_id=indi_menu_restaurant_relation.menu_restaurant_relation_menu_id

                   WHERE indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id=$res_id";

            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }









        public function get_item_price($restaurant_id,$item_id)
        {
            $query = $this->db->query("SELECT * FROM indi_menu_restaurant_relation LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id LEFT JOIN indi_res_info ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id WHERE menu_restaurant_relation_restaurant_id = '$restaurant_id' AND menu_restaurant_relation_menu_id = '$item_id'");
            $result = $query->result();
            return $result;
        }



        public function get_a_restaurant($last_insert_id)  
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
        
        
        
        
        public function delete_menu_for_restaurant($restaurant_id,$item_id,$staus)
        {
            $query = $this->db->query("UPDATE indi_menu_restaurant_relation SET menu_restaurant_relation_status = '$staus' WHERE menu_restaurant_relation_restaurant_id = '$restaurant_id' AND menu_restaurant_relation_menu_id = '$item_id'");
            return $query;
        }

        public function get_months_for_history($restaurant_id)
        {
            $query = $this->db->query("SELECT * FROM indi_invoice"
                . " LEFT JOIN indi_reservation_info ON indi_invoice.invoice_id = indi_reservation_info.reservation_invoice_id"
                . " LEFT JOIN indi_sell ON indi_invoice.invoice_id = indi_sell.sell_invoice_id"
                . " WHERE indi_invoice.invoice_restaurant_id = '$restaurant_id'"
                . " GROUP BY MONTH(indi_invoice.invoice_time)");
            $result = $query->result();
            return $result;
        }


        public function get_menu_as_catagory_for_restaurant($restaurant_id,$catagory_id)
        {
            $result = array();
            $query_item = $this->db->query("SELECT item_id,item_catagory_id FROM indi_items WHERE item_catagory_id = '$catagory_id'");
            $result_item_ids = $query_item->result();

            foreach($result_item_ids as $result_item_id)
            {
                $query = $this->db->query("SELECT *,GROUP_CONCAT(indi_alergies.alergy_name) AS alrgy_nams,GROUP_CONCAT(indi_alergies.alergy_photo) AS alrgy_images FROM indi_menu_restaurant_relation "
                    . "LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id "
                    . "LEFT JOIN indi_item_alergy_relation ON indi_item_alergy_relation.item_alergy_relation_item_id = indi_items.item_id "
                    . "LEFT JOIN indi_alergies ON indi_alergies.alergy_id = indi_item_alergy_relation.item_alergy_relation_alergy_id "
                    . "WHERE menu_restaurant_relation_restaurant_id = '$restaurant_id' AND menu_restaurant_relation_menu_id = '$result_item_id->item_id' GROUP BY indi_items.item_id");
                if($query->result())
                {
                    foreach ($query->result() as $value)
                    {
                        $result[] = $value;
                    }
                }
            }
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



        public function delete_item_form_restaurant($restaurant_id,$item_id)
        {
            $query = $this->db->query("DELETE FROM indi_menu_restaurant_relation WHERE menu_restaurant_relation_restaurant_id = '$restaurant_id' AND menu_restaurant_relation_menu_id='$item_id'");
            return $query;
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
        
        public function get_menuDataAll($restaurant_id = null)
        {
            $sql = "SELECT a.*, b.*, c.menu_restaurant_relation_price AS ctable_menu_restaurant_relation_price, d.*  FROM indi_items As a "
                . "LEFT JOIN indi_catagories AS b ON a.item_catagory_id = b.catagory_id "
                . "LEFT JOIN indi_menu_restaurant_relation AS c ON a.item_id = c.menu_restaurant_relation_menu_id "
                . "LEFT JOIN indi_res_info AS d ON a.item_restaurant_id = d.res_id";
            if($restaurant_id)
            {
                $sql .= " WHERE a.item_restaurant_id= ".(int)$restaurant_id;
            }

            $sql .= " GROUP BY a.item_id";
            
            $query = $this->db->query($sql);
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
        
        
        public function select_menus($restaurant_id, $cat_id) 
        {	
        $query = $this->db->query("SELECT *,GROUP_CONCAT(indi_alergies.alergy_name) AS alrgy_nams,GROUP_CONCAT(indi_alergies.alergy_photo) AS alrgy_images FROM indi_menu_restaurant_relation LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id LEFT JOIN indi_item_alergy_relation ON indi_items.item_id = indi_item_alergy_relation.item_alergy_relation_item_id LEFT JOIN indi_alergies ON indi_alergies.alergy_id = indi_item_alergy_relation.item_alergy_relation_alergy_id WHERE menu_restaurant_relation_restaurant_id='$restaurant_id' AND item_catagory_id='$cat_id' GROUP BY indi_items.item_id");        
        $result = $query->result();
        return $result;  
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
       
     
    }

