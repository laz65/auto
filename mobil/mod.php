<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php

if ($_POST["F"]=="" || $_POST['I']=="" || $_POST['P']=="" || $_POST['EMAIL']=="")
	{
          	echo "<b style=\"color:#F00\">Не введені Призвіще,  Ім'я та По-батькові або E-mail</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php
  	} 
else
	{
		foreach ($_POST as $key=>$value) 
			{
			$_POST[$key] = $value;
			}
		$connection = pg_connect("dbname=auto user=auto password=12345");
		$date_now = time();		
		$login = $_POST['EMAIL'];
		$pos = strpos($_POST['EMAIL'],"@");
		$login = substr($login, 0, $pos); // возвращает "abcd"
		$login = trim($login);
		$result=pg_query($connection, "select * from  user_auto  where login = '$login';");	
		if(pg_num_rows($result) > 0) 
		 {
          	echo "<b style=\"color:#F00\">Користувач з таким EMAIL вже зареестрований!</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php
  		 } 
		else
		 {
		 $user_auto = trim($_POST["F"]) . " " . trim($_POST["I"]) . " " . trim($_POST["P"]);
		 $telefone =trim($_POST["OUTTEL"]);
		 $pidr = trim($_POST["VID"]) . ", " . trim($_POST["SEC"]);
		 $posada = trim($_POST["POS"]);
		 $ip = trim($_POST["NAC"]);
		 $dostup = $_POST["DOSTUP"];
			if (pg_query($connection, "insert into user_auto (login, user_auto, telefone, pidr, dostup, ip, posada) values ('$login', '$user_auto', '$telefone', '$pidr', $dostup, '$ip', '$posada');")) 
				{ 
				echo "<strong>Запис створений,користувач $user_auto добавлений, чекайте відповідь з логіном на паролем по електронній пошті!</strong><br><br><a href = 'index.php'><strong>Подивитись активні заявки на автотранспорт.</strong></a>";
				include('Mail.php');
				$from = "zayavky@ukrtelecom.ua";
				$to = "";
				$result3=pg_query($connection, "select login from  user_auto  where dostup & 4 <> 0  and pass <> '';");	
				while ($db3=pg_fetch_array($result3)):
				if ($to != "") $to = $to.",";
				$to = $to.$db3['login']."@ukrtelecom.ua";
				
				endwhile;
				$subject = "Создан логин к Автобазе";
				$body = "\n".
					   "Юзер - ".$user_auto.
					   "\n\nлогин - ".$login.
					   "\n\nПідрозділ  - ".$pidr.
					   "\n\nПосада - ".$posada.		 
					   "\n\nІм`я компьютера - ".$_POST['NAC'].
					   "\n\nСайт: http://10.80.11.106/auto/adm.php?log=$login ";
				
				$host = "send.ukrtelecom.net";
				$username = "zayavky";
				$password = "P@ssw0rd";
				
				$headers = array ('From' => $from,
				 'To' => $to,
				 'Subject' => $subject);
				$smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
				$mail = $smtp->send($to, $headers, $body);
				


				
				} else echo "<strong>Запис про $login; $pidr; $telefone; $ip не вдалося створити!</strong><br>";
		 }


		
		
	}
?>


</body>
</html>