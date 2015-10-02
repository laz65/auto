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


<table width="100%" border="0" cellpadding="0" cellspacing="0" >
    <tr width="100%">
    <td height="20" align="center"  ><div align="center">&nbsp;</div></td>
    <td ><div align="center">&nbsp;</div></td>
    <?php 
												  
if ($dostup > 0) 

{ 
?>
    <td align="left"  ><div align="center">&nbsp;</div></td>
    <?php
};

if ($dostup == 1) 
{ 
?>

    <td align="left"  ><div align="center">&nbsp;</div></td>
    <?php
};

if ($dostup == 2) 
{ 
?>
    <td align="left"  ><div align="center">&nbsp;</div></td>
    <?php
};


?>
  </tr>
</table>
											  
                                              <a name="nachalo"></a>
											  <FORM ENCTYPE="multipart/form-data" ACTION="" METHOD=POST>
											    <table width="100%" border="3" bordercolor="#FFCC00">
    <tr>
      <td bordercolor="#FFCC00"><strong>3. Повне видалення усіх списків з бази
          <input name="vydal" type="checkbox" id="vydal" value="checkbox">
      </strong></td>
    </tr>
    <tr>
      <td bordercolor="#FFCC00"><strong>
        4. Виберіть файл:
            <input name="myfile" type="file">
        <input name="submit" type="submit" style="height: 25px" value="ЗАВАНТАЖИТИ">
        ;; -
         <input name="rozd" type="checkbox" id="rozd" value="checkbox">
      </strong></td>
    </tr>
  </table>
  </FORM>

                                              <p><a href="#konec">перехід в кінець</a>                                             </p>
                                                
<?php

if(isset($_FILES["myfile"])) 
{ 
  	$myfile = $_FILES["myfile"]["tmp_name"]; 
  	$error_flag = $_FILES["myfile"]["error"]; 
  	copy ($myfile, "/tmp/vrem.tmp") ; 
	$err = 0;
  	$vydal=isset($_POST["vydal"]); 
	if(isset($_POST['rozd'])) $rozd = ";"; else $rozd = ",";
        		
            // Получаем содержимое файла 
    if(!($fp = fopen("/tmp/vrem.tmp","r")))
    	echo " Файл не отркрывается!!! " ;

	$kilk_zap = 0;	
//	while (($data = fgetcsv($fp, 512, $rozd)) !== FALSE) 
//	{

	while (($data0 = fgets($fp) ) !== FALSE) 
	{
		$data0 = iconv("windows-1251","UTF-8",$data0);
		$data0 = strtr($data0,"'","`");
		$data0 = strtr($data0,"\"","`") ;
		$data0 = strtr($data0,"\n","") ;
		$data0 = strtr($data0,"\r","") ;

		
//		echo "<br> $data0 <br>";
//		$data = str_getcsv($data0, ";");
		$data = split ($rozd, $data0, 3);
		$data[1] = trim($data[1]);



	    $num = count($data);
        
    	$row++;
        if (($num == 3)||($num == 2))
        {    
    	    if ($row == 1) 
    	    {	  
	
				if(isset($_POST['vydal']))
				{
					if (pg_query($connection, "TRUNCATE TABLE vodii") !== FALSE)
					{
						echo "<span class=\"стиль4\">Всі записи в базі видалені! </span><br/>";
						pg_query($connection, "ALTER SEQUENCE vodii_seq  RESTART WITH 1;");		
					}
				}
                                                            
    	    };
			$mobil = $data[1];
			if (pg_query($connection, "INSERT INTO vodii (vodiy) VALUES ('$mobil');") !== FALSE)
	    	{
				$kilk_zap++;
					
	    	} else 
			{
				echo "<span class=\"стиль4\">Запис про номер $data[0], - $data[1] неможливо занести в базу. </span><br/>";
				$err++;
			}
		} 
		else 
		{
			echo "<h3><span class=\"стиль4\">ЗАПИС ПОВИНЕН МАТИ ФОРМУ: телефон, сума_боргу, число<br />";
			echo "КОЖЕН ЗАПИС НА ОКРЕМІЙ СТРОЦІ ТІЛЬКИ ЦИФРИ ТА КОМА,<br />";
			echo "БЕЗ СТОРОННІХ СИМВОЛІВ!!! ПЕРЕВІРТЕ ФАЙЛ!!!.</span></h3>";
			$err = 99999999;
			break;
		}        
     }
fclose($fp);	 
unlink("/tmp/vrem.tmp") ; 


if ($err == 0) echo "<h3><span class=\"стиль11\">Імпорт файла завершено. Добавлено $kilk_zap записів.</span></h3>" ; else if ($err != 99999999) echo "<h3><span class=\"стиль4\">Імпорт файла завершено, але в файлі були помилки, тому було виключено $err записів (Див. вище)! Добавлено $kilk_zap записів.</span></h3>";
}



?>
                                             
     
     
      <p class="стиль4"><a name="konec" id="konec"></a><span class="стиль11"><a href="#nachalo">перехід на початок </a></span></p>

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