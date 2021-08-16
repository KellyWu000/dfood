<?php
require __DIR__. '/partial/init.php';

$stmt=$pdo->query('SELECT * FROM restaurant');

while($r=$stmt->fetch()){
    echo "<p>{$r['sid'] }:{$r['res_name']}</p>";
}

echo json_encode($stmt->fetch());
