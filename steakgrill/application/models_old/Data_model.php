<?php 

/**
* 
*/
class Data_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	// common insert query for normal insert

	function insert_data($table_name, $arrayData){

            $this->db->insert($table_name,$arrayData); 
            $insert_id = $this->db->insert_id();

	        if ($insert_id) {
	            return $insert_id;  
			}else{
		    	return FALSE; 
			}
    }


	// common get query for normal get data from select table
	function get_data($table){
		$query = $this->db->get($table);
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}

	// For row data by Id
	function get_data_by_id($table, $where=null){
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query->num_rows()>0) {
			return $query->result();
		}
	}

	/******* To get multiple  rows ********************/

	function get_result_array_where($table, $where=null){
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query->num_rows()>0) {
			return $query->result_array();
		}
    }

    /******* To get only one row ********************/

	function get_row_array_where($table, $where=null){
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query->num_rows()>0) {
			return $query->row_array();
		}
	}

	/******* To get only one row as object ********************/

	function get_row_object_where($table, $where=null){
		$this->db->where($where);
		$query = $this->db->get($table);
		if ($query->num_rows()>0) {
			return $query->row();
		}
	}

    /******* For User Login ********************/

	public function loginUser($email,$password){
        $sql="SELECT * FROM customer_info WHERE email='$email' AND password='$password' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }





}