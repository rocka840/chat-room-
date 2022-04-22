$(start);

function start(){
    $('#sending').on("click", sendMessage);
}

function sendMessage(){
    $.post("messaging.php",{
        user:$("myUser").val(),
        contents:$("sendmsg").val()
    });
}

