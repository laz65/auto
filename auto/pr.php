
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




<table width="100%" border="1">
  <tr>
    <td><div align="right">З
      <input name="date_n" type="text" id="date_n" onfocus="this.select();lcs(this)"
	onclick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_n; ?>" size="12" />
      <input name="time_n" type="text" id="eITDbegintime" value="<?php echo $time_n; ?>" size="8"  />
    </div></td>
    <td>&nbsp; до &nbsp;
      <input name="date_k" type="text" id="date_k" onfocus="this.select();lcs(this)"
	onclick="event.cancelBubble=true;this.select();lcs(this)" value="<?php echo $date_k; ?>" size="12" />
      <input name="time_k" type="text" id="eITDendtime" value="<?php echo $time_k; ?>" size="8" maxlength="8"  /></td>
  </tr>
</table>
<br><input type="button" name="Button" value="Затвердити" onClick="top.location.href = 'stan0.php?stan=Затверджено'+'&date_n='+document.getElementById('date_n').value+'&time_n='+document.getElementById('eITDbegintime').value+'&date_k='+document.getElementById('date_k').value+'&time_k='+document.getElementById('eITDendtime').value">

<?php


?>
