var uploader = "";
var file_upload = {
    global_file_upload: "",
    global_file_upload_socket: "",
    init: function (socket) {
        $(document).ready(function () {
            file_upload.global_file_upload_socket = socket;
            file_upload.global_file_upload = new SocketIOFileUpload(socket);
            uploader = file_upload.global_file_upload;
            file_upload.progress();
            file_upload.start(socket);
        });
    },
    start: function (socket) {
        file_upload.global_file_upload.addEventListener("start", function (event) {
            var val = event.file.name.toLowerCase();
            var regex = new RegExp("(.*?)\.(docx|doc|pdf|xml|bmp|ppt|xls|jpg|gif|png|jpeg|xls|xlsx|ppt|txt|zip)$");
            if (!(regex.test(val))) {
                alert('Invalid Extension');
                uploader.abort(event.file.id, socket);
            } else {
                var boxid = event.rec_by;
                var mesg = '';
                var all_data = {
                    chat_type: 'single',
                    reciever_id: event.rec_by,
                    chat_name: chat_name,
                    send_by: event.send_by,
                };
                var pagefn = doT.template($('#file_temp_sender').html());
                var temp = pagefn(all_data);
                $("#chatbox_" + boxid + " .chatboxcontent").append(temp);
                $("#chatbox_" + boxid + " .chatboxcontent").scrollTop($("#chatbox_" + boxid + " .chatboxcontent")[0].scrollHeight);
            }
            //  socket.emit('setSocket', {my_name: my_name, chat_uid: chat_uid}, group_ids);
        });
    },
    progress: function () {
        file_upload.global_file_upload.addEventListener("progress", function (event) {
            //   console.log(event.rec_by);
            var percent = event.bytesLoaded / event.file.size * 100;

            //  var elem = $("#myBar" + event.rec_by);
            $("#myBar" + event.rec_by).css("width", percent.toFixed(2) + "%");
            //   elem.style.width = percent.toFixed(2) + '%';
            console.log("File is", percent.toFixed(2), "percent loaded");
        });
    },
    complete: function (event, new_name) {
        createChatBox(event.file.clientDetail.send_by, false, 'Myname', {event: event, new_name: new_name}, event.file.clientDetail.rec_by, 'single', 'file');
    },
    aftercompletemy: function (event, new_name) {
        $("#myProgress" + event.file.clientDetail.rec_by).html('<a target="_blank" href="' + global_url + 'attachments/org/' + new_name + '"><br/><img class="txtpng" src="' + global_url + 'assets/images/txt.png"/> &nbsp;&nbsp; ' + event.file.name + ' </a>');
        $("#myProgress" + event.file.clientDetail.rec_by).removeClass('myProgress');
        $("#myProgress" + event.file.clientDetail.rec_by).removeAttr('id', 'myProgress' + event.file.clientDetail.rec_by);
        $.ajax({
            url: global_url + "home/save_info",
            type: "POST",
            data: {name: event.file.name, message: new_name, uid_to: event.file.clientDetail.rec_by, chat_type: 'single', message_type: 'file'},
            success: function (data) {


            }
        });
    },
    checkext: function (name) {

    }
};