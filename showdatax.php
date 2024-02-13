<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Magician Number</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>

<p>ตารางแสดงข้อมูลสมาชิก</p>
<p>&nbsp;</p>
<table width="90%" border="1">
  <tr>
    <td width="5%" bordercolor="#0000FF"><div align="center">num_id</div></td>
    <td width="10%" bordercolor="#0000FF"><div align="center">num_number1</div></td>
    <td width="10%" bordercolor="#0000FF"><div align="center">num_number2</div></td>
    <td width="55%" bordercolor="#0000FF"><div align="center">num_detail</div></td>
    <td width="10%" bordercolor="#0000FF"><div align="center">num_good_point</div></td>
    <td width="10%" bordercolor="#0000FF"><div align="center">num_bad_point </div></td>
  </tr>
  <?php 
  $sql="select * from   number_data";
  $result=mysql_query($sql);
  while($row=mysql_fetch_array($result)) {
	  
	  $stripdetail=strip_tags($row[num_detail]);
	  
  echo "
  
  <tr>
    <td>$row[num_id]</td>
    <td>$row[num_number1]</td>
    <td>$row[num_number2]</td>
    <td>$stripdetail</td>
    <td>$row[num_good_point]</td>
    <td>$row[num_bad_point]</td>
  </tr> ";  } 
  ?>
  
  

</table>



</body>
<html>