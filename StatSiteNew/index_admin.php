<?php 
include 'Header_Admin.php'; 
include 'db.php'; 
// Указываем кодировку, в которой будет получена информация из базы
// @mysqli_query ($db, 'set character_set_results = "utf8"');
// Получаем из базы данные, отсортировав их по дате в обратном порядке 
$res = mysqli_query($db, "SELECT * FROM visits ORDER BY date");	
//	$res = mysqli_query($db, "SELECT * FROM visits ORDER BY date DESC LIMIT $interval");
// Вывод строк таблицы в цикле
?>
<h4>Данные посетителя сохраняются только для новой даты или страницы, иначе меняется только количество посещений</h4>
<table class='table' width="98%" cellspacing="1"  cellpadding = "1" border=0>
<tr>
    <th>Дата посещения</th>
    <th>IP Адреса посетителей</th>
	<th>Посещенные страницы</th>
    <th>Просмотров</th>
    <th>Система посетителя</th>	
</tr>

<?php
while ($row = mysqli_fetch_assoc($res))
      {
		echo '<tr>
			     <td>' . $row['date']          . '</td>
			     <td>' . $row['hosts']         . '</td>
			     <td>' . $row['pages']         . '</td>
			     <td>' . $row['views']         . '</td>				 
			     <td>' . $row['client_system'] . '</td>				 
			 </tr>';
	  }
echo '</table>';	  
?>
</body>
</html>

	