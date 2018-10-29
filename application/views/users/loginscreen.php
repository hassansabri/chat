<!DOCTYPE html>
<html lang="en-us" id="lock-page">
    <head>
        <meta charset="utf-8">
        <title>Online Chat</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/font-awesome.min.css">
        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-skins.min.css">
        <!-- SmartAdmin RTL Support -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/smartadmin-rtl.min.css"> 
        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->
        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/demo.min.css">
        <!-- page related CSS -->

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/lockscreen.min.css">
    </head>
    <body>
        <div id="main" style="" role="main">
            <!-- MAIN CONTENT -->
            <form id="login-form" class="lockscreen animated flipInY" action="<?php echo base_url(); ?>login/verify" method="post" >
                <div class="logo">
                    <h1 class="semi-bold kufi">Online Chat</h1>
                </div>
                <div>
                    <img style="" src="<?php echo base_url(); ?>assets/images/e-exam.jpg" alt="" width="120" height="120" />
                    <div>
                        <?php if (isset($message) && sizeof($message) > 0) { ?>
                            <div style="color: red;">
                                <?php echo $message["msg"]; ?>
                            </div>
                        <?php } ?>
                        <h1 class="kufi">User Login</h1>
                        <div class="">
                            <input class="form-control" name="email" type="text" placeholder="email">
                        </div>
                        <br/>
                        <div class="">
                            <input class="form-control" name="password" type="password" placeholder="password">
                        </div>
                        <br/>
                        <button class="btn btn-primary kufi" type="submit">
                            Submit
                        </button> &nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                <p class="font-xs margin-top-5 kufi">
                    All Rights Reseved <?php echo date('Y'); ?>
                </p>
            </form>
        </div>
        <!--================================================== -->	
        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
        <script src="<?php echo base_url(); ?>assets/template/js/plugin/pace/pace.min.js"></script>
        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>




    </body>
</html>