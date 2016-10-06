<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('data_model');
		}
		function index(){
			$this->form_validation->set_rules('user_email','User email','required|htmlspecialchars');
			$this->form_validation->set_rules('user_password','User Password','required|htmlspecialchars');
            $this->form_validation->set_rules('user_type','User Type','required|htmlspecialchars');
			if($this->form_validation->run()===false){
				//$this->load->view('admin/dashboard');
				//redirect('admin/dashboard');
                echo 'not sucess'; exit;
			}
			else{
				$user_email=$this->input->post('user_email');
				$user_password=  md5($this->input->post('user_password'));
                                $user_type=$this->input->post('user_type');
				$result=$this->data_model->is_valid_user($user_email,$user_password,$user_type);
				if($result==true){
					//echo $result; exit;
					$table_name="login_time_information";
					$login_data=array(
                                        'user_email'		=>$this->input->post('user_email'),
                                        'user_password'		=>md5($this->input->post('user_password')),
                                        'user_type'             =>$this->input->post('user_type'),
											);
					$this->data_model->insert_data_to_database($table_name,$login_data);
					$this->session->set_userdata($login_data);
					/*if($user_type=='admin'){
                        redirect('admin/dashboard/home');
                        $this->session->set_userdata($login_data);
                    }if($user_type=='data_operator'){
                        redirect('admin/data_operator_dashboard/home');
                        $this->session->set_userdata($login_data);
                    }
                    if($user_type=='tele_operator'){
                        redirect('admin/tele_operator_dashboard/home');
                        $this->session->set_userdata($login_data);
                    }*/
                    redirect('admin/dashboard');
				}
				if($result==false){
					redirect('admin/dashboard');
				}
			}
		}
		function logout(){
			$this->session->sess_destroy();
			redirect('admin/dashboard');
		}	
		

	}



