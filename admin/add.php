<?php
require_once("../config.php");
require_once('ly_check.php');
require_once("../imagepass/global.php");
include('./fckeditor/fckeditor.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>夏日PHP电子商务系统V.02</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script language="javascript">
function checkform(){
	if(myform.proname.value=="")
	{
		alert("商品名称不能为空");
		myform.proname.focus()
		return false
	}
	if(myform.proprice.value=="")
	{
		alert("商品价格不能为空")
		myform.proprice.focus()
		return false
	}
	else
	{
		if(isNaN(myform.proprice.value))
		{
			alert("商品价格必须是数字")
			myform.proprice.focus()
			return false
		}
	}
	if(myform.images.value=="")
	{
		alert("上传图片不能为空")
		myform.images.focus()
		return false
	}
	var v = DoProcess();
	if(v != true){
	    alert("请输入内容");
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
		<h2 align="center" style="color:#FF0000">添加成功</h2>
		<div align="center"><a href="admin.php">返回</a></div>
		<?php
		die();
	}
?>
<form id="myform" name="myform" method="post" action="" onSubmit="return checkform();" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
    <tr>
      <th height="27" colspan="2" class="bg_tr">添加商品</th>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">商品类别：</td>
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
      <td height="27" align="right" class="td_bg">商品名称：</td>
      <td class="td_bg"><label>
        <input name="proname" type="text" id="proname" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">商品价格：</td>
      <td class="td_bg"><label>
        <input name="proprice" type="text" id="proprice" />
      </label></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">添加图片：</td>
      <td class="td_bg"><input type="file" name="images"></td>
    </tr>
    <tr>
      <td height="27" align="right" class="td_bg">商品描述：</td>
      <td class="td_bg"><?php
$sBasePath = $_SERVER['PHP_SELF'] ;
$sBasePath = dirname($sBasePath).'/fckeditor/';
$aFCKeditor = new FCKeditor('content') ;
$aFCKeditor->Width="750px";                   //设置它的宽度 
$aFCKeditor->Height="500px";                 //设置它的高度 
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
        <input type="submit" name="Submit" value="提交" />
        <input type="reset" name="Submit2" value="重置" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
