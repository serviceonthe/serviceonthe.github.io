<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Data_Operator_Dashboard extends CI_Controller{
		/*function __construct(){
			parent::__construct()
		}*/
		function home(){
            $this->load->view('admin/data_operator_dashboard/home');
			//$this->load->view('admin/login_page');
		}
        function add_restaurent(){
            $this->load->view('admin/data_operator_dashboard/restaurent/add_restaurent');
        }
        function add_restaurent_feature_info(){
            $this->load->view('admin/data_operator_dashboard/restaurent/add_restaurent_feature_info');
        }
        function food_category(){
            $this->load->view('admin/data_operator_dashboard/food/food_category');
        }
        function food_menu(){
            $this->load->view('admin/data_operator_dashboard/food/food_menu');
        }
        function item_type(){
            $this->load->view('admin/data_operator_dashboard/food/item_type');
        }
        function search_restaurent(){
            $this->load->view('admin/data_operator_dashboard/restaurent/search_restaurent');
        }

        /*
		function home(){
			$this->load->view('admin/home');
		}
        function data_operator_dashboard(){
            $this->load->view('admin/data_operator_dashboard/home');
        }
		function list_users(){
			$this->load->view('admin/users/list_users');
		}
		function add_users(){
			$this->load->view('admin/users/add_users');
		}

        function cuisine_type_category_details(){
            $this->load->view('admin/food/cuisine_type_category_details');
        }
        function indi_category_details(){
            $this->load->view('admin/food/indi_category_details');
        }


		function item_notification(){
			$this->load->view('admin/food/item_notification');
		}
		function list_restaurent(){
			$this->load->restaurent('fatch_restaurent');
		}

		//sub menu add_restaurent_feature_info() from add_restaurent() in add_restaurent.php 

		function restaurent_menu_setting(){
			$this->load->view('admin/restaurent/restaurent_menu_setting');
		}
		function restaurent_menu_edit(){
			$this->load->view('admin/restaurent/restaurent_menu_edit');
		}

        function restaurent_feature_information_detail(){
            $this->load->view('admin/restaurent/restaurent_feature_information_detail');
        }
		function list_order(){
			$this->load->view('admin/list_order');
		}
		function list_reservation(){
			$this->load->view('admin/list_reservation');
		}
		function restaurent_statement(){
			$this->load->view('admin/restaurent_statement');
		}
		function summery(){
			$this->load->view('admin/summery');
		}
		function ticket(){
			$this->load->view('admin/ticket');
		}
		function setting(){
			$this->load->view('admin/setting');
		}
		function department(){
			$this->load->view('admin/department');
		}
		function staff(){
			$this->load->view('admin/staff');
		}
		function page_category(){
			$this->load->view('admin/page_category');
		}
		function page(){
			$this->load->view('admin/page');
		}
		function page_management_menu(){
			$this->load->view('admin/page_management_menu');
		}
		function footer_content(){
			$this->load->view('admin/footer_content');
		}
		function overview_content(){
			$this->load->view('admin/overview_content');
		}
		function category(){
			$this->load->view('admin/category');
		}
		function post(){
			$this->load->view('admin/post');
		}
		function comment(){
			$this->load->view('admin/comment');
		}
		function vedio_management(){
			$this->load->view('admin/vedio_management');
		}
        */
	}



