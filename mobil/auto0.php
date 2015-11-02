<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="zayavki.css" type="text/css">
<?php

$service = "Використання службового автотранспорту"; // В лапки замість "Зразок" вписати назву сервісу
 
echo "<title>Підключення до $service</title>";

include ("import_ad.php");


if($EMAIL)
{
?>
<form method="POST" action="mod0.php">
<?php
//include "forma.php"; 
?>


 <table>
	<tr>
	  <td><h2>Заявка на підключення до сервісу  <?php echo $service; ?><br><br>
      </h2></td>
	</tr>
</table>

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

<br>



<table>
	<tr>
		<td>Підрозділ</td>
		<td><input name="VID" type="text" id="search" value="<?php echo $VID,", ",$SEC; ?>" size="90"></td>
	</tr>

	<tr>
		<td>Посада</td>
		<td><input name="POS" type="text" id="search" value="<?php echo $POS; ?>"size="90"></td>
	</tr>
	<tr>
		<td>Адреса</td>
		<td><input type="text" name="ADR" value="<?php echo $ADR; ?>"  size="90"></td>
	</tr>

	<tr>
		<td>Номери телефонів</td>
		<td><input name="OUTTEL" type="text" value="<?php echo $PHONE; ?>"  size="90"></td>
	</tr>
<tr>
		<td>Електронна адреса</td>
		<td><input name="EMAIL" type="text" value="<?php echo $EMAIL; ?>" size="50"></td>
	</tr>

</table>
<p><br>
  

<input type="hidden" name="posted" value="1">
<?php if($login) { ?>

<input type="checkbox" name="ERR" id="ERR" />
<strong style="color:#F00">В автозаповнених даних  виявлені і виправлені мною неточності <br>(поставити галку, щоб сповістити адміністратора про це для подальшого виправлення)</strong>
<?php } ?>
<hr />


<p><br>
  <input type="hidden" name="IP"  <?php  $ip=getenv ("REMOTE_ADDR"); echo "value=\"$ip\""; ?>>
  Права, якими необхідно наділити користувача:
</p>
<p>
  <input name="DOSTUP" type="radio" id="DOSTUP" value="0" checked="checked" />
Створення заявок (звичайний користувач)</p>
<p>
  <input name="DOSTUP" type="radio" id="DOSTUP2" value="16" />
Створення заявок на чергову машину без погодження (керівники)</p>
<p>
  <input name="DOSTUP" type="radio" id="DOSTUP3" value="2" />
  <label for="DOSTUP"></label>
Працівник автобази (редагування машин, водіїв, відправлення машини, водія)</p>
<p>&nbsp;</p>
<p><br>
  
  </table>
  
  
  
  
  <br>
  <input type="hidden" name="posted" value="1">
  
  <input type="submit" value="Створити заявку">
</p>
</form>
<?php 

}


?>


