<?php
	require_once("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<?php
	$id=$_GET["id"];
	$sql="select flag from orders where orderid=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	if($rows["flag"])
	{
	?>
	<div align="center" style="color:#00FF00">�˶����Ѿ�����<br /><br /><a href="orderDetail.php?id=<?php echo $id?>">����</a></div>
	<?php
	exit();
	}
	$sql="update orders set flag=1 where orderid=$id";
	mysql_query($sql);
	
?>
<div align="center" style="color:#FF0000">����ɹ���<br /><br /><a href="orderDetail.php?id=<?php echo $id?>">����</a></div>
</body>
</html>
