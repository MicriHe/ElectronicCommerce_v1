<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>夏日PHP电子商务系统V.01</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	$id=$_GET["id"];
	$sql="select * from producttype inner join product on product.proid=producttype.id where product.pid=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<table width="550" border="0" align="center" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
    <th colspan="2" bgcolor="#FFFFFF">商品详细信息</th>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">商品名称:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["proname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">商品价格:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["price"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">商品类别:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["protype"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">商品介绍:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["product_contents"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><label>
      <input type="button" name="Submit" value="打印" onClick="window.print()" />
      <input type="button" name="Submit2" value="关闭" onClick="window.close()" />
    </label></td>
  </tr>
</table>
</body>
</html>
