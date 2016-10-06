<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public $metadata;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('data_model');
        $this->metadata=(object)array(
            'title'=>'Order Indian & Bangladeshi Takeaway Food Online - London',
            'description'=>'Order Indian & Bangladeshi Takeaway Food Online; We delivery to your door steps within 3 mile radius. Outside of the free zone will cost extra delivery charge?',
            'keywords'=>''
            );
    }


    public function menu(){
		
		$data['title']='Order Indian & Bangladeshi Takeaway Food Online - London';
		// $data['metadata']=$this->metadata;
        $id=1;
        $where=array('item_catagory_id'=>$id);
        $data['items']=$this->data_model->get_category_item($id); 
        $data['categories']=$this->data_model->fatch_all_data('indi_catagories'); 
        $data['title'] = 'Menu';   
        $data['page']='page/menu';
        // var_dump($data);exit;
		$this->load->view('common/template',$data);           
    }

    public function category_item($id=null){ 
        if($id){
            //echo $name; exit;
            $where=array('item_catagory_id'=>$id);
            $data['categories']=$this->data_model->fatch_all_data('indi_catagories');   
            $data['items']=$this->data_model->get_category_item($id);  
            //print_r($data['items']); exit; 
        }else{
          $data['no_item']='No Item';  
        }
		$data['title'] = 'Menu';   
        $data['page']='page/menu';
        $this->load->view('common/template',$data);    

    }

    public function cart(){
        if($this->cart->contents())
        {
            if($this->session->userdata('customer_id')){
                $data['customerInfo'] = $this->data_model->getCustomerInfoByID($this->session->userdata('customer_id'));
            //print_r($data['customerInfo']); exit; 
            }

        	$table_name = 'country';
            $data['all_country'] = $this->data_model->fatch_all_data($table_name);
            $data['items']=$this->data_model->fatch_all_data('indi_items'); 
            $data['paymentMethod']=$this->data_model->getAllPaymentMethod();   

            $data['paymentMethod']=$this->data_model->getAllPaymentMethod();      
            $data['business_houres']['sat']=$this->data_model->get_all_data('sat_status as status,sat_from1 as from1,sat_to1 as to1,sat_from2 as from2, sat_to2 as to2','indi_res_business_hour'); 
            $data['business_houres']['sun']=$this->data_model->get_all_data('sun_status as status,sun_from1 as from1,sun_to1 as to1,sun_from2 as from2, sun_to2 as to2','indi_res_business_hour'); 
            $data['business_houres']['mon']=$this->data_model->get_all_data('mon_status as status,mon_from1 as from1,mon_to1 as to1,mon_from2 as from2, mon_to2 as to2','indi_res_business_hour'); 
            $data['business_houres']['tue']=$this->data_model->get_all_data('tue_status as status,tue_from1 as from1,tue_to1 as to1,tue_from2 as from2, tue_to2 as to2','indi_res_business_hour'); 
            $data['business_houres']['wed']=$this->data_model->get_all_data('wed_status as status,wed_from1 as from1,wed_to1 as to1,wed_from2 as from2, wed_to2 as to2','indi_res_business_hour'); 
            $data['business_houres']['thus']=$this->data_model->get_all_data('thus_status as status,thus_from1 as from1,thus_to1 as to1,thus_from2 as from2, thus_to2 as to2','indi_res_business_hour'); 
            $data['business_houres']['fri']=$this->data_model->get_all_data('fri_status as status,fri_from1 as from1,fri_to1 as to1,fri_from2 as from2, fri_to2 as to2','indi_res_business_hour'); 

            $data['business_houres']['sat']=json_encode($data['business_houres']['sat'][0]);
            $data['business_houres']['sun']=json_encode($data['business_houres']['sun'][0]);
            $data['business_houres']['mon']=json_encode($data['business_houres']['mon'][0]);
            $data['business_houres']['tue']=json_encode($data['business_houres']['tue'][0]);
            $data['business_houres']['wed']=json_encode($data['business_houres']['wed'][0]);
            $data['business_houres']['thus']=json_encode($data['business_houres']['thus'][0]);
            $data['business_houres']['fri']=json_encode($data['business_houres']['fri'][0]);   
            $data['page']='page/cart';
			$data['title']='Check out:Steak Grill';
            $this->load->view('common/template',$data);     
        }else{
            redirect('order/item_list');
        }
        
    }

    public function checkout_data() {

    	//echo 'hello'; exit;  
        // var_dump($this->input->post());
        // $this->form_validation->set_rules('delivery_date', 'Delivery Date', 'required|xss_clean');
        // $this->form_validation->set_rules('delivery_time', 'Delivery Time', 'required|xss_clean');
       
        $data['order_type']=$this->input->post('order_type');
        if($data['order_type']=='delivery'){
            $this->form_validation->set_rules('address_line1', 'Address Line1', 'required|xss_clean');
            $this->form_validation->set_rules('address_line2', 'Address Line2', 'required|xss_clean');
            $this->form_validation->set_rules('post_code', 'Post Code', 'required|xss_clean');
            $this->form_validation->set_rules('city', 'City', 'required|xss_clean');
        }
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
            $this->form_validation->set_rules('mobile', 'Mobile', 'required|xss_clean');
            $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		
		if($this->session->userdata('customer_id') < 1){   
			$this->form_validation->set_rules('password', 'Password', 'required|matches[c_password]|xss_clean');
			$this->form_validation->set_rules('c_password', 'Confirm password', 'required|xss_clean');
		}

        
        //---------------Order Master-------------------------------
        //$data['customer_id']=$this->session->userdata('customer_id');
        $data['order_date']=date("d/m/Y");  
        $data['order_time']=date("h:i:s A"); 
        $data['order_type']=$this->input->post('order_type'); 
        $data['delivery_date']=$this->input->post('delivery_date');
        $data['delivery_time']=$this->input->post('delivery_time');  

        $data['first_name']=$this->input->post('first_name');
        $data['last_name']=$this->input->post('last_name');
        $data['address_line1']=$this->input->post('address_line1');
        $data['address_line2']=$this->input->post('address_line2');
        $data['post_code']=$this->input->post('post_code'); 
        $data['city']=$this->input->post('city');  

        $data['email']=$this->input->post('email');
		
		$data['password']=md5($this->input->post('password'));
		
        $data['phone']=$this->input->post('phone');
        $data['mobile']=$this->input->post('mobile');

        
        // $distance=$this->getDistanceForFinal($data['post_code']);

        // if($distance > 5){ 
        //     redirect('order/cart');
        // }

        // $data['birthday']=$this->input->post('birthday');
        // $data['partner_birthday']=$this->input->post('partner_birthday'); 
        // $data['anniversary_date']=$this->input->post('anniversary_date');
        // $data['special_day']=$this->input->post('special_day');   

        $data['item_price']=$this->input->post('item_price');  
        $data['delivery_charge']=$this->input->post('delivery_charge');
        $data['pin_discount']=$this->input->post('discount_value');
        $data['discount_percentage']=$this->input->post('discount_percentage');     

        $data['special_note']=$this->input->post('special_note');  
        $data['allergy_problem']=$this->input->post('allergy_problem');
        
        $data['date_discount_value']=$this->input->post('date_discount_value');

        if($data['allergy_problem']==''){
            $data['allergy_problem']=0;
        }

        $data['paymentMethod']=$this->input->post('payment_method');
        $data['order_pin']=$this->input->post('voucher_number');

        //$data['new_price_value']=$this->input->post('new_price_value');  'MGOP'.
       
        if($data['order_pin']==''){
            $data['couponData']=$this->data_model->getCouponForCustomer(); 
            // echo '<pre>';
            // print_r($data['couponData']);
            // echo '</pre>';
            $data['order_pin']=$data['couponData']->couponNumber;   
            $data['coupon_id']=$data['couponData']->coupon_id;
            $data['customer_group']=$data['couponData']->coupon_group; 
            $data['coupon_amount']=$data['couponData']->coupon_amount; 
            $data['coupon_value_type']=$data['couponData']->coupon_value_type;
            //$data['discount_percentage']=$data['coupon_amount'].'_'.$data['coupon_value_type'];
        }else{
            $data['order_pin']=$data['order_pin'];
            $data['couponData1']=$this->data_model->getCouponDataForCustomer($data['order_pin']); 
            // echo '<pre>';
            // print_r($data['couponData1']);
            // echo '</pre>';exit; 
            $data['coupon_id']=$data['couponData1']->coupon_id;
            $data['customer_group']=$data['couponData1']->coupon_group;
        }

        $data['final_price_value']=$this->input->post('final_price_value'); 
        if($data['final_price_value']==0){
            $data['total_price']=$this->input->post('total_price');         
        }else{
            $data['total_price']=$data['final_price_value'];
        } 

    /********************  For Check Start *******************/

            $miles = $this->getDistanceForFinal($data['post_code']);
            $cart=$this->cart->contents();
            $discountPercent = explode('_', $data['discount_percentage']);
            $voucherAmount = $discountPercent[0];
            $voucherValueType = $discountPercent[1];

            $chargeData = $this->order_model->getDeliveryCharge();
            $minimum_order_amount=$chargeData->minimum_order_amount;
            $free_delivery_radius=$chargeData->free_delivery_radius;
            $max_delivery_radius=$chargeData->max_delivery_radius;
            $max_delivery_charge=$chargeData->max_delivery_charge;

            $total=0;
            foreach ($cart as $key => $item){
              $total+=$item['subtotal'];
            }

            if($data['order_type']=='collection'){
                $delivery_charge=0;
            }else{

                $voucherAmount = 0;

                if($miles <= $free_delivery_radius){
                    $delivery_charge = 0;
                }else if($miles > $free_delivery_radius & $miles <= $max_delivery_radius){
                    $delivery_charge = $max_delivery_charge;
                }else{
                    $delivery_charge = 0;
                }
            }


            if($voucherValueType=='fixed'){
                $new_Total_Price=$total - $voucherAmount;
            }else{
                $newVoucherAmount=($total * $voucherAmount)/100; 
                $new_Total_Price= $total - $newVoucherAmount;
            }

            $finalPrice = $new_Total_Price + $delivery_charge;
            $finalPrice = number_format((float) ($finalPrice), 2, '.', '');

             // echo 'tp'.$new_Total_Price;  
             // echo 'fp'.$finalPrice;
             // echo '<br>'.$data['total_price'];  exit;

             if($finalPrice != $data['total_price']){
                redirect('order/cart');
             }   

    /********************  For Check End *******************/

        //echo $this->session->userdata('customer_id'); exit; 

            if($this->session->userdata('customer_id') < 1){   
                $insert_id = $this->order_model->insert_order_data('customer_info', $data);
                $data['customer_id']=$insert_id;
            }else{
                $insert_id = $this->order_model->update_customer_data('customer_info', $data);
                $data['customer_id']=$this->session->userdata('customer_id'); 

            } 

        if($data['customer_id']){ 

            $orderId = $this->order_model->insertItemOrder($data);


        $data['id_of_item']=$this->input->post('item_id');
        $data['item_name']=$this->input->post('item_name'); 
        $data['unit_price']=$this->input->post('price'); 
        $data['quantity']=$this->input->post('qty');
        $data['subtotal']=$this->input->post('subtotal');

        $order_detail=array();
        foreach ($data['id_of_item'] as $key => $value) {
            $order_details['order_id']=$orderId;
            $order_details['item_id']=$value;
            $order_details['item_name']=$data['item_name'][$key];
            $order_details['item_quantity']=$data['quantity'][$key];
            $order_details['item_price']=$data['unit_price'][$key];
            $order_details['item_total_price']=$data['subtotal'][$key];;
            //$order_details['customer_id']=$data['customer_id'];
            $order_details['order_date']=$data['order_date'];
            $order_details['order_time']=$data['order_time'];
            $order_details['delivery_date']=$data['order_date'];
            $order_details['delivery_time']=$data['order_time'];
            array_push ($order_detail, $order_details);
            }
        $this->db->insert_batch('order_history', $order_detail);

        // Start Coding for Order Notification 
        $notification['name']=$data['first_name'].' '.$data['last_name'];
        $notification['order_id']=$orderId;
        $notification['type']='order';
        $notification['createAt']=date('Y-m-d H:i:s');
        $this->data_model->insert_data_to_database('notifications', $notification);
        // End Coding for Order Notification 

        }

        if($orderId){
            $data['order_history']= $this->data_model->get_order_history_data_asc($orderId);
            //print_r($data['order_history']); exit;  
            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$orderId));
            $data['customer_details']= $this->data_model->fatch_data_where('customer_info',array('customer_id'=>$data['customer_id']));
            $data['payment_method']= $this->data_model->fatch_all_data('payment_method');

                $today = date("d/m/Y H:i:s");
                require 'class.phpmailer.php';
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->Debugoutput = 'html';
                $mail->Host = "ssl://smtp.gmail.com";
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                $mail->Username = "noreply@serviceontheweb.co.uk";
                $mail->Password = "dhaka%002";
                $mail->SetFrom('noreply@serviceontheweb.co.uk', "Steak Grill");
                $mail->AddReplyTo('noreply@serviceontheweb.co.uk', "Steak Grill");

                $email='weborder@radhuniSteak Grill'; 
                //$email='saleah@serviceontheweb.co.uk'; 
                //$mail->AddAddress('foysal@serviceontheweb.co.uk');
                $mail->AddAddress($email);
                $mail->Subject = 'Order Confirmation Mail'; 
                $body = $this->load->view('email/admin_email',$data, TRUE);
                
                $mail->MsgHTML($body);
                $mail->AltBody = 'This is a plain-text message body';
                
                $mail->Send();

                /////////For Customer Mail//////////////

                $clientmail = new PHPMailer();
                $clientmail->IsSMTP();
                $clientmail->SMTPDebug = 0;
                $clientmail->Debugoutput = 'html';
                $clientmail->Host = "ssl://smtp.gmail.com";
                $clientmail->Port = 465;
                $clientmail->SMTPAuth = true;
                $clientmail->Username = "noreply@serviceontheweb.co.uk";
                $clientmail->Password = "dhaka%002";
                $clientmail->SetFrom('noreply@serviceontheweb.co.uk', "Steak Grill");
                $clientmail->AddReplyTo('noreply@serviceontheweb.co.uk', "Steak Grill");

                //$email='saleah@serviceontheweb.co.uk'; 
                $clientmail->AddAddress($data['email']);
                $clientmail->Subject = 'Order Confirmation Mail';
                $body = $this->load->view('email/client_email',$data, TRUE);
                         
                $clientmail->MsgHTML($body);
                $clientmail->AltBody = 'This is a plain-text message body';
                
                $clientmail->Send();

                //$data['paymentMethod']=$data['paymentMethod']; 


        	//echo $data['payment_method']; exit;
        	$data['order_id']=$orderId; 
            
            $this->cart->destroy();
            $this->session->sess_destroy();
            //redirect('order/template/'.$data);

                if($data['paymentMethod']==2){
                    $data['page']='order/paypal_form';
                    $this->load->view('common/template',$data); 
                }elseif($data['paymentMethod']==3){
                    $data['page']='order/worldpay_form';
                    $this->load->view('common/template',$data);
                }else{
                    $data['page']='order/payment_success'; 
                    $data['status']='1';
                    $this->load->view('common/template',$data);
                }
            
            //redirect('order/item_list');
        }else{
            redirect('order/cart'); 
        }
    }
    public function template($data){
        //$data['paymentMethod']=$payment_method;

        //echo $data['paymentMethod']; exit; 

        if($data['paymentMethod']==2){
            $data['page']='order/paypal_form';
            $this->load->view('common/template',$data); 
        }elseif($data['paymentMethod']==3){
            $data['page']='order/worldpay_form';
            $this->load->view('common/template',$data);
        }else{
            $data['page']='order/payment_success'; 
            $data['status']='1';
            $this->load->view('common/template',$data);
        }
    }

    public function check_order(){ 
     
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('order_pin', 'Password', 'required|xss_clean');

        $data['email']=$this->input->post('email');
        $data['order_pin']=$this->input->post('order_pin'); 

                if ($this->form_validation->run() == true) {

                    $data['order_list']=$this->data_model->getOrderListBypin($data['email'],$data['order_pin']);
                    //print_r($data['order_list']);
                    if($data['order_list']){
                        $data['page']='order/order_list';
                        $this->load->view('common/template',$data); 
                    }else{
                        $this->session->set_flashdata('danger', 'No Order Data'); 
                        redirect('home/check_order');
                    }
                }else{

                    $data['page']='login';
                    $this->load->view('common/template',$data);
                }

    }

    public function view_order_details(){
    	$id = $this->uri->segment(3); 

	        if ($id!='') {
            $data['order_history']= $this->data_model->fatch_data_where('order_history',array('order_id'=>$id));
            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$id));
            $data['payment_method']= $this->data_model->fatch_all_data('payment_method');  
	                $data['page']='order/order_item_details';
	                $this->load->view('common/template',$data); 
	            
	        }

    }

    /////// Coupon start ////////

    public function getBulkCouponValue() {
        $voucher_number = $this->input->post('vaucherNumber');
        $vaucherData = $this->order_model->getvoucherData($voucher_number);
        $start_date = $vaucherData->start_date;
        $expire_date = $vaucherData->expire_date;
        $today = date('d/m/Y');

        $timestamp1 = strtotime($expire_date);
        $timestamp2 = strtotime($start_date);
        $timestamp3 = strtotime($today);

        if (!empty($vaucherData )) {
            echo json_encode($vaucherData);
        } else {
            
        }
    }

    public function getBulkCouponValueOfGeneral() {
        //$coupon_group = $this->input->post('coupon_group');
        $vaucherData = $this->order_model->getvoucherDataForGeneral();

        if (!empty($vaucherData )) {
            echo json_encode($vaucherData);
        } else {
            
        }
    }

    public function getBulkCouponValueforCoupon() {
        $voucher_number = $this->input->post('vaucherNumber');
        $vaucherData1 = $this->order_model->getvoucherData($voucher_number);
        $start_date = $vaucherData1->start_date;
        $expire_date = $vaucherData1->expire_date;
        $today = date('d/m/Y');

        $timestamp1 = strtotime($expire_date);
        $timestamp2 = strtotime($start_date);
        $timestamp3 = strtotime($today);

        if (!empty($vaucherData1 )) {
            echo json_encode($vaucherData1); 
        } else {
            
        }
    }

    public function getDistance() {
        $post_code = $this->input->post('postCode');
        $postCodeData = $this->order_model->search_PostCode_data($post_code);
        $chargeData = $this->order_model->getDeliveryCharge();

        $data['minimum_order_amount']=$chargeData->minimum_order_amount;
        $data['free_delivery_radius']=$chargeData->free_delivery_radius;
        $data['max_delivery_radius']=$chargeData->max_delivery_radius;
        $data['max_delivery_charge']=$chargeData->max_delivery_charge;
        //HP27 9AA
        $lat1=51.53746370879502;
        $lon1=-0.0004326465974277733;
                $jsonData= json_decode($postCodeData);
                $status=$jsonData->status; 
                
                // echo '<pre>'; 
                // print_r($jsonData);
                // echo '</pre>'; exit; 
                         
                if($status !='OK'){                
                    $postData= $this->order_model->search_postdata_on_api($post_code);
                    $jsonData=json_decode($postData);
                    $lat2=$jsonData->geo->lat;
                    $lon2=$jsonData->geo->lng;  
          
                }else{

                  $lat2=$jsonData->results[0]->geometry->location->lat; 
                  $lon2=$jsonData->results[0]->geometry->location->lng;

                }
               $theta = $lon1 - $lon2;
               $unit='M';
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);
                if ($unit == "K") {
                   $Kilo=$miles * 1.609344;
                } else if ($unit == "N") {
                     $Notical=$miles * 0.8684;
                  } else {
                        $data['miles']=$miles;   
                    }

        if (!empty($data )) {
            echo json_encode($data);
        } else {
            
        }
    }


    public function getDistanceForFinal($post_code) {
        //$post_code = $this->input->post('postCode');
        $postCodeData = $this->order_model->search_PostCode_data($post_code);

        $lat1=51.53746370879502;
        $lon1=-0.0004326465974277733;

                $jsonData= json_decode($postCodeData);
                $status=$jsonData->status; 
                         
                if($status !='OK'){                

                    $postData= $this->order_model->search_postdata_on_api($post_code);
                    $jsonData=json_decode($postData);
                    $lat2=$jsonData->geo->lat;
                    $lon2=$jsonData->geo->lng;  
          
                }else{

                  $lat2=$jsonData->results[0]->geometry->location->lat; 
                  $lon2=$jsonData->results[0]->geometry->location->lng;

                }

               $theta = $lon1 - $lon2;
               $unit='M';

                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);
                if ($unit == "K") {
                   $Kilo=$miles * 1.609344;
                } else if ($unit == "N") {
                     $Notical=$miles * 0.8684;
                  } else {
                        $data['miles']=$miles;   
                    }

                return $miles;   

    }

     public function getEmailAddress() {
        $email = $this->input->post('email');
        //$email = 'saleah@serviceontheweb.co.uk';
        $emaiData = $this->order_model->search_for_email($email);
        //print_r($emaiData);    
        $data['email']=$emaiData->email;
        // if (!empty($data )) {
            echo json_encode($data);
        // } else {
            
        // }
    }

    public function item_cart_show(){
       $data['cart']=$this->cart->contents();
       $this->load->view('page/item_cart', $data);
    }

    public function cart_header_show(){
       $data['cart']=$this->cart->contents();
       $this->load->view('page/cart_header', $data);
    }
    
    function empty_cart()
    {
        $this->session->unset_userdata('cartRestuarantId');
        $this->cart->destroy();
        return "Cart Empty";
    }

    public function login_user(){ 
     
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('order_pin', 'Password', 'xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'xss_clean');
        $data['email']=$this->input->post('email');
        $data['order_pin']=$this->input->post('order_pin'); 
        $data['password']=md5($this->input->post('password')); 

                if ($this->form_validation->run() == true) {
                    $userLoginData=$this->order_model->loginUser($data['email'],$data['order_pin'],$data['password']);
                   // echo '<pre>';
                   //  print_r($userLoginData);
                   //  echo '</pre>'; exit; 
                   // echo $userLoginData[0]['first_name']; exit;
                    if(!empty($userLoginData))
                        {
                            $session_data = array('email'=> $userLoginData[0]['email'],
                                                'logged_in'=> TRUE, 
                                                'customer_id'=>$userLoginData[0]['customer_id'],
                                                'order_pin'=>$userLoginData[0]['order_pin'],    
                                                'post_code'=>$userLoginData[0]['post_code']);                  
                            $this->session->set_userdata($session_data);
                            $this->session->set_flashdata('message', 'Login Successful'); 
                            //echo "jelk"; exit; 
                            redirect('order/cart'); 
                        }     
                        else{
                        $this->session->set_flashdata('danger', 'Login Not Successful'); 
                        redirect('order/cart');
                        }
                }else{
                   redirect('order/cart');
                }
    }

    public function user_logout(){ 
            $this->session->unset_userdata('customer_id');
            redirect('/');
    }

    public function forget_order_pin(){

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');


            if ($this->form_validation->run() == true) {

                    $email=$this->input->post('email');

                    $data['cus_info']=$this->order_model->geOrderPinbyEmail($email);
                    $orderPin=$data['cus_info']->order_pin;

                        $today = date("d/m/Y H:i:s");
                        require 'class.phpmailer.php';
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPDebug = 0;
                        $mail->Debugoutput = 'html';
                        $mail->Host = "ssl://smtp.gmail.com";
                        $mail->Port = 465;
                        $mail->SMTPAuth = true;
                        $mail->Username = "noreply@serviceontheweb.co.uk";
                        $mail->Password = "dhaka%002";
                        $mail->SetFrom('noreply@serviceontheweb.co.uk', "Steak Grill");
                        $mail->AddReplyTo('noreply@serviceontheweb.co.uk', "Steak Grill");

                        //$email= $email; 
                        $mail->AddAddress($email);
                        $mail->Subject = 'Order Pin Retrieval Email'; 
                        $body = 'Your Order Pin: '.$orderPin;
                                 
                        $mail->MsgHTML($body);
                        $mail->AltBody = 'This is a plain-text message body';
                        
                        $mail->Send();
                        $this->session->set_flashdata('message', 'Order Pin sent in your email, Please Check.'); 
                        redirect('order/cart');  

            }else{
                $data['page']='order/forget_order_pin'; 
                $this->load->view('common/template',$data); 
            }

    }

    public function paypal_return(){

                $data['page']='order/payment_success'; 
                $data['status']='1';
                $this->load->view('common/template',$data);
    }


    //////////////// WorldPay Return /////////////

    public function worldpay_return() {

        $this->load->model('order_model');

        if ($_POST['authMode'] == 'A' && $_POST['msgType'] == 'authResult' && $_POST['transStatus'] == 'Y') {

            $orderID = $_POST['cartId'];
            $worldPayTransactionId = $_POST['transId'];
            $paidAmount = $_POST['authAmount'];
            $paidCurrency = $_POST['authCurrency'];

            $recordUpdatedForWorldpay = $this->order_model->updateOrderForWorldpay($orderID, $worldPayTransactionId, $paidAmount, $paidCurrency);
        }

        echo "<meta http-equiv='refresh' content='1; url=http://steakgrill.com/order/worlpay_success_return'>";
    }


    public function worlpay_success_return(){

        $data['page']='order/payment_success'; 
        $data['status']='1';
        $this->load->view('common/template',$data); 
    }

    public function get_res_menu(){
        
        $category_id = $this->input->post('category_id');
        $data['category_name'] = $this->input->post('category_name');
        $data['items']=$this->data_model->get_category_item($category_id); 
        $this->load->view('page/res_menu', $data);          
    }


}