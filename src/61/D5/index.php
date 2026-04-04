<?php 
    $dir = __DIR__;

    $forders = scandir($dir);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($forders as $forder): ?>
        <?php if($forder === "." || $forder === ".." ||$forder === "index.php") continue;?>
        <li>
            <?php if(is_file($forder)): ?>
                <a href="<?php "/" . $forder ?>"><?= $forder ?>編集</a>
            <?php endif?>
            <a href="<?php "/" . $forder ?>" onclick="return confirm('削除')">削除</a>
        </li>
    <?php endforeach;?>
</body>
</html>
