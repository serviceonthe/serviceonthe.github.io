<?php 

/**
* 
*/
class Operator extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('session');    
    }

    function index()
    {
        $data['notifications']=$this->data_model->get_all_data_where('*','notifications',array('isRead'=>0),'id DESC');
        if($data['notifications']){
            $maxId=$data['notifications'][0]->id;       
            $data['maxId']=$maxId;            
        }else{
            $data['maxId']=0;
        }
        // $data['notifications']=$this->data_model->get_all_data_where('*','notifications',array('isRead'=>0));
        $this->load->view('admin/common/template',$data);
    }

    function order_list()
    {
        $table_name='customer_food_order';
        $data['order'] = $this->data_model->getAllOrder($table_name); 
        $data['page']='operator/order/list'; 
        $this->load->view('admin/common/template',$data);
    }

    function reservation_list(){
        $data['reservation'] = $this->data_model->get_all_data_where('*','bedford_reservation',array('reservation_id !='=>'0'),'reservation_id DESC');  
        $data['page']='operator/reservation/list';
        $this->load->view('admin/common/template',$data);
}
}
