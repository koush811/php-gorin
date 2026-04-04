<? 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $r = $_POST["color1"];
        $g = $_POST["color2"];
        $b = $_POST["color3"];

        if($r < 0 || $r > 255 ||$g < 0 || $g > 255 || $b < 0 || $b > 255){
            echo "エラー";
        }else{
            echo sprintf("#%02X#%02X#%02X", $r, $g, $b);
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
    <form action="" method="post">
        <input type="number" name="color1" id="">
        <input type="number" name="color2" id="">
        <input type="number" name="color3" id="">
        <button type="submit"></button>
    </form>
</body>
</html>