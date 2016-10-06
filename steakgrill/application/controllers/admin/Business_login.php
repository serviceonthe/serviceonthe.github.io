<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Business_Login extends CI_Controller{
		function __construct(){ 
			parent::__construct();
			$this->load->model('business_data_model'); 
		}
		function index(){
			$this->form_validation->set_rules('user_id','User ID','required');
			$this->form_validation->set_rules('password','User Password','required');     
			
			if($this->form_validation->run()===false){
				//$this->load->view('admin/dashboard');
				//redirect('admin/dashboard');
                echo 'Enter your User ID & Password'; exit;
			}
			else{
                $user_id=$this->input->post('user_id'); 
				$password=$this->input->post('password');
				$result=$this->business_data_model->is_valid_user($user_id,$password);  
				if($result==true){      
					//echo $result; exit;  
					$table_name="login_time_information";
					$login_data=array(
                                    'user_email'		=>$this->input->post('user_id'),
                                    'user_password'		=>$this->input->post('password'),   
											);
			
					$this->session->set_userdata($login_data);
				     
                        redirect('admin/business_dashboard/home');
                     
                    
				}
				if($result==false){
					redirect('business');   
				}
			}
		}
		function logout(){
			$this->session->sess_destroy();
			redirect('business');
		}	
		

	}



