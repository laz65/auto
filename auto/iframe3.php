<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>jQuery Print Plugin</title>	
	    <style type="text/css">
<!--
.стиль1 {
	font-size: 14;
	font-family: "Times New Roman", Times, serif;
}
-->
        </style>
</head>
	<body>
    <p><?php 
function funct($mec) {
	switch ($mec)
		{
			case 1:
				echo ' січня ';
				break;
	
			case 2:
				echo ' лютого ';
				break;
	
			case 3:
				echo ' березня ';
				break;
	
			case 4:
				echo ' квітня ';
				break;
	
			case 5:
				echo ' травня ';
				break;

			case 6:
				echo ' червня ';
				break;

			case 7:
				echo ' липня ';
				break;

			case 8:
				echo ' серпня ';
				break;

			case 9:
				echo ' вересня ';
				break;

			case 10:
				echo ' жовтня ';
				break;

			case 11:
				echo ' листопада ';
				break;

			case 12:
				echo ' грудня ';
				break;

			default:
				// например, светофор выключен
				;
				break;
		}	
}	
	$vodiy = $_GET['vodiy'];
	$termin = $_GET['termin'];
	$dobovi = $_GET['dobovi'];
	$progh = $_GET['progh'];
	$posada = $_GET['posada'];
	$punkty = $_GET['punkty'];
	$meta = $_GET['meta'];
	$date_n = $_GET['date_n'];
	$date_e_n  = explode("-", $date_n);
	$date_k = $_GET['date_k'];
	$date_e_k  = explode("-", $date_k);

?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="2%" height="633" valign="top">&nbsp;</td>
        <td width="44%" valign="top"><p align="right" class="стиль1"><a href="/media/library/logo/hor_ua.png" target="_blank"></a><img src="hor_ua1.png" alt="" width="194" height="60" /></p>
          <p align="center" class="стиль1">&nbsp;</p>
          <p align="center" class="стиль1">РОЗПОРЯДЖЕННЯ<br>
          на службове відрядження</p>
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>______________________</td>
              <td><div align="right">№____________________</div></td>
            </tr>
          </table>
          <p align="left" class="стиль1">Відрядити <?php echo $vodiy; ?></p>
          <p align="left" class="стиль1">Перебуваючого на посаді <?php echo $posada; ?></p>
          <p align="left" class="стиль1">В країну Україна, місто <?php echo $punkty; ?></p>
          <p align="left" class="стиль1">Мета відрядження: <?php echo $meta; ?></p>
          <p align="left" class="стиль1">Термін відрядження <?php echo $termin; ?> днів </p>
          <p align="left" class="стиль1">з <?php echo "\"$date_e_n[0]\"";  funct($date_e_n[1]); echo $date_e_n[2]; ?> року до <?php echo "\"$date_e_k[0]\"";  funct($date_e_k[1]); echo $date_e_k[2]; ?> року. </p>
          <p align="left" class="стиль1">Проїзд дозволяється на автомобілі</p>
          <p align="left" class="стиль1">&nbsp;</p>
          <p align="left" class="стиль1">Директор _____________________________</p>
          <p align="left" class="стиль1">Погоджено:</p>
        <p align="left" class="стиль1">_____________________________________ </p></td>
        <td width="1%">&nbsp;</td>
        <td width="50%" valign="top"><p align="right" class="стиль1">ЗАТВЕРДЖУЮ</p>
          <p align="right" class="стиль1">В.о.директора ЧФ ПАТ &quot;Укртелеком&quot;</p>
          <p align="right" class="стиль1">__________________В.В.Павленко</p>
          <p align="right" class="стиль1">&quot;_____&quot;_________________201__р. </p>
          <p align="center" class="стиль1">&nbsp;</p>
          <p align="center" class="стиль1">К О Ш Т О Р И С</p>
          <blockquote class="стиль1">
            <p align="left"> Витрат на відрядження працівника ЦТП транспортного цеху</p>
            <p align="left">Пункт призначення: м. Черкаси, 	 ЧФ ПАТ &quot;Укртелеком&quot;</p>
            <p align="left">Мета відрядження: <?php echo $meta ?> </p>
          </blockquote>
          <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td class="стиль1"><div align="center">№ п/п </div></td>
              <td class="стиль1"><div align="center">П.І.Б.</div></td>
              <td class="стиль1"><div align="center">Термін відрядження (к-ть діб) </div></td>
              <td class="стиль1"><div align="center">Витрати на проїзд </div></td>
              <td class="стиль1"><div align="center">Витрати на проживання </div></td>
              <td class="стиль1"><div align="center">Добові</div></td>
              <td class="стиль1"><div align="center">Загальна сумма </div></td>
            </tr>
            <tr>
              <td class="стиль1"><div align="center">1.</div></td>
              <td class="стиль1"><div align="center"> <?php echo $vodiy ?> &nbsp;</div></td>
              <td class="стиль1"><div align="center"> <?php echo $termin ?> &nbsp;</div></td>
              <td class="стиль1"><div align="center">-&nbsp;</div></td>
              <td class="стиль1"><div align="center"> <?php echo $progh ?> &nbsp;</div></td>
              <td class="стиль1"><div align="center"> <?php echo $dobovi ?> &nbsp;</div></td>
              <td class="стиль1"><div align="center"> <?php echo $termin*$dobovi+$progh ?> &nbsp;</div></td>
            </tr>
          </table>
          
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="77%"><p class="стиль1">В.о.начальника ЦТП </p>                </td>
                <td width="23%"><span class="стиль1">&nbsp;  В.В.Різник </span></td>
              </tr>
            </table>
            <p class="стиль1">ПОГОДЖЕНО:</p>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="77%"><span class="стиль1">Заступник директора <br />
                з питань економіки та фінансів </span></td>
                <td width="23%"><span class="стиль1">.I.І.Хрипченко</span></td>
              </tr>
            </table>
        </td>
        <td width="3%" valign="top"><p align="right" class="стиль1">&nbsp;</p>
          <p align="left">&nbsp;</p>
        <p align="left">&nbsp;</p></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    </body>
</html>