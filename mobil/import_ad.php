<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php  
if (isset($_GET['tab'])) $tab = $_GET['tab']; else $tab = 0;
if(($login = $_GET['login']))
{
	
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
		$ldap_addr = "corp.ukrtelecom.loc"; 
		$adconn = ldap_connect($ldap_addr); 
		if(!$adconn)  print "can`t connect to addr {$ldap_addr}"; 
		$ldap_bind = ldap_bind($adconn, "rvsppz@corp.ukrtelecom.loc", "saksaul33"); 
		if (!$ldap_bind)  print "can`t bind user!<br />"; 
		$sr=ldap_search($adconn,"ou=Users,ou=Cherkasy,ou=KYIV,DC=corp,DC=ukrtelecom,DC=loc", "samaccountname=$login");  
		$info = ldap_get_entries($adconn, $sr);
		if ($info['count'] == 0) 
		{
			echo " <div align=\"center\"><strong style=\"color:#F00\">Ви ввели неіснуючий в Черкаській філії login - $login!!! перевірте уважно! </strong></div>"; 
			echo "<a href='javascript:history.back()'><br><br><div align=\"center\"> Повернутися назад до створення заявки <strong>(треба повторно вибрати цех). </strong></div></a>";
		} else 
		{
			$pib = explode(" ",$info[0]['name'][0]);
			$F = trim($pib[0]);
			$I = trim($pib[1]);
			$P = trim($pib[2]);
			$EMAIL = $info[0]['mail'][0];
			$PHONE = $info[0]['telephonenumber'][0];
			$POS = trim($info[0]['title'][0]);
			$VID = trim($info[0]['department'][0]);
			$SEC = trim($info[0]['physicaldeliveryofficename'][0]);
			$ADR = trim($info[0]['streetaddress'][0]);
		//	print_r($info[0]);
			
		};
}
else
{

  
?>

<form id="form1" name="form1" method="get" action="">
  <h2 align="center">Створення заявки на підключення до сервісу  <?php echo $service; ?><br>
      </h2>
  <label for="EMAIL"><strong style="color:#F00">Введіть свій логін в мережі КМПІ та натисніть "Заповнити поля автоматично",
  <br>
  в формі перевірте на коректність заповнені поля та заповніть до кінця.</strong></label>
  <input type="text" name="login" id="login" />
  <input name="tab" type="hidden" id="tab" value="<?php echo $tab; ?>" />
  <input type="submit" name="Button" id="Button" value="Заповнити поля автоматично" />
</form>

<?php

}
?>