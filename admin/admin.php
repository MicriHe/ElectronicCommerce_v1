<?php
	include("../config.php");
	include("ly_check.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
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
    <th height="27" colspan="7" align="left" class="bg_tr">&nbsp;后台&gt;&gt;商品管理</th>
  </tr>
  <tr>
    <th height="26" class="td_bg">商品编号</th>
    <th class="td_bg">商品名称</th>
    <th class="td_bg">商品价格</th>
    <th class="td_bg">商品类别</th>
    <th class="td_bg">商品图片</th>
    <th class="td_bg">修改</th>
    <th class="td_bg">删除</th>
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
    <td align="center" class="td_bg"><input type="button" value="修改" onclick="location.href='modify.php?id=<?php echo $rows["pid"]?>&path=<?php echo $rows["tu"]?>'" /></td>
    <td align="center" class="td_bg"><input type="button" value="删除" onclick="if(confirm('确定要删除吗?')){location.href='del.php?id=<?php echo $rows["pid"]?>&path=<?php echo $rows["tu"]?>'}" /></td>
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
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上一页</a> | <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
	<?php
	}
?>
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息 </th>
  </tr>
</table>
</body>
</html>
