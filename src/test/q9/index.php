<?php
    $file = __DIR__ . "/bbs.json";
    $posts = [];
    $error = "";

    if (is_file($file)) {
        $json = file_get_contents($file);
        $decode = json_decode((string)$json, true);
        if (is_array($decode)) {
            $posts = $decode;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"]) && isset($_POST["text"])) {
        $name = trim((string)$_POST["name"]);
        $text = trim((string)$_POST["text"]);

        if ($name === "" || $text === "") {
            $error = "入力されていません";
        } else if (mb_strlen($text) > 100) {
            $error = "テキストは１００文字以内にして下さい";
        } else if (mb_strlen($name) > 40) {
            $error = "名前は４０文字以内にしてください";
        } else {
            $nextId = count($posts) > 0 ? ((int)$posts[0]["id"] + 1) : 1;

            $newpost = [
                "id" => $nextId,
                "name" => $name,
                "text" => $text,
                "date" => date("Y-m-d H:i:s"),
            ];

            array_unshift($posts, $newpost);

            file_put_contents(
                $file,
                json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT),
                LOCK_EX
            );

            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
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
    <?php if ($error !== ""): ?>
        <p><?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <input type="text" name="name">
        <input type="text" name="text">
        <button type="submit">投稿</button>
    </form>

    <hr>

    <?php if (count($posts) === 0): ?>
        <p>投稿はまだありません。</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div>
                <p>名前: <?php echo htmlspecialchars((string)$post["name"], ENT_QUOTES, "UTF-8"); ?></p>
                <p>本文: <?php echo nl2br(htmlspecialchars((string)$post["text"], ENT_QUOTES, "UTF-8")); ?></p>
                <p>日時: <?php echo htmlspecialchars((string)$post["date"], ENT_QUOTES, "UTF-8"); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>