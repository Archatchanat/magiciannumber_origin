<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_GET["action"]=="insert")
	{
		$p_date    = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
		$p_number2 = substr($_POST['p_number'],2,8);
		
		$p_1  = substr($_POST['p_number'],0,1);
		$p_2  = substr($_POST['p_number'],1,1);
		$p_3  = substr($_POST['p_number'],2,1);
		$p_4  = substr($_POST['p_number'],3,1);
		$p_5  = substr($_POST['p_number'],4,1);
		$p_6  = substr($_POST['p_number'],5,1);
		$p_7  = substr($_POST['p_number'],6,1);
		$p_8  = substr($_POST['p_number'],7,1);
		$p_9  = substr($_POST['p_number'],8,1);
		$p_10 = substr($_POST['p_number'],9,1);
		
		
		
		
		$status    = "no";
		
		$tellway  = "INSERT INTO product VALUES(";
		$tellway .= "0
					,'$_POST[rank_id]'
					,'$_POST[cat_id]'
					,'$_POST[p_number]'
					,'$p_number2'
					,'$p_1'
					,'$p_2'
					,'$p_3'
					,'$p_4'
					,'$p_5'
					,'$p_6'
					,'$p_7'
					,'$p_8'
					,'$p_9'
					,'$p_10'
					,'$_POST[p_network]'
					,'$_POST[p_gender]'
					,'$_POST[p_price]'
					,'$p_date'
					,'$_POST[p_detail]'
					,'$status'
					,'$_POST[p_show]'
					,'$_POST[p_good]'
					,'$_POST[p_bad]'
					,'$_POST[p_point_status]'
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		 
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='product_list.php';";
		echo "</script>";
    }
?>

