<?php 
    if(isset($_GET['date1']) && isset($_GET["date2"])){
        $date1 = new DateTime($_GET["date1"]);
        $date2 = new DateTime($_GET["date2"]);

        $diff = $date1 -> diff($date2);

        echo $diff-> days . "日";

    }else{
        echo "日付を指定してください";
    }

?>