<?php 
######################################################################
# поиск по нескольким ключам - дата, IP-Адрес, наименование страницы #
######################################################################
include 'Header_Admin.php';                     // заголовок панели управления
include 'db.php';                               // параметры соединения с базой
# 
$print           = 'NO';
if ($_GET[FormType])
$FormType     = $_GET[FormType];                // имя таблицы базы данных
#

if     (!($_POST["date"]))                      // можно сокращенно >=3 символа
        $KeyValue1    = '%';                    // может быть пустым   
else                                            
       {
       	$KeyValue1    = trim($_POST["date"]);
       	$KeyValue1    = '%'.$KeyValue1.'%'; 
       }
/*
print '<br>$date ='.$date ;
print '<br>$hosts='.$hosts;
print '<br>$pages='.$pages;
*/
if     (!($_POST["hosts"]))                     // IP
       $KeyValue2    = '%';                     // да или нет  
else                                            // может быть пустым
       {
       	$KeyValue2    = trim($_POST["hosts"]);
       	$KeyValue2    = '%'.$KeyValue2.'%'; 
       }
#
if     (!($_POST["pages"]))  
       $KeyValue3     = '%';
else   
       {
       	$KeyValue3    = trim($_POST["pages"]);   // может быть пустым
       	$KeyValue3    = '%'.$KeyValue3.'%';      // 
       }
 ### форма поиска не заполнена ###  
if (($KeyValue1=="%")&&($KeyValue2=="%")&&($KeyValue3=="%"))
   {
	$msg1  ='Ошибка! Введите данные для поиска.'; 
	header("Location: Entry_Search.php?FormType=$FormType&msg1=$msg1");   
	exit;
   }
# поиск по нескольким ключам
else
   { 
   	 $KeyName1  =  'date';
   	 $KeyName2  =  'hosts'; 
   	 $KeyName3  =  'pages';
	 $res = mysqli_query($db,"SELECT * FROM  $FormType  
	                                      WHERE $KeyName1 LIKE '$KeyValue1'
                                          AND   $KeyName2 LIKE '$KeyValue2'
                                          AND   $KeyName3 LIKE '$KeyValue3'											  
	                                      ORDER BY $KeyName1 ");	                                      

   }
 ### таких данных нет в базе данных ###  
if ($res->num_rows > 0)
{	
   $NC    =  mysqli_num_rows($res);
   //print    'НАЙДЕНО '.$NC.' ЗАПИСЕЙ В БАЗЕ ДАННЫХ';
   //$rows  =  mysqli_fetch_array($res);
   //print    '<pre>'; print_r($rows); print '</pre>'; 
}
else 
   {
	$msg1  ='Запись не найдена в таблице';
	header("Location: Entry_Search.php?FormType=$FormType&msg1=$msg1");  
	exit;
   }
  
?>
<h4>РЕЗУЛЬТАТ ПОИСКА</h4>
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
#        
?>
</body>
</html>