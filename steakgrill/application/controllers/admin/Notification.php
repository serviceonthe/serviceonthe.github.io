<?php 

/**
* 
*/
class Notification extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		redirect('admin');
	}

	function notify($id=null){
		$data['notifications']=$this->data_model->get_all_data_where('*','notifications',array('isRead'=>0),'id DESC');
		$maxId=$data['notifications'][0]->id;
		if($maxId>$id){
			$data['notification_sound']=true;
		}else{
			$data['notification_sound']=false;
		}
		$data['maxId']=$maxId;
		// var_dump($data);exit;
		$this->load->view('admin/common/notification',$data);
	}
	function topnotify($id=null){
		$data['notifications']=$this->data_model->get_all_data_where('*','notifications',array('isRead'=>0),'id DESC');
		$total_notifications=count($data['notifications']);
		$maxId=$data['notifications'][0]->id;
		if($maxId>$id){
			$data['notification_sound']=true;
		}else{
			$data['notification_sound']=false;
		}
		$data['maxId']=$maxId;
		$body=$this->load->view('admin/common/notification_sound',$data,true);
		if($data['notification_sound']){
			echo $body;
		}
		echo '<div id="maxId" style="display:none">'.$maxId.'</div>';
		echo $total_notifications;
	}

}