<?php
	require_once("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
</head>
<body>
<?php
	$id=$_GET["id"];
	$sql="select * from orders where orderid=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	$username=$rows["username"];
	$orderid=$rows["orderid"];
	$sql="select * from user where username='$username'";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
  <tr>
    <th height="27" colspan="2" class="bg_tr"><?php echo $id?>号订单管理</th>
  </tr>
  <tr>
    <td colspan="2" align="center" class="td_bg">客户详细信息：</td>
  </tr>
  <tr>
    <td width="40%" align="right" class="td_bg">客户姓名：</td>
    <td class="td_bg"><?php echo $username?></td>
  </tr>
  <tr>
    <td align="right" class="td_bg">性别：</td>
    <td class="td_bg"><?php echo $rows["sex"]?></td>
  </tr>
  <tr>
    <td align="right" class="td_bg">出生年月：</td>
    <td class="td_bg"><?php echo $rows["birth"]?></td>
  </tr>
  <tr>
    <td align="right" class="td_bg">联系电话：</td>
    <td class="td_bg"><?php echo $rows["phone"]?></td>
  </tr>
  <tr>
    <td align="right" class="td_bg">家庭住址：</td>
    <td class="td_bg"><?php echo $rows["address"]?></td>
  </tr>
  <tr>
    <th colspan="2" class="td_bg">订货商品清单</th>
  </tr>
  <tr>
    <td colspan="2" class="td_bg"><table width="80%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
      <tr>
        <th height="25" bgcolor="#C8D0CD">商品编号</th>
        <th height="25" bgcolor="#C8D0CD">商品名称</th>
        <th height="25" bgcolor="#C8D0CD">订购数量</th>
        <th height="25" bgcolor="#C8D0CD">单价</th>
        <th height="25" bgcolor="#C8D0CD">合计</th>
      </tr>
      <?php
	  	$sql="select * from orderdetail where orderid=$orderid";
		$sum=0;
		$rs=mysql_query($sql);
		while($rows=mysql_fetch_assoc($rs))
		{
		?>
		<tr>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows["orderdetailid"]?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php
			$goodsid=$rows["goodsid"];
			$sql="select * from product where pid=$goodsid";
			$rs_goods=mysql_query($sql);
			$rows_goods=mysql_fetch_assoc($rs_goods);
			echo $rows_goods["proname"];
		?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows["amount"]?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows_goods["price"]?></td>
        <td height="25" align="center" bgcolor="#FFFFFF"><?php echo $rows["amount"]*$rows_goods["price"]?></td>
      </tr>
		<?php
		$sum+=$rows["amount"]*$rows_goods["price"];
		}
	  ?>
      <tr>
        <td height="25" colspan="5" align="center" bgcolor="#FFFFFF">合计：<?php echo $sum?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="td_bg"><a href="orderDo.php?id=<?php echo $id?>" class="trlink">处理完成</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="orderManager.php" class="trlink">返回</a></td>
  </tr>
</table>
</body>
</html>
