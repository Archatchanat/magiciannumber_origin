<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>

<?
	// plus num read
	$tell_read = "SELECT * FROM webboard WHERE webboard_id ='".$_GET['webboard_id']."'";
	$get_read  = mysql_query($tell_read);
	
	while($rs_read = mysql_fetch_array($get_read))
	{
		$num = $rs_read['webboard_read'];
		$webboard_title   = $rs_read['webboard_title'];
		$webboard_content = $rs_read['webboard_content'];
	}
	
	$pnum = $num+1;
	
	$sql_up = "update webboard set
			   webboard_read ='$pnum'
			   where webboard_id ='".$_GET['webboard_id']."'";
	$dbquery = mysql_query($sql_up);			   
?>

<?
	if($_GET['action']=="insert")
	{
			if($_REQUEST['action']=='insert'){ //หากมีการ Submit ข้อมูลผ่าน From มา
				if($_SESSION['security_code']!=$_POST['secret_code']) { // Check 
					echo "<script language='JavaScript'>alert('Invalid Security Code');history.back();</script>";
					exit();
				}
			}
		
		$webboard_id = $_POST['webboard_id'];
		
		$tellway  = "INSERT INTO webboard_comment VALUES(";
		$tellway .= "0
					,'$_POST[webboard_id]'
					,'$_POST[wc_comment]'
					,'$_POST[wc_post]'
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway); 
	
		//----------------------------------------------------------------------------------------------------------------
				$time       = date("Y-m-d H:i:s");;
				$strTo      = "cameraman2@hotmail.com";
				$strSubject = "แจ้งเตือน :: มีผู้ใช้แสดงความคิดเห็น เมื่อเวลา $time ค่ะ";
				$strHeader  = "Content-type: text/html; charset=utf-8\n"; // or UTF-8 //
				$strHeader .= "From: cameraman2@hotmail.com";
				$strVar     = "My Message";
				$strMessage = "
					<fieldset style='width:300px;'>
					<table width='300' border='0' bordercolor='#999999' cellpadding='3' cellspacing='0'>
						<tr>
							<td colspan='2' bgcolor='#3B5998'><font color=white size='2'><b>รายละเอียด</b></font></td>
						</tr>
						<tr>
							<td align='left' width='100'>ชื่อ ::</div></td>
							<td align='left'  width='200'>".$_POST['wc_post']."</div></td>
						</tr>
						<tr>
							<td align='left' width='100'>ความเห็น ::</div></td>
							<td align='left'  width='200'>".$_POST['wc_comment']."</div></td>
						</tr>
						<tr>
    						<td colspan='2'><a href='www.magiciannumber.com/webboard_detail.php?webboard_id=$webboard_id'>คลิกที่นี่ เพื่ออ่านความคิดเห็น</a></td>
  						</tr>
					</table>
					</fieldset>";

					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader); // @ = No Show Error //
					if($flgSend){}
					else{echo "Email Can Not Send.";}
		//----------------------------------------------------------------------------------------------------------------
		
		echo "<script language=\"JavaScript\">";
		echo "alert('Post Complete');";
		echo "window.location='webboard_detail.php?webboard_id=$webboard_id';";
		echo "</script>";
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

