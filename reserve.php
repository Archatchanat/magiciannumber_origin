<?
	ob_start();
	session_start();
	require("connect/connect.php");
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
		
		//----------------------------------------------------------------------
		
		$tel_ah = "select * from number_owner where p_id = '".$_POST['p_id']."'";
		$get_ah = mysql_query($tel_ah);
		$num_ah = mysql_num_rows($get_ah);
		
		if($num_ah > 1)
		{
			echo "<script language=\"JavaScript\">";
			echo "alert('Eror');";
			echo "window.location='good_number.php';";
			echo "</script>";
			exit();
		}
		//----------------------------------------------------------------------
		
		$p_id     = $_POST['p_id'];
		$p_number = $_POST['p_number'];
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
		
		//-------------------------------------------------------------------------------------------------------
		/*
		        $time       = date("Y-m-d H:i:s");;
				$strTo      = "cameraman2@hotmail.com,directorpuay@gmail.com,juvelady@gmail.com,minemom@hotmail.com";
				$strSubject = "แจ้งเตือน :: มีผู้ใช้จองเบอร์ เมื่อเวลา $time ค่ะ";
				$strHeader  = "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
				$strHeader .= "From: minemom@hotmail.com";
				$strVar     = "My Message";
				$strMessage = "
					<fieldset style='width:600px;'>
					<table width='600' border='0' bordercolor='#999999' cellpadding='3' cellspacing='0'>
						<tr>
							<td colspan='2' bgcolor='#3B5998'><font color=white size='2'><b>รายละเอียด การจองเบอร์</b></font></td>
						</tr>
						<tr>
							<td align='left' width='200'>เบอร์โทรศัพท์ที่ต้องการจอง ::</div></td>
							<td align='left'  width='400'>".$p_number."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>ชื่อ - นามสกุล ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_name']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>ที่อยู่ ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_address']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>เบอร์โทพศัพท์มือถือ ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_tel']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>รายละเอียดเพิ่มเติม ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_detail']."</div></td>
						</tr>
						<tr>
    						<td colspan='2'>
									<hr/>
							</td>
  						</tr>
						<tr>
    						<td colspan='2'>
									<p> พรพิฆเณศว์  คงสมศักดิ์ (ป๋วย) </p> 
									<p> เข้าไปดูคำทำนาย เบอร์โทรของคุณได้ที่นี่ </p>
 									<p> <a href='www.magiciannumber.com'>www.magiciannumber.com</a> ดูฟรีชัวร์ครับ </p>
							</td>
  						</tr>
					</table>
					</fieldset>";
					
				$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
				if($flgSend)
				{
					echo "Email Sending.";
				}
				else
				{
					echo "Email Can Not Send.";
				}
				
				
		
	
		echo "<script language=\"JavaScript\">";
		echo "alert('จองเรียบร้อยแล้วค่ะ');";
		echo "window.location='good_number.php';";
		echo "</script>";
		
		*/
		//-------------------------------------------------------------------------------------------------------------------------
				$time       = date("Y-m-d H:i:s");;
			/*		$strTo      = $_SESSION[str_admin_email];
				$strSubject = "แบบสอบภาม : 4 VIP Life   $time";
				$strHeader  = "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
				$strHeader .= "From: $_POST[staff_email]";
				//$strHeader .= "From: minemom@hotmail.com";
				$strVar     = "My Message";*/
				
				$_POST['mc_email'] = "juvelady@gmail.com";
				
				$from     = "$_POST[mc_email]";
				$fromname =  "$_POST[mc_email]";
				$to  = "cameraman2@hotmail.com";
				$to1 = "juvelady@gmail.com";
				$to2 = "directorpuay@gmail.com";
				$subject = "แจ้งเตือน :: มีผู้ใช้จองเบอร์ เมื่อเวลา $time ค่ะ";
				$message = "<fieldset style='width:600px;'>
					<table width='600' border='0' bordercolor='#999999' cellpadding='3' cellspacing='0'>
						<tr>
							<td colspan='2' bgcolor='#3B5998'><font color=white size='2'><b>รายละเอียด การจองเบอร์</b></font></td>
						</tr>
						<tr>
							<td align='left' width='200'>เบอร์โทรศัพท์ที่ต้องการจอง ::</div></td>
							<td align='left'  width='400'>".$p_number."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>ชื่อ - นามสกุล ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_name']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>ที่อยู่ ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_address']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>เบอร์โทพศัพท์มือถือ ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_tel']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>รายละเอียดเพิ่มเติม ::</div></td>
							<td align='left'  width='400'>".$_POST['owner_detail']."</div></td>
						</tr>
						<tr>
    						<td colspan='2'>
									<hr/>
							</td>
  						</tr>
						<tr>
    						<td colspan='2'>
									<p> พรพิฆเณศว์  คงสมศักดิ์ (ป๋วย) </p> 
									<p> เข้าไปดูคำทำนาย เบอร์โทรของคุณได้ที่นี่ </p>
 									<p> <a href='www.magiciannumber.com'>www.magiciannumber.com</a> ดูฟรีชัวร์ครับ </p>
							</td>
  						</tr>
					</table>
					</fieldset>";

		include("mail/class.phpmailer.php");
	   
	  
		$mail = new PHPMailer();
		
		//หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
		$mail->CharSet = "utf-8"; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8
		$mail->IsHTML(true);
		  $mail->IsSMTP(); // กำหนดว่าเป็น SMTP นะ
			  //$mail->Host = 'ssl://smtp.gmail.com'; // กำหนดค่าเป็นที่ gmail ได้เลยครับ
			  //$mail->Port = 465; // กำหนด port เป็น 465 ตามที่ google บอกครับ
			  $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
		$mail->Username = 'worldit2007.staff@gmail.com'; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
		$mail->Password = '11223344559g'; // ใส่ passw/ รหัสผ่านของ email ที่ระบุด้านบน
		
		$mail->From = $from; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
		$mail->FromName = $fromname; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
		$mail->AddAddress($to);
		$mail->AddAddress($to1);
		$mail->AddAddress($to2);
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->Send();
		
		echo "<script language=\"JavaScript\">";
		echo "alert('จองเรียบร้อยแล้วค่ะ');";
		echo "window.location='good_number.php';";
		echo "</script>";

		//-------------------------------------------------------------------------------------------------------------------------
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
		if(contact.secret_code.value == "") {
			alert("กรุณาระบุ รหัสยืนยันความปลอดภัย.");
			contact.secret_code.focus();
			return false
		} 
		if((isNaN(contact.owner_tel.value)) || (contact.owner_tel.value.length<9))  {
			alert("กรุณาระบุ เบอร์มือถือให้ถูกต้อง ");
			contact.owner_tel.focus();
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
		
			<div id="content" style="color:#993300;">
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
                    		<td><div align="right">ชื่อเล่น ::</div></td>
							<td><input type="text" name="owner_name" size="50"></td>
                  		</tr>
						<tr>
				<td width="20%" align="right">ที่อยู่ :</td>
				<td width="84%" align="left"><textarea name="owner_address" cols="30" rows="5"><?=$owner_address?></textarea></td>
			</tr>
						<tr align="left">
                    		<td align="left"><div align="right">เบอร์โทร ติดต่อกลับ ::</div></td>
							<td><input name="owner_tel" type="text" size="20" maxlength="20"></td>
                  		</tr>
						<tr>
				<td width="20%" align="right">รายละเอียดเพิ่มเติม <br/>เช่น ชื่อ-นามสกุล วัน เดือน ปี เกิด และ เวลาเกิด::</td>
				<td width="84%" align="left"><textarea name="owner_detail" cols="30" rows="5"><?=$owner_detail?></textarea></td>
			</tr>
			
			<tr>
				<td align="right" valign="middle">รหัสความปลอดภัย ::</td>
				<td>
					<iframe name="a"src="captcha.php?width=120&height=40&characters=5" alt="captcha" frameborder="0" width="160" height="50" scrolling="no"></iframe>
				</td>
			</tr>
			<tr>
				<td align="right" style="font-size:14px;">ยืนยันรหัสความปลอดภัย ::</td>
				<td><input name="secret_code" type="text" /></td>
			</tr>	
						
						
										
						<tr align="left">
							<td><div align="right"></div></td>
							<td>
							  <input type="hidden" name="add"      value="true">
							  <input type="hidden" name="p_id"     value="<?=$_GET['p_id']?>">
							  <input type="hidden" name="p_number" value="<?=$p_number?>">
							  <input type="submit" name="Submit" value="ส่งข้อมูล"  <? if($_GET['p_id']==""){?>disabled="disabled"<? } ?>>
							  <input type="reset" name="Submit" value="ลบข้อมูล"  <? if($_GET['p_id']==""){?>disabled="disabled"<? } ?>>							</td>
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

