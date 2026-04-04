<?php 
    $dir = __DIR__;

    if(!isset($_GET['file'])){
        echo "ファイルなし";
        exit;
    }

    $file = realpath($_GET['file']);

    if($_SERVER["REQURST_METHOD"] === "POST"){
        file_put_contents($file, $_POST["content"]);
        header('Location:index.php');
    }

    $content = file_get_contents($file);

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
        <textarea name="content" rows="20" cols="80">
            <?php echo htmlspecialchars($content) ?>
        </textarea>
        <button type="submit">保存</button>
    </form>

    <p><a href="index.php">戻る</a></p>
</body>
</html>