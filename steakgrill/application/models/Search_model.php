<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
   public function record_count() {
       return $this->db->count_all("entry");
 
    }
    
    function get_search_result($limit, $start)
    {
	
	
	$postcode=$_REQUEST['postcode'];
	
	 //$rest = substr($postcode, 0, -5);exit; 
	 
	 $rest = substr($postcode, 0, -4); 
	
	
	$query = $this->db->query("SELECT * FROM indi_res_info WHERE res_post_code='$postcode'");
	
	
	    
	//$query = $this->db->query("YOUR QUERY");

		if ($query->num_rows() > 0)
		{
		   return $query->result_array();
		}
			
			
	
	
	
	
	
	
	
	
    //$result = mysql_query($sqlstring);

    /*


    $row = mysql_fetch_assoc($query);

   echo $lng = $row["longitude"] / 180 * M_PI;
    $lat = $row["latitude"] / 180 * M_PI;

    mysql_free_result($result);  

$query = $this->db->query( "SELECT DISTINCT postcode_table.postcode,postcode_table.county,(6367.41*SQRT(2*(1-cos(RADIANS(postcode_table.latitude))*cos(".$lat.")*(sin(RADIANS(postcode_table.longitude))*sin(".$lng.")+cos(RADIANS(postcode_table.longitude))*cos(".$lng."))-sin(RADIANS(postcode_table.latitude))* sin(".$lat.")))) AS Distance FROM postcode_table AS postcode_table WHERE (6367.41*SQRT(2*(1-cos(RADIANS(postcode_table.latitude))*cos(".$lat.")*(sin(RADIANS(postcode_table.longitude))*sin(".$lng.")+cos(RADIANS(postcode_table.longitude))*cos(".$lng."))-sin(RADIANS(postcode_table.latitude))*sin(".$lat."))))");
				
		*/		
				
				
	 //return $query->result_array();
	
	
	
	
	/*
	
		
           $postcode=$_REQUEST['postcode'];

    
            $query = $this->db->query("SELECT *  
            FROM `indi_res_info` AS iri 
            INNER JOIN `indi_gallery_image` AS igi ON iri.res_id = igi.res_id
            WHERE igi.title = 'logo' AND iri.res_post_code = '$postcode'
            ORDER BY iri.res_id DESC LIMIT 15 ");
     
      
	      	if ($query->num_rows() > 0) {
         
            return $query->result_array();

			}

		
		
	
	    $this->db->order_by("postcode_table.sn", "desc");
        $this->db->limit($limit, $start);
        $this->db->select("*");
        $this->db->from("postcode_table");
		$this->db->where("postcode", $_REQUEST['postcode']);
		
	   //INNER JOIN `indi_gallery_image` AS igi ON iri.res_id = igi.res_id
       // $this->db->join("comment","entry.entry_id=comment.entry_id", 'left');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
         
           return $query->result_array();
        } */
    
	
	
	
	
	
	
	
	
	
	
	
		
		
	
   }
      
}
