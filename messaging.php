<?php
    session_start();

    $host="localhost";
    $user="root";
    $psw="";
    $db="chat";

    $connection = mysqli_connect($host,$user,$psw,$db);

    if(!$connection){
        die("Connection failed: ". mysqli_connect_error());
    }
    
    if(isset($_SESSION["UserName"], $_POST["msg"])){
       // msgId	msgUser	msgTime	msgText	
    $sqlInsert = $connection->prepare("INSERT INTO messages (msgUser, msgText, msgTime) VALUES (?, ?, NOW())");
    $sqlInsert->bind_param("ss",$_SESSION["UserName"],$_POST["msg"]);
    $sqlInsert->execute();
    } else {
        $sql = "SELECT * FROM messages";
        $result = mysqli_query($connection, $sql);
        $json_results = [];

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($json_results, $row);
            }
        }
        echo json_encode($json_results);
    }
?>
