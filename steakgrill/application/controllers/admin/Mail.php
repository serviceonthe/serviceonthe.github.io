<?php
class Mail extends CI_controller{

	function __construct(){

       	parent::__construct();
       	$this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('data_model');
	}

	public function newsletter(){
    	$data['page']='admin/newsemail/add_newsletter';
    	$this->load->view('admin/common/template',$data);
    }

    public function add_newsletter(){
        $this->form_validation->set_rules('newsletter_title', 'News Letter Title', 'required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('newsletter_body', 'News Letter Body', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE){
	    	$data['page']='admin/newsemail/add_newsletter';
	    	$this->load->view('admin/common/template',$data);
        }else{
            $table_name='newsletter';
            $data=array(
                   'newsletter_title'   => $this->input->post('newsletter_title'),
                   'newsletter_body'    => $this->input->post('newsletter_body')
            );
            $result=$this->data_model->insert_data_to_database($table_name,$data);
            if($result){
                //echo $result1['last_insert_id'];
                $this->session->set_flashdata('message', 'Successfuly ! Your News Letter Added!');
                redirect('admin/mail/list_newsletter');
            }else{
                $this->session->set_flashdata('danger', 'Your News Letter Added Not Successfully');
                redirect('admin/mail/list_newsletter');
            }
        }
    }
    public function list_newsletter(){
        $table_name='newsletter';
        $data['newsletter'] = $this->data_model->fatch_all_data($table_name);
        //print_r($data['newsletter']); exit;
    	$data['page']='admin/newsemail/list_newsletter';
	    $this->load->view('admin/common/template',$data);
    }
    public function edit_newsletter(){
        $this->form_validation->set_rules('newsletter_title', 'newsletter_title', 'required');
        $this->form_validation->set_rules('newsletter_body', 'newsletter_body', 'required');
        if ($this->form_validation->run() == FALSE){
            $id = $this->uri->segment(4);
            $table='newsletter';
            $table_id='newsletter_id';
            $data['edit_newsletter'] = $this->data_model->fetch_to_edit($table,$id,$table_id);
            //print_r($data['edit_newsletter']); exit;
            $data['page']='admin/newsemail/edit_newsletter';
	    	$this->load->view('admin/common/template',$data);
        }else{
            $id=$this->input->post('newsletter_id');
            $table_name='newsletter';
            $table_id='newsletter_id';
            $data=array(
               'newsletter_title'                =>$this->input->post('newsletter_title'),
               'newsletter_body'                 =>$this->input->post('newsletter_body')
            );
            $result1=$this->data_model->update($id,$table_name,$data,$table_id);
            //echo $result1; exit; 
            if($result1){
                $this->session->set_flashdata('message', ' Edit hasbeen successfuly !');
                redirect('admin/mail/list_newsletter');
            }else{
                $this->session->set_flashdata('danger', 'Edit not successfully !!!');
                redirect('admin/mail/list_newsletter');
            }
        }
    }
    public function delete_newsletter(){
        $newsletter_id=$this->uri->segment(4);
        $result=$this->data_model->delete_newsletter($newsletter_id);
        if($result){
            $this->session->set_flashdata('message', 'Successfuly ! Your News Letter Delete!');
            redirect('admin/mail//list_newsletter');
        }else{
            $this->session->set_flashdata('danger', 'Your News Letter Delete Not Successfully');
            redirect('admin/mail//list_newsletter');
        }
    }
    public function email_process(){
        $table_name='newsletter';
        $data['newsletter'] = $this->data_model->fatch_all_data($table_name);
        //print_r($data['newsletter']);
        $data['page']='admin/newsemail/email_process';
	    $this->load->view('admin/common/template',$data);
    }
    public function filter_email(){
        $this->form_validation->set_rules('newsletter','newsletter','required');
        if($this->form_validation->run()===false){
            $this->email_process();
        }else{
            $group=$this->input->post('group');
            $newsletter_id=$this->input->post('newsletter');
            $data['newsletter_details_by_id']=$this->data_model->fatch_newsletter_by_id($newsletter_id);
            
            $newsletter_title=$data['newsletter_details_by_id']['newsletter_title'];
            $newsletter_body=$data['newsletter_details_by_id']['newsletter_body'];
            
            $table_name='newsletter';
            $data['newsletter'] = $this->data_model->fatch_all_data($table_name);
            
            if($group==1){
                
                $current_date= date("Y/m/d");
                $six_munth_ago_date=date("Y-m-d", strtotime("-6 months", strtotime($current_date)));
                $twelve_munth_ago_date=date("Y-m-d", strtotime("-12 months", strtotime($current_date)));
                
                $data['filter_group']=$this->data_model->filter_group1($six_munth_ago_date,$twelve_munth_ago_date);
                //print_r($data['filter_group']); exit; 
                //$this->send_email_sendgrid();
                $data['page']='admin/newsemail/email_filter';
	            $this->load->view('admin/common/template',$data);
            }
            elseif($group==2){
                $current_date= date("Y/m/d");
                $twelve_munth_ago_date=date("Y/m/d", strtotime("-12 months", strtotime($current_date)));
                $thirty_munth_ago_date=date("Y/m/d", strtotime("-30 months", strtotime($current_date)));
                $data['filter_group']=$this->data_model->filter_group2($twelve_munth_ago_date,$thirty_munth_ago_date);
                //print_r($data['filter_group']);
                /*$this->load->view('admin/header_link');
                $this->load->view('admin/head');
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/newsemail/email_filter',$data);
                $this->load->view('admin/footer');*/
            }
            elseif($group==3){
                $data['filter_group']=$this->data_model->filter_group3();
                //print_r($data['filter_group']);
                /*$this->load->view('admin/header_link');
                $this->load->view('admin/head');
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/newsemail/subscribe_email_filter',$data);
                $this->load->view('admin/footer');*/
            }
            elseif($group==4){
                $data['filter_group']=$this->data_model->filter_group4();
                print_r($data['filter_group']); 
//                echo '<br />';
//                echo '<br />';
//                //exit;
//                foreach($data['filter_group'] as $key){
//                  echo $email = $key['userEmail'].',';
//                }
                //echo $email;
                exit;
                /*$this->load->view('admin/header_link');
                $this->load->view('admin/head');
                $this->load->view('admin/header');
                $this->load->view('admin/menu');
                $this->load->view('admin/newsemail/email_filter',$data);
                $this->load->view('admin/footer');*/
            }
            else{
                echo 'Your operation has Wrong !!!';
            }
        }
    }

}