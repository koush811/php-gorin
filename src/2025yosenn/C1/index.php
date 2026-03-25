<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $file = $_FILES["csv"];

        $ext = pathinfo($file["name"],PATHINFO_EXTENSION);

        if($ext !== "csv"){
            echo "<p>CSVファイルじゃない</p>";
            exit;
        }

        $count = 0;
        $sum = 0;

        if(($handle = fopen($file["tmp_name"],"r")) !== false){
            while (($data = fgetcsv($handle)) !== false){
                $count++;

                foreach($data as $value){
                    if (is_numeric($value)){
                        $sum += $value;
                    }
                }
            }
            fclose($handle);
        }


        echo "<p>行数:{$count}</p>";
        echo "<p>合計:{$sum}</p>";
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
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv" required>
        <button type="submit">アップロード</button>
    </form>
    
</body>
</html>