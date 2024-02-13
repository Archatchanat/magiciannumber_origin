<?
	ob_start();
	session_start();
	require("connect/connect.php");
?>


<?
	$tel_text = "select * 
				 from   text4
				 where  text_id = '".$_GET['text_id']."'";
							 
	$get_text = mysql_query($tel_text);
				
	while($rs_text = mysql_fetch_array($get_text))
	{
		$text_id      = $rs_text['text_id'];
		$text_title   = $rs_text['text_title'];
		$text_content = $rs_text['text_content'];
		$text_post    = $rs_text['text_post'];
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
		<!------------------------------------------------------------------------------------------------------------ --></head>
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
		
			<div id="content" style="color:#993300" class="linkbox8">
				<font color="#993300">
					<strong>สาธารณประโยชน์</strong> <br/><br/>
					<font color="#FF9933"><strong>เรื่อง :: </strong><?=$text_title?></font>
				</font>
				<hr/>
				
					<?=$text_content?>
			</div>
			
			<div id="thumb">
			
			<font color="#FFFFFF"><b>สาธารณประโยชน์</b></font>
			<hr/>
<table width="696" border="0" cellspacing="0" cellpadding="0">

	<!--================================================================================================ -->
  	
	
  	<tr>
    	
    	<td width="471">
			<div id="text_white2">
				
				
				<?
					$tel_text2 = "select * 
				           		from   text4
						   		where  1=1 order by text_id DESC";
					$get_text2 = mysql_query($tel_text2);
					while($rs_text2 = mysql_fetch_array($get_text2))
					{
				?>
						<a href="text_detail4.php?text_id=<?=$rs_text2['text_id']?>">
							- <?=$rs_text2['text_title']?>
						</a><br/>
				<?
					}
				?>
			</div>
		</td>
  	</tr>
  	<!--<tr>
  
    	<td>
			<div class="linkbox2">
				<strong><a href="text_list2.php">อ่านกระทู้อื่นๆ...</a></strong>
			</div>
		</td>
  	</tr> -->
  </table>
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