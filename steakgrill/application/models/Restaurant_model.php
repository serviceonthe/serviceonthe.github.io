<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Restaurant_Model extends CI_Model {

    public function __construct() {
        // Call the Model constructor
        parent::__construct();
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


//get latest 4 restuarant by post code or last added according to date
 
	function list_restaurant(){
        @$myCookie =  $_COOKIE["yourpostcode"];
        if (isset($myCookie)) {
            $query = $this->db->query("SELECT iri.entry_date, iri.res_name, iri.res_post_code, iri.res_short_desc, igi.url  
            FROM `indi_res_info` AS iri 
            INNER JOIN `indi_gallery_image` AS igi ON iri.res_id = igi.res_id
            WHERE igi.title = 'logo' AND iri.res_post_code = '$myCookie'
            ORDER BY iri.entry_date ASC LIMIT 15 ");
        }
        else{
            $query = $this->db->query("SELECT iri.entry_date, iri.res_name, iri.res_post_code, iri.res_short_desc, igi.url  
            FROM `indi_res_info` AS iri 
            INNER JOIN `indi_gallery_image` AS igi ON iri.res_id = igi.res_id
            WHERE igi.title = 'logo'
            ORDER BY iri.entry_date ASC LIMIT 15"); 
        }
		
        $result = $query->result();
        return $result;
	}
    //show Most popular Curry recipe by item_hits
    function curry_recipe(){
        $query = $this->db->query("SELECT * FROM indi_items ORDER BY item_id ASC LIMIT 1" );
        $result = $query->result();
        //echo $result; exit;
        return $result;
        
    }
	
	 function curry_recipe_second(){
        $query = $this->db->query("SELECT * FROM indi_items ORDER BY item_id ASC LIMIT 9" );
        $result = $query->result();
        //echo $result; exit;
        return $result;
        
    }
        //latest cuisine //rjs
        function latest_cuisine(){
        $query = $this->db->query("SELECT * FROM indi_items AS ii 
                ORDER BY ii.item_hits DESC LIMIT 10 " );
        $result = $query->result();
        return $result;
    }
        //show Most popular dishes by item_order_times / rjs
    function list_popular_dishes(){
        $query = $this->db->query("SELECT * FROM indi_items AS ii 
            ORDER BY ii.item_order_times DESC LIMIT 10  " );

        $result = $query->result();
        return $result;
    }
            //show Most popular dishes by item_order_times// rjs
    function list_popular_dishes1(){
        $query = $this->db->query("SELECT * FROM indi_items AS ii 
            ORDER BY ii.item_order_times DESC LIMIT 4  " );

        $result = $query->result();
        return $result;
    }
    function company_menu_details($menu_id){
             $query = $this->db->query("select indi_chef_menu.*, indi_page_contain.* 
                from indi_chef_menu 
                INNER JOIN  indi_page_contain
                ON indi_chef_menu.menu_id=indi_page_contain.page_id
                where indi_chef_menu.menu_id=$menu_id");
            //$query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE item_restaurant_id = '$restaurant_id'");
            $result = $query->result();
            return $result;
               
                
    }
    function company_menu() {
        $query = $this->db->query("select * from indi_chef_menu where menu_position='f1' ORDER BY `indi_chef_menu`.`menu_id` DESC LIMIT 10");
        $result = $query->result();
        if (count($result) > 0) {

            return $result;
      }
    }
    function city_menu() {
        $query = $this->db->query("select *from indi_chef_menu where menu_position='f2'");
        $result = $query->result();
        if (count($result) > 0) {

            return $result;
      }
    }
     function faq_menu() {
        $query = $this->db->query("select *from indi_chef_menu where menu_position='f3'");
        $result = $query->result();
        if (count($result) > 0) {

            return $result;
      }
    }
    
      function apps_menu() {
        $query = $this->db->query("select *from indi_chef_menu where menu_position='f4'");
        $result = $query->result();
        if (count($result) > 0) {

            return $result;
      }
    }
    //insert restaurant information data in indi_res_info//rjs
    function overview() {
        $query = $this->db->query("select *from indi_page_contain where category_id='10'");
        $result = $query->result();
        if (count($result) > 0) {

            return $result;
      }else{echo "you have no content in your db for overview "; die();}
    }
    public function add_video($title,$url,$status,$thumb)
    {
        $query = $this->db->query("INSERT INTO `indi_video` (`name`,`url`,`status`,`thumb`)VALUES ('$title','$url','$status','$thumb')");
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        } 
    }
      function indi_video() {
        $query = $this->db->query("select *from indi_video");
        $result = $query->result();
        if (count($result) > 0) {

            return $result;
      }
    }
    public function save_contact($name,$email,$subject,$message,$res_id)
    {
        $result = $this->db->query("INSERT INTO `indi_res_contact` (`name`,`mail`,`subject`,`message`,`res_id`)VALUES ('$name','$email','$subject','$message','$res_id')");
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        } 
    }

    public function add_res_info( $res_name, $res_address, $res_post_code, $res_email, $res_contact_number, $res_fax_number, $res_telephone1, $res_telephone2, $res_telephone3, $res_manager_name, $res_short_desc, $res_service_area, $res_delivery_radius, $res_food_halal, $res_food_indian, $res_food_pakistan, $res_food_bangladeshi, $res_food_vegetarian, $res_owner_name, $res_owner_email, $res_owner_mobile, $res_bank_name, $res_account_name, $res_account_number, $res_sort_code, $res_commission_food, $res_commission_person, $res_meta_keyword, $res_meta_desc, $res_page_title, $res_long_desc, $food_delivery, $food_collection, $food_dinning, $delivery_offer, $collection_offer, $dinning_offer, $delivery_min_time, $collection_min_time, $minimum_order, $delivery_start, $delivery_end, $collection_start, $collection_end, $delivery_charge, $restaurant_images,$online_order,$telephone_order,$trip_id,$trip_url) {
        $user_type = 3;
        $user_status = 1;
        $this->db->query("INSERT INTO `indi_users` (`user_email`,`user_password`,`user_type`,`user_status`) VALUES ('$res_owner_email',md5(md5('$res_owner_mobile')),'$user_type','$user_status')");
        $owner_id = $this->db->insert_id();
        //query for data insert //rjs
        $result = $this->db->query("INSERT INTO `indi_res_info`(`res_name`,`res_owner_id`,`res_address`,`res_post_code`,`res_email`,`res_contact_number`,`res_fax_number`,`res_telephone1`,`res_telephone2`,`res_telephone3`,`res_manager_name`,`res_short_desc`,`res_service_area`,`res_delivery_radius`,`res_food_halal`,`res_food_indian`,`res_food_pakistan`,`res_food_bangladeshi`,`res_food_vegetarian`,`res_owner_name`,`res_owner_email`,`res_owner_mobile`,`res_bank_name`,`res_account_name`,`res_account_number`,`res_sort_code`,`res_commission_food`,`res_commission_person`,`res_meta_keyword`,`res_meta_desc`,`res_page_title`,`res_long_desc`,`food_delivery`,`food_collection`,`food_dinning`,`delivery_offer`,`collection_offer`,`dinning_offer`,`delivery_min_time`,`collection_min_time`,`minimum_order`,`delivery_start`,`delivery_end`,`collection_start`,`collection_end`,`delivery_charge`,`locationid`,`urltrip`,`telephone_order`,`online_order`)
             VALUES ('$res_name','$owner_id','$res_address','$res_post_code','$res_email','$res_contact_number','$res_fax_number','$res_telephone1','$res_telephone2','$res_telephone3','$res_manager_name','$res_short_desc','$res_service_area','$res_delivery_radius','$res_food_halal','$res_food_indian','$res_food_pakistan','$res_food_bangladeshi','$res_food_vegetarian','$res_owner_name','$res_owner_email','$res_owner_mobile','$res_bank_name','$res_account_name','$res_account_number','$res_sort_code','$res_commission_food','$res_commission_person','$res_meta_keyword','$res_meta_desc','$res_page_title','$res_long_desc','$food_delivery','$food_collection','$food_dinning','$delivery_offer','$collection_offer','$dinning_offer','$delivery_min_time','$collection_min_time','$minimum_order','$delivery_start','$delivery_end','$collection_start','$collection_end','$delivery_charge','$trip_id','$trip_url','$telephone_order','$online_order')");
        $restaurant_id = $this->db->insert_id();
        if ($result) {
            return $restaurant_id;
        } else {
            return false;
        }
    }
    //update restaurat information
    public function update_res_info( $res_id,$res_name, $res_address, $res_post_code, $res_email, $res_contact_number, $res_fax_number, $res_telephone1, $res_telephone2, $res_telephone3, $res_manager_name, $res_short_desc, $res_service_area, $res_delivery_radius, $res_food_halal, $res_food_indian, $res_food_pakistan, $res_food_bangladeshi, $res_food_vegetarian, $res_owner_name, $res_owner_email, $res_owner_mobile, $res_bank_name, $res_account_name, $res_account_number, $res_sort_code, $res_commission_food, $res_commission_person, $res_meta_keyword, $res_meta_desc, $res_page_title, $res_long_desc, $food_delivery, $food_collection, $food_dinning, $delivery_offer, $collection_offer, $dinning_offer, $delivery_min_time, $collection_min_time, $minimum_order, $delivery_start, $delivery_end, $collection_start, $collection_end, $delivery_charge, $restaurant_images,$online_order,$telephone_order,$trip_id,$trip_url) {
        $result = $this->db->query("UPDATE `indi_res_info` SET `res_name`='$res_name',`res_address`='$res_address',`res_post_code`='$res_post_code',`res_email`='$res_email',`res_contact_number`='$res_contact_number',`res_fax_number`='$res_fax_number',`res_telephone1`='$res_telephone1',`res_telephone2`='$res_telephone2',`res_telephone3`='$res_telephone3',`res_manager_name`='$res_manager_name',`res_short_desc`='$res_short_desc',`res_service_area`='$res_service_area',`res_delivery_radius`='$res_delivery_radius',`res_food_halal`='$res_food_halal',`res_food_indian`='$res_food_indian',`res_food_pakistan`='$res_food_pakistan',`res_food_bangladeshi`='$res_food_bangladeshi',`res_food_vegetarian`='$res_food_vegetarian',`res_owner_name`='$res_owner_name',`res_owner_email`='$res_owner_email',`res_owner_mobile`='$res_owner_mobile',`res_bank_name`='$res_bank_name',`res_account_name`='$res_account_name',`res_account_number`='$res_account_number',`res_sort_code`='$res_sort_code',`res_commission_food`='$res_commission_food',`res_commission_person`='$res_commission_person',`res_meta_keyword`='$res_meta_keyword',`res_meta_desc`='$res_meta_desc',`res_page_title`='$res_page_title',`res_long_desc`='$res_long_desc',`food_delivery`='$food_delivery',`food_collection`='$food_collection',`food_dinning`='$food_dinning',`delivery_offer`='$delivery_offer',`collection_offer`='$collection_offer',`dinning_offer`='$dinning_offer',`delivery_min_time`='$delivery_min_time',`collection_min_time`='$collection_min_time',`minimum_order`='$minimum_order',`delivery_start`='$delivery_start',`delivery_end`='$delivery_end',`collection_start`='$collection_start',`collection_end`='$collection_end',`delivery_charge`='$delivery_charge',`locationid`='$trip_id',`urltrip`='$trip_url',`telephone_order`='$telephone_order',`online_order`='$online_order' where `res_id`='$res_id' ");
        $restaurant_id = $this->db->insert_id();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    //update restaurat information

      public function add_reservation_info($res_id,$f_name,$l_name,$email,$mobile,$phone,$visiting,$reservation_type,$dining_type,$r_time,$people,$captcha,$agree,$requirements,$reserve_requested_date)
 {
 

 $customer_id=$this->session->userdata('customer_id');
  
   $array = array(
     'restaurant_id' => $res_id,        
     'customer_id' => $customer_id,   
     'f_name' => $f_name, 
     'l_name' => $l_name, 
     'email' => $email, 
     'mobile' => $mobile,  
     'phone' => $phone, 
           'visiting_status' => $visiting, 
           'reservation_type' => $reservation_type,    
           'dining_type' => $dining_type, 
           'requirements' => $requirements,        
           'r_time' => $r_time,
           'people' => $people,      
           'captcha' => $captcha,  
           'reserve_requested_date' => $reserve_requested_date,        
     'agree' => $agree);                 
     
           $result=$this->db->insert("indi_reservation_info", $array);  
  
        if ($result) {         
            return TRUE; 
        } else {
            return FALSE;
        }
    }

    //add restaurant feature infomation by rjs

    public function add_feature_info($res_id, $car_parking, $air, $access, $live_music, $bar, $event, $romantic_dinner, $smoking, $party_booking, $service, $atmosphere, $buffet, $day_buffet, $olive_oil, $notice, $breakfast, $lunch, $dinner) {
        //query for data insert //rjs

        $result = $this->db->query("INSERT INTO `indi_feature_info` 
             (`res_id`,`car_parking`,`air`,`access`,`live_music`,`bar`,`event`,`romantic_dinner`,`smoking`,`party_booking`,`service`,`atmosphere`,`buffet`,`day_buffet`,`olive_oil`,`notice`,`breakfast`,`lunch`,`dinner`)
             VALUES ('$res_id','$car_parking','$air','$access','$live_music','$bar','$event','$romantic_dinner','$smoking','$party_booking','$service','$atmosphere','$buffet','$day_buffet','$olive_oil','$notice','$breakfast','$lunch','$dinner')");


        if ($result) {
            return TRUE;
        } else {
            return false;
        }
    }

    public function show_feature_info($res_id) {
        $query = $this->db->query("Select *From indi_feature_info where res_id='$res_id' LIMIT 1");
        $result = $query->result();
        if (count($result) == 1) {

            return $result;
        }
    }

//add restaurant business hour

    public function add_business_hour($res_id, $sat_status, $sun_status, $mon_status, $tue_status, $wed_status, $thus_status, $fri_status, $sat_from1, $sat_from2, $sat_to1, $sat_to2, $sun_from1, $sun_from2, $sun_to1, $sun_to2, $mon_from1, $mon_from2, $mon_to1, $mon_to2, $tue_from1, $tue_from2, $tue_to1, $tue_to2, $wed_from1, $wed_from2, $wed_to1, $wed_to2, $thus_from1, $thus_from2, $thus_to1, $thus_to2, $fri_from1, $fri_from2, $fri_to1, $fri_to2, $first_shift, $second_shift, $owner_email_status, $telephone_reminder, $order_recieving_fax, $order_recieving_mail) {


        $result = $this->db->query("INSERT INTO `indi_res_business_hour`(`res_id`,`sat_status`,`sun_status`,`mon_status`,`tue_status`,`wed_status`,`thus_status`,`fri_status`,`sat_from1`,`sat_from2`,`sat_to1`,`sat_to2`,`sun_from1`,`sun_from2`,`sun_to1`,`sun_to2`,`mon_from1`,`mon_from2`,`mon_to1`,`mon_to2`,`tue_from1`,`tue_from2`,`tue_to1`,`tue_to2`,`wed_from1`,`wed_from2`,`wed_to1`,`wed_to2`,`thus_from1`,`thus_from2`,`thus_to1`,`thus_to2`,`fri_from1`,`fri_from2`,`fri_to1`,`fri_to2`,`first_shift`,`second_shift`,`owner_email_status`,`telephone_reminder`,`order_recieving_fax`,`order_recieving_mail`)
                                                              VALUES('$res_id','$sat_status','$sun_status','$mon_status','$tue_status','$wed_status','$thus_status','$fri_status','$sat_from1','$sat_from2','$sat_to1','$sat_to2','$sun_from1','$sun_from2','$sun_to1','$sun_to2','$mon_from1','$mon_from2','$mon_to1','$mon_to2','$tue_from1','$tue_from2','$tue_to1','$tue_to2','$wed_from1','$wed_from2','$wed_to1','$wed_to2','$thus_from1','$thus_from2','$thus_to1','$thus_to2','$fri_from1','$fri_from2','$fri_to1','$fri_to2','$first_shift','$second_shift','$owner_email_status','$telephone_reminder','$order_recieving_fax','$order_recieving_mail')");

        if ($result) {
            return TRUE;
        } else {

            return false;
        }
    }
//update restaurant business hour

    public function update_business_hour($res_id, $sat_status, $sun_status, $mon_status, $tue_status, $wed_status, $thus_status, $fri_status, $sat_from1, $sat_from2, $sat_to1, $sat_to2, $sun_from1, $sun_from2, $sun_to1, $sun_to2, $mon_from1, $mon_from2, $mon_to1, $mon_to2, $tue_from1, $tue_from2, $tue_to1, $tue_to2, $wed_from1, $wed_from2, $wed_to1, $wed_to2, $thus_from1, $thus_from2, $thus_to1, $thus_to2, $fri_from1, $fri_from2, $fri_to1, $fri_to2, $first_shift, $second_shift, $owner_email_status, $telephone_reminder, $order_recieving_fax, $order_recieving_mail) {
        $result = $this->db->query("UPDATE `indi_res_business_hour` SET `sat_status`='$sat_status',`sun_status`='$sun_status',`mon_status`='$mon_status',`tue_status`='$tue_status',`wed_status`='$wed_status',`thus_status`='$thus_status',`fri_status`='$fri_status',`sat_from1`='$sat_from1',`sat_from2`='$sat_from2',`sat_to1`='$sat_to1',`sat_to2`='$sat_to2',`sun_from1`='$sun_from1',`sun_from2`='$sun_from2',`sun_to1`='$sun_to1',`sun_to2`='$sun_to2',`mon_from1`='$mon_from1',`mon_from2`='$mon_from2',`mon_to1`='$mon_to1',`mon_to2`='$mon_to2',`tue_from1`='$tue_from1',`tue_from2`='$tue_from2',`tue_to1`='$tue_to1',`tue_to2`='$tue_to2',`wed_from1`='$wed_from1',`wed_from2`='$wed_from2',`wed_to1`='$wed_to1',`wed_to2`='$wed_to2',`thus_from1`='$thus_from1',`thus_from2`='$thus_from2',`thus_to1`='$thus_to1',`thus_to2`='$thus_to2',`fri_from1`='$fri_from1',`fri_from2`='$fri_from2',`fri_to1`='$fri_to1',`fri_to2`='$fri_to2',`first_shift`='$first_shift',`second_shift`='$second_shift',`owner_email_status`='$owner_email_status',`telephone_reminder`='$telephone_reminder',`order_recieving_fax`='$order_recieving_fax',`order_recieving_mail`='$order_recieving_mail' where res_id=$res_id");
        if ($result) {
            return TRUE;
        } else {

            return false;
        }
    }
    //update restaurant business hour
    public function gallery_info($res_id) {
        $query = $this->db->query("Select * From indi_gallery_image  where res_id = '$res_id' AND `title`!='logo';");
        $result = $query->result();
        if (count($result) > 0) {
            return $result;
        }
    }
    public function res_pic($res_id)
    {
        $query = $this->db->query("Select * From indi_gallery_image  where res_id = '$res_id' AND `title`='logo';");
        $result = $query->result();
        if (count($result) > 0) {
            return $result;
        }  
    }

    public function front_info($res_id) {
        $query = $this->db->query("Select *From indi_res_info where res_id='$res_id' LIMIT 1");
        $result = $query->result();
        if (count($result) == 1) {

            return $result;
        }
    }

    public function business_hour($res_id) {
        $query = $this->db->query("Select *From indi_res_business_hour where res_id='$res_id' LIMIT 1");
        $result = $query->result();
        if (count($result) == 1) {

            return $result;
        }
    }

    public function add_item($item_name, $item_ingredient, $item_types, $video_url, $catagory_name, $photo_name, $page_title, $item_meta_description, $item_meta_keyword, $item_short_description, $item_long_description, $alergies, $cooking_method) {
        $result = $this->db->query("INSERT INTO `indi_items` (`item_name`,`item_indegrediant`,`item_video_url`,`item_catagory_id`,`item_photo`,`item_page_title`,`item_meta_description`,`item_meta_keyword`,`item_short_description`,`item_long_description`,`item_cooking_method`) VALUES ('$item_name','$item_ingredient','$video_url','$catagory_name','$photo_name','$page_title','$item_meta_description','$item_meta_keyword','$item_short_description','$item_long_description','$cooking_method')");
        $menu_id = $this->db->insert_id();


        foreach ($alergies as $alergy) {
            $this->db->query("INSERT INTO `indi_item_alergy_relation` (`item_alergy_relation_item_id`,`item_alergy_relation_alergy_id`) VALUES ('$menu_id','$alergy')");
        }

        foreach ($item_types as $item_type) {
            $this->db->query("INSERT INTO `indi_menu_item_type_relation` (`menu_item_type_relation_menu_id`,`menu_item_type_relation_menu_type_id`) VALUES ('$menu_id','$item_type')");
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_hits($menu_name) {
        $query = $this->db->query("SELECT item_hits FROM indi_items WHERE item_name='$menu_name'");
        $result = $query->result();
        return $result;
    }

    public function set_hit($hit, $menu_name) {
        $result = $this->db->query("UPDATE `indi_items` SET item_hits ='$hit' WHERE item_name ='$menu_name'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function add_catagory($catagory_name) {
        $result = $this->db->query("INSERT INTO `indi_catagories` (`catagory_name`) VALUES ('$catagory_name')");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_cats() {
        $query = $this->db->query("SELECT * FROM indi_catagories WHERE catagory_status = 1");
        $result = $query->result();
        return $result;
    }

    public function get_menus() {
        //$query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id LEFT JOIN indi_menu_types ON indi_items.item_type = indi_menu_types.menu_type_id");
        $query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id");

        $result = $query->result();
        return $result;
    }

    public function get_alergy() {
        $query = $this->db->query("SELECT * FROM indi_alergies WHERE alergy_status = 1");
        $result = $query->result();
        return $result;
    }

    public function add_alergy($alergy_name, $alergy_photo) {
        $result = $this->db->query("INSERT INTO `indi_alergies` (`alergy_name`,`alergy_photo`) VALUES ('$alergy_name','$alergy_photo')");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_a_menu($menu_name) {
        $query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE indi_items.item_name = '$menu_name'");
        $result = $query->result();
        return $result;
    }

    public function get_a_menu_by_id($menu_id) {
        $query = $this->db->query("SELECT * FROM indi_items LEFT JOIN indi_catagories ON indi_items.item_catagory_id = indi_catagories.catagory_id WHERE indi_items.item_id = '$menu_id'");
        $result = $query->result();
        return $result;
    }

    public function get_menu_types() {
        $query = $this->db->query("SELECT * FROM indi_menu_types");
        $result = $query->result();
        return $result;
    }

    public function add_menu_type($menu_type) {
        $result = $this->db->query("INSERT INTO `indi_menu_types` (`menu_type_name`) VALUES ('$menu_type')");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_id_of_a_menu($menu_name) {
        $query = $this->db->query("SELECT item_id FROM indi_items WHERE item_name ='$menu_name'");
        $result = $query->result();
        return $result[0]->item_id;
    }

    public function get_alergy_for_a_menu($menu_id) {
        $query = $this->db->query("SELECT * FROM indi_item_alergy_relation LEFT JOIN indi_alergies ON indi_item_alergy_relation.item_alergy_relation_alergy_id  = indi_alergies.alergy_id WHERE indi_item_alergy_relation.item_alergy_relation_item_id = '$menu_id'");
        $result = $query->result();
        return $result;
    }

    public function get_menu_types_for_a_menu($menu_id) {
        $query = $this->db->query("SELECT * FROM indi_menu_item_type_relation  WHERE indi_menu_item_type_relation.menu_item_type_relation_menu_id = '$menu_id'");
        $results = $query->result();
        //return $results;
        $meny_type_ids = array();
        foreach ($results as $result) {
            $meny_type_ids[] = $result->menu_item_type_relation_menu_type_id;
        }
        return $meny_type_ids;
    }

    public function edit_item($menu_id, $item_ingredient, $item_types, $video_url, $catagory_name, $page_title, $item_meta_description, $item_meta_keyword, $item_short_description, $item_long_description, $alergies, $cooking_method, $date_time) {
        $result = $this->db->query("UPDATE `indi_items` SET `item_indegrediant` = '$item_ingredient',`item_video_url` = '$video_url',`item_catagory_id` = '$catagory_name',`item_page_title` = '$page_title',`item_meta_description` = '$item_meta_description',`item_meta_keyword` = '$item_meta_keyword',`item_short_description` = '$item_short_description',`item_long_description` = '$item_long_description',`item_cooking_method` = '$cooking_method',`item_modified_date` = '$date_time' WHERE item_id = '$menu_id'");

        $menu_id = $this->db->insert_id();


        foreach ($alergies as $alergy) {
            $this->db->query("UPDATE `indi_item_alergy_relation` SET `item_alergy_relation_alergy_id` = '$alergy' WHERE item_alergy_relation_item_id = '$menu_id'");
        }

        foreach ($item_types as $item_type) {
            $this->db->query("UPDATE `indi_menu_item_type_relation` SET `menu_item_type_relation_menu_type_id` = '$item_type' WHERE menu_item_type_relation_menu_id = '$menu_id'");
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function get_restaurants() {
        $query = $this->db->query("SELECT restaurant_id,restaurant_name FROM indi_restaurants");
        $result = $query->result();
        return $result;
    }

    public function get_a_restaurant($restaurant_id) {
        $query = $this->db->query("SELECT * FROM indi_restaurants WHERE restaurant_id='$restaurant_id'");
        $result = $query->result();
        return $result;
    }

    public function menu_details($menu_id) {
        //$query = $this->db->query("SELECT * FROM indi_menu_restaurant_relation LEFT JOIN indi_items ON indi_menu_restaurant_relation.menu_restaurant_relation_menu_id = indi_items.item_id WHERE menu_restaurant_relation_restaurant_id='$restaurant_id'");
        $query = $this->db->query("SELECT * FROM indi_items where `item_id`='$menu_id' LIMIT 1");
        $result = $query->result();
        return $result;
    }

    public function add_price($restaurant_id, $price, $menu_id) {
        $query = $this->db->query("SELECT `restaurant_menu_relation_restaurant_id`,`restaurant_menu_relation_menu_id` FROM indi_restaurant_menu_relation WHERE `restaurant_menu_relation_restaurant_id` = '$restaurant_id' AND `restaurant_menu_relation_menu_id` = '$menu_id'");
        $result = $query->result();
        if ($result) {
            $value = $this->db->query("UPDATE indi_restaurant_menu_relation SET `restaurant_menu_relation_price` = '$price' WHERE `restaurant_menu_relation_restaurant_id` = '$restaurant_id' AND `restaurant_menu_relation_menu_id` = '$menu_id'");
            if ($value) {
                return true;
            } else {
                return false;
            }
        } else {
            $value = $this->db->query("INSERT INTO `indi_restaurant_menu_relation` (`restaurant_menu_relation_restaurant_id`,`restaurant_menu_relation_menu_id`,`restaurant_menu_relation_price`) VALUES ('$restaurant_id','$menu_id','$price')");
            if ($value) {
                return true;
            } else {
                return false;
            }
        }
    }

//restaurant radius serch code by rjs
   public function res_search_old($postcode, $radius) {  
        
       
       
       
        $postcode = urldecode($postcode);
        $radius = urldecode($radius);
        
        $sqlstring = "SELECT `longitude`, `latitude` FROM `postcode` WHERE `postcode` LIKE '" . $postcode . "%' LIMIT 1";
        
        $result = mysql_query($sqlstring);
        $row = mysql_fetch_assoc($result);
        $lon = $row["longitude"];
        $lat = $row["latitude"];
        //$limitation=10;
        $sql = 'SELECT distinct(postcode) FROM postcode  WHERE (3958*3.1415926*sqrt((Latitude-' . $lat . ')*(Latitude-' . $lat . ') + cos(Latitude/57.29578)*cos(' . $lat . '/57.29578)*(Longitude-' . $lon . ')*(Longitude-' . $lon . '))/180) <= ' . $radius . ' ORDER BY `postcode` DESC  '. ';';    
        $rows = $this->db->query($sql);
//        echo mysql_num_rows($rows);
        $postcode=  $rows->result();
        $reslist=array();
        foreach ($postcode as $allcode)
        {
            $code=$allcode->postcode;            
            $sqltext = "SELECT res_id,res_name,res_short_desc,res_address,res_post_code,collection_offer,delivery_offer,minimum_order,food_delivery,food_collection,food_dinning FROM indi_res_info WHERE res_post_code = '".$code."'";
            $rows = $this->db->query($sqltext);
            //print_r($sqltext); exit;
            //$reslist[]=  $rows->result();
            $temp = $rows->result();
            if(!empty($temp)){
                $reslist[] = $rows->result();
            }
        }
        //echo '<pre>';
        return $reslist = call_user_func_array('array_merge', $reslist);
  }  
//restaurant radius serch code by rjs
    
    public function res_search($postcode, $radius) {
        $postcode = urldecode($postcode);
        $radius = urldecode($radius);
      // echo $radius; exit; 
        $resData= $this->restaurant_model->search_resdata($postcode);
        $jsonData=  json_decode($resData);
        $lati=$jsonData->results[0]->geometry->location->lat; 
        $lang=$jsonData->results[0]->geometry->location->lng;  
        $sqlstring="SELECT *,(3959 * acos( cos( radians($lati)) * cos(radians(latitude)) * cos(radians(longitude) - radians($lang)) + sin(radians($lati)) * sin(radians(latitude)))) AS distance FROM indi_res_info HAVING distance < $radius ORDER BY distance ASC";

            $q = $this->db->query($sqlstring, false); 
            if ($q->num_rows() > 0) {
                return $q->result_array(); 
            } else {
                return 0;
            }
    }
    
    
    
    public function search_resdata($res_post_code){
        
        //echo $res_post_code; exit; 
            $post_code = str_replace(" ", "", $res_post_code);
            $url = "http://maps.googleapis.com/maps/api/geocode/json?&components=postal_code:$post_code&sensor=false";
            $data = @file_get_contents($url);
            //print_r($data);
        return $data;
    }
    
    
    public function  getAllRestaurant($data,$allResId){ 
        
                //$item_id=implode(",",$data['item_id']);  

                $sqltext = "SELECT latitude,longitude,res_id,res_name,res_short_desc,res_address,res_post_code,collection_offer,delivery_offer,minimum_order,food_delivery,food_collection,food_dinning FROM indi_res_info WHERE res_id IN ($allResId) ";

                /*$myQuery = "SELECT indi_menu_restaurant_relation.*,indi_res_info.res_id,indi_res_info.res_name,indi_res_info.res_address,
                            SUM(indi_menu_restaurant_relation.menu_restaurant_relation_price) AS total_price
                            FROM indi_menu_restaurant_relation 
                            LEFT JOIN indi_res_info 
                            ON indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id = indi_res_info.res_id 
                            WHERE indi_res_info.res_food_indian='indian'  
                            AND indi_menu_restaurant_relation.menu_restaurant_relation_menu_id IN ($item_id)
                            AND indi_res_info.res_id IN ($allResId) 
                            GROUP BY indi_menu_restaurant_relation.menu_restaurant_relation_restaurant_id
                            ORDER BY total_price ASC
                           ";
                    */
                
		    $q = $this->db->query($sqltext, false);
                    if($q->num_rows() > 0) {
                        return $q->result_array();
                     }else{
                         
                        return 0;
                     }
    }  

  
    public function product_details($p_id, $res_id) {
        $query = $this->db->query("Select *From indi_items where item_id='$p_id' LIMIT 1");
        $result = $query->result();
        if (count($result) == 1) {

            return $result;
        }
    }
    public function recent_res() {
        // $query =  $this->db->query("Select *From indi_res_info where entry_date='$p_id' LIMIT 1");

        $query = $this->db->query("SELECT * FROM indi_res_info ORDER BY sn DESC ");
        $result = $query->result();
        if (count($result) == 1) {
            return $result;
        }
    }
    public function get_res_id($res_name) {
        $query = $this->db->query("SELECT * FROM indi_res_info where res_name='$res_name' limit 1");
        $result = $query->result();
        //$result=  mysql_fetch_array($result);
        if (count($result) == 1) {
            return $result;
        }
    }

    public function search_check_old($postcode) {
        $query = $this->db->query("SELECT * FROM postcode where postcode='$postcode'");
        $result = $query->result();
        if (count($result) > 0) {
            return true;
        }
    }

    public function postcode_info($postcode) {
        $query = $this->db->query("SELECT latitude,longitude FROM postcode where postcode='$postcode'");
        $result = $query->result();
        if (count($result) == 1) {
            return $result;
        }
    }
    public function video()
    {
        $query = $this->db->query("SELECT *from indi_video limit 10");
        $result = $query->result();

//        echo "<pre>";
//        print_r($result);
//        die();
        if (count($result) > 0) {
            return $result;
        }
    }
        //delete a category rjs
    public function delete_video($video_id)
    {
       $query = $this->db->query("DELETE FROM indi_video WHERE id = '$video_id'");
         $thumb= $this->db->query("SELECT `thumb` from indi_video where id=$video_id limit 1");  
         $filename=$thumb->result();
         if (file_exists(assets/video/thumb/$filename)) {
         unlink(assets/video/thumb/$filename);
         }else{}
       return $query; 
    }
    
    
    
    
    public function get_res_data($postcode,$radius){
        
            $sqlstring = "SELECT * FROM postcode WHERE postcode = '".$postcode."'";
                $result = mysql_query($sqlstring);
                //print_r($result); exit;

                $row = mysql_fetch_assoc($result);
                //print_r($row); exit;

                $lng = $row["longitude"] / 180 * M_PI;
                $lat = $row["latitude"] / 180 * M_PI;
                //print_r($lng); exit;
                mysql_free_result($result);
                
                
               // $sqlstring2 = "SELECT DISTINCT geodb.postcode,geodb.city,(6367.41*SQRT(2*(1-cos(RADIANS(geodb.latitude))*cos(".$lat.")*(sin(RADIANS(geodb.longitude))*sin(".$lng.")+cos(RADIANS(geodb.longitude))*cos(".$lng."))-sin(RADIANS(geodb.latitude))* sin(".$lat.")))) AS Distance FROM geodb AS geodb WHERE (6367.41*SQRT(2*(1-cos(RADIANS(geodb.latitude))*cos(".$lat.")*(sin(RADIANS(geodb.longitude))*sin(".$lng.")+cos(RADIANS(geodb.longitude))*cos(".$lng."))-sin(RADIANS(geodb.latitude))*sin(".$lat."))) <= '".$distance."') ORDER BY Distance";

                $sql = "SELECT DISTINCT postcode.postcode,(6367.41*SQRT(2*(1-cos(RADIANS(postcode.latitude))*cos(".$lat.")*(sin(RADIANS(postcode.longitude))*sin(".$lng.")+cos(RADIANS(postcode.longitude))*cos(".$lng."))-sin(RADIANS(postcode.latitude))* sin(".$lat.")))) AS Distance FROM postcode AS postcode WHERE (6367.41*SQRT(2*(1-cos(RADIANS(postcode.latitude))*cos(".$lat.")*(sin(RADIANS(postcode.longitude))*sin(".$lng.")+cos(RADIANS(postcode.longitude))*cos(".$lng."))-sin(RADIANS(postcode.latitude))*sin(".$lat."))) <= '".$radius."') ORDER BY Distance";
                //print_r($sql['postcode']); exit;
                /*
                
                  $rows = $this->db->query($sql);

       // print_r($sql);exit;


//        echo mysql_num_rows($rows);
        $postcode=  $rows->result();
        $reslist=array();
        foreach ($postcode as $allcode)
        {
            $code=$allcode->postcode;
            $sqltext = "SELECT res_id,res_name,res_short_desc,res_address,res_post_code,collection_offer,delivery_offer,minimum_order,food_delivery,food_collection,food_dinning FROM indi_res_info WHERE res_post_code = '".$code."'";
            $rows = $this->db->query($sqltext);
            //$reslist[]=  $rows->result();
            $temp = $rows->result();
            if(!empty($temp)){
                $reslist[] = $rows->result();
            }
        }
        //echo '<pre>';
        return $reslist = call_user_func_array('array_merge', $reslist);
                
                
                
                */
                
                $rows = $this->db->query($sql);
                 
                $postcode1=  $rows->result();
                $reslist=array();
                foreach ($postcode1 as $allcode)
                {
                    $code=$allcode->postcode;


                        $code=$allcode->postcode;

                    //print_r($temp);exit;

                        $sqltext = "SELECT res_id,res_name,res_short_desc,res_address,res_post_code,collection_offer,delivery_offer,minimum_order,food_delivery,food_collection,food_dinning FROM indi_res_info WHERE res_post_code = '".$code."'";
                        $rows = $this->db->query($sqltext);


                        //print_r($rows);exit;


                          //$reslist[]=  $rows->result();
                    $temp = $rows->result();

                      //print_r($temp);exit; 

                    if(!empty($temp)){
                        $reslist[] = $rows->result();
                    }
                }
                //echo '<pre>';
                return $reslist;

                //return $temp;

    }
    
    
    public function insert_recommed($res_name,$phone,$postcode,$city,$captcha,$comments){ 
        
            $result = $this->db->query("INSERT INTO `recommend` (`restaurant_name`,`phone`,`postcode`,`city`,`capcha`,`comment`)VALUES ('$res_name','$phone','$postcode','$city','$captcha','$comments')");
                if ($result) {
                    return TRUE;
                } else {
                    return FALSE;
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