<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Tele_Operator_Dashboard extends CI_Controller{
		/*function __construct(){
			parent::__construct()
		}*/
	function home(){
            $this->load->view('admin/tele_operator_dashboard/home');
	}
        function order_list(){
            
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/order_list/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_order());  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; 
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            }      
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['order'] = $this->tele_operator_data_model->get_all_order($limit = true, $start, $config['per_page']);
            
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/order/list_order',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
	}
        
        
        
        function order_status_update(){
            $id=$this->uri->segment(4);
            $table_name='customer_food_order';
            $table_id="order_id";
            $data=array(
                        'is_paid'               =>$this->input->post('order_status'),
                        'is_paid_update_email'	=>$this->session->userdata('user_email')
                    );
            $this->load->model('tele_operator_data_model'); 
            $this->tele_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/tele_operator_dashboard/order_list');   
        }
        function call_status_update(){
            $id=$this->uri->segment(4);
            $table_name='customer_food_order';
            $table_id="order_id";
            $date=date('y-m-d');
            $data=array(
                        'call_status'               => $this->input->post('call_status'),
                        'call_status_update_email'  => $this->session->userdata('user_email'),
                        'call_status_update_date'   => $date
                    );
            $this->load->model('tele_operator_data_model'); 
            $this->tele_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/tele_operator_dashboard/order_list');  
        }
        function call_notes_update(){
            $id=$this->uri->segment(4);
            $table_name='customer_food_order';
            $table_id="order_id";
            $data=array(
                        'call_notes'	=>$this->input->post('call_notes'),
                        'call_notes_update_email'  => $this->session->userdata('user_email')
                    );
            $this->load->model('tele_operator_data_model'); 
            $this->tele_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/tele_operator_dashboard/order_list');  
        }
        function order_details(){
            $res_id=$id=$this->uri->segment(4);
            $order_id=$this->uri->segment(5);
            $customer_id=$id=$this->uri->segment(6);
            //echo $res_id;
            //echo $order_id; 
            //echo $customer_id; exit;
            $this->load->model('tele_operator_data_model'); 
            $data['order'] = $this->tele_operator_data_model->get_one_order_details($res_id,$order_id,$customer_id);
            //print_r($data['order']);
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/order/one_order_details',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
        }
        function order_status_filter(){
            if(isset($_GET['status']))
            {
                $status=$_GET['status'];
                if($status=="1.html"){
                    $order_status=1;
                }
                if($status=="2.html"){
                    $order_status=2;
                }
                if($status=="3.html"){
                    $order_status=3;
                }
                if($status=="4.html"){
                    $order_status=4;
                }
            }
            //echo $status; exit;
            //echo 'faisal'; exit;
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/order_list/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_order_by_order_status_filter($order_status));  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; 
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            }      
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['order'] = $this->tele_operator_data_model->get_all_order_by_order_status_filter($order_status, $limit = true, $start, $config['per_page']);
            
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/order/list_order',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
        }
        function call_status_filter(){
            if(isset($_GET['status']))
            {
                $status=$_GET['status'];
                if($status=="1.html"){
                    $call_status=1;
                }
                if($status=="2.html"){
                    $call_status=2;
                }
                if($status=="3.html"){
                    $call_status=3;
                }
                if($status=="4.html"){
                    $call_status=4;
                }
            }
            //echo $status; exit;
            //echo 'faisal'; exit;
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/order_list/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_order_by_call_status_filter($call_status));  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; 
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            }      
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['order'] = $this->tele_operator_data_model->get_all_order_by_call_status_filter($call_status, $limit = true, $start, $config['per_page']);
            
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/order/list_order',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
        }
        
        
        function list_reservation(){
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/list_reservation/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_reservation());  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; /*not work per_page.... now this code is static run from model function */
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            } 
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['reservation'] = $this->tele_operator_data_model->get_all_reservation($limit = true, $start, $config['per_page']);
            //print_r($data['reservation']); exit;
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/reservation/list_reservation',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
	}
        function reservation_order_status_update(){
            $id=$this->uri->segment(4);
            $table_name='indi_reservation_info';
            $table_id="reservation_id";
            $data=array(
                        'reservation_status'                    =>$this->input->post('reservation_status'),
                        'reservation_status_update_email'	=>$this->session->userdata('user_email')
                    );
            $this->load->model('tele_operator_data_model'); 
            $this->tele_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/tele_operator_dashboard/list_reservation');   
        }
        function reservation_call_status_update(){
            $id=$this->uri->segment(4);
            $table_name='indi_reservation_info';
            $table_id="reservation_id";
            $date=date('y-m-d');
            $data=array(
                        'call_status'                   =>$this->input->post('call_status'),
                        'call_status_update_email'	=>$this->session->userdata('user_email'),
                        'call_status_update_date'	=>$date
                    );
            $this->load->model('tele_operator_data_model'); 
            $this->tele_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/tele_operator_dashboard/list_reservation');  
        }
        function reservation_call_notes_update(){
            $id=$this->uri->segment(4);
            $table_name='indi_reservation_info';
            $table_id="reservation_id";
            $data=array(
                        'call_notes'                    =>$this->input->post('call_notes'),
                        'call_notes_update_email'	=>$this->session->userdata('user_email')
                    );
            $this->load->model('tele_operator_data_model'); 
            $this->tele_operator_data_model->update($id,$table_name,$data,$table_id);
            redirect('admin/tele_operator_dashboard/list_reservation');  
        }
        function reservation_order_status_filter(){
            if(isset($_GET['status']))
            {
                $status=$_GET['status'];
                
                if($status=="1.html"){
                    $order_status=1;
                }
                if($status=="2.html"){
                    $order_status=2;
                }
                if($status=="3.html"){
                    $order_status=3;
                }
                if($status=="4.html"){
                    $order_status=4;
                }
            }
            //echo $status; exit;
            //echo 'faisal'; exit;
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/list_reservation/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_reservation_by_order_status_filter($order_status));  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; 
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            }      
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['reservation'] = $this->tele_operator_data_model->get_all_reservation_by_order_status_filter($order_status, $limit = true, $start, $config['per_page']);
            
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            //$this->load->view('admin/tele_operator_dashboard/order/list_order',$data);
            $this->load->view('admin/tele_operator_dashboard/reservation/list_reservation',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
        }
        function reservation_call_status_filter(){
            if(isset($_GET['status']))
            {
                $status=$_GET['status'];
                if($status=="1.html"){
                    $call_status=1;
                }
                if($status=="2.html"){
                    $call_status=2;
                }
                if($status=="3.html"){
                    $call_status=3;
                }
                if($status=="4.html"){
                    $call_status=4;
                }
            }
            //echo $status; exit;
            //echo 'faisal'; exit;
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/list_reservation/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_reservation_by_call_status_filter($call_status));  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; 
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            }      
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['reservation'] = $this->tele_operator_data_model->get_all_reservation_by_call_status_filter($call_status, $limit = true, $start, $config['per_page']);
            
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            //$this->load->view('admin/tele_operator_dashboard/order/list_order',$data);
            $this->load->view('admin/tele_operator_dashboard/reservation/list_reservation',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
        }
         function reservation_details(){
            $res_id=$id=$this->uri->segment(4);
            $reservation_id=$this->uri->segment(5);
            $customer_id=$id=$this->uri->segment(6);
            //echo $res_id;
            //echo $reservation_id; 
            //echo $customer_id; exit;
            $this->load->model('tele_operator_data_model'); 
            $data['order'] = $this->tele_operator_data_model->get_one_reservation_details($res_id,$reservation_id,$customer_id);
            //print_r($data['order']); exit;
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/reservation/one_reservation_details',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
        }
        
        
        
        
        
        
        
        
        
        
        
        function order_list_report(){
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/order_list_report/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_order_report());  
            $config['total_rows'] = $total_rows;
            $config['per_page'] = 12; 
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == ''){
                $start = 0;
            }      
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['order'] = $this->tele_operator_data_model->get_all_order_report($limit = true, $start, $config['per_page']);
            //print_r($data['order']); exit;
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/order/list_order_report',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
	}
        function list_reservation_report(){
            $this->load->model('tele_operator_data_model');  
            $this->load->library('pagination');
            $config['base_url'] = base_url() . 'admin/tele_operator_dashboard/list_reservation_report/'; 
            $this->load->database();                     
            $total_rows = count($this->tele_operator_data_model->get_all_reservation_report());  
            $config['total_rows'] = $total_rows;  
            $config['per_page'] = 12; /*not work per_page.... now this code is static run from model function */
            $offset = $this->uri->segment(4, 0);
            $config['uri_segment'] = 4;     
            $start = $this->uri->segment(4);  
            if ($start == '') {     
                $start = 0; 
            } 
            $data['links'] = $this->pagination->create_links(); 
            $this->pagination->initialize($config);                    
            $data['reservation'] = $this->tele_operator_data_model->get_all_reservation_report($limit = true, $start, $config['per_page']);
            //print_r($data['reservation']); exit;
            $this->load->view('admin/tele_operator_dashboard/header_link');
            $this->load->view('admin/tele_operator_dashboard/header');
            $this->load->view('admin/tele_operator_dashboard/menu');
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/reservation/list_reservation_report',$data);
            /*--------  changable view  ----------*/
            $this->load->view('admin/tele_operator_dashboard/footer');
	}
        




        /*
         *  function list_reservation(){
                    
                    $this->load->model('data_model');  
                    $this->load->library('pagination');
                    $config['base_url'] = base_url() . 'admin/dashboard/list_reservation/'; 
                    $this->load->database();                      
                    $total_rows = count($this->data_model->get_all_reservation());  
                    $config['total_rows'] = $total_rows;  
                    $config['per_page'] = 7; 
                    $offset = $this->uri->segment(4, 0);
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4);  

                    if ($start == '') {     
                        $start = 0; 
                    }      

                    $data['links'] = $this->pagination->create_links(); 
                    $this->pagination->initialize($config); 
                    $data['reservation'] = $this->data_model->get_all_reservation($limit = true, $start, $config['per_page']);  
              $this->load->view('admin/list_reservation', $data); 
                 }
         function list_order00(){ 

                    $this->load->model('data_model');  
                    $this->load->library('pagination');
                    $config['base_url'] = base_url() . 'admin/dashboard/list_order/'; 
                    $this->load->database();
                   // $config['base_url'] = base_url() . 'admin/dashboard/list_order/';  
                   //$config['base_url'] = 'http://localhost/indi_chef/index.php/admin/dashboard/list_order';
                                        
                    $total_rows = count($this->data_model->get_all_order());  
                    $config['total_rows'] = $total_rows;  
                    $config['per_page'] = 7; 
                    $offset = $this->uri->segment(4, 0);
                    $config['uri_segment'] = 4;     
                    $start = $this->uri->segment(4);  

                    if ($start == '') {     
                        $start = 0; 
                    }      

                    $data['links'] = $this->pagination->create_links(); 
                    $this->pagination->initialize($config);                    
                    $data['order'] = $this->data_model->get_all_order($limit = true, $start, $config['per_page']); 
                    $this->load->view('admin/list_order',$data);     
                    
                 }
        
        
        */
        
        
        
        
        
        
        
        
    }



