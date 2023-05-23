<?php include 'db.php';

// Кодировка данных из базы
@mysqli_query ($db, 'set character_set_results = "utf8"');
// IP-адрес посетителя, дата, а можно и время сделать
$visitor_ip    = $_SERVER['REMOTE_ADDR'];
$date          = date("Y-m-d");
$client_system =  $_SERVER['HTTP_USER_AGENT'];
//print '$client_system='.$client_system;
//$page = $_SERVER['REQUEST_URI'];
//print '$page='.$page;
// Узнаем, были ли посещения
$res = mysqli_query($db, "SELECT visit_id FROM visits WHERE date='$date'") or die ("Проблема при подключении к БД");
// Если еще не было посещений 
if (mysqli_num_rows($res) == 0)
{   print 'Если еще не было посещений'; 
    $res_count = mysqli_query($db, "INSERT INTO visits (date,hosts,pages,views,client_system) VALUES ('$date','$visitor_ip','$page','1','$client_system')"); 
//    $res_count = mysqli_query($db, "INSERT INTO visits SET date='$date', hosts=$visitor_ip,views=1"); 	
}	
else
{
 // посетитель был сегодня или нет
 $res = mysqli_query($db, "SELECT hosts FROM visits WHERE hosts='$visitor_ip' AND date='$date'") or die ("Проблема при подключении к БД");
 // этого посетителя сегодня не было, заносим дату, хост, страницу и visit=1
 if (mysqli_num_rows($res) == 0){
    print 'этого посетителя сегодня не было, заносим дату, хост и visit=1';	 
    $res_count = mysqli_query($db, "INSERT INTO visits (date,hosts,pages,views,client_system) VALUES ('$date', '$visitor_ip', '$page','1',$client_system) "); 	 
//	$res_count = mysqli_query($db, "INSERT INTO visits SET date='$date', hosts='$visitor_ip',views=1"); 
 // сегодня был, тогда меняем его счетчик +1
 }
 else {
       // сегодня эту страницу не посещал
       $res = mysqli_query($db, "SELECT pages FROM visits WHERE hosts='$visitor_ip' AND date='$date' AND pages='$page'") or die ("Проблема при подключении к БД");
	   if (mysqli_num_rows($res) == 0){ print 'НА ЭТОЙ СТРАНИЦЕ СЕГОДНЯ НЕ БЫЛ'; 
	   $res_count = mysqli_query($db, "INSERT INTO visits (date,hosts,pages,views,client_system) VALUES ('$date','$visitor_ip','$page','1','$client_system')"); 
       }	   
       mysqli_query($db, "UPDATE visits SET views=views+1 WHERE hosts='$visitor_ip' AND date='$date' AND pages='$page'");
 }
}
?>


	