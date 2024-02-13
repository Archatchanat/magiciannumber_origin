<?
	ob_start();
	session_start();
	require("../connect/connect.php");
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
                <? include("top.php");?>
            </div>
            <div class="clear"></div>
            <div class="Content">
                    <div class="ContentRight">
                        <?php include("menu.php");?>
                    </div>
					
					<!-------------------------------------------------------------------------------------------------------------------- -->
                	<div class="ContentLeft"> 
					
					<div id="profile2">
            			<div class="head">
                			</div>
        				
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