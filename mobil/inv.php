<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<p><strong>
<?php
$connection = pg_connect("dbname=invent user=invent password=invent22");
$centry_id = $_GET['centry_id'];
?>
  <select name="tovary" id="tovary" onchange="top.location.href = 'inv.php?centry_id='+this.options[this.selectedIndex].value;">
    <?php

$result3=pg_query($connection, "select * from centry order by sklad;");
echo "<option value=0>Виберіть підрозділ для фільтру (зараз всі підрозділи)</option>";
while($db3=pg_fetch_array($result3)):
$spi=$db3['centry_id'];
 $nspi=$db3['sklad']." - ".$db3['nameuser'];
if($spi == $centry_id) 
{
	$centr = $db3['centr'];
	$centr_id = $spi;
	$sklad = $db3['sklad'];
	$nameuser = $db3['nameuser'];
 echo "<option value='$spi' selected='selected'>$nspi</option>";
} 
else 
{
 echo "<option value='$spi'>$nspi</option>";
};
endwhile;
?>
  </select>
<?php
echo "<br>Підрозділ: $centr";
?>  
</strong></p>
<table width="100%" border="1">
  <tr>
    <td align="center"><h3>№ п/п</h3></td>
    <td align="center"><h3>Назва та код товару</h3></td>
    <td align="center"><h3>Кількість внесених товарів<br>
      всього - 
  <?php
       if ($centry_id == 0)
   $result2=pg_query($connection, "select invent_id from invent;");   
   else
   $result2=pg_query($connection, "select invent_id from invent where centry_id = $centry_id;");
   echo pg_num_rows($result2);
?>
    </h3></td>
    <td align="center"><strong>Всього по обліку</strong></td>
  </tr>
<?php
$result=pg_query($connection, "select * from tovar order by tovar");
$nomer = 0;
while ($db=pg_fetch_array($result)):	
$tovar_id = $db['tovar_id']; 
   if ($centry_id == 0 || $centry_id == '')
   {
   		$result2=pg_query($connection, "select invent_id from invent where tovar_id = $tovar_id;"); 
  		$result3=pg_query($connection, "select kilk from kilk where tovar_id = $tovar_id;");
		$kilk = 0;
   		while ($db3=pg_fetch_array($result3))
		{
			$kilk = $kilk + $db3['kilk'];
		}
  
   }
   else
   {
   		$result2=pg_query($connection, "select invent_id from invent where centry_id = $centry_id and tovar_id = $tovar_id;");
   		$result3=pg_query($connection, "select kilk from kilk where centry_id = $centry_id and tovar_id = $tovar_id;");
   		$db3=pg_fetch_array($result3);	
		$kilk = $db3['kilk'];
   }
if(pg_num_rows($result2) != 0 || $kilk != 0)
{
?>
  <tr>
    <td align="center"><?php echo ++$nomer; ?></td>
    <td align="center"><?php echo $db['tovar']," (",$db['namefile'],")";  ?></td>
    <td align="center">
   <?php
   echo pg_num_rows($result2);
   ?> 
    </td>
    <td align="center">
    <?php
		echo $kilk;	  	

	?>
    
    &nbsp;</td>
  </tr>
  
 <?php
}
 endwhile;
 ?>
</table>
<p>&nbsp;</p>
<?php
pg_close($connection); 
?>
  

</body>
</html>