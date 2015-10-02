<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->

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
	font-size: medium;
	font-weight: bold;
	color: #FF0000;
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



<?php
$date_now = time();

$result2=pg_query($connection, "select user_auto from user_auto where login = '$login';");
$db2=pg_fetch_array($result2);
$user_auto=$db2['user_auto'] ;


if(isset($_POST['Submit22']))
	{
		if($_POST['vodii2'] != '') $vodiy = $_POST['vodii2']; else $vodiy = "Не визначено";
		if($_POST['auto2'] != '') $mobil = $_POST['auto2'];
		if((($vodiy != "Не визначено")&($mobil != ''))||(($dostup & 1)&($mobil != '')))
			{
				$auto_id = $_POST['auto_id'];
				$result = pg_query($connection, "select history, data_otpr, data_prib, stan from auto where auto_id = $auto_id;");
				$db=pg_fetch_array($result);
				$history = $db['history'];
				$date_nn = $db['data_otpr'];
				$date_kk = $db['data_prib'];
				$stan = $db['stan']; 
				$result=pg_query($connection, "select * from auto where mobil = '$mobil' and mobil <> 'Легкова' and mobil <> 'Вантажна' and mobil <> 'Автобус' and stan <> 'Відмовлено' and data_otpr < $date_kk and data_prib > $date_nn and auto_id <> $auto_id;");
				if(pg_num_rows($result) > 0) 
					{
						$flag = 1;
?>                                              
                                              <p><strong>Автомобіль в вибраний вами час зайнятий:                                              
                                              </strong>
                                              <table width="100%" border="1">
	<tr>
	  <td bgcolor="#66CCCC"><div align="center">Машина</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата виїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата приїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Хто подав заявку </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пункти призначень та мета </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пассажири</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Інформація про вантаж</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Водій</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Стан</div></td>
	</tr>
<?php 
while ($db=pg_fetch_array($result)):
?>	

	<tr>
	  <td><?php echo $db['mobil']; ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_otpr']); ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_prib']); ?>&nbsp;</td>
	  <td><?php echo $db['podav']; ?>&nbsp;</td>
	  <td><?php echo $db['punkty'],", ",$db['meta']; ?>&nbsp;</td>
	  <td><?php echo $db['passinf']; ?>&nbsp;</td>
	  <td><?php echo $db['vantinf']; ?>&nbsp;</td>
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
			
			
			
			
				$result=pg_query($connection, "select * from auto where vodiy = '$vodiy' and vodiy <> 'Не визначено' and stan <> 'Відмовлено' and data_otpr < $date_kk and data_prib > $date_nn and auto_id <> $auto_id;");
				if(pg_num_rows($result) > 0) 
					{
						$flag = 1;
?>                                              
                                              <p><strong>Водій в вибраний вами час зайнятий:                                              
                                              </strong>
                                              <table width="100%" border="1">
	<tr>
	  <td bgcolor="#66CCCC"><div align="center">Машина</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата виїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата приїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Хто подав заявку </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пункти призначень та мета </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пассажири</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Інформація про вантаж</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Водій</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Стан</div></td>
	</tr>
<?php 
while ($db=pg_fetch_array($result)):
?>	

	<tr>
	  <td><?php echo $db['mobil']; ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_otpr']); ?>&nbsp;</td>
	  <td><?php echo date( 'H\:i d\-m\-Y', $db['data_prib']); ?>&nbsp;</td>
	  <td><?php echo $db['podav']; ?>&nbsp;</td>
	  <td><?php echo $db['punkty'],", ",$db['meta']; ?>&nbsp;</td>
	  <td><?php echo $db['passinf']; ?>&nbsp;</td>
	  <td><?php echo $db['vantinf']; ?>&nbsp;</td>
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
			
			
			
                                             
                                              

				
				
				
				
				if ($flag != 1)
					{	
				
						if ($dostup>>1&1) 
							{
								$history = $history . ";<br>" . date( 'H\:i d\-m\-Y', $date_now) . " - з представником автобази " . $user_auto .  " погоджено, - машина: " . $mobil . ", водій: " . $vodiy;
								if ($stan == "Затверджено")	$stan =  "Затверджено, пог. з автобазою";	
								if ($stan == "Погоджено")	$stan =  "Погоджено, пог. з автобазою";	
								
								if (pg_query($connection, "UPDATE auto set vodiy = '$vodiy', mobil = '$mobil', history = '$history', stan = '$stan' where auto_id = $auto_id ;")) 
									{
										echo "<br><span class=\"стиль24\">Заявка змінена! </span><br />\n "; 
										// Сообщение по почте подавшему заявку

										$result=pg_query($connection, "select * from auto where  auto_id = $auto_id;");
										$db=pg_fetch_array($result);
										$user_a  = $db['podav']; 
										$result22=pg_query($connection, "select login from user_auto where user_auto = '$user_a';");
										$db22=pg_fetch_array($result22);
										$login22 = $db22['login'];

							 			include('Mail.php');
							
							 			$from = "zayavky@ukrtelecom.ua"; 
							 			$to = $login22."@ukrtelecom.ua";
							 			$subject = "Заявка на автомобіль погоджена з автобазою";
							 			$body = "\nЗаявка на автомобиль погоджена з автобазою\n\n".
									 			  "Хто подав заявку   - ".$db['podav'].
									 			"\nПункти призначень  - ".$db['punkty'].
									 			"\nМета               - ".$db['meta'].		 
						 						"\nДата та час виїзду - ".date( 'H\:i d\-m\-Y', $db['data_otpr']).
						 						"\n\nЗаявки: http://10.80.11.106/mobil/index.php ";
							
							 			$host = "send.ukrtelecom.net";
							 			$username = "zayavky";
							 			$password = "P@ssw0rd";
							
							 			$headers = array ('From' => $from,
							   			'To' => $to,
							   			'Subject' => $subject);
							 			$smtp = Mail::factory('smtp',array ('host' => $host, 'auth' => true,'username' => $username,'password' => $password));
							 			$mail = $smtp->send($to, $headers, $body);

										echo "<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='mobil.php'\">";
									} 
								else echo "<span class=\"стиль24\">Заявку на автомобіль $mobil з водієм $vodiy змінити не вдалося</span>";
						
							}
						else
							{
								$history = $history . ";<br>" . date( 'H\:i d\-m\-Y', $date_now) . " - " . $user_auto .  " виділив машину: " . $mobil . ", водій: " . $vodiy;
								if (pg_query($connection, "UPDATE auto set vodiy = '$vodiy', mobil = '$mobil', history = '$history' where auto_id = $auto_id ;")) echo "<span class=\"стиль24\">Заявка змінена! </span><br />\n <META HTTP-EQUIV=\"Refresh\" content =\"2; URL='mobil.php'\">"; else echo "Заявку на автомобіль $mobil з водієм $vodiy змінити не вдалося";
							}
			 		}
			}
		else echo "<br><span class=\"стиль24\">Не вибрана машина або водій!</span>";
	}

