<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<strong>
  <?php
$connection = pg_connect("dbname=auto user=auto password=12345");
$date_now = time();										  
$result=pg_query($connection, "select * from auto a, user_auto u where a.data_prib > $date_now and a.podav = u.user_auto order by a.data_otpr ;");	
//$result=pg_query($connection, "select * from auto where data_prib > $date_now ");
?>
<a href="http://10.80.11.106/auto">Перехід на сайт для роботи з заявками</a>&nbsp;&nbsp;&nbsp;
<a href="http://10.80.11.106/mobil/auto.php">Підключення до системи "Використання службового автотранспорту"</a>

<h2 align="center"><strong>Перелік заявок на автотранспорт в Черкаській філії:</strong>
</h2>
  <table width="100%" border="1">
  <tr>
	  <td bgcolor="#66CCCC"><div align="center">Машина</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата виїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата приїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Хто подав заявку </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пункти призначень та мета </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Водій</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Стан</div></td>
	</tr>
<?php
while ($db=pg_fetch_array($result)):
?>
	<tr
<?php 
	if($db['stan'] == "Затверджено") echo " bgcolor=\"#FFFF99\""; 
	if($db['stan'] == "Погоджено") echo " bgcolor=\"#FFFFCC\""; 
	if($db['stan'] == "Відмовлено") echo " bgcolor=\"#999999\""; 
	if($db['stan'] == "Затверджено, пог. з автобазою") echo " bgcolor=\"#99FFFF\""; 
	if($db['stan'] == "Затверджено, док. підписані") echo " bgcolor=\"#99FF99\""; 
	if($db['stan'] == "Погоджено, пог. з автобазою") echo " bgcolor=\"#CCFFFF\""; 
	if($db['stan'] == "Погоджено, док. підписані") echo " bgcolor=\"#CCFFCC\""; 
	if(($db['stan'] == "Не потребує затвердження") | ($db['stan'] == "Не потребує погодження")) echo " bgcolor=\"#AAFFAA\""; 
?>  	

	>
	  <td><?php echo $db['mobil']; ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_otpr']); ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_prib']); ?>&nbsp;</td>
	  <td><?php echo $db['podav'], " ,", $db['pidr'], " тел:", $db['telefone'] ; ?>&nbsp;</td>
	  <td><?php echo $db['punkty'],", ",$db['meta']; ?>, пасажирів: <?php echo $db['passk']; ?></td>
	  <td><?php echo $db['vodiy']; ?>&nbsp;</td>
	  <td><?php echo $db['stan']; ?>&nbsp;
	  <?php
	  if (($db['vodiy'] != 'Не визначено') & ($db['stan'] == 'Затверджено'))
	  {
?>
	  <br>
	    
<?php
		}
?>

	  
	  </td>
	</tr>
<?php
endwhile;
?>
  </table>
<?php


pg_close($connection);
?>
</body>
</html>