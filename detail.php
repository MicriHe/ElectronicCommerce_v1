<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.01</title>
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
    <th colspan="2" bgcolor="#FFFFFF">��Ʒ��ϸ��Ϣ</th>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">��Ʒ����:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["proname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">��Ʒ�۸�:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["price"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">��Ʒ���:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["protype"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">��Ʒ����:</td>
    <td bgcolor="#FFFFFF"><?php echo $rows["product_contents"]?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><label>
      <input type="button" name="Submit" value="��ӡ" onClick="window.print()" />
      <input type="button" name="Submit2" value="�ر�" onClick="window.close()" />
    </label></td>
  </tr>
</table>
</body>
</html>
