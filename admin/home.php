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
					
					<!-------------------------------------------------------------------------------------------------------------------- -->
                	<div class="ContentLeft"> 
					
					<div id="profile2" style="height:618px;">
            			<div class="head">
                			<img src="images/customer.gif" style="margin-top:5px; vertical-align:baseline"> Content</div>
        				
						<div style="padding:30px;">
						
						<center>
                			<font size="+6" style="font-family:'Times New Roman', Times, serif">
								<br/><br/><br/>
								Welcome to<br/>
								Admin Management System
							</font>
						</center>
						
               			</div>
        			</div>
					
                    </div>
					<!-------------------------------------------------------------------------------------------------------------------- -->
            </div> 
     </div>
</body>
</html>