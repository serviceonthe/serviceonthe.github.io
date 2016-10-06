<header class="header black-bg">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" target="blank" href="<?php echo base_url(); ?>">PlazaLondon</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a class="active" href="<?php echo base_url(); ?>Auth/Dashboard">
                            <i class="fa fa-dashboard"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i><span> Profile</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Users/view_profile"><i class="fa fa-user-plus"></i> View Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Users/changePassword"><i class="fa fa-users"></i> Change Password</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i><span> Users</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Users/add_users"><i class="fa fa-user-plus"></i> Add User</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Users/list_users"><i class="fa fa-users"></i> List Users</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i>
                            <span> Room Setting</span>  <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/add_room_category"><i class="fa fa-plus-square"></i> Create Room Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/list_room_category"><i class="fa fa-list"></i> List Room Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/list_room_category"><i class="fa fa-list"></i> Edit Room Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/list_room_category"><i class="fa fa-list"></i> Delete Room Category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/add_discount_rule"><i class="fa fa-gavel"></i> Set Discount Rule</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/list_discount_rule"><i class="fa fa-gavel"></i> List Discount Rule</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/add_voucher"><i class="fa fa-plus-square"></i> Add Coupon</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/voucher_list"><i class="fa fa-plus-square"></i> List Coupon</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Roomrate/masterroomrate"><i class="fa fa-credit-card"></i> Master Room Rate</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Roomavail/roomavailability"><i class="fa fa-list-alt"></i> Room Availability Grid</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/room_allocate?unall=false&data="><i class="fa fa-plus-square"></i> Room Allocation Calendar</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i>
                            <span> Reservation</span>  <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/manual_check_availability"><i class="fa fa-plus-square"></i> Manual Reservation</a>
                            </li>	
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/booking_list"><i class="fa fa-plus-square"></i>  List All Reservation</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/reservation/pre_authorization_list"><i class="fa fa-plus-square"></i>  List Pre-Authorization</a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-list-alt"></i>
                            <span> Blog</span>  <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Blog/blog_category"><i class="fa fa-list-ul"></i> Blog category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Blog/blog_post"><i class="fa fa-paper-plane"></i> Blog post</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file"></i>
                            <span>Page</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Page/page_category"><i class="fa fa-files-o"></i> Page category</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Page/page_content"><i class="fa fa-file-text-o"></i> Page Content</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Page/page_menu_create"><i class="fa fa-th"></i> Page menu</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Page/all_menu_list"><i class="fa fa-list"></i> All menu List</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>Auth/Dashboard/online_payments_list"><i class="fa fa-credit-card"></i> Payment</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-file"></i>
                            <span>Others</span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/images"><i class="fa fa-picture-o"></i> Slide Image</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Dashboard/subscribe_list"><i class="fa fa-thumbs-up"></i> Subscribe</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Dashboard/review_list"><i class="fa fa-star"></i> Review</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Newsemail/newsletter"><i class="fa fa-credit-card"></i> News Letter</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>Auth/Newsemail/email_process"><i class="fa fa-credit-card"></i> Email News</a>
                            </li> 
                        </ul>
                    </li>
                    
                </ul>
                    
               
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="logout" href="<?php echo base_url(); ?>Auth/Access/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>

            </div>
        </header>