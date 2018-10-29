<script id="headertmpl" type="text/x-dot-template">
    <div class="chatboxhead">
    <div class="chatboxtitle">{{=it.user_name}}</div>
    <div class="chatboxoptions">
    <a href="javascript:void(0)" onclick="javascript:toggleChatBoxGrowth({{=it.chatboxtitle}})">-</a>
    <a href="javascript:void(0)" onclick="javascript:closeChatBox({{=it.chatboxtitle}})">X</a>
    </div><br clear="all"/></div>
    <div class="chatboxcontent"></div>
    <div class="chatboxinput typingspan{{=it.reciever_id}}{{=it.send_by}}">
    <div class="image-upload">
    <textarea class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,{{=it.send_by}},{{=it.reciever_id}},{{=it.chat_type}});"></textarea>
    <label for="siofu_input{{=it.reciever_id}}">
    <img src="<?php echo base_url(); ?>assets/images/upload.png"/>
    </label>
    <input class="siofu_input" rec_by="{{=it.send_by}}" send_by="{{=it.reciever_id}}" id="siofu_input{{=it.reciever_id}}" type="file"/>
    </div>
    </div>
</script>
<script id="file_temp_rec" type="text/x-dot-template">
    <div class="chatboxmessage reciever">
        <span class="chatboxmessagefrom reciever">{{=it.chat_name}}&nbsp;&nbsp;</span>
        <span class="chatboxmessagecontent rec">{{=it.message}}</span>
    </div>
</script>
<script id="file_temp_sender" type="text/x-dot-template">
   <div class="chatboxmessage sender">
        <span class="chatboxmessagefrom sender">{{=it.chat_name}}&nbsp;&nbsp;</span>
        <span class="chatboxmessagecontent">
         <div class="myProgress" id="myProgress{{=it.reciever_id}}">
              <div class="myBar" id="myBar{{=it.reciever_id}}"></div>
          </div>
        </span>
    </div>
</script>