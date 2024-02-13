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
		
			<div id="content" style="color:#000066;">
			<font color="#993300"><strong>เบอร์โทรศัพท์ดี</strong></font><hr/>
			
			<!------------------------------------------------------------------------------------------------------------ -->
			 <table width="100%" border="0" cellpadding="5" cellspacing="1" >

			
			
			
			<?
				$telway ="select  product.* , product_category.*
				           from   product   , product_category 
						   where  product.cat_id = product_category.cat_id and
						   		  product.p_show = 'yes' and 
								  product.p_check = 'yes'
								  ";
								  
				$objQuery = mysql_query($telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysql_num_rows($objQuery);
		
				$Per_Page = 2000;   // Per Page

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
				$objQuery  = mysql_query($telway);
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
			<!------------------------------------------------------------------------------------------------------------ -->
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