function getCurrentTime() {
    var now = new Date();
    var hour = now.getHours();
    var hh = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    hour = hour % 12 ;
    hour = hour ? hour:12 ;
    hour = hour < 10 ? '0'+ hour : hour ;
    min = min < 10 ? '0' + min : min ;
    var amp = (hh > 12) ? "PM" : "AM" ;
    var time = hour + ":" + min + " " + amp;
    return time;    
}
        
function send_msg() {
    $(".start_chat").hide();
    var ttt = "10:00 AM";
    var txt = $("#input-me").val();
    var img_src = "design/views/image/user_img.png";
    var bot_src = "design/views/image/robot_img.png";

    var html='<li class="messages-me clearfix"><span class="message-img"><img src="'+img_src+'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+txt+'</p></div></li>';

    $('.messages-list').append(html);
    $('#input-me').val('');

    var link = 'design/views/controller/get_bot_messages.php';
    
    if(txt) {
        $.ajax({
            url: link,
            type:'post',
            data: 'txt=' +txt,
            success:function (result) {
                var bot_src = "design/views/image/robot_img.png";
                var html='<li class="messages-you clearfix"><span class="message-img"><img src="'+bot_src+'" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Bot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';  

                $('.messages-list').append(html);
                $('.messages-box').scrollTop($('.messages-box')[0].scrollHeight);

            }
        });
    }
}