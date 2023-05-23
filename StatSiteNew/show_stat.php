<?php 
$res =array();
include 'db.php';
$date = date("Y-m-d");
### показывает только общее количество посещений сегодня 
// Указываем кодировку, в которой будет получена информация из базы
@mysqli_query ($db, 'set character_set_results = "utf8"');
// Извлекаем статистику
$res = mysqli_query($db, "SELECT views FROM visits WHERE date='$date' AND pages='$page'");
//$res = mysqli_query($db, "SELECT views, hosts FROM visits WHERE date='$date'");
$row = mysqli_fetch_assoc($res);
echo "<p>Просмотров страницы $page сегодня: " . $row['views'] . '</p>';
$res = mysqli_query($db, "SELECT SUM(views) FROM 'visits'");
?>
	