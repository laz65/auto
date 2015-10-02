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

											  
											  
											  <p>
<?php

$date_now = time();	
$result=pg_query($connection, "select user_auto from user_auto where login = '$login';");	
$db = pg_fetch_array($result);
$user_auto = $db['user_auto'];										
if(isset($_POST['Submit'])) 
	{
		$zatv = $_POST['zatv'];
		$stan = $_POST['stan'];
		$auto_id = $_POST['auto_id'];
		$result = pg_query($connection, "select history from auto where auto_id = $auto_id;");
		$db=pg_fetch_array($result);
		$history = $db['history'];
		$history = $history . ";<br>" . date( 'H\:i d\-m\-Y', $date_now) . " - " . $zatv .  " змінив стан заявки на " . $stan . ", зміни виконав " . $user_auto;
		if (pg_query($connection, "UPDATE auto set stan = '$stan', history = '$history' where auto_id = $auto_id ;")) 
			{
				if ($stan == 'Затверджено') 
				echo "<strong>Заявку затверджено! Перехід до вибору мащини...</strong><br>","<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='vydil.php?id=",$auto_id,"'\">";
				else
				echo "<strong>В заявці відмовлено!</strong><br>","<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='zatv.php'\">";
			} else echo "<strong>Заявку змінити не вдалося</strong><br>";
	}

if(isset($_GET['stan']))
	{
		$stan = $_GET['stan'];
		$auto_id = $_GET['id'];
	}
$result=pg_query($connection, "select data_otpr, data_prib, mobil from auto where auto_id = $auto_id;");	
$db=pg_fetch_array($result);
$date_nn = $db['data_otpr'];
$date_kk = $db['data_prib'];
$mobil = $db['mobil'];
$result=pg_query($connection, "select * from auto where mobil = '$mobil' and data_otpr <= $date_kk and data_prib >= $date_nn;");
if(pg_num_rows($result) > 0) 
	{
		if(pg_num_rows($result) > 1) echo "Для цього автомобіля існує декілька заявок на один час(темні - інші):";
?>                                              
                                                                                        
<table width="100%" border="1">
	<tr>
	  <td bgcolor="#66CCCC"><div align="center">Машина</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата виїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата приїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Хто подав заявку </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пункти призначень  та мета</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Відповідальний</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Куди подати автомобіль </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Водій</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Стан</div></td>
	</tr>
<?php 
while ($db=pg_fetch_array($result)):
?>	

	<tr
	<?php 
	if($db['auto_id'] != "$auto_id") echo " bgcolor=\"#888888\""; 
	else
		{
			if($db['stan'] == "Затверджено") echo " bgcolor=\"#99FF99\""; 
			if($db['stan'] == "Відмовлено") echo " bgcolor=\"#FF9999\""; 
		}

	
	?>  	

	>
	  <td><?php echo $db['mobil']; ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_otpr']); ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_prib']); ?>&nbsp;</td>
	  <td><?php echo $db['podav']; ?>&nbsp;</td>
	  <td><?php echo $db['punkty'],", ",$db['meta']; ?>&nbsp;</td>
	  <td><?php echo $db['vidpov']; ?>&nbsp;</td>
	  <td><?php echo $db['podaty']; ?>&nbsp;</td>
	  <td><?php echo $db['vodiy']; ?>&nbsp;</td>
	  <td><?php echo $db['stan']; ?>&nbsp;</td>
	</tr>
<?php
endwhile;
?>
  </table>
  <p>
    <?php
				
				
		} 	
		
				
?>                                              

&nbsp;</p>
  <form name="form1" method="post" action="">
    <p>
      <input name="auto_id" type="hidden" id="auto_id" value="<?php echo $auto_id; ?>">
      <input name="stan" type="hidden" id="stan" value="<?php echo $stan ?>"> 
      
  <?php
$result=pg_query($connection, "select * from auto where auto_id = $auto_id;");	
$db=pg_fetch_array($result);
$stan_1 = $db['stan'];
if (($stan_1 == $stan)&($dostup == 1)) 
	{ 
		echo "Стан заявки змінено на ", $stan;
		if ($stan == 'Затверджено')
			{
				// получение логина подавшего заявку
				$user_a  = $db['podav']; 
				$result22=pg_query($connection, "select login, pidr from user_auto where user_auto = '$user_a';");
				$db22=pg_fetch_array($result22);
				$login22 = $db22['login'];
				$pidrozdil = $db22['pidr'];
				

				
						# Отправка уведомления по почте
/*
				include('Mail.php');
				
				 $from = "zayavky@ukrtelecom.ua"; 
				 $to = $login22."@ukrtelecom.ua";
				 // получение логинов работников автобазы
				    $result33=pg_query($connection, "select login from  user_auto  where (dostup = 2 and pass <> '') or dostup = 3;");	
					while ($db33=pg_fetch_array($result33)):
					$to = $to.",".$db33['login']."@ukrtelecom.ua";				
					endwhile;
				 $subject = "Утверждена заявка на автомобиль";
				 $body = "\nЗаявка на автомобиль\n\n".
						 "Хто подав заявку			- ".$db['podav'].
						 "\nПідрозділ - ".$pidrozdil.
						 "\nПункти призначень 		- ".$db['punkty'].
						 "\nМета 					- ".$db['meta'].		 
						 "\nМашина 					- ".$db['mobil'].		 
						 "\nДата та час виїзду		- ".date( 'H\:i d\-m\-Y', $db['data_otpr']).
						 "\n\nВиділення машини: http://10.80.11.106/auto/mobil.php ";
				
				 $host = "send.ukrtelecom.net";
				 $username = "zayavky";
				 $password = "P@ssw0rd";
				
				 $headers = array ('From' => $from,
				   'To' => $to,
				   'Subject' => $subject);
				 $smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
				 $mail = $smtp->send($to, $headers, $body);
*/				

			}
	} 
	else 
	{
if($stan == "Затверджено") echo "Хто затвердив заявку:"; else echo "Хто відмовив в заявці:";
?>
  
  <select name="zatv" id="zatv">
  <?php

$result2=pg_query($connection, "select * from user_auto where dostup = 1;");
while($db2=pg_fetch_array($result2)):
	$nspi=$db2['user_auto'] ;
	if($nspi == $user_auto) 
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
      
      </p>
    <p>
      <input type="submit" name="Submit" value="Виконати зміни стану">
    </p>
<?php
	}
?>
  </form>
  <p>&nbsp;</p>
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