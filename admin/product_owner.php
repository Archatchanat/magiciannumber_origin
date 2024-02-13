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
		$p_id     = $_POST['p_id'];
		$p_status = "yes";
		
		$tellway  = "INSERT INTO number_owner VALUES(";
		$tellway .= "0
					,'$_POST[p_id]'
					,'$_POST[owner_name]'
					,'$_POST[owner_address]'
					,'$_POST[owner_tel]'
					,'$_POST[owner_detail]'
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		
		$sql_up2 = "update product set p_status = '$p_status' where  p_id ='".$_POST['p_id']."' ";
		$dbquery2 = mysql_query($sql_up2);
		
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='product_owner.php?p_id=$p_id';";
		echo "</script>";
    }
?>

<?
	if($_GET["action"]=="save")
	{
		$p_id   = $_POST['p_id'];
		$sql_up = "update number_owner set 
					 owner_name    = '$_POST[owner_name]'
					,owner_address = '$_POST[owner_address]'
					,owner_tel     = '$_POST[owner_tel]'
					,owner_detail  = '$_POST[owner_detail]'
					where  p_id ='".$_POST['p_id']."'";
		$dbquery = mysql_query($sql_up);
			
		echo "<script language=\"JavaScript\">";
		echo "alert('Save Complete');";
		echo "window.location='product_owner.php?p_id=$p_id';";
		echo "</script>";
    }
	
	if($_GET["del"]=="true")
	{
		$p_status = "no";
		
		$sql_del= "delete from number_owner where p_id='".$_GET["p_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		$sql_up3 = "update product set p_status = '$p_status' where  p_id ='".$_GET['p_id']."' ";
		$dbquery3 = mysql_query($sql_up3);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "</script>";
		
		echo "<script>history.back()</script>";
    }
?>

<?
	$tel_number = "select * from product where p_id = '".$_GET['p_id']."'";
	$get_number = mysql_query($tel_number);
	
	while($rs_number = mysql_fetch_array($get_number))
	{
		$p_id     = $rs_number['p_id'];
		$p_price  = $rs_number['p_price'];
		$p_number = $rs_number['p_number'];
	}
	
	$tel_who = "select * from number_owner where p_id = '".$_GET['p_id']."'";
	$get_who = mysql_query($tel_who);
	$num_who = mysql_num_rows($get_who);
	
	while($rs_who = mysql_fetch_array($get_who))
	{
		$owner_name    = $rs_who['owner_name'];
		$owner_address = $rs_who['owner_address'];
		$owner_tel     = $rs_who['owner_tel'];
		$owner_detail  = $rs_who['owner_detail'];
		$owner_date    = $rs_who['owner_date'];
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
	if(form1.owner_name.value == "") {
		alert("โปรดระบุ ชื่อผู้จอง");
		form1.owner_name.focus();
		return false
	}
	
	if(form1.owner_address.value == "") {
		alert("โปรดระบุ ที่อยู่");
		form1.owner_address.focus();
		return false
	}
	
	return true;
}
</script>

<script language="JavaScript">
		function Conf(text) {
		if (confirm("Confirm Delete") ==true) {
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
			
			<!--############################################################################################################# -->
			<!--start : insert owner -->
			<?
				if($num_who==0 && $_GET['fix'] !="true"){
			?>
			<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=insert" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr>
				<td align="right" colspan="8">&nbsp;<img src="images/plus_16.png"><a href="product_list.php">รายการเบอร์โทรศัพท์</a></td>
			</tr>
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left" style="padding:3px;">
				<font color="#FFFFFF" size="+0">&nbsp;เพิ่มรายละเอียดผู้จอง</font></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right" width="16%">หมายเลขเบอร์โทรศัพท์ :</td>
				<td width="84%">
					<?
						$num1 = substr($p_number,0,3);
						$num2 = substr($p_number,3,3);
						$num3 = substr($p_number,3,4);
							
						echo $num1."-".$num2."-".$num3;
					?>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">ชื่อผู้จอง :</td>
				<td align="left">
					<input name="owner_name" type="text">				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">ที่อยู่ :</td>
				<td width="84%" align="left"><textarea name="owner_address" cols="30" rows="5"></textarea></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">เบอร์โทรผู้จอง :</td>
				<td align="left">
					<input name="owner_tel" type="text">				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">รายละเอียดเพิ่มเติม:</td>
				<td width="84%" align="left"><textarea name="owner_detail" cols="30" rows="3"></textarea></td>
			</tr>
				
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="p_id" value="<?=$_GET['p_id']?>">
					<input type="submit" name="Submit" value="เพิ่มข้อมูล" style="width:120px; height:45px;" >
					<input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px; height:45px;" >				</td>
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
			<!--end__ : insert owner -->
			<!--############################################################################################################# -->
			
			<!--############################################################################################################# -->
            <?
				if($_GET['fix']=="true"){
			?>
				<!------------------------------------------------------------------------------------------------------- -->
				
				
				<table width="90%" border="0" cellpadding="20" cellspacing="1" bgcolor="#FFFFFF">
  			 	<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()">
				
				<tr> 
					<td colspan="2" bgcolor="#999999"align="left">
						<font color="#FFFFFF" size="+0">&nbsp;แก้ไข รายละเอียดผู้จอง</font>					</td>
				</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right" width="16%">หมายเลขเบอร์โทรศัพท์ :</td>
				<td width="84%">
					<?
						$num1 = substr($p_number,0,2);
						$num2 = substr($p_number,2,4);
						$num3 = substr($p_number,6,4);
							
						echo $num1."-".$num2."-".$num3;
					?>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">ชื่อผู้จอง :</td>
				<td align="left">
					<input name="owner_name" type="text" value="<?=$owner_name?>">				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">ที่อยู่ :</td>
				<td width="84%" align="left"><textarea name="owner_address" cols="30" rows="5"><?=$owner_address?></textarea></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">เบอร์โทรผู้จอง :</td>
				<td align="left">
					<input name="owner_tel" type="text" value="<?=$owner_tel?>">				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">รายละเอียดเพิ่มเติม:</td>
				<td width="84%" align="left"><textarea name="owner_detail" cols="30" rows="3"><?=$owner_detail?></textarea></td>
			</tr>
				
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			
					 
				<tr>
					<td></td>
				  	<td>
						<input type="hidden" name="p_id"   value="<?=$p_id?>">
						<input type="submit" name="Submit" value="บันทึกข้อมูล" style="width:120px;" >
						&nbsp;&nbsp;<a href="product_owner.php?p_id=<?=$p_id?>&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>">[ ย้อนกลับ ]</a>					</td>
				</tr>
				
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
			
				
			
				<tr>
					<td colspan="2"><hr/></td>
				</tr>
  				</form>
		  		</table>
				<!------------------------------------------------------------------------------------------------------- -->
            <?
		  		}
		  	?>
			
			<?
				if($num_who >= 1 && $_GET['fix']==""){
			?>
			
			<table width="90%">
			
				<tr>
					<td align="left" colspan="8">&nbsp;<img src="images/plus_16.png"><a href="product_list.php">รายการเบอร์โทรศัพท์</a></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td align="right" width="15%">รายละเอียดผู้จองเบอร์ :</td>
					<td width="80%">
						<?
						
							$num1 = substr($p_number,0,2);
							$num2 = substr($p_number,2,4);
							$num3 = substr($p_number,6,4);
							
							echo $num1."-".$num2."-".$num3;
						?>					</td>
				</tr>
				<tr>
					<td align="right">ราคา :</td>
					<td><?=number_format($p_price)?></td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;					</td>
				</tr>
				<tr>
					<td align="right">ชื่อผู้จอง :</td>
					<td><?=$owner_name?></td>
				</tr>
				<tr>
					<td align="right">ที่อยู่ :</td><td><?=$owner_address?></td>
				</tr>
				<tr>
					<td align="right">เบอร์โทรศัพท์ :</td><td><?=$owner_tel?></td>
				</tr>
				<tr>
					<td align="right">รายละเอียด :</td><td><?=$owner_detail?> </td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td align="right">วันที่จอง :</td>
					<td>
						
						
						<?
						
							$day   = substr($owner_date,8,2);
							$month = substr($owner_date,5,2);
							$year  = substr($owner_date,0,4);
							
							echo $day."-".$month."-".$year;
						?>					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
					<a href="product_owner.php?p_id=<?=$p_id;?>&fix=true"><img src="images/b_edit.png" border="0">[แก้ไข]</a>
					<a href="product_owner.php?del=true&p_id=<?=$p_id;?>" onClick="return Conf(<?=$rs_who["p_id"];?>)"><img src="images/_delete_data.png" border="0">[ลบ]</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="product_list.php?stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>">กลับ</a>					</td>
				</tr>
			</table>
			<?
				}
			?>
           <!--############################################################################################################# -->
           
		  
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  <!-- <form action="?action=update2" method="post">
		 	<input type="submit" name="Submit2" value="Set Sub Id">
		 </form> --><!--------------------------------------------------------------------------------------------------------------- -->
            </div>
					</div>
					
                    </div>
					
            </div> 
     </div>
	 
	 
</body>
</html>