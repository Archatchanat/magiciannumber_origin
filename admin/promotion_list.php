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
	if($_GET["action"]=="insert")
	{
		$realname  = $HTTP_POST_FILES['fileupload']['name'];
		if (is_uploaded_file($HTTP_POST_FILES['fileupload']['tmp_name']) ){
			copy($HTTP_POST_FILES['fileupload']['tmp_name'], "../picture_promotion/$realname");
			$Url = $realname;
		}
		
		
		$tellway  = "INSERT INTO promotion VALUES(";
		$tellway .= "0
					,'$Url'
					,'$_POST[pro_title]'
					,'$_POST[pro_content]'
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		 
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='promotion_list.php';";
		echo "</script>";
    }
?>

<?
	if($_GET["action"]=="save")
	{
		$realname  = $HTTP_POST_FILES['fileupload']['name'];
		
		if (is_uploaded_file($HTTP_POST_FILES['fileupload']['tmp_name']) ){
			copy($HTTP_POST_FILES['fileupload']['tmp_name'], "../picture_promotion/$realname");
			$Url = $realname;
		} else {
			$Url = $_POST['pro_thumb'];
		}
		
		$sql_up = "update promotion 
				   set    pro_title   = '$_POST[pro_title]'
				   		 ,pro_thumb   = '$Url'
				   		 ,pro_content = '$_POST[pro_content]'
				   where  pro_id      = '".$_POST['pro_id']."'";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='promotion_list.php';";
		echo "</script>";
    }
	
	if($_GET["del"]=="true")
	{
		$sql_del= "delete from promotion where pro_id='".$_GET["pro_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='promotion_list.php';";
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

<script language="JavaScript">

function checkvalue(){
	if(form1.cat_id.value == "") {
		alert("โปรดเลือกหมวดหมู่โปรโมชั่น");
		form1.cat_id.focus();
		return false
	}
	
	if(form1.text_title.value == "") {
		alert("โปรดระบุ ชื่อโปรโมชั่น");
		form1.text_title.focus();
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
				<img src="images/plus_16.png" width="16" height="16" /> <a href="promotion_list.php">รายการโปรโมชั่น</a>
				</td>
			</tr>
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+0">&nbsp;เพิ่มโปรโมชั่น</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">รูปภาพ :</td>
				<td width="84%"><input type="file" name="fileupload" id="fileupload"></td>
			</tr>
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">ชื่อโปรโมชั่น :</td>
				<td width="84%"><input type="text" name="pro_title" style="width:250px;"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">เนื้อหา :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('pro_content');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '800' ;
						$oFCKeditor->Height = '800' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Create(); 
					?>					
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="Submit" value="เพิ่มข้อมูล" style="width:120px;" >
					<input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px;" >				
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
				

				$tel_text = "select * from promotion where pro_id = '".$_GET['pro_id']."'";
				$get_text = mysql_query($tel_text);
				
				while($rs_text = mysql_fetch_array($get_text))
				{
					$pro_id      = $rs_text['pro_id'];
					$pro_thumb   = $rs_text['pro_thumb'];
					$pro_title   = $rs_text['pro_title'];
					$pro_content = $rs_text['pro_content'];
	
				}
			?>
<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()"> 
			
			<tr>
				<td align="right" colspan="2">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="promotion_list.php">รายการโปรโมชั่น</a>				</td>
			</tr>
			
			
			
			<tr> 
				<td colspan="2" align="left" bgcolor="#999999">
					<font color="#FFFFFF" size="+0">&nbsp;แก้ไข โปรโมชั่น หมายเลข :: <? echo "<font color=red>[ ".$_GET['pro_id']." ]</font>"?></font>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">รูปภาพ :</td>
				<td width="84%"><img src="../picture_promotion/<?=$pro_thumb?>" width="240" height="150"></td>
			</tr>
			
			<tr>
				<td width="16%" align="right"></td>
				<td width="84%"><input type="file" name="fileupload" id="fileupload"></td>
			</tr>
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">ชื่อโปรโมชั่น :</td>
				<td width="84%" align="left"><input type="text" name="pro_title" value="<?=$pro_title?>" style="width:250px;">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;				</td>
			</tr>
			
			<tr>
				<td align="right">เนื้อหา :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('pro_content');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '800' ;
						$oFCKeditor->Height = '800' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Value = $pro_content ;
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="pro_thumb" value="<?=$pro_thumb?>">
					<input type="hidden" name="pro_id" value="<?=$pro_id?>">
					<input type="submit" name="Submit"  value="บันทึก" style="width:120px;" >
					&nbsp;&nbsp;<a href="promotion_list.php">[ ย้อนกลับ ]</a>				
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
		  	<?
		  		}
		  	?>
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  <table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="login" method="post" action="?action=insert">
			
			<tr> 
				<td colspan="8" align="right">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="promotion_list.php?add=true">เพิ่มโปรโมชั่น</a></span>
				</td>
			</tr>
			
			<tr> 
				<td colspan="8" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการโปรโมชั่น</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="7">&nbsp;</td>
			</tr>
			
			
			
			
			
			<?
				$telway = "select * from promotion";
				
				$objQuery = mysql_query($telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysql_num_rows($objQuery);
		
				$Per_Page = 10;   // Per Page

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
					$_GET['stack'] = "pro_id"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysql_query($telway);
			?>
			
			<tr bgcolor="#CCCCCC" height="22px;">
				<td width="10%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=text.pro_id&type_stack=ASC"><font color="#000033">ลำดับ</font></a>
					<? }else { ?>
   						<a href="?stack=text.pro_id&type_stack=DESC"><font color="#000033">ลำดับ</font></a>
					<? } ?>
				</td>
				
				<td width="30%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=text.text_title&type_stack=ASC"><font color="#000033">ภาพ</font></a>
					<? }else { ?>
   						<a href="?stack=text.text_title&type_stack=DESC"><font color="#000033">ภาพ</font></a>
					<? } ?>
				</td>
				
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=text.text_title&type_stack=ASC"><font color="#000033">ชื่อโปรโมชั่น</font></a>
					<? }else { ?>
   						<a href="?stack=text.text_title&type_stack=DESC"><font color="#000033">ชื่อโปรโมชั่น</font></a>
					<? } ?>
				</td>
				
				<td align="center" width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=text.text_date&type_stack=ASC"><font color="#000033">วันที่ตั้งกระทู้</font></a>
					<? }else { ?>
   						<a href="?stack=text.text_date&type_stack=DESC"><font color="#000033">วันที่ตั้งกระทู้</font></a>
					<? } ?>
				</td>
				
				<td width="5%" align="center">แก้ไข</td>
				<td width="5%" align="center">ลบ</td>
			</tr>
			
			<?
				while($rs_pro = mysql_fetch_array($objQuery))
				{
				$i++;
			?>
					<? if($i%2==0){ ?>
						<tr bgcolor="#FFFFCC" align="center">
					<? } else {?>
						<tr bgcolor="#CCCCFF" align="center">
					<? } ?>
						<td align="center">
							<?=$rs_pro['pro_id']?>
						</td>
					
						<td style="padding-top:5px;">
							<img src="../picture_promotion/<?=$rs_pro['pro_thumb']?>" width="240" height="150">
						</td>
						
						<td align="center">
							<?=$rs_pro['pro_title']?>
						</td>
						
						<td>
							<?=$rs_pro['pro_date']?>
						</td>
						<td align="center">
							<a href="?fix=true&pro_id=<?=$rs_pro['pro_id']?>"><img src="images/b_edit.png" width="16" height="16" border="0"></a>
						</td>
						<td align="center">
							<a href="?del=true&pro_id=<?=$rs_pro["pro_id"];?>" onClick="return Conf(<?=$rs_pro["pro_id"];?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>
						</td>
					</tr>
			<?
				}
			?>
			
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
  			</form>
		  </table>
		  
		  <br/>
		  <div align="left">
			จำนวนโปรโมชั่น <?= $Num_Rows;?> โปรโมชั่น :
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