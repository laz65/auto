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
    <p>
	<?php
	$vodiy = $_GET['vodiy'];
	$termin = $_GET['termin'];
	$dobovi = $_GET['dobovi'];
	$progh = $_GET['progh'];
	$meta = $_GET['meta'];
?>

&nbsp;	</p>
	</p>
    <p align="right" class="стиль1">ЗАТВЕРДЖУЮ</p>
    <p align="right" class="стиль1">В.о.директора ЧФ ПАТ &quot;Укртелеком&quot;</p>
    <p align="right" class="стиль1">__________________В.В.Павленко</p>
    <p align="right" class="стиль1">&quot;_____&quot;_________________201__р. </p>
    <p align="right" class="стиль1">&nbsp;</p>
    <p align="center" class="стиль1">К О Ш Т О Р И С</p>
    <blockquote class="стиль1">
      <p align="left"> Витрат на відрядження працівника ЦТП транспортного цеху</p>
      <p align="left">Пункт призначення: м. Черкаси, 	 ЧФ ПАТ &quot;Укртелеком&quot;</p>
      <p align="left">Мета відрядження: 
        <?php echo $meta ?>      </p>
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
        <td class="стиль1"><div align="center">
          <?php echo $vodiy ?>
        &nbsp;</div></td>
        <td class="стиль1"><div align="center">
          <?php echo $termin ?>
        &nbsp;</div></td>
        <td class="стиль1"><div align="center">-&nbsp;</div></td>
        <td class="стиль1"><div align="center">
          <?php echo $progh ?>
        &nbsp;</div></td>
        <td class="стиль1"><div align="center">
          <?php echo $dobovi ?>
        &nbsp;</div></td>
        <td class="стиль1"><div align="center">
          <?php echo $termin*$dobovi+$progh ?>
        &nbsp;</div></td>
      </tr>
    </table>
    <p align="left" class="стиль1">&nbsp;</p>
    <p align="left" class="стиль1">&nbsp;</p>
    <blockquote>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="58%"><span class="стиль1">В.о.начальника ЦТП </span></td>
          <td width="42%"><span class="стиль1">&nbsp;  В.В.Різник
           
          </span></td>
        </tr>
      </table>
      <p align="left" class="стиль1">
      <pre class="стиль1">&nbsp;


</pre>
      <p class="стиль1">ПОГОДЖЕНО:</p>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="58%"><span class="стиль1">Заступник директора
<br>з питань економіки та фінансів </span></td>
          <td width="42%"><span class="стиль1">.І.Хрипченко</span></td>
        </tr>
      </table>
      <p class="стиль1">&nbsp;</p>
      <p class="стиль1">&nbsp;</p>
      <pre class="стиль1">   					І</pre>
    </blockquote>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp; </p>
	</body>
</html>