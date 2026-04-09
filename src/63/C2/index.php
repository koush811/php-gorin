<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pass"])){
        $pass = $_POST["pass"];
        if($pass === "pass"){
            $_SESSION["login"] = true;
        }else{
            echo "不一致";
        }
    }

    if(isset($_GET["logout"])){
        session_destroy();
        session_unset();
        header("Location:".$_SERVER["PHP_SELF"]);
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION["login"]) && $_SESSION["login"] === true): ?>
        <h1>Welcome</h1>
        <a href="?logout=1">Logout</a>
    <?php else: ?>
    <form action="" method="post">
        <input type="password" name="pass">
        <button type="submit">Login</button>
    </form>
    <?php endif ?>
</body>
</html>