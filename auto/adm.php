﻿<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->

<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title></title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/styles.css" rel="stylesheet" type="text/css">



<link href="css/styles.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.стиль24 {
	font-size: large;
	font-weight: bold;
}
-->
</style>
<!-- InstanceEndEditable -->
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


											  <div align="center"><span class="стиль24">Адміністрування</span><br>
										        <?php
if($log = $_GET['log'])
{
	$result=pg_query($connection, "select * from user_auto where login = '$log';");
	$db=pg_fetch_array($result);
	$user_auto=$db['user_auto'] ;
	$log=$db['login'] ;
	$passw = $db['pass'];
	$dostup1=$db['dostup'];
	$telefone = $db['telefone'] ;
	$pidr = $db['pidr'] ;
	$posada = $db['posada'];
	$ip_addr = $db['ip'];
		
}
else
{
	$rabotnik="" ;
	$log="" ;
	$dostup1=0 ;
	$telefone = "" ;
	$pidr = "" ;
	$posada = "";
};

if($vodiy = $_GET['vodiy'])
{
	$result=pg_query($connection, "select * from vodii where vodiy = '$vodiy';");
	$db=pg_fetch_array($result);
	$telef = $db['telefon'] ;
	
}



// обработка при изменении работников
if(isset($_POST['login'])) 
{
	$log = $_POST['login'];
	$result=pg_query($connection, "select * from user_auto where login = '$log';");
	if(pg_num_rows($result) > 0)
	{	
		$db=pg_fetch_array($result);
		$user_auto = $db['user_auto'];
	   include('Mail.php');
	   $from = "zayavky@ukrtelecom.ua";
	   $to = $log . "@ukrtelecom.ua";
	   $host = "send.ukrtelecom.net";
	   $username = "zayavky";
	   $password = "P@ssw0rd";
		
		if($passw = $_POST['passw'])
		{
			echo `sudo -i htpasswd -D /var/www/auto/.htpasswd $log`;
			echo `sudo -i htpasswd -b /var/www/auto/.htpasswd $log $passw`;
			if (pg_query($connection, "update user_auto set pass = '$passw' where login = '$log';")) 
			{
				echo "Пароль змінено.<br>";
						# Отправка уведомления Админу по почте

				 $subject = "Доступ до сервісу Використання автотранспорту";
				 $body = "\nВаш логін активовано\n\n".
						 "Шановний користувач ".$user_auto.
						 "\nВаш обліковий запис активовано.".
						 "\nТепер ви можете заходити на сайт для створення заявок на автотранспорт.".	 
						 "\nВаш логін на сайті: ".$db['login'].
						 "\nВаш пароль: ".$passw.
						 "\nЗа бажанням можете змінити пароль (посилання \"Змінити свій пароль\" на вкладці \"Заявка\")".
						 "\n\nАдреса сайту:". 
						 "\n\n з автоматичним входом - http://".$log.":".$passw."@10.80.11.106/auto/index.php ".
						 "\n\n з ручним входом (при заблокованій передачі інформаціі користувача в адресній строці) - http://10.80.11.106/auto/index.php ".
						 "\n\nПосилання на сайт є також на корпоративному порталі Черкаської філії";				
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
				 $mail = $smtp->send($to, $headers, $body);
				


				
			}
		}
		if(isset($_POST['del']))
		{
			echo `sudo -i htpasswd -D /var/www/auto/.htpasswd $log`;
			if (pg_query($connection, "delete from user_auto where login = '$log';")) 
			{
				echo "Користувач $user_auto видалений!<br>";
						# Отправка уведомления Админу по почте

				 $subject = "Доступ до сервісу Використання автотранспорту";
				 $body = "\nВаш обліковий запис видалено\n\n".
						 "Шановний користувач ".$user_auto.
						 "\n\nВаш обліковий запис видалено.".
						 "\nТепер Ви не зможете заходити на сайт для створення заявок на автотранспорт.".	 
						 "\n\nПодивитись активні заявки Ви можете за адресою: http://10.80.11.106/mobil/index.php ".
						 "\n\nПосилання на сайт є також на корпоративному порталі Черкаської філії";				
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
				 $mail = $smtp->send($to, $headers, $body);

				
			}
		}
		else
		{
			$dostup1 = $_POST['dostup']+$_POST['dostup1']+$_POST['dostup2']+$_POST['dostup3']+$_POST['dostup4'];
			$user_auto = trim($_POST['rab']);
			$pidr = trim($_POST['pidr']);
			$telefone = trim($_POST['telefon']);
			$posada = trim($_POST['posada']);
			if (pg_query($connection, "update user_auto set dostup = $dostup1, user_auto = '$user_auto', pidr = '$pidr', telefone = '$telefone', posada = '$posada'  where login = '$log';")) echo "Права змінено<br>";
		}	
	}
	else
	{
		
		if($passw = $_POST['passw'])
		{	
			$user_auto = trim($_POST['rab']);
			$log = trim($_POST['login']);
			$pidr = trim($_POST['pidr']);
			$telefone = trim($_POST['telefon']);
			$posada = trim($_POST['posada']);
			$dostup1 = $_POST['dostup']+$_POST['dostup1']+$_POST['dostup2']+$_POST['dostup3']+$_POST['dostup4'];
//			if(isset($_POST['baza'])) $dostup1 = 2;
			echo `sudo -i htpasswd -b /var/www/auto/.htpasswd $log $passw`;
			if (pg_query($connection, "insert into user_auto (user_auto, login, dostup, pidr, telefone, pass, posada) values ('$user_auto', '$log', $dostup1, '$pidr', '$telefone', '$passw', '$posada');")) echo "Користувач $user_auto добавлений";
		}
		else echo "Необхідно ввести пароль!";	
		
	}
}

// обработка при изменении центров
if(isset($_POST['vodiy'])) 
{
	$vodiy = trim($_POST['vodiy']);
	$result=pg_query($connection, "select * from vodii where vodiy = '$vodiy';");
	if(pg_num_rows($result) > 0)
	{
	
		if(isset($_POST['del1']))
		{
			if (pg_query($connection, "delete from vodii where vodiy = '$vodiy';")) echo "Водія $vodiy видалено!"; 
		}
	 
	}
	else
	{
		$vodiy = trim($_POST['vodiy']);
		$telef = trim($_POST['telef']);
		if($vodiy != '') if (pg_query($connection, "insert into vodii (vodiy, telefon) values ('$vodiy', '$telef');")) echo "Водій $vodiy та його номер телефону $telef добавлений";
	}		
	
}


// обработка типов

if($mobil = $_POST['mobil']) 
{

	$result=pg_query($connection, "select * from mobil_auto where mobil = '$mobil';");
	if(pg_num_rows($result) > 0)
	{
	
		if(isset($_POST['del2']))
		{
			if (pg_query($connection, "delete from mobil_auto where mobil = '$mobil';")) echo "Автомобіль $mobil видалений!"; 
		}
	 
	}
	else
	{
		if($mobil != '') if (pg_query($connection, "insert into mobil_auto (mobil) values ('$mobil');")) echo "Автомобіль $mobil добавлений";
	}		
	
}




?>
											    
										      </div>
											  <table width="100%" border="1" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td>
<?php


if($dostup>>2&1)
	{
?>
												  <form name="form1" method="post" action="">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td colspan="6" bgcolor="#66CCCC"><div align="center"><strong>Користувач
                                                              <select name="user_auto" id="user_auto" onChange="top.location.href = 'adm.php?log='+this.options[this.selectedIndex].value;">
                                                            <?php

$result2=pg_query($connection, "select * from user_auto order by user_auto");
echo "<option value=''>Виберіть користувача для редагування</option>";
//echo "<option value='pusto'>Створення нового робітника</option>";
while($db2=pg_fetch_array($result2)):
 $spi=$db2['login'];
 $nspi=$db2['user_auto'] ;
if($spi == $log) 
{
 echo "<option value='$spi' selected='selected'>$nspi</option>";
} 
else 
{
 echo "<option value='$spi'>$nspi</option>";
};
endwhile;
?>
                                                        </select>
                                                        </strong></div></td>
                                                      </tr>
                                                      <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="5">&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Призвіще
                                                          <input name="rab" type="text" id="rab" size="64" maxlength="64" <?php echo "value=\"$user_auto\"" ?>></td>
                                                        <td colspan="3">Логін
                                                          <input name="login" type="text" id="login" <?php echo "value=\"$log\"" ?>></td>
                                                        <td colspan="2">IP: <?php echo "$ip_addr" ?></td>
                                                      </tr>
                                                      <tr>
                                                        <td <?php if(!isset($passw)) echo "style=\"color:#F00\""; ?>>Пароль
                                                        <input name="passw" type="text" id="passw" value=""> <?php echo "<strong style=\"color:#FFF\"> $passw </strong>" ?> </td>
                                                        <td>Керівник
                                                          <input name="dostup" type="checkbox"  value="16" <?php if($dostup1 & 16) echo "checked"; ?>></td>
                                                        <td>Погоджующий 
                                                        <input name="dostup1" type="checkbox"  value="1" <?php if($dostup1 & 1) echo "checked"; ?>></td>
                                                        <td>Автобаза
                                                        <input name="dostup2" type="checkbox" value="2" <?php if($dostup1 & 2) echo "checked"; ?>></td>
                                                        <td>Адміністратор
                                                        <input name="dostup3" type="checkbox" value="4" <?php if($dostup1 & 4) echo "checked"; ?>></td>
                                                        <td>Затверджуючий
                                                        <input name="dostup4" type="checkbox" value="8" <?php if($dostup1 & 8) echo "checked"; ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td>Підрозділ
                                                        <input name="pidr" type="text" id="pidr" size="64" maxlength="512" <?php echo "value=\"$pidr\"" ?>></td>
                                                        <td colspan="5">Посада
                                                          <input name="posada" type="text" id="posada" size="64" maxlength="512" <?php echo "value=\"$posada\"" ?>>
                                                          Телефон                                                        
                                                        <input name="telefon" type="text" id="telefon" <?php echo "value=\"$telefone\"" ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td bgcolor="#CCFFFF">Видалити
                                                        <input name="del" type="checkbox" id="del" value="1"></td>
                                                        <td colspan="5" bgcolor="#CCFFFF"><input type="submit" name="Submit" value="Змінити"></td>
                                                      </tr>
                                                    </table>
                                                    </form>

<?php
	}
