<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php


if ($_POST["F"]=="" || $_POST['I']=="" || $_POST['P']=="" || $_POST['Z']=="")
	{
          	echo "<b style=\"color:#F00\">Не введені Призвіще,  Ім'я та По-батькові або E-mail</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php
  	} 
else
	{
		echo "probe";
		
	}
?>


</body>
</html>