<?php 

    session_start();

    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pass"])){
        $password = $_POST["pass"];
        if($password === "password123"){
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
    <?php 
        if(isset($_SESSION["login"]) && $_SESSION["login"] === true):
    ?>
        <h1>Welcome!</h1>
        <p>This is the secret content</p>
        <a href="?logout=1">Logout</a>
    <?php else :?>
    <form method="post">
        <p>
            Password:
            <input type="password" name="pass">
            <button type="submit">Login</button>
        </p>
    </form>
<?php endif; ?>
</body>
</html>