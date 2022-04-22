<?php
if(isset($_POST["user"],$_POST["contents"])){
    $host="localhost";
    $user="root";
    $psw="";
    $db="chat";

    $connection = new mysqli($host,$user,$psw,$db);
    
    $sqlInsert = $connection->prepare("Insert into messages (msgTime, msgText, fromUser) values(now(),?,(SELECT UserId from users where UserName=?))");
    $sqlInsert->bind_param("ssi",$_POST["user"],$_POST["contents"]);
    $sqlInsert->execute();
}
?>