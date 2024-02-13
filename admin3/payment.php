<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_GET["del"]=="true"){
	
		$sql_del= "delete from member_payment where mp_id='".$_GET["mp_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='payment.php';";
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
	
	if(form1.text_title.value == "") {
		alert("โปรดระบุ ชื่อบทความ");
		form1.text_title.focus();
		return false
	}
	
	if(form1.text_post.value == "") {
		alert("โปรดระบุ ชื่อผู้เขียนทความ");
		form1.text_post.focus();
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
<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="login" method="post" action="?action=insert">
			
			
			
			<tr> 
				<td colspan="8" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการแจ้งชำระเงิน</font>				</td>
			</tr>
			
			<tr>
				<td colspan="7">&nbsp;				</td>
			</tr>
			
			
			
			
			
			<?
				$telway = "select *
				           from   member_payment
						   where  1=1 ";
				
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
					$_GET['stack'] = "mp_id"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysql_query($telway);
			?>
			
			<tr bgcolor="#CCCCCC" height="22px;">
				<td width="7%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=mp_id&type_stack=ASC"><font color="#000033">ลำดับ</font></a>
					<? }else { ?>
   						<a href="?stack=mp_id&type_stack=DESC"><font color="#000033">ลำดับ</font></a>
					<? } ?>				
				</td>
				
					<td width="13%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=mp_id&type_stack=ASC"><font color="#000033">ภาพการโอนเงิน</font></a>
					<? }else { ?>
   						<a href="?stack=mp_id&type_stack=DESC"><font color="#000033">ภาพการโอนเงิน</font></a>
					<? } ?>				</td>
				
				<td width="20%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=new_pic&type_stack=ASC"><font color="#000033">เบอร์โทรศัพท์ที่ลูกค้าซื้อ</font></a>
					<? }else { ?>
   						<a href="?stack=new_pic&type_stack=DESC"><font color="#000033">เบอร์โทรศัพท์ที่ลูกค้าซื้อ</font></a>
					<? } ?>				
				</td>
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=mp_name&type_stack=ASC"><font color="#000033">รายละเอียดการชำระเงิน</font></a>
					<? }else { ?>
   						<a href="?stack=mp_name&type_stack=DESC"><font color="#000033">รายละเอียดการชำระเงิน</font></a>
					<? } ?>				
				</td>
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=mp_name&type_stack=ASC"><font color="#000033">รายละเอียดผู้ชำระเงิน</font></a>
					<? }else { ?>
   						<a href="?stack=mp_name&type_stack=DESC"><font color="#000033">รายละเอียดผู้ชำระเงิน</font></a>
					<? } ?>				
				</td>
				
				
				
				
				<td width="10%" align="center">ลบ</td>
			</tr>
			
			<?
				while($rs_text = mysql_fetch_array($objQuery))
				{
				$i++;
			?>
					<? if($i%2==0){ ?>
						<tr bgcolor="#FFFFCC" align="center">
					<? } else {?>
						<tr bgcolor="#CCCCFF" align="center">
					<? } ?>
						<td align="center"><?=$rs_text['mp_id']?></td>
						<td align="center" style="padding:5px;">
							<img src="../pic_slip/<?=$rs_text['new_pic']?>">
						</td>
						<td>
							<strong>
								<?
									$num1 = substr($rs_text['p_number'],0,3);
									$num2 = substr($rs_text['p_number'],3,3);
									$num3 = substr($rs_text['p_number'],6,4);
									echo $num1."-".$num2."-".$num3;
								?>
							</strong>
						</td>
						<td align="left" style="padding:5px;">
							<p>จำนวนเงินที่ชำระ : <?=$rs_text['mp_price']?></p>
							<p>วันที่ชำระ : <?=$rs_text['mp_date']?></p>
							<p>เวลาที่ชำระ : <?=$rs_text['mp_time']?></p>
						</td>
						<td align="left" style="padding:5px;">
							<p>อีเมล์ : <?=$rs_text['mp_email']?></p>
							<p>ชื่อลูกค้า : <?=$rs_text['mp_name']?></p>
							<p>ที่อยู่ : <?=$rs_text['mp_address']?></p>
							<p>เบอร์โทรศัพท์ : <?=$rs_text['mp_tel']?></p>
							<p>รูปแบบการจัดส่ง : <?=$rs_text['mp_send']?></p>
							<p>รายละเอียด : <?=$rs_text['mp_detail']?></p>
						</td>
						
						
						<td align="center" width="10%">
						<a href="?del=true&mp_id=<?=$rs_text["mp_id"];?>" onClick="return Conf(<?=$rs_text["mp_id"];?>)">
						<img src="images/_delete_data.png" width="16" height="16" border="0">
						</a>
						</td>
					</tr>
			<?
				}
			?>
			
			<tr>
				<td colspan="5">&nbsp;				</td>
			</tr>
  			</form>
		  </table>
		  
		  <br/>
		  <div align="left">
			จำนวนบทความ <?= $Num_Rows;?> บทความ :
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