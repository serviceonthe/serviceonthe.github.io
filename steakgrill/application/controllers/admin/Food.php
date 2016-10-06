<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Food extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('data_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('image_CRUD');
    }

    //-----------Category List---------------------
    function fatch_category(){
        $table_name = 'indi_catagories';  
        $data['all_indi_category'] = $this->data_model->fatch_all_data($table_name);

        // $this->load->view('admin/food/indi_category_details', $data);
        $data['page']='admin/food/indi_category_details';
        $this->load->view('admin/common/template',$data);
    }
    function edit_category($id=null){
        if($id):
            $data['catagory']=$this->data_model->fatch_data_where('indi_catagories',array('catagory_id'=>$id));            
            // var_dump($data['catagory']);exit;
            $data['page']='admin/food/edit_category';
            $this->load->view('admin/common/template',$data);
        else:
            redirect('admin/food/fatch_category');
        endif;
    }
    function update_category($id=null){
        if($id):
            if($this->input->post()):
                $form_data=$this->input->post();
                $this->data_model->updates('catagory_id',$id,'indi_catagories',$form_data);
            endif;
            $this->session->set_flashdata('message','Category successfully updated');                            
            redirect('admin/food/fatch_category');
        else:
            redirect('admin/food/fatch_category');
        endif;
    }
    function create_category(){
        if($this->input->post()):
            $form_data=$this->input->post();
            $form_data['catagory_creation_date']=date('Y-m-d H:i:s');
            $this->data_model->insert_data_to_database('indi_catagories',$form_data);
            $this->session->set_flashdata('message','Category successfully Added');                           
            redirect('admin/food/fatch_category');
        else:
            $data['page']='admin/food/create_category';
            $this->load->view('admin/common/template',$data);
        endif;
                
    }


    function delete_category($id=null){
        if($id):
            $this->db->delete('indi_catagories',array('catagory_id'=>$id));            
            $this->session->set_flashdata('message','Category successfully deleted');                           
            redirect('admin/food/fatch_category');
        else:
            redirect('admin/food/fatch_category');
        endif;
    }
    function fatch_cuisine_type_category(){
        $table_name = 'cuisine_type_category';
        $data['all_cuisine_category'] = $this->data_model->fatch_all_data($table_name);
        $this->load->view('admin/food/cuisine_type_category_details', $data);
    }
    function fatch_indi_category(){
        $table_name = 'indi_catagories';
        $data['all_indi_category'] = $this->data_model->fatch_all_data($table_name);
        $this->load->view('admin/food/indi_category_details', $data);
    }
    //--------- Category Item -----------------------
    function fatch_item(){
        $table_name = 'indi_items';
        $data['all_indi_item'] = $this->data_model->fatch_all_data($table_name);
        $data['indi_catagories'] = $this->data_model->fatch_all_data('indi_catagories');

        $data['page']='admin/food/indi_item_details';
        $this->load->view('admin/common/template',$data);
    }
    
    function fatch_cuisine_item(){
        $table_name = 'cuisine_item';
        $data['all_cuisine_item'] = $this->data_model->fatch_all_data($table_name);
        $this->load->view('admin/food/cuisine_item_details', $data);
    }
    function fatch_indi_item(){
        $table_name = 'indi_items';
        $data['all_indi_item'] = $this->data_model->fatch_all_data($table_name);
        $this->load->view('admin/food/indi_item_details', $data);
    }

    function fatch_signature_item(){
        $table_name = 'signature_item';
        $data['all_signature_item'] = $this->data_model->fatch_all_data($table_name);
        $this->load->view('admin/food/signature_item_details', $data);
    }
    function fatch_signature_item_by_a_restaurent(){
        $table_name = 'signature_item';
        $column_name=$this->uri->segment(4);
        $data['all_signature_item'] = $this->data_model->fatch_signature_item_by_a_restaurent($table_name,$column_name);
        $this->load->view('admin/food/signature_item_details_by_a_restaurent', $data,$column_name);
    }

        // edit operation start hare
        /********************************************** cuisine_item edit *************************************************/
    function cuisine_item_edit(){
        $table="cuisine_item";
        $table_id="cuisine_item_id";
        if(isset($_GET['d_edit']))
        {
            $id=$_GET['d_edit'];
            //echo $id; exit;
            $data['edit_fetch']=$this->data_model->fetch_to_edit($table,$id,$table_id);
            $this->load->view('admin/food/edit_cuisine_item',$data);
        }
    }
    function cuisine_item_update(){
        $table_name="cuisine_item";
        $table_id="cuisine_item_id";
        $id=$this->input->post('cuisine_item_id');
        $data=array(
            'cuisine_item_name'			            =>$this->input->post('cuisine_item_name'),
            'cuisine_item_short_discription'		=>$this->input->post('cuisine_item_short_discription'),
            'cuisine_item_alergy_notification'	    =>$this->input->post('cuisine_item_alergy_notification'),
            'cuisine_item_calorie_information'		=>$this->input->post('cuisine_item_calorie_information'),
            'cuisine_item_price'	                =>$this->input->post('cuisine_item_price')
        );
        $this->data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/food/fatch_cuisine_item');
    }
    public function add_item()
    {
        $data['allergy']=$this->data_model->fatch_all_data('allergy');
        $data['page']='admin/food/add_menu_item';
        $this->load->view('admin/common/template',$data);
    }

    public function add_sub_item()
    {
        $data['allergy']=$this->data_model->fatch_all_data('allergy');
        $data['main_items']=$this->data_model->fatch_all_data('indi_items');
        $data['page']='admin/food/add_sub_menu_item';
        $this->load->view('admin/common/template',$data);
    }
    
    /*public function add_menu_item(){  

            $allergy='';
            if($this->input->post('allergy')){
                
                foreach ($this->input->post('allergy') as $key => $value) {
                    $allergy.=$value.',';
                }
                $allergy = rtrim($allergy,',');
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_name','item_name','required');
			$this->form_validation->set_rules('price','price','required');
			$this->form_validation->set_rules('item_short_description','item_short_description','');
			$this->form_validation->set_rules('item_catagory_id','item_catagory_id','required');
			$this->form_validation->set_rules('item_long_description','item_long_description','');
			$this->form_validation->set_rules('item_ingredient','item_ingredient','');
			$this->form_validation->set_rules('item_video_url','item_video_url','');
			$this->form_validation->set_rules('item_page_tile','item_page_tile','');
			$this->form_validation->set_rules('item_meta_description','item_meta_description','');
			$this->form_validation->set_rules('item_meta_keyword','item_meta_keyword','');
			$this->form_validation->set_rules('item_cooking_method','item_cooking_method','');
			$this->form_validation->set_rules('preparation_time','preparation_time','');
			$this->form_validation->set_rules('cooking_time','cooking_time','');
			$this->form_validation->set_rules('serves','serves','');
			if($this->form_validation->run()===false){
				$this->load->view('admin/food/add_menu_item');
			}
                        else{
				$table_name="indi_items";
				$data=array(
                                'item_name'         =>$this->input->post('item_name'),
								'price'			=>$this->input->post('price'),
								'item_short_description'			=>$this->input->post('item_short_description'),
								'item_catagory_id'			=>$this->input->post('item_catagory_id'),
								'item_long_description'				=>$this->input->post('item_long_description'),
								'item_indegrediant'			=>$this->input->post('item_ingredient'),
								'item_video_url'		=>$this->input->post('item_video_url'),
								'item_page_title'				=>$this->input->post('item_page_tile'),
								'item_meta_description'		=>$this->input->post('item_meta_description'),
								'item_meta_keyword'		=>$this->input->post('item_meta_keyword'),
								'item_cooking_method'				=>$this->input->post('item_cooking_method'),
								'preparation_time'			=>$this->input->post('preparation_time'),
								'cooking_time'			=>$this->input->post('cooking_time'),
								'serves'		=>$this->input->post('serves'),
                                'allergy'=>$allergy
							);
                                
                                $this->data_model->insert_data_to_database($table_name,$data);
                                $this->session->set_flashdata('message','Item successfully added');                           
                                redirect('admin/food/fatch_item');
                               // $this->load->view('admin/restaurent/add_restaurent_feature_info');
			}
     
       
    } */

    public function add_menu_item(){  

            $allergy='';
            if($this->input->post('allergy')){
                
                foreach ($this->input->post('allergy') as $key => $value) {
                    $allergy.=$value.',';
                }
                $allergy = rtrim($allergy,',');
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_name','item_name','required');
            $this->form_validation->set_rules('price','price','required');
            $this->form_validation->set_rules('item_short_description','item_short_description','');
            $this->form_validation->set_rules('item_catagory_id','item_catagory_id','required');
            $this->form_validation->set_rules('item_long_description','item_long_description','');
            $this->form_validation->set_rules('item_ingredient','item_ingredient','');
            $this->form_validation->set_rules('item_video_url','item_video_url','');
            $this->form_validation->set_rules('item_page_tile','item_page_tile','');
            $this->form_validation->set_rules('item_meta_description','item_meta_description','');
            $this->form_validation->set_rules('item_meta_keyword','item_meta_keyword','');
            $this->form_validation->set_rules('item_cooking_method','item_cooking_method','');
            $this->form_validation->set_rules('preparation_time','preparation_time','');
            $this->form_validation->set_rules('cooking_time','cooking_time','');
            $this->form_validation->set_rules('serves','serves','');
            if($this->form_validation->run()===false){
                $this->load->view('admin/food/add_menu_item');
            }
                        else{
                $table_name="indi_items";
                $data=array(
                                'item_name'         =>$this->input->post('item_name'),
                                'price'         =>$this->input->post('price'),
                                'item_short_description'            =>$this->input->post('item_short_description'),
                                'item_catagory_id'          =>$this->input->post('item_catagory_id'),
                                'item_long_description'             =>$this->input->post('item_long_description'),
                                'item_indegrediant'         =>$this->input->post('item_ingredient'),
                                'item_video_url'        =>$this->input->post('item_video_url'),
                                'item_page_title'               =>$this->input->post('item_page_tile'),
                                'item_meta_description'     =>$this->input->post('item_meta_description'),
                                'item_meta_keyword'     =>$this->input->post('item_meta_keyword'),
                                'item_cooking_method'               =>$this->input->post('item_cooking_method'),
                                'preparation_time'          =>$this->input->post('preparation_time'),
                                'cooking_time'          =>$this->input->post('cooking_time'),
                                'serves'        =>$this->input->post('serves'),
                                'allergy'=>$allergy
                            );


                             /*   $this->load->library('upload');

                                $files = $_FILES;
                                $cpt = count($_FILES['userfile']['name']); 
                                $images=array();
                                for($i=0; $i<$cpt; $i++)
                                {  


                                    $time=strtotime(date("Y-m-d H:i:s"));
                                   //strtotime()


                                    $_FILES['userfile']['name']= $time.'_'.$files['userfile']['name'][$i]; 
                                    $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                                    $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                                    $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                                    $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
                                    $images[]=$_FILES['userfile']['name'];
                                    $this->upload->initialize($this->set_upload_options());
                                    $this->upload->do_upload();
                                    $file_data = $this->upload->data(); 
                                }

                                $data['item_image_name']=(implode( ',', $images));  */
                                
                                $itemId=$this->data_model->insert_data_of_item($table_name,$data);
                                if($itemId!=0){
                                    //echo $itemId; exit; 
                                    $this->session->set_flashdata('message','Item successfully added');                           
                                    redirect('admin/food/item_image_upload/'.$itemId);
                                }
                                //$this->load->view('admin/food/item_image_upload');
            }
    }

    public function add_sub_menu_item(){  

            $allergy='';
            if($this->input->post('allergy')){
                
                foreach ($this->input->post('allergy') as $key => $value) {
                    $allergy.=$value.',';
                }
                $allergy = rtrim($allergy,',');
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('parent_item_id','Parent','required');
            $this->form_validation->set_rules('item_name','item_name','required');
            $this->form_validation->set_rules('price','price','required');
           
            if($this->form_validation->run()===false){
                $this->load->view('admin/food/add_menu_item');
            }
                        else{

                            //echo $this->input->post('parent_item_id'); exit; 
                                $table_name="indi_items";
                                $data=array(
                                'parent_item_id'            =>$this->input->post('parent_item_id'),
                                'item_name'                 =>$this->input->post('item_name'),
                                'price'                     =>$this->input->post('price'),
                                'allergy'                   =>$allergy
                            );

                                
                                $itemId=$this->data_model->insert_data_of_item($table_name,$data);
                                if($itemId!=0){
                                    //echo $itemId; exit; 
                                    $this->session->set_flashdata('message','Item successfully added');                           
                                    redirect('admin/food/item_image_upload/'.$itemId);
                                }
                                //$this->load->view('admin/food/item_image_upload');
            }
    }  

    public function item_image_upload($id=null){


        //echo 'id'.$id; exit;  
        // echo $id;
		if($id):
		$image_crud = new image_CRUD();
		$image_crud->set_primary_key_field('id');
		$image_crud->set_url_field('url');
		//$image_crud->set_title_field('title');
		$image_crud->set_relation_field('item_id');
		$image_crud->set_table('item_image_gallery')
		->set_ordering_field('priority')
		->set_image_path('assets/uploads/item_images');
		$output = $image_crud->render();
		$this->_example_output($output);
		else:
			redirect('admin/food/fatch_item');
		endif;

    }
    
    function _example_output($output = null)
	{
		$this->load->view('admin/item_image',$output);	
	}

    /*private function set_upload_options()
    {   
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/admin_assets/itemImage/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['create_thumb'] = TRUE;
        $config['max_size']      = '500';
        $config['overwrite']     = FALSE;

        return $config;
    }*/

    function item_gallery($id=null)
    {
         //echo 'hello'; exit; 
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

    function item_delete($id=null){
        if($id):
            $this->db->delete('indi_items',array('item_id'=>$id));             
        endif;
        $this->session->set_flashdata('message','Item successfully deleted');                           
        redirect('admin/food/fatch_item');
    }

    function menu_edit($id=null) {
        $table = "indi_items";
        $table_id = "item_id";
        if($id){
            $this->session->set_userdata('menu_edit_id',$id);
            
            $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
            $data['allergyItem']=$this->data_model->fatch_all_data('allergy');
            //print_r($data['allergyItem']); exit; 
            $data['page']='admin/food/edit_menu';
            $this->load->view('admin/common/template',$data);

            //echo $id; exit;
        }else{
            redirect('admin/food/fatch_item');
        }
    }
    
    function menu_item_update(){
        $table_name="indi_items";
        $table_id="item_id";
        $id=$this->input->post('item_id');

            $allergy='';
            if($this->input->post('allergy')){
                foreach ($this->input->post('allergy') as $key => $value) {
                    $allergy.=$value.',';
                }
                $allergy = rtrim($allergy,',');
            }

            $this->load->library('form_validation');
            $this->form_validation->set_rules('item_name','item_name','required');
            $this->form_validation->set_rules('price','price','required');
            $this->form_validation->set_rules('item_short_description','item_short_description','');
            $this->form_validation->set_rules('item_catagory_id','item_catagory_id','required');
            $this->form_validation->set_rules('item_long_description','item_long_description','');
            $this->form_validation->set_rules('item_indegrediant','item_indegrediant','');
            $this->form_validation->set_rules('item_video_url','item_video_url','');
            $this->form_validation->set_rules('item_page_title','item_page_title','');
            $this->form_validation->set_rules('item_meta_description','item_meta_description','');
            $this->form_validation->set_rules('item_meta_keyword','item_meta_keyword','');
            $this->form_validation->set_rules('item_cooking_method','item_cooking_method','');
            $this->form_validation->set_rules('preparation_time','preparation_time','');
            $this->form_validation->set_rules('cooking_time','cooking_time','');
            $this->form_validation->set_rules('item_status','item_status','');
            $this->form_validation->set_rules('item_rating','item_rating','');
            $this->form_validation->set_rules('serves','serves','');
            if($this->form_validation->run()===false){
                        $table = "indi_items";
                        $table_id = "item_id";
                        $id=$this->session->userdata('menu_edit_id');
                        $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
                        $this->load->view('admin/food/edit_menu', $data);
            }
                        else{
        $data=array(
                    'item_name'                 =>$this->input->post('item_name'),
                    'price'                     =>$this->input->post('price'),
                    'item_short_description'    =>$this->input->post('item_short_description'),
                    'item_catagory_id'          =>$this->input->post('item_catagory_id'),
                    'item_long_description'     =>$this->input->post('item_long_description'),
                    'item_indegrediant'         =>$this->input->post('item_indegrediant'),
                    'item_video_url'            =>$this->input->post('item_video_url'),
                    'item_page_title'           =>$this->input->post('item_page_title'),
                    'item_meta_description'     =>$this->input->post('item_meta_description'),
                    'item_meta_keyword'         =>$this->input->post('item_meta_keyword'),
                    'item_cooking_method'       =>$this->input->post('item_cooking_method'),
                    'preparation_time'          =>$this->input->post('preparation_time'),
                    'cooking_time'              =>$this->input->post('cooking_time'),
                    'item_rating'               =>$this->input->post('item_rating'),
                    'item_status'               =>$this->input->post('item_status'), 
                    'serves'                    =>$this->input->post('serves'),
                    'allergy'                  =>$allergy
                );

                  // echo "<pre>";
                  // print_r($data); 
                  // echo "</pre>";exit; 

        $this->data_model->update($id,$table_name,$data,$table_id);
        $this->session->set_flashdata('message','Item successfully updated');                           
        redirect('admin/food/fatch_item');
       }
    }
    
        /********************************************** signature_item edit *************************************************/
    function signature_item_edit(){
        $table="signature_item";
        $table_id="signature_item_id";
        if(isset($_GET['d_edit']))
        {
            $id=$_GET['d_edit'];
            //echo $id; exit;
            $data['edit_fetch']=$this->data_model->fetch_to_edit($table,$id,$table_id);
            $this->load->view('admin/food/edit_signature_item',$data);
        }
    }
    function signature_item_edit_by_a_restaurent(){
        $table="signature_item";
        $table_id="signature_item_id";
        $id=$this->uri->segment(4);
        $data['edit_fetch']=$this->data_model->fetch_to_edit_by_a_restaurent($table,$id,$table_id);
        $this->load->view('admin/food/edit_signature_item_by_a_restaurent',$data);

    }
    function signature_item_delete_by_a_restaurent(){
        $table_name='signature_item';
        $signature_item_id=$this->uri->segment(4);
        //echo $res_id; exit;
        $this->data_model->delete_signature_item_by_a_restaurent($table_name,$signature_item_id);
        //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent');
        redirect('admin/restaurent/fatch_restaurent');
    }
    function signature_item_update(){
        $table_name="signature_item";
        $table_id="signature_item_id";
        $id=$this->input->post('signature_item_id');
        $data=array(
            'item_name'			            =>$this->input->post('item_name'),
            'item_short_description'		=>$this->input->post('item_short_description'),
            'alergy_notice'	                =>$this->input->post('alergy_notice'),
            'item_price'		            =>$this->input->post('item_price'),
            'catagory_id'	                =>$this->input->post('catagory_id')
        );
        $this->data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/food/fatch_signature_item');
    }
    function signature_item_update_by_a_restaurent(){
        $table_name="signature_item";
        $table_id="signature_item_id";
        $id=$this->input->post('signature_item_id');
        $data=array(
            'item_name'			        =>$this->input->post('item_name'),
            'item_short_description'		=>$this->input->post('item_short_description'),
            'alergy_notice'	                =>$this->input->post('alergy_notice'),
            'item_price'		        =>$this->input->post('item_price'),
            'catagory_id'	                =>$this->input->post('catagory_id')
        );
        $this->data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/restaurent/fatch_restaurent');
    }
    /********************************************** cuisine_type_category edit *************************************************/
    function cuisine_type_category_edit(){
        $table="cuisine_type_category";
        $table_id="cuisine_type_id";
        if(isset($_GET['d_edit']))
        {
            $id=$_GET['d_edit'];
            //echo $id; exit;
            $data['edit_fetch']=$this->data_model->fetch_to_edit($table,$id,$table_id);
            $this->load->view('admin/food/edit_cuisine_type_category',$data);
        }
    }
    function cuisine_type_category_update(){
        $table_name="cuisine_type_category";
        $table_id="cuisine_type_id";
        $id=$this->input->post('cuisine_type_id');
        $data=array(
            'cuisine_type_category_name'			    =>$this->input->post('cuisine_type_category_name'),
            'cuisine_type_category_short_description'		    =>$this->input->post('cuisine_type_category_short_description')
        );
        $this->data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/food/fatch_cuisine_type_category');
    }

    function allergy()
    {
        if($this->input->post()){

            
            $delivery_data=$this->data_model->fatch_all_data('allergy');
            $form_data=$this->input->post();
                // print_r($form_data); exit; 
            unset($form_data['submit']);
            $config['upload_path'] = './assets/admin_assets/allergyicon/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';  
            $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            //echo $config['file_name']; exit;
            $new_name = time().$_FILES["allergy_icon"]['name'];
            $config['file_name'] = $new_name; 
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('allergy_icon'))
            {
                $error = array('error' => $this->upload->display_errors()); 
                // print_r($error['error']); exit; 
                $this->session->set_flashdata('danger',$error['error']);                           
            }
            else
            {
                // print_r($config); exit; 
                    $file_data = $this->upload->data();
                    $data = array(
                            'file'      => $file_data['file_name']
                    );
                    $form_data['create_at']=date('Y-m-d H:i:s'); 
                    $form_data['allergy_icon_name']= $config['file_name']; 
                    $this->data_model->insert_data_to_database('allergy',$form_data);    
                    $this->session->set_flashdata('message','Allergy successfully added');                           
                    redirect('admin/food/allergy');

            }
        }

        $data['allergy']=$this->data_model->fatch_all_data('allergy');
        $data['page']='admin/food/allergy';
        $this->load->view('admin/common/template',$data);
    }


    function delete_allergy($id=null){
        if($id):
            $this->db->delete('allergy',array('id'=>$id));             
        endif;
        $this->session->set_flashdata('message','Allergy successfully deleted');                           
        redirect('admin/food/allergy');
    }

    // function edit_allergy($id=null){
    //     if($id):
    //         if($this->input->post()){
    //             $delivery_data=$this->data_model->fatch_all_data('allergy');
    //             $form_data=$this->input->post();
    //             unset($form_data['submit']);
    //             $form_data['create_at']=date('Y-m-d H:i:s');
    //             // var_dump($form_data);
    //             // $this->data_model->insert_data_to_database('allergy',$form_data);            
    //             $this->data_model->updates('id',$id,'allergy',$form_data);
    //             redirect('admin/food/allergy');
    //         }
    //         $data['this_allergy']= $this->data_model->fatch_data_where('allergy',array('id'=>$id));                   
    //         $data['allergy']=$this->data_model->fatch_all_data('allergy');
            
    //         $data['page']='admin/food/edit_allergy';
    //         $this->load->view('admin/common/template',$data);
    //     else:
    //        redirect('admin/food/allergy');
    //     endif; 
    // }


    function edit_allergy($id=null){
        if($id):
            if($this->input->post()){
                $delivery_data=$this->data_model->fatch_all_data('allergy');
                $form_data=$this->input->post();
                unset($form_data['submit']);
                $config['upload_path'] = './assets/admin_assets/allergyicon/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '100';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $new_name = time().$_FILES["allergy_icon"]['name'];
                $config['file_name'] = $new_name; 
                //print_r($form_data); exit; 
                $this->load->library('upload', $config);

                if (! $this->upload->do_upload('allergy_icon'))
                {
                    if($form_data['allergy_icon_name']){
                        $this->data_model->updates('id',$id,'allergy',$form_data);
                        redirect('admin/food/allergy');
                    }
                    $error = array('error' => $this->upload->display_errors()); 
                    // print_r($error['error']); exit; 
                    $this->session->set_flashdata('danger',$error['error']);  
                }
                else
                {
                        $file_data = $this->upload->data();
                        $data = array(
                            'file'      => $file_data['file_name']
                        );
                        $form_data['create_at']=date('Y-m-d H:i:s'); 
                        $form_data['allergy_icon_name']= $config['file_name']; 
                        $this->data_model->updates('id',$id,'allergy',$form_data);
                        $this->session->set_flashdata('message','Allergy successfully updated');                           
                        redirect('admin/food/allergy');
                }
            }
            $data['this_allergy']= $this->data_model->fatch_data_where('allergy',array('id'=>$id));                   
            $data['allergy']=$this->data_model->fatch_all_data('allergy');
            
            $data['page']='admin/food/edit_allergy';
            $this->load->view('admin/common/template',$data);
        else:
           redirect('admin/food/allergy');
        endif; 
    }

    function changeCategoryStatus(){

                 $rowId=$this->input->post('id'); 
                 $rowvalue=$this->input->post('value');
                 if($rowvalue=='Enabled'):
                    $value=0;
                else:
                    $value=1;
                endif;
                 $data=array(
                          'catagory_status' => $value
                    );
           

                 $this->data_model->updates('catagory_id',$rowId,'indi_catagories',$data);
                 
                 $result=$this->data_model->fatch_data_where('indi_catagories', array('catagory_id'=> $rowId));

                echo json_encode($result); 
    }

    function changeItemStatus(){

                 $rowId=$this->input->post('id'); 
                 $rowvalue=$this->input->post('value');
                 if($rowvalue=='Enabled'):
                    $value=0;
                else:
                    $value=1;
                endif;
                 $data=array(
                          'item_status' => $value
                    );
           

                 $this->data_model->updates('item_id',$rowId,'indi_items',$data);
                 
                 $result=$this->data_model->fatch_data_where('indi_items', array('item_id'=> $rowId));

                echo json_encode($result); 
    }
}