<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>NodeJS + PHP</title>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/template/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/chat.css">
        <script type="text/javascript">
            var global_url = '<?php echo base_url(); ?>';
            var chat_name = '<?php echo $this->session->userdata('chat_name'); ?>';
            var my_scoket = "";
            var uploader = "";
        </script>
        <?php $this->load->view('chating/template'); ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse sidebar" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:;"><?php echo $this->session->userdata('chat_name'); ?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php if (sizeof($users) > 0) { ?>
                            <?php foreach ($users as $value) { ?>
                                <li class="active">
                                    <a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $value['users_id']; ?>', '<?php echo $value['name']; ?>', '<?php echo $this->session->userdata('chat_uid'); ?>', '<?php echo $value['chat_type']; ?>')">
                                        <?php echo $value['name']; ?>
                                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span>
                                    </a>
                                </li>
                                <br>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="padding-top: 50px;">
            <h1>Integration  NodeJS + PHP + Express + Socket</h1>
            <!-- End #messages -->
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>node_modules/dot/doT.js"></script>
        <script src="<?php echo base_url(); ?>node_modules/socketio-file-upload/client.js"></script>
        <script src="<?php echo base_url(); ?>node_modules/socket.io-client/dist/socket.io.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/file_uploader.js"></script>
        <script type="text/javascript">
                                $(document).ready(function () {

                                    var timeout;
                                    var my_name = '<?php echo $this->session->userdata('chat_name'); ?>';
                                    var chat_uid = '<?php echo $this->session->userdata('chat_uid'); ?>';
                                    var group_ids = '<?php echo $group_id; ?>';
                                    var socket = my_scoket = io.connect('http://localhost:3000');
                                    file_upload.init(socket);
                                    //     uploader = new SocketIOFileUpload(socket);
                                    // var SocketIOFileUpload = require('./node_modules/socketio-file-upload');
                                    socket.on('connect', function (data) {
                                        socket.emit('setSocket', {my_name: my_name, chat_uid: chat_uid}, group_ids);
                                    });
                                    socket.on('message', function (message) {
                                        alert('The server has a message for you: ' + message);
                                    });
                                    socket.on('reply', function (reply, name) {
                                        $("#messageInput").val('');
                                    });
                                    socket.on('specific', function (data) {
                                        var message = data.message.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g, "&quot;");
                                        createChatBox(data.sender_id, false, data.name, message, data.reciever_id, data.chat_type, uploader);
                                    });
                                    socket.on('aftercomplete', function (event, new_name) {
                                        file_upload.complete(event, new_name)
                                    });
                                    socket.on('aftercompletemy', function (event, new_name) {
                                        file_upload.aftercompletemy(event, new_name)
                                    });
                                    socket.on('specificgroup', function (data) {
                                        //    console.log(data);
                                        var message = data.message.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g, "&quot;");
                                        createChatBox(data.sender_id, false, data.name, message, data.reciever_id);
                                    });
                                    //                                    socket.on('typingclient', function (data) {
                                    //                                        console.log('.typingspan' + chat_uid + data.sender_id);
                                    //                                        $('.' + chat_uid + data.sender_id + "typ").remove();
                                    //                                        $('.typingspan' + chat_uid + data.sender_id).prepend("<span class='" + chat_uid + data.sender_id + "typ'>Typing...... </span>");
                                    //                                    });
                                    //                                    socket.on('typingclientstop', function (data) {
                                    //                                        $('.' + chat_uid + data.sender_id + "typ").remove();
                                    //                                    });


                                });

                                function htmlbodyHeightUpdate() {
                                    var height3 = $(window).height()
                                    var height1 = $('.nav').height() + 50
                                    height2 = $('.main').height()
                                    if (height2 > height3) {
                                        $('html').height(Math.max(height1, height3, height2) + 10);
                                        $('body').height(Math.max(height1, height3, height2) + 10);
                                    } else
                                    {
                                        $('html').height(Math.max(height1, height3, height2));
                                        $('body').height(Math.max(height1, height3, height2));
                                    }
                                }
                                $(document).ready(function () {
                                    htmlbodyHeightUpdate()
                                    $(window).resize(function () {
                                        htmlbodyHeightUpdate()
                                    });
                                    $(window).scroll(function () {
                                        height2 = $('.main').height()
                                        htmlbodyHeightUpdate()
                                    });
                                });
                                // add event listner


        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chat.js"></script>

    </body>
</html>