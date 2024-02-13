<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_POST["login"]=="true")
	{
		// Verify username 
		$tell_admin = "SELECT * 
					  FROM  admin_profile 
					  WHERE username = '".$_POST["username"]."' AND
					        password = '".$_POST["password"]."' ";
		$get_admin  = mysql_query($tell_admin);
		$admin_num  = mysql_num_rows($get_admin);
		
		if($admin_num !=1){
			echo "<script language=\"JavaScript\">";
			echo "alert('Username and Password Incorrect');";
			echo "window.location='index.php';";
			echo "</script>";
			exit();
		}
		else
		{
			$tell_admin  = "SELECT * 
						 	FROM   admin_profile 
						 	WHERE  username = '".$_POST["username"]."' AND
						           password = '".$_POST["password"]."' ";
			$get_admin = mysql_query($tell_admin);
			while($rs_admin = mysql_fetch_array($get_admin))
			{
				$_SESSION["str_admin_id"]   = $rs_admin['admin_id'];
				$_SESSION["str_admin_us"]   = $rs_admin['username'];
				$_SESSION["str_admin_pw"]   = $rs_admin['password'];
			}
			session_write_close();
			
			echo "<script language=\"JavaScript\">";
			echo "alert('Welcome to magiciannumber.com Management System');";
			echo "window.location='home.php';";
			echo "</script>";
			exit();
		 }
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator</title>


<style type="text/css">
<!--
.style_Tid{
	color: #FF6600;
	font-size: 14px;
	background-color: #FFFFFF;
	border: 1px solid #CCCCCC;
}
.style2 {
	color: #003399;
	border: 1px solid #999999;
	font-family: MS Sans Serif,Verdana, Arial, Helvetica, sans-serif;
	background-color: #FFFFFF;
	background-image: url(pic_css/bts1.jpg);
	height: 25px;
	cursor: hand;
}
.style4 {
	color: #003399;
	font-family: MS Sans Serif,Verdana, Arial, Helvetica, sans-serif;
	font-size: 10pt;
}
.styletxt {
		color: #003399;
		font-family: MS Sans Serif,Verdana, Arial, Helvetica, sans-serif;
	   font-size: 10pt;
		height: 22px;
		font-weight:bold;
		border: 1px solid #000000;
}
.style5 {
	color: #D90000;
	font-family: MS Sans Serif,Verdana, Arial, Helvetica, sans-serif;
   font-size: 10pt;
}
.textMemuser{
	color: #4D4D4D;
	font-family: MS Sans Serif,Verdana, Arial, Helvetica, sans-serif;
   font-size: 10pt;

}
body {
	background-image: url();
	background-color: #000066;
}
-->
</style>

<script language="JavaScript">

function checkvalue5(){
	if(form1.username.value == "") {
		alert("Please enter username.");
		form1.username.focus();
		return false
	}
	if(form1.password.value == "") {
		alert("Please enter password.");
		form1.password.focus();
		return false
	}
	return true;
}
</script>

</head>
<body>
	<form name="form1" method="post" action="" onSubmit="return checkvalue5()">
	<div align="center" style="margin-top:150px;">
	<table width="22%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
	<tr>
    	<td bordercolor="#FFFFFF" bgcolor="#FFFFFF">
			<table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#000066">
          	<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
            	<td><img src="images/login.jpg" alt="" width="502" height="119" /></td>
          	</tr>
          	<tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
            	<td width="100%">
              		<table width="100%" border="0" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
					
                	<tr bordercolor="#FFFFFF" bgcolor="#E9E9E9">
                  		<td colspan="2">&nbsp;</td>
            		</tr>
					
          			<tr bordercolor="#FFFFFF" bgcolor="#E9E9E9">
            			<td width="33%"><div align="right"><span class="style4">Username&nbsp;::</span></div></td>
                		<td width="67%" align="left">
							<input type="text" name="username" style="width:150px;">                  
						</td>
					</tr>
					
            		<tr bordercolor="#FFFFFF" bgcolor="#E9E9E9">
            			<td><div align="right"><span class="style4">Password&nbsp;::</span></div></td>
                		<td align="left">
							<input type="password" name="password" style="width:150px;">				  
						</td>
        			</tr>
					
                	<tr bordercolor="#FFFFFF" bgcolor="#E9E9E9">
                  		<td>&nbsp;</td>
                  		<td align="left">
							<input type="hidden" name="login" value="true">
				  			<input name="Submit2" type="submit" class="style2" value="    Login  ">
							<input name="Submit3" type="reset" class="style2" value="    Clear  ">
						</td>
                	</tr>

                	<tr bordercolor="#FFFFFF" bgcolor="#E9E9E9">
                  		<td colspan="2">&nbsp;</td>
                	</tr>
					
					<tr bordercolor="#FFFFFF" bgcolor="#E9E9E9">
                  		<td colspan="2">&nbsp;&nbsp;</td>
                	</tr>
			</table>
			</td>
			</tr>
			</table>
			</td>
    	</tr>
	</table>
	</div>  
	</form>

</body>
</html>