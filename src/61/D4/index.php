<?php 
    $result = "";
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $text = $_POST["text"];
        $result = preg_replace('/[0-9]/','',$text);
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
    <form action="" method="post">
        <input type="text" name="text" >
        <button type="submit"></button>
    </form>
    <div><?= $result ?></div>
</body>
</html>