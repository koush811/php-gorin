<?php 
    header("Content-Type: application/json");

    $dev = [
        "status" => "success",
        "message" => "あああ",
        "timestamp" => date("Y-m-d H:i:s"),
        "data" => "item1",
    ];

    echo json_encode($dev, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>