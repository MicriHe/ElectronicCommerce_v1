<?php
require_once("../config.php");
require_once('ly_check.php');
require_once("../imagepass/global.php");
include('./fckeditor/fckeditor.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.02</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript">
function checkform(){
	if(myform.proname.value=="")
	{
		alert("��Ʒ���Ʋ���Ϊ��");
		myform.proname.focus()
		return false
	}
	if(myform.proprice.value=="")
	{
		alert("��Ʒ�۸���Ϊ��")
		myform.proprice.focus()
		return false
	}
	else
	{
		if(isNaN(myform.proprice.value))
		{
			alert("��Ʒ�۸����������")
			myform.proprice.focus()
			return false
		}
	}
	if(myform.images.value=="")
	{
		alert("�ϴ�ͼƬ����Ϊ��")
		myform.images.focus()
		return false
	}
	var v = DoProcess();
	if(v != true){
	    alert("����������");
		return false;
	}	
	return true;
}  
</script>
</head>

<body>
<?php
	if($_POST["Submit"])
	{
		$typ=$_POST["itm"];
		$name=$_POST["proname"];
		$price=$_POST["proprice"];
		$imagepath= Upload("images","/imagepass/images/",array(".gif",".jpg",".jpeg"),51200);
		$content=$_POST["content"];
		$sql="insert into product (proname,price,proid,tu,product_contents) values ('$name',$price,$typ,'$imagepath','$content')";
		mysql_query($sql);
		?>
		<h2 align="center" style="color:#FF0000">��ӳɹ�</h2>
		<div align="center"><a href="admin.php">����</a></div>
		<?php
		die();
	}
?>
<form id="myform" name="myform" method="post" action="" onSubmit="return checkform();" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
      <th height="27" colspan="2" class="bg_tr">�����Ʒ</th>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">��Ʒ���</td>
      <td width="522" class="td_bg"><label>
	  	<?php
			$rs_itm=mysql_query("select * from producttype")
		?>
        <select name="itm" id="itm">
		<?php
			while($rows_itm=mysql_fetch_assoc($rs_itm))
			{
			?>
			<option value="<?php echo $rows_itm["id"]?>"><?php echo $rows_itm["protype"]?></option>
			<?php
			}
		?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">��Ʒ���ƣ�</td>
      <td class="td_bg"><label>
        <input name="proname" type="text" id="proname" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">��Ʒ�۸�</td>
      <td class="td_bg"><label>
        <input name="proprice" type="text" id="proprice" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">���ͼƬ��</td>
      <td class="td_bg"><input type="file" name="images"></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">��Ʒ������</td>
      <td class="td_bg"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('content') ;
$aFCKeditor->Width="750px";                   //�������Ŀ�� 
$aFCKeditor->Height="500px";                 //�������ĸ߶� 
$aFCKeditor->BasePath=$sBasePath;
$aFCKeditor->Create();
?></td>
    </tr>
    <tr>
      <td colspan="2" class="td_bg"><textarea id="content" name="content" style="display:none;"></textarea>
		 
</td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="td_bg"><label>
        <input type="submit" name="Submit" value="�ύ" />
        <input type="reset" name="Submit2" value="����" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
