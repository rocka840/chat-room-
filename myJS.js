/*$(start);

function start(){
    $('#sendMsg').on("click", sendMessage);
}

function sendMessage(){
    $.post("messaging.php",{
        user:$("#myUser").val(),
        contents:$("#msg").val()
    });
}*/

var lastMessages = [];

$("#sendMsg").on('click', function() {
    var content = $("#msg").val();
    $.post( "messaging.php", { msg: content } );
  
  });

function checkDatabase() {
  $.getJSON( "messaging.php", function( data ) { 
    var items = [];
    $.each( data, function( key, val ) {
      if(!lastMessages.includes(JSON.stringify(val))) {
        lastMessages.push(JSON.stringify(val));

        items.push("<tr>");
        items.push("<td>" + val.msgUser + "</td>");
        items.push("<td>" + val.msgText + "</td>");
        items.push("<tr>");
      }
    });
   
    for(var i = 0; i < items.length; i++) { 
      var item = items[i];
      $('#chatBox > tbody:last-child').append(item);
    }
  });
}

setInterval(checkDatabase, 500);


