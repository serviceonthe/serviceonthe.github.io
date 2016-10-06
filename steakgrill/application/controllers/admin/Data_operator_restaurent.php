<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Data_Operator_Restaurent extends CI_Controller{
		function __construct(){
                    parent::__construct();
                    $this->load->model('data_operator_data_model');
		}
		function add_restaurent(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('res_name','Restaurent name','required');
			$this->form_validation->set_rules('res_address','Restaurent address','required');
			$this->form_validation->set_rules('res_post_code','Restaurent post code','required');
			$this->form_validation->set_rules('res_telephone1','Restaurent telephone 1','required');
			$this->form_validation->set_rules('res_telephone2','Restaurent telephone 2','required');
			$this->form_validation->set_rules('res_fax_number','Restaurent fax number','');
			$this->form_validation->set_rules('res_email','Restaurent email','required');
			$this->form_validation->set_rules('res_web_address','Restaurent web address','required');
			$this->form_validation->set_rules('res_manager_name','Restaurent manager name','');
			$this->form_validation->set_rules('res_manager_contact_number','Restaurent manager contact number','');
			$this->form_validation->set_rules('order_recieving_mail','Order recieving email','required');
			$this->form_validation->set_rules('order_recieving_fax','order recieving fax','');
			$this->form_validation->set_rules('restaurant_listing_status','restaurant_listing_status','');
			$this->form_validation->set_rules('owner_mail_status','owner mail status','required');
			$this->form_validation->set_rules('online_order','online order','required');
			$this->form_validation->set_rules('telephone_order','telephone order','required');
			$this->form_validation->set_rules('delivery_start','delivery_start','required');
			$this->form_validation->set_rules('delivery_end','delivery_end','required');
			$this->form_validation->set_rules('collection_start','collection_start','required');
			$this->form_validation->set_rules('collection_end','collection_end','required');
			$this->form_validation->set_rules('res_short_desc','res_short_desc','required');
			$this->form_validation->set_rules('res_long_desc','res_long_desc','required');
			$this->form_validation->set_rules('res_service_area','res_service_area','required');
			$this->form_validation->set_rules('res_delivery_radius','res_delivery_radius','required');
			$this->form_validation->set_rules('res_cuisine_type','res_cuisine_type','required');
			$this->form_validation->set_rules('res_food_halal','res_food_halal','');
			$this->form_validation->set_rules('res_food_indian','res_food_indian','');
			$this->form_validation->set_rules('res_food_bangladeshi','res_food_bangladeshi','');
			$this->form_validation->set_rules('res_food_pakistan','res_food_pakistan','');
			$this->form_validation->set_rules('res_food_vegetarian','res_food_vegetarian','');
			$this->form_validation->set_rules('res_food_thai','res_food_thai','');
			$this->form_validation->set_rules('res_food_chinese','res_food_chinese','');
			$this->form_validation->set_rules('res_food_italian','res_food_italian','');
			$this->form_validation->set_rules('food_delivery','food_delivery','');
			$this->form_validation->set_rules('food_collection','food_collection','');
			$this->form_validation->set_rules('food_dinning','food_dinning','');
			$this->form_validation->set_rules('delivery_min_time','delivery_min_time','required');
			$this->form_validation->set_rules('delivery_max_time','delivery_max_time','required');
			$this->form_validation->set_rules('minimum_order','minimum_order','required');
			$this->form_validation->set_rules('delivery_charge','delivery_charge','required');
			$this->form_validation->set_rules('res_owner_name','res_owner_name','');
			$this->form_validation->set_rules('res_owner_email','res_owner_email','');
			$this->form_validation->set_rules('res_owner_mobile','res_owner_mobile','');
			$this->form_validation->set_rules('res_bank_name','res_bank_name','');
			$this->form_validation->set_rules('res_account_name','res_account_name','');
			$this->form_validation->set_rules('res_account_number','res_account_number','');
			$this->form_validation->set_rules('res_sort_code','res_sort_code','');
			$this->form_validation->set_rules('res_commission_food','res_commission_food','required');
			$this->form_validation->set_rules('res_commission_person','res_commission_person','required');
			$this->form_validation->set_rules('res_meta_keyword','res_meta_keyword','');
			$this->form_validation->set_rules('res_meta_desc','res_meta_desc','');
			$this->form_validation->set_rules('res_page_title','res_page_title','required');
			$this->form_validation->set_rules('res_google_analytics','res_google_analytics','');
			$this->form_validation->set_rules('urltrip','urltrip','');
			if($this->form_validation->run()===false){
				$this->load->view('admin/data_operator_dashboard/restaurent/add_restaurent');
			}else{
				$table_name="indi_res_info";
                                $res_status=0;
				$data=array(
								'res_name'					=>$this->input->post('res_name'),
								'res_address'				=>$this->input->post('res_address'),
								'res_post_code'				=>$this->input->post('res_post_code'),
								'res_telephone1'			=>$this->input->post('res_telephone1'),
								'res_telephone2'			=>$this->input->post('res_telephone2'),
								'res_fax_number'			=>$this->input->post('res_fax_number'),
								'res_email'					=>$this->input->post('res_email'),
								'res_web_address'			=>$this->input->post('res_web_address'),
								'res_manager_name'			=>$this->input->post('res_manager_name'),
								'res_manager_contact_number'=>$this->input->post('res_manager_contact_number'),
								'order_recieving_mail'		=>$this->input->post('order_recieving_mail'),
								'order_recieving_fax'		=>$this->input->post('order_recieving_fax'),
								'restaurant_listing_status'	=>$this->input->post('restaurant_listing_status'),
								'owner_mail_status'			=>$this->input->post('owner_mail_status'),
								'res_short_desc'			=>$this->input->post('res_short_desc'),
								'res_service_area'			=>$this->input->post('res_service_area'),
								'res_delivery_radius'		=>$this->input->post('res_delivery_radius'),
								'res_cuisine_type'			=>$this->input->post('res_cuisine_type'),
								'res_food_halal'			=>$this->input->post('res_food_halal'),
								'res_food_indian'			=>$this->input->post('res_food_indian'),
								'res_food_bangladeshi'		=>$this->input->post('res_food_bangladeshi'),
								'res_food_pakistan'			=>$this->input->post('res_food_pakistan'),
								'res_food_vegetarian'		=>$this->input->post('res_food_vegetarian'),
								'res_food_thai'				=>$this->input->post('res_food_thai'),
								'res_food_chinese'			=>$this->input->post('res_food_chinese'),
								'res_food_italian'			=>$this->input->post('res_food_italian'),
								'res_long_desc'				=>$this->input->post('res_long_desc'),
								'food_delivery'				=>$this->input->post('food_delivery'),
								'food_collection'			=>$this->input->post('food_collection'),
								'food_dinning'				=>$this->input->post('food_dinning'),
								'delivery_min_time'			=>$this->input->post('delivery_min_time'),
								'delivery_max_time'			=>$this->input->post('delivery_max_time'),
								'res_owner_name'			=>$this->input->post('res_owner_name'),
								'res_owner_email'			=>$this->input->post('res_owner_email'),
								'res_owner_mobile'			=>$this->input->post('res_owner_mobile'),
								'res_bank_name'				=>$this->input->post('res_bank_name'),
								'res_account_name'			=>$this->input->post('res_account_name'),
								'res_account_number'		=>$this->input->post('res_account_number'),
								'res_sort_code'				=>$this->input->post('res_sort_code'),
								'res_commission_food'		=>$this->input->post('res_commission_food'),
								'res_commission_person'		=>$this->input->post('res_commission_person'),
								'res_meta_desc'				=>$this->input->post('res_meta_desc'),
								'res_meta_keyword'			=>$this->input->post('res_meta_keyword'),
								'res_page_title'			=>$this->input->post('res_page_title'),
								'res_google_analytics'		=>$this->input->post('res_google_analytics'),
								'minimum_order'				=>$this->input->post('minimum_order'),
								'delivery_charge'			=>$this->input->post('delivery_charge'),
								'delivery_start'			=>$this->input->post('delivery_start'),
								'delivery_end'				=>$this->input->post('delivery_end'),
								'collection_start'			=>$this->input->post('collection_start'),
								'collection_end'			=>$this->input->post('collection_end'),
								'urltrip'					=>$this->input->post('urltrip'),
								'telephone_order'			=>$this->input->post('telephone_order'),
								'online_order'				=>$this->input->post('online_order'),
                                'user_email'			    =>$this->session->userdata('user_email'),
                                'user_type'				    =>$this->session->userdata('user_type'),
                                'res_status'				=>$res_status
							);
                $sess_data['res_name']=$this->input->post('res_name');
                $sess_data['res_cuisine_type']=$this->input->post('res_cuisine_type');
                $sess_data['last_insert_id']=$this->data_operator_data_model->insert_restaurent($table_name,$data);
                $this->session->set_userdata($sess_data);
                redirect('admin/data_operator_dashboard/add_restaurent_feature_info');
               // $this->load->view('admin/restaurent/add_restaurent_feature_info');
			}
		}
        /*
        function gallery()
        {
                $data['value']='res';
                $data['sub_value']= 'a';
                $res_id = $this->uri->segment(3);
                $image_crud = new image_CRUD();
                $image_crud->set_primary_key_field('id');
                $image_crud->set_url_field('url');
                $image_crud->set_title_field('title');
                $image_crud->set_table('indi_gallery_image')
                    ->set_ordering_field('priority')
                    ->set_image_path('assets/uploads');
                $output = $image_crud->render();
                //$this->_example_output($output);
                $this->load->model('restaurant_model');
                $data['res_id'] = $this->uri->segment(3);
                $data['value']='res';
                $data['sub_value']= 'a';
                $this->load->view('admin/g_header');
                $this->load->view('admin/sidebar',$data);
                $this->load->view('restaurant_reg/res_gallery',$output);
                $this->load->view('admin/footer');
            //$this->load->view('example.php',$output);
        }
        function simple_photo_gallery()
        {
            $image_crud = new image_CRUD();
            $image_crud->unset_upload();
            $image_crud->unset_delete();
            $image_crud->set_primary_key_field('id');
            $image_crud->set_url_field('url');
            $image_crud->set_table('example_4')
                ->set_image_path('assets/uploads');
            $output = $image_crud->render();
            $this->_example_output($output);
        }
        */
        function add_restaurent_feature_info()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('food_hygiene_rating', 'food_hygiene_rating', 'required');
            $this->form_validation->set_rules('car_parking', 'car_parking', '');
            $this->form_validation->set_rules('air', 'air', '');
            $this->form_validation->set_rules('access', 'access', '');
            $this->form_validation->set_rules('live_music', 'live_music', '');
            $this->form_validation->set_rules('bar', 'bar', '');
            $this->form_validation->set_rules('event', 'event', '');
            $this->form_validation->set_rules('romantic_dinner', 'romantic_dinner', '');
            $this->form_validation->set_rules('smoking', 'smoking', '');
            $this->form_validation->set_rules('party_booking', 'party_booking', '');
            $this->form_validation->set_rules('service', 'service', '');
            $this->form_validation->set_rules('atmosphere', 'atmosphere', '');
            $this->form_validation->set_rules('buffet', 'buffet', '');
            $this->form_validation->set_rules('day_buffet', 'day_buffet', '');
            $this->form_validation->set_rules('olive_oil', 'olive_oil', '');
            $this->form_validation->set_rules('notice', 'notice', '');
            $this->form_validation->set_rules('breakfast', 'breakfast', '');
            $this->form_validation->set_rules('lunch', 'lunch', '');
            $this->form_validation->set_rules('dinner', 'dinner', '');
            $this->form_validation->set_rules('res_id', 'res_id', 'required');
            $this->form_validation->set_rules('res_name', 'res_name', 'required');
            $this->form_validation->set_rules('res_cuisine_type', 'res_cuisine_type', 'required');
            if ($this->form_validation->run() === false) {
                $this->load->view('admin/data_operator_dashboard/restaurent/add_restaurent_feature_info');
            } else {
                $table_name = "indi_feature_info";
                $data = array(
                    'food_hygiene_rating'   => $this->input->post('food_hygiene_rating'),
                    'car_parking'           => $this->input->post('car_parking'),
                    'air'                   => $this->input->post('air'),
                    'access'                => $this->input->post('access'),
                    'live_music'            => $this->input->post('live_music'),
                    'bar'                   => $this->input->post('bar'),
                    'event'                 => $this->input->post('event'),
                    'romantic_dinner'       => $this->input->post('romantic_dinner'),
                    'smoking'               => $this->input->post('smoking'),
                    'party_booking'         => $this->input->post('party_booking'),
                    'service'               => $this->input->post('service'),
                    'atmosphere'             => $this->input->post('atmosphere'),
                    'buffet'                => $this->input->post('buffet'),
                    'day_buffet'            => $this->input->post('day_buffet'),
                    'olive_oil'             => $this->input->post('olive_oil'),
                    'notice'                => $this->input->post('notice'),
                    'breakfast'             => $this->input->post('breakfast'),
                    'lunch'                 => $this->input->post('lunch'),
                    'dinner'                => $this->input->post('dinner'),
                    'res_id'                => $this->input->post('res_id'),
                    'res_name'              => $this->input->post('res_name'),
                    'res_cuisine_type'      => $this->input->post('res_cuisine_type'),
                    'user_email'            =>$this->session->userdata('user_email'),
                    'user_type'             =>$this->session->userdata('user_type')
                );
                    //$feature_info=$this->data_operator_data_model->insert_data_to_database($table_name, $data);

                $business_day = $this->input->post('business_day');
                $first_shift_start = $this->input->post('first_shift_start');
                $first_shift_end = $this->input->post('first_shift_end');
                $second_shift_start = $this->input->post('second_shift_start');
                $second_shift_end = $this->input->post('second_shift_end');
                $res_id = $this->input->post('res_id');
                $res_name = $this->input->post('res_name');
                $res_cuisine_type = $this->input->post('res_cuisine_type');
                $user_email= $this->session->userdata('user_email');
                $user_type= $this->session->userdata('user_type');
                $count = count($this->input->post('first_shift_start'));
                for ($i = 0; $i < $count; $i++){
                    $business_data[] = array(
                        'business_day'                          => $business_day[$i],
                        'first_shift_start'                     => $first_shift_start[$i],
                        'first_shift_end'                       => $first_shift_end[$i],
                        'second_shift_start'                    => $second_shift_start[$i],
                        'second_shift_end'                      => $second_shift_end[$i],
                        'res_id'                                => $res_id,
                        'res_name'                              => $res_name,
                        'res_cuisine_type'                      => $res_cuisine_type,
                        'user_email'                            => $user_email,
                        'user_type'                             => $user_type,
                         );
                    }
                $this->db->insert_batch('business_hours', $business_data);
                $this->data_operator_data_model->insert_data_to_database($table_name, $data);
                //$this->session->set_userdata($sess_data);
                //redirect('admin/data_operator_restaurent/signature_item');
                if ($data['res_cuisine_type'] == 'indian') {
                    //$this->restaurent_menu_setting();
                    $this->menu_manage();
                } else {
                    $this->cuisine_category_menu_setting();
                }
            }
        }
		function cuisine_item_menu_setting(){
			$this->load->view('admin/data_operator_dashboard/restaurent/cuisine_item_menu_setting');
		}
		function add_cuisine_item($sess_data){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('cuisine_item_category','cuisine_item_category','');
			$this->form_validation->set_rules('cuisine_item_name','cuisine_item_name','');
			$this->form_validation->set_rules('cuisine_item_short_discription','cuisine_item_short_discription','');
			$this->form_validation->set_rules('cuisine_item_alergy_notification','cuisine_item_alergy_notification','');
			$this->form_validation->set_rules('cuisine_item_calorie_information','cuisine_item_calorie_information','');
			$this->form_validation->set_rules('cuisine_item_price','cuisine_item_price','');
			$this->form_validation->set_rules('cuisine_item_image','cuisine_item_image','');
            $this->form_validation->set_rules('res_id', 'res_id', 'required');
            $this->form_validation->set_rules('res_name', 'res_name', 'required');
            $this->form_validation->set_rules('res_cuisine_type', 'res_cuisine_type', 'required');
			if($this->form_validation->run()===false){
				$this->cuisine_item_menu_setting();
			}else{
                $cuisine_item_name = $this->input->post('cuisine_item_name');
                $cuisine_item_short_discription = $this->input->post('cuisine_item_short_discription');
                $cuisine_item_alergy_notification = $this->input->post('cuisine_item_alergy_notification');
                $cuisine_item_calorie_information = $this->input->post('cuisine_item_calorie_information');
                $cuisine_item_price = $this->input->post('cuisine_item_price');
                $cuisine_item_category = $this->input->post('cuisine_item_category');
                $res_id = $this->input->post('res_id');
                $res_name = $this->input->post('res_name');
                $res_cuisine_type = $this->input->post('res_cuisine_type');
                $user_email= $this->session->userdata('user_email');
                $user_type= $this->session->userdata('user_type');
                $count = count($this->input->post('cuisine_item_name'));
                for ($i = 0; $i < $count; $i++){
                    $data[] = array(
                        'cuisine_item_category'                 => $cuisine_item_category[$i],
                        'cuisine_item_name'                     => $cuisine_item_name[$i],
                        'cuisine_item_short_discription'        => $cuisine_item_short_discription[$i],
                        'cuisine_item_alergy_notification'      => $cuisine_item_alergy_notification[$i],
                        'cuisine_item_calorie_information'      => $cuisine_item_calorie_information[$i],
                        'cuisine_item_price'                    => $cuisine_item_price[$i],
                        'res_id'                                => $res_id,
                        'res_name'                              => $res_name,
                        'res_cuisine_type'                      => $res_cuisine_type,
                        'user_email'                            => $user_email,
                        'user_type'                             => $user_type,
                    );
                }
                $this->db->insert_batch('cuisine_item', $data);
                $this->session->unset_userdata($sess_data);
               //$this->load->view('admin/data_operator_dashboard/cuisine_item_menu_setting');
                redirect('admin/data_operator_dashboard/home');
			}
		}
		function cuisine_category_menu_setting(){
			$this->load->view('admin/data_operator_dashboard/restaurent/cuisine_category_menu_setting');
		}
		function add_cuisine_category(){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('cuisine_type_category_name','cuisine_type_category_name','required');
			$this->form_validation->set_rules('cuisine_type_category_short_description','cuisine_type_category_short_description','');
			if($this->form_validation->run()===false){
				$this->cuisine_category_menu_setting();
			}else{
				$table_name="cuisine_type_category";
				$data=array(
                            'cuisine_type_category_name'				=>$this->input->post('cuisine_type_category_name'),
                            'cuisine_type_category_short_description'	=>$this->input->post('cuisine_type_category_short_description'),
                            'user_email'			                    =>$this->session->userdata('user_email'),
                            'user_type'				                    =>$this->session->userdata('user_type')
							);
				$this->data_operator_data_model->insert_data_to_database($table_name,$data);
				$this->cuisine_category_menu_setting();
			}
		}
        function signature_item(){
            $this->load->view('admin/data_operator_dashboard/restaurent/add_signature_item');
        }
        function add_signature_item()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_name', 'item_name', 'required');
            $this->form_validation->set_rules('item_short_description', 'item_short_description', '');
            $this->form_validation->set_rules('alergy_notice', 'alergy_notice', '');
            $this->form_validation->set_rules('item_price', 'item_price', 'required');
            $this->form_validation->set_rules('catagory_id', 'catagory_id', '');
            $this->form_validation->set_rules('res_id', 'res_id', 'required');
            $this->form_validation->set_rules('res_name', 'res_name', 'required');
            $this->form_validation->set_rules('res_cuisine_type', 'res_cuisine_type', 'required');
            if ($this->form_validation->run() === false) {
                $this->signature_item();
            } else {
                $table_name = "signature_item";
                $data = array(
                    'item_name'                 => $this->input->post('item_name'),
                    'item_short_description'    => $this->input->post('item_short_description'),
                    'alergy_notice'             => $this->input->post('alergy_notice'),
                    'item_price'                => $this->input->post('item_price'),
                    'catagory_id'               => $this->input->post('catagory_id'),
                    'res_id'                    => $this->input->post('res_id'),
                    'res_name'                  => $this->input->post('res_name'),
                    'res_cuisine_type'          => $this->input->post('res_cuisine_type'),
                    'user_email'			    =>$this->session->userdata('user_email'),
                    'user_type'				    =>$this->session->userdata('user_type')
                );
                $this->data_operator_data_model->insert_data_to_database($table_name, $data);
                redirect('admin/data_operator_restaurent/signature_item');
            }
        }
        //function add_signature_item_by_a_restaurent(){
            //$this->load->view('admin/data_operator_dashboard/restaurent/add_signature_item');
        //}
        function add_signature_item_by_a_restaurent()
        {
            $data['res_id']=$this->uri->segment(4);
            //echo $res_id;exit;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_name', 'item_name', 'required');
            $this->form_validation->set_rules('item_short_description', 'item_short_description', '');
            $this->form_validation->set_rules('alergy_notice', 'alergy_notice', '');
            $this->form_validation->set_rules('item_price', 'item_price', 'required');
            $this->form_validation->set_rules('catagory_id', 'catagory_id', '');
            $this->form_validation->set_rules('res_id', 'res_id', 'required');
            $this->form_validation->set_rules('res_name', 'res_name', 'required');
            $this->form_validation->set_rules('res_cuisine_type', 'res_cuisine_type', '');
            if ($this->form_validation->run() === false) {
                $this->load->view('admin/data_operator_dashboard/restaurent/add_signature_item_by_a_restaurent',$data);
            } else {
                $table_name = "signature_item";
                $res_cuisine_type='indian';
                $res_id=$this->input->post('res_id');
                $data = array(
                    'item_name'                 => $this->input->post('item_name'),
                    'item_short_description'    => $this->input->post('item_short_description'),
                    'alergy_notice'             => $this->input->post('alergy_notice'),
                    'item_price'                => $this->input->post('item_price'),
                    'catagory_id'               => $this->input->post('catagory_id'),
                    'res_id'                    => $this->input->post('res_id'),
                    'res_name'                  => $this->input->post('res_name'),
                    'res_cuisine_type'          => $res_cuisine_type,
                    'user_email'		=>$this->session->userdata('user_email'),
                    'user_type'			=>$this->session->userdata('user_type')
                );
                $this->data_operator_data_model->insert_data_to_database($table_name, $data);
                redirect('admin/data_operator_food/fatch_signature_item_by_a_restaurent/'.$res_id);
            }
        }
        function view_signature_item(){
            $column_value=$this->session->userdata('res_name');
            $data['signature'] = $this->data_operator_data_model->view_signature_item($column_value);
            $this->load->view('admin/data_operator_dashboard/restaurent/view_signature',$data);
        }
        function restaurent_menu_setting(){
            $data['results']=$this->data_operator_data_model->fatch_restaurent_menu_setting();
            $this->load->view('admin/data_operator_dashboard/restaurent/restaurent_menu_setting', $data);
        }
		function restaurent_menu_setting_complate(){
            $menu_restaurent_relation_menu_id = $this->input->post('menu_restaurent_relation_menu_id');
            //print_r($menu_restaurent_relation_menu_id); exit;
            $menu_restaurant_relation_price = $this->input->post('menu_restaurant_relation_price');
            //print_r($menu_restaurant_relation_price); exit;
            $menu_restaurent_relation_restaurent_id = $this->input->post('res_id');
            $count = count($this->input->post('menu_restaurant_relation_price'));
               //print_r($count1); exit;
            for ($i = 0; $i < $count; $i++){
                $data[] = array(
                    'menu_restaurant_relation_restaurant_id'            => $menu_restaurent_relation_restaurent_id,
                    'menu_restaurant_relation_menu_id'                  => $menu_restaurent_relation_menu_id[$i],
                    'menu_restaurant_relation_price'                    => $menu_restaurant_relation_price[$i],
                    'user_email'			                            => $this->session->userdata('user_email'),
                    'user_type'				                            => $this->session->userdata('user_type')
                );
            }
            $this->db->insert_batch('indi_menu_restaurant_relation', $data);
            //$this->session->unset_userdata($sess_data);
            //$this->load->view('admin/data_operator_dashboard/home');
            redirect('admin/data_operator_restaurent/restaurent_menu_setting');
		}
        function restaurent_menu_setting_complate_by_filter(){
            $menu_restaurent_relation_menu_id = $this->input->post('menu_restaurent_relation_menu_id');
            $menu_restaurant_relation_price = $this->input->post('menu_restaurant_relation_price');
            $menu_restaurent_relation_restaurent_id = $this->input->post('res_id');
            $count = count($this->input->post('menu_restaurant_relation_price'));
            for ($i = 0; $i < $count; $i++){
                $data[] = array(
                    'menu_restaurant_relation_restaurant_id'            => $menu_restaurent_relation_restaurent_id,
                    'menu_restaurant_relation_menu_id'                  => $menu_restaurent_relation_menu_id[$i],
                    'menu_restaurant_relation_price'                    => $menu_restaurant_relation_price[$i],
                    'user_email'			                            =>$this->session->userdata('user_email'),
                    'user_type'				                            =>$this->session->userdata('user_type')
                );
            }
            $this->db->insert_batch('indi_menu_restaurant_relation', $data);
            //$this->session->unset_userdata($sess_data);
            //$this->load->view('admin/data_operator_dashboard/home');
            redirect('admin/data_operator_restaurent/menu_filter_by_category');
        }

        function finish_restaurent_entry($sess_data){
            //pirnt_r($sess_data); exit;
            $this->session->unset_userdata($sess_data);
            //$this->load->view('admin/data_operator_dashboard/home');
            redirect('admin/data_operator_dashboard/home');
        }



        /**************************** start fatch data for data model (database)***********************************/
        function menu_filter_by_category(){
            $table_name='indi_items';
            $category_id=$this->input->post('menu_filter_by_category_id');
            //echo $category_id;
           // echo $table_name; exit;
            $data['filter']=$this->data_operator_data_model->menu_filter_by_category($category_id,$table_name);
            $this->load->view('admin/data_operator_dashboard/restaurent/restaurent_menu_setting_filter', $data);
        }
        function category_filter(){
            $table_name='cuisine_item';
            $category_name=$this->input->post('cuisine_item_category');
            $data['filter']=$this->data_operator_data_model->category_filter($category_name,$table_name);
            $this->load->view('admin/data_operator_dashboard/restaurent/cuisine_item_menu_setting', $data);
        }
	function fatch_restaurent(){
			$table_name='indi_res_info';
            $column_name=$this->session->userdata('user_email');
			$data['all_restaurent']=$this->data_operator_data_model->fatch_all_data_by_user_email($table_name,$column_name);
			$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent', $data);
		}
        function fatch_restaurent_feature_information(){
            $table_name='indi_feature_info';
            $column_name=$this->session->userdata('user_email');
            $data['all_feature_info']=$this->data_operator_data_model->fatch_all_data_by_user_email($table_name,$column_name);
            $this->load->view('admin/data_operator_dashboard/restaurent/restaurent_feature_information_detail', $data);
        }
        //**************************************** edit operation start hare***************************
        function restaurent_edit(){
            $table="indi_res_info";
            $table_id="res_id";
            if(isset($_GET['d_edit']))
            {
                $id=$_GET['d_edit'];
                //echo $id; exit;
                $data['edit_fetch']=$this->data_operator_data_model->fetch_to_edit($table,$id,$table_id);
                $this->load->view('admin/data_operator_dashboard/restaurent/edit_restaurent',$data);
            }
        }
        function restaurent_update(){
            $table_name="indi_res_info";
            $table_id="res_id";
            $id=$this->input->post('res_id');
            $data=array(
                'res_name'					=>$this->input->post('res_name'),
                'res_address'				=>$this->input->post('res_address'),
                'res_post_code'				=>$this->input->post('res_post_code'),
                'res_telephone1'			=>$this->input->post('res_telephone1'),
                'res_telephone2'			=>$this->input->post('res_telephone2'),
                'res_fax_number'			=>$this->input->post('res_fax_number'),
                'res_email'					=>$this->input->post('res_email'),
                'res_web_address'			=>$this->input->post('res_web_address'),
                'res_manager_name'			=>$this->input->post('res_manager_name'),
                'res_manager_contact_number'=>$this->input->post('res_manager_contact_number'),
                'order_recieving_mail'		=>$this->input->post('order_recieving_mail'),
                'order_recieving_fax'		=>$this->input->post('order_recieving_fax'),
                'restaurant_listing_status'	=>$this->input->post('restaurant_listing_status'),
                'owner_mail_status'			=>$this->input->post('owner_mail_status'),
                'res_short_desc'			=>$this->input->post('res_short_desc'),
                'res_service_area'			=>$this->input->post('res_service_area'),
                'res_delivery_radius'		=>$this->input->post('res_delivery_radius'),
                'res_cuisine_type'			=>$this->input->post('res_cuisine_type'),
                'res_food_halal'			=>$this->input->post('res_food_halal'),
                'res_food_indian'			=>$this->input->post('res_food_indian'),
                'res_food_bangladeshi'		=>$this->input->post('res_food_bangladeshi'),
                'res_food_pakistan'			=>$this->input->post('res_food_pakistan'),
                'res_food_vegetarian'		=>$this->input->post('res_food_vegetarian'),
                'res_food_thai'				=>$this->input->post('res_food_thai'),
                'res_food_chinese'			=>$this->input->post('res_food_chinese'),
                'res_food_italian'			=>$this->input->post('res_food_italian'),
                'res_long_desc'				=>$this->input->post('res_long_desc'),
                'food_delivery'				=>$this->input->post('food_delivery'),
                'food_collection'			=>$this->input->post('food_collection'),
                'food_dinning'				=>$this->input->post('food_dinning'),
                'delivery_min_time'			=>$this->input->post('delivery_min_time'),
                'delivery_max_time'			=>$this->input->post('delivery_max_time'),
                'res_owner_name'			=>$this->input->post('res_owner_name'),
                'res_owner_email'			=>$this->input->post('res_owner_email'),
                'res_owner_mobile'			=>$this->input->post('res_owner_mobile'),
                'res_bank_name'				=>$this->input->post('res_bank_name'),
                'res_account_name'			=>$this->input->post('res_account_name'),
                'res_account_number'		=>$this->input->post('res_account_number'),
                'res_sort_code'				=>$this->input->post('res_sort_code'),
                'res_commission_food'		=>$this->input->post('res_commission_food'),
                'res_commission_person'		=>$this->input->post('res_commission_person'),
                'res_meta_desc'				=>$this->input->post('res_meta_desc'),
                'res_meta_keyword'			=>$this->input->post('res_meta_keyword'),
                'res_page_title'			=>$this->input->post('res_page_title'),
                'res_google_analytics'		=>$this->input->post('res_google_analytics'),
                'minimum_order'				=>$this->input->post('minimum_order'),
                'delivery_charge'			=>$this->input->post('delivery_charge'),
                'delivery_start'			=>$this->input->post('delivery_start'),
                'delivery_end'				=>$this->input->post('delivery_end'),
                'collection_start'			=>$this->input->post('collection_start'),
                'collection_end'			=>$this->input->post('collection_end'),
                'urltrip'					=>$this->input->post('urltrip'),
                'telephone_order'			=>$this->input->post('telephone_order'),
                'online_order'				=>$this->input->post('online_order'),
                'user_email'			    =>$this->session->userdata('user_email'),
                'user_type'				    =>$this->session->userdata('user_type')
            );
            $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/data_operator_restaurent/fatch_restaurent');
        }
        function restaurent_delete(){
            $table_name='indi_res_info';
            $res_id=$this->uri->segment(4);
            //echo $res_id; exit;
            $this->data_operator_data_model->delete_data($table_name,$res_id);
            //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent');
            redirect('admin/data_operator_restaurent/fatch_restaurent');
        }
        function edit_menu_management_by_list_restaurent(){
            if(isset($_GET['d_edit']))
            {
                $res_id=$_GET['d_edit'];
                //echo $data; exit;
                $data['edit_fetch']=$this->data_operator_data_model->fatch_menu_management_by_list_restaurent($res_id);
                $this->load->view('admin/data_operator_dashboard/restaurent/menu_management_by_list_restaurent',$data);
            }
        }
        function update_menu_management_by_list_restaurent(){
            $table_name="indi_res_info";
            $table_id="res_id";
            $id=$this->input->post('res_id');
            $data=array(
                'res_name'					=>$this->input->post('res_name'),
                'res_address'				=>$this->input->post('res_address'),
                'res_post_code'				=>$this->input->post('res_post_code'),
                'res_telephone1'			=>$this->input->post('res_telephone1'),
                'res_telephone2'			=>$this->input->post('res_telephone2'),
                'res_fax_number'			=>$this->input->post('res_fax_number'),
                'res_email'					=>$this->input->post('res_email'),
                'res_web_address'			=>$this->input->post('res_web_address'),
                'res_manager_name'			=>$this->input->post('res_manager_name'),
                'res_manager_contact_number'=>$this->input->post('res_manager_contact_number'),
                'order_recieving_mail'		=>$this->input->post('order_recieving_mail'),
                'order_recieving_fax'		=>$this->input->post('order_recieving_fax'),
                'restaurant_listing_status'	=>$this->input->post('restaurant_listing_status'),
                'owner_mail_status'			=>$this->input->post('owner_mail_status'),
                'res_short_desc'			=>$this->input->post('res_short_desc'),
                'res_service_area'			=>$this->input->post('res_service_area'),
                'res_delivery_radius'		=>$this->input->post('res_delivery_radius'),
                'res_cuisine_type'			=>$this->input->post('res_cuisine_type'),
                'res_food_halal'			=>$this->input->post('res_food_halal'),
                'res_food_indian'			=>$this->input->post('res_food_indian'),
                'res_food_bangladeshi'		=>$this->input->post('res_food_bangladeshi'),
                'res_food_pakistan'			=>$this->input->post('res_food_pakistan'),
                'res_food_vegetarian'		=>$this->input->post('res_food_vegetarian'),
                'res_food_thai'				=>$this->input->post('res_food_thai'),
                'res_food_chinese'			=>$this->input->post('res_food_chinese'),
                'res_food_italian'			=>$this->input->post('res_food_italian'),
                'res_long_desc'				=>$this->input->post('res_long_desc'),
                'food_delivery'				=>$this->input->post('food_delivery'),
                'food_collection'			=>$this->input->post('food_collection'),
                'food_dinning'				=>$this->input->post('food_dinning'),
                'delivery_min_time'			=>$this->input->post('delivery_min_time'),
                'delivery_max_time'			=>$this->input->post('delivery_max_time'),
                'res_owner_name'			=>$this->input->post('res_owner_name'),
                'res_owner_email'			=>$this->input->post('res_owner_email'),
                'res_owner_mobile'			=>$this->input->post('res_owner_mobile'),
                'res_bank_name'				=>$this->input->post('res_bank_name'),
                'res_account_name'			=>$this->input->post('res_account_name'),
                'res_account_number'		=>$this->input->post('res_account_number'),
                'res_sort_code'				=>$this->input->post('res_sort_code'),
                'res_commission_food'		=>$this->input->post('res_commission_food'),
                'res_commission_person'		=>$this->input->post('res_commission_person'),
                'res_meta_desc'				=>$this->input->post('res_meta_desc'),
                'res_meta_keyword'			=>$this->input->post('res_meta_keyword'),
                'res_page_title'			=>$this->input->post('res_page_title'),
                'res_google_analytics'		=>$this->input->post('res_google_analytics'),
                'minimum_order'				=>$this->input->post('minimum_order'),
                'delivery_charge'			=>$this->input->post('delivery_charge'),
                'delivery_start'			=>$this->input->post('delivery_start'),
                'delivery_end'				=>$this->input->post('delivery_end'),
                'collection_start'			=>$this->input->post('collection_start'),
                'collection_end'			=>$this->input->post('collection_end'),
                'urltrip'					=>$this->input->post('urltrip'),
                'telephone_order'			=>$this->input->post('telephone_order'),
                'online_order'				=>$this->input->post('online_order'),
                'user_email'			    =>$this->session->userdata('user_email'),
                'user_type'				    =>$this->session->userdata('user_type')
            );
            $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/data_operator_restaurent/fatch_restaurent');
        }

        function signature_item_edit(){
            $table="signature_item";
            $table_id="signature_item_id";
            if(isset($_GET['d_edit']))
            {
                $id=$_GET['d_edit'];
                $data['edit_fetch']=$this->data_operator_data_model->fetch_to_edit($table,$id,$table_id);
                $this->load->view('admin/data_operator_dashboard/restaurent/edit_signature_item',$data);
            }
        }
        function signature_item_update(){
            $table_name="signature_item";
            $table_id="signature_item_id";
            $id=$this->input->post('signature_item_id');
            $data=array(
                'item_name'					    =>$this->input->post('item_name'),
                'item_short_description'		=>$this->input->post('item_short_description'),
                'alergy_notice'				    =>$this->input->post('alergy_notice'),
                'item_price'			        =>$this->input->post('item_price'),
                'res_id'			            =>$this->input->post('res_id'),
                'res_name'			            =>$this->input->post('res_name'),
                'res_cuisine_type'				=>$this->input->post('res_cuisine_type')
            );
            $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/data_operator_restaurent/view_signature_item');
        }
        function signature_item_delete(){
            $table_name='signature_item';
            $signature_item_id=$this->uri->segment(4);
            //echo $res_id; exit;
            $this->data_operator_data_model->delete_signature_item_by_a_restaurent($table_name,$signature_item_id);
            //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent');
            redirect('admin/data_operator_restaurent/view_signature_item');
        }


































        public function select_menu()  
        {
            if($this->session->userdata('logged_in') == TRUE && ($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2))
            {
                $restaurant_id = $this->uri->segment(3);
                $data['restaurant'] = $this->frestaurant_model->get_a_restaurant($restaurant_id);
                $data['menus'] = $this->frestaurant_model->get_menus();
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                $this->load->view('select_menu',$data);
                $this->load->view('admin/footer');
            }
            else
            {
                redirect('dashboard');
            }
        }


        public function add_menu_price()
        {
            //$restaurant_id = $this->input->post('restaurant_id');
            $restaurant_id = $this->input->post('restaurant_id');
            $price = $this->input->post('price');
            $menu_id = $this->input->post('item_id');  
            

            $result = $this->data_operator_data_model->add_menu_price($restaurant_id,$price,$menu_id);
            if($result)
            {
                $this->session->set_flashdata('success','Price Updated successfully.');
                redirect('admin/data_operator_restaurent/menu_manage');
            }
            else
            {
                //$this->session->set_flashdata('danger','Price not Updated.');
                //redirect('user/menu_manage/'.$restaurant_id);

               echo "Dont submit!!";

            }

        }
        public function add_menu_price_by_a_restaurent()
        {
                    $restaurant_id = $this->input->post('restaurant_id');
                    $price = $this->input->post('price');
                    $menu_id = $this->input->post('item_id');  
                    //$sess_data['last_insert_id'] = $restaurant_id;
                    //$this->session->set_userdata($sess_data);
                    //echo $last_insert_id=$this->session->userdata('last_insert_id');exit;
                    
                    $result = $this->data_operator_data_model->add_menu_price_by_a_restaurent($restaurant_id,$price,$menu_id);
                    if($result)
                    {
                        $this->session->set_flashdata('success','Price Updated successfully.');
                        
                        redirect('admin/data_operator_restaurent/menu_manage_by_a_restaurent/'.$restaurant_id);
                        //redirect($current_url);
                    }
                
                    else
                    {
                    //$this->session->set_flashdata('danger','Price not Updated.');
                    //redirect('user/menu_manage/'.$restaurant_id);

                   echo "Dont submit!!";

                    }
              
        }
        
        
        public function search_add_menu_price()   
        {

            //$restaurant_id = $this->input->post('restaurant_id');
            $restaurant_id = $this->input->post('restaurant_id');
            $price = $this->input->post('menu_restaurant_relation_price');
            $menu_id = $this->input->post('item_id'); 
						
            $result = $this->data_operator_data_model->search_add_menu_price($restaurant_id,$price,$menu_id);
			
            if($result)
            {
                $this->session->set_flashdata('success','Price Added successfully.');
                redirect('admin/data_operator_restaurent/menu_manage');            
                
            }
            else
            {
                //$this->session->set_flashdata('danger','Price not Updated.');
                //redirect('user/menu_manage/'.$restaurant_id);

               echo "Dont submit!!";

            }

        }
        
        
         public function search_update_menu_price()   
        {
		    
            $menu_restaurant_relation_id = $this->input->post('menu_restaurant_relation_id');
            $restaurant_id = $this->input->post('restaurant_id');
            $price = $this->input->post('menu_restaurant_relation_price');
            $menu_id = $this->input->post('item_id');
            $result = $this->data_operator_data_model->search_update_menu_price($menu_restaurant_relation_id,$restaurant_id,$price,$menu_id);
            if($result)
            {
                $this->session->set_flashdata('success','Price Updated successfully.');
                redirect('admin/data_operator_restaurent/menu_manage');
            }
            else
            {
                //$this->session->set_flashdata('danger','Price not Updated.');
                //redirect('user/menu_manage/'.$restaurant_id);

               echo "Dont submit!!";

            }

        }
        


        //update price of items of a restaurant
        public function change_item_price()
        {

                if($_POST)
                {
                    $item_id = $this->input->post('item_id');
                    $restaurant_id = $this->input->post('restaurant_id');
                    $item_price = $this->input->post('item_price');
                    $current_url = $this->input->post('current_url');

                    $result = $this->data_operator_data_model->update_item_price($restaurant_id,$item_id,$item_price);
                    if($result)
                    {
                        $this->session->set_flashdata('success','Price updated Successfully');
                        redirect($current_url);
                    }
                    else
                    {
                        $this->session->set_flashdata('danger','Price not updated.');
                        redirect($current_url);
                    }
                }
//                else
//                {
//                    $restaurant_id = $this->uri->segment(3);
//                    $item_id = $this->uri->segment(4);
//                    $data['results'] = $this->frestaurant_model->get_item_price($restaurant_id,$item_id);
//                    $this->load->view('admin/header');
//                    $this->load->view('admin/sidebar');
//                    $this->load->view('admin/item_price_edit',$data);
//                    $this->load->view('admin/footer');
//                }

        }
        public function change_item_price_by_a_restaurent()
        {

                if($_POST)
                {
                    $item_id = $this->input->post('item_id');
                    $restaurant_id = $this->input->post('restaurant_id');
                    $item_price = $this->input->post('item_price');
                    $current_url = $this->input->post('current_url');

                    $result = $this->data_operator_data_model->update_item_price_by_a_restaurent($restaurant_id,$item_id,$item_price);
                    if($result)
                    {
                        $this->session->set_flashdata('success','Price updated Successfully');
                        redirect($current_url);
                    }
                    else
                    {
                        $this->session->set_flashdata('danger','Price not updated.');
                        redirect($current_url);
                    }
                }
//                else
//                {
//                    $restaurant_id = $this->uri->segment(3);
//                    $item_id = $this->uri->segment(4);
//                    $data['results'] = $this->frestaurant_model->get_item_price($restaurant_id,$item_id);
//                    $this->load->view('admin/header');
//                    $this->load->view('admin/sidebar');
//                    $this->load->view('admin/item_price_edit',$data);
//                    $this->load->view('admin/footer');
//                }

        }


        public function search_menu()
        {
            if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('user_type') == 1)
            {
                $value = $this->input->post('search');
                $data['page'] = 0;
                $data['menus'] = $this->frestaurant_model->search_item($value);
                $data["links"] = '';
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar');
                $this->load->view('menus',$data);
                $this->load->view('admin/footer');
            }
            else
            {
                redirect('welcome');
            }
        }





        public function edit_menu_type()
        {
            if($this->session->userdata('logged_in') != '' && ($this->session->userdata('user_type') == 1 || $this->session->userdata('user_type') == 2))
            {
                if($_POST)
                {
                    $config = array(
                        array(
                            'field'   => 'menu_type',
                            'label'   => 'Menu Type',
                            'rules'   => 'required|xss_clean'
                        )
                    );

                    $this->form_validation->set_rules($config);

                    if ($this->form_validation->run() == FALSE)
                    {
                        $menu_type_id = $this->input->post('menu_type_id');
                        $data['menu_type'] = $this->frestaurant_model->get_menu_type_details($menu_type_id);
                        $this->load->view('admin/header');
                        $this->load->view('admin/sidebar');
                        $this->load->view('admin/edit_menu_type',$data);
                        $this->load->view('admin/footer');
                    }
                    else
                    {
                        $menu_type_id = $this->input->post('menu_type_id');
                        $menu_type_name = $this->input->post('menu_type');
                        $result = $this->frestaurant_model->edit_menu_type($menu_type_id,$menu_type_name);
                        if($result)
                        {
                            $this->session->set_flashdata('success','Menu type updated successfully.');
                            redirect('menu/menu_types');
                        }
                        else
                        {
                            $this->session->set_flashdata('danger','Menu type not updated.');
                            redirect('menu/menu_types');
                        }
                    }
                }
                else
                {
                    $menu_type_id = $this->uri->segment(3);
                    $data['menu_type'] = $this->frestaurant_model->get_menu_type_details($menu_type_id);
                    $this->load->view('admin/header');
                    $this->load->view('admin/sidebar');
                    $this->load->view('admin/edit_menu_type',$data);
                    $this->load->view('admin/footer');
                }
            }
            else
            {
                redirect('welcome');
            }
        }



        public function menu_manage()
        {
                $data['value'] = 'res';
                $this->load->model('data_operator_data_model');
                $last_insert_id=$this->session->userdata('last_insert_id');
                //$last_insert_id = $this->uri->segment(4);
                //echo $last_insert_id; exit;
                $data['restaurant'] = $this->data_operator_data_model->get_a_restaurant($last_insert_id);
                $data['menus'] = $this->data_operator_data_model->get_menu_for_restaurant($last_insert_id);
                $menu_array = array();
                foreach($data['menus'] as $menu)
                {
                    $menu_array[] = $menu->item_id;
                }
                $data['value'] = $menu_array;
                $data['results'] = $this->data_operator_data_model->get_menus();
		$this->load->view('admin/data_operator_dashboard/header_link');
		$this->load->view('admin/data_operator_dashboard/header');
		$this->load->view('admin/data_operator_dashboard/menu');
                $this->load->view('admin/data_operator_dashboard/restaurent/menu_management',$data);
		$this->load->view('admin/data_operator_dashboard/footer');

        }
        public function menu_manage_by_a_restaurent()
        {
                $data['value'] = 'res';
                $this->load->model('data_operator_data_model');
                $sess_data['last_insert_id'] = $this->uri->segment(4);
                $this->session->set_userdata($sess_data);
                $last_insert_id=$this->session->userdata('last_insert_id');
                //echo $last_insert_id;exit;
                //echo $this->session->userdata('last_insert_id');exit;
                $data['restaurant'] = $this->data_operator_data_model->get_a_restaurant_by_a_restaurent($last_insert_id);
                $data['menus'] = $this->data_operator_data_model->get_menu_for_restaurant_by_a_restaurent($last_insert_id);
                $menu_array = array();
                foreach($data['menus'] as $menu)
                {
                    $menu_array[] = $menu->item_id;
                }
                $data['value'] = $menu_array;
                $data['results'] = $this->data_operator_data_model->get_menus_by_a_restaurent();
		$this->load->view('admin/data_operator_dashboard/header_link');
		$this->load->view('admin/data_operator_dashboard/header');
		$this->load->view('admin/data_operator_dashboard/menu');
                $this->load->view('admin/data_operator_dashboard/restaurent/menu_management_by_a_restaurent',$data);
		$this->load->view('admin/data_operator_dashboard/footer');

        }
        
        function search_item(){ 
            $this->load->model('data_operator_data_model');
            $match=$_GET['q'];
            //echo $match;exit;
            $last_insert_id=$this->session->userdata('last_insert_id');
            $data['restaurant'] = $this->data_operator_data_model->get_a_restaurant($last_insert_id);
            //$data['results']=$this->data_operator_data_model->ajax_search($match);
            $data['other_menu']=$this->data_operator_data_model->search_other_menu($match);
            $data['menus'] = $this->data_operator_data_model->get_menu_for_restaurant($last_insert_id);
            $menu_array = array();
            foreach($data['menus'] as $menu)
            {
                $menu_array[] = $menu->item_id;
            }
            $data['value'] = $menu_array; 
           //print_r($data['value']);exit;  
            $this->load->view('admin/data_operator_dashboard/restaurent/restaurent_menu_setting_search',$data);
        }
        
      
        function search_item_by_a_restaurent(){ 
            $this->load->model('data_operator_data_model');
            $match=$_GET['q'];
            //echo $match; exit;
            $last_insert_id=$this->uri->segment(4);
            //echo $last_insert_id; exit;
            $data['restaurant'] = $this->data_operator_data_model->get_a_restaurant_by_a_restaurent($last_insert_id);
            //$data['results']=$this->data_operator_data_model->ajax_search($match);
            $data['other_menu']=$this->data_operator_data_model->search_other_menu_by_a_restaurent($match,$last_insert_id);  
            $data['menus'] = $this->data_operator_data_model->get_menu_for_restaurant_by_a_restaurent($last_insert_id);
            $menu_array = array();
            foreach($data['menus'] as $menu)
            {
                $menu_array[] = $menu->item_id;
            }
            $data['value'] = $menu_array; 
           //print_r($data['value']);exit;  
            $this->load->view('admin/data_operator_dashboard/restaurent/restaurent_menu_setting_search_by_a_restaurent',$data);
        }


        public function get_restaurent()
        {
                $restuarant_id = $this->uri->segment(4);

                $data['restautrant_details'] = $this->data_operator_data_model->get_a_restaurant($restuarant_id);
                //print_r($data); exit;
                $this->load->view('admin/data_operator_dashboard/restaurent/restaurant_details',$data);
        }
        
        
         public function front_details() 
         {    
           
	             $res_id= $this->uri->segment(4); 
             
		     $this->session->set_userdata('res_id',$res_id);  
			
               
                       $data['res_id']= $this->uri->segment(3, 0);
                       //$c_id= $this->uri->segment(3);  
                       
                       $data['res_info']= $this->data_operator_data_model->front_info($res_id);
                       $data['gallery_info']= $this->data_operator_data_model->gallery_info($res_id); 
                       $data['show_feature_info']= $this->data_operator_data_model->show_feature_info($res_id);
					   					   
                       //$data['menus'] = $this->data_operator_data_model->select_menus($res_id,$c_id);
   
                       $data['c_name'] = $this->data_operator_data_model->c_name($res_id); 
                       $data['res_pic']= $this->data_operator_data_model->res_pic($res_id);
                      
                       $data['recent_post']=  $this->data_operator_data_model->recent_post();
                       $data['list_popular_dishes'] = $this->data_operator_data_model->list_popular_dishes(); 
			 		   
                                          
                       //$data['res_id']= $this->uri->segment(3, 0);  
                       $data['title']="Indichef";
                       $this->load->view('admin/data_operator_dashboard/restaurent/details',$data); 

 
      } 
        
        
        
        
        
        


    }
