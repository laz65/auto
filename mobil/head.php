<?php
 $host = "send.ukrtelecom.net";
 $username = "zayavky";
 $password = "P@ssw0rd";
 $from = "zayavky@ukrtelecom.ua";
$server = "http://10.80.10.202/";
$portal = "$server/Doc/portal.doc";
$koord  = "$server/Doc/koord.doc";
$plan   = "$server/Doc/plan.doc";
$us     = "$server/Doc/us.doc";
$povrem = "$server/Doc/povrem.doc";
$kadry  = "$server/Doc/kadry.doc";
$date_new="25.01.2013 �.";
$back="<BODY background=\"".$server."green.jpg\" bgproperties=fixed>";
$PDB	= "";
$key_name_id = "������� ��������"; # Sertificate
$key_name2_id ="������� �������a";
$key_random_id = rand();
$autor = " <b>&copy;������ ��������</b><br> ���. (0472) 45-70-34<br>��������� ���������� -  $date_new ";
//echo $back;
function translit($st)
  {
    $st=strtr($st,"������������������������_", "abvgdeezyyklmnoprstufh'iei");
    $st=strtr($st,"�����Ũ������������������_", "ABVGDEEZYYKLMNOPRSTUFH'IEI");
    $st=strtr($st,
         array(
                "�"=>"zh", "�"=>"ts", "�"=>"ch", "�"=>"sh",
                "�"=>"shch","�"=>"", "�"=>"yu", "�"=>"ya",
                "�"=>"Zh", "�"=>"Ts", "�"=>"Ch", "�"=>"Sh",
                "�"=>"Shch","�"=>"", "�"=>"Yu", "�"=>"Ya",
                "�"=>"i", "�"=>"Yi", "�"=>"ie", "�"=>"Ye",
				"`"=>""
               )
             );
    return $st;
  }

function ShowTree($ParentID, $lvl)
 {
 global $link;
 global $lvl;
 global $VID;
 global $SEC;
 $VID = preg_replace ("/i/","�",$VID);
 $SEC = preg_replace ("/i/","�",$SEC);
 $VID = preg_replace ("/� /","�",$VID);
 if ($VID == '������ ���������') $VID = '��������� ��������� ��볿';
  $lvl++;
   $sSQL = "SELECT id, name, pid FROM structure WHERE pid = " . $ParentID . " ORDER BY name";
    $result = mysql_query($sSQL, $link);
    $rez_all='';
	 echo "<table border=1> <tr> <td>�����</td><td>";

     echo "<select name=\"VID\" id=\"VID\">\n";
     if (mysql_num_rows($result) > 0)
     		{
     			    while ( $row = mysql_fetch_array($result) )
     		{          $ID1 = $row["id"];
      			echo "<option value='" . $row["name"] . "'";
				
				// ��� ������� ��� VID
				$vid1 = preg_replace ("/i/","�",$row["name"]);
 				if (strlen($VID) == 32) $VID.=" ";
				//echo $vid1;
				if (strncmp($vid1, $VID,33) == 0)  echo " selected='selected'";
				
				echo ">". $row["name"]."</option>\n";
        		$rez_all.=Show_near($row["id"]);
      			$lvl--;
       		}
       }
        echo "</select></td></tr><tr><td>���</td><td>";
        $rez_all="\n\n\n<select name=\"SEC\" id=\"SEC\">\n".$rez_all." </select>\n</td></tr>";
        return $rez_all;
       }




        function Show_near ($par_id)
        {
			global $SEC;  
		$sql1 = "Select * From structure where id =".$par_id;
        $first = mysql_query($sql1);
	         $rez='';
 	        while ($class_name1 = mysql_fetch_array($first))
         	{
         		    $sql2 = "Select * from structure where pid =".$class_name1['id'];
          			$second2 = mysql_query($sql2);


		          while ($class_name = mysql_fetch_array($second2))
		          {
//����������		
            if($class_name['name'] != "���������� ��������") 
			{
				$rez.="   <option  class='".$class_name1['name']."'  value=' '></option>\n <option class='".$class_name1['name']."'  value='" . $class_name["name"] ."'";
				// ������� ��� SEC
							$sec1 = trim(preg_replace ("/i/","�",$class_name["name"]));
							if (strcasecmp($sec1, $SEC) == 0) 
							{
								$SEC = "";
								$rez.=" selected='selected'";
							};
				$rez.= ">". $class_name["name"] ."</option>\n";
				
			}
// ����� ���
					  
					  
		          	$sql2 = "Select * from structure where pid =".$class_name['id'];
          			$second = mysql_query($sql2);
          				while ( $row = mysql_fetch_array($second)
          			)
           				{
            				$rez.="<option class='".$class_name1['name']."'  value='" . $row["name"] . "'" ;
							
							// ������� ��� SEC
							$sec1 = trim(preg_replace ("/i/","�",$row["name"]));
							if (strcasecmp($sec1, $SEC) == 0) 
							{
								$SEC = "";
								$rez.=" selected='selected'";
							};
							$rez.= ">".$row["name"]."</option>\n";
             			}

            	}
            }

             return $rez;
        }



?>