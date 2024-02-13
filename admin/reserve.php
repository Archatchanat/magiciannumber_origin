<?
	ob_start();
	session_start();
	require("connect/connect.php");
	
	if($_SESSION["str_admin_us"]==""){
			echo "<script language=\"JavaScript\">";
			echo "alert('Error Login');";
			echo "window.location='index.php';";
			echo "</script>";
			exit();
	}
	
?>

<?
	$tel_number = "select * from product where p_id = '".$_GET['p_id']."'";
	$get_number = mysql_query($tel_number);
	
	while($rs_number = mysql_fetch_array($get_number))
	{
		$p_id     = $rs_number['p_id'];
		$p_price  = $rs_number['p_price'];
		$p_number = $rs_number['p_number'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Magician Number</title>
<link rel="stylesheet" type="text/css" href="css.css" />

		<!------------------------------------------------------------------------------------------------------------ -->
		<!--start :: div_head -->
			<? include "include/div_script.php"?>
		<!--end :: div_head -->
		<!------------------------------------------------------------------------------------------------------------ -->
		
</head>

<script language="javascript">
	function formvalidate(form) {
		
		if(contact.owner_name.value == "") {
			alert("กรุณาระบุ ชื่อ - นามสกุล.");
			contact.owner_name.focus();
			return false
		}
		if(contact.owner_address.value == "") {
			alert("กรุณาระบุ ที่อยู่.");
			contact.owner_address.focus();
			return false
		}
		if(contact.owner_tel.value == "") {
			alert("กรุณาระบุ เบอร์โทรศัพท์.");
			contact.owner_tel.focus();
			return false
		}
		if(contact.owner_detail.value == "") {
			alert("กรุณาระบุ รายละเอียด.");
			contact.owner_detail.focus();
			return false
		}
		return true;
	}	
</script>

<script language="JavaScript">
	document.all.gang.style.display='none';
	
	function chkSubmit3()
	{
		 if(isNaN(document.contact.p_number.value))
		 {
			alert('Please input Number only.');
			document.contact.p_number.value="";
			return false;
		 }
	}
	
	function loadDefault(){
		if(document.getElementById('OnlyorGroup1').checked== true){
				document.all.gang.style.display='none'; }
		else if(document.getElementById('OnlyorGroup2').checked== true){
				document.all.gang.style.display=''; }
		
}
</script>



<body onload="MM_preloadImages('images/magic_16s.png','images/menus_02.png','images/menus_03.png','images/menus_04.png','images/menus_05.png','images/menus_06.png','images/menus_07.png','images/magic_07.png','images/magic_06.png','images/magic_08.png')">



<!--=================================================================================================================================== -->
<!--start :: sector1 -->

	<div id="bg">
	<!------------------------------------------------------------------------------------------------------------ -->
	<!--start :: div_head -->
		<? include "include/div_head.php"?>
	<!--end :: div_head -->
	<!------------------------------------------------------------------------------------------------------------ -->
		
	<div id="bg_green">
		<div id="menu"></div>

		<!------------------------------------------------------------------------------------------------------------ -->
		<!--start :: div_menu -->
			<? include "include/div_menu.php"?>
		<!--end :: div_menu -->
		<!------------------------------------------------------------------------------------------------------------ -->	
	</div>
	
	</div>
	
<!--end__ :: sector1 -->	
<!--=================================================================================================================================== -->


<!--=================================================================================================================================== -->
<!--start :: sector2 -->

	<div id="cloth">
	  <div id="left">
		
			<div id="content">
				<font color="#000000"><strong>จองเบอร์</strong></font>
				<hr>
				<form action="?action=insert" method="post" name="contact" onSubmit="return formvalidate(this)">
					<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                  		<tr align="left">
                    		<td width="20%" align="left"><div align="right">เบอร์โทรศัพท์ :: <br/>ที่ต้องการจอง ::</div></td>
							<td width="84%">
								<?
									if($_GET['p_id']!=""){
								?>
									
									<div class="linkbox3"><? echo $p_number; ?> 
									<a href="good_number.php">&nbsp;&nbsp;&nbsp;เลือกเบอร์อื่น</a></div>
								<?
									} else {
								?>
									<div class="linkbox3"><a href="good_number.php">กรุณาเลือกเบอร์ที่ท่านต้องการจอง</a></div>
								<?
									}
								?>							</td>
                  		</tr>
						<tr align="left">
                    		<td><div align="right">ชื่อ-นามสกุล ::</div></td>
							<td><input type="text" name="owner_name" size="50"></td>
                  		</tr>
						<tr>
				<td width="20%" align="right">ที่อยู่ :</td>
				<td width="84%" align="left"><textarea name="owner_address" cols="30" rows="5"><?=$owner_address?></textarea></td>
			</tr>
						<tr align="left">
                    		<td align="left"><div align="right">เบอร์โทรศัพท์มือถือ ::</div></td>
							<td><input name="owner_tel" type="text" size="20" maxlength="20"></td>
                  		</tr>
						<tr>
				<td width="20%" align="right">รายละเอียดเพิ่มเติม:</td>
				<td width="84%" align="left"><textarea name="owner_detail" cols="30" rows="5"><?=$owner_detail?></textarea></td>
			</tr>
										
						<tr align="left">
							<td><div align="right"></div></td>
							<td>
							  <input type="hidden" name="add" value="true">
							  <input type="hidden" name="p_id" value="<?=$_GET['p_id']?>">
							  <input type="submit" name="Submit" value="ส่งข้อมูล" style="width:120px;" <? if($_GET['p_id']==""){?>disabled="disabled"<? } ?>>
							  <input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px;" <? if($_GET['p_id']==""){?>disabled="disabled"<? } ?>>							</td>
						</tr>
						<tr>
							<td colspan="2">
								<hr/>							</td>
						</tr>
                </table>
		  </form>
			</div>
			
		</div>
	
		<div id="right">
			<!------------------------------------------------------------------------------------------------------------ -->
			<!--start :: div_menu -->
				<? include "include/div_right.php"?>
			<!--end :: div_right -->
			<!------------------------------------------------------------------------------------------------------------ -->
		</div>
	</div>

<!--end__ :: sector2 -->
<!--=================================================================================================================================== -->


<!--=================================================================================================================================== -->
<!--start :: sector3 -->
	<div id="ft">
		<!------------------------------------------------------------------------------------------------------------ -->
		<!--start :: div_foot -->
			<? include "include/div_foot.php"?>
		<!--end :: div_foot -->
		<!------------------------------------------------------------------------------------------------------------ -->
	</div>
<!--end__ :: sector3 -->
<!--=================================================================================================================================== -->

</body>
</html>

<?
	// insert to database
	if($_GET["action"]=="insert")
	{
		$p_id     = $_POST['p_id'];
		$p_status = "yes";
		
		$tellway  = "INSERT INTO number_owner VALUES(";
		$tellway .= "0
					,'$_POST[p_id]'
					,'$_POST[owner_name]'
					,'$_POST[owner_address]'
					,'$_POST[owner_tel]'
					,'$_POST[owner_detail]'
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		
		$sql_up2 = "update product set p_status = '$p_status' where  p_id ='".$_POST['p_id']."' ";
		$dbquery2 = mysql_query($sql_up2);
		
		echo "<script language=\"JavaScript\">";
		echo "alert('จองเรียบร้อยแล้วค่ะ');";
		echo "window.location='reserve.php';";
		echo "</script>";
	}
?>