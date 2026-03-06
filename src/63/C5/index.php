<?php 
    header("Content-Type: application/jaon");

    $dev = [
        "status" => "success",
        "message" => "Hello",
        "timestamp" => date("Y-m-d H:i:s"),
        "data" => "item1",
    ];

    echo json_encode($dev, JSON_PRETTY_PRINT);
?>