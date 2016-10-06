<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller{

	function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
    }

	function index(){
		echo 'Module Controller.';
	}

	function social(){
		if($this->input->post()){
			$data=$this->input->post();	
			unset($data['submit']);
			$insert=$this->data_model->insert_data('social_link',$data);

		}

		$data['social_link']=$this->db->get('social_link')->result();
		
		foreach ($data['social_link'] as $key => $value) {
			unset($data['social_link'][$key]);
			$data['social_link'][$value->slug]=$value;
		}

		$data['page']='admin/module/social';
		$this->load->view('admin/common/template',$data);
	}
	function contact(){
		if($this->input->post()){
			$data=$this->input->post();	
			unset($data['submit']);
			$insert=$this->data_model->insert_data('contacts',$data);

		}

		$data['social_link']=$this->db->get('contacts')->result();

		
		foreach ($data['social_link'] as $key => $value) {
			unset($data['social_link'][$key]);
			$data['social_link'][$value->slug]=$value;
		}
		$data['page']='admin/module/contacts';
		$this->load->view('admin/common/template',$data);
	}
	function logo(){
		if($this->input->post()){
			$data=$this->input->post();	
			unset($data['submit']);
			$insert=$this->data_model->insert_settings_data('settings',$data);

		}

		$data['social_link']=$this->db->get('settings')->result();

		
		foreach ($data['social_link'] as $key => $value) {
			unset($data['social_link'][$key]);
			$data['social_link'][$value->slug]=$value;
		}
		$data['page']='admin/module/logo';
		$this->load->view('admin/common/template',$data);
	}


	function slider(){
		$this->load->view('admin/common/template');
	}

}