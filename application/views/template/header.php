<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Hotel Giragala</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Giragala Village" name="Harsha Chathuranga" />
        <link rel="shortcut icon" href="assets/site_image/icon.png" /> 
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>

    <!-- BEGIN SELECT BOX PLUGINS bootstrap-datetimepicker.min-->
    <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END SELECT BOX PLUGINS -->

    <!-- BEGIN SWEET ALERT PLUGIN -->
   <!-- <link href="<?php //echo base_url(); ?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" /> -->
    <!-- END SWEET ALERT PLUGIN -->


    <?php
    date_default_timezone_set('Asia/Colombo');//Asia/Colombo

    $log_user = $this->session->userdata('logged_user');
    $user_detail = ($this->session->all_userdata()['logged_user_details']);

    if (!$user_detail) {
        redirect('Login/logout');
    }

    ?>   

    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a>
                                        <img src="assets/site_image/logo-small.jpg" alt="logo"  class="logo-default">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->

                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        <!-- BEGIN USER LOGIN DROPDOWN -->
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <span class="username username-hide-mobile"><?php echo $user_detail['full_name'] ?></span>
                                                <img alt="" class="img-circle" src="assets/site_image/user-icon.PNG">

                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="page_user_profile_1.html">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('Login/logout'); ?>">
                                                        <i class="icon-logout"></i> Log Out </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">
                                <!-- BEGIN HEADER SEARCH BOX -->

                                <div class="hor-menu" style="margin-left:150px;">
                                    <ul class="nav navbar-nav">
                                        <?php if($user_detail['full_name'] == 'Harsha Chathuranga'){?>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url('Dashboard'); ?>">
                                                <i class="fa fa-th-large"></i> Dashboard </a>
                                            </a>

                                        </li>
                                        <?php } ?>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="<?php echo base_url('Bill'); ?>"> 
                                                <i class="fa fa-shopping-cart"></i> Billing 
                                            </a>

                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">

                                            <a href="javascript:;">
                                                <i class="fa fa-th-list"></i> Menu
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true">
                                                    <a href="<?php echo base_url('Food'); ?>" class="nav-link ">
                                                        <i class="fa fa-birthday-cake"></i> Food Menu  
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true">
                                                    <a href="<?php echo base_url('Dessert'); ?>" class="nav-link ">
                                                        <i class="fa fa-apple"></i> Desserts Menu  
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true">
                                                    <a href="<?php echo base_url('Beverage'); ?>" class="nav-link ">
                                                        <i class="fa fa-coffee"></i> Beverages Menu
                                                    </a>
                                                </li>

                                                <li aria-haspopup="true">
                                                    <a href="<?php echo base_url('Liquer'); ?>" class="nav-link ">
                                                        <i class="fa fa-glass"></i> Liquor 
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php if($user_detail['full_name'] == 'Harsha Chathuranga'){?>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">

                                            <a href="javascript:;">
                                                <i class="fa fa-user-plus"></i> Setting
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                    <a href="<?php echo base_url('User'); ?>" class="nav-link ">
                                                        <i class="fa fa-user"></i> User
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                    <a href="<?php echo base_url('BillingHistory'); ?>" class="nav-link ">
                                                        <i class="fa fa-history"></i> Bill History
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                    <a href="<?php echo base_url('BeerHistory'); ?>" class="nav-link ">
                                                        <i class="fa fa-history"></i> Beer History
                                                    </a>
                                                </li>
                                                 <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                                    <a href="<?php echo base_url('BeverageHistory'); ?>" class="nav-link ">
                                                        <i class="fa fa-history"></i> Beverage History
                                                    </a>
                                                </li>
                                             </ul>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!-- END MEGA MENU -->
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>