<?php 
    $numbers = [3,3,1,1,1,2,3];
    $count=[];
    foreach($numbers as $number){
        if(isset($count[$number])){
            $count[$number]++;
        }else{
            $count[$number] = 1;
        }
    }

    $max = 0;
    $answer = null;

    foreach($count as $key => $number){
        if($number > $max){
            $max = $number;
            $answer = $key;
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
    <?php foreach($numbers as $value): ?>
        <p><?= $value ?></p>
    <?php endforeach; ?>
    <p>最頻値:<?= $answer ?></p>
</body>
</html>