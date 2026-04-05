<?
    /*$color = "white";
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["color"])){
        $color = $_POST["color"];
    }
    echo $color;*/

    $color = "white";

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["color"])){
        $color = $_POST["color"];
    }
    echo $color;
?>

<style>
    body{
        margin: 0;
        background-color: <?= $color ?>;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <div>Choose a background color: <input type="color" name="color" value="<?= $color ?>"></div>
        <button type="submit">決定</button>
    </form>
</body>
</html>