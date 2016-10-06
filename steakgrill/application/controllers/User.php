<?php 

/**
* 
*/
class User extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('user_model');
        $this->load->model('data_model');
		error_reporting(0);
    }

	public function login(){
		$data['page']='user/home/login';
		$this->load->view('common/template',$data);
	}
	public function access(){
		// echo $email=$this->input->post('email');
		// echo $password=$this->input->post('password');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
        if ($this->form_validation->run() === false) {
        	$this->session->set_flashdata('danger', 'Enter email or password'); 
            redirect('user/login');
        }else{
	        $email=$this->input->post('email');
	        $password=md5($this->input->post('password')); 
                
            $userLoginData=$this->user_model->loginUser($email,$password);

            if(!empty($userLoginData)){
                    $session_data = array(
                    					'l_email'=> $userLoginData[0]['email'],
                                        'l_logged_in'=> TRUE, 
                                        'l_customer_id'=>$userLoginData[0]['customer_id'],
                                        'l_order_pin'=>$userLoginData[0]['order_pin'],    
                                        'l_password'=>$userLoginData[0]['password'],    
                                        'l_post_code'=>$userLoginData[0]['post_code']);                  
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('message', 'Login Success'); 
                    //echo "jelk"; exit; 
                    redirect('user/dashboard'); 
                }     
                else{
                $this->session->set_flashdata('danger', 'No Order Data'); 
                redirect('user/login');
                }
        }
	}
	public function logout(){
        $this->session->unset_userdata('l_customer_id');
        redirect('/');
    
	}

	public function dashboard($id=null){
		$id=$this->session->userdata('l_customer_id'); 
		if ($id) {
			$data['order_list']=$this->user_model->order_list_last_5($id);
			$data['customer_info']=$this->data_model->fetch_to_edit('customer_info',$id,'customer_id');

			// print_r($data['order_list']);
			// print_r($data['customer_info']);  
			$this->load->view('user/home/header',$data);
			$this->load->view('user/home/dashboard',$data);
			$this->load->view('user/home/footer');
		}else{
			redirect('user/login');
		}
	}

	public function user_panel($id=null){
		$id=$this->session->userdata('l_customer_id');
		if ($id) {
			$data['customer_info']=$this->data_model->fetch_to_edit('customer_info',$id,'customer_id');
			$this->load->view('user/home/header',$data);
			$this->load->view('user/home/account_info',$data);
			$this->load->view('user/home/footer');
		}else{
			redirect('user/login');
		}
	}

	public function address_update(){
		//echo 'faisal'; exit;
		$this->form_validation->set_rules('address_line1', 'address_line1', 'required');
        $this->form_validation->set_rules('address_line2', 'address_line2', 'required');
        $this->form_validation->set_rules('city', 'city', 'required');
        $this->form_validation->set_rules('post_code', 'post_code', 'required');
        if ($this->form_validation->run() === false) {
        	$id=$this->session->userdata('l_customer_id');
			$data['customer_info']=$this->data_model->fetch_to_edit('customer_info',$id,'customer_id');
			$this->load->view('user/home/header',$data);
			$this->load->view('user/home/account_info',$data);
			$this->load->view('user/home/footer');
        }else{
        	$customer_id=$this->session->userdata('l_customer_id');
			$address_line1=$this->input->post('address_line1');
			$address_line2=$this->input->post('address_line2');
			$city=$this->input->post('city');
			$post_code=$this->input->post('post_code');

			$birthday=$this->input->post('birthday');
			$partner_birthday=$this->input->post('partner_birthday');
			$anniversary_date=$this->input->post('anniversary_date');
			$special_day=$this->input->post('special_day');

            $data=array(
            		'address_line1'				=>  $address_line1,
            		'address_line2'			=>  $address_line2,
            		'city'	=>  $city ,
            		'post_code'	=>  $post_code,

            		'birthday'	=>  $birthday,
            		'partner_birthday'	=>  $partner_birthday,
            		'anniversary_date'	=>  $anniversary_date,
            		'special_day'	=>  $special_day,
            	);
            $result=$this->user_model->address_update($data,$customer_id);
            if($result){
            	$this->session->set_flashdata('message', 'Your update hasbeen success'); 
                redirect('user/user_panel/'.$customer_id);
            }else{
            	$this->session->set_flashdata('danger', 'Update not success'); 
                redirect('user/user_panel/'.$customer_id);
            }
		}
	}
	
	public function order_list($id=null){
		$id=$this->session->userdata('l_customer_id');
		if ($id) {
			$data['order_list']=$this->user_model->order_list($id);
			$this->load->view('user/home/header',$data);
			$this->load->view('user/home/order_list',$data);
			$this->load->view('user/home/footer');
		}else{
			redirect('user/login');
		}
	}
	public function order_details($order_id=null){
		$id=$this->session->userdata('l_customer_id');
		if ($id) {
        	$data['customer_info']=$this->data_model->fetch_to_edit('customer_info',$id,'customer_id');
			$data['order_details']=$this->user_model->order_details($order_id);
        	$data['order_list']=$this->user_model->order_list_by_order_id($id,$order_id);
			$data['order_id']=$order_id;
			$data['review_details']=$this->user_model->review_details($id);
			$this->load->view('user/home/header',$data);
			$this->load->view('user/home/order_details',$data);
			$this->load->view('user/home/footer');
		}else{
			redirect('user/login');
		}
	}
	
	public function order_review($order_id=null){
		$this->form_validation->set_rules('food_quality', 'food_quality', 'required');
        $this->form_validation->set_rules('delivery_time', 'delivery_time', 'required');
        $this->form_validation->set_rules('takeway_service', 'takeway_service', 'required');
        if ($this->form_validation->run() === false) {
        	
        	$id=$this->session->userdata('l_customer_id');

        	$data['order_id']=$order_id;
        	$data['order_list']=$this->user_model->order_list_by_order_id($id,$order_id);
        	$data['order_details']=$this->user_model->order_details($order_id);
        	$data['customer_info']=$this->data_model->fetch_to_edit('customer_info',$id,'customer_id');

        	$this->load->view('user/home/header',$data);
			$this->load->view('user/home/order_review',$data);
			$this->load->view('user/home/footer');
        }else{
        	$customer_id=$this->session->userdata('l_customer_id');
			$order_id=$this->input->post('order_id');
			$food_quality=$this->input->post('food_quality');
			$delivery_time=$this->input->post('delivery_time');
			$takeway_service=$this->input->post('takeway_service');
			$review_massage=$this->input->post('review_massage');
			$ip = getenv('HTTP_CLIENT_IP')? :
                  getenv('HTTP_X_FORWARDED_FOR')? :
                  getenv('HTTP_X_FORWARDED')? :
                  getenv('HTTP_FORWARDED_FOR')? :
                  getenv('HTTP_FORWARDED')? :
                  getenv('REMOTE_ADDR');

            $data=array(
            		'order_id'				=>  $order_id,
            		'customer_id'			=>  $customer_id,
            		'food_quality_rating'	=>  $food_quality ,
            		'delivery_time_rating'	=>  $delivery_time,
            		'takeway_service_rating'=>  $takeway_service,
            		'review_massage'		=>  $review_massage,
            		'review_ip'				=>  $ip
            	);

            $check_review=$this->user_model->check_review_exist($order_id);
            if($check_review){
            	$this->session->set_flashdata('danger', 'Review already exists in this order'); 
                redirect('user/order_review/'.$order_id);
            }else{
	            $result=$this->user_model->insert_order_review($data);
	            if($result){
	            	$this->session->set_flashdata('message', 'Your review hasbeen success'); 
	                redirect('user/order_review/'.$order_id);
	            }else{
	            	$this->session->set_flashdata('danger', 'Review not success'); 
	                redirect('user/order_review/'.$order_id);
	            }
            }
		}
	}
	
	public function rating_review($id=null){
		$id=$this->session->userdata('l_customer_id');
		$data['review_details']=$this->user_model->review_details($id);
		$this->load->view('user/home/header',$data);
		$this->load->view('user/home/review_details',$data);
		$this->load->view('user/home/footer');
	}

	public function re_order($order_id=null){
		$order_details=$this->user_model->order_details($order_id);
		$this->cart->destroy();
		foreach ($order_details as $key => $value) {
			$cart_item = array(
	                    'id' => $value['item_id'],
	                    'qty' => $value['item_quantity'],
	                    'price' => $value['item_price'],
	                    'name' => $value['item_name'],
	//                    'options' => array('Size' => 'L', 'Color' => 'Red')
	                );
	        $this->cart->insert($cart_item);
        }

		$id=$this->session->userdata('l_customer_id');
		$order_pin=$this->session->userdata('l_order_pin');
		if ($id) {
			$s_d = array(
	                        'customer_id'=>$id,
	                        'order_pin'=>$order_pin,
	                    );                 
            $this->session->set_userdata($s_d);
		}
		redirect('order/cart');

	}

	public function change_password(){
		$this->form_validation->set_rules('password', 'Password', 'required|matches[c_password]');
        $this->form_validation->set_rules('c_password', 'Confirm Password', 'required');
        if ($this->form_validation->run() === false) {
        	$id=$this->session->userdata('l_customer_id');
			$data['customer_info']=$this->data_model->fetch_to_edit('customer_info',$id,'customer_id');
			$this->load->view('user/home/header',$data);
			$this->load->view('user/home/account_info',$data);
			$this->load->view('user/home/footer');
        }else{
        	$customer_id=$this->session->userdata('l_customer_id');
			$password=md5($this->input->post('password'));
            $data=array(
            		'password'				=>  $password,
            	);
            $result=$this->user_model->address_update($data,$customer_id);
            if($result){
            	$this->session->set_flashdata('message', 'Your Password hasbeen changed'); 
                redirect('user/user_panel/'.$customer_id);
            }else{
            	$this->session->set_flashdata('danger', 'Password not changed'); 
                redirect('user/user_panel/'.$customer_id);
            }
		}
	}

	public function reset_password(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
		if ($this->form_validation->run() === false) {
			$data['page']='user/home/reset_password';
			$this->load->view('common/template',$data);
		}else{
			$email=$this->input->post('email');
			$data['customar_info']=$this->user_model->check_email($email);
			//$order_pin=$result['order_pin'];
			

			if($data){
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
				$mail->SetFrom('noreply@serviceontheweb.co.uk', "Steak Grillt ");
				$mail->AddReplyTo('noreply@serviceontheweb.co.uk', "Steak Grillt ");

				$mail->AddAddress($email);
				$mail->Subject = "Steak Grillt  Password Reset" ;
				//$body = 'Order Pin :'.$order_pin;
				$body = $this->load->view('email/reset_password',$data,true);
						  
				$mail->MsgHTML($body);
				$mail->AltBody = 'This is a plain-text message body';
				
				$e_result=$mail->Send();
				if($e_result){
					$this->session->set_flashdata('message', 'Please check your email for Order pin'); 
					redirect('user/login');
				}else{
					$this->session->set_flashdata('danger', 'Order pin not changed'); 
					redirect('user/login');
				}
			}else{
					$this->session->set_flashdata('danger', 'Your email done not matches'); 
					redirect('user/login');
				}
		}
	}



}