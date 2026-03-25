<?php 
    $ip = $_SERVER["REMOTE_ADDR"] ?? null;

    if($ip === null || $ip === ""){
        $message = "取得失敗";
    }else{
        $ip_xss = htmlspecialchars($ip, ENT_QUOTES, "UTF-8");
        $message = "IPアドレス:".$ip_xss;
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
    <p><?= $message ?></p>
</body>
</html>