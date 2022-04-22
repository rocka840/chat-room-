<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='myJS.js'></script>
</head>
<body>

<?php
    include_once("messaging.php");
    

    if($_POST["UserName"]){
        header("Location: ../chatroom/ChatRoom.php");
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
</html>