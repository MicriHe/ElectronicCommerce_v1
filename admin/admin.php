<?php
	include("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<link href="images/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	$pagesize=10;
	$sql="select * from product inner join producttype on product.proid=producttype.id";
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno=$_GET["pageno"];
	if($pageno=="")
	{
		$pageno=1;
	}
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	$sql="select * from product inner join producttype on product.proid=producttype.id limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
  <tr>
    <th height="27" colspan="7" align="left" class="bg_tr">&nbsp;��̨&gt;&gt;��Ʒ����</th>
  </tr>
  <tr>
    <th height="26" class="td_bg">��Ʒ���</th>
    <th class="td_bg">��Ʒ����</th>
    <th class="td_bg">��Ʒ�۸�</th>
    <th class="td_bg">��Ʒ���</th>
    <th class="td_bg">��ƷͼƬ</th>
    <th class="td_bg">�޸�</th>
    <th class="td_bg">ɾ��</th>
  </tr>
  <?php
  	while ($rows=mysql_fetch_assoc($rs))
	{
	?>
	<tr>
    <td height="26" align="center" class="td_bg"><?php echo $rows["pid"]?></td>
    <td align="center" class="td_bg"><?php echo $rows["proname"]?></td>
    <td align="center" class="td_bg"><?php echo $rows["price"]?></td>
    <td align="center" class="td_bg"><?php echo $rows["protype"]?></td>
    <td align="center" class="td_bg"><img src="..<?php echo $rows["tu"]?>" width="40" height="40"/></td>
    <td align="center" class="td_bg"><input type="button" value="�޸�" onclick="location.href='modify.php?id=<?php echo $rows["pid"]?>&path=<?php echo $rows["tu"]?>'" /></td>
    <td align="center" class="td_bg"><input type="button" value="ɾ��" onclick="if(confirm('ȷ��Ҫɾ����?')){location.href='del.php?id=<?php echo $rows["pid"]?>&path=<?php echo $rows["tu"]?>'}" /></td>
  </tr>
	<?php
	}
  ?>
   <tr>
      <th height="25" colspan="7" align="center" class="bg_tr">
    <?php
	if($pageno==1)
	{
	?>
	��ҳ | ��һҳ | <a href="?pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>
	<?php
	}
?>
	&nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ </th>
  </tr>
</table>
</body>
</html>
