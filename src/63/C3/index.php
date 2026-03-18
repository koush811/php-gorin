<?php 
    $values = [
        [
            "id" => 1,
            "name" => "John Doe",
            "email" => "john@example.com"
        ],
        [
            "id" => 2,
            "name" => "Jane Smith",
            "email" => "jane@example.com"
        ],
        [
            "id" => 3,
            "name" => "Peter Jones",
            "email" => "peter@example.com"
        ]
    ]
?>

<style>
    table{
        border-collapse: collapse;
    }
    th,td{
        border: solid 1px black;
        box-sizing: border-box;
        padding: 10px;
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
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>

        <?php foreach($values as $value): ?>
            <tr>
                <td><?= $value["id"] ?></td>
                <td><?= $value["name"] ?></td>
                <td><?= $value["email"] ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>
</html>

