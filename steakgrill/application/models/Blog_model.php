<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	
   public function record_count() {
       return $this->db->count_all("entry");
 
    }
    
     function get_all_posts($limit=false, $start=0, $perpage='')  
    {
        
                $limit_sql =''; 
                if ($limit) {
                $limit_sql =" limit $start,$perpage"; 
                }  

                $query = $this->db->query("SELECT entry.entry_id,entry.*,entry_category.*
                                            FROM entry 
                                            LEFT JOIN entry_category ON  entry.category_id=entry_category.category_id  
                                            LEFT JOIN comment ON entry.entry_id=comment.entry_id
                                            GROUP BY entry.entry_id     
                                            ORDER BY entry.entry_id DESC $limit_sql ");   

        
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;
   }
        //get all entry
        //$query = $this->db->get('entry');
        //return $query->result();
        function get_latest_posts()
        {
        $query=$this->db->query("select * from entry order by entry_id DESC LIMIT 3"); 
        return $query->result();
        }
		
       function viewpost($id)
    {
        $query=$this->db->query("select * from entry where entry_id=$id LIMIT 1");
        return $query->result();
    }
	
     function get_category_posts($id)
    {
        //get all entry
        $query = $this->db->query("select * from entry where category_id=$id");
        return $query->result();
    }
	
    function add_new_entry($entry_name,$entry_body,$entry_category,$entry_status,$entry_visibility,$entry_tag,$feature_img)
    {    

        $data = array(
            'entry_name' => $entry_name,
            'entry_body' => $entry_body,
            'category_id'=>$entry_category,
            'status'=>$entry_status,
            'entry_tag'=>$entry_tag,
            'visibility'=>$entry_visibility,
            'feature_img'=>$feature_img
            
        );
        $result=$this->db->insert('entry',$data);
        if($result)
        {
            $insert_id= $this->db->insert_id();
            //echo $entryid; exit;
            /*
            $tag=explode(',',$entry_tag);
           
        foreach ($tag as $alltag)
        {
            
            $data=array(
                'entry_id'=>$entryid,
                'tag_name'=>$alltag   
            );
            $this->db->insert('entry_tag',$data);

        }
        */
            return $insert_id;
        }else
        {
            return False;
        }
    }
        function update($id,$table_name,$data,$table_id){
            $this->db->where($table_id,$id);
            $this->db->update($table_name,$data);
            return True;
        }
        function delete_data($table_name,$id){
            $this->db->delete($table_name,array('entry_id'=>$id));
        }
        function edit_entry($entry_id,$entry_name,$entry_body,$entry_category,$entry_status,$entry_visibility,$entry_tag)
        {

        $data = array(
            'entry_name' => $entry_name,
            'entry_body' => $entry_body,
            'category_id'=>$entry_category,
            'status'=>$entry_status,
            'visibility'=>$entry_visibility,
            
        );
        $result=$this->db->query("UPDATE entry SET `entry_name`=$entry_name,`entry_body`=$entry_body,`category_id`=$entry_category,`status`=$entry_status,`visibility`=$entry_visibility WHERE `entry_id`=$entry_id");
        if($result)
        {
            return True;
        }else
        {
            return False;
        }
    }
    function add_new_category($name,$slug,$description)
{


            $data = array(
                'category_name'    => $name,
                'slug'            => $slug,
                'category_description'  => $description,
            );
            $result1 = $this->db->insert('entry_category',$data);
            if($result1)
            {
              return True;
             
            }else{
                return False;
                
            }
}

    function edit_category($category_id,$name,$slug,$description)
{


            $data = array(
                'category_name'    => $name,
                'slug'            => $slug,
                'category_description'  => $description,
            );
            $result1 = $this->db->query("UPDATE entry_category SET `category_name`='$name',`slug`='$slug',`category_description`='$description' where `category_id`='$category_id'");
            if($result1)
            {
              return True;
             
            }else{
                return False;
                
            }
}

    function edit_comment($comment,$comment_id)
{


            $data = array(
                'comment'    => $comment,
       
            );
            $result1 = $this->db->query("UPDATE comment SET `comment_body`='$comment' where `comment_id`='$comment_id'");
            if($result1)
            {
              return True;
             
            }else{
                return False;
                
            }
}

function checkip($IP)
{
           $query=$this->db->query("select * from indi_block_user where user_ip='$IP' AND `status`=1 LIMIT 1");
           
           $ipcheck=$query->result(); 
           if($ipcheck)
           {return False;}else{
        return True;}
}
    //delete a category rjs
    public function delete_category($category_id)
    {
       $query = $this->db->query("DELETE FROM entry_category WHERE category_id = '$category_id'");
       return $query; 
    }
    
        //delete a comment rjs
    public function delete_comment($comment_id)
    {
       $query = $this->db->query("DELETE FROM comment WHERE comment_id = '$comment_id'");
       return $query; 
    }
    public function category_details($id)
    {
      $query = $this->db->query("select * FROM indi_pages_category WHERE category_id = '$id' LIMIT 1");
	  
       return $query->result(); 

    }
        public function blog_category_details($id)
    {
      $query = $this->db->query("select * FROM entry_category WHERE category_id = '$id' LIMIT 1");
	  
       return $query->result(); 

    }
        public function comment_details($id)
    {
      $query = $this->db->query("select * FROM comment WHERE comment_id = '$id' LIMIT 1");
       return $query->result(); 

    }
        public function post_details($id)
    {
      $query = $this->db->query("select * FROM entry WHERE entry_id = '$id' LIMIT 1");
       return $query->result(); 

    }
        //delete a post
    public function delete_post($post_id)
    {
       $query = $this->db->query("DELETE FROM entry WHERE entry_id = '$post_id'");
       return $query; 
    }
function recent_post()
{
                return $query=$this->db->order_by('entry_id','desc')->get('entry')->result();
                //$query = $this->db->get('entry');
                //return $query->result();
}
function get_categories()
            {
                $query = $this->db->get('entry_category');
                return $query->result();
            }
function get_category_post($slug)
{
    $list_post = array();
 
    $this->db->where('slug',$slug);
    $query = $this->db->get('entry_category'); // get category id
    if( $query->num_rows() == 0 )
        show_404();
 
    foreach($query->result() as $category)
    {
        $this->db->where('category_id',$category->category_id);
        $query = $this->db->get('entry_relationships'); // get posts id which related the category
        $posts = $query->result();
    }
 
    if( isset($posts) && $posts )
    {
        foreach($posts as $post)
        {
            $list_post = array_merge($list_post,$this->get_post($post->object_id)); // get posts and merge them into array
        }
    }
 
    return $list_post; // return an array of post object
}
function add_new_comment($post_id,$commentor,$email,$comment)
{
    $data = array(
        'entry_id'=>$post_id,
        'comment_name'=>$commentor,
        'comment_email'=>$email,
        'comment_body'=>$comment,
    );
    $this->db->insert('comment',$data);
}
 
function get_post($id)
{
    $this->db->where('entry_id',$id);
    $query = $this->db->get('entry');
    if($query->num_rows()!==0)
    {
        return $query->result();
    }
    else
        return FALSE;
}
 
function get_post_comment($id)
{
    $query=$this->db->query("select * from comment where `entry_id`='$id' AND `status`='1'");
    //$this->db->where('entry_id',$id);
    //$query = $this->db->get('comment');
    return $query->result();
}
function add_post_comment($comment,$post_id,$user_ip)
{
    $user_name=$this->session->userdata('username');
    $user_id=$this->session->userdata('user_id');
    $data=array(
        'entry_id'=>$post_id,
        'user_ip'=>$user_ip,
        'comment_body'=>$comment,
        'user_name'=>$user_name,
        'user_id'=>$user_id
        
    
    );
        $data1=array(
        //'entry_id'=>$post_id,
        'user_ip'=>$user_ip,
        //'comment_body'=>$comment,
        //'user_name'=>$user_name,
        'user_id'=>$user_id
        
    
    );
    $query=$this->db->insert('comment',$data); 
    $query=$this->db->insert('indi_block_user',$data1);
    if($query)
    {return true;}else{return false;}
    //$query=$this->db->query("Insert into `comment`(comment_name)values() ");
}
        
function total_comments($id)
{
    $this->db->like('entry_id', $id);
    $this->db->from('comment');
    return $this->db->count_all_results();
}
function all_comment()
{
    //$query = $this->db->get('comment');
    $query = $this->db->query('select comment.comment_id,comment.entry_id,comment.user_id,comment.user_name,comment.comment_body,comment.comment_date,comment.status,comment.user_id,comment.user_ip_block,indi_block_user.status,indi_block_user.date,entry.entry_body,entry.entry_name from comment LEFT JOIN indi_block_user ON comment.user_id=indi_block_user.user_id RIGHT JOIN entry ON entry.entry_id=comment.entry_id');
    $result=$query->result();
    return $result;
}
    //change Comment status
 function comment_status($comment_id,$status)
    {
       
       $query = $this->db->query("UPDATE comment SET status = '$status' WHERE comment_id = $comment_id");
       return $query; 
    }
        //change block status
 function block_status($comment_id,$status)
    {
       
       $query = $this->db->query("UPDATE indi_block_user SET status = '$status' WHERE user_id = $comment_id");
       return $query; 
    }
    //change Post status
  function post_status($post_id,$status)
    {
       $query = $this->db->query("UPDATE entry SET status = '$status' WHERE entry_id = $post_id");
       return $query; 
    }
function all_category()
{
    $query = $this->db->get('entry_category');
    $result=$query->result();
    return $result; 
}

function all_post()
{
    $query = $this->db->get('entry');
    $result=$query->result();
    return $result; 
}
function all_tag()
    {
        //get all entry
        $query = $this->db->query("select DISTINCT tag_name from entry_tag");
        return $query->result();
    }
    
    function entry_tag($id)
    {
        //get all entry
        $query = $this->db->query("select tag_name from entry_tag where `entry_id`='$id'");
        return $query->result();
    }
    public function updateBlogHits($id){

            $sql =" UPDATE `entry` SET `total_hit` = total_hit+1 where `entry_id` = ".$id;
            return $this->db->query($sql);
    }    
}
 
/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */