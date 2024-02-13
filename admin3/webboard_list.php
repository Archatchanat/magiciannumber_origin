<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_GET["action"]=="insert")
	{
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
		 
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='webboard_list.php';";
		echo "</script>";
    }
?>

<?
	if($_GET["action"]=="save")
	{
		$sql_up = "update webboard 
				   set    webboard_title   = '$_POST[webboard_title]'
				   		 ,webboard_content = '$_POST[webboard_content]'
						 ,webboard_post    = '$_POST[webboard_post]'
				   where  webboard_id      = '".$_POST['webboard_id']."'";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='webboard_list.php';";
		echo "</script>";
    }
	
	if($_GET["del"]=="true")
	{
		$sql_del= "delete from webboard where webboard_id='".$_GET["webboard_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='webboard_list.php';";
		echo "</script>";
    }
	
	// Delete comment of webboard
	if($_GET["action"]=="del2")
	{
		$sql_del= "delete from webboard_comment where wc_id='".$_GET["wc_id"]."'";
		$dbquery_del = mysql_query($sql_del);
	
		echo "<script language='JavaScript'>";
		echo "alert('Delete Webboard Comment Complete');";
		echo "</script>";
		echo "<script>history.back()</script>";
	}		
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Administrator Database System</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
</head>

<script language="JavaScript">

function checkvalue(){
	
	if(form1.webboard_title.value == "") {
		alert("โปรดระบุ ชื่อกระทู้");
		form1.webboard_title.focus();
		return false
	}
	
	if(form1.webboard_post.value == "") {
		alert("โปรดระบุ ผู้ชื่อตั้งกระทู้");
		form1.webboard_post.focus();
		return false
	}
	
	return true;
}
</script>

<script language="JavaScript">
		function Conf(text) {
		if (confirm("Confirm Delete [ "+ text+" ]") ==true) {
			return true;
		}
			return false;
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
			 <? if($_GET['add']=="true"){ ?>
				<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			 <form name="form1" method="post" action="?action=insert" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr>
				<td align="right" colspan="2">
					<img src="images/plus_16.png" width="16" height="16" /> <a href="webboard_list.php">รายการกระทู้</a>				
				</td>
			</tr>
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+0">&nbsp;เพิ่มกระทู้</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">ชื่อกระทู้ :</td>
				<td width="84%"><input type="text" name="webboard_title" style="width:250px;"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">เนื้อหา :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('webboard_content');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '700' ;
						$oFCKeditor->Height = '300' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">ผู้ตั้งกระทู้ :</td>
				<td><input name="webboard_post" type="text" size="10"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="Submit" value="เพิ่มข้อมูล" style="width:120px; font-size:20px; height:45px;" >
					<input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px; font-size:20px; height:45px;" >				
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
		  <? } ?>
		  <!--------------------------------------------------------------------------------------------------------------- -->
          
		  <!--------------------------------------------------------------------------------------------------------------- -->
            <?
				if($_GET['fix']=="true"){
				
				$tel_webboard = "select * 
				             	 from   webboard 
							 	 where  webboard_id = '".$_GET['webboard_id']."'";
							 
				$get_webboard = mysql_query($tel_webboard);
				
				while($rs_webboard = mysql_fetch_array($get_webboard))
				{
					$webboard_id      = $rs_webboard['webboard_id'];
					$webboard_title   = $rs_webboard['webboard_title'];
					$webboard_content = $rs_webboard['webboard_content'];
					$webboard_post    = $rs_webboard['webboard_post'];
				}
			?>
			<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=save" onSubmit="return checkvalue()">
			
			<tr>
				<td align="right" colspan="2">
					<img src="images/plus_16.png" width="16" height="16" /> <a href="webboard_list.php">รายการกระทู้</a>				
				</td>
			</tr>
			
			<tr> 
				<td colspan="2" align="left" bgcolor="#999999">
					<font color="#FFFFFF" size="+0">&nbsp;แก้ไข กระทู้ หมายเลข :: <? echo "<font color=red>[ ".$_GET['webboard_id']." ]</font>"?></font>					     			</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">ชื่อกระทู้ :</td>
				<td width="84%" align="left"><input type="text" name="webboard_title" value="<?=$webboard_title?>" style="width:250px;">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">เนื้อหา :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('webboard_content');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '700' ;
						$oFCKeditor->Height = '300' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Value = $webboard_content ;
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">ผู้ตั้งกระทู้ :</td>
				<td><input name="webboard_post" type="text" size="10" value="<?=$webboard_post?>"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="webboard_id" value="<?=$webboard_id?>">
					<input type="submit" name="Submit"  value="บันทึก" style="width:120px; font-size:20px; height:45px;" >
					&nbsp;&nbsp;<a href="webboard_list.php">[ ย้อนกลับ ]</a>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2"><hr/></td>
			</tr>
  			</form>
		  	</table>
			
			
			<!-- start table comment list -->
			<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" bordercolor="#FFFFFF">
			<tr> 
				<td colspan="8" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการความคิดเห็น</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr align="center">
				<td width="10%" bgcolor="#FFCCCC"><u>ลำดับ</u></td>
				<td width="70%" bgcolor="#FFCCCC"><u>ความคิดเห็น</u></td>
				<td width="10%" bgcolor="#FFCCCC"><u>ลบ</u></td>
			</tr>
			
			<?
				$tell_wc = "SELECT * FROM webboard_comment WHERE webboard_id ='".$_GET['webboard_id']."'";
				$get_wc = mysql_query($tell_wc);
		
				while($rs_wc = mysql_fetch_array($get_wc))
				{
					$j++;
			?>
		
			<? if($j%2 ==0) {?>
				<tr bgcolor="#CCCCCC">
			<? } else {?>
				<tr bgcolor="#FFFFFF">
			<? } ?>
					<td align="center"><?=$rs_wc['wc_id']?></td>
					<td style="padding:5px;"><?=$rs_wc['wc_content']?></td>
					<td align="center">
							<a href="webboard_list.php?action=del2&wc_id=<?=$rs_wc["wc_id"];?>" onClick="return Conf(<?=$rs_wc["wc_id"];?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>
					</td>
				<tr>
			<?
				}
			?>
			<tr>
			<td colspan="3"><hr/></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
			</table>
			<!-- end__ table comment list -->
			
			
		  	<?
		  		}
		  	?>
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  <table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="login" method="post" action="?action=insert">
			
			<tr> 
				<td colspan="8" align="right">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="webboard_list.php?add=true">เพิ่มกระทู้</a></span>
				</td>
			</tr>
			
			<tr> 
				<td colspan="8" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการกระทู้</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="8">&nbsp;				</td>
			</tr>
			
			
			
			
			
			<?
				$telway = "select * 
				           from   webboard
						   where  1=1";
				
				$objQuery = mysql_query($telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysql_num_rows($objQuery);
		
				$Per_Page = 20;   // Per Page

				$Page = $_GET["Page"];
				if(!$_GET["Page"])
				{
					$Page=1;
				}

				$Prev_Page = $Page-1;
				$Next_Page = $Page+1;

				$Page_Start = (($Per_Page*$Page)-$Per_Page);
				if($Num_Rows<=$Per_Page)
				{
					$Num_Pages =1;
				}
			
				else if(($Num_Rows % $Per_Page)==0)
				{
					$Num_Pages =($Num_Rows/$Per_Page) ;
				}
				else
				{
					$Num_Pages =($Num_Rows/$Per_Page)+1;
					$Num_Pages = (int)$Num_Pages;
				}
			
				if($_GET['type_stack']=="")
				{ 
					$_GET['type_stack'] = "DESC"; 
				}
			
				if($_GET['stack']=="")
				{ 
					$_GET['stack'] = "webboard_id"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysql_query($telway);
			?>
			
			<tr bgcolor="#CCCCCC" height="22px;">
				<td width="10%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=webboard.webboard_id&type_stack=ASC"><font color="#000033">ลำดับ</font></a>
					<? }else { ?>
   						<a href="?stack=webboard.webboard_id&type_stack=DESC"><font color="#000033">ลำดับ</font></a>
					<? } ?>
				</td>
		
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=webboard.webboard_title&type_stack=ASC"><font color="#000033">ชื่อกระทู้</font></a>
					<? }else { ?>
   						<a href="?stack=webboard.webboard_title&type_stack=DESC"><font color="#000033">ชื่อกระทู้</font></a>
					<? } ?>
				</td>
				
				<td align="center" width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=webboard.webboard_post&type_stack=ASC"><font color="#000033">ผู้ตั้งกระทู้</font></a>
					<? }else { ?>
   						<a href="?stack=webboard.webboard_post&type_stack=DESC"><font color="#000033">ผู้ตั้งกระทู้</font></a>
					<? } ?>
				</td>
				
				<td align="center" width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=webboard.webboard_read&type_stack=ASC"><font color="#000033">ผู้อ่าน</font></a>
					<? }else { ?>
   						<a href="?stack=webboard.webboard_read&type_stack=DESC"><font color="#000033">ผู้อ่าน</font></a>
					<? } ?>
				</td>
				
				<td align="center" width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=webboard.webboard_date&type_stack=ASC"><font color="#000033">วันที่ตั้งกระทู้</font></a>
					<? }else { ?>
   						<a href="?stack=webboard.webboard_date&type_stack=DESC"><font color="#000033">วันที่ตั้งกระทู้</font></a>
					<? } ?>
				</td>
				
				<td width="5%" align="center">แก้ไข</td>
				<td width="5%" align="center">ลบ</td>
			</tr>
			
			<?
				while($rs_webboard = mysql_fetch_array($objQuery))
				{
				$i++;
			?>
					<? if($i%2==0){ ?>
						<tr bgcolor="#FFFFCC" align="center">
					<? } else {?>
						<tr bgcolor="#CCCCFF" align="center">
					<? } ?>
						<td align="center">
							<?=$rs_webboard['webboard_id']?>
						</td>
						<td align="left" style="padding:5px;">
							<?=$rs_webboard['webboard_title']?>
						</td>
						<td>
							<?=$rs_webboard['webboard_post']?>
						</td>
						<td>
							<?=$rs_webboard['webboard_read']?>
							( 
							<?
								$tell_ans = "select * from webboard_comment where webboard_id = '".$rs_webboard['webboard_id']."'";
								$get_ans = mysql_query($tell_ans);
								$num_ans = mysql_num_rows($get_ans);
								
								echo $num_ans;
								 
							?>
							)
						</td>
						<td>
							<?=$rs_webboard['webboard_date']?>
						</td>
						<td align="center">
							<a href="?fix=true&webboard_id=<?=$rs_webboard['webboard_id']?>"><img src="images/b_edit.png" width="16" height="16" border="0"></a>
						</td>
						<td align="center">
							<a href="?del=true&webboard_id=<?=$rs_webboard["webboard_id"];?>" onClick="return Conf(<?=$rs_webboard["webboard_id"];?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>
						</td>
					</tr>
			<?
				}
			?>
			
			<tr>
				<td colspan="4">&nbsp;				</td>
			</tr>
  			</form>
		  </table>
		  
		  <br/>
		  <div align="left">
			จำนวนกระทู้ <?= $Num_Rows;?> กระทู้ :
			<?
			if($Prev_Page)
			{
				echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&stack=".$_GET['stack']."&type_stack=".$_GET['type_stack']."'><< Back</a> ";
			}

			for($i=1; $i<=$Num_Pages; $i++){
				if($i != $Page){
					echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&stack=".$_GET['stack']."&type_stack=".$_GET['type_stack']."'>$i</a> ]";
				}
				else{
					echo "<font size=4 color=green><b> $i </b></font>";
				}
			}
			
			if($Page!=$Num_Pages){
				echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&stack=".$_GET['stack']."&type_stack=".$_GET['type_stack']."'>Next>></a> ";
			}
			?>
		  </div>
		  <!--------------------------------------------------------------------------------------------------------------- -->
          </div>
        			</div>
					
                    </div>
					
            </div> 
     </div>
</body>
</html>