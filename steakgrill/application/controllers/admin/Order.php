<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller{

    function __construct(){
                parent::__construct();
                $this->load->model('data_model');
                $this->load->library('pagination');
                $this->load->library('session');
    }

    function index(){
    	$data['page']='admin/common/dashboard';
        $this->load->view('admin/common/template', $data);
    }

    public function order_status_change() {
        $status = $this->input->post('order_status');
        $customer_email = $this->input->post('customer_email');  
        $order_id = $this->uri->segment(4);  
        $update_status = $this->data_model->order_status_update($order_id, $status);
        //echo $update_status; exit; 

        if ($update_status == TRUE) {

            if($status==1){
                $mail_sub='Confirmed';
                $mail_body='Your Order Has Been Confirmed';
            }else if($status==2){
                $mail_sub='Rescheduled';
                $mail_body='Your Order Has Been Rescheduled';
            }else if($status==3){
                $mail_sub='Cancelled';
                $mail_body='Your Order Has Been Cancelled';  
            }

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
                $mail->SetFrom('noreply@serviceontheweb.co.uk', 'Becontree Restaurant');
                $mail->AddReplyTo('noreply@serviceontheweb.co.uk', 'Becontree Restaurant');

                $email=$customer_email;  
                $mail->AddAddress($email);
                $mail->Subject = 'Order  '.$mail_sub.' Mail'; 
                //$body = $this->load->view('email/admin_email',$data, TRUE);
                $body = $mail_body; 
                         
                $mail->MsgHTML($body);
                $mail->AltBody = 'This is a plain-text message body';
                
                $mail->Send();

            $this->session->set_flashdata('message', 'Status Successfully Updated');
            redirect('admin/dashboard/list_order'); 
        }else{
            $this->session->set_flashdata('danger', 'Status Not Successfully Updated');
            redirect('admin/dashboard/list_order'); 
        }
    }

    public function payment_status_change() {
        $status = $this->input->post('is_paid');
        $order_id = $this->uri->segment(4);  
        $update_status = $this->data_model->payment_status_update($order_id, $status);
        //echo $update_status; exit;

        if ($update_status == TRUE) {
            $this->session->set_flashdata('message', 'Status Successfully Updated');
            redirect('admin/dashboard/list_order'); 
        }else{
            $this->session->set_flashdata('danger', 'Status Not Successfully Updated');
            redirect('admin/dashboard/list_order'); 
        }
    }



}



