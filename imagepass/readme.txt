��һ������global.php�����ļ��п�����վ���£�����Ϊimagepass��
�ڶ���������Ҫ�ϴ�ͼƬ��ҳ�������global.php�ļ�.
���磺require_once("../../imagepass/global.php");
�����������ϴ�ͼƬ�ĵط����룺<input type="file" name="images">
���Ĳ����������ݿ�д��ĳ����е���global.php�е�Upload($file_name,$path,$pub,$size=1048576)����
��һ������:�ļ��������
�ڶ���������ͼƬ�ϴ�·��,�Ӹ�Ŀ¼��ʼƥ��
�������������ϴ�ͼƬ�ĸ�ʽ
���ĸ��������ϴ��ļ���С��
����$imagepath= Upload("images","/imagepass/images/",array(".gif",".jpg",".jpeg"),51200)  //������ͼƬ��·��;
 
ע�⣺����Ҫ����enctype="multipart/form-data"