<?
	if($_GET["action"]=="save")
	{
		$p_date = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
		$p_number2 = substr($_POST['p_number'],2,8);
		
		$p_1  = substr($_POST['p_number'],0,1);
		$p_2  = substr($_POST['p_number'],1,1);
		$p_3  = substr($_POST['p_number'],2,1);
		$p_4  = substr($_POST['p_number'],3,1);
		$p_5  = substr($_POST['p_number'],4,1);
		$p_6  = substr($_POST['p_number'],5,1);
		$p_7  = substr($_POST['p_number'],6,1);
		$p_8  = substr($_POST['p_number'],7,1);
		$p_9  = substr($_POST['p_number'],8,1);
		$p_10 = substr($_POST['p_number'],9,1);
		
		
		$sql_up = "update product set 
					 cat_id         = '$_POST[cat_id]'
					,rank_id        = '$_POST[rank_id]'
					,p_number       = '$_POST[p_number]'
					,p_number2      = '$p_number2'
					,p_1            = '$p_1'
					,p_2            = '$p_2'
					,p_3            = '$p_3'
					,p_4            = '$p_4'
					,p_5            = '$p_5'
					,p_6            = '$p_6'
					,p_7            = '$p_7'
					,p_8            = '$p_8'
					,p_9            = '$p_9'
					,p_10           = '$p_10'
					,p_network      = '$_POST[p_network]'
					,p_gender       = '$_POST[p_gender]'
					,p_price        = '$_POST[p_price]'
					,p_date         = '$p_date'
					,p_detail       = '$_POST[p_detail]'
					,p_show         = '$_POST[p_show]'
					,p_good         = '$_POST[p_good]'
					,p_bad          = '$_POST[p_bad]'
					,p_point_status = '$_POST[p_point_status]'
					where  p_id ='".$_POST['p_id']."'";
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "</script>";
		
		echo "<script>history.back()</script>";		
    }
	
	if($_GET["del"]=="true")
	{
		//--------------------------------------------------------------
		$sql      = "select * from number_owner where p_id = '".$_GET['p_id']."'";
		$dbquery  = mysql_query($sql);
		$check    = mysql_num_rows($dbquery);
		
		if($check > 0){
			echo "<script language=\"JavaScript\">";
			echo "alert('Can not delete this number please check again');";
			echo "window.location='product_list.php';";
			echo "</script>";
			exit();
		}
		
		//--------------------------------------------------------------
		$sql_del= "delete from product where p_id='".$_GET["p_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "</script>";
		
		echo "<script>history.back()</script>";
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
		alert("โปรดเลือกหมวดหมู่");
		form1.cat_id.focus();
		return false
	}
	
	if(form1.p_number.value == "") {
		alert("โปรดระบุหมายเลขโทรศัพท์");
		form1.p_number.focus();
		return false
	}
	
	if(form1.p_price.value == "") {
		alert("โปรดระบุราคา");
		form1.p_price.focus();
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
			
			<!--############################################################################################################# -->
			<?
				if($_GET['add']=="true"){
			?>
				<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			 <form name="form1" method="post" action="?action=insert" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr>
				<td align="right" colspan="8">&nbsp;<img src="images/plus_16.png"><a href="product_list.php">รายการเบอร์โทรศัพท์</a></td>
			</tr>
			<tr> 
				<td colspan="3" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+0">&nbsp;เพิ่มเบอร์โทรศัพท์</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="19%" align="right"><!--ลำดับการจัดเรียง : --></td>
				<td width="33%" align="left">
					<!--<input name="rank_id" type="text" value="<?=$rank_id?>" size="3">			 -->	
				</td>
				<td width="48%" rowspan="19" valign="top">
					<!--------------------------------------------------------------------------------------------------------- -->
					<u><font color="#006600">กำหนดคะแนนเอง</font></u>
					<table width="100%">
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td width="25%" align="right">คะแนนความดี ::</td>
							<td width="75%"><input name="p_good" type="text"  size="10" maxlength="10"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td align="right">คะแนนความร้าย ::</td>
							<td><input name="p_bad" type="text"  size="10" maxlength="10"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td align="right">สถานะ ::</td>
							<td>
								<input type="radio" name="p_point_status" value="yes" > Yes
								<input type="radio" name="p_point_status" value="no" checked="checked" >No
							</td>
						</tr>	
					</table>
					<!--------------------------------------------------------------------------------------------------------- -->			
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="19%" align="right">หมวดหมู่ :</td>
				<td width="33%" align="left">
					<select name="cat_id" onChange="MM_jumpMenu('parent',this,0)">
					  	<? if($_GET['cats_id']==""){?>
                 			<!--<option value="">โปรดเลือกหมวดหมู่</option>-->					 	
						<? } else {
								$tel_cats = "select * from product_category where cat_id = '".$_GET['cats_id']."'";
								$get_cats = mysql_query($tel_cats);
								while($rs_cats=mysql_fetch_array($get_cats))
								{
						?>
									<option value="<?=$rs_cats['cat_id']?>"><?=$rs_cats['cat_title']?></option>
						<? 
								} 
							}
						?>
					  
					  	<?
							$tel_cat = "select * from product_category ORDER BY cat_id";
							$get_cat = mysql_query($tel_cat);
							while($rs_cat=mysql_fetch_array($get_cat))
							{
						?>
					  			<option value="<?=$rs_cat['cat_id']?>&add=true"><?=$rs_cat['cat_title']?></option>
					 	<?
							}
						?>
                    </select>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">หมายเลขเบอร์โทรศัพท์ :</td>
				<td><input name="p_number" type="text"  size="20" maxlength="10"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="19%" align="right">เครือข่าย :</td>
				<td width="33%" align="left">
					
					
						<input type="radio" name="p_network" value="DTAC" checked="checked">DTAC
						<input type="radio" name="p_network" value="AIS">AIS
						<input type="radio" name="p_network" value="TRUE">TRUE
				</td>
			</tr>
			
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="19%" align="right">เพศผู้ใช้ :</td>
				<td width="33%" align="left">
					
					
					<input type="radio" name="p_gender" value="ทั่วไป" checked="checked">ทั่วไป
					<input type="radio" name="p_gender" value="ชาย">ชาย
					<input type="radio" name="p_gender" value="หญิง">หญิง
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">ราคา :</td>
				<td><input name="p_price" type="text"  size="10" maxlength="10"></td>
			</tr>
			
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
									<td align="right">วันหมดอายุ :</td>
									<td align="left">
									<select name="day">
                            		<?
                                		for($i=1; $i<=31; $i++){
                                    	if($i<10){
                                        	if($i==date(d))
                                            	echo"<option value=\"0$i\" selected=\"selected\">0$i</option>";
                                        	else
                                            	echo"<option value=\"0$i\">0$i</option>";
                                    	}
                                    	else{
                                        	if($i==date(d))
                                            	echo"<option value=\"$i\" selected=\"selected\">$i</option>";
                                        	else
                                            	echo"<option value=\"$i\">$i</option>";	
                                    		}
                                		}
                            		?>
                        			</select> /
									  	
									<select name="month">
                            			<option value="01" <? if(date(m)=='01') echo "selected=\"selected\"";?>>01</option>
                            			<option value="02" <? if(date(m)=='02') echo "selected=\"selected\"";?>>02</option>
                            			<option value="03" <? if(date(m)=='03') echo "selected=\"selected\"";?>>03</option>
                            			<option value="04" <? if(date(m)=='04') echo "selected=\"selected\"";?>>04</option>
                            			<option value="05" <? if(date(m)=='05') echo "selected=\"selected\"";?>>05</option>
                            			<option value="06" <? if(date(m)=='06') echo "selected=\"selected\"";?>>06</option>
                            			<option value="07" <? if(date(m)=='07') echo "selected=\"selected\"";?>>07</option>
                            			<option value="08" <? if(date(m)=='08') echo "selected=\"selected\"";?>>08</option>
                            			<option value="09" <? if(date(m)=='09') echo "selected=\"selected\"";?>>09</option>
                            			<option value="10" <? if(date(m)=='10') echo "selected=\"selected\"";?>>10</option>
                            			<option value="11" <? if(date(m)=='11') echo "selected=\"selected\"";?>>11</option>
                            			<option value="12" <? if(date(m)=='12') echo "selected=\"selected\"";?>>12</option>
                        			</select> /
									  	
									<select name="year">
                            		<?
                                		for($i=2554; $i<2563; $i++){
                                    	if($i==(date(Y))+543)
                                        	echo "<option value=\"$i\" selected=\"selected\">$i</option>";
                                    	else
                                        	echo "<option value=\"$i\">$i</option>";
                                		}	
                            		?>
                        			</select>	
									</td>
			   </tr>
			
			<!--<tr>
				<td colspan="2">&nbsp;</td>
			</tr> -->
			
			<!--<tr>
				<td align="right">รายละเอียด :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('p_detail');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '300' ;
						$oFCKeditor->Height = '200' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr> -->
			
	
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="19%" align="right">แสดง :</td>
				<td width="33%" align="left">
					<input type="radio" name="p_show" value="yes" checked="checked">แสดง
					<input type="radio" name="p_show" value="no">ไม่แสดง
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
				<td colspan="2">
					<input type="submit" name="Submit" value="เพิ่มข้อมูล" style="width:120px; font-size:20px; height:45px;" >
					<input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px; font-size:20px; height:45px;" >				</td>
			</tr>
			
			
			
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="3"><hr/></td>
			</tr>
  			</form>
		  </table>
			<?
				}
			?>
			<!--############################################################################################################# -->
			
			<!--############################################################################################################# -->
            <?
				if($_GET['fix']=="true"){
								 
				$tel_p = "select product_category.* , product.*
						  from   product_category   , product
						  where  product_category.cat_id    = product.cat_id and
						  
								 product.p_id               = '".$_GET['p_id']."'";
								 
				$get_p = mysql_query($tel_p);
				
				while($rs_p = mysql_fetch_array($get_p))
				{
					$p_id	   = $rs_p['p_id'];
					$rank_id   = $rs_p['rank_id'];
					$p_number  = $rs_p['p_number'];
					$p_network = $rs_p['p_network'];
					$p_gender  = $rs_p['p_gender'];
					$p_price   = $rs_p['p_price'];
					$p_detail  = $rs_p['p_detail'];
					$p_show    = $rs_p['p_show'];
					
					$p_good         = $rs_p['p_good'];
					$p_bad          = $rs_p['p_bad'];
					$p_point_status = $rs_p['p_point_status'];
					
					
					$day   = substr($rs_p['p_date'],8,2);
					$month = substr($rs_p['p_date'],5,2);
					$year  = substr($rs_p['p_date'],0,4);
					
					$cat_id    = $rs_p['cat_id'];
					$cat_title = $rs_p['cat_title'];
				}
			?>
				<!------------------------------------------------------------------------------------------------------- -->
				
				
				<table width="90%" border="0" cellpadding="20" cellspacing="1" bgcolor="#FFFFFF">
  			 	<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()">
				<tr>
					<td align="right" colspan="8">&nbsp;<img src="images/plus_16.png"><a href="product_list.php">รายการเบอร์โทรศัพท์</a></td>
				</tr>
				<tr> 
					<td colspan="3" bgcolor="#999999"align="left">
						<font color="#FFFFFF" size="+0">&nbsp;แก้ไข ข้อมูลเบอร์โทรศัพท์ ลำดับ :: <? echo "<font color=red>[ ".$_GET['rank']." ]</font>"?></font>
						<!--<p>$cat_id = <?=$cat_id?> $cat_title = <?=$cat_title?></p>
						<p>$sub_id = <?=$sub_id?> $sub_title = <?=$sub_title?></p> -->					</td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
				
				<tr>
					<td width="19%" align="right"><!--ลำดับการจัดเรียง : --></td>
				  	<td width="33%" align="left"><!--<input name="rank_id" type="text" value="<?=$rank_id?>" size="3"> --></td>
					<td width="48%" rowspan="19" valign="top">
						<!--------------------------------------------------------------------------------------------------------- -->
					<u><font color="#006600">กำหนดคะแนนเอง</font></u>
					<table width="100%">
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td width="25%" align="right">คะแนนความดี ::</td>
							<td width="75%"><input name="p_good" type="text"  size="10" maxlength="10" value="<?=$p_good?>"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td align="right">คะแนนความร้าย ::</td>
							<td><input name="p_bad" type="text"  size="10" maxlength="10" value="<?=$p_bad?>"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td align="right">สถานะ ::</td>
							<td>
								<input type="radio" name="p_point_status" value="yes" <? if($p_point_status=="yes"){?> checked="checked" <? } ?>> Yes
								<input type="radio" name="p_point_status" value="no" <? if($p_point_status=="no"){?> checked="checked" <? } ?>> No
							</td>
						</tr>	
					</table>
					<!--------------------------------------------------------------------------------------------------------- -->						
					</td>
				</tr>
			
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				
				<tr>
					<td width="19%" align="right">หมวดหมู่ :</td>
					<td width="33%" align="left">
					
					
					<select name="cat_id" onChange="MM_jumpMenu('parent',this,0)">
					  	<? if($_GET['cats_id']==""){?>
                     		<option value="<?=$cat_id?>"><?=$cat_title?></option>
					 	<? } else {
							$tel_cats = "select * from product_category where cat_id = '".$_GET['cats_id']."'";
							$get_cats = mysql_query($tel_cats);
							while($rs_cats=mysql_fetch_array($get_cats))
							{
						?>
							<option value="<?=$rs_cats['cat_id']?>"><?=$rs_cats['cat_title']?></option>
						<? } }?>
						
						<? 
								$tel_cat = "select * from product_category ORDER BY cat_id";
								$get_cat = mysql_query($tel_cat);
								while($rs_cat=mysql_fetch_array($get_cat))
							{
						?>
	<option value="<?=$rs_cat['cat_id']?>&fix=true&p_id=<?=$_GET['p_id']?>&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>">
		<?=$rs_cat['cat_title']?>
	</option>
					 	<?
							}
						?>
                  </select>					</td>
				</tr>
				
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
			
				<tr>
					<td align="right">หมายเลขเบอร์โทรศัพท์ :</td>
					<td><input name="p_number" type="text" value="<?=$p_number?>" size="20" maxlength="10"></td>
				</tr>
			
				<!--<tr>
					<td colspan="2">&nbsp;</td>
				</tr> -->
			
				<!--<tr>
					<td align="right">รายละเอียด :</td>
					<td><?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('p_detail');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '300' ;
						$oFCKeditor->Height = '200' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Value = $p_detail ;
						$oFCKeditor->Create(); 
						?>
					</td>
				</tr> -->
				
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
			
				<tr>
				  <td width="19%" align="right">เครือข่าย :</td>
				  <td width="33%" align="left">
				  	<input type="radio" name="p_network" value="DTAC" <? if($p_network=="DTAC"){?> checked="checked" <? } ?>>
				    DTAC
				    <input type="radio" name="p_network" value="AIS" <? if($p_network=="AIS"){?> checked="checked" <? } ?>>
				    AIS
				    <input type="radio" name="p_network" value="TRUE" <? if($p_network=="TRUE"){?> checked="checked" <? } ?>>
			      TRUE </td>
				  </tr>
			
				<tr>
				  <td colspan="2">&nbsp;</td>
				  </tr>
				
				<tr>
				  <td width="19%" align="right">เพศผู้ใช้ :</td>
				  <td width="33%" align="left">
				  	<input type="radio" name="p_gender" value="ทั่วไป" <? if($p_gender=="ทั่วไป"){?> checked="checked" <? } ?>>
				    ทั่วไป
				    <input type="radio" name="p_gender" value="ชาย" <? if($p_gender=="ชาย"){?> checked="checked" <? } ?>>
				    ชาย
				    <input type="radio" name="p_gender" value="หญิง" <? if($p_gender=="หญิง"){?> checked="checked" <? } ?>>
			      หญิง </td>
				  </tr>
				
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				
				<tr>
					<td align="right">ราคา :</td>
					<td><input name="p_price" type="text" value="<?=$p_price?>"></td>
				</tr>
				
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				
				<tr>
									<td align="right">วันหมดอายุ :</td>
									<td align="left">
									
									<select name="day">
                            		<?
                                		for($i=1; $i<=31; $i++){
                                    	if($i<10){
                                        	if($i == $day )
                                            	echo"<option value=\"0$i\" selected=\"selected\">0$i</option>";
                                        	else
                                            	echo"<option value=\"0$i\">0$i</option>";
                                    	}
                                    	else{
                                        	if($i == $day)
                                            	echo"<option value=\"$i\" selected=\"selected\">$i</option>";
                                        	else
                                            	echo"<option value=\"$i\">$i</option>";	
                                    		}
                                		}
                            		?>
                        			</select> /
									  	
									<select name="month">
        								<option <? if($month =='01') echo "selected=\"selected\"";?> value="01">01</option>
            							<option <? if($month =='02') echo "selected=\"selected\"";?> value="02">02</option>
            							<option <? if($month =='03') echo "selected=\"selected\"";?> value="03">03</option>
            							<option <? if($month =='04') echo "selected=\"selected\"";?> value="04">04</option>
            							<option <? if($month =='05') echo "selected=\"selected\"";?> value="05">05</option>
            							<option <? if($month =='06') echo "selected=\"selected\"";?> value="06">06</option>
            							<option <? if($month =='07') echo "selected=\"selected\"";?> value="07">07</option>
            							<option <? if($month =='08') echo "selected=\"selected\"";?> value="08">08</option>
            							<option <? if($month =='09') echo "selected=\"selected\"";?> value="09">09</option>
            							<option <? if($month =='10') echo "selected=\"selected\"";?> value="10">10</option>
            							<option <? if($month =='11') echo "selected=\"selected\"";?> value="11">11</option>
            							<option <? if($month =='12') echo "selected=\"selected\"";?> value="12">12</option>
									</select> /
									
									<select name="year">
                            		<?
                                		for($i=2554; $i<2563; $i++){
                                    	if($i== $year)
                                        	echo "<option value=\"$i\" selected=\"selected\">$i</option>";
                                    	else
                                        	echo "<option value=\"$i\">$i</option>";
                                		}	
                            		?>
                        			</select>									</td>
								</tr>
			
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				
				<tr>
					<td width="19%" align="right">แสดง :</td>
					<td width="33%" align="left">
						<input type="radio" name="p_show" value="yes" <? if($p_show=="yes"){?> checked="checked" <? } ?>>แสดง
						<input type="radio" name="p_show" value="no" <? if($p_show=="no"){?> checked="checked" <? } ?>>ไม่แสดง
				  </td>
				</tr>
				
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				 
				<tr>
					<td></td>
				  	<td>
						<input type="hidden" name="p_id"    value="<?=$p_id?>">
						
						
						<input type="submit" name="Submit" value="บันทึกข้อมูล" style="width:120px; font-size:20px; height:45px;" >
		&nbsp;&nbsp;<a href="product_list.php?stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>&Page=<?=$_GET['Page']?>">[ ย้อนกลับ ]</a>					</td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
			
				<tr>
					<td colspan="3">&nbsp;</td>
				</tr>
			
				<tr>
					<td colspan="3"><hr/></td>
				</tr>
  				</form>
		  		</table>
				<!------------------------------------------------------------------------------------------------------- -->
            <?
		  		}
		  	?>
           <!--############################################################################################################# -->
           
		  
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  <form action="?action=update&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>&Page=<?=$_GET['Page']?>" method="post">
		  <table width="90%" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF">

			<tr>
				<td align="right" colspan="12">&nbsp;<img src="images/plus_16.png"><a href="product_list.php?add=true">เพิ่มเบอร์โทรศัพท์</a></td>
			</tr>
			<tr> 
				<td colspan="12" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการเบอร์โทรศัพท์</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="12">&nbsp;
				
				</td>
			</tr>
			
			<?
				$telway ="select  product.* , product_category.*
				           from   product   , product_category 
						   where  product.cat_id = product_category.cat_id";
								  
				$objQuery = mysql_query($telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysql_num_rows($objQuery);
		
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
				$objQuery  = mysql_query($telway);
			?>
			
			<tr align="center" bgcolor="#CCCCCC">
				<!--<td width="5%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_id&type_stack=ASC"><font color="#000033">ID</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_id&type_stack=DESC"><font color="#000033">ID</font></a>
					<? } ?>
				</td> -->
				<td width="5%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_id&type_stack=ASC"><font color="#000033">ลำดับ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_id&type_stack=DESC"><font color="#000033">ลำดับ</font></a>
					<? } ?>
				</td>
				<td width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product_category.cat_id&type_stack=ASC"><font color="#000033">หมวดหมู่</font></a>
					<? }else { ?>
   						<a href="?stack=product_category.cat_id&type_stack=DESC"><font color="#000033">หมวดหมู่</font></a>
					<? } ?>
				</td>
				<td width="20%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_number&type_stack=ASC"><font color="#000033">หมายเลขเบอร์โทรศัพท์</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_number&type_stack=DESC"><font color="#000033">หมายเลขเบอร์โทรศัพท์</font></a>
					<? } ?>
				</td>
				<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_network&type_stack=ASC"><font color="#000033">เครือข่าย</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_network&type_stack=DESC"><font color="#000033">เครือข่าย</font></a>
					<? } ?>
				</td>
				<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_gender&type_stack=ASC"><font color="#000033">เพศ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_gender&type_stack=DESC"><font color="#000033">เพศ</font></a>
					<? } ?>
				</td>
				<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_price&type_stack=ASC"><font color="#000033">ราคา</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_price&type_stack=DESC"><font color="#000033">ราคา</font></a>
					<? } ?>
				</td>
				<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_date&type_stack=ASC"><font color="#000033">วันหมดอายุ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_date&type_stack=DESC"><font color="#000033">วันหมดอายุ</font></a>
					<? } ?>
				</td>
				<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_status&type_stack=ASC"><font color="#000033">สถานะการจอง</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_status&type_stack=DESC"><font color="#000033">สถานะการจอง</font></a>
					<? } ?>
				</td>
				<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_show&type_stack=ASC"><font color="#000033">แสดง</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_show&type_stack=DESC"><font color="#000033">แสดง</font></a>
					<? } ?>
				</td>
				<!--<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_detail&type_stack=ASC"><font color="#000033">รายละเอียด</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_detail&type_stack=DESC"><font color="#000033">รายละเอียด</font></a>
					<? } ?>
				</td> -->
				
				<td width="12%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_good&type_stack=ASC"><font color="#000033">คะแนน</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_good&type_stack=DESC"><font color="#000033">คะแนน</font></a>
					<? } ?>
				</td>
				
				<td width="5%" align="center">แก้ไข</td>
				<td width="5%" align="center">ลบ</td>
			</tr>
			
			<?
				$rank=1;
				while($rs_p = mysql_fetch_array($objQuery))
				{
				
			?>
			
			<? if($i%2==0){ ?>
				<tr bgcolor="#FFFFCC" align="center" >
			<? } else {?>
				<tr bgcolor="#CCCCFF" align="center" >
			<? } ?>
						<td><?=$rank?></td>
						<!--<td>
 
  <input name="p_id[<?=$i?>]" type="hidden" value="<?=$rs_p['p_id']?>" />
  <input name="rank_id[<?=$i?>]" type="text" style="width:20px;text-align:center" value="<?=$rs_p['rank_id'];?>" maxlength="3" id="txtQua[<?=$i?>]"/>
  
						</td> -->
						<td><?=$rs_p['cat_title']?></td>
						<td>
							<font size="5">
							<?
								$num1 = substr($rs_p['p_number'],0,2);
								$num2 = substr($rs_p['p_number'],2,8);
								
								
								echo $num1."-".$num2;
							?>
							</font>
						</td>
						<td>
							<?
								if($rs_p['p_network']=="DTAC"){ 
							?>
								<font color="#0066FF"><strong>
							<?
								} else if($rs_p['p_network']=="AIS"){ 
							?>
								<font color="#FF33CC"><strong>
							<?
								} else if($rs_p['p_network']=="TRUE"){ 
							?>
								<font color="#FF0000"><strong>
							<?
								}
							?>
							<?=$rs_p['p_network']?>
							</font>
						</td>
						<td><?=$rs_p['p_gender']?></td>
						<td width="5%" style="padding:5px;"><strong><?=number_format($rs_p['p_price']);?></strong></td>
						
						<td>
							<?
								$day   = substr($rs_p['p_date'],8,2);
								$month = substr($rs_p['p_date'],5,2);
								$year  = substr($rs_p['p_date'],0,4);
								
								echo $day."-".$month."-".$year;
							?>
						</td>
						<td>
							
							<?
								if($rs_p['p_status'] == "no"){
							?>
								<a href="product_owner.php?p_id=<?=$rs_p['p_id']?>&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>" title="คลิกที่นี่ เพื่อเพิ่มชื่อผู้จอง">
									<font color="#FF0000">ยังไม่มีผู้จอง</font>
								</a>
							<?
								} else if($rs_p['p_status'] == "yes"){
							?>
								<a href="product_owner.php?p_id=<?=$rs_p['p_id']?>&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>" title="คลิกที่นี่ เพื่อดูชื่อผู้จอง">
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
								</a>
							<?
								}
							?>
						</td>
						<td>
							<? if($rs_p['p_show']=="yes"){?>
								<img src="../images/tick.png" width="12" height="12">
							<? } else {?>
								<img src="../images/publish_x.png">
							<? } ?>
						</td>
						
						<td>
							
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="30%"><?=$rs_p['p_good']?> / </td>
									<td width="30%"><?=$rs_p['p_bad']?> </td>
									<td width="40%">
									[ 	
										<? if($rs_p['p_point_status']=="yes"){?>
											<img src="../images/tick.png" width="12" height="12">
										<? } else {?>
											<img src="../images/publish_x.png">
										<? } ?>
									]</td>
								</tr>
							</table>
							
						</td>
						
						<td>
							<a href="?fix=true&p_id=<?=$rs_p['p_id']?>&rank=<?=$rank?>&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>&Page=<?=$_GET['Page']?>"><img src="images/b_edit.png" width="16" height="16" border="0"></a>
						</td>
						<td>
							<a href="?del=true&p_id=<?=$rs_p["p_id"];?>" onClick="return Conf(<?=$rank;?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>						
						</td>
			  </tr>
			<?
				$i++;
				
				$rank++;
				}
			?>
			
			
			
			
  			
		  </table>
		 <!-- <br/>
		  <input type="submit" name="Submit2" value="Update Rank Id"> -->
		  </form>
		  
		<!-- <form action="?action=update2" method="post">
		 	<input type="submit" name="Submit2" value="Set Sub Id">
		 </form> -->
		  
		  <hr>
		  
		
		  
<div align="left">
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
		  <!--------------------------------------------------------------------------------------------------------------- -->
          </div>
        			</div>
					
                    </div>
					
            </div> 
     </div>
	 
	 
</body>
</html>
<?
	if($_GET['action']=="update")
	{
		 
		for($j=0;$j<count($_POST["rank_id"]);$j++)
		{
			if(trim($_POST["rank_id"][$i]) != "")
			{
				$sql_up = "update product set
							rank_id    ='".$_POST["rank_id"][$j]."'
			   				where p_id ='".$_POST["p_id"][$j]."'";
			   
			   $dbquery = mysql_query($sql_up);
			}
		}
		

		 echo "<script language='JavaScript'>";
		 echo "alert('Update Rank Id Complete');";
	     echo "</script>";
		 echo "<script>history.back()</script>";
	}
?>