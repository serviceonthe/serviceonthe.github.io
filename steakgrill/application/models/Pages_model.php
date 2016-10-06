<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function fatch_all_data($table_name){
        $sql = "SELECT * FROM $table_name";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    function fetch_to_edit($table,$id,$table_id){
        return $this->db->get_where($table,array($table_id=>$id))->row_array();
    }
    function update($table_name,$table_id,$id,$data){
        $this->db->where($table_id,$id);
        $this->db->update($table_name,$data);
    }
    function delete_data($table_name,$table_id,$id){
          //$this->db->delete($table_name,array('category_id'=>$id));
          $this->db->delete($table_name,array($table_id=>$id));
    }
    
    
   public function record_count() {
       return $this->db->count_all("entry");
 
    }
    
    function get_all_posts($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("entry");
 
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
    function all_pages()
    {
        $query=$this->db->query("select * from `indi_page_contain` ORDER BY page_id DESC ");
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
    function add_new_entry($entry_name,$entry_body,$entry_category,$entry_status,$entry_visibility)
    {    

        $data = array(
            'page_name' => $entry_name,
            'page_body' => $entry_body,
            'category_id'=>$entry_category,
            'status'=>$entry_status      
        );
        $result=$this->db->insert('indi_page_contain',$data);
        if($result)
        {
   
        
            return True;
        }else
        {
            return False;
        }
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
        $result=$this->db->query("UPDATE entry SET `entry_name`='$entry_name',`entry_body`='$entry_body',`category_id`='$entry_category',`status`='$entry_status',`visibility`='$entry_visibility' WHERE `entry_id`='$entry_id'");
        if($result)
        {
            $entryid= $this->db->insert_id();
            //$this->db->query("DELETE From `entry_tag` WHERE `entry_id`='$entry_id'");
            $tag=explode(',',$entry_tag);
           
        foreach ($tag as $alltag)
        {
            
            $data=array(
                'entry_id'=>$entryid,
                'tag_name'=>$alltag   
            );
 
            //$this->db->query("UPDATE `entry_tag` SET `entry_id`='$entry_id',`tag_name`='$alltag' WHERE `entry_id`='$entry_id'");
            $this->db->insert('entry_tag',$data);
            


        }
        
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
            $result1 = $this->db->insert('indi_pages_category',$data);
            if($result1)
            {
              return True;
             
            }else{
                return False;
                
            }
}
    function add_new_menu($menu_name,$menu_position,$page_name)
{


            $data = array(
                'menu_name'    => $menu_name,
                'menu_position'=> $menu_position,
                'page_name'  => $page_name
            );
            $result1 = $this->db->insert('indi_chef_menu',$data);
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
                $query = $this->db->get('entry');
                return $query->result();
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
       $query = $this->db->query("UPDATE entry SET status = '$status' WHERE entry_id = $entry_id");
       return $query; 
    }
function all_category()
{
    $query = $this->db->get('indi_pages_category');
    $result=$query->result();
    return $result; 
}

function all_post()
{
    $query = $this->db->get('indi_page_contain');
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
    function page_content($id)
    {
        $query = $this->db->query("select *from indi_page_contain WHERE page_id='$id' ");
        return $query->result();
    }
    public function loginUser($email,$password){
        $sql="SELECT * FROM customer_info WHERE email='$email' AND password='$password' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    //================ faisla =======================

    public function insert_event($table_name,$data){
        $this->db->insert($table_name,$data);
        return 1; 
    }
    public function delete_faq($faq_id){
        $this->db->delete('faq',array('faq_id'=>$faq_id));
        return true; 
    }
    public function delete_about($about_id){
        $this->db->delete('about_us',array('about_id'=>$about_id));
        return true; 
    }
    public function delete_offer($offer_id){
        $this->db->delete('offers',array('offer_id'=>$offer_id));
        return true; 
    }

    public function delete_home($home_id){
        $this->db->delete('home',array('home_id'=>$home_id));
        return true; 
    }
    


    
}
 
/* End of file blog_model.php */
/* Location: ./application/models/blog_model.php */