<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();         
        $this->load->model('blog_model');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('restaurant_model');
    }
    
        public function add_new_category()
        {
              if($this->session->userdata('user_email') == ''){
                    redirect('dashboard');
              }else
              {
                     $this->load->model('blog_model');
                  if($_POST){
                        $this->load->helper('form');
                        $this->load->library(array('form_validation'));
                        // set validation rules
                        $this->form_validation->set_rules('category_name', 'Name', 'required|max_length[200]|xss_clean');
                        $this->form_validation->set_rules('category_slug', 'Slug', 'max_length[200]|xss_clean');
                        $this->form_validation->set_rules('category_description', 'Description','xss_clean');
                        if ($this->form_validation->run() == FALSE)
                        {
                            $data['value'] = 'blog';
                            $data['sub_value'] = 'add_category';
                            $this->load->model('restaurant_model');
                            $data['company_menu']=  $this->restaurant_model->company_menu();
                            $data['city_menu']=  $this->restaurant_model->city_menu();
                            $data['faq_menu']=  $this->restaurant_model->faq_menu();
                            $data['apps_menu']=  $this->restaurant_model->apps_menu();
                            $data['page']='admin/blog/new_category';
                            $this->load->view('admin/common/template',$data); 
                        }
                        else
                        {
                            $name = $this->input->post('category_name');
                            if( $this->input->post('category_slug') != '' )
                                $slug = $this->input->post('category_slug');
                            else
                                $slug = strtolower(preg_replace('/[^A-Za-z0-9_-]+/', '-', $name));
                            $description = $this->input->post('description');
                            $result1=$this->blog_model->add_new_category($name,$slug,$description);
                            if($result1)
                            {
                            $this->session->set_flashdata('success', '1 new category added!');
                            redirect('admin/blog/add_new_category');
                            }else{
                            $this->session->set_flashdata('danger', '1 new category not added');
                            redirect('admin/blog/add_new_category');
                            }
                        }
                   }
                  $data['value'] = 'blog';
                        $data['sub_value'] = 'add_category';
                        $this->load->model('restaurant_model');
                          //$data['recent_res']= $this->restaurant_model->recent_res();
                          $data['company_menu']=  $this->restaurant_model->company_menu();
                          $data['city_menu']=  $this->restaurant_model->city_menu();
                          $data['faq_menu']=  $this->restaurant_model->faq_menu();
                          $data['apps_menu']=  $this->restaurant_model->apps_menu();
                        $data['page']='admin/blog/new_category';
                        $this->load->view('admin/common/template',$data);
              }
        }
        public function category()
        {
             $this->load->model('blog_model');
             $data['category'] = $this->blog_model->all_category();
             $data['sub_value'] = 'add_category';
             $data['value'] = 'blog';
             $this->load->model('restaurant_model');
             //$data['recent_res']= $this->restaurant_model->recent_res();
             $data['company_menu']=  $this->restaurant_model->company_menu();
             $data['city_menu']=  $this->restaurant_model->city_menu();
             $data['faq_menu']=  $this->restaurant_model->faq_menu();
             $data['apps_menu']=  $this->restaurant_model->apps_menu();

             $data['page']='admin/blog/category_view';
             $this->load->view('admin/common/template',$data);
        }
        public function add_new_entry()
        {        

          $this->db->query('CREATE TABLE IF NOT EXISTS `entry_tag` (
  `tag_id` int(22) NOT NULL AUTO_INCREMENT,
  `entry_id` int(22) NOT NULL,
  `tag_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tag_id`),
  KEY `entry_id` (`entry_id`)
)');

                     $this->load->model('blog_model');

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
                        $this->load->model('restaurant_model');
                        //$data['recent_res']= $this->restaurant_model->recent_res();
                        $data['company_menu']=  $this->restaurant_model->company_menu();
                        $data['city_menu']=  $this->restaurant_model->city_menu();
                        $data['faq_menu']=  $this->restaurant_model->faq_menu();
                        $data['apps_menu']=  $this->restaurant_model->apps_menu();
                        $this->load->view('admin/header');
                        $this->load->view('admin/header_link');
                        $this->load->view('admin/menu');
                        $this->load->view('admin/blog/new_entry',$data);	
                        $this->load->view('admin/footer');
                }else
                    {
                      $entry_name = $this->input->post('entry_name');
                      $entry_body = $this->input->post('entry_body');
                      $entry_category = $this->input->post('entry_category');
                      $entry_status = $this->input->post('entry_status');
                      $entry_visibility = $this->input->post('entry_visibility');
                      $entry_tag = $this->input->post('entry_tag');
                      
                      $feature_img=$_FILES["feature_img"]["name"];
                      $this->load->library('file_upload');
                      $config_file=$this->file_upload->check_file('feature_img',array('jpg','jpeg','png','gif'),1000000);
                      $result1['last_insert_id']=$this->blog_model->add_new_entry($entry_name,$entry_body,$entry_category,$entry_status,$entry_visibility,$entry_tag,$feature_img);
                      if($result1)
                      {
                        //echo $result1['last_insert_id'];
                        $destination_path='assets/blog/feature/'.$result1['last_insert_id'];
                        //echo $destination_path; exit;
                        $this->file_upload->upload_file_to_dir('feature_img',$destination_path);
                        $this->session->set_flashdata('success', '1 new Entry added!');
                        redirect('admin/blog/add_new_entry');
                    }else{
                    $this->session->set_flashdata('danger', 'Entry Added not successfully');
                    redirect('admin/blog/add_new_entry');
                    }
                    }
                   }else{
                        $data['sub_value'] = 'blog_post';
                        $data['value'] = 'blog';
                        $data['category'] = $this->blog_model->all_category();
                        $data['tag'] = $this->blog_model->all_tag();
                        $this->load->model('restaurant_model');
                        //$data['recent_res']= $this->restaurant_model->recent_res();
                        $data['company_menu']=  $this->restaurant_model->company_menu();
                        $data['city_menu']=  $this->restaurant_model->city_menu();
                        $data['faq_menu']=  $this->restaurant_model->faq_menu();
                        $data['apps_menu']=  $this->restaurant_model->apps_menu();
                        $data['page']='admin/blog/new_entry';
                        $this->load->view('admin/common/template',$data);
                   }

                    
            }
             public function posts()
            {
                 
                 $data['post'] = $this->blog_model->all_post();
                 $data['sub_value'] = 'blog_post';
                 $data['value'] = 'blog';
                 $this->load->model('restaurant_model');
                 //$data['recent_res']= $this->restaurant_model->recent_res();
                 $data['company_menu']=  $this->restaurant_model->company_menu();
                 $data['city_menu']=  $this->restaurant_model->city_menu();
                 $data['faq_menu']=  $this->restaurant_model->faq_menu();
                 $data['apps_menu']=  $this->restaurant_model->apps_menu();
                  
                 $data['page']='admin/blog/post_view';
                 $this->load->view('admin/common/template',$data);
            }
            public function edit_entry()
            {
                if($this->session->userdata('user_email') == '')
                {
                    redirect('admin/dashboard');
                }
                else
                {
                    $this->load->model('blog_model');
                    if($_POST)
                    {
                        $this->load->helper('form');
                        $this->load->library(array('form_validation'));
                        $this->form_validation->set_rules('entry_name', 'Entry Title', 'required');
                        $this->form_validation->set_rules('entry_body', 'Entry Body', 'required');
                        if ($this->form_validation->run() == FALSE)
                        {
                            $data['sub_value'] = 'blog_post';
                            $data['value'] = 'blog';
                            $data['category'] = $this->blog_model->all_category();
                            $this->load->model('restaurant_model');
                            $data['company_menu']=  $this->restaurant_model->company_menu();
                            $data['city_menu']=  $this->restaurant_model->city_menu();
                            $data['faq_menu']=  $this->restaurant_model->faq_menu();
                            $data['apps_menu']=  $this->restaurant_model->apps_menu();
                            $this->load->view('admin/header');
                            $this->load->view('admin/header_link');
                            $this->load->view('admin/menu');
                            $this->load->view('admin/blog/edit_post',$data);
                            $this->load->view('admin/footer');
                        }else
                        {
                            $id=$this->input->post('entry_id');
                            $table_name='entry';
                            $table_id='entry_id';
                            $data=array(
                                'entry_name'			=>$this->input->post('entry_name'),
                                'entry_body'		    =>$this->input->post('entry_body'),
                                'category_id'			=>$this->input->post('entry_category'),
                                'status'			    =>$this->input->post('entry_status'),
                                'visibility'		    =>$this->input->post('entry_visibility')
                            );
                            $result1=$this->blog_model->update($id,$table_name,$data,$table_id);
                            if($result1)
                            {
                                $this->session->set_flashdata('success', 'Entry Edit Success!');
                                redirect('admin/blog/posts');
                            }else{
                                $this->session->set_flashdata('danger', 'Entry Edit not successfully');
                                redirect('admin/blog/posts');
                            }
                        }
                    }else{
                        $data['sub_value'] = 'blog_post';
                        $data['value'] = 'blog';
                        $data['category'] = $this->blog_model->all_category();
                        $data['tag'] = $this->blog_model->all_tag();
                        $id = $this->uri->segment(4);
                        $data['post_details'] = $this->blog_model->post_details($id);
                        $data['entry_tag'] = $this->blog_model->entry_tag($id);
                        $this->load->model('restaurant_model');
                        $data['company_menu']=  $this->restaurant_model->company_menu();
                        $data['city_menu']=  $this->restaurant_model->city_menu();
                        $data['faq_menu']=  $this->restaurant_model->faq_menu();
                        $data['apps_menu']=  $this->restaurant_model->apps_menu();
                        /*$this->load->view('admin/header');
                        $this->load->view('admin/header_link');
                        $this->load->view('admin/menu');
                        $this->load->view('admin/blog/edit_post',$data);
                        $this->load->view('admin/footer');*/

                        $data['page']='admin/blog/edit_post';
                        $this->load->view('admin/common/template',$data);
                    }
                }
            }
            function delete_entry(){
                $table_name='entry';
                $id=$this->uri->segment(4);
                //echo $id; exit;
                $this->blog_model->delete_data($table_name,$id);
                //$this->load->view('admin/data_operator_dashboard/restaurent/list_restaurent');
                redirect('admin/blog/post_view');
            }
            public function comment()
            {
              if(($this->session->userdata('user_email') == TRUE) && ($this->session->userdata('user_type') == 'admin'))
                {
                 $this->load->model('blog_model');
                 $data['comment'] = $this->blog_model->all_comment();
                 $data['sub_value'] = 'comment';
                 $data['value'] = 'blog';
                 $this->load->model('restaurant_model');
                //$data['recent_res']= $this->restaurant_model->recent_res();
                $data['company_menu']=  $this->restaurant_model->company_menu();
                $data['city_menu']=  $this->restaurant_model->city_menu();
                $data['faq_menu']=  $this->restaurant_model->faq_menu();
                $data['apps_menu']=  $this->restaurant_model->apps_menu();
                $data['page']='admin/blog/comment';
                $this->load->view('admin/common/template',$data);
                }else
                {
                    redirect('user/log_in');
                }  
            }
            function signature_item_edit(){
                    $table="signature_item";
                    $table_id="signature_item_id";
                    if(isset($_GET['d_edit']))
                    {
                        $id=$_GET['d_edit'];
                        $data['edit_fetch']=$this->data_model->fetch_to_edit($table,$id,$table_id);
                        $this->load->view('admin/restaurent/edit_signature_item',$data);
                    }
                }
            function signature_item_update(){
                    $table_name="signature_item";
                    $table_id="signature_item_id";
                    $id=$this->input->post('signature_item_id');
                    $data=array(
                        'item_name'				=>$this->input->post('item_name'),
                        'item_short_description'		=>$this->input->post('item_short_description'),
                        'alergy_notice'				=>$this->input->post('alergy_notice'),
                        'item_price'			        =>$this->input->post('item_price'),
                        'res_id'			        =>$this->input->post('res_id'),
                        'res_name'			        =>$this->input->post('res_name'),
                        'res_cuisine_type'			=>$this->input->post('res_cuisine_type')
                    );
                    $this->data_model->update($id,$table_name,$data,$table_id);
                    redirect('admin/restaurent/view_signature_item');
                }
            public function edit_category()
                {                     
                $this->load->model('blog_model');
                  if($this->input->post())
                    {
                      // echo "hhh";exit;

                        $this->load->helper('form');
                        $this->load->library(array('form_validation'));
                        // set validation rules
                        $this->form_validation->set_rules('category_name', 'Name', 'required|max_length[200]|xss_clean');
                        $this->form_validation->set_rules('category_slug', 'Slug', 'max_length[200]|xss_clean');
                        $this->form_validation->set_rules('category_description', 'Description','xss_clean');
 
        if ($this->form_validation->run() == FALSE)
        {              
            $data['value'] = 'blog';
            $data['sub_value'] = 'add_category';
            $this->load->model('restaurant_model');
            //$data['recent_res']= $this->restaurant_model->recent_res();
            $data['company_menu']=  $this->restaurant_model->company_menu();
            $data['city_menu']=  $this->restaurant_model->city_menu();
            $data['faq_menu']=  $this->restaurant_model->faq_menu();
            $data['apps_menu']=  $this->restaurant_model->apps_menu();                
            // $this->load->view('admin/header');
            // $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/blog/new_category',$data); 
            // $this->load->view('admin/footer');  
                
        }
        else
        {
            // echo "hhh";exit;
           
            $id = $this->input->post('id');
            $name = $this->input->post('category_name');
            if( $this->input->post('category_slug') != '' ){
                $slug = $this->input->post('category_slug');
                }
                      else{
                             $slug = strtolower(preg_replace('/[^A-Za-z0-9_-]+/', '-', $name));
              }
                      $description = $this->input->post('description');
           
                      $result1=$this->blog_model->edit_category($id,$name,$slug,$description);
                      if($result1)
                      {
                          $this->session->set_flashdata('success', 'Category Edit Success!');
                          redirect('admin/blog/category');
                          }else{
                              $this->session->set_flashdata('danger', 'Category Update Faild!');
                              redirect('admin/blog/edit_category');
                          }
                  }
             }
              $data['value'] = 'blog';
              $data['sub_value'] = 'add_category';
              $id = $this->uri->segment(4);
               // echo $id;
              $data['category_details'] = $this->blog_model->blog_category_details($id);
              // var_dump($data['category_details']);exit;
              $this->load->model('restaurant_model');
              //$data['recent_res']= $this->restaurant_model->recent_res();
              $data['company_menu']=  $this->restaurant_model->company_menu();
              $data['city_menu']=  $this->restaurant_model->city_menu();
              $data['faq_menu']=  $this->restaurant_model->faq_menu();
              $data['apps_menu']=  $this->restaurant_model->apps_menu();      
      
            // $this->load->view('admin/header');
            // $this->load->view('admin/sidebar',$data);
              $data['page']='admin/blog/edit_category';
              $this->load->view('admin/common/template',$data);
            // $this->load->view('admin/footer');
      
    }



    function category_delete($id=null){
      if($id):
      $this->db->delete('entry_category',array('category_id'=>$id));
      endif;
      redirect('admin/blog/category');
    }

















 
    function all_post()
    {
        //this function will retrive all entry in the database
                $config = array();
                $config["base_url"] = base_url() . "blog/all_post/";
                $config["total_rows"] = $this->blog_model->record_count();
                $config["per_page"] = 5;
                $config["uri_segment"] = 3;
                $this->pagination->initialize($config);
                
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['query'] = $this->blog_model->get_all_posts($config["per_page"], $page);
//                var_dump($data['query']);
//                die();
                $data["links"] = $this->pagination->create_links();
                $data['all_category']=  $this->blog_model->all_category();
                $data['recent_post']=  $this->blog_model->recent_post();
                $data['list_popular_dishes'] = $this->restaurant_model->list_popular_dishes();
                //$data['recent_res']= $this->restaurant_model->recent_res();
                $data['company_menu']=  $this->restaurant_model->company_menu();
                $data['city_menu']=  $this->restaurant_model->city_menu();
                $data['faq_menu']=  $this->restaurant_model->faq_menu();
                $data['apps_menu']=  $this->restaurant_model->apps_menu();
                $data['title']="Indichef Blog";
                $data['content']="blog/blog";
                $this->load->view('template',$data);
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



 //show comment in admin script
    
   
    
   public function delete_category()
    {
        $this->load->model('blog_model');
        $category_id = $this->input->post('category_id');
        $result = $this->blog_model->delete_category($category_id);
        if($result)
        {   
            echo json_encode($result);
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
        $this->load->model('restaurant_model');
        //$data['recent_res']= $this->restaurant_model->recent_res();
        $data['company_menu']=  $this->restaurant_model->company_menu();
        $data['city_menu']=  $this->restaurant_model->city_menu();
        $data['faq_menu']=  $this->restaurant_model->faq_menu();
        $data['apps_menu']=  $this->restaurant_model->apps_menu();
        $data['list_popular_dishes'] = $this->restaurant_model->list_popular_dishes();
        $data['title']="Indichef Category Blog";
        $data['content']="blog/categorypost";
        $this->load->view('template',$data);
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
                    $this->load->model('restaurant_model');
                    //$data['recent_res']= $this->restaurant_model->recent_res();
                    $data['company_menu']=  $this->restaurant_model->company_menu();
                    $data['city_menu']=  $this->restaurant_model->city_menu();
                    $data['faq_menu']=  $this->restaurant_model->faq_menu();
                    $data['apps_menu']=  $this->restaurant_model->apps_menu();
//                    $this->load->view('blog/index_head');
//                    $this->load->view('res_front/off_header');
//                    $this->load->view('blog/viewpost',$data);
//                    $this->load->view('blog/footer');
                    $data['list_popular_dishes'] = $this->restaurant_model->list_popular_dishes();
                    $data['title']="Indichef Blog";
                    $data['content']="blog/single_post";
                    $this->load->view('template',$data);
                    }else{
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
        $data['bloghits'] = $this->blog_model->updateBlogHits($id); 
        $data['query'] = $this->blog_model->viewpost($id);
        $data['blockip']=  $this->blog_model->checkip($IP);
        $data['all_category']=  $this->blog_model->all_category();
        $data['recent_post']=  $this->blog_model->recent_post();
        $data['post_comment']=  $this->blog_model->get_post_comment($id);
        $this->load->model('restaurant_model');
        $data['company_menu']=  $this->restaurant_model->company_menu();
        $data['city_menu']=  $this->restaurant_model->city_menu();
        $data['faq_menu']=  $this->restaurant_model->faq_menu();
        $data['apps_menu']=  $this->restaurant_model->apps_menu();
        $data['list_popular_dishes'] = $this->restaurant_model->list_popular_dishes();
        $data['title']="Indichef Blog";
        $data['content']="blog/single_post";
        $this->load->view('template',$data);
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
         if(!$this->session->userdata('user_email'))
            {
                redirect('admin/dashboard'); 
                
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
            $this->load->model('restaurant_model');
              //$data['recent_res']= $this->restaurant_model->recent_res();
              $data['company_menu']=  $this->restaurant_model->company_menu();
              $data['city_menu']=  $this->restaurant_model->city_menu();
              $data['faq_menu']=  $this->restaurant_model->faq_menu();
              $data['apps_menu']=  $this->restaurant_model->apps_menu();
            $data['page']='admin/blog/edit_comment';
            $this->load->view('admin/common/template',$data);
                
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
            $this->load->model('restaurant_model');
            $data['company_menu']=  $this->restaurant_model->company_menu();
            $data['city_menu']=  $this->restaurant_model->city_menu();
            $data['faq_menu']=  $this->restaurant_model->faq_menu();
            $data['apps_menu']=  $this->restaurant_model->apps_menu();
            
            $data['page']='admin/blog/edit_comment';
            $this->load->view('admin/common/template',$data);
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
}


/* End of file blog.php */
/* Location: ./application/controllers/blog.php */