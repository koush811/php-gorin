<?php 
    $size = 8;

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["size"])){
        $size = $_POST["size"];
    }
?>

<style>
    body{
        height: 100vh;
    }
    td{
        width: 100px;
        height: 100px;
    }
    .black{
        background-color: black;
    }
    .while{
        background-color: white;
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
    <h1>サイズ：<?php echo $size ."×". $size ?></h1>
    <table>
        <?php for($row = 0; $row < $size; $row++){
            echo "<tr>";
            for($col = 0; $col < $size; $col++){
                if(($row + $col) % 2 == 0){
                    echo "<td class='black'></td>";
                }else{
                    echo "<td class='white'></td>";
                }
            }
            echo "</tr>";
        }?>
    </table>
    <form method="post">
        <input type="number" name="size">
        <button type="submit">適用</button>
    </form>
    
</body>
</html>