<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    
    <?php
     session_start();

        if(isset($_POST["logout"])){
            unset($_SESSION["UserName"]);
            session_destroy();
            header("Location: ChatEnter.php");
            die();
        }
    ?>


    <h1>Welcome to the chatroom!</h1>

    <div>
        <table id="chatBox">
            <tbody></tbody>
        </table>
    </div>
    
    <form method="POST">
        <input type="text" id="msg">
        <input id="myUser" type="hidden" value='<?=$_SESSION["UserName"]?>'>
        <input type="button" name="sendMsg" value="send" id="sendMsg">
    </form>

    <form method="POST">
        <input type="submit" name="logout" value="logout"></input>
    </form>

</body>
<script src="myJS.js"></script>
</html>