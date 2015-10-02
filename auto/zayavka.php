<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/styles.css" rel="stylesheet" type="text/css">



<link href="css/styles.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
.стиль5 {color: #FFFFFF; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif;}
.стиль12 {color: #FFFFFF; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.стиль22 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: x-small;
	color: #FFCC00;
	font-weight: bold;
}
.стиль23 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: large;
}
-->
</style>
</head>

<body class="body">

<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
  <tr>
    <td width="100%" align="left" valign="top">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
  <td height="20" colspan="8" align="center" valign="middle" bordercolor="#CC6600" bgcolor="#CC9933" class="logobg"><div align="center" class="стиль23"> Використання службового автотранспорту </div></td>
  </tr>
  <tr>
  <td height="20" colspan="8" align="left" valign="middle" bordercolor="#CC6600" bgcolor="#CC9900" style="color:#600"><?php 
 												  
$login = $_SERVER['REMOTE_USER'];	
$ip=getenv ("REMOTE_ADDR");
$connection = pg_connect("dbname=auto user=auto password=12345");
$result2=pg_query($connection, "select dostup, user_auto, pass from user_auto where login = '$login';");
$db2=pg_fetch_array($result2);
$pass=$db2['pass'] ;
$dostup=$db2['dostup'] ;
$user_auto = $db2['user_auto']; 
echo "Користувач: $user_auto, IP: $ip"; ?></td>
  </tr>
    <tr width="100%">
    <td height="20" align="center"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="vvod.php" class="стиль5">____Заявка____</a></div></td>
    <td align="center"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><a href="index.php" class="стиль5">Перелік заявок</a></td>
    <?php 

if (($dostup>>2&1) | ($dostup>>1&1) ) 

{ 
?>
    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="adm.php" class="стиль5">Адміністрування</a></div></td>
    <?php
};

if ($dostup&1) 
{ 
?>

    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="zatv0.php" class="стиль5">Погодження</a></div></td>
    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="zvit.php" class="стиль5">Звіт в xls</a></div></td>
    <?php
};
if ($dostup>>3&1) 
{ 
?>

    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="zatv.php" class="стиль5">Затвердження</a></div></td>

    <?php
};

if (($dostup>>1&1) | ($dostup>>0&1)) 
{ 
?>
    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="mobil.php" class="стиль5">Виділення машини</a></div></td>
    <?php
};

?>
<td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="help.php" class="стиль5">Допомога</a></div></td>
  </tr>
    </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
      	<tr>
					<td width="10" bgcolor="#CC9933">&nbsp;</td>
       	  <td width="5" align="center" valign="top" bordercolor="#CC6600" bgcolor="#CC9933">
					<br>
					<p><span class="стиль12"><br>
			  </span>            <span class="стиль22"><a href="help.html" class="стиль22"></a></span><br>
			  <br>
			  <br>		  
          </td>
					<td width="10" align="left" valign="top" bgcolor="#CC6633">&nbsp;</td>
    			<td width="2" bgcolor="#336633"><img src="images/xnew.gif" alt="Заработок на платных опросах" width="2" height="500"></td>
        	<td width="100%" align="left" valign="top" bgcolor="#FFFFFF">

        		<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%">
          		<tr>
            		<td width="10" align="left" valign="top">&nbsp;</td>
            		<td width="100%" align="left" valign="top"><table width="100%">
                    <tr>
                      <td align="right">
						<div align="justify" class="text">
											  <!-- InstanceBeginEditable name="EditRegion3" -->
<?php



