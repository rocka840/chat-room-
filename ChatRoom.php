<?php
    session_start();


    if(isset($_POST["userName"])){
     //   die("You are not allowed here. You need to <a href=^'ChatEnter.php'>login</a> !");
     header("location:ChatEnter.php");
        die();
    }

    $host = "localhost";
    $user = "root";
    $psw = "";
    $db = "chat";

    $connection= new mysqli($host, $user, $psw, $db);
    $sqlInsert = $connection->prepare("INSERT INTO users (userName) values(?)");
    $sqlInsert->bind_param("s",$_POST["userName"]);
    $sqlInsert->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="myJS.js"></script>
</head>
<body>

    <?php
        if(isset($_POST["logout"])){
            session_unset();
            session_destroy();
            header("Location: .../chatroom/ChatEnter.php");
            die();
        }
    ?>


    <h1>Welcome to the chatroom.</h1>
    <input type="textbox" id="msg">
    <input id="myUser" type="hidden" value='<?=$_POST["userName"]?>'>
    <button id="sendMsg">Send</button>


</body>
</html>