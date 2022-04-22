<?php
    session_start();

    $host = "localhost";
    $user = "root";
    $psw = "";
    $db = "chat";

    $connection= new mysqli($host, $user, $psw, $db);
    $sqlInsert = $connection->prepare("INSERT INTO users (UserName) values(?)");
    $sqlInsert->bind_param("s",$_POST["UserName"]);
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
    include_once("messaging.php");
?>

    <?php
        if(isset($_POST["logout"])){
            session_unset();
            session_destroy();
            header("Location: .../chatroom/ChatEnter.php");
            die();
        }
    ?>


    <h1>Welcome to the chatroom.</h1>
    
    <form method="POST">
        <input type="textbox" id="msg">
        <input id="myUser" type="hidden" value='<?=$_POST["UserName"]?>'>
        <button id="sendMsg">Send</button>
        <button id="logout">logout</button>
    </form>

</body>
</html>