if(isset($_POST['Submit2']))
	{
		$date_nn = $_POST['date_nn'];
		$date_kk = $_POST['date_kk'];
		$mobil = $_POST['mobil'];
		if (!($vodiy = $_POST['vodiy'])) $vodiy = "Не визначено";
		
		$punkty = $_POST['punkty'];
		$meta = $_POST['meta'];
		$passinf = $_POST['passinf'];
		$vantinf = $_POST['vantinf'];

		$punkty = strtr($punkty,"'","`");
		$punkty = strtr($punkty,"\"","`") ;
		$punkty = trim($punkty) ;

		$meta = strtr($meta,"'","`");
		$meta = strtr($meta,"\"","`") ;
		$meta = trim($meta);

		$passinf = strtr($passinf,"'","`");
		$passinf = strtr($passinf,"\"","`") ;
		$passinf = trim($passinf);

		$vantinf = strtr($vantinf,"'","`");
		$vantinf = strtr($vantinf,"\"","`") ;
		$vantinf = trim($vantinf);
		
		$passk = $_POST['passk'];
 		$history = date( 'H\:i d\-m\-Y', time()) . " - " . $user_auto . " з IP " . $ip .  " створив заявку та замовив машину: " . $mobil . ", водій: " . $vodiy;
		if ($mobil == '00132 МЕ, Nissan Maxima, Легковий седан')
		{
			$stan = "Не потребує погодження";
		}
		else $stan = "Створено";
		
		$result=pg_query($connection, "select * from auto where vodiy = '$vodiy' and data_otpr = $date_nn and data_prib = $date_kk and mobil = '$mobil' and punkty = '$punkty' and meta = '$meta' and podav = '$user_auto';");
		if(pg_num_rows($result) > 0) echo "<strong>Заявка дублюється,!</strong><br>";
		else
		if (pg_query($connection, "insert into auto (stan, podav, data_otpr, data_prib, mobil, punkty, passinf, vantinf, vodiy, meta, history, passk) values ('$stan', '$user_auto', $date_nn, $date_kk, '$mobil', '$punkty', '$passinf', '$vantinf', '$vodiy', '$meta', '$history', $passk);")) 
		{ 
		echo "<strong>Заявка створена!</strong><br>";

	$result=pg_query($connection, "select * from user_auto where login = '$login';");
	$db=pg_fetch_array($result);
	$pidr = $db['pidr'] ;
	$telefone = $db['telefone'];
	$podav = $db['user_auto'];
	$posada = $db['posada'];
	
	
		$dataText = "";

if($stan != "Не потребує погодження")
{
	// open the file
	if(!($fp= fopen ("za/za.rtf", "r"))) die ("Can't open");
	$dataText = fread($fp, 200000);
	fclose ($fp);

			$dataText = str_replace ("\{telefon\}", iconv("UTF-8","windows-1251"," "), $dataText);
			$dataText = str_replace ("\{mobil\}", iconv("UTF-8","windows-1251"," "), $dataText);
			$dataText = str_replace ("\{vodiy\}", iconv("UTF-8","windows-1251"," "), $dataText);
	foreach ($_POST as $key=>$value) {
			$dataText = str_replace ("\{{$key}\}", iconv("UTF-8","windows-1251",$value), $dataText);
			}
			$date_e_n  = explode("-", date('d\-m\-Y', $date_nn));
			$date_e_k  = explode("-", date('d\-m\-Y', $date_kk));
			$termin = (mktime(0,0,0,$date_e_k[1],$date_e_k[0],$date_e_k[2])-mktime(0,0,0,$date_e_n[1],$date_e_n[0],$date_e_n[2]))/86400 + 1;
			$dataText = str_replace ("\{termin\}", $termin, $dataText);
			$dataText = str_replace ("\{date_n\}", iconv("UTF-8","windows-1251",date('d\.m\.Y \р.', $date_nn)), $dataText);
			$dataText = str_replace ("\{date_k\}", iconv("UTF-8","windows-1251",date( 'd\.m\.Y \р.', $date_kk)), $dataText);
			$dataText = str_replace ("\{podav\}", iconv("UTF-8","windows-1251",$user_auto), $dataText);
			$dataText = str_replace ("\{pidr\}", iconv("UTF-8","windows-1251",$pidr), $dataText);
//			$dataText = str_replace ("\{fone\}", iconv("UTF-8","windows-1251",$fone), $dataText);
			$dataText = str_replace ("\{telefone\}", iconv("UTF-8","windows-1251",$telefone), $dataText);
			$dataText = str_replace ("\{posada\}", iconv("UTF-8","windows-1251",$posada), $dataText);
			$dataText = str_replace ("\{passinf\}", iconv("UTF-8","windows-1251",$passinf), $dataText);
			$dataText = str_replace ("\{vantinf\}", iconv("UTF-8","windows-1251",$vantinf), $dataText);


	// save the file as an rtf
   	$timeStamp = date( 'H\:i d\-m\-Y', time());
	$saveFile = "files/".$mobil.$timeStamp.".rtf";
	$printFile= "files/".$mobil.$timeStamp.".rtf";

	if(!($fq= fopen ($saveFile, "w+"))) die ("Ошибка доступа");
	fwrite ($fq, $dataText);
	fclose ($fq);
echo "<a href='$saveFile'>Якщо документ не завантажився автоматично, його можна отримати тут.</a>";

echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='$printFile'\">";


}


		# Отправка уведомления Админу по почте

include('Mail.php');

 $from = "zayavky@ukrtelecom.ua";

 				$to = ""; // повідомлення всім Погоджуючим!!!
				$result3=pg_query($connection, "select login from  user_auto  where (dostup & 1 <> 0 and pass <> '');");	 //or dostup = 3
				while ($db3=pg_fetch_array($result3)):
				if ($to != "") $to = $to.",";
				$to = $to.$db3['login']."@ukrtelecom.ua";
				
				endwhile;

 
 $subject = "Створена заявка на автомабіль";
 $body = "\nЗаявка на автомобіль\n\n".
      "Хто подав заявку		- ".$user_auto.
    "\nПідрозділ			- ".$pidr.
    "\nАвтомобіль			- ".$mobil. 
    "\nПункти призначень		- ".$punkty.
    "\nКількість пасажирів		- ".$passk.
    "\nМета				- ".$meta.		 
    "\nДата та час відправлення	- ".date( 'H\:i d\-m\-Y', $date_nn);
 if ($stan == "Не потребує погодження") $body .= "\n\nЗаявка не потребує погодження.";
 else $body .= "\n\nПогодження заяки: http://10.80.11.106/auto/zatv0.php ".
"\n";
 $host = "send.ukrtelecom.net";
 $username = "zayavky";
 $password = "P@ssw0rd";

 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
 $mail = $smtp->send($to, $headers, $body);


 
		echo "<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='index.php'\">"; 
		} else echo "Заявку створити не вдалося";
	}
