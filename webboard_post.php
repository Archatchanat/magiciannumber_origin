<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>

<?
	// insert to database
	if($_GET["action"]=="insert"){
	
		if($_REQUEST['action']=='insert'){ //หากมีการ Submit ข้อมูลผ่าน From มา
				if($_SESSION['security_code']!=$_POST['secret_code']) { // Check 
				echo "<script language='JavaScript'>alert('Invalid Security Code');history.back();</script>";
				exit();
			}
		}
		
		$title = $_POST['webboard_title'];
		
		$tellway  = "INSERT INTO webboard VALUES(";
		$tellway .= "0
					,'$_POST[webboard_title]'
					,'$_POST[webboard_content]'
					,'$_POST[webboard_post]'
					,''
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		
		
		//----------------------------------------------------------------------------------------------------------------
		// send email
		
		$tel_data = "select * from webboard where 1=1 order by webboard_id DESC limit 0,1 ";
		$get_data = mysql_query($tel_data);
		
		while($rs_data = mysql_fetch_array($get_data)){
			$webboard_id = $rs_data['webboard_id'];
		}
		
		//----------------------------------------------------------------------------------------------------------------
				$time       = date("Y-m-d H:i:s");;
				$strTo      = "cameraman2@hotmail.com";
				$strSubject = "แจ้งเตือน :: มีผู้ใช้ตั้งกระทู้ใหม่ในกระดานสนทนา เมื่อเวลา $time ค่ะ";
				$strHeader  = "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
				$strHeader .= "From: cameraman2@hotmail.com";
				$strVar     = "My Message";
				$strMessage = "
					<fieldset style='width:350px;'>
					<table width='350' border='0' bordercolor='#999999' cellpadding='3' cellspacing='0'>
						<tr>
							<td colspan='2' bgcolor='#3B5998'><font color=white size='2'><b>รายละเอียด</b></font></td>
						</tr>
						<tr>
							<td align='left' width='100'>หัวข้อเรื่อง ::</div></td>
							<td align='left'  width='250'>".$_POST['webboard_title']."</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>เนื้อหา ::</div></td>
							<td align='left'  width='250'>".$_POST['webboard_content']."</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>ผู้ตั้งกระทู้ ::</div></td>
							<td align='left'  width='250'>".$_POST['webboard_post']."</div></td>
						</tr>
						<tr>
    						<td colspan='2'><a href='www.magiciannumber.com/webboard_detail.php?webboard_id=$webboard_id'>คลิกที่นี่ เพื่ออ่านความคิดเห็น</a></td>
  						</tr>
					</table>
					</fieldset>";

					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader); // @ = No Show Error //
					if($flgSend){}
					else{echo "Email Can Not Send.";}
		//----------------------------------------------------------------------------------------------------------------
		
		echo "<script language=\"JavaScript\">";
		echo "alert('Post Complete');";
		echo "window.location='webboard.php';";
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
	
		if(contact.webboard_title.value == "") {
			alert("กรุณาระบุ หัวข้อกระทู้.");
			contact.webboard_title.focus();
			return false
		}
		
		if(contact.webboard_content.value == "") {
			alert("กรุณาระบุ 	เนื้อหากระทู้.");
			contact.webboard_content.focus();
			return false
		}
		
		if(contact.webboard_post.value == "") {
			alert("กรุณาระบุ ชื่อผู้ตั้งกระทู้.");
			contact.webboard_post.focus();
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
				<font color="#993300"><strong>ตั้งกระทู้</strong></font>
				<hr>
				<form action="?action=insert" method="post" name="contact" onSubmit="return formvalidate(this)">
					<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                  		<tr align="left">
                   		  	<td width="28%" align="left"><div align="right">หัวข้อกระทู้ ::</div></td>
							<td width="72%"><input type="text" name="webboard_title" size="60"></td>
                  		</tr>
						<tr align="left">
                    		<td align="left"><div align="right">เนื้อหา ::</div></td>
							<td><textarea name="webboard_content" cols="39" rows="5"></textarea></td>
						</tr>
						<tr align="left">
                   		  	<td align="left"><div align="right">ชื่อผู้ตั้งกระทู้ ::</div></td>
							<td><input type="text" name="webboard_post" size="20"></td>
                  		</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">รหัสความปลอดภัย ::</td>
							<td>
					<iframe name="a"src="captcha.php?width=120&height=40&characters=5" alt="captcha" frameborder="0" width="160" height="50" scrolling="no"></iframe>			
							</td>
						</tr>
						<tr>
							<td align="right">ยืนยันรหัสความปลอดภัย ::</td>
							<td>
					<input name="secret_code" type="text" />
							</td>
						</tr>				
						<tr align="left">
							<td><div align="right"></div></td>
							<td>
								<input type="hidden" name="add" value="true">
							  	<input type="submit" name="Submit" value="ส่งข้อมูล" >
							  	<input type="reset" name="Submit" value="ลบข้อมูล"  >							
							</td>
						</tr>
						<tr>
							<td colspan="2"><hr/></td>
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

