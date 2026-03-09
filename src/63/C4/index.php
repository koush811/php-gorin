<?php
$file = "bbs.json";
$error = "";

if (file_exists($file)) {
    $json = file_get_contents($file);
    $posts = json_decode($json, true);
    if (!is_array($posts)) {
        $posts = [];
        
    }
} else {
    $posts = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["delete"])) {
        $number = $_POST["delete"];

        unset($posts[$number]);

        file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));

        header("Location:" . $_SERVER["PHP_SELF"]);
        exit;
    }

    
    $name = $_POST["name"];
    $message = $_POST["message"];
    
    if($name === "" || $message === ""){
        $error = "入力しろ";
    }else{
        $newpost = [
            "name" => $name,
            "message" => $message,
            "time" => date("Y-m-d H:i:s"),
        ];
    }

    array_unshift($posts, $newpost);

    file_put_contents($file, json_encode($posts, JSON_PRETTY_PRINT));

    header("Location:" . $_SERVER["PHP_SELF"]);
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
    body{
        max-width: 100%;
    }
    form {
        padding: 10px 0px;
        width: 100%;
        border-bottom: solid 1px black;
    }
    .area button{
        border: none;
        background-color: lightgray;
        padding: 5px;
        border-radius: 3px;
    }
    .area button:hover{
        background-color: orange;
    }
    .name {
        font-weight: 1000;
    }
    

</style>

<body>
    <?php if($error): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <form method="post" class="form">
        <p>Name:<input type="text" name="name" required></p>
        <p>Message:<input type="text" name="message" required></p>
        <button type="submit">Post</button>
    </form>

    <?php
    foreach ($posts as $index => $post):
    ?>
        <div class="area">
            <div class="name"><?= htmlspecialchars($post["name"]) ?></div>
            <div>(<?= htmlspecialchars($post["time"]) ?>)</div>
            <div><?= htmlspecialchars($post["message"]) ?></div>
            <form method="post">
                <button type="submit" name="delete" value=<?= $index ?>>削除</button>
            </form>
        </div>

    <?php endforeach; ?>
    
</body>

</html>