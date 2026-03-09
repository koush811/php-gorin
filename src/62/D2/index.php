<?php 
    
    $name = "";
    $mail = "";
    $message = "";
    $list = null;
    $filePath = __DIR__ . "/d2.json";
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["mail"])&& isset($_POST["message"])){
        $name = $_POST["name"];
        $mail = $_POST["mail"];
        $message = $_POST["message"];

        $list = [
            "name" => $name,
            "mail" => $mail,
            "message" => $message,
        ];
        
        // JSONファイルに保存
        $existingData = [];
        if (file_exists($filePath) && filesize($filePath) > 0) {
            $existingData = json_decode(file_get_contents($filePath), true);
            if (!is_array($existingData)) {
                $existingData = [];
            }
        }
        $existingData[] = $list;
        file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
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
    <h1>JSON変換</h1>
    <form method="post">
        <input type="text" name="name">
        <input type="text" name="mail">
        <input type="text" name="message">
        <button type="submit">送信</button>
    </form>
    <?php 
        echo json_encode($list, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    ?>

</body>
</html>