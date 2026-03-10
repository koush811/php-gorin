<?php 
    $file = "d3.json";
    $json = file_get_contents($file);
    $data = json_decode($json, true);

    if(isset($_POST["export"])){
        header("Content-Type: text/csv;");
        header("Content-Disposition: attachment; filename=d3.csv");
        //CSVファイルとしてダウンロードさせる
        $fp = fopen("php://output", "w");

        fputcsv($fp, array_keys($data[0]));
        //fputcsv:配列をCSV形式で書き込む関数
        foreach($data as $dev){
            fputcsv($fp,$dev);
        }

        fclose($fp);
        //CSV書き込み終了
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
<body>
    <h1>CSV</h1>
    <table>
        <tr>
            <?php 
                foreach(array_keys(($data[0])) as $key){
                    echo "<th>$key</th>";
                }
            ?>
        </tr>
        
        <?php 
            foreach($data as $dev){
                echo "<tr>";
                foreach($dev as $value){
                    echo "<td>$value</td>";
                }
                echo "<tr>";
            }
        ?>
    </table>
    <form method="post">
        <button type="submit" name="export">エクスポート</button>
    </form>
</body>
</html>