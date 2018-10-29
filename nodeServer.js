var clients = [];
var groups = [];
var express = require('express');
var im = require('imagemagick');
var easyimg = require('easyimage');
var siofu = require("socketio-file-upload");
var http = require('http');
var fsextra = require('fs-extra');
var fs = require('fs');
var app = express();
var server = app.listen(3000);
// Loading socket.io
var io = require('socket.io').listen(server);
io.sockets.on('connection', function (socket, username) {
    // When the client connects, they are sent a message

    socket.emit('message', 'You are connected!');
    socket.on('setSocket', function (data, group_ids) {
        socket.my_name = data.my_name;
        clients[data.chat_uid] = {
            "socket": socket.id
        };
        var myStringArray = JSON.parse(group_ids);
        var arrayLength = myStringArray.length;
        for (var i = 0; i < arrayLength; i++) {
            socket.join('room' + myStringArray[i]);
            //   groups.push('room' + myStringArray[i]);
        }
        //   loading uploading file
    });
    var uploader = new siofu();
    uploader.dir = "./attachments/tmp";
    uploader.listen(socket);
    uploader.on("start", function (event) {
        //     console.log(event);
        var val = event.file.name.toLowerCase();
        var regex = new RegExp("(.*?)\.(docx|doc|pdf|xml|bmp|ppt|xls|jpg|gif|png|jpeg|xls|xlsx|ppt|txt|zip)$");
        if (!(regex.test(val))) {
            uploader.abort(event.file.id, socket);
        }

    });
    uploader.on("complete", function (event) {
        var rand = Math.random().toString(36).substr(2, 9);
        var ext = getFileExtension1(event.file.name);
        var new_name = rand + "." + ext;
        fs.rename('./attachments/tmp/' + event.file.name, './attachments/org/' + new_name, (err) => {
            if (err) {
                throw err;
            } else {
                if (clients[event.file.clientDetail.rec_by]) {
                    console.log(event.file.clientDetail.rec_by);
                    io.sockets.connected[clients[event.file.clientDetail.rec_by].socket].emit("aftercomplete", event, new_name);
                }
                socket.emit("aftercompletemy", event, new_name);
            }
        });
    });
    uploader.on("saved", function (event) {
        //    console.log(event);
    });
    socket.on('private-message', function (data) {
        if (data.chat_type == 'group') {
            socket.broadcast.to('room' + data.reciever_id).emit('specific', data);
        } else {
            if (clients[data.reciever_id]) {
                io.sockets.connected[clients[data.reciever_id].socket].emit("specific", data);
            } else {
                console.log("User not Online:");
            }
        }

    });
    socket.on('typingnode', function (data) {
        if (clients[data.reciever_id]) {
            io.sockets.connected[clients[data.reciever_id].socket].emit("typingclient", data);
        }
    });
    socket.on('typingnodetstop', function (data) {
        if (clients[data.reciever_id]) {
            io.sockets.connected[clients[data.reciever_id].socket].emit("typingclientstop", data);
        }
    });
});
function getFileExtension1(filename) {
    return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : undefined;
}
