<?php
	require_once("config.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.01</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	if($_SESSION["user"]=="")
	{
		header("location:index.php");
		exit();
	}
	
	$user=$_SESSION["user"];
	$goods=$_SESSION["goodsArray"];
	$time=date("Y-m-d H:i:s");
	$sql="insert into orders (username,flag,time) values ('$user',0,'$time')";
	mysql_query($sql);
	/*$sql="select * from orders order by orderid desc limit 0,1";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	$orderid=$rows["orderid"];*/
	$orderid=mysql_insert_id();   //�õ���һ�����������ݵ�ID
	while($fruit_goods=current($goods))
	{
		$sql="insert into orderdetail (orderid,goodsid,amount) values ($orderid,".key($goods).",".$fruit_goods.")";
		mysql_query($sql);
		next($goods);
	}
	echo "<script language=javascript>alert('����ɹ����Ժ����ǻ�����������ϵ��лл��');window.location='index.php'</script>";
?>
</body>
</html>