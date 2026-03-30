<?php 
    $host = "mariadb";
    $dbname = "test_db";
    $user = "root";
    $pass = "root";

    $keyword = $_GET["keyword"] ?? "";

    $error = "";
    $results = [];

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);

        if($keyword === ""){
            $error = "入力しろ";
        }else{
            $sql = "SELECT * FROM test WHERE name LIKE :keyword";
            $stmt = $pdo->prepare($sql);

            $stmt -> bindValue(":keyword","%". $keyword . "%" , PDO::PARAM_STR);
            $stmt ->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
    }catch (PDOException $e){
        $error = $e->getMessage();
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
    <form method="get">
        <input type="text" name = "keyword" placeholder="キーワード入力">
        <button type="submit">検索</button>
    </form>

    <?php if($error):  ?>
        <p><?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?></p>

    <?php elseif($keyword !== ""): ?>
        <?php if(count($results)> 0):  ?>
            <ul>
                <?php foreach($results as $row): ?>
                    <li>
                        <?php echo htmlspecialchars($row["name"],ENT_QUOTES,"UTF-8"); ?>

                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>データないよ</p>
        <?php endif; ?>

    <?php endif; ?>
    
</body>
</html>