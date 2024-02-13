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