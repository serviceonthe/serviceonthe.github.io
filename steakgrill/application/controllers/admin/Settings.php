<?php 
class Settings extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model');
        $this->load->library('form_validation');
    }

    function index(){
    	$this->load->view('admin/common/template');
    }
    function discount(){
    	if($this->input->post()){
			$data=$this->input->post();	
			unset($data['submit']);

            //print_r($data); exit; 
			$insert=$this->data_model->insert_settings_data('settings',$data);

		}

		$data['social_link']=$this->db->get('settings')->result();

		
		foreach ($data['social_link'] as $key => $value) {
			unset($data['social_link'][$key]);
			$data['social_link'][$value->slug]=$value;
		}
    	$data['page']='admin/settings/discount';
    	$this->load->view('admin/common/template',$data);
    }
    function payment_old(){
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
		$data['page']='admin/settings/payment';
    	$this->load->view('admin/common/template',$data);
    }
    function business(){
    	$data['page']='admin/settings/business';
    	$this->load->view('admin/common/template',$data);
    }
    function email($type){

        $where=array('type'=>$type);        
        if($this->input->post()){
            $email_data=$this->data_model->fatch_data_where('email_settings',$where);
            $form_data=$this->input->post();
            unset($form_data['submit']);  
            $form_data['update_at']=date('Y-m-d H:i:s');          
            if($email_data){
                $this->data_model->updates('id',$email_data['id'],'email_settings',$form_data);
            }else{
                $form_data['create_at']=date('Y-m-d H:i:s');
                $this->data_model->insert_data_to_database('email_settings',$form_data);
            }
            // var_dump($this->input->post());
        }
        $data['email']=$this->data_model->fatch_data_where('email_settings',$where);
        if(!$data['email']){
            $data['email']=array(
                'type'=>'',
                'form'=>'',
                'to'=>'',
                'cc'=>'',
                'bcc'=>'',
                'subject'=>'',
                'message'=>''
                );
        }
        $data['email_type']=$type;
        $data['page']='admin/settings/email';
        $this->load->view('admin/common/template',$data);
    }

    function delivery()
    {
        $where=array(
            'type'=>'delivery_time'
            );
        if($this->input->post()){
            $delivery_data=$this->data_model->fatch_data_where('collection_delivery_settings',$where);
            $form_data=$this->input->post();
            unset($form_data['submit']);
            $form_data['c_or_d']='D';
            $form_data['type']='delivery_time';
            // var_dump($form_data);
            if($delivery_data){
                $this->data_model->updates('id',$delivery_data['id'],'collection_delivery_settings',$form_data);
            }else{
                $this->data_model->insert_data_to_database('collection_delivery_settings',$form_data);
            }
            
        }
        
        $data['delivery']=$this->data_model->fatch_data_where('collection_delivery_settings',$where);

        
        if(!$data['delivery']){
            $data['delivery']=array(
                'Saturday'=>'',
                'Sunday'=>'',
                'Monday'=>'',
                'Tuesday'=>'',
                'Wednesday'=>'',
                'Thursday'=>'',
                'Friday'=>''
                );
        }
        /*var_dump($data['delivery']);
        exit;*/
        $data['page']='admin/settings/delivery';
        $this->load->view('admin/common/template',$data);
    }

    function collection()
    {

        $where=array(
            'type'=>'collection_time'
            );
        if($this->input->post()){
            $delivery_data=$this->data_model->fatch_data_where('collection_delivery_settings',$where);
            $form_data=$this->input->post();
            unset($form_data['submit']);
            $form_data['c_or_d']='C';
            $form_data['type']='collection_time';
            // var_dump($form_data);
            if($delivery_data){
                $this->data_model->updates('id',$delivery_data['id'],'collection_delivery_settings',$form_data);
            }else{
                $this->data_model->insert_data_to_database('collection_delivery_settings',$form_data);
            }
            
        }
        
        $data['delivery']=$this->data_model->fatch_data_where('collection_delivery_settings',$where);

        
        if(!$data['delivery']){
            $data['delivery']=array(
                'Saturday'=>'',
                'Sunday'=>'',
                'Monday'=>'',
                'Tuesday'=>'',
                'Wednesday'=>'',
                'Thursday'=>'',
                'Friday'=>''
                );
        }
        $data['page']='admin/settings/collection';
        $this->load->view('admin/common/template',$data);
    }

    /**************** Payment Method Start***********/

    function payment(){
        $data['all_payment'] = $this->data_model->get_payment_method_list();
        //print_r($data['all_payment']);  
        $data['page']='admin/settings/payment_method_list';
        $this->load->view('admin/common/template',$data);
    }

    function changePayMatStatus(){

                 $rowId=$this->input->post('id'); 
                 $rowvalue=$this->input->post('value');
                 if($rowvalue=='Enabled'):
                    $value=0;
                else:
                    $value=1;
                endif;
                 $data=array(
                          'payment_method_status' => $value
                    );
           

                 $this->data_model->updates('payment_method_id',$rowId,'payment_method',$data);
                 
                 $result=$this->data_model->fatch_data_where('payment_method', array('payment_method_id'=> $rowId));

                echo json_encode($result); 
    }



    function payment_method_details($id=null) {

        $table = "payment_method_info";  
        $table_id = "payment_method_id"; 
        if ($id) {
           // echo $id; exit; 
            $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
            //print_r($data['edit_fetch']); exit;   
            $data['page']='admin/settings/edit_payment_method';
            $this->load->view('admin/common/template', $data);

        }else{
            redirect('admin/settings/payment');
        }
    }

    function update_payment_method() {   

        //echo 'hello';exit; 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('currency', 'Currency', 'required');
        $this->form_validation->set_rules('installation_id', 'Installation Id', 'required');
        $this->form_validation->set_rules('merchant_id', 'Merchant Id', 'required');
        $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');
        if($this->input->post('payment_method_id')==2){
            $this->form_validation->set_rules('payment_method_email', 'Payment Email', 'required|valid_email');
        }

        if ($this->form_validation->run() === false) {
            //$data['duplicate_user']='';
            $table = "payment_method_info";  
            $table_id = "payment_method_id"; 
            $id= $this->input->post('payment_method_id'); 
            $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
            $data['page']='admin/settings/edit_payment_method';
            $this->load->view('admin/common/template', $data);
        } else {
            $table_name = "payment_method_info";
            $table_id = "payment_method_id";
            $id = $this->input->post('payment_method_id');  
            $data = array(
                'payment_method_id' => $this->input->post('payment_method_id'),
                'currency' => $this->input->post('currency'),
                'installation_id' => $this->input->post('installation_id'),
                'merchant_id' => $this->input->post('merchant_id'),
                'payment_method_email' => $this->input->post('payment_method_email'),
                'payment_mode' => $this->input->post('payment_mode')
            );

            $this->data_model->update($id, $table_name, $data, $table_id);
            //redirect('admin/settings/payment');

                 // if($result){  
                               $this->session->set_flashdata('message','Payment Method successfully updated');                         
                              redirect('admin/settings/payment');
                       // }
            //}
        }
    }
    /**************** Payment Method End***********/
    /**************** Business Hour Start***********/ 

    public function business_hour(){  

        //echo "saleah"; exit; 

        $data['businessHour'] = $this->data_model->getBusinessHour(); 
   
        //print_r($data['businessHour']); exit; 

        $data['page']='admin/settings/business_hour_list';
        $this->load->view('admin/common/template', $data);

    }

    function business_hour_update(){  
            $table_name="indi_res_business_hour";    
            $table_id="res_id"; 
            $id=1;  

            $data_for_feature=array(
                'sun_from1'                 =>$this->input->post('sun_from1'),
                'sun_to1'                   =>$this->input->post('sun_to1'),
                'sun_from2'                 =>$this->input->post('sun_from2'),
                'sun_to2'                   =>$this->input->post('sun_to2'),
                'mon_from1'                 =>$this->input->post('mon_from1'),
                'mon_to1'                   =>$this->input->post('mon_to1'),
                'mon_from2'                 =>$this->input->post('mon_from2'),
                'mon_to2'                   =>$this->input->post('mon_to2'),
                'tue_from1'                 =>$this->input->post('tue_from1'),
                'tue_to1'                   =>$this->input->post('tue_to1'),
                'tue_from2'                 =>$this->input->post('tue_from2'),
                'tue_to2'                   =>$this->input->post('tue_to2'),
                'wed_from1'                 =>$this->input->post('wed_from1'),
                'wed_to1'                   =>$this->input->post('wed_to1'),                  
                'wed_from2'                 =>$this->input->post('wed_from2'),
                'wed_to2'                   =>$this->input->post('wed_to2'),
                'thus_from1'                =>$this->input->post('thus_from1'),
                'thus_to1'                  =>$this->input->post('thus_to1'),
                'thus_from2'                =>$this->input->post('thus_from2'),
                'thus_to2'                  =>$this->input->post('thus_to2'),
                'fri_from1'                 =>$this->input->post('fri_from1'),
                'fri_to1'                   =>$this->input->post('fri_to1'),
                'fri_from2'                 =>$this->input->post('fri_from2'),
                'fri_to2'                   =>$this->input->post('fri_to2'),
                'sat_from1'                 =>$this->input->post('sat_from1'),
                'sat_to1'                   =>$this->input->post('sat_to1'),
                'sat_from2'                 =>$this->input->post('sat_from2'),
                'sat_to2'                   =>$this->input->post('sat_to2')
            );
                $this->data_model->update($id,$table_name,$data_for_feature,$table_id);
                $this->session->set_flashdata('message','Business Hour successfully updated');                         
                redirect('admin/settings/business_hour/');            
        }

    /**************** For coupon Start***********/ 

        function add_voucher() {
        $this->form_validation->set_rules('voucher_type', 'Voucher Type', 'required|xss_clean');
        $this->form_validation->set_rules('voucher_value_type', 'Voucher Value Type', 'required|xss_clean');
        $this->form_validation->set_rules('voucher_amount', 'Voucher Amount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'required|xss_clean');

        if ($this->form_validation->run() == true) {
            $data = array(
                'voucher_type' => $this->input->post('voucher_type'),
                'voucher_value_type' => $this->input->post('voucher_value_type'),
                'voucher_amount' => $this->input->post('voucher_amount'),
                'start_date' => $this->input->post('start_date'),
                'expire_date' => $this->input->post('expire_date'),
            );

            $this->data_model->addVoucher($data);
            $this->session->set_flashdata('success', 'Voucher Added'); 
            redirect('admin/settings/voucher_list', 'refresh');
        } else {
            //$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['success'] = $this->session->flashdata('success_message');
            $data['page']='admin/settings/add_vauchar'; 
            $this->load->view('admin/common/template',$data);
        }
    }


    function voucher_list() {
        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['all_vauchar'] = $this->data_model->fatch_all_data('voucher'); 
        //print_r($data['product_promotion']); exit;  
        $data['page']='admin/settings/vauchar_list'; 
        $this->load->view('admin/common/template',$data);

    }

    function delete_voucher() {
        $id = $this->uri->segment(4);
        if ($this->data_model->deleteVoucher($id)) {
            $this->session->set_flashdata('success', 'Voucher Deleted');
            redirect('admin/settings/voucher_list', 'refresh');
        }
    }

    function edit_voucher() {
        $id = $this->uri->segment(4);

        $this->form_validation->set_rules('voucher_type', 'Voucher Type', 'required|xss_clean');
        $this->form_validation->set_rules('voucher_value_type', 'Voucher Value Type', 'required|xss_clean');
        $this->form_validation->set_rules('voucher_amount', 'Voucher Amount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'required|xss_clean');

        if ($this->form_validation->run() == true) {
            $data = array(
                'voucher_id' => $this->input->post('voucher_id'),
                'voucher_type' => $this->input->post('voucher_type'),
                'voucher_value_type' => $this->input->post('voucher_value_type'),
                'voucher_amount' => $this->input->post('voucher_amount'),
                'start_date' => $this->input->post('start_date'),
                'expire_date' => $this->input->post('expire_date'),
            );

            $this->data_model->editVoucher($data, $id);
            $this->session->set_flashdata('success', 'Voucher Updated');
            redirect('admin/settings/voucher_list', 'refresh');
        } else {

            $data['voucher'] = $this->data_model->getVoucherByID($id);
            //$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['success'] = $this->session->set_flashdata('success', 'Voucher Updated');
            $data['page']='admin/settings/edit_vauchar'; 
            $this->load->view('admin/common/template',$data);
        }
    }

    function coupon_use_history() {

        $data['coupon_use_history'] = $this->data_model->coupon_use_history();
        //print_r($data['product_promotion']); exit;  
        $data['page']='admin/settings/coupon_use_history_list'; 
        $this->load->view('admin/common/template',$data);
    }

    /////////////////////////////////////////
    function add_discount() {

        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('discount', 'Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('type', 'Type', 'required|xss_clean');
        $this->form_validation->set_rules('discount_type', 'Type', 'required|xss_clean');

        if ($this->form_validation->run() == true) {
                $data = array('name' => $this->input->post('name'),
                    'discount' => $this->input->post('discount'),
                    'type' => $this->input->post('type'),
                    'discount_type' => $this->input->post('discount_type')
                );
            //$this->data_model->addVoucher($data);
            
            $insert=$this->data_model->insert_data_to_database('discounts',$data);
            $this->session->set_flashdata('message','Discount successfully added');                           
            redirect('admin/settings/discount_list', 'refresh');
        } else {
            //$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['page']='admin/settings/add_discount'; 
            $this->load->view('admin/common/template',$data);
        }
    }

    function discount_list() {
        $data['all_discount'] = $this->data_model->fatch_all_data('discounts'); 
        //print_r($data['all_discount']); exit;  
        $data['page']='admin/settings/discount_list'; 
        $this->load->view('admin/common/template',$data);

    }
    function delete_discount() {
        $id = $this->uri->segment(4);
        if ($this->data_model->deleteDsicount($id)) {
            $this->session->set_flashdata('message', 'Discount Deleted');
            redirect('admin/settings/discount_list', 'refresh');
        }
    }

    function discount_edit(){

        $id = $this->uri->segment(4);
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('discount', 'Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('type', 'Type', 'required|xss_clean');
        $this->form_validation->set_rules('discount_type', 'Type', 'required|xss_clean');

        if ($this->form_validation->run() == true) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'discount' => $this->input->post('discount'),
                    'type' => $this->input->post('type'),
                    'discount_type' => $this->input->post('discount_type')
                );
                $table_name='discounts';
                $field_name='id';
                $field_value=$this->input->post('id');   

            $this->data_model->updates($field_name,$field_value,$table_name,$data);
            $this->session->set_flashdata('success', 'Discount Updated');
            redirect('admin/settings/discount_list', 'refresh');
        } else {

            $table='discounts';
            $table_id='id';
            $id=$id; 

            $data['discount'] = $this->data_model->fetch_to_edit($table,$id,$table_id);
            // echo '<pre>';
            // print_r($data['discount']);
            // echo '</pre>'; exit; 
            //$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['page']='admin/settings/edit_discount'; 
            $this->load->view('admin/common/template',$data);
        } 

    }

    //////////////For Bulk discount Update ///////////////////////

    //////////////For Bulk discount Update ///////////////////////

    function add_bulk_coupon() {
        $this->form_validation->set_rules('coupon_type', 'Voucher Type', 'required|xss_clean');
        $this->form_validation->set_rules('coupon_value_type', 'Voucher Value Type', 'required|xss_clean');
        $this->form_validation->set_rules('coupon_amount', 'Voucher Amount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('regular_discount', 'Regular Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'required|xss_clean');
        $this->form_validation->set_rules('coupon_group', 'Group Name', 'required|xss_clean'); 
        
        $this->form_validation->set_rules('bday_discount_amount', 'Birthday Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('partner_bday_discount_amount', 'Partner Birthday Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('anniversary_discount_amount', 'Anniversary Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('special_day_discount_amount', 'Special Day Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('unknown_custome_discount_amount', 'Unknown Customer Discount', 'required|numeric|xss_clean');

        $coupon_group=$this->input->post('coupon_group');
        // echo $coupon_group; 
        // var_dump($coupon_group); 
        // echo $couponGroup=ord('F'); exit;
        if($coupon_group!=''){
            $c_Group=explode('_', $coupon_group); 
            $data['couponGroupId']=$c_Group[0]; 
            $data['couponGroupName']=$c_Group[1];
        }

        if ($this->form_validation->run() == true) {
            $data = array(
                'coupon_type' => $this->input->post('coupon_type'),
                'coupon_value_type' => $this->input->post('coupon_value_type'),
                'coupon_amount' => $this->input->post('coupon_amount'),
                'regular_discount' => $this->input->post('regular_discount'),
                'coupon_group' => $data['couponGroupName'],
                'couponId' => $data['couponGroupId'],
                'start_date' => $this->input->post('start_date'),
                'expire_date' => $this->input->post('expire_date'),
                'mumber_of_coupon' => $this->input->post('mumber_of_coupon'), 
                
                'bday_discount_amount' => $this->input->post('bday_discount_amount'),
                'partner_bday_discount_amount' => $this->input->post('partner_bday_discount_amount'),
                'anniversary_discount_amount' => $this->input->post('anniversary_discount_amount'),
                'special_day_discount_amount' => $this->input->post('special_day_discount_amount'),
                'unknown_custome_discount_amount' => $this->input->post('unknown_custome_discount_amount'), 
            );

            $this->data_model->addBulkCoupon($data);  
            $this->session->set_flashdata('success', 'Bulk Coupon Added'); 
            redirect('admin/settings/bulk_coupon_list', 'refresh');
        } else {
            //$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['success'] = $this->session->flashdata('success_message');
            $data['page']='admin/settings/add_bulk_coupon'; 
            $this->load->view('admin/common/template',$data);
        }
    }

    function bulk_coupon_list() {
        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $data['success_message'] = $this->session->flashdata('success_message');
        $data['all_bulk_coupon'] = $this->data_model->fatch_all_data('bulk_coupon'); 
        //print_r($data['product_promotion']); exit;  
        $data['page']='admin/settings/bulk_coupon_list'; 
        $this->load->view('admin/common/template',$data);

    }
    function delete_bulk_coupon() {
        $id = $this->uri->segment(4);
        if ($this->data_model->deleteBulkCoupon($id)) {
            $this->session->set_flashdata('success', 'Bulk Coupon Deleted');
            redirect('admin/settings/bulk_coupon_list', 'refresh');
        }
    }

    function edit_bulk_coupon() { 
        $id = $this->uri->segment(4);
        //echo $id; exit; 
        $this->form_validation->set_rules('coupon_type', 'Voucher Type', 'required|xss_clean');
        $this->form_validation->set_rules('coupon_value_type', 'Voucher Value Type', 'required|xss_clean');
        $this->form_validation->set_rules('coupon_amount', 'Voucher Amount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required|xss_clean');
        $this->form_validation->set_rules('expire_date', 'Expire Date', 'required|xss_clean');

        if ($this->form_validation->run() == true) {
            $data = array(
                'coupon_id' => $this->input->post('coupon_id'),
                'coupon_type' => $this->input->post('coupon_type'),
                'coupon_value_type' => $this->input->post('coupon_value_type'),
                'coupon_amount' => $this->input->post('coupon_amount'),
                'start_date' => $this->input->post('start_date'),
                'expire_date' => $this->input->post('expire_date'),
            );

            $this->data_model->editBulkCoupon($data, $id);
            $this->session->set_flashdata('success', 'Bulk Coupon Updated');
            redirect('admin/settings/bulk_coupon_list', 'refresh');
        } else {

            $data['voucher'] = $this->data_model->getBulkCouponByID($id);
            //$data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
            $data['success'] = $this->session->set_flashdata('success', 'Bulk Coupon Updated');
            $data['page']='admin/settings/edit_bulk_coupon';
            $this->load->view('admin/common/template',$data);
        }
    }

    public function download_bulk_coupon(){

        $this->data_model->downloadBulkCoupon();
        $data['all_bulk_coupon'] = $this->data_model->fatch_all_data('bulk_coupon'); 
        $data['page']='admin/settings/bulk_coupon_list'; 
        $this->load->view('admin/common/template',$data);

    }

    /************** For Special Discount *************//////////////


    function add_special_discount() {

        $this->form_validation->set_rules('bday_amount', 'Birthday Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('bday_value_type', 'Birthday Value Type', 'required|xss_clean');
        $this->form_validation->set_rules('partner_bday_amount', 'Partner Birthday Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('partner_bday_value_type', 'Partner Birthday Value Type', 'required|xss_clean');
        $this->form_validation->set_rules('anniversary_amount', 'Anniversary Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('anniversary_value_type', 'Anniversary Discount Value Type', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('special_day_amount', 'Special Day Discount', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('special_day_value_type', 'Special Discount Value Type', 'required|xss_clean');
        
        if ($this->form_validation->run() == true) {
            $data = array(
                'bday_amount' => $this->input->post('bday_amount'),
                'bday_value_type' => $this->input->post('bday_value_type'),
                'partner_bday_amount' => $this->input->post('partner_bday_amount'),
                'partner_bday_value_type' => $this->input->post('partner_bday_value_type'),
                'anniversary_amount' => $this->input->post('anniversary_amount'),
                'anniversary_value_type' => $this->input->post('anniversary_value_type'),
                'special_day_amount' => $this->input->post('special_day_amount'),
                'special_day_value_type' => $this->input->post('special_day_value_type'),
            );

            $id=1; 
            $this->data_model->editSpecialDiscount($data, $id);
            $this->session->set_flashdata('success', 'Special Discount Updated');
            redirect('admin/settings/add_special_discount', 'refresh');
        } else {

            $id=1;

            $data['specialDiscount'] = $this->data_model->getSpecialDiscountByID($id);
            $data['success'] = $this->session->set_flashdata('success', 'Bulk Coupon Updated');
            $data['page']='admin/settings/add_special_discount'; 
            $this->load->view('admin/common/template',$data);
        }
    }



}