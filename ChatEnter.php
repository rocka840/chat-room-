<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php
    session_start();
    
    if(isset($_POST["UserName"])){
        $_SESSION["UserName"] = $_POST["UserName"];
        header("Location: ChatRoom.php");
        die();
    }

    if(isset($_SESSION["UserName"])){
        header("Location: ChatRoom.php");
        die();
    }
?>

        <h1>
            Welcome to our chatroom entry point:
        </h1>

        <form method="POST">
            Please type-in your username:
            <input name="UserName">
            <input type="submit" value="Enter">
        </form>

</body>
<script src="myJS.js"></script>
</html>