?>												</td>
                                                </tr>

<?php
if (($dostup>>1&1)|($dostup&1))
	{
?>
                                                <tr>
                                                  <td>
												
												<form name="form1" method="post" action="">
                                                    <p>&nbsp;                                                      </p>
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                      <tr>
                                                        <td colspan="2" bgcolor="#66CCCC"><div align="center"><strong>Водій
                                                              <select name="vodii" id="vodii" onChange="top.location.href = 'adm.php?vodiy='+this.options[this.selectedIndex].value;">
                                                            <?php

$result2=pg_query($connection, "select * from vodii order by vodiy");
echo "<option value=''>Виберіть водія для редагування</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['vodiy'] ;
if($nspi == $vodiy) 
{
 echo "<option value='$nspi' selected='selected'>$nspi</option>";
} 
else 
{
 echo "<option value='$nspi'>$nspi</option>";
};
endwhile;
?>
                                                        </select>
                                                        </strong></div></td>
                                                      </tr>
                                                      <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                      </tr>
                                                      <tr>
                                                        <td>Прізвище
                                                          <input name="vodiy" type="text" id="vodiy" size="64" maxlength="64" <?php echo "value=\"$vodiy\"" ?>></td>
                                                        <td>Телефон
                                                        <input name="telef" type="text" id="telef" <?php echo "value=\"$telef\"" ?>></td>
                                                      </tr>
                                                      <tr>
                                                        <td bgcolor="#CCFFFF">Видалити
                                                        <input name="del1" type="checkbox" id="del1" value="1"></td>
                                                        <td bgcolor="#CCFFFF"><input type="submit" name="Submit2" value="Додати/видалити"></td>
                                                      </tr>
                                                  </table>
                                                    </form></td>
                                                </tr>
                                                <tr>
                                                  <td><?php 
$mobil = $_GET['mobil'];

?>
                                                    <form name="form1" method="post" action="">
                                                      <p>&nbsp;</p>
                                                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                          <td colspan="2" bgcolor="#66CCCC"><div align="center"><strong>Автомобіль
                                                                <select name="mobil_auto" id="mobil_auto" onChange="top.location.href = 'adm.php?mobil='+this.options[this.selectedIndex].value;">
                                                              <?php

$result2=pg_query($connection, "select * from mobil_auto order by mobil;");
echo "<option value=''>Виберіть автомобіль для редагування</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['mobil'];
if($nspi == $mobil) 
{
 echo "<option value='$nspi' selected='selected'>$nspi</option>";
} 
else 
{
 echo "<option value='$nspi'>$nspi</option>";
};
endwhile;
?>
                                                              </select>
                                                          </strong></div></td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan="2">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan="2">Автомобіль
                                                            <input name="mobil" type="text" id="mobil" size="80" maxlength="255" <?php echo "value=\"$mobil\"" ?>></td>
                                                        </tr>
                                                        <tr>
                                                          <td bgcolor="#CCFFFF">Видалити
                                                          <input name="del2" type="checkbox" id="del2" value="1"></td>
                                                          <td bgcolor="#CCFFFF"><input type="submit" name="Submit3" value="Додати/видалити"></td>
                                                        </tr>
                                                      </table>
                                                    </form></td>
                                                </tr>
<?php
	}
?>
                                                <tr>
                                                  <td></td>
                                                </tr>
                                              </table>
											  <p align="center">&nbsp;</p>
<?php pg_close($connection); ?>
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