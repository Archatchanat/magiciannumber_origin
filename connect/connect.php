<?
/*=============== ติดต่อฐานข้อมูล =================*/
$host="localhost";
$user_name="magic2021_db";
$pass_word="ETnipy8F";
$db="magic2021_db";

mysql_connect( $host,$user_name,$pass_word) or die ("ติดต่อกับฐานข้อมูล Mysql ไม่ได้ ");
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้");
mysql_query("SET NAMES UTF8");
 
?> 