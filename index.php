<?php
 include_once("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.02</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table width="780" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/banner1.jpg" width="780" height="150" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="780" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php" title="��ҳ">��ҳ</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="?proid=1" title="�칫��Ʒ">�칫��Ʒ</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="?proid=2" title="������Ʒ">������Ʒ</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="?proid=3" title="������Ʒ">������Ʒ</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="?proid=4" title="������Ʒ">������Ʒ</a></td>
        <td align="center" background="images/button1_bg.jpg"><?php if($_SESSION["user"]<>''){echo '���û�ӭ��&nbsp;'.$_SESSION["user"].'&nbsp;&nbsp;<a href=exit.php>�˳�</a>';}else{?><a href="reg.php"  title="��½ע��">��½ע��</a><?php } ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="782" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="300" valign="top">
<table width="100%" height="176" border="0" cellpadding="0" cellspacing="0" class="center_border">
      <tr>
        <td height="175" valign="top">
	<?php
	if(!$_GET[proid]){
	$sql="select * from product";
	}else{
	$sql="select * from product where proid=".$_GET[proid];
	}
	$rs=mysqli_query($dblink,$sql);
	$pagesize=20;
	$rs=mysqli_query($dblink,$sql);
	$recordcount=mysqli_num_rows($rs);
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
	if(!$_GET[proid]){
	$sql="select * from product limit $startno,$pagesize";
	}else{
	$sql="select * from product where proid='".$_GET[proid]."' limit $startno,$pagesize";
	}
	$rs=mysqli_query($dblink ,$sql);
?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <?php
	while($rows=mysqli_fetch_assoc($rs))
	{
	?>
      <td align="left" bgcolor="#FFFFFF" class="forumRowHighlight">
	  <table width="100%" border="0" cellpadding="5" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
    <td width="100" rowspan="5" align="center" bgcolor="#FFFFFF"><img src="<?php echo $rows["tu"]?>" width="80" height="80" /></td>
    <td bgcolor="#FFFFFF">��Ʒ����:<?php echo $rows["proname"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">��Ʒ�۸�:<?php echo $rows["price"]?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">��Ʒ����:	
	<?php $sql2="select * from producttype where id=".$rows["proid"];
	$rs2=mysqli_query($sql2);
	$rows2=mysqli_fetch_assoc($rs2);
	echo $rows2["protype"];
	?>
	</td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><a href="#" onClick="window.open('shoppingCar.php?id=<?php echo $rows["pid"]?>','shoppingCar','width=550 height=300')">���빺�ﳵ</a></td>
  </tr>
  <tr>
    <td align="left" bgcolor="#FFFFFF"><input type="button" value="��ϸ��Ϣ" onClick="window.open('detail.php?id=<?php echo $rows["pid"]?>')" /></td>
  </tr>
</table>
	                      <table width="100%" border="0" cellpadding="0" cellspacing="0">
	                        <tr>
	                          <td height="3"></td>
                        </tr>
                  </table></td>
			  	  <?php
			$i++;
		if($i%2==0)
		{
			echo "</tr><tr>";
		}
	}
?>
      </tr>
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" bgcolor="#CCCCCC">
  <tr>
  <td height="30" align="center" background="images/button1_bg.jpg">
  <?php
	if($pageno==1)
	{
	?>
    ��ҳ | ��һҳ | <a href="?proid=<?php echo $_GET[proid] ?>&pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="?proid=<?php echo $_GET[proid] ?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="?proid=<?php echo $_GET[proid] ?>&pageno=1">��ҳ</a> | <a href="?proid=<?php echo $_GET[proid] ?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
    <?php
	}
	else
	{
	?>
    <a href="?proid=<?php echo $_GET[proid] ?>&pageno=1">��ҳ</a> | <a href="?proid=<?php echo $_GET[proid] ?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="?proid=<?php echo $_GET[proid] ?>&pageno=<?php echo $pageno+1?>" class="forumRowHighlight">��һҳ</a> | <a href="?proid=<?php echo $_GET[proid] ?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
?>
    &nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ</td>
  </tr>
  </table>
          </td></tr>
    </table>
</td>
  </tr>
</table>
<table width="100%" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="782" height="30" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td align="center" background="images/button1_bg.jpg" bgcolor="#FFFFFF">������վ��������ַ����Ȩ���У�����php��������ϵͳ v.02 <!--��Դ����ѿ�Դ��������Ȩ��Ϣ�㽫��ñ�վ��Ѽ���֧�ֺͳ�����������--><script type="text/javascript" src="http://www.04ie.com/net/cpt.js"></script></td>
  </tr>
</table>
</body>
</html>
