<?
	ob_start();
	session_start();
	require("connect/connect.php");
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
		
			<div id="content" style="color:#993300;">
				<font color="#993300"><strong>ค้นหาเบอร์</strong></font><hr/>
				<table>
					<tr>
						<td width="100%">
							<form method="post" action="" name="search" >
								<p>
									<i><font size="-1">คำแนะนำการค้นหา : ใส่หมายเลขตามหลักที่ท่านต้องการ</font></i><br/>
									08,09-
									<input type="text" name="p_3" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_4" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_5" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_6" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_7" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_8" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_9" style="width:40px;" maxlength="1"> -
									<input type="text" name="p_10" style="width:40px;" maxlength="1">
								</p>
								
								
								
								<p>
									<i><font size="-1" color="#993300">คำแนะนำการค้นหา : ใส่หมายเลขที่ท่านต้องการให้อยู่ภายในเบอร์</font></i><br/>
									เบอร์ภายในหมายเลข : <input type="text" name="part_number" size="10" maxlength="10">
								</p>
								
								<p>
									ทุกเครือข่าย : 
										<select name="p_network">
											<option value="">ไม่ระบุเครือข่าย</option>
											<option value="DTAC">DTAC</option>
											<option value="AIS">AIS</option>
											<option value="TRUE">TRUE</option>
											<option value="HUTCH">HUTCH</option>
											<option value="CATCDMA">CATCDMA</option>
											<option value="IMOBILE">IMOBILE</option>
										</select> |
									ราคา :
										<select name="p_price">
											<option value="">ไม่ระบุราคา</option>
											<option value="1000"> ไม่เกิน 1,000 บาท</option>
											<option value="2000"> ไม่เกิน 2,000 บาท</option>
											<option value="3000"> ไม่เกิน 3,000 บาท</option>
											<option value="4000"> ไม่เกิน 4,000 บาท</option>
											<option value="5000"> ไม่เกิน 5,000 บาท</option>
											<option value="6000"> ไม่เกิน 6,000 บาท</option>
											<option value="7000"> ไม่เกิน 7,000 บาท</option>
											<option value="8000"> ไม่เกิน 8,000 บาท</option>
											<option value="9000"> ไม่เกิน 9,000 บาท</option>
											<option value="10000"> ไม่เกิน 10,000 บาท</option>
											<option value="15000"> ไม่เกิน 15,000 บาท</option>
											<option value="20000"> ไม่เกิน 20,000 บาท</option>
										</select>
								</p> 
						  	
								<p>
									<input type="hidden" name="search" value="true">
									<input type="submit" name="Submit" value="ค้นหา" />
								</p>
							</form>
						</td>
					</tr>
				</table>
				<br/>
				<?
					if($_POST['search']=="true"){
				?>
				<!------------------------------------------------------------------------------------------------------------------------------ -->
				<strong>ผลการค้นหา</strong>
				<hr/>
				<table width="100%" border="0" cellpadding="5" cellspacing="1" >

			
			
			
			<?php
				//--------------------------------------------------------------------------------------------------
				// check null
				
				if($_POST["p_3"]==""){
					$con3 = "1=1";
				} else {
					$con3 = "p_3  = '".$_POST["p_3"]."' ";
				}
				
				if($_POST["p_4"]==""){
					$con4 = "1=1";
				} else {
					$con4 = "p_4  = '".$_POST["p_4"]."' ";
				}
				
				if($_POST["p_5"]==""){
					$con5 = "1=1";
				} else {
					$con5 = "p_5  = '".$_POST["p_5"]."' ";
				}
				
				if($_POST["p_6"]==""){
					$con6 = "1=1";
				} else {
					$con6 = "p_6  = '".$_POST["p_6"]."' ";
				}
				
				if($_POST["p_7"]==""){
					$con7 = "1=1";
				} else {
					$con7 = "p_7  = '".$_POST["p_7"]."' ";
				}
				
				if($_POST["p_8"]==""){
					$con8 = "1=1";
				} else {
					$con8 = "p_8  = '".$_POST["p_8"]."' ";
				}
				
				if($_POST["p_9"]==""){
					$con9 = "1=1";
				} else {
					$con9 = "p_9  = '".$_POST["p_9"]."' ";
				}
				
				if($_POST["p_10"]==""){
					$con10 = "1=1";
				} else {
					$con10 = "p_10 = '".$_POST["p_10"]."' ";
				}
				
				//check network
				if($_POST["p_network"]==""){
					$p_network = "1=1";
				} else {
					$p_network = "p_network  = '".$_POST["p_network"]."' ";
				}
				
				//check price
				if($_POST["p_price"]==""){
					$p_price = "1=1";
				} else {
					$p_price = "p_price  <= '".$_POST["p_price"]."' ";
				}
				
				//check part number
				if($_POST["part_number"]==""){
					$part_number = "1=1";
				} else {
					$part_number = "p_number2 LIKE '%".$_POST["part_number"]."%'";
				}
				
					
				//--------------------------------------------------------------------------------------------------
				include 'connect/connect.php';
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				$telway = " SELECT * 
	           				FROM  product
	           				WHERE  $con3 AND
								   $con4 AND
								   $con5 AND
								   $con6 AND
								   $con7 AND 
								   $con8 AND  
								   $con9 AND  
								   $con10 AND
								   $p_network AND
								   $p_price AND
								   $part_number AND p_show = 'yes' AND p_check= 'yes'";
								  
				$objQuery = mysqli_query($conn, $telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysqli_num_rows($objQuery);
		
				$Per_Page = 1000;   // Per Page

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
					$_GET['type_stack'] = "ASC"; 
				}
			
				if($_GET['stack']=="")
				{ 
					$_GET['stack'] = "product.p_number"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysqli_query($conn,$telway);
			?>
			
			<tr align="center">
				
				
				<!--<td width="15%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product_category.cat_id&type_stack=ASC"><font color="#000033">หมวดหมู่</font></a>
					<? }else { ?>
   						<a href="?stack=product_category.cat_id&type_stack=DESC"><font color="#000033">หมวดหมู่</font></a>
					<? } ?>
				</td> -->
				<td width="30%" background="images/menu.png">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_number&type_stack=ASC"><font color="#000033">หมายเลข</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_number&type_stack=DESC"><font color="#000033">หมายเลข</font></a>
					<? } ?>
				</td>
				<td background="images/menu.png">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_network&type_stack=ASC"><font color="#000033">เครือข่าย</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_network&type_stack=DESC"><font color="#000033">เครือข่าย</font></a>
					<? } ?>
				</td>
				<td background="images/menu.png">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_gender&type_stack=ASC"><font color="#000033">เพศ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_gender&type_stack=DESC"><font color="#000033">เพศ</font></a>
					<? } ?>
				</td>
				<td background="images/menu.png">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_price&type_stack=ASC"><font color="#000033">ราคา</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_price&type_stack=DESC"><font color="#000033">ราคา</font></a>
					<? } ?>
				</td>
				<td background="images/menu.png">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_status&type_stack=ASC"><font color="#000033">สถานะการจอง</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_status&type_stack=DESC"><font color="#000033">สถานะการจอง</font></a>
					<? } ?>
				</td>
				
				<!--<td background="images/menu.png">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_date&type_stack=ASC"><font color="#000033">วันหมดอายุ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_date&type_stack=DESC"><font color="#000033">วันหมดอายุ</font></a>
					<? } ?>
				</td> -->
				
			</tr>
			
			<?
				while($rs_p = mysql_fetch_array($objQuery))
				{
				
			?>
			
			
				<tr bgcolor="" align="center" style="color:#993300">
			
						
						<!--<td><?=$rs_p['cat_title']?></td> -->
						<td>
							<div class="linkbox4">
							<a href="result_number.php?p_id=<?=$rs_p['p_id']?>">
							<font size="+2">
							<?	
								echo substr($rs_p['p_number'],0,2);
								echo "-";
								echo substr($rs_p['p_number'],2,8);
							?>
							</font>
							</a>
							</div>
						</td>
						<td><?=$rs_p['p_network']?></td>
						<td><?=$rs_p['p_gender']?></td>
						<td><?=number_format($rs_p['p_price'])?></td>
						<td>
							
							<?
								
								if($rs_p['p_sale']=="yes"){
									echo "<font color=green>ขายแล้ว</font>";
								} else if($rs_p['p_status'] == "no"){
							?>
								<div class="linkbox3">
								<a href="reserve.php?p_id=<?=$rs_p['p_id']?>" title="คลิกที่นี่ เพื่อเพิ่มชื่อผู้จอง">
									คลิกที่นี่ เพื่อจองเบอร์
								</a>
								</div>
							<?
								} else if($rs_p['p_status'] == "yes"){
							?>
								
									<font color="#00CC33">มีผู้จองแล้ว</font>
									-
									<?
										$tel_who = "select * from number_owner where p_id = '".$rs_p['p_id']."'";
										$get_who = mysql_query($tel_who);
										while($rs_who = mysql_fetch_array($get_who))
										{
											$owner_name    = $rs_who['owner_name'];
										}
										echo $owner_name;
									?>
								
							<?
								}
							?>
						</td>
						<!--<td>
							<?
								$day   = substr($rs_p['p_date'],8,2);
								$month = substr($rs_p['p_date'],5,2);
								$year  = substr($rs_p['p_date'],0,4);
								
								echo $day."-".$month."-".$year;
							?>
						</td> -->
						
			  </tr>
			<?
				$i++;
				}
			?>
			
			
			
			
  			
		  </table>
		  
		  
		  <hr>
		  
		
		  
<div align="left" class="linkbox3">
จำนวนเบอร์โทรศัพท์ <?= $Num_Rows;?> รายการ :
<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&stack=".$_GET['stack']."&type_stack=".$_GET['type_stack']."'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&stack=".$_GET['stack']."&type_stack=".$_GET['type_stack']."'>$i</a> ]";
	}
	else
	{
		echo "<font size=4 color=green><b> $i </b></font>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&stack=".$_GET['stack']."&type_stack=".$_GET['type_stack']."'>Next>></a> ";
}
?>
</div>
<?
	}
?>
<!------------------------------------------------------------------------------------------------------------------------------ -->
			</div>
			
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
		<!------------------------------------------------------------------------------------------------------------ -->
		<!--start :: div_foot -->
			<? include "include/div_foot.php"?>
		<!--end :: div_foot -->
		<!------------------------------------------------------------------------------------------------------------ -->
	</div>
<!--end__ :: sector3 -->
<!--=================================================================================================================================== -->

</body>
</html>