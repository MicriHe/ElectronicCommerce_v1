<?php
	ob_start();
	session_start();
	if($_SESSION["admin"]=="")
	{
 	echo "<script language=javascript>alert('�����µ�½��');window.location='login.php'</script>";
	}
?>