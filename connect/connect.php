<?
/*=============== �Դ��Ͱҹ������ =================*/
$host="localhost";
$user_name="magic2021_db";
$pass_word="ETnipy8F";
$db="magic2021_db";

mysql_connect( $host,$user_name,$pass_word) or die ("�Դ��͡Ѻ�ҹ������ Mysql ����� ");
mysql_select_db($db) or die("���͡�ҹ�����������");
mysql_query("SET NAMES UTF8");
 
?> 