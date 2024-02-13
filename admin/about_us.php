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
	
		$sql_up = "update about_us 
				   set    content = '$_POST[content]'
				   where  1 = 1 ";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='about_us.php';";
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
  			<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left" style="padding:3px;">
					<font color="#FFFFFF" size="+0">&nbsp;เกี่ยวกับเรา</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="7%" align="right">เนื้อหา :</td>
				<td width="83%">
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('content');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '800' ;
						$oFCKeditor->Height = '800' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Value = $content ;
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr>
		
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="Submit"  value="บันทึก" style="width:120px; font-size:20px; height:45px;">
					&nbsp;&nbsp;<a href="promotion_list.php">[ ย้อนกลับ ]</a>				</td>
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