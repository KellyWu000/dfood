<?php
require __DIR__ . '/partial/init.php';

header('Content-Type: application/json');


$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
    'rowCount' => 0,
    'postData' => $_POST,
];

if (mb_strlen($_POST['res_name']) === 0) {
    $output['error'] = '此欄位為必填欄位';
    $output['code'] = 401;
    echo json_encode($output);
    exit;
}





$sql = "INSERT INTO `restaurants`(
`res_name`,`res_production`,`res_tel`,
`res_starthour`, `res_endhour`,`res_address`, `res_price`,`res_rate`
    
    ) VALUES (
      ?, ?, ?, ?, 
      ?, ?, ?, ?
    )";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['res_name'],
    $_POST['res_production'],
    $_POST['res_tel'],
    $_POST['res_starthour'],
    $_POST['res_endhour'],
    $_POST['res_address'],
    $_POST['res_price'],
    $_POST['res_rate'],
]);

$output['rowCount'] = $stmt->rowCount(); 
if ($output['rowCount'] == 1) {
    $output['success'] = true;
}

echo json_encode($output);
