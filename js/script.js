$("#send").click(function(){

var sender_id=$("#sender_id").val();
var sender_type=$("#sender_type").val();
var receiver_id=$("#receiver_id").val();
var receiver_type=$("#receiver_type").val();
var date=$("#date").val();
var chat=$("#chat").val();
var userType=$("#userType").val();

const data = new FormData();
data.append("sender_id", sender_id);
data.append("sender_type", sender_type);
data.append("receiver_id", receiver_id);
data.append("receiver_type", receiver_type);
data.append("date", date);
data.append("chat", chat);

console.log(chat)

$.ajax({
    type: "POST",
    url: "sendmessage.php",
    data: data,
    contentType: false,
    processData: false,
    success: function(result){
        console.log(result);
        $("#chat").val("");
    }
});

});