﻿<html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->

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
  <div align="center">
    <strong>Підготовка і друк кошторису та розпорядження про відрядження.</strong>
    <div style="color:f00">(перевірте, відредагуйте за потреби та натисніть "Підтвердити")</div>
    
    
    <p><br>
    </p>
    
  </div>
  <form name="form1" method="post" action="" >
		<p align="center">
		  <?php
		if (isset($_GET['id']))
			{
				$auto_id = $_GET['id'];
				$result=pg_query($connection, "select * from auto a, vodii v where a.auto_id = $auto_id and v.vodiy = a.vodiy;");	
				$db=pg_fetch_array($result);
				$vodiy = $db['vodiy']; 
				$punkty = $db['punkty']; 
				$meta = $db['meta']; 
				$date_n = date( 'd\-m\-Y', $db['data_otpr']);
				$date_k = date( 'd\-m\-Y', $db['data_prib']);
				$date_e_n  = explode("-", $date_n);
				$date_e_k  = explode("-", $date_k);
				$termin = (mktime(0,0,0,$date_e_k[1],$date_e_k[0],$date_e_k[2])-mktime(0,0,0,$date_e_n[1],$date_e_n[0],$date_e_n[2]))/86400 + 1;
			}
		if (isset($_POST['dobovi']))
		{
			
// Начало блока РТФ			
		$dataText = "";

	// open the file
	if(!($fp= fopen ("za/comb.rtf", "r"))) die ("Can't open");
	$dataText = fread($fp, 300000);
	fclose ($fp);

	foreach ($_POST as $key=>$value) 
		{	
			if (!$value) $value = "-";
			$dataText = str_replace ("\{{$key}\}", iconv("UTF-8","windows-1251",$value), $dataText);
		}
	$summa = $_POST['dobovi'] * $_POST['termin'] + $_POST['progh'];
 	$dataText = str_replace ("\{summa\}", $summa, $dataText);

$terminv = $termin . iconv("UTF-8","windows-1251"," днів");
if ($termin == 1) $terminv = $termin . iconv("UTF-8","windows-1251"," день");
if (($termin > 1)&&($termin < 5)) $terminv = $termin . iconv("UTF-8","windows-1251"," дні");

 	$dataText = str_replace ("\{terminv\}", $terminv, $dataText);
		

	// save the file as an rtf
   	$timeStamp = date( 'H\:i d\-m\-Y', time());
	$saveFile = "files/" . $vodiy . $timeStamp.".rtf";
	$printFile= "files/" . $vodiy . $timeStamp.".rtf";

	if(!($fq= fopen ($saveFile, "w+"))) die ("Ошибка доступа");
	fwrite ($fq, $dataText);
	fclose ($fq);
	
	
if($_POST['radio'] == 'gruz') $saveFile1 = "za/podlyst.rtf";
else $saveFile1 = "za/polyst_leg.rtf";
/*
{
	// open the file
	if(!($fp= fopen ("za/podlyst.rtf", "r"))) die ("Can't open");
	$dataText = fread($fp, 200000);
	fclose ($fp);
	
}
else
{
	// open the file
	if(!($fp= fopen ("za/polyst_leg.rtf", "r"))) die ("Can't open");
	$dataText = fread($fp, 200000);
	fclose ($fp);
	
}

	foreach ($_POST as $key=>$value) 
		{	
			if (!$value) $value = "-";
			$dataText = str_replace ("\{{$key}\}", iconv("UTF-8","windows-1251",$value), $dataText);
		}
	// save the file as an rtf
//   	$timeStamp = date( 'H\:i d\-m\-Y', time());
	$saveFile1 = "files/mar_" . $vodiy . $timeStamp.".rtf";
	$printFile1 = "files/mar_" . $vodiy . $timeStamp.".rtf";


	if(!($fq= fopen ($saveFile1, "w+"))) die ("Ошибка доступа");
	fwrite ($fq, $dataText);
	fclose ($fq);

*/	
echo "<a href='$saveFile1'>Подорожній лист можна отримати тут.</a><br><br>";


	
echo "<a href='$saveFile'>Розпорядження  можна отримати тут.</a>";




// конец блока ртф		
			
// Здесь все значения полей записываются в переменные
/*		$termin = $_POST['termin'];
//		$vodiy = $_POST['vodiy'];
		$dobovi = $_POST['dobovi'];
		$punkty = $_POST['punkty'];
		$meta = $_POST['meta'];
		$progh = $_POST['progh']; 
		$date_n = $_POST['date_n'];
		$date_k = $_POST['date_k'];
		$posada = $_POST['posada'];
echo "Натиснувши відповідну кнопку ви роздрукуете документи про відрядження в $punkty водія $vodiy з метою $meta на $termin діб та з добовими $dobovi грн./день:";
		$vodiy = urlencode($vodiy);
		$punkty = urlencode($punkty);
		$meta = urlencode($meta);
		$posada = urlencode($posada);
*/		
?>
		  </p>
		<p align="center">&nbsp;</p>
		<p>
		  <?php
		} 
		else 
		{
		?>
		  </p>
		<table width="100%" border="0">
          <tr>
            <td>Водій
              <input name="vodiy" type="text" id="vodiy" value="<?php echo $vodiy ?>"></td>
            <td>Перебуває на посаді
              <input name="posada" type="text" id="posada" value="Водій автотранспортних засобів" size="37"></td>
          </tr>
          <tr>
            <td>Кількість діб
              <input name="termin" type="text" id="termin" value="<?php echo $termin ?>"></td>
            <td>Добові
              <input name="dobovi" type="text" id="dobovi" value="70"></td>
          </tr>
          <tr>
            <td>Куди (місто, населений пункт)
              <input name="punkty" type="text" id="punkty" value="<?php echo $punkty ?>"></td>
            <td>Витрати на проживання 
              <input name="progh" type="text" id="progh"></td>
          </tr>
          <tr>
            <td align="left">Підприємство
              <input name="priznach" type="text" id="priznach">
              <span style="color:#F00">(відредагуйте за необхідності)</span></td>
            <td ><input name="radio" type="radio" id="gruz" value="gruz">
              Вантажний автомобіль
                <input name="radio" type="radio" id="leg" value="leg" checked="CHECKED">
                Легковий автомобіль</td>
          </tr>
          <tr>
            <td>Мета
              <input name="meta" type="text" id="meta" value="<?php echo $meta ?>" size="37"></td>
            <td>Відрядити з 
              <input name="date_n" type="text" id="date_n" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_n; ?>" size="12">
              до
              <input name="date_k" type="text" id="date_k" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_k; ?>" size="12"></td>
          </tr>
        </table>
		<p align="center">
		  <input type="submit" name="Submit" value="Підтвердити">
		  <?php
		}
		?>
		  </p>
		</form>	<input type="submit" name="back" id="back" value="Повернутися" onClick="top.location.href = 'javascript:history.back()'">	
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