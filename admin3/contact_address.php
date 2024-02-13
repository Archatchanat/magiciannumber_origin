<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_GET["action"]=="save")
	{
	
		$sql_up = "update contact_address 
				   set    content = '$_POST[content]'
				   where  1 = 1 ";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='contact_address.php';";
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
                  <? include("top.php");?>
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
				$tel_text = "select * from contact_address where 1 = 1";
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
					<font color="#FFFFFF" size="+0">&nbsp;Contact :: Address</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="7%" align="right">Content :</td>
				<td width="83%">
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('content');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '900' ;
						$oFCKeditor->Height = '400' ;
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
					<input type="submit" name="Submit"  value="Save Change">
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