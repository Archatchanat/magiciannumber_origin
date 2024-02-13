<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>


<?
	//-----------------------------------------------------------------------------------------------------------------------
		// start resize picture
			
		if(trim($_FILES["fileUpload"]["tmp_name"]) != "")
		{
			// start detect eror on picture ----------------------------------------
			$picture_name	= $_FILES["fileUpload"]["name"];
			$picture_size   = $_FILES["fileUpload"]["size"];
			$picture_type	= $_FILES["fileUpload"]["type"];
			$picture        = strtoupper(substr($picture_name, -4));
			
			//size
			if($picture_size > 200000){
				echo"<script language='JavaScript'>";
				echo"alert('Picture is too large');";
				echo"</script>";
				echo "<script>history.back()</script>";
				exit();
			}
		
			//type
			if($picture != ".JPG" && $picture != ".GIF") {
				echo"<script language='JavaScript'>";
				echo"alert('Picture is only JPG of GIF');";
				echo"</script>";
				echo "<script>history.back()</script>"; 
				exit();
			}
			// end__ detect eror on picture ----------------------------------------
			
			
			// start process resize picture  ---------------------------------------
			$images     = $_FILES["fileUpload"]["tmp_name"];
			$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
			copy($_FILES["fileUpload"]["tmp_name"],"pic_slip/".$_FILES["fileUpload"]["name"]);
			$width=159; //*** Fix Width & Heigh (Autu caculate) ***//
			$size=GetimageSize($images);
			$height=round($width*$size[1]/$size[0]);
			$images_orig = ImageCreateFromJPEG($images);
			$photoX = ImagesX($images_orig);
			$photoY = ImagesY($images_orig);
			$images_fin = ImageCreateTrueColor($width, $height);
			ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
			ImageJPEG($images_fin,"pic_slip/".$new_images);
			ImageDestroy($images_orig);
			ImageDestroy($images_fin);
			// end__ process resize picture  ---------------------------------------
		}
		
		// end__ resize picture
		//-----------------------------------------------------------------------------------------------------------------------
	// insert to database
	if($_GET["action"]=="insert")
	{
		
		if($_REQUEST['action']=='insert'){ //หากมีการ Submit ข้อมูลผ่าน From มา
			if($_SESSION['security_code']!=$_POST['secret_code']) { // Check 
				echo "<script language='JavaScript'>alert('Invalid Security Code');history.back();</script>";
				exit();
			}
		}
			
		//-----------------------------------------------------------------------------
		$sql      = "select * from product where p_number = '".$_POST[p_number]."'";
		$dbquery  = mysql_query($sql);
		$check    = mysql_num_rows($dbquery);
		
		if($check == 0){
			echo "<script language=\"JavaScript\">";
			echo "alert('The number is wrong please try again');";
			echo "window.location='payment.php';";
			echo "</script>";
			exit();
		}
		//-----------------------------------------------------------------------------
		$mp_date = $_POST['day']."-".$_POST['month']."-".$_POST['year'];
		$mp_time = $_POST['hour'].":".$_POST['min'];
		
		$tellway  = "INSERT INTO member_payment VALUES(";
		$tellway .= "0
					,'$_POST[p_number]'
					,'".$new_images."'
					,'".$_FILES["fileUpload"]["name"]."'
					,'$_POST[mp_price]'
					,'$mp_date'
					,'$mp_time'
					,'$_POST[mp_email]'
					,'$_POST[mp_name]'
					,'$_POST[mp_address]'
					,'$_POST[mp_tel]'
					,'$_POST[mp_send]'
					,'$_POST[mp_detail]'
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		
		
		//-------------------------------------------------------------------------------------------------------
		
		// send email to owner web
			$time       = date("Y-m-d H:i:s");
			$strTo      = "cameraman2@hotmail.com";
			$strSubject = "แจ้งเตือน :: มีผู้ใช้แจ้งชำระเงิน เมื่อเวลา $time ค่ะ";
			$strHeader  = "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
			$strHeader .= "From: cameraman2@hotmail.com";
			$strVar     = "My Message";
			$strMessage = "
					<fieldset style='width:600px;'>
					<table width='600' border='0' bordercolor='#999999' cellpadding='3' cellspacing='0'>
						<tr>
							<td colspan='2' bgcolor='#3B5998'><font color=white size='2'><b>รายละเอียด แจ้งชำระเงิน</b></font></td>
						</tr>
						<tr>
							<td align='left' width='200'>เบอร์โทรศัพท์ที่ท่านซื้อ ::</div></td>
							<td align='left'  width='400'>".$_POST['p_number']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>จำนวนเงินที่ชำระ ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_price']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>วันที่ชำระ ::</div></td>
							<td align='left'  width='400'>".$mp_date."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>เวลาที่ชำระ ::</div></td>
							<td align='left'  width='400'>".$mp_time."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>อี-เมล์ ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_email']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>ชื่อ-นามสกุล ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_name']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>ที่อยู่ ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_address']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>เบอร์โทรศัพท์มือถือผู้ชำระเงิน ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_tel']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>รูปแบบการจัดส่ง ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_send']."</div></td>
						</tr>
						<tr>
							<td align='left' width='200'>รายละเอียดอื่นๆ ::</div></td>
							<td align='left'  width='400'>".$_POST['mp_detail']."</div></td>
						</tr>
						<tr>
    						<td colspan='2'><a href='www.magiciannumber.com'>www.magiciannumber.com</a></td>
  						</tr>
					</table>
					</fieldset>";

					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader); // @ = No Show Error //
					if($flgSend){}
					else{echo "Email Can Not Send.";}
					
		//-------------------------------------------------------------------------------------------------------
		
		// send email to paymenter
		
		
		//-------------------------------------------------------------------------------------------------------
		
		echo "<script language=\"JavaScript\">";
		echo "alert('Payment Complete');";
		echo "window.location='payment.php';";
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
		
		if(contact.p_number.value == "") {
			alert("กรุณาระบุ เบอร์โทรศัพท์ที่ท่านซื้อ.");
			contact.p_number.focus();
			return false
		}
		if(contact.mp_price.value == "") {
			alert("กรุณาระบุ จำนวนเงินที่ชำระ.");
			contact.mp_price.focus();
			return false
		}
		if(contact.mp_email.value == "") {
			alert("กรุณาระบุ อีเมลล์.");
			contact.mp_email.focus();
			return false
		}
		if (!(filter.test(contact.mp_email.value))) {
			alert("กรุณาระบุ อีเมลล์ให้ถูกต้อง.");
			contact.mp_email.value = ""
			contact.mp_email.focus();
			
			return false;
		}
		if(contact.mp_name.value == "") {
			alert("กรุณาระบุ ชื่อ - นามสกุล.");
			contact.mp_name.focus();
			return false
		}
		if(contact.mp_address.value == "") {
			alert("กรุณาระบุ ที่อยู่.");
			contact.mp_address.focus();
			return false
		}
		if(contact.mp_tel.value == "") {
			alert("กรุณาระบุ เบอร์โทรศัพท์.");
			contact.mp_tel.focus();
			return false
		}
		if(contact.mp_detail.value == "") {
			alert("กรุณาระบุ รายละเอียด.");
			contact.mp_detail.focus();
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
					<font color="#993300"><strong>แจ้งชำระเงิน</strong></font><hr/>
					<p>โอนเงินมาที่ ตามรายละเอียดด้านล่าง</p>
					<p>
						
						<table width="100%" cellpadding="5">
							<tr>
							  <td width="24%" rowspan="3" align="center"><img src="/picture_logo/ka.png" width="84" height="79" /></td>
								<td width="14%" align="right">ธนาคาร :</td>
								<td width="62%">ธนาคาร กสิกรไทย  สาขา เทสโก้ โลตัส บางแค</td>
							</tr>
							<tr>
							  <td align="right">ชื่อบัญชี :</td>
								<td>พรพิฆเณศว์  คงสมศักดิ์</td>
							</tr>
							<tr>
							  <td align="right">เลขบัญชี :</td>
								<td>969 2 05419 6</td>
							</tr>
                            	<!-- <tr>
                            	  <td width="24%" rowspan="3" align="right"><img src="/picture_logo/tmb.png" width="120" height="61" /></td>
								<td width="14%" align="right">ธนาคาร :</td>
								<td>ธนาคาร ทหารไทย   สาขา  มหาวิทยาลัยราชภัฏจันทรเกษม</td>
							</tr>
							<tr>
							  <td align="right">ชื่อบัญชี :</td>
								<td>พรพิฆเณศว์  คงสมศักดิ์</td>
							</tr>
							<tr>
							  <td align="right">เลขบัญชี :</td>
								<td>162 2 16554 4</td>
							</tr> -->
						</table>
					</p>
					
<p>
						หลังจากที่ท่านชำระเงินเรียบร้อย เชิญกรอกข้อมูลด้านล่างได้เลยครับ
					</p>
					
				
				<hr>
				
					<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
					<form action="?action=insert" method="post" name="contact" enctype="multipart/form-data" onSubmit="return formvalidate(this)">
						<tr>
							<td align="center" colspan="2">
								<strong><font color="#006600"><u>ข้อมูลรายละเอียดการชำระเงิน</u></font></strong>
							</td>
						</tr>
						<tr align="left">
                   		  	<td width="32%" align="left"><div align="right">เบอร์โทรศัพท์ที่ท่านซื้อ ::</div></td>
							<td width="68%">
								<input type="text" name="p_number" size="20" maxlength="10">							
						  	</td>
                  		</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td width="32%" align="right">ภาพสลิปการโอนเงิน :</td>
							<td width="68%"><input type="file" name="fileUpload"></td>
						</tr>
						<tr align="left">
                   		  <td width="32%" align="left"><div align="right">จำนวนเงินที่ชำระ ::</div></td>
							<td width="68%">
								<input type="text" name="mp_price" size="10" maxlength="10">							
						  </td>
                  		</tr>
						
						
						<tr align="left">
                   		  <td width="32%" align="left"><div align="right">วันที่ชำระ ::</div></td>
							<td width="68%">
								<select name="day">
                            		<?
                                		for($i=1; $i<=31; $i++){
                                    	if($i<10){
                                        	if($i==date(d))
                                            	echo"<option value=\"0$i\" selected=\"selected\">0$i</option>";
                                        	else
                                            	echo"<option value=\"0$i\">0$i</option>";
                                    	}
                                    	else{
                                        	if($i==date(d))
                                            	echo"<option value=\"$i\" selected=\"selected\">$i</option>";
                                        	else
                                            	echo"<option value=\"$i\">$i</option>";	
                                    		}
                                		}
                            		?>
                        			</select> /
									  	
									<select name="month">
                            			<option value="01" <? if(date(m)=='01') echo "selected=\"selected\"";?>>01</option>
                            			<option value="02" <? if(date(m)=='02') echo "selected=\"selected\"";?>>02</option>
                            			<option value="03" <? if(date(m)=='03') echo "selected=\"selected\"";?>>03</option>
                            			<option value="04" <? if(date(m)=='04') echo "selected=\"selected\"";?>>04</option>
                            			<option value="05" <? if(date(m)=='05') echo "selected=\"selected\"";?>>05</option>
                            			<option value="06" <? if(date(m)=='06') echo "selected=\"selected\"";?>>06</option>
                            			<option value="07" <? if(date(m)=='07') echo "selected=\"selected\"";?>>07</option>
                            			<option value="08" <? if(date(m)=='08') echo "selected=\"selected\"";?>>08</option>
                            			<option value="09" <? if(date(m)=='09') echo "selected=\"selected\"";?>>09</option>
                            			<option value="10" <? if(date(m)=='10') echo "selected=\"selected\"";?>>10</option>
                            			<option value="11" <? if(date(m)=='11') echo "selected=\"selected\"";?>>11</option>
                            			<option value="12" <? if(date(m)=='12') echo "selected=\"selected\"";?>>12</option>
                        			</select> /
									  	
									<select name="year">
                            		<?
                                		for($i=2554; $i<2563; $i++){
                                    	if($i==(date(Y))+543)
                                        	echo "<option value=\"$i\" selected=\"selected\">$i</option>";
                                    	else
                                        	echo "<option value=\"$i\">$i</option>";
                                		}	
                            		?>
                        			</select>	
						  </td>
                  		</tr>
						<tr>
						
						<tr align="left">
                   		  <td width="32%" align="left"><div align="right">เวลาที่ชำระ ::</div></td>
							<td width="68%">
								<select name="hour">
                            		<?
                                		for($i=0; $i<=24; $i++){
                                    	if($i<10){
                                        	if($i==0)
                                            	echo"<option value=\"0$i\" selected=\"selected\">0$i</option>";
                                        	else
                                            	echo"<option value=\"0$i\">0$i</option>";
                                    	}
                                    	else{
                                        	if($i==0)
                                            	echo"<option value=\"$i\" selected=\"selected\">$i</option>";
                                        	else
                                            	echo"<option value=\"$i\">$i</option>";	
                                    		}
                                		}
                            		?>
                        		</select> ::
								
								<select name="min">
                            		<?
                                		for($i=0; $i<=60; $i++){
                                    	if($i<10){
                                        	if($i==0)
                                            	echo"<option value=\"0$i\" selected=\"selected\">0$i</option>";
                                        	else
                                            	echo"<option value=\"0$i\">0$i</option>";
                                    	}
                                    	else{
                                        	if($i==0)
                                            	echo"<option value=\"$i\" selected=\"selected\">$i</option>";
                                        	else
                                            	echo"<option value=\"$i\">$i</option>";	
                                    		}
                                		}
                            		?>
                        		</select>			
						  </td>
                  		</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" colspan="2">
								<strong><font color="#006600"><u>ข้อมูลผู้ชำระเงิน</u></font></strong>
							</td>
						</tr>
                  		<tr align="left">
                   		  <td width="32%" align="left"><div align="right">อี-เมล์ ::</div></td>
							<td width="68%">
								<input type="text" name="mp_email" size="50">							
						  </td>
                  		</tr>
						<tr align="left">
                    		<td><div align="right">ชื่อ-นามสกุล ::</div></td>
							<td><input type="text" name="mp_name" size="50"></td>
                  		</tr>
						
						<tr align="left">
                    		<td align="left"><div align="right">ที่อยู่ ::</div></td>
							<td>
								<textarea name="mp_address" cols="39" rows="5"></textarea>							
							</td>
						</tr>
						
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr align="left">
                    		<td align="left"><div align="right">เบอร์โทรศัพท์มือถือผู้ชำระเงิน ::</div></td>
							<td><input type="text" name="mp_tel" size="20" maxlength="20"></td>
                  		</tr>
						<tr align="left">
                    		<td align="left"><div align="right">รูปแบบการจัดส่ง ::</div></td>
							<td>
								<input type="radio" name="mp_send" value="normal" checked="checked">ธรรมดา <br/>
								<input type="radio" name="mp_send" value="ems">EMS	<br/>
								<input type="radio" name="mp_send" value="self">โทรนัดหมาย-กรุณาโทร 08-9695-9469 , 08-9695-9469 
							</td>
                  		</tr>
						<tr align="left">
                    		<td align="left"><div align="right">รายละเอียดอื่นๆ ::</div></td>
							<td>
								<textarea name="mp_detail" cols="30" rows="5"></textarea>							
							</td>
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
							<td><input name="secret_code" type="text" /></td>
						</tr>
									
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						
						<tr align="left">
							<td><div align="right"></div></td>
							<td>
							  <input type="submit" name="Submit" value="ส่งข้อมูล" >
							  <input type="reset" name="Submit" value="ลบข้อมูล" >							
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<hr/>							
							</td>
						</tr>
						  </form>
                </table>
		
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

