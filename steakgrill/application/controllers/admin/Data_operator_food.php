<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_Operator_Food extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('data_operator_data_model');
    }
    function fatch_cuisine_type_category(){
        $table_name = 'cuisine_type_category';
        $column_name=$this->session->userdata('user_email');
        $data['all_cuisine_category'] = $this->data_operator_data_model->fatch_all_data_by_user_email($table_name,$column_name);
        $this->load->view('admin/data_operator_dashboard/food/cuisine_type_category_details', $data);
    }
    function fatch_indi_category(){
        $table_name = 'indi_catagories';
       // $column_name=$this->session->userdata('user_email');
        //echo $table_name;
       // echo $column_name;
        //exit;
        $data['all_indi_category'] = $this->data_operator_data_model->fatch_all_data($table_name);
        $this->load->view('admin/data_operator_dashboard/food/indi_category_details', $data);
    }
    function fatch_category(){
        $table_name = 'indi_catagories';
       // $column_name=$this->session->userdata('user_email');
        //echo $table_name;
       // echo $column_name;
        //exit;
        $data['all_indi_category'] = $this->data_operator_data_model->fatch_all_data($table_name);
        $this->load->view('admin/data_operator_dashboard/food/indi_category_details', $data);
    }
    function fatch_cuisine_item(){
        $table_name = 'cuisine_item';
        $column_name=$this->session->userdata('user_email');
        $data['all_cuisine_item'] = $this->data_operator_data_model->fatch_all_data_by_user_email($table_name,$column_name);
        $this->load->view('admin/data_operator_dashboard/food/cuisine_item_details', $data);
    }
    function fatch_indi_item(){
        $table_name = 'indi_items';
        $data['all_indi_item'] = $this->data_operator_data_model->fatch_all_data($table_name);
        $this->load->view('admin/data_operator_dashboard/food/indi_item_details', $data);
    }
    function fatch_item(){
        $table_name = 'indi_items';
        $data['all_indi_item'] = $this->data_operator_data_model->fatch_all_data($table_name);
        $this->load->view('admin/data_operator_dashboard/food/indi_item_details', $data);
    }
    
    function fatch_signature_item(){
        $table_name = 'signature_item';
        $column_name=$this->session->userdata('user_email');
        $data['all_signature_item'] = $this->data_operator_data_model->fatch_all_data_by_user_email($table_name,$column_name);
        $this->load->view('admin/data_operator_dashboard/food/signature_item_details', $data);
    }
    function fatch_signature_item_by_a_restaurent(){
        $table_name = 'signature_item';
        $column_name=$this->uri->segment(4);
        $data['all_signature_item'] = $this->data_operator_data_model->fatch_signature_item_by_a_restaurent($table_name,$column_name);
        $this->load->view('admin/data_operator_dashboard/food/signature_item_details_by_a_restaurent', $data,$column_name);
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
            $data['edit_fetch']=$this->data_operator_data_model->fetch_to_edit($table,$id,$table_id);
            $this->load->view('admin/data_operator_dashboard/food/edit_cuisine_item',$data);
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
        $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/data_operator_food/fatch_cuisine_item');
    }
        /********************************************** signature_item edit *************************************************/
    function signature_item_edit(){
        $table="signature_item";
        $table_id="signature_item_id";
        if(isset($_GET['d_edit']))
        {
            $id=$_GET['d_edit'];
            //echo $id; exit;
            $data['edit_fetch']=$this->data_operator_data_model->fetch_to_edit($table,$id,$table_id);
            $this->load->view('admin/data_operator_dashboard/food/edit_signature_item',$data);
        }
    }
    function signature_item_edit_by_a_restaurent(){
        $table="signature_item";
        $table_id="signature_item_id";
        $id=$this->uri->segment(4);
        $data['edit_fetch']=$this->data_operator_data_model->fetch_to_edit_by_a_restaurent($table,$id,$table_id);
        $this->load->view('admin/data_operator_dashboard/food/edit_signature_item_by_a_restaurent',$data);

    }
    function signature_item_delete_by_a_restaurent(){
        $table_name='signature_item';
        $signature_item_id=$this->uri->segment(4);
        //echo $res_id; exit;
        $this->data_operator_data_model->delete_signature_item_by_a_restaurent($table_name,$signature_item_id);
        //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent');
        redirect('admin/data_operator_restaurent/fatch_restaurent');
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
        $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/data_operator_food/fatch_signature_item');
    }
    function signature_item_update_by_a_restaurent(){
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
        $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/data_operator_restaurent/fatch_restaurent');
    }
    /********************************************** cuisine_type_category edit *************************************************/
    function cuisine_type_category_edit(){
        $table="cuisine_type_category";
        $table_id="cuisine_type_id";
        if(isset($_GET['d_edit']))
        {
            $id=$_GET['d_edit'];
            //echo $id; exit;
            $data['edit_fetch']=$this->data_operator_data_model->fetch_to_edit($table,$id,$table_id);
            $this->load->view('admin/data_operator_dashboard/food/edit_cuisine_type_category',$data);
        }
    }
    function cuisine_type_category_update(){
        $table_name="cuisine_type_category";
        $table_id="cuisine_type_id";
        $id=$this->input->post('cuisine_type_id');
        $data=array(
            'cuisine_type_category_name'			            =>$this->input->post('cuisine_type_category_name'),
            'cuisine_type_category_short_description'		    =>$this->input->post('cuisine_type_category_short_description'),
            'user_email'			                            =>$this->session->userdata('user_email'),
            'user_type'				                            =>$this->session->userdata('user_type')
        );
        $this->data_operator_data_model->update($id,$table_name,$data,$table_id);
        redirect('admin/data_operator_food/fatch_cuisine_type_category');
    }
}