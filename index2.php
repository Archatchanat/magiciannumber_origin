<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css.css" />
</head>
<body>
	<!--================================================================================================== -->
	<table width="488" border="0" cellspacing="0" cellpadding="0">
		<?
			$i=1;
			while($i<=4){
		?>
		<!----------------------------------------------------- -->
		<!--content -->
		<td>
			<table bgcolor="#006600">
				<tr>
					<td>
						<img src="images/magic_21.jpg" />
					</td>
					<td valign="top">
						<div id="text_yellow" align="left">
							<strong>เคล็ดลับในการเปลี่ยนเบอร์</strong>
						</div>
						<div id="text_white">
							<strong>
							<a href="#">
								การเปลี่ยนเบอร์นั้นจะได้<br />
      							ผลดีต้องมี 5 ข้อ ข้อที่ 1 <br />
      							ใจพร้อม เจ้าตัวต้อง<br />
      							อยากเปลี่ยน  &gt;&gt;
							</a>
							</strong>
						</div>
					</td>
				</tr>
			</table>
		<!----------------------------------------------------- -->
		<?
			if($i % 2== 0) {
		?>
		<!----------------------------------------------------- -->
		<!--new row -->
			</td>
			</tr>
		<? }else {?>
		<!----------------------------------------------------- -->
		<!--new column -->
			</td>
		<? }  
		$i ++;}
		?>
	</table>
	<!--================================================================================================== -->
</body>
</html>
