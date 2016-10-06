<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		/* ------------------ */
		$this->load->model('data_model');
		
		$this->load->helper('url'); //Just for the examples, this is not required thought for the library
		
		$this->load->library('image_CRUD');
	}
	
	function _example_output($output = null)
	{
		$this->load->view('admin/image',$output);	
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function example1()
	{
		$image_crud = new image_CRUD();
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_1')
			->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
		
		$this->_example_output($output);
	}
	
	function example2()  
	{
		$image_crud = new image_CRUD();
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_2')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}

	function example3()
	{
		$image_crud = new image_CRUD();
	
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_3')
		->set_relation_field('category_id')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}

	function example4()  
	{
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_title_field('title');
		// $image_crud->where('productName','Motorcycle');
		$image_crud->set_table('indi_gallery_image')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
			
		$output = $image_crud->render();
	
		$this->_example_output($output);
	}
	function gallery($id=null)
	{
		// echo $id;
		if($id):
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_title_field('title');
		$image_crud->set_relation_field('res_id');
		$image_crud->set_table('indi_gallery_image')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads');
		$output = $image_crud->render();
		$this->_example_output($output);
		else:
			redirect('admin/image/category');
		endif;
	}


	
	function simple_photo_gallery()
	{
		$image_crud = new image_CRUD();
		
		$image_crud->unset_upload();
		$image_crud->unset_delete();
		
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		$image_crud->set_table('example_4')
		->set_image_path('assets/uploads');
		
		$output = $image_crud->render();
		
		$this->_example_output($output);		
	}

	function category($slug=null){
		if($this->input->post()):
			$form_data=$this->input->post();
            unset($form_data['submit']);
			$form_data['create_at']=date('Y-m-d H:i:s');
            $this->data_model->insert_data_to_database('gallery_category',$form_data);
        endif;
		if($slug=='create'):
			$data['category']=$email_data=$this->data_model->fatch_all_data('gallery_category');
			$data['page']='admin/gallery/create_category';
		else:
			$data['category']=$email_data=$this->data_model->fatch_all_data('gallery_category');
			$data['page']='admin/gallery/category';		
		endif;
		$this->load->view('admin/common/template',$data);
	}
}