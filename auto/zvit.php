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
                                              
 <h2>
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



?>
  <div align="center"> Звіт по використанню службового автотранспорту в форматі Excel </div>
 </h2>
 <form name="form1" method="post" action=""> 
                            <p>
<br>Звіт за період з 
      <input name="date_n" type="text" id="date_n" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_n; ?>" size="12">
      &nbsp; до &nbsp;
      <input name="date_k" type="text" id="date_k" onFocus="this.select();lcs(this)"
	onClick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_k; ?>" size="12">
      (виберіть дату  початку та кінця періоду)                                              </p>
                                                <p>
                                                  <input type="submit" name="Send" id="Send" value="Зформувати">
                                                </p>
                                              </form>
                                              <p><br>
                                              </p>
                                              <p>
<?php
if (isset($_POST['Send']))
{
										
// функция  explode()разбивает  строку другой строкой. В данном случае  
 
$date_e_n  = explode("-",$_POST['date_n']);
$date_e_k  = explode("-",$_POST['date_k']);
$time_e_n  = explode(":","00:00");
$time_e_k  = explode(":","23:59");

$date_nn = mktime($time_e_n[0],$time_e_n[1],0,$date_e_n[1],$date_e_n[0],$date_e_n[2]);
$date_kk = mktime($time_e_k[0],$time_e_k[1],0,$date_e_k[1],$date_e_k[0],$date_e_k[2]);
$date_stv = time();


require_once '../Classes/PHPExcel/IOFactory.php'; // подключается библиотека для работы с excel
$objPHPExcel = PHPExcel_IOFactory::load("za/zvit.xls");  // Загружается шаблон


//$rik = 2013;
$result=pg_query($connection, "select * from auto where stan like '%джено%' and data_otpr < $date_kk and data_prib > $date_nn order by data_otpr;"); // из базы выбираются подразделения
//$kilkpidr = pg_num_rows($result);  // количество подразделений
$n = 0;
$nray = 0;
$chas_zag = 0;
$chas_ray  = 0;
$objPHPExcel->setActiveSheetIndex(0);
$aSheet = $objPHPExcel->getActiveSheet(); // связывается переменная с активным листом
$aSheet->setCellValue('A1',"Звіт по використанню автотранспорту за період з $_POST[date_n]р по $_POST[date_k]р."); 
while($db=pg_fetch_array($result))
	{
		$var = strpos($db['history'], "IP 10.80."); 
		$nomip = substr($db['history'], $var+9, 4);
		$var = strpos($nomip, "."); 		
		$nom = explode(".",$nomip);
	  $objPHPExcel->getActiveSheet()->insertNewRowBefore(4+$n++, 1); //вставляется пустая строка
	 if($nom[0] > 29)
	 {
	  $aSheet->getStyle('E'.($n + 2))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	  $aSheet->getStyle('E'.($n + 2))->getFill()->getStartColor()->setRGB('CCFFCC');
	  $chas_ray = $chas_ray + $db['data_prib'] - $db['data_otpr'];
	  $nray++;
	 }
	 else 
	 {
	  $aSheet->getStyle('E'.($n + 2))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	  $aSheet->getStyle('E'.($n + 2))->getFill()->getStartColor()->setRGB('FFFFCC');
		 
	 }
	  $aSheet->setCellValue('A'.($n + 2),$n); 
	  $aSheet->setCellValue('B'.($n + 2),$db['mobil'],", ",$db['meta']); // автомобиль
	  $aSheet->setCellValue('C'.($n + 2),date( 'H\:i d\-m\-Y', $db['data_otpr'])); // автомобиль
	  $aSheet->setCellValue('D'.($n + 2),date( 'H\:i d\-m\-Y', $db['data_prib'])); // автомобиль
	  $aSheet->setCellValue('E'.($n + 2),$db['history']); // автомобиль
	  $aSheet->setCellValue('F'.($n + 2),$db['punkty'],", ",$db['meta']); // автомобиль
	  $aSheet->setCellValue('G'.($n + 2),$db['passinf']); // автомобиль
	  $aSheet->setCellValue('H'.($n + 2),$db['vantinf']); // автомобиль
	  $aSheet->setCellValue('I'.($n + 2),$db['vodiy']); // автомобиль
	  $chas_zag = $chas_zag + $db['data_prib'] - $db['data_otpr'];
	}

$saveFile = 'files/zvit.xls';
$printFile = $saveFile;
$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$writer->save($saveFile);

$zag_god = $chas_zag/3600;
$ray_god = $chas_ray/3600;
echo "<p>Усого за період з $_POST[date_n] по $_POST[date_k] було $n затверджених заявок (в районах - $nray), загальний час використання транспорту складає $zag_god годин, в районах - $ray_god годин. <br> Зеленим кольором виділено замовлення машини з району.</p>";
echo "<a href='$saveFile'>Якщо документ не завантажився автоматично, його можна отримати тут.</a>";

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