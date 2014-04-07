$(document).ready(function (){
   
    $("#chatform").submit(function (){
        $.ajax({
            type: "POST",
            url: "/My-CMS/ri.class/Chat/send.php",
            data: "message="+$("#message").val(),
            success: function(data) {
                $("#message").val("");
                $('#chat').prepend($('#messages').load("get.php"));              
            }
        });
        return false;
    });
    if($("#chat").is(":visible")){
        window.setInterval(function (){
            $('#chat').prepend($('#messages').load("get.php"));
        }, 3000);
    }
});