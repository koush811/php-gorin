<?php 
    $file = "bbs.json";
    $error = "";

    if(file_exists($file)){
        $json = file_get_contents($file);
        $posts = json_decode($json,true);
        if(!is_array($posts)){
            $posts = [];
        }
    }else{
        $posts = [];
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"]) && isset($_POST["message"])){
        $name = $_POST["name"];
        $message = $_POST["message"];
        if($name === "" || $message === ""){
            $error = "エラー";
        }else{
            $newpost = [
                "name" => $name,
                "message" => $message,
                "time" => date("Y-m-d H:i:s"),
            ];
            array_unshift($posts, $newpost);

            file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));

            header("Location:" . $_SERVER["PHP_SELF"]);
            exit;
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
    <?= $error ?>
    <form action="" method="post">
        <p>Name: <input type="text" name="name"></p>
        <p>message: <input type="text" name="message"></p>
        <button type="submit">Post</button>
    </form>
    <?php foreach($posts as $post): ?>    
        <div class="area">
            <div><?php echo htmlspecialchars($post["name"]) ?></div>
            <div>(<?php echo htmlspecialchars($post["time"])?>)</div>
            <div><?php echo htmlspecialchars($post["message"]) ?></div>
        </div>
    <?php endforeach; ?>
</body>
</html>