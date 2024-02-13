<?
	ob_start();
	session_start();
	require("../connect/connect.php");
	
	if($_SESSION["str_admin_us"]==""){
			echo "<script language=\"JavaScript\">";
			echo "alert('Error Login');";
			echo "window.location='index.php';";
			echo "</script>";
			exit();
	}
?>

<?
	if($_GET["action"]=="save")
	{
	
		$sql_up = "update admin_profile 
				   set    password = '$_POST[password]'
				   where  1 = 1 ";
				   
		$dbquery = mysql_query($sql_up);
		
		//----------------------------------------------------------------------------------------------------------------
				$time       = date("Y-m-d H:i:s");;
				$strTo      = "cameraman2@hotmail.com";
				//$strTo      = "minemom@hotmail.com";
				$strSubject = "แจ้งเตือนรหัสผ่านใหม่ของท่านค่ะ";
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
							<td align='left' width='100'>Username ::</div></td>
							<td align='left'  width='200'>admin</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>Password ::</div></td>
							<td align='left'  width='200'>".$_POST['password']."</div></td>
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
		
		echo "<script language='JavaScript'>";
		echo "alert('Change Password Complete');";
		echo "window.location='change_password.php';";
		echo "</script>";
    }
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Administrator Database System</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
</head>

<script language="javascript">
	function formvalidate(form) {	
		if(form1.password.value == "") {
			alert("Please enter password.");
			form1.password.focus();
			return false
		}
	
		if(form1.repassword.value == "") {
			alert("Please enter confirm password.");
			form1.repassword.focus();
			return false
		}
		
		if(form1.password.value != form1.repassword.value) {
			alert("Password and Confirm password must be same");
			form1.password.value   = "";
			form1.repassword.value = "";
			form1.password.focus();
		return false
		}
	
		return true;
	}	
</script>

<body>
    <div class="main">
            <div id="bgheader">
                <div id="logo"  style="margin-top:8px; color:#FFFFFF">
                   <!-- <img src="images/fontLogo.gif" width="192" height="22" style="margin-top:3px;"> -->
				   Admin Management System 
                </div>
                <div id="dateTime" style="width:500px; float:left;">
                    <div style="color:#FFF; float:left; margin-top:7px;">
						:: www.magiciannumber.com
					</div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="Content">
                    <div class="ContentRight">
                        <?php include("menu.php");?>
                    </div>
					

                	<div class="ContentLeft"> 
					
					<div id="profile">
            			<div class="head">
                			<img src="images/customer.gif" style="margin-top:5px; vertical-align:baseline"> Content</div>
        				
		
			<div style="padding:30px;">
             <!--------------------------------------------------------------------------------------------------------------- -->
             <?
				$tel_text = "select * from about_us where 1 = 1";
				$get_text = mysql_query($tel_text);
				
				while($rs_text = mysql_fetch_array($get_text))
				{
					$content      = $rs_text['content'];
				}
			?>
			<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return formvalidate(this)">
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left" style="padding:3px;">
					<font color="#FFFFFF" size="+0">&nbsp;เปลี่ยนรหัสผ่าน</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="21%" align="right">Username :</td>
				<td width="79%">admin</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td align="right">Password :</td>
				<td><input type="password" name="password"> <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td align="right">Re Password :</td>
				<td><input type="password" name="repassword"> <font color="#FF0000">*</font></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="Submit"  value="บันทึก" style="width:120px; font-size:20px; height:45px;">
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2"><hr/></td>
			</tr>
  			</form>
		  </table>
		  <!--------------------------------------------------------------------------------------------------------------- -->
</div>
        			</div>
					
                    </div>
					
            </div> 
     </div>
</body>
</html>