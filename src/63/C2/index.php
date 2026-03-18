<?php 
    session_start();

    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pass"])){
        $password = $_POST["pass"];
        if($password === "pass"){
            $_SESSION["login"] = true;
        }
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
        <a href="?logout=1">logout</a>
    <?php else: ?>    

    <form method="post">
        <input type="password" name="pass">
        <button type="submit">login</button>
    </form>
    <?php endif; ?>
</body>
</html>

