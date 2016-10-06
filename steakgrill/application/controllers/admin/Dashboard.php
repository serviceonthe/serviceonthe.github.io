<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Dashboard extends CI_Controller{
		function __construct(){
                    parent::__construct();
                    $this->load->model('data_model');
                    $this->load->library('pagination');
                    $this->load->library('session');
                    /*if(!$this->session->userdata('user_email')){
                        $this->load->view('admin/login_page');
                            
                    }*/
		}
		function index(){

           // echo 'hello'; exit; 
        
           
			//redirect('admin/dashboard/ganalytics');
			// $this->load->view('admin/login_page');
           // $data['page']='admin/common/dashboard';
			 $data['page']='admin/common/dashboard';
            $this->load->view('admin/common/template', $data);
		}


		function ganalytics(){

			//echo 'dfas';exit; 

            $this->load->library('ga_api');

            // Set new profile id if not the default id within your config document
            /*$abc = $this->ga_api->login()->init(array('profile_id' => '66254903'));
            print_r($abc);exit;*/
            $this->ga = $this->ga_api->login()->init(array('profile_id' => '66254903'));
            // echo 'GA';exit;
 			//echo 'hello'; exit; //66254903  //106708960
            // Query Google metrics and dimensions
            // Documentation: http://code.google.com/apis/analytics/docs/gdata/dimsmets/dimsmets.html)
            $data = $this->ga
                ->dimension('adGroup , campaign , adwordsCampaignId , adwordsAdGroupId')
                ->metric('impressions')
                ->limit(30)
                ->get_object();

            // Also please note, if you using default values you still need to init()
            $data = $this->ga_api->login()
                ->dimension('adGroup , campaign , adwordsCampaignId , adwordsAdGroupId')
                ->metric('impressions')
                ->limit(30)
                ->get_object();


            // Please note you can also query against your account and find all the profiles associated with it by
            // grab all profiles within your account
            $data['accounts'] = $this->ga_api->login()->get_accounts(); //ganalytics

            //ganalytics
            $data['page']='admin/common/ganalytics';
            $this->load->view('admin/common/template', $data);


		}


		function home(){
            // $this->load->view('admin/home');
            $data['page']='admin/common/dashboard';
            $this->load->view('admin/common/template');
            // $this->load->view('admin/common/menu');
            // $this->load->view('admin/common/dashboard');
            // $this->load->view('admin/common/footer');


		}
                function data_operator_dashboard(){
                    $this->load->view('admin/data_operator_dashboard/home');
                }
		function list_users(){
            /*$data['page']='admin/users/list_users';
            $this->load->view('admin/common/template',$data);*/
			$this->load->view('admin/users/list_users');
		}
		function add_users(){
			$this->load->view('admin/users/add_users');
		}
		function food_category(){
			$this->load->view('admin/food/food_category');

		}
		function cuisine_type_category_details(){
			$this->load->view('admin/food/cuisine_type_category_details');
		}
		function indi_category_details(){
			$this->load->view('admin/food/indi_category_details');
		}
		function food_menu(){
			$this->load->view('admin/food/food_menu');
		}
		function item_type(){
			$this->load->view('admin/food/item_type');
		}
		function item_notification(){
			$this->load->view('admin/food/item_notification');
		}
		function list_restaurent(){
			$this->load->restaurent('fatch_restaurent');
		}
		function add_restaurent(){
			$this->load->view('admin/restaurent/add_restaurent');
		}
		//sub menu add_restaurent_feature_info() from add_restaurent() in add_restaurent.php 
		function add_restaurent_feature_info(){
			$this->load->view('admin/restaurent/add_restaurent_feature_info');
		}
		function restaurent_menu_setting(){
			$this->load->view('admin/restaurent/restaurent_menu_setting');
		}
		function restaurent_menu_edit(){
			$this->load->view('admin/restaurent/restaurent_menu_edit');
		}
		function search_restaurent(){
			$this->load->view('admin/restaurent/search_restaurent');
		}
        function restaurent_feature_information_detail(){
            $this->load->view('admin/restaurent/restaurent_feature_information_detail');
        }
	
        // Update on 11/7/2015 at 3:05 PM - Mahabub
        function list_order(){ 

                    // $config['base_url'] = base_url() .'admin/dashboard/list_order/'; 
                    // $this->load->database();                    
                    // $total_rows = count($this->data_model->get_all_order());  

                    // $config['total_rows'] = $total_rows;  
                    // $config['per_page'] = 20; 
                    // $offset = $this->uri->segment(4, 0);
                    // $config['uri_segment'] = 4;     
                    // $start = $this->uri->segment(4);  

                    // if ($start == '') {     
                    //     $start = 0; 
                    // }      

                    // $data['links'] = $this->pagination->create_links(); 
                    // $this->pagination->initialize($config);                    
                    // $data['order'] = $this->data_model->get_all_order($limit = true, $start, $config['per_page']); 
                    // print_r($data['order']); exit;

                    //fatch_all_data 

                    //echo "dsafsa"; exit; 

                    $table_name='customer_food_order';
                    $data['order'] = $this->data_model->getAllOrder($table_name); 
                    $data['page']='admin/order/list_order'; 
                    $this->load->view('admin/common/template',$data);     
                    
        }
    
		function list_reservation(){

                    $data['reservation'] = $this->data_model->get_all_reservation();
                    // echo '<pre>';
                    // print_r($data['reservation']);   
                    // echo '</pre>';  exit; 
                    $data['page']='admin/list_reservation';
                    $this->load->view('admin/common/template',$data);
        }

        function get_reservation_info($rid){       
        
            //$data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=> $rid));
            $data['reservation_info'] = $this->data_model->get_reservation_info($rid);
            $data['page']='admin/reservation_info';
            $this->load->view('admin/common/template',$data);

        }
          
        function list_order_statement(){
                        
                    
                    $config['base_url'] = base_url() . 'admin/dashboard/list_order_statement/'; 
                    $this->load->database();                      
                    $total_rows = count($this->data_model->get_order_statement());  
                    
                    $config['total_rows'] = $total_rows;  
                    $config['per_page'] = 3 ;   
                    $offset = $this->uri->segment(4, 0);
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4);  

                    if ($start == '') {     
                        $start = 0; 
                    }      

                    $data['links'] = $this->pagination->create_links(); 
                    $this->pagination->initialize($config); 
                    $data['order_statement'] = $this->data_model->get_order_statement($limit = true, $start, $config['per_page']);  

		            $this->load->view('admin/list_order_statement', $data); 
        } 
                 
                 
        function list_reservation_statement(){
                        
                    
                    $config['base_url'] = base_url() . 'admin/dashboard/list_reservation_statement/';  
                    $this->load->database();                      
                    $total_rows = count($this->data_model->get_reservation_statement());  
                    
                    $config['total_rows'] = $total_rows;    
                    $config['per_page'] = 2;    
                    $offset = $this->uri->segment(4, 0);
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4);  

                    if ($start == '') {     
                        $start = 0; 
                    }      

                    $data['links'] = $this->pagination->create_links(); 
                    $this->pagination->initialize($config); 
                    $data['order_statement'] = $this->data_model->get_reservation_statement($limit = true, $start, $config['per_page']);  
                    
		            $this->load->view('admin/list_reservation_statement', $data); 
        }
                                 
           
                 
        function restaurant_order_statement(){
					 
                    // $this->session->set_userdata("restaurantId", $restaurant_id);  
                    $config['base_url'] = base_url() . 'admin/dashboard/restaurant_order_statement/'; 
                    $this->load->database();                      
                    $total_rows = count($this->data_model->get_restaurant_order_statement());  
                    
                    $config['total_rows'] = $total_rows;     
                    $config['per_page'] = 10;  
                    $offset = $this->uri->segment(4, 0);
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4); 

                    if ($start == '') {       
                        $start = 0; 
                    }      

                    $data['links'] = $this->pagination->create_links();    
                    $this->pagination->initialize($config);              
                    $data['restaurant_statement'] = $this->data_model->get_restaurant_order_statement($limit = true, $start, $config['per_page']);  
		            $this->load->view('admin/list_restaurant_statement', $data);    
        }
                 
                 
        function restaurant_reservation_statement($restaurant_id=''){ 
                                 
                    $this->session->set_userdata("restaurantId", $restaurant_id);   
                    $config['base_url'] = base_url() . 'admin/dashboard/restaurant_reservation_statement/'; 
                    $this->load->database();                      
                    $total_rows = count($this->data_model->get_restaurant_reservation_statement());  
                    
                    $config['total_rows'] = $total_rows;     
                    $config['per_page'] = 3;  
                    $offset = $this->uri->segment(4, 0);
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4);  

                    if ($start == '') {       
                        $start = 0; 
                    }      

                    $data['links'] = $this->pagination->create_links();  
                    $this->pagination->initialize($config);              
                    $data['restaurant_statement'] = $this->data_model->get_restaurant_reservation_statement($limit = true, $start, $config['per_page']);  
                    
		            $this->load->view('admin/list_restaurant_reservation_statement', $data);    
        }
                 
                 
        function statement_summery(){

                    $config['base_url'] = base_url() . 'admin/dashboard/statement_summery/'; 
                    $this->load->database();                      
                    $total_rows = count($this->data_model->get_statement_summery());  
                    
                    $config['total_rows'] = $total_rows;     
                    $config['per_page'] = 2;  
                    $offset = $this->uri->segment(4, 0); 
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4);  

                    if ($start == '') {            
                        $start = 0;  
                    }                         

                    $data['links'] = $this->pagination->create_links();  
                    $this->pagination->initialize($config); 
                    $data['statement_sum'] = $this->data_model->get_statement_summery($limit = true, $start, $config['per_page']); 
		            $this->load->view('admin/statement_summery', $data);      
        }
		
	    function get_customer($cid){           
                     
            $data['user_info'] = $this->data_model->get_user_info($cid); 
            $data['page']='admin/user_details';
            $this->load->view('admin/common/template',$data);
		           
        }
		
		function get_restaurent($res_id){             
                     
            $data['res_info'] = $this->data_model->get_res_info($res_id);  
		    $this->load->view('admin/restaurent_details', $data); 
		           
        }
		
		  function order_history($cid){               
                     
            $data['order_history'] = $this->data_model->get_order_history($cid);   
            $data['page']='admin/customer_order_history';
            $this->load->view('admin/common/template',$data);     
        }
 
        function reservation_history($cid){    
                     
            $data['reservation_history'] = $this->data_model->get_reservation_history($cid);   
            $data['page']='admin/customer_reservation_history';
            $this->load->view('admin/common/template',$data);
        }
		function restaurent_statement(){
			$this->load->view('admin/restaurent_statement');
		}
		function summery(){
			$this->load->view('admin/summery');
		}
		function ticket(){
			$this->load->view('admin/ticket');
		}
		function setting(){
			$this->load->view('admin/setting');
		}
		function department(){
			$this->load->view('admin/department');
		}
		function staff(){
			$this->load->view('admin/staff');
		}
		function page_category(){
            $data['page']='admin/page/page_category';
            $this->load->view('admin/common/template',$data);
		}
		function page(){
            $data['page']='admin/page/page';
            $this->load->view('admin/common/template',$data);
		}
		function page_management_menu(){
            $data['page']='admin/page/page_management_menu';
            $this->load->view('admin/common/template',$data);
		}
		function footer_content(){
            $data['page']='admin/footer_content';
            $this->load->view('admin/common/template',$data);
		}
		function overview_content(){
            $data['page']='admin/overview_content';
            $this->load->view('admin/common/template',$data);
		}
		function category(){
            $data['page']='admin/category';
            $this->load->view('admin/common/template',$data); 
		}
		function post(){
            $data['page']='admin/post';
            $this->load->view('admin/common/template',$data);
		}
		function comment(){
			$this->load->view('admin/comment');
		}
		function vedio_management(){
			$this->load->view('admin/vedio_management');
		}

        ////////////////// For Order View ////////////////////

        function viewOrder($id=null){ 

            $data['order_history']= $this->data_model->get_order_history_data($id);
            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$id));
            $data['payment_method']= $this->data_model->fatch_all_data('payment_method');  
            
            $user_type=$this->session->userdata('user_type');
            $this->data_model->update_notification($id,'order');
            $data['page']=$user_type.'/order/view_order'; 
            $this->load->view('admin/common/template',$data);                    

        }

        ////////////////// For Reservation View ////////////////////

        function view_reservation($id=null){
            $data['reservation_details']= $this->data_model->fatch_data_where('bedford_reservation',array('reservation_id'=>$id));
  
            $user_type=$this->session->userdata('user_type');
            $this->data_model->update_notification($id,'reservation');

            $data['page']=$user_type.'/reservation/view'; 
            $this->load->view('admin/common/template',$data);                    

        }



        //=================================Faisal===========================
        public function orderModify($id=null,$edit_status=0){ 
            

            $data['order_history']= $this->data_model->get_order_history_data($id);
            $data['all_item']= $this->data_model->fatch_all_data('indi_items');

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

            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$id));
            
            //$data['page']='admin/order/order_modify';
            //$this->load->view('admin/common/template',$data); 
            
            $data['edit_status']=$edit_status;
            $this->load->view('admin/common/header');
            $user_type=$this->session->userdata('user_type');
            if($edit_status == 0){
                $this->load->view($user_type.'/common/menu');
            }
            $this->load->view('admin/order/order_modify',$data);
            $this->load->view('admin/common/footer');                   
        }

        public function changeDeleveryStatus(){
            $id=$this->input->post('order_id');
            $data=array(
                'order_type'    => $this->input->post('order_type'),
                'delivery_status_modify'    => 1,
                );
            $query=$this->data_model->update($id,'customer_food_order',$data,'order_id');
            //redirect('admin/Dashboard/orderModify/'.$id.'/'.'1');
            if ($query) {
                $this->session->set_flashdata('success', 'Delete successful!');
                redirect('admin/Dashboard/orderModify/'.$id.'/'.'1');
            } else {
                $this->session->set_flashdata('danger', 'Delete NOT success');
                redirect('admin/Dashboard/orderModify/'.$id.'/'.'1');
            }
        }

        public function order_modify_delete() {
            $item_total_price = $this->uri->segment(4);
            $order_history_id = $this->uri->segment(5);
            $order_id = $this->uri->segment(6);
            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$order_id));

            $item_price=$data['order_details']['item_price'];
            $discount_percentage=$data['order_details']['discount_percentage'];
            $total_price=$data['order_details']['total_price'];

            $new_item_price=$item_price - $item_total_price;
            if($discount_percentage){
                $discount_percent= strstr($discount_percentage, '%', true);
                $new_percent_value=($new_item_price * $discount_percent) / 100;
                $update_total_price= $new_item_price - $new_percent_value;
            }
            $data=array(
                'item_price'    => $new_item_price,
                'total_price'    => $update_total_price,
                'delete_status_modify'    => 1,
                );
            $queryResult=$this->data_model->update($order_id,'customer_food_order',$data,'order_id');
            if($queryResult){
                $query=$this->data_model->delete_data_by_id('order_history',array('order_history_id'=>$order_history_id));
            }
            // redirect('admin/Dashboard/orderModify/'.$id.'/'.'1');
            if ($query) {
                $this->session->set_flashdata('success_edit', 'Delete successful!');
                redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            } else {
                $this->session->set_flashdata('danger_edit', 'Delete NOT success');
                redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            }
        }

        public function order_edit(){
            $order_history_id = $this->uri->segment(4);
            $order_id = $this->uri->segment(5);

            $data['edit_fetch']= $this->data_model->fetch_to_edit('order_history',$order_history_id,'order_history_id');

            $user_type=$this->session->userdata('user_type');

            $data['page']=$user_type.'/order/order_edit';

            $this->load->view('admin/common/template',$data);  
        }

        public function order_edit_update(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_quantity', 'Item quantity', 'required');
            if ($this->form_validation->run() == FALSE){
                $order_history_id=$this->input->post('order_history_id');
                $order_id=$this->input->post('order_id');
                $data['edit_fetch']= $this->data_model->fetch_to_edit('order_history',$order_history_id,'order_history_id');
                $data['page']='admin/order/order_edit';
                $this->load->view('admin/common/template',$data);
            }else{
                $order_history_id=$this->input->post('order_history_id');
                $order_id=$this->input->post('order_id');
                //old data
                $old_item_price=$this->input->post('old_item_price');
                $old_item_quantity=$this->input->post('old_item_quantity');
                $old_item_total_price=$this->input->post('old_item_total_price');
                //new data
                $n_item_quantity=$this->input->post('item_quantity');
                $n_item_total_price=$this->input->post('item_total_price');
                //get database data===============================
                $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$order_id));
                $item_price=$data['order_details']['item_price'];
                $discount_percentage=$data['order_details']['discount_percentage'];
                $total_price=$data['order_details']['total_price'];
                $pin_discount=$data['order_details']['pin_discount'];
                $date_discount_value=$data['order_details']['date_discount_value'];
                //get database data===============================
                //calculation part====================================
                $new_update_price=$n_item_total_price - $old_item_total_price;
                $new_item_price=$item_price + $new_update_price;
                if($discount_percentage){

                    $discount_percent= strstr($discount_percentage, '%', true);

                    $new_percent_value=($new_item_price * $discount_percent) / 100;
                    $update_total_price= $new_item_price - $new_percent_value;
                }else{
                    $new_percent_value=0.00;
                    $update_total_price= $new_item_price - $new_percent_value;
                }
                //calculation part====================================
                if($pin_discount >0){
                    $data=array(
                        'item_price'     => $new_item_price,
                        'pin_discount'   => $new_percent_value,
                        'total_price'    => $update_total_price,
                        'edit_status_modify'    => 1,
                        );
                }elseif($date_discount_value >0){
                    $data=array(
                        'item_price'            => $new_item_price,
                        'date_discount_value'   => $new_percent_value,
                        'total_price'           => $update_total_price,
                        'edit_status_modify'    => 1,
                        );
                }else{
                    $data=array(
                        'item_price'            => $new_item_price,
                        'total_price'           => $update_total_price,
                        'edit_status_modify'    => 1,
                        );
                }
                $queryResult=$this->data_model->update($order_id,'customer_food_order',$data,'order_id');
                if($queryResult){
                    $data1=array(
                        'item_quantity'        => $n_item_quantity,
                        'item_price'           => $old_item_price,
                        'item_total_price'     => $n_item_total_price,
                        );
                    $query=$this->data_model->update($order_history_id,'order_history',$data1,'order_history_id');
                }
                // redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
                if ($query == true) {
                    $this->session->set_flashdata('success_edit', 'Update successful!');
                    redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
                } else {
                    $this->session->set_flashdata('danger_edit', 'Update NOT success');
                    redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
                }
            }
        }
        public function delivery_time_extend(){
            $order_id=$this->input->post('order_id');
            $extend_min=$this->input->post('extend_time');
            $delivery_time=$this->input->post('delivery_time');

            $date = new DateTime($delivery_time);
            $date->add(new DateInterval('PT'.$extend_min.'M'));
            $extend_time=$date->format('g:i A') . "\n";

            $q_data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$order_id));
            $first_delivery_time=$q_data['order_details']['first_delivery_time'];
            //var_dump($first_delivery_time);

            if($first_delivery_time == ''){
               $data_1=array(
                        'first_delivery_time'            => $delivery_time,
                        );
                
                $queryResult_1=$this->data_model->update($order_id,'customer_food_order',$data_1,'order_id'); 
            }

            $data=array(
                        'delivery_time'            => $extend_time,
                        );
                
            $queryResult=$this->data_model->update($order_id,'order_history',$data,'order_id');
            if($queryResult){
                $data1=array(
                        'delivery_time'                         => $extend_time,
                        'delivery_time_modify_status'            => 1,
                        );
                $query1=$this->data_model->update($order_id,'customer_food_order',$data1,'order_id');
            }
            if ($query1 == true) {
                $this->session->set_flashdata('success', 'Update successful!');
                redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            } else {
                $this->session->set_flashdata('danger', 'Update NOT success');
                redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            }
            // redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
        }
        public function add_new_item(){
            $order_id=$this->input->post('order_id');
            $item_id=$this->input->post('item_id');
            $item_quantity=$this->input->post('item_quantity');
            //get all item price and information
            $data['edit_fetch']= $this->data_model->fetch_to_edit('indi_items',$item_id,'item_id');
            $item_name=$data['edit_fetch']['item_name'];
            $single_item_price=$data['edit_fetch']['price'];
            $new_total_price=$single_item_price * $item_quantity;
            //get database data===============================
            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$order_id));
            
            $item_price=$data['order_details']['item_price'];
            $discount_percentage=$data['order_details']['discount_percentage'];
            $total_price=$data['order_details']['total_price'];
            $pin_discount=$data['order_details']['pin_discount'];
            $date_discount_value=$data['order_details']['date_discount_value'];
            $order_date=$data['order_details']['order_date'];
            $order_time=$data['order_details']['order_time'];
            $delivery_date=$data['order_details']['delivery_date'];
            $delivery_time=$data['order_details']['delivery_time'];
            //get database data===============================
            //calculation part====================================
            $new_item_price=$item_price + $new_total_price;
            if($discount_percentage){

                $discount_percent= strstr($discount_percentage, '%', true);

                $new_percent_value=($new_item_price * $discount_percent) / 100;
                $update_total_price= $new_item_price - $new_percent_value;
            }else{
                $new_percent_value=0.00;
                $update_total_price= $new_item_price - $new_percent_value;
            }
            //calculation part====================================
            if($pin_discount >0){
                $data=array(
                    'item_price'     => $new_item_price,
                    'pin_discount'   => $new_percent_value,
                    'total_price'    => $update_total_price,
                    'add_item_modify_status'    => 1,
                    );
            }elseif($date_discount_value >0){
                $data=array(
                    'item_price'            => $new_item_price,
                    'date_discount_value'   => $new_percent_value,
                    'total_price'           => $update_total_price,
                    'add_item_modify_status'    => 1,
                    );
            }else{
                $data=array(
                    'item_price'            => $new_item_price,
                    'total_price'           => $update_total_price,
                    'add_item_modify_status'    => 1,
                    );
            }
            $queryResult=$this->data_model->update($order_id,'customer_food_order',$data,'order_id');
            if($queryResult){
                $data1=array(
                    'order_id'                  => $order_id,
                    'item_id'                   => $item_id,
                    'item_name'                 => $item_name,
                    'item_quantity'             => $item_quantity,
                    'item_price'                => $single_item_price,
                    'item_total_price'          => $new_total_price,
                    'order_date'                => $order_date,
                    'order_time'                => $order_time,
                    'delivery_date'             => $delivery_date,
                    'delivery_time'             => $delivery_time,
                    );
                $query=$this->data_model->insert_data_to_database('order_history',$data1);
            }
            // redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            if ($query == true) {
                $this->session->set_flashdata('success', 'Update successful!');
                redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            } else {
                $this->session->set_flashdata('danger', 'Update NOT success');
                redirect('admin/Dashboard/orderModify/'.$order_id.'/'.'1');
            }
        }
        public function modify_confirmation_and_send_email($orderId=null){
            $data['order_history']= $this->data_model->get_order_history_data($orderId);
            $data['order_details']= $this->data_model->fatch_data_where('customer_food_order',array('order_id'=>$orderId));
            $customer_id=$data['order_details']['customer_id'];
            $email=$data['order_details']['email'];
            $data['customer_details']= $this->data_model->fatch_data_where('customer_info',array('customer_id'=>$customer_id));
            //$data['payment_method']= $this->data_model->fatch_all_data('payment_method');

            require 'class.phpmailer.php';
            $clientmail = new PHPMailer();
            $clientmail->IsSMTP();
            $clientmail->SMTPDebug = 0;
            $clientmail->Debugoutput = 'html';
            $clientmail->Host = "ssl://smtp.gmail.com";
            $clientmail->Port = 465;
            $clientmail->SMTPAuth = true;
            $clientmail->Username = "noreply@serviceontheweb.co.uk";
            $clientmail->Password = "dhaka%002";
            $clientmail->SetFrom('noreply@serviceontheweb.co.uk', "Nawab's Kitchen");
            $clientmail->AddReplyTo('noreply@serviceontheweb.co.uk', "Nawab's Kitchen");

            $clientmail->AddAddress('foysal@serviceontheweb.co.uk');
            $clientmail->AddAddress($email);
            //$clientmail->AddAddress('weborder@nawabskitchen.co.uk');
            $clientmail->Subject = 'Order Modification Mail';
            $body = $this->load->view('admin/email/order_modify_email',$data, TRUE);
                     
            $clientmail->MsgHTML($body);
            $clientmail->AltBody = 'This is a plain-text message body';
            
            $email=$clientmail->Send();
            if($email){
                $data_s=array(
                        'delivery_status_modify'        => 0,
                        'delivery_time_modify_status'   => 0,
                        'add_item_modify_status'        => 0,
                        'edit_status_modify'            => 0,
                        'delete_status_modify'          => 0,
                    );
                $queryResult=$this->data_model->update($orderId,'customer_food_order',$data_s,'order_id');
            }
            if ($queryResult) {
                $this->session->set_flashdata('success', 'Successful Email sent for Order Modifycation!');
                redirect('admin/Dashboard/orderModify/'.$orderId);
            } else {
                $this->session->set_flashdata('danger', 'Not Successful Email sent for Order Modifycation!');
                redirect('admin/Dashboard/orderModify/'.$orderId);
            }
        }

        public function order_delete($id=null){
            if($id):
                $this->db->delete('customer_food_order',array('order_id'=>$id));             
            endif;
            $this->session->set_flashdata('message','Order successfully deleted');                           
            redirect('admin/dashboard/list_order');
        }
		
		//review list, update, status, delete ============= faisal===========

		public function review_list(){
			$this->load->model('data_model');
			$table_name='review';
			$data['review_all'] = $this->data_model->admin_fatch_all_reviews($table_name);
			$data['page']='admin/review/review_view';
			$this->load->view('admin/common/template', $data);
		}
		public function edit_review($id=null){
			if($id):
				if($this->input->post()):
					$form_data=$this->input->post();
					$this->data_model->updates('id',$id,'review',$form_data);
					$this->session->set_flashdata('message', 'Update Successfully');
					redirect('admin/dashboard/review_list','refresh');
				endif;
			$this->load->model('data_model');
			$table_name='review';
			$data['review_data'] = $this->data_model->fatch_data_where($table_name,array('id'=>$id));
			$data['page']='admin/review/review_edit';
			$this->load->view('admin/common/template', $data);
			else:
				redirect('admin/dashboard/review_list');
			endif;
		}
		public function change_review_status(){
			$id=$this->uri->segment(4);
			$curent_status=$this->uri->segment(5);
			$data=$this->data_model->update_review_status($id,$curent_status);
			if($data==true){
				$this->session->set_flashdata('message', 'Successfully change status!');
				redirect('admin/dashboard/review_list');
			}else{
				$this->session->set_flashdata('danger', 'NOT Successfully change status!');
				redirect('admin/dashboard/review_list');
			}
		}
		public function review_delete(){
			$review_id=$this->uri->segment(4);
			$data=$this->data_model->review_delete($review_id);
			if($data==true){
				$this->session->set_flashdata('message', 'Successfully delete!');
				redirect('admin/dashboard/review_list');
			}else{
				$this->session->set_flashdata('danger', 'NOT Successfully delete!');
				redirect('admin/dashboard/review_list');
			}
		}

	}



