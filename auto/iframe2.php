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
.стиль2 {font-size: 18px; font-family: "Times New Roman", Times, serif; }
-->
        </style>
</head>
	<body>
    <p>
	<?php
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
				echo ' бересня ';
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

&nbsp;	</p>
	</p>
    <div align="right"><img src="hor_ua1.png" alt="" width="300" height="89" />    </div>
    <p>&nbsp;</p>
    <p align="center" class="стиль2">РОЗПОРЯДЖЕННЯ</p>
    <p align="center" class="стиль2">на службове відрядження </p>
    <p align="right" class="стиль1">&nbsp;</p>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>____________________________</td>
        <td><div align="right">№__________________________</div></td>
      </tr>
    </table>
    <p align="left" class="стиль1">Відрядити <?php echo $vodiy; ?></p>
    <p align="left" class="стиль1">Перебуваючого на посаді <?php echo $posada; ?></p>
    <p align="left" class="стиль1">В країну Україна, місто  <?php echo $punkty; ?></p>
    <p align="left" class="стиль1">Мета відрядження:  <?php echo $meta; ?></p>
    <p align="left" class="стиль1">Термін відрядження  <?php echo $termin; ?> днів  </p>
    <p align="left" class="стиль1">з <?php echo "\"$date_e_n[0]\"";  funct($date_e_n[1]); echo $date_e_n[2]; ?> року до <?php echo "\"$date_e_k[0]\"";  funct($date_e_k[1]); echo $date_e_k[2]; ?> року. </p>
    <p align="left" class="стиль1">Проїзд дозволяється на автомобілі</p>
    <p align="left" class="стиль1">Директор _____________________________</p>
    <p align="left" class="стиль1">Погоджено:</p>
    <p align="left" class="стиль1">_____________________________________	 </p>
	</body>
</html>