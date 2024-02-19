<?
	ob_start();
	session_start();
	require("connect/connect.php");
	if (isset($_SERVER["HTTP_REFERER"]) ){
		$_SESSION["refer_url"] = $_SERVER["HTTP_REFERER"];  }
	else $_SESSION["refer_url"] = 'direct';
								
?>

<?
	$tel_text = "select * from forecast where 1 = 1";
	$get_text = mysql_query($tel_text);
				
	while($rs_text = mysql_fetch_array($get_text)){
		$content      = $rs_text['content'];
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

<script language="JavaScript">
	function checkvalue2(){
		if(form2.mobile_number.value == "") {
			alert("โปรดระบุ หมายเลขโทรศัพท์ของท่าน");
			form2.mobile_number.focus();
			return false
		}
		
		if(form2.mobile_number.value.length < 10){
			alert("โปรดระบุ หมายเลขโทรศัพท์ของท่านให้ครบ 10 หลัก");
			form2.mobile_number.focus();
			return false
		}
		
		return true;
	}
	
	function chkSubmit2()
	{
		 if(isNaN(document.form2.mobile_number.value))
		 {
			alert('โปรดระบุ เพียงตัวเลข');
			document.form2.mobile_number.value=""
			return false;
		 }
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
				<font color="#993300"><strong>ทำนายเบอร์โทรศัพท์</strong></font>
				<hr/>
		<table width="100%">
		<form name="form2" method="post" action="result_number.php" enctype="multipart/form-data" onSubmit="return checkvalue2()">
  		<tr>
    		<td><input name="mobile_number" type="text" maxlength="10" onKeyUp="chkSubmit2()" value=""/></td>
  		</tr>
  		<tr>
    		<td><input type="image" src="images/magic_16.png" name="click_login" id="click_login" value="Submit"/></td>
  		</tr>
		</form>
		</table>
			
			
			
			<?php
			$content = '';
			echo $content; ?>
				
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