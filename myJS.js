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
  $.getJSON( "messaging.php", function( data ) { // ALMOST ALL of this is taken from the example in https://api.jquery.com/jquery.getjson/ sorry if its complicated
    var items = [];
    $.each( data, function( key, val ) {
      if(!lastMessages.includes(JSON.stringify(val))) {// if message is not already stored (NEED TO STORE AS A STRING)
        lastMessages.push(JSON.stringify(val)); // add message to already known message list

        items.push("<tr>"); // open table row
        items.push("<td>" + val.msgUser + "</td>");
        items.push("<td>" + val.msgText + "</td>");
        items.push("<tr>"); // close table row
      }
    });
   
    for(var i = 0; i < items.length; i++) { // for every message
      var item = items[i]; // message content
      $('#chatBox > tbody:last-child').append(item); // add content to table
    }
  });
}

setInterval(checkDatabase, 500); // run checkDatabase every 0.5s


