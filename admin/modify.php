<?php
require_once("../config.php");
require_once('ly_check.php');
require_once("../imagepass/global.php");
include('./fckeditor/fckeditor.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript">
function checkform(){
	var v = DoProcess();
	if(v != true){
	    alert("����������");
		return false;
	}	
}  
</script>
</head>

<body>
<?php
	$id=$_GET["id"];
	$path=$_GET["path"];
	if($_POST["Submit"])
	{
		$typeid=$_POST["typ"];
		$name=$_POST["name"];
		$price=$_POST["price"];
		$imagepath= Upload("images","/imagepass/images/",array(".gif",".jpg",".jpeg"),51200);
		$content=$_POST["content"];
		if($imagepath=="")
		{
			$sql="update product set proname='$name',price=$price,proid=$typeid,product_contents='$content' where pid=$id";
			mysql_query($sql);
		}
		else
		{
			$root=$_SERVER['DOCUMENT_ROOT'];
			$filepath=$root.$path;
			if(is_file($filepath))
			{
				unlink($filepath);
				$sql="update product set proname='$name',price=$price,proid=$typeid,tu='$imagepath',product_contents='$content' where pid=$id";
				mysql_query($sql);
			}
			else
			{
				$sql="update product set proname='$name',price=$price,proid=$typeid,tu='$imagepath',product_contents='$content' where pid=$id";
				mysql_query($sql);
			}
		}
		?>
		<h2 align="center" style="color:#FF0000">�޸ĳɹ�</h2>
		<div align="center"><a href="admin.php">����</a></div>
		<?php
		exit;
	}
	$sql="select * from product where pid=$id";
	$rs=mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
?>
<form id="form1" name="form1" method="post" action="" onSubmit="return checkform();" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
      <th height="28" colspan="2" class="bg_tr">��Ʒ�޸�</th>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">��Ʒ���</td>
      <td height="28" class="td_bg"><select name="typ" id="typ">
	  <?php
	  	$sql="select * from producttype";
		$rs=mysql_query($sql);
		while($rows1=mysql_fetch_assoc($rs))
		{
			if($rows1["id"]==$rows["proid"])
			{
			?>
			<option value="<?php echo $rows1["id"]?>" selected="selected"><?php echo $rows1["protype"]?></option>
			<?php
			}
			else
			{
			?>
			<option value="<?php echo $rows1["id"]?>"><?php echo $rows1["protype"]?></option>
			<?php
			}
		}
	  ?>
      </select>      </td>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">��Ʒ���ƣ�</td>
      <td height="28" class="td_bg"><input name="name" type="text" id="name" value="<?php echo $rows["proname"]?>" /></td>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">��Ʒ�۸�</td>
      <td height="28" class="td_bg"><input name="price" type="text" id="price" value="<?php echo $rows["price"]?>" /></td>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">�޸�ͼƬ��</td>
      <td height="28" class="td_bg"><input type="file" name="images"></td>
    </tr>
    <tr>
      <td height="28" align="right" class="td_bg">��Ʒ������</td>
      <td height="28" class="td_bg"><?php
	$sBasePath = $_SERVER['PHP_SELF'] ;
	$sBasePath = dirname($sBasePath).'/fckeditor/';
	$aFCKeditor = new FCKeditor('content') ;
	$aFCKeditor->Width="750px";                   //�������Ŀ�� 
	$aFCKeditor->Height="500px";                 //�������ĸ߶� 
	$aFCKeditor->BasePath=$sBasePath;
	$aFCKeditor->Value=$rows[product_contents];
	$aFCKeditor->Create();
	?></td>
    </tr>
    <tr>
      <td height="28" colspan="2" align="center" class="td_bg"><input type="submit" name="Submit" value="�ύ" />
      <input type="reset" name="Submit2" value="����" /></td>
    </tr>
  </table>
</form>
</body>
</html>
