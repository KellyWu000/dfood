<?php
require __DIR__. '/partial/init.php';

$stmt=$pdo->query('SELECT * FROM restaurant');

echo json_encode($stmt->fetch(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
?>
