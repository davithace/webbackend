<HTML>
<HEAD>
<TITLE>session����</TITLE>
</HEAD>
<BODY>
<?php
$username="guest1";
if(isset($username)) {
    session_name($username);
}
echo "��������Ϊ��".session_name()."\n";
?>
</BODY>
</HTML>