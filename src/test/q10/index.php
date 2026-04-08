<?php 

$data = [];
if (($handle = fopen("items.csv", "r")) !== false) {
    while (($row = fgetcsv($handle)) !== false) {
        $data[] = $row;
    }
    fclose($handle);
}


$perPage = 10;
$total = count($data);
$totalPages = ceil($total / $perPage);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

$start = ($page - 1) * $perPage;
$items = array_slice($data, $start, $perPage);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ページネーション</title>
<style>
table { border-collapse: collapse; }
td, th { border: 1px solid #000; padding: 5px; }
.pagination a { margin: 0 5px; }
.current { font-weight: bold; }
</style>
</head>
<body>

<h2>商品一覧</h2>

<table>
<tr>
<?php foreach ($header as $col): ?>
    <th><?= htmlspecialchars($col) ?></th>
<?php endforeach; ?>
</tr>

<?php foreach ($items as $row): ?>
<tr>
    <?php foreach ($row as $cell): ?>
        <td><?= htmlspecialchars($cell) ?></td>
    <?php endforeach; ?>
</tr>
<?php endforeach; ?>
</table>

<div class="pagination">

<?php if ($page > 1): ?>
    <a href="?page=<?= $page - 1 ?>">前へ</a>
<?php endif; ?>

<?php for ($i = 1; $i <= $totalPages; $i++): ?>
    <?php if ($i == $page): ?>
        <span class="current"><?= $i ?></span>
    <?php else: ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($page < $totalPages): ?>
    <a href="?page=<?= $page + 1 ?>">次へ</a>
<?php endif; ?>

</div>

</body>
</html>