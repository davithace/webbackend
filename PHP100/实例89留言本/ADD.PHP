<?
	require("config.php");
	$sqldo="select count(*) as title from $mytable where sub_id<1";
	$result=mysql_query($sqldo);
	$message_count=mysql_result($result,0,"title");
?>
<table border="0" width="75%" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="FFEAA2">
    <td width="100%" height="18" valign="bottom" align="right">����������<font color=red><?echo $message_count?></font> | <a href="guestbook.php">������</a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<?
	if ($doadd)
	{
	    $name=htmlspecialchars($name);
	    $email=htmlspecialchars($email);
	    $comefrom=htmlspecialchars($comefrom);
	    $homepage=htmlspecialchars($homepage);
	    $icq=htmlspecialchars($icq);
	    $oicq=htmlspecialchars($oicq);
	    $image=htmlspecialchars($image);
	    $comment=htmlspecialchars($comment);
		if ($name&&$comment) {
			$add_time=date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s");
			$result=mysql_query("insert into $mytable (sub_id,name,email,comefrom,homepage,icq,oicq,image,comment,password,add_time) values ('$sub_id','$name','$email','$comefrom','$homepage','$icq','$oicq','$image','$comment','$password','$add_time')");
			if ($notify) {
				$message="$comment\n\n$name $email\n\n$add_time";
				mail($admin_email, "���µ�����: ".$name, $message, "From: ".$email."\nReply-To: ".$email."\nX-Mailer: PHP/" . phpversion());
			}
			echo "<p align=\"center\">�������Է��ͳɹ���лл��<a href=\"guestbook.php\">�鿴�����뷵��</a></p>\n";
		}
		else {
			echo "<p align=\"center\">���������ݱ�����д��<a href=\"JavaScript:history.back()\">����</a></p>\n";
		}
	}
	else {
		if ($reply&&$recid) {
			echo "<p align=\"center\">�ظ�����</p>";
			$sub_id="<input type=\"hidden\" name=\"sub_id\" value=\"$recid\">";
		}
		else {
			echo "<p align=\"center\">��д����</p>";
		}
			echo "<form method=\"POST\" action=\"add.php\">
    <table border=\"0\" width=\"75%\" align=\"center\">
      <tr>
        <td>
          <div align=\"center\">
            <table border=\"0\" width=\"80%\" cellpadding=\"20\" cellspacing=\"0\">
              <tr>
                <td width=\"100%\" bgcolor=\"FFFBEC\">����: <input type=\"text\" name=\"name\" size=\"25\">$sub_id 
                  �����ʼ�: <input type=\"text\" name=\"email\" size=\"25\"><br>
                  ����: <input type=\"text\" name=\"comefrom\" size=\"25\"> ��ҳ��ַ: <input type=\"text\" name=\"homepage\" size=\"25\"><br>
                  OICQ: <input type=\"text\" name=\"oicq\" size=\"25\">
                  <p>����: ";
		$con=1;
		while ( list( $key, $val ) = each( $images ) ) {
			$checked="";
			if ($con==1) {
				$checked=" checked";
				$con=0;
			}
			echo "<input type=\"radio\" value=\"$key\" name=\"image\"$checked><img border=\"0\" src=\"$imgdir/$key\" alt=\"$val\"> ";
		}
		echo "</p>\n                  <p><b>����:</b><br>
                  <textarea rows=\"4\" name=\"comment\" cols=\"72\"></textarea></p>
                  <p><input type=\"submit\" value=\"��������\" name=\"doadd\"> <input type=\"reset\" value=\"������д\" name=\"B2\"></td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
    </center>
  </div>
</form>
";
	}
?>