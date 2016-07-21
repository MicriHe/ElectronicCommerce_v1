<?php
	require_once("../config.php");
	include("ly_check.php");
	$id=$_GET["id"];
	$sql="delete from orderdetail where orderid=$id";
	mysql_query($sql);
	$sql="delete from orders where orderid=$id";
	mysql_query($sql);
	header("location:orderManager.php");
?>