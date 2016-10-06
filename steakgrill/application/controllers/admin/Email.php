<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    //load email helperii
    $this->load->helper('email');
    //load email library
    $this->load->library('email');
  }

public function index()
{

	$this->load->view('header');
    $this->load->view('admin/email/email_form');
    $this->load->view('footer');
}

function order(){
  
  // echo 'hello';
  // $email_data=$this->data_model->fatch_data_where('email_settings',array('type'=>'reservation'));
  $email_data=$this->data_model->fatch_data_where('email_settings',array('type'=>'order'));

  $data['email']=$email_data;
  // exit;
  // compose email
      // $mails=$email_data['to'];
      $mails='mahabub.prog@gmail.com, mahabub@serviceontheweb.co.uk';
      // echo $mails;exit;
      $this->email->from($email_data['form'] , 'Service On');
      $this->email->to($mails); 
      $this->email->subject($email_data['subject']);      
      $body=$this->load->view('admin/email/email',$data,true);
      // echo $body;exit;
      $this->email->message($body); 

      if ( ! $this->email->send())
      {
        echo "Email not sent \n".$this->email->print_debugger();      
      }else{
        echo "successfully";
      }
}
  
  public function send_mail(){
    $this->load->helper('url');

    if (!isset($_POST['e-mail'])){
      //redirect if no parameter e-mail
      redirect(base_url());
    };

    //load email helperii
    $this->load->helper('email');
    //load email library
    $this->load->library('email');
    
    //read parameters from $_POST using input class
    $email = $this->input->post('e-mail',true);    
  
    // check is email addrress valid or no
    if (valid_email($email)){  
      // compose email
      $email.=',mahabub431@gmail.com';
      $this->email->from('serviceon@gmail.com' , 'Service On');
      $this->email->to($email); 
      $this->email->subject('Runnable CodeIgniter Email Example');
      $body='Hello from Runnable CodeIgniter Email Example App!';
      $data['message'] ="Email was successfully sent to $email";
      $body.=$this->load->view('admin/email/message',$data,true);

      // echo $body;exit;
      $this->email->message($body);  
      
      // try send mail ant if not able print debug
      if ( ! $this->email->send())
      {
        $data['message'] ="Email not sent \n".$this->email->print_debugger();      
        $this->load->view('header');
        $this->load->view('admin/email/message',$data);
        $this->load->view('footer');

      }
         // successfull message
        $data['message'] ="Email was successfully sent to $email";
      
        $this->load->view('header');
        $this->load->view('admin/email/message',$data);
        $this->load->view('footer');
    } else {

      $data['message'] ="Email address ($email) is not correct. Please <a href=".base_url().">try again</a>";
      
      $this->load->view('header');
      $this->load->view('admin/email/message',$data);
      $this->load->view('footer');
    }

  }
  
  public function info(){
    phpinfo();
  }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */