<?php
header("Content-Type:text/html;charset=gb2312");
@mysql_connect('localhost','root','ebaeba') or die("���ݿ����������ʧ��");
@mysql_select_db("test") or die("���ݿⲻ���ڻ򲻿���");



$uname = $_GET['userName'];
//����������ݿ��ѯ���������ǲ�������һ���û�
//���û�в��ҵ�����û���



$sql="select * from t1 where name='".$uname."'";
$query=mysql_query($sql);
$row=mysql_fetch_object($query);

if(strlen($uname)<6||strlen($uname)>20)
{
   $msg="�û���������6��20���ַ�.";
}
else
{
	
   if($row==false)
   {
      $msg="���û�����Ч������ʹ�ã�";
   }
   else
   {
      $msg="�Բ��𣬴��û����Ѿ����ڣ�������û���ע��!";
   }
}
echo $msg ;
?>