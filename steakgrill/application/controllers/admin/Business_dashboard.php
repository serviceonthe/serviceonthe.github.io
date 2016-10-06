<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business_Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		
		$this->load->model('business_data_model'); 
		$this->load->helper("url");
		$this->load->library("pagination");
	}

    function home(){ 
	    $this->load->view('business/home');
	}
	
	public function restaurant_details(){ 
	   
	    $res_id=  $this->session->userdata("user_email");           
        $data['res_info']=sql::row("indi_res_info","res_id='$res_id'");
		
		$this->load->view('business/header');
		$this->load->view('business/menu'); 	 			
		$this->load->view('business/restaurant_details', $data);    	 			
		$this->load->view('business/footer');    
	}
	
	
	public function restaurant_update()    
	{
	
	
	    $res_id=  $this->session->userdata("user_email");   
        $data['res_info']=sql::row("indi_res_info","res_id='$res_id'");       
		if($_POST)
                {
				
				//echo "res up";exit;
                 $config = array(
								array(
                                   'field'   => 'res_name',
                                   'label'   => 'Restaurant Name',  
                                   'rules'   => 'required|xss_clean'
                                ),
								array(
                                   'field'   => 'res_email',
                                   'label'   => 'Restaurant Email',
                                   'rules'   => 'required|xss_clean'  
                                ),
				                array(
                                      'field'   => 'res_telephone1',
                                      'label'   => 'Phone number 1',
                                      'rules'   => 'required|xss_clean'
                                ),
								array(
                                      'field'   => 'res_address',
                                      'label'   => 'Restaurant Address', 
                                      'rules'   => 'required|xss_clean'
                                ),
				                array(
                                      'field'   => 'res_post_code',
                                      'label'   => 'Restaurant Postcode',
                                      'rules'   => 'required|xss_clean'
                                ),
								array(
                                      'field'   => 'res_manager_name',
                                      'label'   => 'Manager Name',
                                      'rules'   => 'required|xss_clean' 
                                ),
								array(
                                      'field'   => 'res_manager_contact_number',
                                      'label'   => 'Manager Contact Number',
                                      'rules'   => 'required|xss_clean'
                                )  
                             );   
							 
					$this->form_validation->set_rules($config);
                    if ($this->form_validation->run() == FALSE)
                    {
					
					echo "wrong validation";exit;
					redirect('admin/business_dashboard/restaurant_update'); 
				    }
                    else
                    {						
						  $result = $this->business_data_model->update_restaurant();                          
						  if($result)
						  {  
						    //echo $result;exit;
						  
						  
							   $this->session->set_flashdata('message','Restaurant successfully updated');                          
							   redirect('admin/business_dashboard/restaurant_details'); 
						  }      
						  else
						  {					
						  redirect('admin/business_dashboard/restaurant_update');
						  }
					}	  
                }
				else{
				$this->load->view('business/header');
				$this->load->view('business/menu'); 	 			
				$this->load->view('business/update_restaurant', $data);           	 			
				$this->load->view('business/footer'); 
                }		 
	}
	
	public function reservation_details(){

		$this->load->library('pagination');
        $start = $this->uri->segment(4);               
		
       if ($start == '') {        
            $start = 0; 
        } 
		$config['base_url'] = 'http://localhost/indi_chef/index.php/admin/business_dashboard/reservation_details';
        $total_rows = count($this->business_data_model->business_restaurant_reservation());
        $config['total_rows'] = $total_rows;  
        $config['per_page'] = 6;       
		
		$data['links'] = $this->pagination->create_links();  
        $this->pagination->initialize($config);  
        $data['query'] = $this->business_data_model->business_restaurant_reservation($limit = true, $start, $config['per_page']); 

		$this->load->view('business/header');
		$this->load->view('business/menu'); 	 			
		$this->load->view('business/reservation_details', $data);     	 			
		$this->load->view('business/footer');    
	    
	}
		
	
	public function order_details()   
	{ 
		
		$this->load->library('pagination');
        $start = $this->uri->segment(4);           
        if ($start == '') {     
            $start = 0; 
        }
		$config['base_url'] = 'http://localhost/indi_chef/index.php/admin/business_dashboard/order_details';      
        $total_rows = count($this->business_data_model->business_order_details());                                        
        $config['total_rows'] = $total_rows;                                                                    
        $config['per_page'] = 6;   
		$data['links'] = $this->pagination->create_links();                                                    
        $this->pagination->initialize($config); 
		
		$data['order']=  $this->business_data_model->business_order_details($limit = true, $start, $config['per_page']);
		
		$this->load->view('business/header');
		$this->load->view('business/menu'); 	 			
		$this->load->view('business/order_details', $data);        	 			
		$this->load->view('business/footer');    	 
		
	}
	

	
	function change_password()
    {
	       
        //$customer_id=  $this->session->userdata("customer_id"); 

		if ($_POST)   
		    { 
			
                    $config = array(
                                array(
                                   'field'   => 'new_password',
                                   'label'   => 'New Password',
                                   'rules'   => 'required|xss_clean|min_length[6]'
                                ),
                                array(
                                   'field'   => 'conf_password', 
                                   'label'   => 'Confirm Password',
                                   'rules'   => 'required|xss_clean|min_length[6]|matches[new_password]'
                                )
                            );

                $this->form_validation->set_rules($config); 
				
				if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('business/header');
						$this->load->view('business/menu'); 	 			
						$this->load->view('business/change_password');				
						$this->load->view('business/footer');	
                } 
				else   
				{
				   $result=$this->business_data_model->password_change();
					if($result)
					{
					
					$this->session->set_flashdata('message','Password Successfully Changed.'); 
					   redirect("admin/business_dashboard/home");    
					} 
				}    
			}
			else
			{
                $this->load->view('business/header');
				$this->load->view('business/menu'); 	 			
				$this->load->view('business/change_password');				
				$this->load->view('business/footer');				
                
			}				
    }
	
	
        public function menu_manage()
        {
		
		     $res_id=  $this->session->userdata("user_email");  
		
                //$last_insert_id=$this->session->userdata('last_insert_id');
                $data['restaurant'] = $this->business_data_model->get_a_restaurant($res_id);
                $data['menus'] = $this->business_data_model->get_menu_for_restaurant($res_id);
                $menu_array = array();
                foreach($data['menus'] as $menu)
                {
                    $menu_array[] = $menu->item_id;
                }
                $data['value'] = $menu_array;
                $data['results'] = $this->business_data_model->get_menus($res_id); 

                $this->load->view('business/menu_management',$data);
        }
	
	
    public function add_menu_price()
        {

           
            //$restaurant_id = $this->input->post('restaurant_id');
            $restaurant_id = $this->input->post('restaurant_id');
            $price = $this->input->post('price');
            $menu_id = $this->input->post('item_id');

            $result = $this->business_data_model->add_menu_price($restaurant_id,$price,$menu_id);
            if($result)
            {
                $this->session->set_flashdata('success','Price Updated successfully.');
                redirect('admin/business_dashboard/menu_manage/'.$restaurant_id);
            }
            else
            {
                //$this->session->set_flashdata('danger','Price not Updated.');
                //redirect('user/menu_manage/'.$restaurant_id);

               echo "Dont submit!!";

            }


//        if($result)
//        {
//            echo json_encode($result);
//        }
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

                    $result = $this->business_data_model->update_item_price($restaurant_id,$item_id,$item_price);
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


		
		
		
		
		

		
}



