<?php 
    session_start();

    if(!isset($_SESSION)){
        echo "セッションエラー";
        exit;
    }

    if(isset($_SESSION["count"])){
        $_SESSION["count"] ++;
    }else{
        $_SESSION["count"] = 1;
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["reset"])){
        session_unset();
        session_destroy();
        header("Location:" .$_SERVER["PHP_SELF"]);
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
    <p>あなたのアクセス回数：<?= $_SESSION["count"] ?>回</p>

    <form method="post">
        <button type="submit" name="reset">リセット</button>
    </form>
</body>
</html>