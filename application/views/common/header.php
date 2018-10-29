<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
        <title>Front Desk | Civil Defense</title>
        <meta name="description" content="Civil Defense">
        <meta name="author" content="Civil Defense">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/font-awesome.min.css">
        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-skins.min.css">
        <!-- SmartAdmin RTL Support  -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-rtl.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/your_style.css">
        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
        <script src="<?php echo base_url(); ?>assets/template/js/plugin/pace/pace.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css" />
        <script type="text/javascript">
            var global_url = '<?php echo base_url(); ?>';
        </script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
    </head>
    <body style="background:#F7F7F7;" class="smart-rtl menu-on-top">
        <header id="header">
            <div id="logo-group">
                <!-- PLACE YOUR LOGO HERE -->
                <span id="logo" style="margin-top: 3px;"> 
                    <img style="height: 46px;    width: 63px;" src="<?php echo base_url(); ?>assets/img/e-exam.jpg" alt="<?php echo $this->lang->line("cvivldefense"); ?>"> <?php echo $this->lang->line("cvivldefense"); ?>
                </span>
            </div>
            <!-- projects dropdown -->
            <!-- end projects dropdown -->
            <!-- pulled right: nav area -->
            <div class="pull-right">
                <!-- collapse menu button -->
                <div id="hide-menu" class="btn-header pull-right">
                    <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
                </div>
                <!-- end collapse menu -->
                <!-- #MOBILE -->
                <!-- Top menu profile link : this shows only when top menu is active -->
                <ul id="" class="header-dropdown-list hidden-xs padding-5">
                    <li class="">
                        <a href="#" class="dropdown-toggle no-margin userdropdown " data-toggle="dropdown"> 
                            <?php
                            $user_image_h = $this->session->userdata('user_image');
                            if (isset($user_image_h) && $user_image_h != "") {
                                $user_image_h = $user_image_h;
                            } else {
                                $user_image_h = 'noimage.png';
                            }
                            ?>
                        </a>
                    </li>
                </ul>
                <div id="fullscreen" class="btn-header transparent pull-right">
                    <span> <a href="<?php echo base_url(); ?>login/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
                </div>
                <!-- fullscreen button -->
                <div id="fullscreen" class="btn-header transparent pull-right">
                    <span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
                </div>
                <!-- end fullscreen button -->
                <!-- multiple lang dropdown : find all flags in the flags page -->
                <ul class="header-dropdown-list hidden-xs">
                    <li>

                        <ul class="dropdown-menu pull-right">
                            <li class="">
                                <a onclick="return chnagetoenglish();" href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/template/img/blank.gif" class="flag flag-us" alt="United States"> English</a>
                            </li>
                            <li class="">
                                <a onclick="return chnagetoarabic();" href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/template/img/blank.gif" class="flag flag-ae" alt="United Arab Emirates"> عربي</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- end multiple lang -->
            </div>
            <!-- end pulled right: nav area -->
        </header>
        <aside id="left-panel">
            <!-- User info -->
            <div class="login-info">
                <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
                    <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                        <span>
                            أهلا وسهلا!
                        </span>
                    </a> 
                </span>
            </div>
            <!-- end user info -->
            <!-- NAVIGATION : This navigation is also responsive-->
            <nav>
                <ul>                     
                    <!-- 2 is for users management-->
                    <li class="">      
                        <a href="<?php echo base_url(); ?>home" title="<?php echo $this->lang->line("mangage_visitor"); ?>"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent"><?php echo $this->lang->line("mangage_visitor"); ?></span></a>
                    </li>
                </ul>
            </nav>
            <span class="minifyme" data-action="minifyMenu"> 
                <i class="fa fa-arrow-circle-left hit"></i> 
            </span>
        </aside>



