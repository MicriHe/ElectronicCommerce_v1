<?php 
require_once("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����PHP��������ϵͳV.01</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="javascript">
	var flag="";
	function checkForm()
	{
		if(frm.username.value=="")
		{
			alert("�û�������Ϊ��")
			frm.username.focus()
			return false;
		}
		if(flag=="1")
		{
			alert("���û����Ѿ���ע��");
			frm.username.focus()
			return false;
		}
		if(frm.pwd.value=="")
		{
			alert("���벻��Ϊ��");
			frm.pwd.focus()
			return false
		}
		if(frm.pwd2.value=="")
		{
			alert("ȷ�����벻��Ϊ��")
			frm.pwd2.focus()
			return false;
		}
		else
		{
			if(frm.pwd.value!=frm.pwd2.value)
			{
				alert("ȷ�����������Ҫһ��")
				frm.pwd2.focus()
				return false;
			}
		}
		if(frm.phone.value=="")
		{
			alert("��ϵ�绰����Ϊ��")
			frm.phone.focus()
			return false;
		}
		if(frm.address.value=="")
		{
			alert("��ַ����Ϊ��")
			frm.address.focus()
			return false;
		}
	}
	function ajaxSubmit()
	{
		//��ȡ�û�����
		var username=document.forms[0].username.value;
		//����XMLHttpRequest����
		var xmlhttp;
		if (window.XMLHttpRequest) 
		{ 
			xmlhttp=new XMLHttpRequest();// Mozilla, Safari, ...�����
			if (http_request.overrideMimeType) 
			{//��Щ�汾��Mozilla �����������������ص�δ����XML mime-type ͷ����Ϣ������ʱ�������ˣ�Ҫȷ�����ص����ݰ���text/xml��Ϣ��
				http_request.overrideMimeType("text/xml");
			}
		} 
		else if (window.ActiveXObject) 
		{ 
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");// IE�����
		}
		//�����������������
		xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4)
			{
				if(xmlhttp.status==200)//����������˷��ص�����ȷ�Ľ�����������п�����ȷ�Ľ���XML��200��ʾ�������أ�404��ʾ�Ҳ�����ҳ��500��ʾ�������ڲ�����
				{
					flag=xmlhttp.responseText
					if(flag=="0")
					{
						msg.innerHTML="<span style=color:#009900; font-size:12px>��ϲ,���û�û�б�ע��</span>"
					}
					else if(flag=="1")
					{
						msg.innerHTML="<span style=color:#FF0000; font-size:12px>��Ǹ,���û��Ѿ���ע��</span>"
					}
					else
					{
						msg.innerHTML="";
					}
				}
				else
				{	
					alert("�����ύʧ��");
				}
			}
		}
		//�����ӣ�true�����첽��false����ͬ��
		xmlhttp.open("post","checkUsername.php",true);
		//������Ϊpostʱ��Ҫ����httpͷ
		xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
		//��������
		var str="username="+escape(username);
		xmlhttp.send(str);
	}

</script>
</head>

<body>
<?php
	if ($_POST["Submit"])
	{
		$username=$_POST["username"];
		$pwd=$_POST["pwd"];
		$sex=$_POST["sex"];
		$yy=$_POST["yy"];
		$mm=$_POST["mm"];
		$dd=$_POST["dd"];
		$birth="$yy-$mm-$dd";
		$phone=$_POST["phone"];
		$address=$_POST["address"];
		$sql="insert into user(username,password,sex,birth,phone,address) values ('$username','$pwd','$sex','$birth','$phone','$address')";
		mysql_query($sql);
		echo "<script language=javascript>alert('ע��ɹ���ף��������죡');window.location='index.php'</script>";
		?>
		<?php
		exit();
	}
?>
<form id="frm" name="frm" method="post" action="" onsubmit="return checkForm()" >
  <table width="600" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <th colspan="2" bgcolor="#FFFFFF">�û�ע��</th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">�û���:</td>
      <td bgcolor="#FFFFFF"><input name="username" type="text" id="username" onkeyup="ajaxSubmit()"/><label id="msg"></label>
      <label id="message"></label></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">����:</td>
      <td bgcolor="#FFFFFF"><input name="pwd" type="text" id="pwd" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">ȷ������:</td>
      <td bgcolor="#FFFFFF"><input name="pwd2" type="text" id="pwd2" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">�Ա�:</td>
      <td bgcolor="#FFFFFF"><input type="radio" name="sex" value="��" checked="checked" />
        ��
        <input type="radio" name="sex" value="Ů" />
      Ů</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">�������£�</td>
      <td bgcolor="#FFFFFF"><select name="yy" id="yy">
        <script language="JavaScript" type="text/javascript">
	  	date=new Date()
		for(i=1955;i<date.getYear();i++)
		{
			document.write("<option value="+i+">"+i+"</option>")
		}
		frm.yy[frm.yy.length-20].selected=true
	  </script>
      </select>
        ��
        <select name="mm" id="mm">
          <script language="JavaScript" type="text/javascript">
	   	for(i=1;i<=12;i++)
		{
			if(i<10)
			{
				i="0"+i
			}
			document.write("<option value="+i+">"+i+"</option>")
		}
	   </script>
        </select>
        ��
        <select name="dd" id="dd">
          <script language="JavaScript" type="text/javascript">
	   	for(i=1;i<=31;i++)
		{
			if(i<10)
			{
				i="0"+i
			}
			document.write("<option value="+i+">"+i+"</option>")
		}
	   </script>
        </select>
      ��</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">�绰:</td>
      <td bgcolor="#FFFFFF"><input name="phone" type="text" id="phone" /></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF">��ַ:</td>
      <td bgcolor="#FFFFFF"><input name="address" type="text" id="address" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ" />
      <input type="reset" name="Submit2" value="����" /></td>
    </tr>
  </table>
</form>

<p align="center"><a href="reg.php">�����ʺ�</a>&nbsp;&nbsp;<a href="index.php">������ҳ</a></p>
</body>
</html>
