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
			copy($HTTP_POST_FILES['fileupload']['tmp_name'], "../picture_category/$realname");
			$Url = $realname;
		}
		
		$tellway  = "INSERT INTO text_category VALUES(";
		$tellway .= "0
					,'$_POST[cat_title]'
					,'$Url'
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		 
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='text_add_category.php';";
		echo "</script>";
    }
	
	if($_GET["action"]=="save")
	{
		$realname  = $HTTP_POST_FILES['fileupload']['name'];
		
		if (is_uploaded_file($HTTP_POST_FILES['fileupload']['tmp_name']) ){
			copy($HTTP_POST_FILES['fileupload']['tmp_name'], "../picture_category/$realname");
			$Url = $realname;
		}
		else
		{
			$Url = $_POST['cat_picture'];
		}
		
		$sql_up = "update text_category set cat_title   = '$_POST[cat_title]'
		                                      ,cat_picture = '$Url '
		                                       where cat_id ='".$_POST['cat_id']."'";
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='text_add_category.php';";
		echo "</script>";
    }
	
	if($_GET["del"]=="true")
	{
		$sql_del= "delete from text_category where cat_id='".$_GET["cat_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='text_add_category.php';";
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
	if(form1.cat_title.value == "") {
		alert("โปรดระบุ ชื่อหมวดสินค้า");
		form1.cat_title.focus();
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
			<?
				if($_GET['fix']!="true"){
			?>
			<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=insert" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+0">&nbsp;เพิ่มหมวดหมู่บทความ</font>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<!--<tr>
				<td align="right">ภาพหมวดหมู่สินค้า :</td>
				<td><input type="file" name="fileupload" id="fileupload"></td>
			</tr> -->
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		
			<tr>
				<td width="18%" align="right">ชื่อหมวดหมู่บทความ :</td>
				<td width="82%" align="left"><input type="text" name="cat_title" style="width:250px;">&nbsp;</td>
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
		  	<?
				if($_GET['fix']=="true"){
				
				$tel_cat ="select * from text_category where cat_id = '".$_GET['cat_id']."'";
				$get_cat = mysql_query($tel_cat);
				
				while($rs_cat = mysql_fetch_array($get_cat))
				{
					$cat_id      = $rs_cat['cat_id'];
					$cat_title   = $rs_cat['cat_title'];
					$cat_picture = $rs_cat['cat_picture'];
				}
			?>
			<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr> 
				<td colspan="2" align="left" bgcolor="#999999">
					<font color="#FFFFFF" size="+0">&nbsp;แก้ไขชื่อหมวดหมู่บทความ</font>				</td>
			</tr>
			
			<!--<tr>
				<td colspan="2">&nbsp;</td>
			</tr> -->
			
			<!--<tr>
				<td align="right">ภาพหมวดหมู่สินค้า :</td>
				<td><img src="../picture_category/<?=$cat_picture?>"></td>
			</tr> -->
			
			<!--<tr>
				<td colspan="2">&nbsp;</td>
			</tr> -->
			
			<!--<tr>
				<td align="right"></td>
				<td><input type="file" name="fileupload" id="fileupload"></td>
			</tr> -->
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
		
			<tr>
				<td width="16%" align="right">ชื่อหมวดหมู่ทความ :</td>
				<td width="84%" align="left"><input type="text" name="cat_title" value="<?=$cat_title?>" style="width:250px;">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;
				
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="cat_id"      value="<?=$cat_id?>">
					<input type="hidden" name="cat_picture" value="<?=$cat_picture?>">
					<input type="submit" name="Submit" value="บันทึก" style="width:120px;" >
					&nbsp;&nbsp;<a href="text_add_category.php">[ ย้อนกลับ ]</a>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;
				
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
		  	<?
		  		}
		  	?>
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  
		  <br/>
		  
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  <table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="login" method="post" action="?action=insert">
			<tr> 
				<td colspan="5" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;หมวดหมู่บทความ</font>				</td>
			</tr>
			
			<tr>
				<td colspan="5">&nbsp;
				
				</td>
			</tr>
			
			<tr bgcolor="#CCCCCC">
				<td width="5%" align="center">ลำดับ</td>
				<!--<td align="center">ภาพหมวดหมู่สินค้า</td> -->
				<td align="center">ชื่อหมวดหมู่บทความ</td>
				<td width="5%" align="center">แก้ไข</td>
				<td width="5%" align="center">ลบ</td>
			</tr>
			
			<tr>
				<td colspan="5">&nbsp;
					
				</td>
			</tr>
			
			<?
				$tel_cat ="select * from text_category";
				$get_cat = mysql_query($tel_cat);
				
				while($rs_cat = mysql_fetch_array($get_cat))
				{
			?>
					<tr>
						<td align="center"><?=$rs_cat['cat_id']?></td>
						<!--<td align="center"><img src="../picture_category/<?=$rs_cat['cat_picture']?>"></td> -->
						<td align="center">
							<?=$rs_cat['cat_title']?>
						</td>
						<td align="center">
							<a href="?fix=true&cat_id=<?=$rs_cat['cat_id']?>"><img src="images/b_edit.png" width="16" height="16" border="0"></a>
						</td>
						<td align="center">
							<a href="?del=true&cat_id=<?=$rs_cat["cat_id"];?>" onClick="return Conf(<?=$rs_cat["cat_id"];?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>						
						</td>
					</tr>
			<?
				}
			?>
			
			<tr>
				<td colspan="4">&nbsp;
				
				</td>
			</tr>
			
			<tr>
				<td colspan="4"><hr/></td>
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