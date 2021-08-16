<?php
require __DIR__. '/partial/init.php';


$sid=isset($_GET['sid']) ? intval($_GET['sid']) : 0 ;

if(!empty($sid)){
$sql="DELETE FROM `restaurants` WHERE sid=$sid";

$stmt=$pdo->query($sql);

}
if(isset($_SERVER['HTTP_REFERER'])){
    header('Location: '.$_SERVER['HTTP_REFERER']);

}else{
    header('Location: res-datalist.php');
}

?>