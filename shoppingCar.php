<?php
require("config.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.01</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script language="javascript">
	function modify(id,value)
	{
		location.href="shoppingModify.php?id="+id+"&value="+value;
	}
</script>
<?php
	if($_SESSION["user"]=="")
	{
	echo "<script language=javascript>alert('����û�е�½�����ȵ�½���������û��ע�ᣬ����ע���ڵ�½');window.location='index.php'</script>";
		?>
		<?php
		exit();
	}
	$id=$_GET["id"];
	$goods=$_SESSION["goodsArray"];
	if($id<>"")
	{	
		if($goods[$id]=="")
		{
			$goods[$id]=1;
		}
		else
		{
			$goods[$id]=$goods[$id]+1;
		}
		$_SESSION["goodsArray"]=$goods;
	}
?>
        <form action="" method="post" name="frm" id="frm">
          <table width="500" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
              <th bgcolor="#FFFFFF">��Ʒ���</th>
              <th bgcolor="#FFFFFF">��Ʒ����</th>
              <th bgcolor="#FFFFFF">��Ʒ����</th>
              <th bgcolor="#FFFFFF">��������</th>
              <th bgcolor="#FFFFFF">ɾ��</th>
            </tr>
		<?php
			$sum=0;
			while ($fruit_goods = current($goods))
			{
				$pid=key($goods);
				$sql="select * from product where pid=$pid";
				$rs=mysql_query($sql);
				$rows=mysql_fetch_assoc($rs);
		?>
			<tr>
              <td bgcolor="#FFFFFF"><?php echo $pid?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["proname"]?></td>
              <td bgcolor="#FFFFFF"><?php echo $rows["price"]?></td>
              <td bgcolor="#FFFFFF"><label>
                <input name="txt<?php echo $pid?>" type="text" id="txt<?php echo $pid?>" size="3" value="<?php echo $fruit_goods?>" />
                <input type="button" name="Submit3" value="�޸�����" onclick="modify(<?php echo $pid?>,frm.txt<?php echo $pid?>.value)" />
              </label></td>
              <td bgcolor="#FFFFFF"><input type="button" value="ɾ��" onclick="if(confirm('ȷ��Ҫɾ����?')){location.href='shoppingDel.php?id=<?php echo $pid?>'}" /></td>
            </tr>
		<?php
				$sum+=$rows["price"]*$fruit_goods;
				next($goods);
			}
		?>
            <tr>
              <td colspan="5" align="center" bgcolor="#FFFFFF"><input type="button" name="Submit" value="����" onclick="location.href='goShopping.php'">
              <input type="button" name="Submit2" value="��������" onClick="window.close()"></td>
            </tr>
            <tr>
              <td colspan="2" bgcolor="#FFFFFF"> �ܼۣ�<?php echo $sum?></td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          </table>
        </form>
</body>
</html>