<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>

<?
	// insert to database
	if($_GET["action"]=="insert")
	{
		if($_REQUEST['action']=='insert'){ //หากมีการ Submit ข้อมูลผ่าน From มา
			if($_SESSION['security_code']!=$_POST['secret_code']) { // Check 
				echo "<script language='JavaScript'>alert('Invalid Security Code');history.back();</script>";
				exit();
			}
		}
		
		$tellway  = "INSERT INTO member_contact VALUES(";
		$tellway .= "0
					,'$_POST[mc_email]'
					,'$_POST[mc_name]'
					,'$_POST[mc_tel]'
					,'$_POST[mc_detail]'
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		
		//----------------------------------------------------------------------------------------------------------------
				$time       = date("Y-m-d H:i:s");;
				$strTo      = "cameraman2@hotmail.com";
				$strSubject = "แจ้งเตือน :: มีผู้ใช้ส่งข้อความมา เมื่อเวลา $time ค่ะ";
				$strHeader  = "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
				$strHeader .= "From: cameraman2@hotmail.com";
				$strVar     = "My Message";
				$strMessage = "
					<fieldset style='width:300px;'>
					<table width='300' border='0' bordercolor='#999999' cellpadding='3' cellspacing='0'>
						<tr>
							<td colspan='2' bgcolor='#3B5998'><font color=white size='2'><b>รายละเอียด</b></font></td>
						</tr>
						<tr>
							<td align='left' width='100'>อีเมลล์ ::</div></td>
							<td align='left'  width='200'>".$_POST['mc_email']."</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>ชื่อ-นามสกุล ::</div></td>
							<td align='left'  width='200'>".$_POST['mc_name']."</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>เบอร์โทรศัพท์ ::</div></td>
							<td align='left'  width='200'>".$_POST['mc_tel']."</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>รายละเอียด ::</div></td>
							<td align='left'  width='200'>".$_POST['mc_detail']."</div></td>
						</tr>
						<tr>
    						<td colspan='2'><a href='www.magiciannumber.com'>www.magiciannumber.com</a></td>
  						</tr>
					</table>
					</fieldset>";

					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader); // @ = No Show Error //
					if($flgSend){}
					else{echo "Email Can Not Send.";}
		//----------------------------------------------------------------------------------------------------------------
		
		echo "<script language=\"JavaScript\">";
		echo "alert('ข้อมูลของท่านถูกส่งเรียบร้อยแล้ว');";
		echo "window.location='contact.php';";
		echo "</script>";
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
		filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		
		if(contact.mc_email.value == "") {
			alert("กรุณาระบุ อีเมลล์.");
			contact.mc_email.focus();
			return false
		}
		if (!(filter.test(contact.mc_email.value))) {
			alert("กรุณาระบุ อีเมลล์ให้ถูกต้อง.");
			contact.mc_email.value = ""
			contact.mc_email.focus();
			
			return false;
		}
		if(contact.mc_name.value == "") {
			alert("กรุณาระบุ ชื่อ - นามสกุล.");
			contact.mc_name.focus();
			return false
		}
		if(contact.mc_tel.value == "") {
			alert("กรุณาระบุ เบอร์โทรศัพท์.");
			contact.mc_tel.focus();
			return false
		}
		if(contact.mc_detail.value == "") {
			alert("กรุณาระบุ รายละเอียด.");
			contact.mc_detail.focus();
			return false
		}
		if(contact.secret_code.value == "") {
			alert("กรุณาระบุ รหัสยืนยันความปลอดภัย.");
			contact.secret_code.focus();
			return false
		}
		return true;
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
		
			<div id="content" style="color:#993300;">
				<font color="#993300"><strong>ติดต่อ</strong></font>
				<hr>
				<form action="?action=insert" method="post" name="contact" onSubmit="return formvalidate(this)">
					<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                  		<tr align="left">
                   		  <td width="28%" align="left"><div align="right">อีเมล์ ::</div></td>
							<td width="72%">
								<input type="text" name="mc_email" size="30">							
						  </td>
                  		</tr>
						<tr align="left">
                    		<td><div align="right">ชื่อ-นามสกุล ::</div></td>
							<td><input type="text" name="mc_name" size="50"></td>
                  		</tr>
						<tr align="left">
                    		<td align="left"><div align="right">เบอร์โทรศัพท์มือถือ ::</div></td>
							<td><input type="text" name="mc_tel" size="20" maxlength="20"></td>
                  		</tr>
						<tr align="left">
                    		<td align="left"><div align="right">รายละเอียด ::</div></td>
							<td>
								<textarea name="mc_detail" cols="39" rows="5"></textarea>							
							</td>
						</tr>
						<tr>
							<td align="right">รหัสความปลอดภัย ::</td>
							<td>
								<iframe name="a"src="captcha.php?width=120&height=40&characters=5" alt="captcha" frameborder="0" width="160" height="50" scrolling="no"></iframe>
							</td>
						</tr>
						<tr>
							<td align="right">ยืนยันรหัสความปลอดภัย ::</td>
							<td><input name="secret_code" type="text" /></td>
						</tr>				
						<tr align="left">
							<td><div align="right"></div></td>
							<td>
							  <input type="hidden" name="add" value="true">
							  <input type="submit" name="Submit" value="ส่งข้อมูล" style="width:120px;">
							  <input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px;">							
							</td>
						</tr>
						
						<tr>
							<td colspan="2">
								<hr/>							
							</td>
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

