<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Додавання користувача до системи сер ном</title>
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
	if (strlen($_POST['sklad']) != 6)
	{
		echo "<b style=\"color:#F00\">Введіть ШЕСТИЗНАЧНИЙ код складу!!!</b><br><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php

	}
	else
	{
		foreach ($_POST as $key=>$value) 
			{
			$_POST[$key] = iconv("windows-1251","UTF-8",$value);
			}
		$connection = pg_connect("dbname=invent user=invent password=invent22");
//		$date_now = time();		
		$login = $_POST['EMAIL'];
		$pos = strpos($_POST['EMAIL'],"@");
		$login = substr($login, 0, $pos); // возвращает "abcd"
		$login = trim($login);
		$result=pg_query($connection, "select * from  centry where login = '$login';");	
		if(pg_num_rows($result) > 0) 
		 {
          	echo "<b style=\"color:#F00\">Користувач з таким EMAIL вже зареестрований!</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
?>
	   <META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
<?php
  		 } 
		else
		 {
			 $sklad = $_POST["sklad"];
			 $result3=pg_query($connection, "select * from  centry where sklad = '$sklad';");	
			 if(pg_num_rows($result3) > 0) 
			 {
				$db3 = pg_fetch_assoc($result3); 
          		echo "<b style=\"color:#F00\">На цьому складі вже зареестрований користувач  $db3[nameuser] для роботи заходьте під його логіном!</b><br><a href = javascript:history.back(1)><strong>НАТИСНІТЬ ЩОБ ПОВЕРНУТИСЯ НАЗАД ДО ЗАПОВНЕНОЇ ЗАЯВКИ!!!</strong></a>";
	   
				?>
	   			<META HTTP-EQUIV="Refresh" content ="2; URL='javascript:history.back(1)'">
				<?php
				 
			 }
			 else
			 {
				 $nameuser = trim($_POST["F"]) . " " . trim($_POST["I"]) . " " . trim($_POST["P"]);
		//		 $telefone =trim($_POST["OUTTEL"]);
				 $centr = trim($_POST["VID"]) . ", " . trim($_POST["GROUP"]);
				 $centr = strtr($centr,"'","`") ;
				 $centr = strtr($centr,"\"","`") ;
		//		 $posada = trim($_POST["POS"]);
				 $ip = trim($_POST["NAC"]);
				 $dostup = $_POST["DOSTUP"];
					if (pg_query($connection, "insert into centry (centr, nameuser, login, sklad) values ('$centr', '$nameuser', '$login', '$sklad');")) 
						{ 
						echo "<strong>Запис створений, чекайте відповідь з логіном на паролем по електронній пошті!</strong><br><br>";
						include('Mail.php');
						$from = "zayavky@ukrtelecom.ua";
						$to = "olazebnyk@ukrtelecom.ua";
		//				$to = $to.$db3['login']."@ukrtelecom.ua";
						$subject = "Создан логин к INVENT";
						$body = "\n\nЮзер - 	".$nameuser.
							   "\n\nЛогин -		".$login.
							   "\n\nПідрозділ - ".$centr.
							   "\n\nСклад  - 	".$sklad.
							   "\n\nІм`я компьютера - ".$_POST['NAC'].
							   "\n\nСайт: http://10.80.11.106/invent/adm.php?rabotnik=$login ";
						
						$host = "send.ukrtelecom.net";
						$username = "zayavky";
						$password = "P@ssw0rd";
						
						$headers = array ('From' => $from,
						 'To' => $to,
						 'Subject' => $subject);
						$smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
						$mail = $smtp->send($to, $headers, $body);
						


			$log = $login;
			$passw = "1";
			echo `sudo -i htpasswd -D /var/www/invent/.htpasswd $log`;
			echo `sudo -i htpasswd -b /var/www/invent/.htpasswd $log $passw`;
				if (pg_query($connection, "update centry set passw = '$passw' where login = '$log';")) 
				{
//					echo "Изменения выполнены";
					$from = "zayavky@ukrtelecom.ua";
					$to = $log."@ukrtelecom.ua";
	//				$to = $to.$db3['login']."@ukrtelecom.ua";
					$subject = "Вам дан доступ к вводу серийных номеров на товары";
					$body = "\n\nЮзер - 	".$nameuser.
						   "\n\nПідрозділ - ".$centr.
						   "\n\nСклад  - 	".$sklad.						   
						   "\n\n\nЛогин -	".$log.
						   "\n\nПароль -	".$passw.
						   "\n\nСайт: http://10.80.11.106/invent/index.php";
					
					$host = "send.ukrtelecom.net";
					$username = "zayavky";
					$password = "P@ssw0rd";
					
					$headers = array ('From' => $from,
					 'To' => $to,
					 'Subject' => $subject);
					$smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
					$mail = $smtp->send($to, $headers, $body);
				
				}




		
		
						
						} else echo "<strong>Запис про $login; $nameuser; $centr; з $ip не вдалося створити!</strong><br>";
			 }
		 }
		 


		
		
	}
?>


</body>
</html>