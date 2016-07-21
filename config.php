<?php
	error_reporting(0);
	ob_start();
	session_start();  //打开会话
	$dblink=mysqli_connect("192.168.0.107","root","123456"); //mysql主机,用户名,密码
	if($dblink==null)
	{
		echo "数据库打开失败";
		exit;
	} //如果数据库无法链接则提示
	mysqli_query("SET NAMES 'gb2312'");  //mysql 字符集
	mysqli_select_db("micri_db"); //选择数据库
?>