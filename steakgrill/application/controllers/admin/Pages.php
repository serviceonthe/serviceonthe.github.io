<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller
{
    function __construct()
    {
        parent::__construct();         
        $this->load->model('pages_model');
        $this->load->model('blog_model');
        $this->load->model('data_model');
        $this->load->helper('url');
        $this->load->library("pagination");
		
    }
    
    public function add_new_category()
    {
        
        if(!$this->session->userdata('user_email')){
            redirect('admin/dashboard'); 
                
        }
        else
        {
            $this->load->model('pages_model');             
            if($_POST){
                $this->load->helper('form');
                $this->load->library(array('form_validation'));
 
                // set validation rules
                $this->form_validation->set_rules('category_name', 'Name', 'required|max_length[200]|xss_clean');
                $this->form_validation->set_rules('category_slug', 'Slug', 'max_length[200]|xss_clean');
                $this->form_validation->set_rules('category_description', 'Description','xss_clean');
         
                if ($this->form_validation->run() == FALSE)
                {   
                    $data['value'] = 'pages';
                    $data['sub_value'] = 'add_category';
                        
                    $this->load->view('admin/header');
                    $this->load->view('admin/header_link');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/pages/new_category');	
                    $this->load->view('admin/footer');  
                        
                }
                else
                {
                    //if valid
                    $name = $this->input->post('category_name');
         
                    if( $this->input->post('category_slug') != '' )
                        $slug = $this->input->post('category_slug');
                    else
                        $slug = strtolower(preg_replace('/[^A-Za-z0-9_-]+/', '-', $name));
                    
                    $description = $this->input->post('description');
         
                    $result1=$this->pages_model->add_new_category($name,$slug,$description);
                    if($result1)
                    {
                    $this->session->set_flashdata('success', '1 new category added!');
                    redirect('admin/pages/add_new_category');
                    }else{
                    $this->session->set_flashdata('danger', '1 new category not added');
                    redirect('admin/pages/add_new_category');
                    }
                }
            }        
            $data['value'] = 'pages';
            $data['sub_value'] = 'add_category';

            $data['page']='admin/pages/new_category';
            $this->load->view('admin/common/template',$data);
        }
    }
 
        public function category_view(){
                 $this->load->model('pages_model');
                 $data['category'] = $this->pages_model->all_category();
                 //print_r( $data['category']); exit; 
                 $data['sub_value'] = 'add_category';
                 $data['value'] = 'pages';           
                 $data['page']='admin/pages/category_view';
                 $this->load->view('admin/common/template',$data);
        }
        function edit_category(){
                    $table="indi_pages_category";
                    $table_id="category_id";
                    $id=$this->uri->segment(4);
                    //echo $id; exit();
                    $data['edit_fetch']=$this->pages_model->fetch_to_edit($table,$id,$table_id);
                    // $this->load->view('admin/header');
                    // $this->load->view('admin/header_link');
                    // $this->load->view('admin/menu');
                    $data['page']='admin/pages/edit_category';
                    $this->load->view('admin/common/template',$data);
                    // $this->load->view('admin/footer'); 
        }
        function update_category(){
                    $table_name="indi_pages_category";
                    $table_id="category_id";
                    
                    $id=$this->input->post('category_id');
                    //echo $id; exit;
                    $data=array(
                        'category_name'				=>$this->input->post('category_name'),
                        'slug'                                  =>$this->input->post('slug'),
                        'category_description'			=>$this->input->post('category_description')
                    );
                    $this->pages_model->update($table_name,$table_id,$id,$data);
                    $this->session->set_flashdata('message','Category successfully updated');                            
                    redirect('admin/pages/category_view');
                }
                function delete_category(){
                    $table_name='indi_pages_category';
                    $category_id='category_id';
                    $id=$this->uri->segment(4);
                    //echo $res_id; exit;
                    $this->pages_model->delete_data($table_name,$category_id,$id);
                    //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent');
                    $this->session->set_flashdata('message','Category successfully Deleted');                             
                    redirect('admin/pages/category_view');
                }
                
              
           
            public function add_new_entry(){
                    if($this->session->userdata('user_email') == '')
                        {
                            redirect('dashboard');
                        }
                        else
                        {

                            $this->load->model('pages_model');

                            if($_POST)
                            {
                             $this->load->helper('form');
                             $this->load->library(array('form_validation'));
                             $this->form_validation->set_rules('entry_name', 'Entry Title', 'required|max_length[200]|xss_clean');
                             $this->form_validation->set_rules('entry_body', 'Entry Body', 'required|xss_clean');


                             if ($this->form_validation->run() == FALSE)
                             {
                                     $data['sub_value'] = 'pages_contain';
                                     $data['value'] = 'pages';
                                     $data['category'] = $this->pages_model->all_category();
                                     $this->load->view('admin/header');
                                     $this->load->view('admin/header_link');
                                     $this->load->view('admin/menu');
                                     $this->load->view('admin/pages/new_entry',$data);	
                                     $this->load->view('admin/footer');
                             }else
                                 {
                                   $entry_name = $this->input->post('entry_name');
                                   $entry_body = $this->input->post('entry_body');
                                  // $entry_body_text2= trim($entry_body_text1,"Hed!");
                                   //$entry_body=
                                   $entry_category = $this->input->post('entry_category');        
                                   $entry_status = $this->input->post('entry_status');         
                                   $entry_visibility = $this->input->post('entry_visibility'); 
                                   //$entry_tag = $this->input->post('entry_tag');             
                                 $result1=$this->pages_model->add_new_entry($entry_name,$entry_body,$entry_category,$entry_status,$entry_visibility);

                                 if($result1)
                                 {
                                 $this->session->set_flashdata('message', '1 new Page added!'); 
                                 redirect('admin/pages/add_new_entry');
                                 }else{
                                 $this->session->set_flashdata('danger', 'Page Added not successfully');
                                 redirect('admin/pages/add_new_entry');
                                 }

                                 }
                                }else{
                                     $data['sub_value'] = 'pages_contain';
                                     $data['value'] = 'pages';
                                     $data['category'] = $this->pages_model->all_category();
                                     //$data['tag'] = $this->pages_model->all_tag();
                                     /*$this->load->view('admin/header');
                                     $this->load->view('admin/header_link');
                                     $this->load->view('admin/menu');
                                     $this->load->view('admin/pages/new_entry',$data);	
                                     $this->load->view('admin/footer');*/
                                     $data['page']='admin/pages/new_entry';
                                     $this->load->view('admin/common/template',$data);
                                }

                        }
                }
            public function page_view()
            {
                 $this->load->model('pages_model');
                 $data['post'] = $this->pages_model->all_post();
                 $data['indi_pages_category'] = $this->data_model->fatch_all_data('indi_pages_category');
                 $data['sub_value'] = 'page view';
                 $data['value'] = 'pages'; 
                 $data['page']='admin/pages/post_view';
                 $this->load->view('admin/common/template',$data);
            }
            function edit_entry(){
                    $table="indi_page_contain";
                    $table_id="page_id";
                    $id=$this->uri->segment(4);
                    //echo $id; exit();
                    $data['edit_fetch']=$this->pages_model->fetch_to_edit($table,$id,$table_id);
                    $data['category'] = $this->pages_model->all_category();
                    /*$this->load->view('admin/header');
                    $this->load->view('admin/header_link');
                    $this->load->view('admin/menu');*/
                    $data['page']='admin/pages/edit_post';
                    $this->load->view('admin/common/template',$data);
                    // $this->load->view('admin/footer'); 
        }
        function update_entry(){
                $table_name="indi_page_contain";
                $table_id="page_id";
                $id=$this->input->post('page_id');
                //echo $id; exit;
                $data=array(
                    'page_name'			=>$this->input->post('entry_name'),
                    'page_body'                     =>$this->input->post('entry_body'),
                    'category_id'			=>$this->input->post('entry_category'),
                    'status'	                =>$this->input->post('entry_status')
                );
                $this->pages_model->update($table_name,$table_id,$id,$data);
                $this->session->set_flashdata('message', 'Page successfully updated');
                redirect('admin/pages/page_view');
          }
          function delete_entry(){
              $table_name='indi_page_contain';
              $table_id='page_id';
              $id=$this->uri->segment(4);
              //echo $id; exit;
              $this->pages_model->delete_data($table_name,$table_id,$id);
              //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent'); 
              $this->session->set_flashdata('message', 'Page successfully Deleted');
              redirect('admin/pages/page_view');
          }
            
            
            
            
            
            public function add_new_menu()
            {
                  if($this->session->userdata('user_email') == '')
                    {
                        redirect('dashboard');     
                    }
                    else
                    {
                     $this->load->model('pages_model');

                   if($_POST)
                   {
                    $this->load->helper('form');
                    $this->load->library(array('form_validation'));

                // set validation rules
                $this->form_validation->set_rules('menu_name', 'Name', 'required|max_length[200]|xss_clean');


                if ($this->form_validation->run() == FALSE)
                {   
                    $data['value'] = 'pages';
                    $data['sub_value'] = 'menu';
                    $data['pages']= $this->pages_model->all_pages(); 

                    $this->load->view('admin/header');
                    $this->load->view('admin/header_link');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/pages/new_menu',$data);	
                    $this->load->view('admin/footer');  

                }
                else
                {
                    //if valid
                    $menu_name = $this->input->post('menu_name');
                    $menu_position = $this->input->post('menu_position');
                    $page_name = $this->input->post('page_name');
                    $page_id  = $this->input->post('page_id');
                    $result1=$this->pages_model->add_new_menu($menu_name,$menu_position,$page_name);
                    if($result1)
                    {
                    $this->session->set_flashdata('success', '1 new Menu added!');
                    redirect('admin/pages/add_new_menu');
                    }else{
                    $this->session->set_flashdata('danger', ' Menu not added');
                    redirect('admin/pages/add_new_menu');
                    }
                    }
               } else{
                    $data['value'] = 'pages';
                    $data['sub_value'] = 'menu';
                    $data['pages']= $this->pages_model->all_pages(); 
                    $data['page']='admin/pages/new_menu';
                    $this->load->view('admin/common/template',$data);
                    }
                }
            }

                public function all_menu_list(){
                  $this->load->model('pages_model');
                  $table_name='indi_chef_menu';

                  $data['all_menu_list'] = $this->pages_model->fatch_all_data($table_name);
                  // echo "hoho";exit;
                  //print_r($data['subscribe_all']); exit;
                  /*$this->load->view('admin/header_link');
                  $this->load->view('admin/head');
                  $this->load->view('admin/header');
                  $this->load->view('admin/menu');*/
                  $data['page']='admin/page/all_menu_list';
                  $this->load->view('admin/common/template',$data);
                  // $this->load->view('admin/footer');
              }

              function delete_menu(){
                $table_name='indi_chef_menu';
                $table_id='menu_id';
                $id=$this->uri->segment(4);
                //echo $id; exit;
                $this->pages_model->delete_data($table_name,$table_id,$id);
                redirect('admin/pages/all_menu_list');
            }


    function all_post()
    {
        //this function will retrive all entry in the database
                $config = array();
                $config["base_url"] = base_url() . "index.php/blog/all_post/";
                $config["total_rows"] = $this->blog_model->record_count();
                $config["per_page"] = 2;
                $config["uri_segment"] = 3;
                $this->pagination->initialize($config);
 
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['query'] = $this->blog_model->get_all_posts($config["per_page"], $page);
                $data["links"] = $this->pagination->create_links();
                $data['all_category']=  $this->blog_model->all_category();
                $data['recent_post']=  $this->blog_model->recent_post();
                
                $this->load->view('blog/index_head');
                $this->load->view('res_front/off_header');
                $this->load->view('blog/blog',$data);
                $this->load->view('blog/footer');
                /*$data['page']='blog/blog';
                $this->load->view('admin/common/template',$data);*/        
    }
 

public function post($id)
{
    $data['query'] = $this->blog_model->get_post($id);
    $data['comments'] = $this->blog_model->get_post_comment($id);
    $data['post_id'] = $id;
    $data['total_comments'] = $this->blog_model->total_comments($id);
     
    $this->load->helper('form');
    $this->load->library(array('form_validation','session'));
     
    //set validation rules
    $this->form_validation->set_rules('commentor', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('comment', 'Comment', 'required');
     
    if($this->blog_model->get_post($id))
    {
        foreach($this->blog_model->get_post($id) as $row)
        {
            //set page title
            $data['title'] = $row->entry_name;
        }
         
        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('blog/post',$data);
        }
        else
        {
            //if valid
            $name = $this->input->post('commentor');
            $email = strtolower($this->input->post('email'));
            $comment = $this->input->post('comment');
            $post_id = $this->input->post('post_id');
             
            $this->blog_model->add_new_comment($post_id,$name,$email,$comment);
            $this->session->set_flashdata('message', '1 new comment added!');
            redirect('post/'.$id);
        }
    }
    else
        show_404();
}
    

    
    public function edit_entry00($id=null)
{
if($this->session->userdata('logged_in') == '')
            {
                redirect('dashboard');
            }
            else
            {
                
             $this->load->model('pages_model');
             
           if($_POST)
           {
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('entry_name', 'Entry Title', 'required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('entry_body', 'Entry Body', 'required|xss_clean');
        
        if ($this->form_validation->run() == FALSE)
        {
                $data['sub_value'] = 'blog_post';
                $data['value'] = 'blog';
                $data['category'] = $this->blog_model->all_category();
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar',$data);
                $this->load->view('blog/edit_post',$data);	
                $this->load->view('admin/footer');
        }else
            {
              $entry_name = $this->input->post('entry_name');
              $entry_body = $this->input->post('entry_body');

              $entry_id = $this->input->post('entry_id');
              $entry_category = $this->input->post('entry_category');
              $entry_status = $this->input->post('entry_status');
              $entry_visibility = $this->input->post('entry_visibility');
              $entry_tag = $this->input->post('entry_tag');
              
              
              $result1=$this->blog_model->edit_entry($entry_id,$entry_name,$entry_body,$entry_category,$entry_status,$entry_visibility,$entry_tag);
              
            if($result1)
            {
            $this->session->set_flashdata('success', 'Entry Edit Success!');
            redirect('blog/post_view');
            }else{
            $this->session->set_flashdata('danger', 'Entry Edit not successfully');
            redirect('blog/edit_entry');
            }
              
            }
           }else{
                $data['sub_value'] = 'blog_post';
                $data['value'] = 'blog';
                $data['category'] = $this->pages_model->all_category();
                $data['tag'] = $this->pages_model->all_tag();
                $id = $this->uri->segment(3);
                $data['post_details'] = $this->pages_model->post_details($id);
                $data['entry_tag'] = $this->pages_model->entry_tag($id);
                $this->load->view('admin/header');
                $this->load->view('admin/sidebar',$data);
                $this->load->view('blog/edit_post',$data);	
                $this->load->view('admin/footer');
           }
        
            }
    }
 //show comment in admin script
    public function comment()
    {
      if(($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('user_type') == 1))
        {
         $this->load->model('blog_model');
         $data['comment'] = $this->blog_model->all_comment();
         $data['sub_value'] = 'comment';
         $data['value'] = 'blog';
         $this->load->view('admin/header');
         $this->load->view('admin/sidebar',$data);
         $this->load->view('blog/comment',$data);	
         $this->load->view('admin/footer');
        }else
        {
            redirect('user/log_in');
        }
        
    }
    
     
  public function delete_comment()
    {
        $this->load->model('blog_model');
        $comment_id = $this->input->post('comment_id');
        $result = $this->blog_model->delete_comment($comment_id);
        if($result)
        {   
            echo json_encode($result);
        }
    }
    
    

      public function delete_post()
            {
                $this->load->model('blog_model');
                $post_id = $this->input->post('post_id');
                $result = $this->blog_model->delete_post($post_id);
                if($result)
                {   
                    echo json_encode($result);
                }
            }
    
public function categorypost($id)
{
        $data['query'] = $this->blog_model->get_category_posts($id);
        $data['all_category']=  $this->blog_model->all_category();
        $data['recent_post']=  $this->blog_model->recent_post();
        $this->load->view('blog/index_head');
        $this->load->view('res_front/off_header');
        $this->load->view('blog/categorypost',$data);
        $this->load->view('blog/footer');
}
public function postview()
{
    $IP = $_SERVER['REMOTE_ADDR'];
    $id=$this->uri->segment(2);

           if($_POST)
           {
                    $this->load->helper('form');
                    $this->load->library(array('form_validation'));

                    // set validation rules
                    //$this->form_validation->set_rules('name', 'Name', 'required|max_length[200]|xss_clean');
                    //$this->form_validation->set_rules('email', 'Email', 'required|email|xss_clean');
                    $this->form_validation->set_rules('comment', 'Comment', 'required|xss_clean');
                    if ($this->form_validation->run() == FALSE)
                    {
          
                        $data['query'] = $this->blog_model->viewpost($id);
                        $data['all_category']=  $this->blog_model->all_category();
                        $data['blockip']=  $this->blog_model->checkip($IP);
                        $data['recent_post']=  $this->blog_model->recent_post();
                        $data['post_comment']=  $this->blog_model->get_post_comment($id);
                        $this->load->view('blog/index_head');
                        $this->load->view('res_front/off_header');
                        $this->load->view('blog/viewpost',$data);
                        $this->load->view('blog/footer'); 
                        
                    }else{
              // $name = $this->input->post('name');
              // $email = $this->input->post('email');
               //$web = $this->input->post('web');
               $comment_in = $this->input->post('comment');
               $txt = preg_replace('|https?://www\.[a-z\.0-9]+|i', '', $comment_in);
               $txt = preg_replace('|http?://www\.[a-z\.0-9]+|i', '', $txt);
               $txt = preg_replace('|http?://.[a-z\.0-9]+|i', '', $txt);
               $txt = preg_replace('|www\.[a-z\.0-9]+|i', '', $txt);
               $txt = preg_replace('|https?://.[a-z\.0-9]+|i', '', $txt);
               $comment = preg_replace('|www\.[a-z\.0-9]+|i', '', $txt);
               $post_id = $this->input->post('post_id');
           
                    $IP = $_SERVER['REMOTE_ADDR'];
                    $proxy = "No proxy detected";
                    $host = @gethostbyaddr($_SERVER["REMOTE_ADDR"]);
                 
               $user_ip=$IP;
              
               $result=  $this->blog_model->add_post_comment($comment,$post_id,$user_ip);
               if($result)
               {
                   $this->session->set_flashdata('success', 'your Comment Under Review');
            
                   redirect("post-view/".$post_id);
                   
               }else{
                   $this->session->set_flashdata('danger', 'your Comment not Submitted');                   
                   redirect("post-view/".$post_id);
              
               }
                    }
        
    }  else {
        
    
        $data['query'] = $this->blog_model->viewpost($id);
        $data['blockip']=  $this->blog_model->checkip($IP);
        $data['all_category']=  $this->blog_model->all_category();
        $data['recent_post']=  $this->blog_model->recent_post();
        $data['post_comment']=  $this->blog_model->get_post_comment($id);
        $this->load->view('blog/index_head');
        $this->load->view('res_front/off_header');
        $this->load->view('blog/viewpost',$data);
        $this->load->view('blog/footer');
    
}
}
    public function change_comment_status()
    {
        $comment_id = $this->input->post('comment_id');
        $status = $this->input->post('comment_status');
       
        $result = $this->blog_model->comment_status($comment_id,$status);
        
        if($result)
        {   
            echo json_encode($result);
        }
    }
    
        public function change_block_status()
    {
           
        $comment_id = $this->input->post('user_id');
        $status = $this->input->post('block_status');
       
        $result = $this->blog_model->block_status($comment_id,$status);
        
        if($result)
        {   
            echo json_encode($result);
        }
    }
      public function edit_comment()
    {
          $id=$this->uri->segment(3);
         if($this->session->userdata('logged_in') == '')
            {
                redirect('dashboard'); 
                
            }
            else
            {
             $this->load->model('blog_model');
             
           if($_POST)
           {
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
 
        // set validation rules
        $this->form_validation->set_rules('comment', 'comment', 'required|xss_clean');

 
        if ($this->form_validation->run() == FALSE)
        {   
            $data['value'] = 'blog';
            $data['sub_value'] = 'comment';
            $data['comment_details'] = $this->blog_model->comment_details($id);    
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar',$data);
            $this->load->view('blog/edit_comment',$data);	
            $this->load->view('admin/footer');  
                
        }
        else
        {
            //if valid
            $comment = $this->input->post('comment');
            $comment_id=$this->input->post('comment_id');

            $result1=$this->blog_model->edit_comment($comment,$comment_id);
            if($result1)
            {
            $this->session->set_flashdata('success', 'Comment Edit Success!');
            redirect('blog/comment');
            }else{
            $this->session->set_flashdata('danger', 'Comment Update Faild!');
            redirect('blog/edit_comment/'.$id);
            }
        }
   }   
            $data['value'] = 'blog';
            $data['sub_value'] = 'comment';
            
            $data['comment_details'] = $this->blog_model->comment_details($id);
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar',$data);
            $this->load->view('blog/edit_comment',$data);
            $this->load->view('admin/footer');
      }
    }  
        public function change_post_status()
    {
        $post_id = $this->input->post('post_id');
        $status = $this->input->post('post_status');
       
        $result = $this->blog_model->post_status($post_id,$status);
        
        if($result)
        {   
            echo json_encode($result);
        }
    }
    public function menu_content($id=null) {
        $this->load->model('pages_model');
        $this->load->model('restaurant_model');
        //$data['recent_res']= $this->restaurant_model->recent_res();
        $data['company_menu']=  $this->restaurant_model->company_menu();
        $data['city_menu']=  $this->restaurant_model->city_menu();
        $data['faq_menu']=  $this->restaurant_model->faq_menu();
        $data['apps_menu']=  $this->restaurant_model->apps_menu();
        $data['page_content'] = $this->pages_model->page_content($id);                       
        $this->load->view('blog/index_head');
        $this->load->view('res_front/off_header');
        $this->load->view('pages/menu_content',$data);
        //$this->load->view('blog/footer');  
        $this->load->view('res_front/footer',$data);
    }

    function changePageCatStatus(){
        $rowId=$this->input->post('id'); 
        $rowvalue=$this->input->post('value');
        if($rowvalue=='Enabled'):
            $value=0;
        else:
            $value=1;
        endif;
        $data=array(
                'page_category_status' => $value
        );
        $this->data_model->updates('category_id',$rowId,'indi_pages_category',$data);
        $result=$this->data_model->fatch_data_where('indi_pages_category', array('category_id'=> $rowId));
        echo json_encode($result); 
    }



    //====================Single page dinemic===============


    public function create_new_home(){
        $this->form_validation->set_rules('main_title', 'Main title','required|xss_clean');
        $this->form_validation->set_rules('short_title', 'Short title','required|xss_clean');
        $this->form_validation->set_rules('description', 'Description','required|xss_clean');
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/menu');
            $this->load->view('admin/page/home'); 
            $this->load->view('admin/common/footer'); 
        }else{
            $table_name='home';
            $data['main_title']=$this->input->post('main_title');
            $data['short_title']=$this->input->post('short_title');
            $data['description']=$this->input->post('description');

            $result=$this->pages_model->insert_event($table_name,$data);
            if($result){
                $this->session->set_flashdata('success', 'Home information add success!');
                redirect('admin/pages/create_new_home');
            }else{
                $this->session->set_flashdata('danger', 'Home information not add !!!');
                redirect('admin/pages/create_new_home');
            }
        }
    }

    public function view_home(){
        $table_name='home';
        $data['home'] = $this->pages_model->fatch_all_data($table_name);
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/view_home',$data);  
        $this->load->view('admin/common/footer');  
    }
    public function home_edit() {
        $this->load->model('data_model');
        $table = "home";
        $id = $this->uri->segment(4);
        $table_id = "home_id";
        //echo $id; exit;
        $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
        // print_r($data['edit_fetch']);
        // exit;
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/home_edit',$data);  
        $this->load->view('admin/common/footer');
    }

    public function home_update() {
        $table_name = "home";
        $table_id = "home_id";
        $id = $this->input->post('home_id');

        $data['main_title']=$this->input->post('main_title');
        $data['short_title']=$this->input->post('short_title');
        $data['description']=$this->input->post('description');

        $result = $this->data_model->update($id, $table_name, $data, $table_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Your information successfuly changed !!! ');
            redirect('admin/pages/view_home');
        } else {
            $this->session->set_flashdata('danger', 'Your information not successfuly changed !!! ');
            redirect('admin/pages/view_home');
        }
    }
    public function home_delete(){
        $home_id = $this->uri->segment(4);
        $data = $this->pages_model->delete_home($home_id);
        if ($data) {
            $this->session->set_flashdata('success', 'Delete has been successful !!! ');
            redirect('admin/pages/view_home');
        } else {
            $this->session->set_flashdata('danger', 'Delete dose not successful !!! ');
            redirect('admin/pages/view_home');
        }
    }
    public function create_new_about(){
        $this->form_validation->set_rules('main_title', 'Main title','required|xss_clean');
        $this->form_validation->set_rules('short_title', 'Short title','xss_clean');
        $this->form_validation->set_rules('description', 'Description','required|xss_clean');
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/menu');
            $this->load->view('admin/page/about_us'); 
            $this->load->view('admin/common/footer'); 
        }else{
            $table_name='about_us';
            $data['main_title']=$this->input->post('main_title');
            $data['short_title']=$this->input->post('short_title');
            $data['description']=$this->input->post('description');

            $result=$this->pages_model->insert_event($table_name,$data);
            if($result){
                $this->session->set_flashdata('success', 'About add success!');
                redirect('admin/pages/create_new_about');
            }else{
                $this->session->set_flashdata('danger', 'About not add !!!');
                redirect('admin/pages/create_new_about');
            }
            
        }
    }
    public function view_about(){
        $table_name='about_us';
        $data['about_us'] = $this->pages_model->fatch_all_data($table_name);
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/view_about',$data);  
        $this->load->view('admin/common/footer');  
    }
    public function about_edit() {
        $this->load->model('data_model');
        $table = "about_us";
        $id = $this->uri->segment(4);
        $table_id = "about_id";
        //echo $id; exit;
        $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
        // print_r($data['edit_fetch']);
        // exit;
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/about_edit',$data);  
        $this->load->view('admin/common/footer');
    }

    public function about_update() {
        $table_name = "about_us";
        $table_id = "about_id";
        $id = $this->input->post('about_id');

        $data['main_title']=$this->input->post('main_title');
        $data['short_title']=$this->input->post('short_title');
        $data['description']=$this->input->post('description');


        $result = $this->data_model->update($id, $table_name, $data, $table_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Your information successfuly changed !!! ');
            redirect('admin/pages/view_about');
        } else {
            $this->session->set_flashdata('danger', 'Your information not successfuly changed !!! ');
            redirect('admin/pages/view_about');
        }
    }
    public function about_delete(){
        $about_id = $this->uri->segment(4);
        $data = $this->pages_model->delete_about($about_id);
        if ($data) {
            $this->session->set_flashdata('success', 'Delete has been successful !!! ');
            redirect('admin/pages/view_about');
        } else {
            $this->session->set_flashdata('danger', 'Delete dose not successful !!! ');
            redirect('admin/pages/view_about');
        }
    }
    public function create_new_faq(){
        $this->form_validation->set_rules('faq', 'FAQ', 'required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('description', 'Description','required|xss_clean');
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/menu');
            $this->load->view('admin/page/faq');  
            $this->load->view('admin/common/footer'); 
        }else{
            $table_name='faq';
            $data['faq']=$this->input->post('faq');
            $data['description']=$this->input->post('description');

            $result=$this->pages_model->insert_event($table_name,$data);
            if($result){
                $this->session->set_flashdata('success', 'FAQ add success!');
                redirect('admin/pages/create_new_faq');
            }else{
                $this->session->set_flashdata('danger', 'FAQ not add !!!');
                redirect('admin/pages/create_new_faq');
            }
          
        }
    }
    public function faq_list(){
        $table_name='faq';
        $data['faq'] = $this->pages_model->fatch_all_data($table_name);
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/faq_list',$data);  
        $this->load->view('admin/common/footer'); 
    }
    public function faq_edit() {
        $this->load->model('data_model');
        $table = "faq";
        $id = $this->uri->segment(4);
        $table_id = "faq_id";
        //echo $id; exit;
        $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
        // print_r($data['edit_fetch']);
        // exit;
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/faq_edit',$data);  
        $this->load->view('admin/common/footer');
    }

    public function faq_update() {
        $table_name = "faq";
        $table_id = "faq_id";
        $id = $this->input->post('faq_id');
        $data['faq']=$this->input->post('faq');
        $data['description']=$this->input->post('description');

        $result = $this->data_model->update($id, $table_name, $data, $table_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Your information successfuly changed !!! ');
            redirect('admin/pages/faq_list');
        } else {
            $this->session->set_flashdata('danger', 'Your information not successfuly changed !!! ');
            redirect('admin/pages/faq_list');
        }
    }
    public function faq_delete(){
        $faq_id = $this->uri->segment(4);
        $data = $this->pages_model->delete_faq($faq_id);
        if ($data) {
            $this->session->set_flashdata('success', 'Delete has been successful !!! ');
            redirect('admin/pages/faq_list');
        } else {
            $this->session->set_flashdata('danger', 'Delete dose not successful !!! ');
            redirect('admin/pages/faq_list');
        }
    }

    public function create_new_offers(){
        $this->form_validation->set_rules('offer_main_title', 'offer_main_title','required|xss_clean');
        $this->form_validation->set_rules('offer_short_description', 'offer_short_description','required|xss_clean');
         if ($this->form_validation->run() == FALSE) { 
            $this->load->view('admin/common/header');
            $this->load->view('admin/common/menu');
            $this->load->view('admin/page/offers'); 
            $this->load->view('admin/common/footer'); 
        }else{
            $table_name='offers';
            $data['offer_main_title']=$this->input->post('offer_main_title');
            $data['offer_short_description']=$this->input->post('offer_short_description');
           
            $result=$this->pages_model->insert_event($table_name,$data);
            if($result){
                $this->session->set_flashdata('success', 'Offer add success!');
                redirect('admin/pages/create_new_offers');
            }else{
                $this->session->set_flashdata('danger', 'Offer not add !!!');
                redirect('admin/pages/create_new_offers');
            }
           
        }
    }
    public function view_offers(){
        $table_name='offers';
        $data['offers'] = $this->pages_model->fatch_all_data($table_name);
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/view_offers',$data);  
        $this->load->view('admin/common/footer');  
    }
    public function offers_edit() {
        $this->load->model('data_model');
        $table = "offers";
        $id = $this->uri->segment(4);
        $table_id = "offer_id";
        //echo $id; exit;
        $data['edit_fetch'] = $this->data_model->fetch_to_edit($table, $id, $table_id);
        // print_r($data['edit_fetch']);
        // exit;
        $this->load->view('admin/common/header');
        $this->load->view('admin/common/menu');
        $this->load->view('admin/page/offers_edit',$data);  
        $this->load->view('admin/common/footer');
    }

    public function offers_update() {
        $table_name = "offers";
        $table_id = "offer_id";
        $id = $this->input->post('offer_id');

        $data['offer_main_title']=$this->input->post('offer_main_title');
        $data['offer_short_description']=$this->input->post('offer_short_description');
       

        $result = $this->data_model->update($id, $table_name, $data, $table_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Your information successfuly changed !!! ');
            redirect('admin/pages/view_offers');
        } else {
            $this->session->set_flashdata('danger', 'Your information not successfuly changed !!! ');
            redirect('admin/pages/view_offers');
        }
    }
    public function offers_delete(){
        $offer_id = $this->uri->segment(4);
        $data = $this->pages_model->delete_offer($offer_id);
        if ($data) {
            $this->session->set_flashdata('success', 'Delete has been successful !!! ');
            redirect('admin/pages/view_offers');
        } else {
            $this->session->set_flashdata('danger', 'Delete dose not successful !!! ');
            redirect('admin/pages/view_offers');
        }
    }
}


/* End of file blog.php */
/* Location: ./application/controllers/blog.php */
