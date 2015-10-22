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
<script src="calendar_ru.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.maskedinput-1.2.2.min.js" ></script>
<div align="center"><span class="стиль24">Погодження</span></div>
<?php
if (!($dostup>>0&1)) echo "<META HTTP-EQUIV=\"Refresh\" content =\"0; URL='index.php'\">"; else
{
$date_now = time();										  
$result=pg_query($connection, "select * from auto a, user_auto u where a.podav = u.user_auto  and a.data_prib > $date_now  order by a.stan desc, a.data_otpr;");	
?>
<table width="100%" border="1">
	<tr>
	  <td bgcolor="#66CCCC"><div align="center">Машина</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата виїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Дата приїзду </div></td>
	  <td bgcolor="#66CCCC"><div align="center">Хто подав заявку </div></td>
	  <td bgcolor="#66CCCC"><div align="center" width="20%">Пункти призначень та мета</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Пассажири</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Інформація про вантаж</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Водій</div></td>
	  <td bgcolor="#66CCCC"><div align="center">Стан</div></td>
	</tr>
<?php 
$nn = 0;
while ($db=pg_fetch_array($result)):
?>	
<script language="JavaScript" type="text/javascript">
jQuery(function($) {
$.mask.definitions['H']='[012]';
$.mask.definitions['M']='[012345]';
$('#eITDbegintime<?php echo ++$nn; ?>').mask('H9:M9');
$('#eITDendtime<?php echo $nn; ?>').mask('H9:M9');
});
</script>

<form metod = GET action="stan0.php">
	<tr
<?php 
	if($db['stan'] == "Створено") echo " bgcolor=\"#FFFFFF\""; else
	if($db['stan'] == "Відмовлено") echo " bgcolor=\"#FF9999\""; else 
	echo " bgcolor=\"#99FF99\"";  
	echo " title=\"",$db['history'],"\"";
?>  	
	 align="left">
	  <td><?php echo $db['mobil']; ?>&nbsp;</td>

	  <td>      <input name="date_n" type="text" id="date_n" onFocus="this.select();lcs(this)"
	onclick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo date( 'd\-m\-Y', $db['data_otpr']); ?>" size="8" />
      <input name="time_n" type="text" id="eITDbegintime<?php echo $nn; ?>" value="<?php echo date( 'H\:i', $db['data_otpr']); ?>" size="5"  />
</td>
	  <td> <input name="date_k" type="text" id="date_k" onFocus="this.select();lcs(this)"
	onclick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo date( 'd\-m\-Y', $db['data_prib']); ?>" size="8" />
      <input name="time_k" type="text" id="eITDendtime<?php echo $nn; ?>" value="<?php echo date( 'H\:i', $db['data_prib']); ?>" size="5" maxlength="8"  /></td>
</td>
	  <td><?php echo $db['podav'], " ,", $db['pidr'], ", тел:", $db['telefone'] ; ?>&nbsp;</td>
	  <td><?php echo $db['punkty'],", ",$db['meta']; ?>&nbsp;</td>
	  <td><?php echo $db['passinf']; ?>&nbsp;</td>
	  <td><?php echo $db['vantinf']; ?>&nbsp;</td>
	  <td><?php echo $db['vodiy']; ?>&nbsp;</td>
	  <td><?php echo $db['stan']; ?>&nbsp;
	    <input name="id" type="hidden" id="id" value="<?php echo $db['auto_id']; ?>">

		 <?php 
		 if(($db['stan'] == "Затверджено, пог. з автобазою")|($db['stan'] == "Затверджено")|($db['stan'] == "Погоджено")|($db['stan'] == "Погоджено, пог. з автобазою")|($db['stan'] == "Не потребує погодження"));
		 else {
		 ?>
        <br><input type="submit" name="Submit" value="Погодити" >
		 <?php
		  };
		  if($db['stan'] != "Відмовлено")
		  {
		 ?>        
	    <br><input type="submit" name="Submit2" value="Відмовити" >
         <?php
		  }
		 ?>
       
        </td>
	</tr>
</form>
<?php

endwhile;
?>
  </table>
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