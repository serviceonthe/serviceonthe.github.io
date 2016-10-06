
<?php

	if(!isset($page)){
		$page='page/home';
	}

    $this->load->view('common/head'); 
    $this->load->view('common/header'); 
    $this->load->view($page); 
    $this->load->view('common/footer'); 
?>
