<?php 
	include_once("config.php");
	if($_POST["submit"])
	{
		$username=$_POST["username"];
		$pwd=$_POST["pwd"];
		$sql="select * from user where username='$username' and password='$pwd'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)==0)
		{
		echo "<script language=javascript>alert('��½ʧ��!����ע����½��');window.location='regist.php'</script>";
			?>
			<?php
		}
		else
		{
			$_SESSION["user"]=$username;
			echo "<script language=javascript>alert('��½�ɹ�,�����Թ����ˣ�');window.location='index.php'</script>";
		?>
		</div>
		<?php
		}
		exit();
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.02</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form id="form1" name="form1" method="post" action="">
      <table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
        <tr>
          <th colspan="2" bgcolor="#FFFFFF">�û���¼</th>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">�û���:</td>
          <td bgcolor="#FFFFFF"><input name="username" type="text" id="username" size="15" /></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">����:</td>
          <td bgcolor="#FFFFFF"><input name="pwd" type="password" id="pwd" size="15" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="submit" value="��½" />
            <input type="reset" name="Submit2" value="����" />
            <input type="button" name="Submit3" value="ע��" onClick="location.href='regist.php'" /></td>
        </tr>
  </table>
</form>
</body>
</html>