<?php
	error_reporting(0);
	ob_start();
	session_start();  //�򿪻Ự
	$dblink=mysqli_connect("192.168.0.107","root","123456"); //mysql����,�û���,����
	if($dblink==null)
	{
		echo "���ݿ��ʧ��";
		exit;
	} //������ݿ��޷���������ʾ
	mysqli_query("SET NAMES 'gb2312'");  //mysql �ַ���
	mysqli_select_db("micri_db"); //ѡ�����ݿ�
?>