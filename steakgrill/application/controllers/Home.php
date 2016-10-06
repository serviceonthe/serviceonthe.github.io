<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author serviceon
 */
class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('data_model');
        $this->load->model('pages_model');
        //error_reporting(0);
    }

    public function index(){
        $this->load->view('common/head');  
        // $this->load->view('common/slider'); 
        $this->load->view('page/home'); 
        $this->load->view('common/footer'); 

    }
    
    public function about_us(){
        $data['page'] = 'page/about_us'; 
        $data['title'] = 'About us'; 
        $this->load->view('common/template', $data);  
    }

    
    public function menu(){
        $data['page'] = 'page/menu'; 
        $data['title'] = 'Online Order'; 
        $this->load->view('common/template', $data);  
    }

    public function reservation(){
        $data['page'] = 'page/reservation'; 
        $data['title'] = 'Reservation'; 
        $this->load->view('common/template', $data);   
    }
    public function faqs(){
        $data['page'] = 'page/faqs'; 
        $data['title'] = 'Refund Policy & FAQ'; 
        $this->load->view('common/template', $data);  
    }
    
    public function contact_us(){
        $data['page'] = 'page/contact_us'; 
        $data['title'] = 'Contact us'; 
        $this->load->view('common/template', $data);  
    }

    public function cart(){
        $data['page'] = 'page/cart'; 
        $data['title'] = 'Cart'; 
        $this->load->view('common/template', $data);  
    }
    public function checkout(){
        $data['page'] = 'page/checkout'; 
        $data['title'] = 'Checkout'; 
        $this->load->view('common/template', $data);  
    }
    public function registration(){
        $data['page'] = 'page/registration'; 
        $data['title'] = 'Registration'; 
        $this->load->view('common/template', $data);  
    }

    
    public function login (){
    	$data['title'] = 'User Login';
        $data['page'] = 'page/login'; 
        $this->load->view('common/template', $data);

    }

    public function email_subscription(){
            
            $subscribe_email = $this->input->post('email'); 
            //$subscribe_email = 'abu.saleah@gmail.com'; 
           
            $isExist = $this->data_model->check_subscribe_email($subscribe_email);  
            //echo $isExist; exit;  
            $data = array(
                    'subscribe_email'  =>  $subscribe_email
            );

            if($isExist == 'false'){
              	$this->pages_model->insert_event('email_subscribe', $data);
            	$data['result'] = 'inserted';
            }else{
            	$data['result'] = 'already exist';
            }


            echo json_encode($data);

    }
    public function contact_form(){
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('f_name', 'Entry Your First Name', 'required|xss_clean');
        $this->form_validation->set_rules('l_name', 'Entry Your Last Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Entry Your Email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('telephn', 'Entry Your TelePhone Number', 'xss_clean');
        $this->form_validation->set_rules('subject', 'Entry Your Subject', 'required|xss_clean');
        $this->form_validation->set_rules('msg', 'Entry Your Message', 'required|xss_clean');
        $this->form_validation->set_rules('captcha_match', 'Captcha Match', 'required|xss_clean');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|xss_clean|matches[captcha_match]');
        if ($this->form_validation->run() == FALSE) {
                $this->contact_us();
        }

            else{
                $f_name = $this->input->post('f_name');
                $l_name = $this->input->post('l_name');
                $email = $this->input->post('email');
                $telephn = $this->input->post('telephn');
                $subject = $this->input->post('subject');
                $msg = $this->input->post('msg');
                $data['captcha']=$this->input->post('captcha');
        		$captcha_match=$this->input->post('captcha_match');




                $data = array(
                        'f_name'  =>  $f_name,
                        'l_name'  =>  $l_name,
                        'email'  =>  $email,
                        'telephn'  =>  $telephn,
                        'subject'  =>  $subject,
                        'msg'  =>  $msg,
                    );

                $today = date("d/m/Y H:i:s");
                require 'class.phpmailer.php';
                $admin_mail = new PHPMailer();
                $admin_mail->IsSMTP();
                $admin_mail->SMTPDebug = 0;
                $admin_mail->Debugoutput = 'html';
                $admin_mail->Host = "ssl://smtp.gmail.com";
                $admin_mail->Port = 465;
                $admin_mail->SMTPAuth = true;
                $admin_mail->Username = "noreply@serviceontheweb.co.uk";
                $admin_mail->Password = "dhaka%002";
                $admin_mail->SetFrom('noreply@serviceontheweb.co.uk', 'Steak Grill');
                $admin_mail->AddReplyTo('noreply@serviceontheweb.co.uk', 'Steak Grill');

                //$email='notification@radhunihp27.co.uk'; 
                $email='saleah@serviceontheweb.co.uk'; 
                $admin_mail->AddAddress($email);
                $admin_mail->Subject = 'Register Confirm Notification';
                //$body = 'Order Pin :'.$voucher_number;
                $notify_body = $this->load->view('email/contact_us',$data, TRUE); 
                          
                $admin_mail->MsgHTML($notify_body);
                $admin_mail->AltBody = 'This is a plain-text message body';

                $admin_mail->Send();


            $this->pages_model->insert_event('contact_us', $data);
                
            $this->session->set_flashdata('success', 'Contact Message sent Successfully');
            $this->contact_us();

            }

    }

public function dashboard($id=null){
        $id=$this->session->userdata('l_customer_id');
        if ($id) {
            // $data['order_list']=$this->user_model->order_list_last_5($id);
            $data['customer_info']=$this->pages_model->fetch_to_edit('customer_info',$id,'customer_id');
            // print_r($data['order_list']);
            // print_r($data['customer_info']);
            // $this->load->view('common/header',$data);
            // $this->load->view('page/home',$data);
            // $this->load->view('common/footer');
            redirect('home');
        }else{
            redirect('home/login');
        }
    }

   
}
