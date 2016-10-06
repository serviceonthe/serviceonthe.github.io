
    <script>
        $(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                }
            );
            $(".dropdown-submenu").hover(
                function () {
                    $('.dropdown-menu-submenu', this).stop(true, true).fadeIn("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                },
                function () {
                    $('.dropdown-menu-submenu', this).stop(true, true).fadeOut("fast");
                    $(this).toggleClass('open');
                    $('b', this).toggleClass("caret caret-up");
                }
            );

        });

    </script>
    <style type="text/css">
        .dropdown-menu-submenu{
            display: none;
        }
    </style>
    <section>
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" target="blank" href="<?php echo base_url(); ?>">Bedford</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a class="active" href="<?php echo site_url('admin/dashboard'); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i><span> Products</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?php echo base_url();?>admin/food/add_item"><i class="fa fa-user-plus"></i> Add Product</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/food/add_sub_item"><i class="fa fa-user-plus"></i> Add Sub Product</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/food/fatch_item"><i class="fa fa-users"></i> Product List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/food/fatch_category"><i class="fa fa-users"></i> Category List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/food/allergy"><i class="fa fa-users"></i> Allergy</a>
                            </li>


                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i><span> History</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/dashboard/list_order"><i class="fa fa-user-plus"></i> Order List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>index.php/admin/dashboard/list_reservation"><i class="fa fa-users"></i> Reservation List</a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file"></i>
                            <span>Page</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                                <a href="<?php echo base_url();?>admin/pages/category_view"><i class="fa fa-files-o"></i> Page Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/pages/page_view"><i class="fa fa-file-text-o"></i> Page</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pages/all_menu_list"><i class="fa fa-th"></i> Page menu</a>
                            </li> -->
                            <!-- 
                            <li>
                                <a href="<?php echo base_url(); ?>admin/dashboard/footer_content"><i class="fa fa-list"></i> Footer Content</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/dashboard/overview_content"><i class="fa fa-list"></i> Overview Content</a>
                            </li> 
                            -->     
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pages/create_new_home"><i class="fa fa-home"></i> Home</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pages/create_new_about"><i class="fa fa-info-circle"></i> About Us</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pages/create_new_faq"><i class="fa fa-calendar"></i> FAQ </a>
                            </li>  
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pages/create_new_offers"><i class="fa fa-gift"></i> Offers</a>
                            </li>                        
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file"></i>
                            <span>Blog</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('admin/blog/category'); ?>"><i class="fa fa-files-o"></i>Category</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/blog/posts'); ?>"><i class="fa fa-file-text-o"></i>Post</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/blog/comment'); ?>"><i class="fa fa-th"></i>Comment</a>
                            </li>                                                        
                        </ul>
                    </li>

                    <!-- <li class="dropdown">
                                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                               <i class="fa fa-file"></i>
                                               <span>Gallery</span> <b class="caret"></b>
                                           </a>
                                           <ul class="dropdown-menu">
                                               <li>
                                                   <a href="<?php echo site_url('admin/image/gallery/resturent'); ?>"><i class="fa fa-files-o"></i>Resturent Gallery</a>
                                               </li>
                                               <li>
                                                   <a href="<?php echo site_url('admin/image/gallery/food'); ?>"><i class="fa fa-file-text-o"></i>Food Gallery</a>
                                               </li>                                                       
                                           </ul>
                                       </li> 
                                        -->    
                    <li>
                        <a class="active" href="<?php echo site_url('admin/image/gallery'); ?>">
                            <i class="fa fa-dashboard"></i>
                            <span> Gallery</span>
                        </a>
                    </li>               

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i><span>Module</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?php echo site_url('admin/module/slider'); ?>"><i class="fa fa-user-plus"></i>Slider</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/module/logo'); ?>"><i class="fa fa-user-plus"></i>Logo</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/module/social'); ?>"><i class="fa fa-user-plus"></i>Social</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/module/contact'); ?>"><i class="fa fa-user-plus"></i>Contact</a>
                            </li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-list-alt"></i>
                            <span>User</span>  <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('admin/users/add_user'); ?>"><i class="fa fa-list-ul"></i>Add User</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/users/fatch_users'); ?>"><i class="fa fa-list-ul"></i>User List</a>
                            </li>

                            <li>
                                <a href="<?php echo site_url('admin/users/fatch_customers'); ?>"><i class="fa fa-paper-plane"></i>Customers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file"></i>
                            <span>Settings</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo site_url('admin/settings/discount'); ?>"><i class="fa fa-picture-o"></i>Discount</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/payment'); ?>"><i class="fa fa-picture-o"></i>Payment Method</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/business'); ?>"><i class="fa fa-picture-o"></i>Business Condition</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/business_hour'); ?>"><i class="fa fa-picture-o"></i>Business Hour</a> 
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/add_voucher'); ?>"><i class="fa fa-picture-o"></i>Loyalty Discount</a> 
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/add_discount'); ?>"><i class="fa fa-picture-o"></i>Add Discount</a> 
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/add_special_discount'); ?>"><i class="fa fa-picture-o"></i>Special Discount</a> 
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/settings/add_bulk_coupon'); ?>"><i class="fa fa-picture-o"></i>Add Bulk Coupon</a> 
                            </li>
                            <li class="dropdown-submenu">
                                <a data-toggle="dropdown" href="<?php echo site_url('admin/settings/email'); ?>"><i class="fa fa-picture-o"></i>Email Template</a>
                                <ul class="dropdown-menu-submenu">
                                    <li>
                                        <a href="<?php echo site_url('admin/settings/email/order'); ?>"><i class="fa fa-picture-o"></i>Order</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('admin/settings/email/reservation'); ?>"><i class="fa fa-picture-o"></i>Reservation</a>                                        
                                    </li>
                                </ul>
                            </li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file"></i>
                            <span>Others</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
							<li>
                                <a href="<?php echo base_url(); ?>admin/dashboard/review_list"><i class="fa fa-star"></i> Review</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/mail/newsletter"><i class="fa fa-credit-card"></i> News Letter</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/mail/email_process"><i class="fa fa-credit-card"></i> Email News</a>
                            </li> 
                        </ul>
                    </li>                     
                </ul>                   
               
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="logout" href="<?php echo site_url('admin/login/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>

            </div>
        </header>
        <!--header end-->







<?php
/**
 * Created by PhpStorm.
 * User: ZCE-Server
 * Date: 1/20/15
 * Time: 1:15 AM
 */ 
