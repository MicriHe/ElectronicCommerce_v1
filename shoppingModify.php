<?php
	session_start();
	$id=$_GET["id"];
	$value=$_GET["value"];
	$goods=$_SESSION["goodsArray"];
	$goods[$id]=$value;
	$_SESSION["goodsArray"]=$goods;
	header("location:shoppingCar.php");
?>