if (isset($_GET['id'])||($flag == 1))
	{
		$auto_id = $_GET['id'];
		$result3=pg_query($connection, "select vodiy, mobil from auto where auto_id = $auto_id");
		
		$db3=pg_fetch_array($result3);
		$vodiy = $db3['vodiy'] ;
		$mobil = $db3['mobil'] ;		
		
//		$mobil = $_GET['mobil'];
?>
<span class="стиль24">Виберіть машину та водія:</span>
<form name="vyd" method="post" action="vydil.php">
                                                    <p>
                                                      <input name="auto_id" type="hidden" id="auto_id" value="<?php echo $auto_id; ?>">
</p>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                      <tr>
                                                        <td bgcolor="#66CCCC"><div align="center"><strong>Водій
                                                              <select name="vodii2" id="vodii2">
<?php

		$result2=pg_query($connection, "select * from vodii order by vodiy;");
		echo "<option value=''>Виберіть водія</option>";
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
                                                        </strong>
                                                            <input name="vodiy2" type="hidden" id="vodiy2"<?php echo "value=\"$vodiy\""; ?>>
                                                          <input name="telef2" type="hidden" id="telef2" <?php echo "value=\"$telef\""; ?>>
                                                        </div></td>
                                                      </tr>

                                                      <tr>
                                                        <td><div align="center"><strong>Автомобіль
                                                          <select name="auto2" id="auto2">
                                                            <?php

		$result2=pg_query($connection, "select * from mobil_auto order by mobil;");
		echo "<option value=''>Виберіть автомобіль</option>";
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
                                                        </strong>
                                                            <input name="mobil2" type="hidden" id="mobil2"<?php echo "value=\"$mobil\""; ?>>
                                                        </div></td>
                                                      </tr>
                                                      <tr>
                                                        <td><div align="center"></div></td>
                                                      </tr>
                                                      <tr>
                                                        <td><div align="center">
                                                          <input type="submit" name="Submit22" value="Виділити автомобіль та водія">
                                                        </div></td>
                                                      </tr>
                                                    </table>
                                              </form>
<?php
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