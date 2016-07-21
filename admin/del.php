<?php
	require_once("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?
	$id=$_GET["id"];
	$path=$_GET["path"];
	$root=$_SERVER['DOCUMENT_ROOT'];
	$filepath=$root.$path;
	if(file_exists($filepath))
	{
		unlink($filepath);
	}
	$sql="delete from product where pid=$id";
	mysql_query($sql);
	header("location:admin.php");
?>
</body>
</html>