if($auto_id = $_GET['id'])
{
	
	
	$result=pg_query($connection, "select * from auto where auto_id = $auto_id;");
	$db=pg_fetch_array($result);

		// open the file
	if(!($fp= fopen ("za/za.rtf", "r"))) die ("Can't open");
	$dataText = fread($fp, 200000);
	fclose ($fp);


//	foreach ($db as $key=>$value) {

			//$dataText = str_replace ("\{{$key}\}", iconv("UTF-8","windows-1251",$value), $dataText);
//			}


			$date_e_n  = explode("-", date('d\-m\-Y', $db['data_otpr']));
			$date_e_k  = explode("-", date('d\-m\-Y', $db['data_prib']));
			$termin = (mktime(0,0,0,$date_e_k[1],$date_e_k[0],$date_e_k[2])-mktime(0,0,0,$date_e_n[1],$date_e_n[0],$date_e_n[2]))/86400 + 1;
			$dataText = str_replace ("\{termin\}", $termin, $dataText);
			$dataText = str_replace ("\{date_n\}", iconv("UTF-8","windows-1251",date('d\.m\.Y \р.', $db['data_otpr'])), $dataText);
			$dataText = str_replace ("\{date_k\}", iconv("UTF-8","windows-1251",date( 'd\.m\.Y \р.', $db['data_prib'])), $dataText);
			$dataText = str_replace ("\{podav\}", iconv("UTF-8","windows-1251",$db['podav']), $dataText);
			$dataText = str_replace ("\{pidr\}", iconv("UTF-8","windows-1251",$db[pidr]), $dataText);
			$podav = $db['podav'];
			$result3=pg_query($connection, "select * from user_auto where user_auto = '$db[podav]';");
			$db3=pg_fetch_array($result3);
			//$pidr = $db3['pidr'] ;
			$telefone = $db3['telefone'];
			$posada = $db3['posada'];
			$dataText = str_replace ("\{telefone\}", iconv("UTF-8","windows-1251",$telefone), $dataText);
			$dataText = str_replace ("\{posada\}", iconv("UTF-8","windows-1251",$posada), $dataText);
			$dataText = str_replace ("\{passk\}", iconv("UTF-8","windows-1251",$db[passk]), $dataText);
			$dataText = str_replace ("\{punkty\}", iconv("UTF-8","windows-1251",$db[punkty]), $dataText);
			$dataText = str_replace ("\{passinf\}", iconv("UTF-8","windows-1251",$db[passinf]), $dataText);
			$dataText = str_replace ("\{vantinf\}", iconv("UTF-8","windows-1251",$db[vantinf]), $dataText);
			if(($db[mobil] == "Легкова") | ($db[mobil] == "Вантажна") | ($db[mobil] == "Автобус")) 
				$dataText = str_replace ("\{mobil\}", iconv("UTF-8","windows-1251"," "), $dataText);			
				else $dataText = str_replace ("\{mobil\}", iconv("UTF-8","windows-1251",$db[mobil]), $dataText); 
			if($db[vodiy] == "Не визначено")
				$dataText = str_replace ("\{vodiy\}", iconv("UTF-8","windows-1251"," "), $dataText);													
				else $dataText = str_replace ("\{vodiy\}", iconv("UTF-8","windows-1251",$db[vodiy]), $dataText); 
	$result3=pg_query($connection, "select telefon from vodii where vodiy = $db[vodiy];");
	$db3=pg_fetch_array($result3);
	$telefon = $db3['telefon'];			
			if($telefon == "")
 $dataText = str_replace ("\{telefon\}", iconv("UTF-8","windows-1251"," "), $dataText);				else $dataText = str_replace ("\{telefon\}", iconv("UTF-8","windows-1251",$db[telefon]), $dataText); 
				
	// save the file as an rtf
   	$timeStamp = date( 'H\:i d\-m\-Y', $db['data_otpr']);
	$saveFile = "files/".$db['mobil'].$timeStamp.".rtf";
	$printFile= "files/".$db['mobil'].$timeStamp.".rtf";

	if(!($fq= fopen ($saveFile, "w+"))) die ("Ошибка доступа");
	fwrite ($fq, $dataText);
	fclose ($fq);
	echo "<a href='$saveFile' style=\"font-size:24px\">Якщо документ не завантажився автоматично, його можна отримати тут.</a>";

	echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='$printFile'\">";




	
}

?>
											   
											   
											   <!-- InstanceEndEditable -->
											  <p>
<?php if ($pass == '') echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='/mobil/'\">"; ?>											  
											  </p>
						</div>					  </td>
                    </tr>
                    <tr>
                      <td align="center"><table class="refhome" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" nowrap bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                  </table>
				  <br>				  </td>
           		  <td width="10" align="left" valign="top">&nbsp;</td>
          		</tr>
        		</table>	 </td>
      	</tr>
   	  </table>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#3366FF" bgcolor="#3366FF">
      	<tr>
        	<td width="100%">
      	</tr>
   	  </table>
    	<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
      	<tr>
        	<td width="100%" height="2" bgcolor="#3366FF"></td>
        	<td width="100%" height="2" align="center" nowrap bgcolor="#3366FF" class="text"></td>
      	</tr>
      	<tr>
      	  <td>&nbsp;</td>
      	  <td align="center" nowrap class="text"><a href="mailto:olazebnyk@ukrtelecom.ua">olazebnyk@ukrtelecom.ua</a></td>
    	  </tr>
    </table>	</td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>