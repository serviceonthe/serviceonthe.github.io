<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_comparison_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }
    
    public function getAllCategories(){ 
        $q = $this->db->get('indi_catagories');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function  getItemsByCategoryId($category_id){
      
               $myQuery = "SELECT *
                    FROM indi_items
                    WHERE item_catagory_id = $category_id
                    GROUP BY item_id
                   ";
		   $q = $this->db->query($myQuery, false);
                    if($q->num_rows() > 0) {
                             foreach (($q->result()) as $row) {
                                     $data[] = $row;
                             }
                             return $data;
                     }
    }
    
    
    public function  search_restaurant($radius){  

        $postcode=$this->session->userdata('post_code');  
        $postcode = urldecode($postcode);
        $radius = urldecode($radius);
        $resData= $this->price_comparison_model->search_resdata($postcode);
        $jsonData=  json_decode($resData);
        
//        echo '<pre>';
//        print_r($jsonData);   
//        echo '</pre>';exit;
        
        $lati=$jsonData->results[0]->geometry->location->lat; 
        $lang=$jsonData->results[0]->geometry->location->lng;
         
        $sqlstring="SELECT *,( 3959 * acos( cos( radians($lati)) * cos(radians(latitude)) * cos(radians(longitude) - radians($lang)) + sin(radians($lati)) * sin(radians(latitude)))) AS distance FROM indi_res_info HAVING distance < $radius AND res_food_indian='indian' ORDER BY distance";

            $q = $this->db->query($sqlstring, false); 
            if ($q->num_rows() > 0) {
                return $q->result_array(); 
            } else {
                return 0;
            }
    }
    
    public function  getAllRestaurant($data,$allResId){ 
        
                $item_id=implode(",",$data['item_id']);  
                $selected_item_id=$item_id;
                //echo $item_id.'<br>'; 
                //echo $allResId; exit; 
                

               /* $myQuery = "SELECT indi_menu_restaurant_relation.*,indi_res_info.*, 
                            SUM(indi_menu_restaurant_relation.menu_restaurant_relation_price) AS total_price
                                
                            FROM indi_menu_restaurant_relation 
                            LEFT JOIN indi_res_info 
                            ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id 
                            WHERE indi_res_info.res_food_indian='indian'  
                            AND indi_menu_restaurant_relation.menu_restaurant_relation_menu_id IN ($item_id)
                            AND indi_res_info.res_id IN ($allResId) 
                            GROUP BY indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id
                            ORDER BY total_price ASC
                           ";  */
                
                  /*  $number_of_item_id=count($data['item_id']);   
                    $con='';
                    
                    for($i=0; $i<$number_of_item_id; $i++){
                           $item_id=$data['item_id'][$i];
                           $con.=" AND indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = $item_id";
                         }
                
                
                
                
                 $myQueryss = "SELECT indi_menu_restaurant_relation.*,indi_res_info.*, 
                            SUM(indi_menu_restaurant_relation.menu_restaurant_relation_price) AS total_price
                            FROM indi_menu_restaurant_relation 
                            LEFT JOIN indi_res_info 
                            ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id 
                            WHERE indi_menu_restaurant_relation.menu_restaurant_relation_menu_id IN ($item_id)
                            AND indi_res_info.res_id IN ($allResId) 
                            GROUP BY indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id
                            ORDER BY total_price ASC
                           ";  */ 
                 
                 $myQuery="SELECT
                            indi_menu_restaurant_relation.*,
                            indi_res_info.*, 
                            SUM(indi_menu_restaurant_relation.menu_restaurant_relation_price) AS total_price, 
                            count(*) as number_of_items 
                            FROM 
                            indi_menu_restaurant_relation 
                            LEFT JOIN indi_res_info 
                            ON 
                            indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id 
                            WHERE indi_menu_restaurant_relation.menu_restaurant_relation_menu_id IN ($selected_item_id) 
                            AND indi_res_info.res_id IN ($allResId) 
                            GROUP BY indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id 
                            ORDER BY total_price ASC";
                 
//                 echo $myQuery; exit; 
                
		    $q = $this->db->query($myQuery, false);
                    //var_dump($q->result_array());exit;
                    if ($q->num_rows() > 0) {
                        return $q->result_array(); 
                    } else {
                        return 0;
                    }
    }  
    
    public function getItemDataById($item_id) {

        $myQuery = "Select * from indi_items where item_id = $item_id";
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
    }   
    
    public function insertOrderData($data,$res_id,$total_price) {
        
       $customer_id=$this->session->userdata('customer_id');
       $customerInfo=$this->price_comparison_model->getCustomerInfoByID($customer_id);
    }
    
    public function getAllPostCode() {

        $myQuery = "SELECT res_id,res_post_code
                    FROM indi_res_info";
        
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return 0;
        }
    }
    
    public function update_indi_res_info($res_id,$postcode,$lati,$lang){
        
        	     $updateData = array(
                                'latitude' 	=> $lati,
                                'longitude' 	=> $lang 
			);

                        if($this->db->update('indi_res_info', $updateData, array('res_id' => $res_id,'res_post_code' => $postcode))){
                                return true;
                        } else {
                                return false;
                        }
    }
  
     
    public function search_resdata($res_post_code){
            $post_code = str_replace(" ", "", $res_post_code); 
            $url = "http://maps.googleapis.com/maps/api/geocode/json?&components=postal_code:$post_code&sensor=false";
            $data = @file_get_contents($url);
        return $data;  
    }
    
    public function getItemPriceForRestaurant($itemId,$res_id){
        
        
//        echo $itemId.'</br>';
//        echo $res_id; exit; 
//        print_r($data['item_id']).'</br>';
//        print_r($data['quantity']);exit;  
        
        $myQuery = "Select menu_restaurant_relation_price FROM indi_menu_restaurant_relation WHERE menu_restaurant_relation_restaurant_id = $res_id AND menu_restaurant_relation_menu_id=$itemId";
       //echo $myQuery;
        $q = $this->db->query($myQuery, false);
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return 0;
        }
  
    }
    
    public function getLatLon($postcode){
        
        $myQuery = "SELECT latitude,longitude
                    FROM indi_res_info
                    WHERE res_post_code = '$postcode'
                   ";
          $q = $this->db->query($myQuery, false);
            if($q->num_rows() > 0) {
                     foreach (($q->result()) as $row) {
                             $data[] = $row;
                     }
                     return $data;
             }
    }
    
}
?>
