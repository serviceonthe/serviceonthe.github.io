<?php

function get_distance($lat1,$lat2,$lon1,$lon2,$unit) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);
    if ($unit == "K") {
        $Kilo = $miles * 1.609344;
    } else if ($unit == "N") {
        $Notical = $miles * 0.8684;
    } else {
        $miles;
    }
    
    return $Kilo;
}

function percent($percentage, $totalWidth) {
    $result = ($percentage / 100) * $totalWidth;
    return $result;
}

function get_total_price($res_id,$items){
    $ci=& get_instance();
    $ci->load->database(); 
    
    
    $item_id='';
    $last_key = end(array_keys($items));
    foreach ($items as $key=>$value){
        if($key==$last_key){
            $item_id.=$key;
        }else{
           $item_id.=$key.','; 
        }        
    }
    $sql = "SELECT  menu_restaurant_relation_menu_id as item_id,menu_restaurant_relation_price as price FROM indi_menu_restaurant_relation WHERE menu_restaurant_relation_restaurant_id=$res_id and menu_restaurant_relation_menu_id in($item_id)";
    $q=$ci->db->query($sql, false);
    $result=$q->result_array();
    $totalPrice=0;
    foreach($result as $key=>$row){
        $totalPrice=$totalPrice+$row['price']*$items[$row['item_id']];
    }
    
    return $totalPrice;
}

function get_single_item_price($resId,$itemId,$quantity)
{
    $ci=& get_instance();
    $ci->load->database(); 

    $sql = "SELECT menu_restaurant_relation_price as price FROM indi_menu_restaurant_relation WHERE menu_restaurant_relation_restaurant_id=$resId AND menu_restaurant_relation_menu_id=$itemId";
    $q=$ci->db->query($sql, false);
    $result=$q->row_array();

    $totalPrice=$result['price']*$quantity;

    return  $totalPrice ;

}

function get_customer_info($id){
    $ci=& get_instance();
    $ci->load->database(); 

    $sql = "SELECT * FROM customer_info WHERE customer_id=".$id;
    $q=$ci->db->query($sql, false);
    $result=$q->row();

    return  $result ;   
}

function field_in_array($field_name, $field_value, $array, $output_field){

    $r='';
    foreach ($array as $key => $value) {
        if($value[$field_name]==$field_value){
            $r=$value[$output_field];
        }
    }

    return $r; 

}


function getAllertyData($value){
    $ci=& get_instance();
    $ci->load->database(); 
    $sql = "SELECT * FROM allergy WHERE id=$value";
    $q=$ci->db->query($sql, false);
    $result=$q->row();
    return  $result; 
}


function get_yelp(){
			echo '<link rel="stylesheet" href="http://s3-media1.fl.yelpcdn.com/assets/2/www/css/12cd7cb7fd34/biz_details-pkg.css">
                  <link rel="stylesheet" href="http://s3-media4.fl.yelpcdn.com/assets/2/www/css/7fdee9382906/www-pkg.css">';
            require_once(APPPATH.'libraries/function.php');
            $html = file_get_html('http://www.yelp.com/biz/radhuni-high-wycombe');
            $headsec = $html->find('div[class=biz-page-header-left]', 0);
            echo $headsec;
            
            
            echo '<a href="https://www.yelp.com/writeareview/biz/QzcxJ6cWrEa1qWD0jiYpSA?return_url=%2Fbiz%2FQzcxJ6cWrEa1qWD0jiYpSA" class="btn bootpopup" title="Write a Review for Radhuni" target="popupModal2">Write a Review</a>';

            $elem = $html->find('div[class=review-list]', 0);
            echo $elem; 
}

function no_review(){
    require_once(APPPATH.'libraries/function.php');
    echo "<h1>Nawab's Kitchen have no reviews on Yelp.</h1>";
    
}

function getSubItem($value){
    $ci=& get_instance();
    $ci->load->database(); 
    $sql = "SELECT * FROM indi_items WHERE parent_item_id=$value";
    $q=$ci->db->query($sql, false);
    $result=$q->result();
    return  $result; 
} 



function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
    $interval = date_diff($datetime1, $datetime2);
    
    if($interval->format('%y')){
        return $interval->format('%y Year');
    }elseif($interval->format('%m')){
        return $interval->format('%m Month');
    }elseif($interval->format('%d')){
        return $interval->format('%d Day');
    }elseif($interval->format('%h')){
        return $interval->format('%h Hours');
    }elseif($interval->format('%i')){
        return $interval->format('%i Minutes');
    }else{
        return $interval->format('%s Seconds'); 
    }
}


