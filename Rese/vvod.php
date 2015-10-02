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
.стиль24 {color: #FF0000}
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
  <td height="20" colspan="5" align="center" valign="middle" bordercolor="#CC6600" bgcolor="#CC9933" class="logobg"><div align="center" class="стиль23"> Використання службового автотранспорту </div></td>
  </tr>
  <tr>
  <td height="20" colspan="5" align="left" valign="middle" bordercolor="#CC6600" bgcolor="#CC9900" style="color:#600"><?php 
 												  
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

if ($dostup > 1) 

{ 
?>
    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="adm.php" class="стиль5">Адміністрування</a></div></td>
    <?php
};

if ($dostup == 1) 
{ 
?>

    <td align="left"  bordercolor="#CC9933" bgcolor="#CC9933" class="logobg"><div align="center"><a href="zatv.php" class="стиль5">Затвердження</a></div></td>
    <?php
};

if (($dostup == 2)||($dostup == 1)) 
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


											 <script src="calendar_ru.js"></script>
											  

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.maskedinput-1.2.2.min.js" ></script>
<script language="JavaScript" type="text/javascript">
jQuery(function($) {
$.mask.definitions['H']='[012]';
$.mask.definitions['M']='[012345]';
$('#eITDbegintime').mask('H9:M9');
$('#eITDendtime').mask('H9:M9');
});
</script>

<?php





										
// функция  explode()разбивает  строку другой строкой. В данном случае  
 
$date_e_n  = explode("-",$_GET['date_n']);
$date_e_k  = explode("-",$_GET['date_k']);
$time_e_n  = explode(":",$_GET['time_n']);
$time_e_k  = explode(":",$_GET['time_k']);

$date_nn = mktime($time_e_n[0],$time_e_n[1],0,$date_e_n[1],$date_e_n[0],$date_e_n[2]);
$date_kk = mktime($time_e_k[0],$time_e_k[1],0,$date_e_k[1],$date_e_k[0],$date_e_k[2]);
$date_stv = time();

if(isset($_POST['Submit2']))
	{
		$date_nn = $_POST['date_nn'];
		$date_kk = $_POST['date_kk'];
		$mobil = $_POST['mobil'];
		if (!($vodiy = $_POST['vodiy'])) $vodiy = "Не визначено";
		
		$punkty = $_POST['punkty'];
		$meta = $_POST['meta'];
		$podaty = $_POST['podaty'];
		$vidpov = $_POST['vidpov'];

		$punkty = strtr($punkty,"'","`");
		$punkty = strtr($punkty,"\"","`") ;
		$punkty = trim($punkty) ;

		$meta = strtr($meta,"'","`");
		$meta = strtr($meta,"\"","`") ;
		$meta = trim($meta);

		$podaty = strtr($podaty,"'","`");
		$podaty = strtr($podaty,"\"","`") ;
		$podaty = trim($podaty);

		$vidpov = strtr($vidpov,"'","`");
		$vidpov = strtr($vidpov,"\"","`") ;
		$vidpov = trim($vidpov);

		$history = date( 'H\:i d\-m\-Y', time()) . " - " . $user_auto . " з IP " . $ip .  " створив заявку та замовив машину: " . $mobil . ", водій: " . $vodiy;
		
		if (pg_query($connection, "insert into auto (stan, podav, data_otpr, data_prib, mobil, punkty, podaty, vidpov, vodiy, meta, history) values ('Створено', '$user_auto', $date_nn, $date_kk, '$mobil', '$punkty', '$podaty', '$vidpov', '$vodiy', '$meta', '$history');")) 
		{ 
		echo "<strong>Заявка створена!</strong><br>";

	$result=pg_query($connection, "select * from user_auto where login = '$login';");
	$db=pg_fetch_array($result);
	$pidr = $db['pidr'] ;
	$fone = $db['telefone'];
		$dataText = "";

	// open the file
	if(!($fp= fopen ("za/za.rtf", "r"))) die ("Can't open");
	$dataText = fread($fp, 200000);
	fclose ($fp);

	foreach ($_POST as $key=>$value) {
			$dataText = str_replace ("\{{$key}\}", iconv("UTF-8","windows-1251",$value), $dataText);
			}
			$dataText = str_replace ("\{date_n\}", iconv("UTF-8","windows-1251",date('\з H \год. i \хв. d\.m\.Y \року', $date_nn)), $dataText);
			$dataText = str_replace ("\{date_k\}", iconv("UTF-8","windows-1251",date( 'до H \год. i \хв. d\.m\.Y \року', $date_kk)), $dataText);
			$dataText = str_replace ("\{podav\}", iconv("UTF-8","windows-1251",$user_auto), $dataText);
			$dataText = str_replace ("\{pidr\}", iconv("UTF-8","windows-1251",$pidr), $dataText);
			$dataText = str_replace ("\{fone\}", iconv("UTF-8","windows-1251",$fone), $dataText);


	// save the file as an rtf
   	$timeStamp = date( 'H\:i d\-m\-Y', time());
	$saveFile = "files/".$mobil.$timeStamp.".rtf";
	$printFile= "files/".$mobil.$timeStamp.".rtf";

	if(!($fq= fopen ($saveFile, "w+"))) die ("Ошибка доступа");
	fwrite ($fq, $dataText);
	fclose ($fq);
echo "<a href='$saveFile'>Якщо документ не завантажився автоматично, його можна отримати тут.</a>";

echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='$printFile'\">";





		# Отправка уведомления Админу по почте
include('Mail.php');

 $from = "zayavky@ukrtelecom.ua";
 $to = "vukushnir@ukrtelecom.ua,olazebnyk@ukrtelecom.ua";
 $subject = "Создана заявка на автомобиль";
 $body = "\nЗаявка на автомобиль\n\n".
 		 "Хто подав заявку			- ".$user_auto.
 		 "\nПункти призначень 		- ".$punkty.
 		 "\nМета 					- ".$meta.		 
 		 "\nДата и время выезда		- ".date( 'H\:i d\-m\-Y', $date_nn).
		 "\n\nЗатвердження заяки: http://10.80.11.106/auto/zatv.php ";

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
else
{
	
$mobil = $_GET['mobil'];	
if(isset($_GET['Submit']))
	{
		if (($punkty = $_GET['punkty'])&($meta = $_GET['meta'])&($podaty = $_GET['podaty'])&($vidpov = $_GET['vidpov'])&($date_n = $_GET['date_n'])&($date_k = $_GET['date_k'])&($time_n = $_GET['time_n'])&($time_k = $_GET['time_k'])&($mobil = $_GET['mobil']))  
			{			
		$vodiy = $_GET['vodiy'];
		$result=pg_query($connection, "select * from auto where mobil = '$mobil' and mobil <> 'Легкова' and mobil <> 'Вантажна' and mobil <> 'Автобус'  and data_otpr < $date_kk and data_prib > $date_nn;");
		if(pg_num_rows($result) > 0) 
			{
				
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
	  <td bgcolor="#66CCCC"><div align="center">Відповідальний</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Куди подати автомобіль </div></td>
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
                                              <form name="form1" method="POST" action="">
                                                <p><strong>Ви впевнені, що вам потрібна машина <?php echo $mobil; ?>з водієм <?php echo $vodiy; ?> з <?php  echo date( 'H\:i d\-m\-Y', $date_nn);  ?> до <?php  echo date( 'H\:i d\-m\-Y', $date_kk);  ?> для виїзду в <?php echo $punkty; ?> з метою <?php echo $meta; ?>, відповідальний <?php echo $vidpov; ?>. Машину треба подати <?php echo $podaty; ?>
                                                <input name="mobil" type="hidden" id="mobil" value="<?php echo $mobil; ?>">
                                                <input name="punkty" type="hidden" id="punkty" value="<?php echo $punkty; ?>">
                                                <input name="meta" type="hidden" id="meta" value="<?php echo $meta; ?>">
                                                <input name="vodiy" type="hidden" id="meta" value="<?php echo $vodiy; ?>">
                                                <input name="podaty" type="hidden" id="podaty" value="<?php echo $podaty; ?>">
                                                <input name="vidpov" type="hidden" id="vidpov" value="<?php echo $vidpov; ?>">
                                                <input name="date_nn" type="hidden" id="date_nn" value="<?php echo $date_nn; ?>">
                                                <input name="date_kk" type="hidden" id="date_kk" value="<?php echo $date_kk; ?>">
                                                </strong></p>
                                                <p align="center">
                                                  <input type="submit" name="Submit2" value="Підтвердити та створити заявку">
                                                </p>
                                              </form>
                                              
                                              <p>
                                                <input type="submit" name="back" id="back" value="Повернутися" onClick="top.location.href = 'javascript:history.back()'">
                                                <?php

			
			} else 
			{
				echo "<div align=\"center\"><strong> Необхідно заповнити всі поля (водія не обов'язково)! </strong></div>";
				echo "<META HTTP-EQUIV=\"Refresh\" content =\"2; URL='javascript:history.back()'\">"; 
				echo "<a href='javascript:history.back()'><br><br><div align=\"center\"><strong> Повернутися назад до створення заявки.</strong></div></a>"; 
			}
				

		
	} 
	else

{


?>
                                              <p align="center"><strong>Заявка</strong><form method="GET" action="">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">Виберіть з якого та по який час потрібний автомобіль:</div></td>
    </tr>
  <tr>
    <td><div align="right">З
      <input name="date_n" type="text" id="date_n" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_n; ?>" size="12">
        <input name="time_n" type="text" id="eITDbegintime" value="<?php echo $time_n; ?>" size="8"  />
    </div></td>
    <td>&nbsp; до &nbsp;
      <input name="date_k" type="text" id="date_k" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_k; ?>" size="12">
      <input name="time_k" type="text" id="eITDendtime" value="<?php echo $time_k; ?>" size="8" maxlength="8"  /></td>
  </tr>
  <tr>
    <td><div align="right">Виберіть автомобіль </div></td>
    <td><select name="mobil" id="mobil">
      <?php

$result2=pg_query($connection, "select * from mobil_auto order by mobil;");
echo "<option value=''>Виберіть автомобіль</option>";
echo "<option value='Легкова'>Легкова</option>";
echo "<option value='Вантажна'>Вантажна</option>";
echo "<option value='Автобус'>Автобус</option>";
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
    </select></td>
  </tr>
  
  <tr>
    <td><div align="right">Виберіть водія </div></td>
    <td><select name="vodiy" id="vodiy">
      <?php

$result2=pg_query($connection, "select * from vodii order by vodiy;");
echo "<option value=''>Виберіть водія</option>";
while($db2=pg_fetch_array($result2)):
 $nspi=$db2['vodiy'];
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
    </select></td>
  </tr>
  
  
  <tr>
    <td><div align="right">Пункти призначень </div></td>
    <td><input name="punkty" type="text" id="punkty" value="<?php echo $punkty; ?>" size="33"></td>
  </tr>
  <tr>
    <td><div align="right">Мета</div></td>
    <td><input name="meta" type="text" id="meta" value="<?php echo $meta; ?>" size="33"></td>
  </tr>
  <tr>
    <td><div align="right">Куди та на який час подати автомобіль</div></td>
    <td><input name="podaty" type="text" id="podaty" value="<?php echo $podaty; ?>" size="33"></td>
  </tr>
  <tr>
    <td><div align="right">Відповідальний за використання автомобіля</div></td>
    <td><input name="vidpov" type="text" id="vidpov" value="<?php echo $vidpov; ?>" size="33">
      </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#66CCCC"><div align="center">
      <input type="submit" name="Submit" value="Створити заявку">
    </div></td>
    </tr>
</table>
<p>&nbsp;</p>
</form>
<br>
<a href = 'pass.php'>Змінити свій пароль</a>
<?php
}
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