<?php 
    /*if(file_exists($file)){
        $json = file_get_contents($file);
        $posts = json_decode($json, true);

        if(!is_array(($posts))){
            $posts = [];
        }
    }else{
        $posts = [];
    }

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $name = $_POST["name"];
        $message = $_POST["message"];

        $newpost = [
            "name" => $name,
            "message" => $message,
            "time" => date("Y-m-d H:i:s")
        ];
        array_unshift($posts,$newpost);
    
        file_put_contents($file,json_encode($posts,JSON_PRETTY_PRINT));

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
    */
    
    $file = "bbs.json";

    if(file_exists($file)){
        $json = file_get_contents($file);
        $posts = json_decode($json, true);
        if(!is_array($posts)){
            $posts = [];
        }
    }else{
        $posts = [];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $message = $_POST["message"];

        $newpost = [
            "name" => $name,
            "message" => $message,
            "time" => date("Y-m-d H:i:s"), 
        ];

        array_unshift($posts,$newpost);

        file_put_contents($file,json_encode($posts,JSON_PRETTY_PRINT));

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

<style>
    form{
        padding: 10px;
        width: 100%;
        border-bottom: solid 1px black;
    }
    .area{
        display: flex;
    }
    .name{
        font-weight: 1000;
    }
</style>

<body>
    <form method="post" class="form">
        <p>Name:<input type="text" name="name" required></p>
        <p>Message:<input type="text" name="message" required></p>
        <button type="submit">Post</button>
    </form>

    <?php 
        foreach($posts as $post):
    ?>

        <div>
            <div class="area">
                <div class="name"><?= $post["name"] ?></div>
                <div>(<?= $post["time"] ?>)</div>
            </div>
            <div><?= $post["message"] ?></div>
        </div>

    <?php endforeach;?>
</body>
</html>