<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

$service = "Охорона праці"; // В лапки замість "Зразок" вписати назву сервісу
 
echo "<title>Підключення до $service</title>";

include ("head.php");
include ("import_ad.php");



echo $back;
if($EMAIL)
{
?>
<form method="POST" action="//10.80.11.106/mobil/bezpek_base.php">
<?php
include "forma_bezpeka.php"; 
?>
<p><br>
  <input type="hidden" name="IP"  <?php  $ip=getenv ("REMOTE_ADDR"); echo "value=\"$ip\""; ?>>
</p>
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


