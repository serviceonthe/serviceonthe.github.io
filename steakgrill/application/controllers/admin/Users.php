<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('data_model');
    }

    function add_user() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_first_name', 'user_first_name', 'required');
        $this->form_validation->set_rules('user_last_name', 'user_last_name', 'required');
        $this->form_validation->set_rules('user_name', 'user_name', 'required');
        $this->form_validation->set_rules('user_password', 'user_password', 'required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required');
        $this->form_validation->set_rules('user_email', 'user_email', 'required|valid_email');
        $this->form_validation->set_rules('user_address', 'user_address', 'required');
        $this->form_validation->set_rules('user_mobile', 'user_mobile', 'required');
        $this->form_validation->set_rules('user_city', 'user_city', 'required');
        $this->form_validation->set_rules('user_post_code', 'user_post_code', 'required');
        $this->form_validation->set_rules('user_type', 'user_type', 'required');
        if ($this->form_validation->run() === false) {
            //$data['duplicate_user']='';
            $data['page']='admin/users/add_users';
            $this->load->view('admin/common/template',$data);
        } else {
            //$num_match=$this->db->select('user_email')->get_where('indi_users',array('user_email'=>$this->input->post('user_email')))->num_rows();
            //if($num_match>0)
            //{
            //$data['duplicate_user']='The User Email is already registered. Please select other user email';
            //$this->load->view('admin/add_users',$data);
            //}
            //else
            //{
            //save to database
            $this->load->model('data_model');
            $table_name = "indi_users";
            $data = array(
                'user_first_name' => $this->input->post('user_first_name'),
                'user_last_name' => $this->input->post('user_last_name'),
                'user_name' => $this->input->post('user_name'),
                'user_password' => md5($this->input->post('user_password')),
                'user_email' => $this->input->post('user_email'),
                'user_address' => $this->input->post('user_address'),
                'user_mobile' => $this->input->post('user_mobile'),
                'user_city' => $this->input->post('user_city'),
                'user_post_code' => $this->input->post('user_post_code'),
                'user_type' => $this->input->post('user_type')
            );
            $this->data_model->insert_data_to_database($table_name, $data);
            redirect('admin/users/fatch_users');
            //}
        }
    }

    function fatch_users() {
        $this->load->model('data_model');
        $table_name = 'indi_users';
        $data['all_users'] = $this->data_model->fatch_all_data($table_name);
        $data['page']='admin/users/list_users';
        $this->load->view('admin/common/template', $data);
    }

    function fatch_customers() {
        $this->load->model('data_model');
        $table_name = 'customer_info';
        $data['all_users'] = $this->data_model->fatch_all_data($table_name);
        $data['page']='admin/users/list_customer';
        $this->load->view('admin/common/template', $data);
    }

    /*     * ******************************************** cuisine_type_category edit ************************************************ */

    function users_edit() {
        $this->load->model('data_model');
        $table = "indi_users";
        $table_id = "user_id";
        if (isset($_GET['d_edit'])) {
            $id = $_GET['d_edit'];
            //echo $id; exit;
            $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
            $data['page']='admin/users/edit_users';
            $this->load->view('admin/common/template', $data);

        }else{
            redirect('admin/users/fatch_users');
        }
    }
    // function edit_category($id=null){
    //     if($id):
    //         $data['catagory']=$this->data_model->fatch_data_where('indi_catagories',array('catagory_id'=>$id));            
    //         // var_dump($data['catagory']);exit;
    //         $data['page']='admin/food/edit_category';
    //         $this->load->view('admin/common/template',$data);
    //     else:
    //         redirect('admin/food/fatch_category');
    //     endif;
    // }


    function users_update() {
        $this->load->model('data_model');
        $table_name = "indi_users";
        $table_id = "user_id";
        $id = $this->input->post('user_id');
        $data = array(
            'user_first_name' => $this->input->post('user_first_name'),
            'user_last_name' => $this->input->post('user_last_name'),
            'user_name' => $this->input->post('user_name'),
            'user_password' => $this->input->post('user_password'),
            'user_email' => $this->input->post('user_email'),
            'user_address' => $this->input->post('user_address'),
            'user_mobile' => $this->input->post('user_mobile'),
            'user_city' => $this->input->post('user_city'),
            'user_post_code' => $this->input->post('user_post_code')
        );
        $this->data_model->update($id, $table_name, $data, $table_id);
        $this->session->set_flashdata('message','User successfully Updated');                           
        redirect('admin/users/fatch_users');
    }


    function user_delete($id=null){
        if($id):
            $this->db->delete('indi_users',array('user_id'=>$id));            
            $this->session->set_flashdata('message','User successfully deleted');                           
            redirect('admin/users/fatch_users');
        else:
            redirect('admin/users/fatch_users');
        endif;
    }

    function changeUserStatus(){

                 $rowId=$this->input->post('id'); 
                 $rowvalue=$this->input->post('value');
                 if($rowvalue=='Enabled'):
                    $value=0;
                else:
                    $value=1;
                endif;
                 $data=array(
                          'user_status' => $value
                    );
           

                 $this->data_model->updates('user_id',$rowId,'indi_users',$data);
                 
                 $result=$this->data_model->fatch_data_where('indi_users', array('user_id'=> $rowId));

                echo json_encode($result); 
    }

    
    
    
//    function postcode_update(){
//        $res_post_code=$this->data_model->fatch_res_postcode();
//        echo '<pre>';
//        //print_r($res_post_code);
//        echo '</pre>';
//        $count=  count($res_post_code);
//        for($i=0; $i < $count; $i++){
//            $res_id=$res_post_code[$i]['res_id'];
//            $post_code=$res_post_code[$i]['res_post_code'];
//            $lat_long=$this->data_model->get_lat_long($post_code);
//            //print_r($lat_long);
//            $lat=$lat_long[0]['latitude'];
//            $long=$lat_long[0]['longitude'];
//            $postcode_update=$this->data_model->postcode_update($res_id,$post_code,$lat,$long);
////            if($postcode_update == true){
////                echo 'update';
////            }else{
////                echo 'not upedate';
////            }
//            //exit;
//        }
//    }

}
