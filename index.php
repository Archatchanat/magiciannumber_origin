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
		
			<!--iframe -->
			<div id="slide">
				<iframe name="iSlide" 
					src="slide_index_main/index.php" 
					width="690px" height="323px" 
					frameborder="0" marginheight="0" scrolling="no" marginwidth="0">
				</iframe>
			</div>
			<!--iframe -->
			
			<!--cloth 1 -->
			<div class="cloth">
			
				<div class="title">
					<strong>&nbsp;&nbsp;&nbsp;เรื่องเด่น...</strong>
				</div>
			
				<div class="big_box">
					<?
						$tel_p = "select * from   text1 where  1=1 order by text_id DESC limit 0,6";
						$get_p = mysql_query($tel_p);
					
						while($rs_p = mysql_fetch_array($get_p )){
					?>
						<div class="box">
						
							<div class="image_box">
								<a href="text_detail1.php?text_id=<?=$rs_p['text_id']?>">
									<?
										if($rs_p['new_pic']!=""){
									?>
										<img src="pic_text/<?=$rs_p['real_pic']?>" border="0" width="85" height="85"/>
									<?
										} else {
									?>
										<img src="images/nopic.jpg" width="85" height="85"/>
									<?
										}
									?>										
								</a>	
							</div>
						
							<div class="text_box">
								<div class="text_box_title">
									<div class="linkbox5">
										<a href="text_detail1.php?text_id=<?=$rs_p['text_id']?>" style="font-size:12px">
											<?=$rs_p['text_title']?>
										</a>	
									</div>
								</div>
							
								<div id="text_white">
									<a href="text_detail1.php?text_id=<?=$rs_p['text_id']?>">
									<?
										$filter = strip_tags($rs_p['text_content']);
										$topic=mb_substr($filter,0,250).".....";
 										echo $topic;
									?>
									</a>
								</div>
							</div>
						
						<div style="clear:both;"></div>
						
					</div>
					
					<?
						}
					?>
			
				<div style="clear:both;"></div>
			</div>
			
				<div class="more">
					<div class="linkbox2">
						&nbsp;&nbsp;&nbsp;<strong><a href="text_list1.php">เรื่องเด่น อ่านกระทู้อื่นๆ...</a></strong>
					</div>
				</div>
				
				<div style="clear:both;"></div>
			</div>
			<!--cloth 1 -->
			
			<!--cloth 4 -->
			<div class="cloth">
			
				<div class="title">
					<strong>&nbsp;&nbsp;&nbsp;สาธารณประโยชน์...</strong>
				</div>
			
				<div class="big_box">
					<?
						$tel_p = "select * from   text4 where  1=1 order by text_id DESC limit 0,6";
						$get_p = mysql_query($tel_p);
					
						while($rs_p = mysql_fetch_array($get_p )){
					?>
						<div class="box">
						
							<div class="image_box">
								<a href="text_detail4.php?text_id=<?=$rs_p['text_id']?>">
									<?
										if($rs_p['new_pic']!=""){
									?>
										<img src="pic_text4/<?=$rs_p['real_pic']?>" border="0" width="85" height="85"/>
									<?
										} else {
									?>
										<img src="images/nopic.jpg" width="85" height="85"/>
									<?
										}
									?>												
								</a>	
							</div>
						
							<div class="text_box">
								<div class="text_box_title">
									<div class="linkbox5">
										<a href="text_detail4.php?text_id=<?=$rs_p['text_id']?>" style="font-size:12px">
											<?=$rs_p['text_title']?>
										</a>	
									</div>
								</div>
							
								<div id="text_white">
									<a href="text_detail4.php?text_id=<?=$rs_p['text_id']?>">
									<?
										$filter = strip_tags($rs_p['text_content']);
										$topic=mb_substr($filter,0,250).".....";
 										echo $topic;
									?>
									</a>
								</div>
							</div>
						
						<div style="clear:both;"></div>
						
					</div>
					
					<?
						}
					?>
			
				<div style="clear:both;"></div>
			</div>
				
				<div class="more">
					<div class="linkbox2">
						&nbsp;&nbsp;&nbsp;<strong><a href="text_list4.php">สาธารณประโยชน์ อ่านกระทู้อื่นๆ...</a></strong>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<!--cloth 4 -->
			
			<!--cloth 3 -->
			<div class="cloth">
			
				<div class="title">
					<strong>&nbsp;&nbsp;&nbsp;เรื่องทั่วไป...</strong>
				</div>
			
				<div class="big_box">
					<?
						$tel_p = "select * from text3 where  1=1 order by text_id DESC limit 0,6";
						$get_p = mysql_query($tel_p);
					
						while($rs_p = mysql_fetch_array($get_p )){
					?>
						<div class="box">
						
							<div class="image_box">
								
								
								<a href="text_detail3.php?text_id=<?=$rs_p['text_id']?>">
									<?
										if($rs_p['new_pic']!=""){
									?>
										<img src="pic_text3/<?=$rs_p['real_pic']?>" border="0" width="85" height="85"/>
									<?
										} else {
									?>
										<img src="images/nopic.jpg" width="85" height="85"/>
									<?
										}
									?>												
								</a>		
							</div>
						
							<div class="text_box">
								<div class="text_box_title">
									<div class="linkbox5">
										<a href="text_detail3.php?text_id=<?=$rs_p['text_id']?>" style="font-size:12px">
											<?=$rs_p['text_title']?>
										</a>	
									</div>
								</div>
							
								<div id="text_white">
									<a href="text_detail3.php?text_id=<?=$rs_p['text_id']?>">
									<?
										$filter = strip_tags($rs_p['text_content']);
										$topic=mb_substr($filter,0,250).".....";
 										echo $topic;
									?>
									</a>
								</div>
							</div>
						
						<div style="clear:both;"></div>
						
					</div>
					
					<?
						}
					?>
			
				<div style="clear:both;"></div>
			</div>
				
				<div class="more">
					<div class="linkbox2">
						&nbsp;&nbsp;&nbsp;<strong><a href="text_list3.php">เรื่องทั่วไป อ่านกระทู้อื่นๆ...</a></strong>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<!--cloth 3 -->
			
			<!--================================================================================================ -->
			<div id="contain" style="margin-top:20px;">
			<table width="696" border="0" cellspacing="0" cellpadding="0">
			<tr>
    			<td bgcolor="#cc9900">&nbsp;</td>
    			<td bgcolor="#cc9900"><div id="text_white2"><strong>ข้อควรรู้เกี่ยวกับเบอร์โทร ??</strong></div></td>
    		</tr>
			<tr/>
				<td colspan="2">&nbsp;</td>
			</tr>
  			<tr>
    			<td width="17">&nbsp;</td>
    			<td width="471">
					<div id="text_white2">
						<?
							$tel_text2 = "select * 
				           				from   text2
						   				where  1=1 order by text_id DESC limit 0,10";
							$get_text2 = mysql_query($tel_text2);
							while($rs_text2 = mysql_fetch_array($get_text2))
							{
						?>
							<a href="text_detail2.php?text_id=<?=$rs_text2['text_id']?>">- <?=$rs_text2['text_title']?></a><br/>
						<?
							}
						?>
					</div>
				</td>
  			</tr>
  			<tr>
    			<td>&nbsp;</td>
    			<td>
					<div class="linkbox2">
						<strong><a href="text_list2.php">อ่านกระทู้อื่นๆ...</a></strong>
					</div>
				</td>
  			</tr>
			<tr/>
				<td colspan="2">&nbsp;</td>
			</tr>
  			<tr>
    			<td bgcolor="#cc9900">&nbsp;</td>
    			<td bgcolor="#cc9900"><div id="text_white2"><strong>กระดานสนทนา...</strong></div></td>
  			</tr>
  			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
  			<tr>
    			<td>&nbsp;</td>
    			<td>
		<div id="text_white2">
			<?
				$tel_web = "select * 
				           from   webboard
						   where  1=1 order by webboard_id DESC limit 0,10";
				$get_web  = mysql_query($tel_web);
				while($rs_web = mysql_fetch_array($get_web))
				{
			?>
				<a href="webboard_detail.php?webboard_id=<?=$rs_web['webboard_id']?>">
					- <?=$rs_web['webboard_title']?>
				</a><br/>
			<?
				}
			?>
		</div>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<div class="linkbox2">
			<strong><a href="webboard.php">อ่านกระทู้อื่นๆ...</a></strong>
		</div>
	</td>
  </tr>
  <tr/>
		<td colspan="2">&nbsp;</td>
	</tr>
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