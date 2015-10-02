<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="scripts/css/ui-lightness/jquery-ui-1.8.17.custom.css" media="screen" type="text/css" rel="stylesheet">




 <table>
	<tr>
	  <td><h2>Заявка на підключення до сервісу  <?php echo $service; ?><br>
      </h2></td>
	</tr>
</table>
<?php
$F = iconv("Windows-1251","Utf-8",$F);
$I = iconv("Windows-1251","Utf-8",$I);
$P = iconv("Windows-1251","Utf-8",$P);
?>
<table border=1>
	<tr>
		<td>Прізвище</td>
		<td><input name="F" type="text" value="<?php echo $F; ?>"></td>
	</tr>
    <tr>
		<td>Ім'я</td>
		<td><input name="I" type="text" value="<?php echo $I; ?>"></td>
	</tr>
	<tr>
		<td>По батькові</td>
		<td><input name="P" type="text" value="<?php echo $P; ?>"></td>
	</tr>

</table>
<p>E-mail:
<input name="EMAIL" type="text" value="<?php echo $EMAIL; ?>" size="50">&nbsp;</p>
<p>
  <?php

$connection = pg_connect("host=10.80.11.106 port=5432 dbname=bezpeka user=bezpeka password=bezpeka22");
?>
  Підрозділ:
  <select name="pidr" id="pidr">
    <?php

$result2=pg_query($connection, "select * from pidr order by nomer");
echo "<option value=0>Виберіть підрозділ</option>";
while($db2=pg_fetch_array($result2)):
$spi = $db2['pidr'];
 $nspi=$db2['pidr_id'];
if($nspi == $pidr_id) 
{
 echo "<option value='$nspi' selected='selected'>$spi</option>";
} 
else 
{
 echo "<option value='$nspi'>$spi</option>";
};
endwhile;
?>
  </select>
  <br>
  
  </table>
<input type="hidden" name="posted" value="1">
<?php
pg_close($connection);
?>
</p>
<hr />