<script language="javascript">
	function formvalidate(form) {
		filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		
		if(comment.wc_comment.value == "") {
			alert("กรุณาระบุ ความคิดเห็น.");
			comment.wc_comment.focus();
			return false
		}
		
		if(comment.wc_post.value == "") {
			alert("กรุณาระบุ ชื่อ.");
			comment.wc_post.focus();
			return false
		}
		if(comment.secret_code.value == "") {
			alert("กรุณาระบุ รหัสยืนยันความปลอดภัย.");
			comment.secret_code.focus();
			return false
		}
		return true;
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
		
			<!------------------------------------------------------------------------------------------------------------ -->
			<div id="content">
				<font color="#FF9933" size="+1">
					<strong>เรื่อง <?=$webboard_title?></strong>
				</font>
			<hr>
			
			<div style="font-size:18px">
				<font color="#993300">
				<?=$webboard_content?>
				</font>
			</div>
			
			<br/><br/><br/><br/>
			<?
				$tell_wc = "SELECT * FROM webboard_comment WHERE webboard_id ='".$_GET['webboard_id']."' ORDER BY wc_id";
				$get_wc = mysql_query($tell_wc);
				$i = 0;
					
				while($rs_wc = mysql_fetch_array($get_wc))
				{
					$i++;
			?>				
						<div style="font-size:14px">
						<font color="#003366"># <?=$i?> 
						<?=$rs_wc['wc_content']?> </font> <br/>
						<font color="#006633" style="font-size:14px;"><strong><?=$rs_wc['wc_post']?></strong></font>
						<i><font size="-2" color="#993300">พิมพ์เมื่อเวลา :: <?=$rs_wc['wc_date']?></font></i>
						<br/><br/>
						</div>
			<?
				}
			?>
			<img src="images/yell_07.png" width="180" height="24" />
			<br/><br/>
			
			<fieldset style="padding:5px;">
				<legend><font color="#993300">แสดงความคิดเห็นของท่านที่นี่</font></legend>
				<form action="?action=insert" method="post" name="comment" onSubmit="return formvalidate(this)">
					
					<br/>
					
					<textarea name="wc_comment" cols="40" rows="5"></textarea>
					<i><font size="-1" color="#003366"> :: ความคิดเห็น</font></i> <br/><br/>
					
					<input type="text"   name="wc_post"/> 
					<i><font size="-1" color="#003366"> :: ชื่อของท่าน</font></i>	<br/><br/>
					
					<div style="width:120px; height:40px; margin-top:10px;">
					<iframe name="a"src="captcha.php?width=120&height=40&characters=5" alt="captcha" frameborder="0" width="160" height="50" scrolling="no"></iframe>
			  		</div>
					
					<br/>
					<input name="secret_code" type="text" />
					
			
					<i><font size="-1" color="#003366"> :: รหัสความปลอดภัย</font></i> <br/><br/>
					
					
					<input type="hidden" name="webboard_id" value="<?=$_GET['webboard_id']?>">
					<input type="submit" name="Submit" value="แสดงความคิดเห็น" />
				</form> 
			</fieldset>
			</div>
			<!------------------------------------------------------------------------------------------------------------ -->
			
			<!------------------------------------------------------------------------------------------------------------ -->
			<div id="content" style="color:#993300;">
				
				<table width="100%" border="0">
					<tr>
						<td width="80%" align="left">
							<div class="linkbox7">
								
									<strong><a href="webboard.php">กระดานสนทนา</a></strong>
								
							</div>
						</td>
						<td width="20%" align="center">
							<div class="linkbox7">
								
									<strong><a href="webboard_post.php">ตั้งกระทู้ ใหม่</a></strong>
								
							</div>
						</td>
					</tr>
				</table>
				<hr/>
				<table width="100%" border="0">
		  				
			<?
				$telway = "select * 
				           from   webboard
						   where  1=1";
				
				$objQuery = mysql_query($telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysql_num_rows($objQuery);
		
				$Per_Page = 100;   // Per Page

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
			
			
            <tr>
              	<td width="51%" background="images/menu.png"><div align="center">เรื่อง</div></td>
              	<td width="12%" background="images/menu.png"><div align="center">ผู้ตั้ง</div></td>
              	<td width="8%" background="images/menu.png"><div align="center">ผู้อ่าน</div></td>
              	<td width="20%" background="images/menu.png"><div align="center">วันที่</div></td>
            </tr>
			
			<?
				while($rs = mysql_fetch_array($objQuery))
				{
				$i++;
			?>
            <tr>
              	<td>
					<div align="left" class="linkbox7">
					<a href="webboard_detail.php?webboard_id=<?=$rs['webboard_id']?>">
						<?=$rs['webboard_title']?>
					</a>
					</div>
				</td>
              	<td>
					<div align="center" class="linkbox7">
					<a href="webboard_detail.php?webboard_id=<?=$rs['webboard_id']?>">
						<?=$rs['webboard_post']?>
					</a>
					</div>
				</td>
              	<td>
					<div align="center" class="linkbox7">
					<a href="webboard_detail.php?webboard_id=<?=$rs['webboard_id']?>">
						<?=$rs['webboard_read']?>
					</a>
					</div>
				</td>
              	<td>
			  		<div align="center" class="linkbox7">
					<a href="webboard_detail.php?webboard_id=<?=$rs['webboard_id']?>">
			  			<?
							echo substr($rs['webboard_date'],8,2)."-";
							echo substr($rs['webboard_date'],5,2)."-";
							echo substr($rs['webboard_date'],0,4);
						?>
					</a>
					</div>
				</td>
            </tr>
			<?
		  		}
		  	?>
          </table>
		  
		  <hr>
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
			</div>
			<!------------------------------------------------------------------------------------------------------------ -->
			
			
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
		<strong>www.magiciannumber.com
  			<br />
  			ติดต่อ เมจิก MagicianNumber.com@gmail.com
  			<br />
  			โทร.08-9695-9469 , 08-5195-1999
		</strong>
	</div>
<!--end__ :: sector3 -->
<!--=================================================================================================================================== -->

</body>
</html>