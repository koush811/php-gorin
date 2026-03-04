<?php 

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["color"])){
        $color = $_POST["color"]; 
    }

?>

<style>
    body{
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
        <p>Choose a background color:
            <input type="color" 
                name="color" 
                id=""
                value="<?= $color ?>"
            >
            <button type="submit">Set Color</button>
        </p>
    </form>
</body>
</html>