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
											  <div align="center" style="font:large;color:#C90">
											    <p><strong>Інструкція користувача системи &quot;Використання службового автотранспорту&quot;</strong></p></div>
											    <table border="1"  width="100%" align="center">
											      <tr align="center">
											        <td><h1>Створення заявки на автотранспорт.</h1>
                                                      <p>Для створення заявки потрібно клікнути  мишкою на вкладці «Заявка». <br>
  &nbsp; <br>
  <img src="help_clip_image003.jpg" alt="1" width="624" height="130"></p>
                                                      <p>            Відбудеться  перехід  на сторінку створення заявки:<br>
                                                        <img src="help_clip_image005.jpg" alt="2" width="552" height="323"><br>
                                                        На цій сторінці потрібно  заповнити всі поля, крім водія. Якщо немає необхідності в конкретній машині,  виберіть тип – легкова, вантажна чи автобус. За необхідності виберіть також і  водія. Натискаємо кнопку «Створити заявку». Після цього переходимо до діалогу:<br>
  <img src="help_clip_image007.jpg" alt="3" width="564" height="162"><br>
                                                        Після перевірки правильності заявки  треба натиснути «Підтвердити на створити заявку». <br>
                                                        Після цього буде сформовано заповнений  бланк заявки, який можна завантажити та роздрукувати на принтері. Бланк  підписується та передається на затвердження. Якщо документ потрібно завантажити ще раз, посилання на документи за поточний тиждень знаходиться на сторінці &quot;Перелік заявок&quot; знизу.</p>
                                                      <h1>Видалення помилкової заявки.</h1>
                                                      <p>Користувач, який створив заявку  може видалити її до того, як вона буде затверджена керівництвом. Для цього  треба перейти до сторінки «Перелік заявок». Серед списку заявок знайти свою  помилкову, та натиснути кнопку «Видалити заявку»:<br>
                                                        <img src="help_clip_image009.jpg" alt="4" width="564" height="207"><br>
                                                        Якщо заявка вже затверджена,  видалити її неможливо. В такому випадку треба інформувати групу при  керівництві, в необхідності відхилити заявку.</p>
                                                      <h1>Робота з переліком заявок.</h1>
                                                      <p>&nbsp;</p>
                                                      <p>            На вкладці  перелік заявок можна бачити заявки, у яких не вийшов термін.<br>
                                                        Для зручності заявки виділяються кольором в залежності від  стану: </p>
                                                      <ul>
                                                        <li>затверджені – жовтим,</li>
                                                        <li>затверджені та погоджені з автобазою – блакитним,</li>
                                                        <li>затверджені, погоджені з автобазою, та на які вже  підписані фінансові документи для водія – зеленим.</li>
                                                      </ul>
                                                      <p>При відмітці прапорця  «Відображати історію» замість поля з користувачем з&rsquo;являється поле з історією  усіх змін даної заявки.<br>
                                                        При натисканні  посилання «до архіву» попадаємо в архів заявок, де можна вибрати діапазон дат  відправлення автомобілів та продивитись заявки для цього періоду:<br>
  <img src="help_clip_image011.jpg" alt="5" width="511" height="287"></p>
                                                      <p>Якщо вже відомий водій, можна в  будь-який час роздрукувати заповнені документи на нього. Для цього натискаємо  кнопку «Друк документів» і з&rsquo;являється наступний діалог:<br>
                                                        <img src="help_clip_image013.jpg" alt="6" width="536" height="222"><br>
                                                        Потрібно  заповнити чи змінити необхідні поля та натиснути «Підтвердити». Буде сформовано  та завантажено документ з кошторисом та розпорядженням про відрядження, який  можна роздрукувати. Якщо документ потрібно завантажити ще раз, посилання на документи за поточний тиждень знаходиться на сторінці &quot;Перелік заявок&quot; знизу.</p>
                                                    <p></p></td>
										          </tr>
										        </table>
											    <h1>&nbsp;</h1>
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