<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Документ без названия</title>
</head>

<body>
<?php

if ($_POST["F"]=="" || $_POST['I']=="" || $_POST['P']=="" || $_POST['EMAIL']=="" || ($_POST['pidr'] == 0))
	{
          	echo "<b style=\"color:#F00\">Не введені Призвіще,  Ім'я та По-батькові, E-mail або не вибраний підрозділ!</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php
  	} 
else
	{
//		foreach ($_POST as $key=>$value) 
//			{
//			$_POST[$key] = iconv("windows-1251","UTF-8",$value);
//			}
		$connection = pg_connect("dbname=bezpeka user=bezpeka password=bezpeka22");
		$date_now = time();		
		$login = $_POST['EMAIL'];
		$pos = strpos($_POST['EMAIL'],"@");
		$login = substr($login, 0, $pos); // возвращает "abcd"
		$login = trim($login);
		$result=pg_query($connection, "select * from  users  where login = '$login';");	
		if(pg_num_rows($result) > 0) 
		 {
          	echo "<b style=\"color:#F00\">Користувач з таким EMAIL вже зареестрований!</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php
  		 } 
		else
		 {
		 $users = trim($_POST["F"]) . " " . trim($_POST["I"]) . " " . trim($_POST["P"]);
		 $pidr_id = $_POST['pidr'];
			if (pg_query($connection, "insert into users (login, users, pidr_id, pass) values ('$login', '$users', $pidr_id, '');")) 
				{ 
				echo "<strong>Запис створений, чекайте відповідь з логіном на паролем по електронній пошті!</strong><br><br>";
				
				include('Mail.php');
				$from = "zayavky@ukrtelecom.ua";
				$to = "";
				$result3=pg_query($connection, "select login from  users  where pidr_id = 0;");	
				while ($db3=pg_fetch_array($result3)):
				if ($to != "") $to = $to.",";
				$to = $to.$db3['login']."@ukrtelecom.ua";
				
				endwhile;
				$result3=pg_query($connection, "select * from  pidr  where pidr_id = $pidr_id;");	
				$db3=pg_fetch_array($result3);
				$subject = "Создан логин к Охране труда";
				$body = "\n\nЛогин\n\n".
					   "Юзер - ".$users.
					   "\n\nлогин - ".$login.
					   "\n\nПідрозділ  - ".$db3['pidr'].
					   "\n\nСайт: http://10.80.11.106/bezpeka/adm.php?login=$login ";
				
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
pg_close($connection);
?>


</body>
</html>