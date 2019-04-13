
$(document).ready(function(e){
  $('#chat').last().focus()
  if($(".msg_container")[0]){
    $('#chats').animate({
        scrollTop: $("#chats .msg_container").last().offset().top
     },2000);
  }
  
  $('#chat').on('keypress',function(e) {
    // console.log(e.which)
    if(e.which == 13) {
      $('#send').trigger('click');
    }
});
setInterval(function(){

   var last_message_id=$('#chats').children().last().attr('id');
   if (!last_message_id) {
    last_message_id = 0;
   }  

   //console.log(id);

var sender_id=$("#sender_id").val();
var sender_type=$("#sender_type").val();
var receiver_id=$("#receiver_id").val();
var receiver_type=$("#receiver_type").val();
var receiver_name=$("#receiver_name").val();


const data = new FormData();
data.append("sender_id", sender_id);
data.append("sender_type", sender_type);
data.append("receiver_id", receiver_id);
data.append("receiver_type", receiver_type);
data.append("receiver_name", receiver_name);
data.append("last_message_id",last_message_id);

$.ajax({
    type: "POST",
    url: "logs.php",
    data: data,
    contentType: false,
    processData: false,
    success: function(result){
        console.log(result);
        messages = JSON.parse(result);
        if(messages.length > 0){
            messages.forEach(function(msg){
                if(msg['sender_id'] == sender_id){
                    var newmessage = `
                        <div class="row msg_container base_receive" id="${msg['id']}">
                              <div class="col-md-10 col-xs-10">
                                   <div class="messages msg_receive">
                                       <p>${msg['content']}</p>
                                       <div class="time text-muted">${msg['date']}</div>
                                    </div>
                              </div>
                          </div>
                    `;
                }else{
                    var newmessage = `
                        <div class="row msg_container base_sent" id="${msg['id']}">
                              <div class="col-md-10 col-xs-10">
                                   <div class="messages msg_sent">
                                       <p>${msg['content']}</p>
                                       <div class="time text-muted">${msg['date']}</div>
                                    </div>
                              </div>
                          </div>
                    `;
                }
            
            $("#chats").append(newmessage);
           $('#chats').animate({
              scrollTop: $("#chats .msg_container").last().offset().top
           },2000);

        })
        }
        

    }
});



  },1000);
});



$("#send").click(function(){
if ($("#chat").val()=='') {
		alert("you cannot send empty message!");
	}
else{
var sender_id=$("#sender_id").val();
var sender_type=$("#sender_type").val();
var receiver_id=$("#receiver_id").val();
var receiver_type=$("#receiver_type").val();
var date=$("#date").val();
var chat=$("#chat").val();
var receiver_name=$("#receiver_name").val();


const data = new FormData();
data.append("sender_id", sender_id);
data.append("sender_type", sender_type);
data.append("receiver_id", receiver_id);
data.append("receiver_type", receiver_type);
data.append("date", date);
data.append("chat", chat);
data.append("receiver_name", receiver_name);

$.ajax({
    type: "POST",
    url: "sendmessage.php",
    data: data,
    contentType: false,
    processData: false,
    success: function(result){
        // return;   
        $("#chats").append(result);
        $("#chat").val("");
		


    }
});
}

});
