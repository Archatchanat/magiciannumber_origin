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
				   p_check = '$_POST[p_check]'
				   where  p_id ='".$_POST['p_id']."'";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='product_del.php';";
		echo "</script>";
		exit();		
    }
	
	// start delete -----------------------------------------------------------------------------------------------------------------
	if($_GET["del"]=="true")
	{
		//------------------------------------------------------------------------
			$sql_del= "delete from product where p_id='".$_GET["p_id"]."'";
			$dbquery_del = mysql_query($sql_del);
			
			$sql_del= "delete from number_owner where p_id='".$_GET["p_id"]."'";
			$dbquery_del = mysql_query($sql_del);
		//------------------------------------------------------------------------
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='product_del.php';";
		echo "</script>";
		exit();
    }
	// start delete -----------------------------------------------------------------------------------------------------------------
	
	
	// start delete_selected --------------------------------------------------------------------------------------------------------
	if($_GET["action"]=="del_sel")
	{
		$j=0;
		while($j<=$_POST['num_rows']){
			$j++;
			
			if($_POST["delete_id"][$j]!=""){
			
				//---------------------------------------------------------------------------
				
					$sql_del= "delete from product where p_id='".$_POST["delete_id"][$j]."'";
					$dbquery_del = mysql_query($sql_del);
					
					$sql_del= "delete from number_owner where p_id='".$_POST["delete_id"][$j]."'";
					$dbquery_del = mysql_query($sql_del);
					
				//---------------------------------------------------------------------------
				
			}		
		}
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Selected Complete');";
		echo "window.location='product_del.php';";
		echo "</script>";
		exit();
	}
	// end__ delete_selected --------------------------------------------------------------------------------------------------------
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Administrator Database System</title>
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="partner.js"></script>
	
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
			
			function ConfAll() {
				if (confirm("กรุณายืนยัน การลบ") ==true) {
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
					
					$help_name    = $rs_p['help_name'];
					$help_email   = $rs_p['help_email'];
					$help_tel     = $rs_p['help_tel'];
					$help_address = $rs_p['help_address'];
					
					$p_sale = $rs_p['p_sale'];
					
					
					$p_check = $rs_p['p_check'];
				}
			?>
            <!------------------------------------------------------------------------------------------------------- -->
<table width="90%" border="0" cellpadding="20" cellspacing="1" bgcolor="#FFFFFF">
  			 	<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()">
				<tr>
					<td align="right" colspan="8">&nbsp;<img src="images/plus_16.png"><a href="product_del.php">รายการเบอร์โทรศัพท์</a></td>
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
					<fieldset style="padding:5px;">
					<u><font color="#006600">กำหนดคะแนนเอง</font></u>
					<table width="100%">
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td width="37%" align="right">คะแนนความดี ::</td>
							<td width="63%">
								<input name="p_good" type="text"  size="10" maxlength="10" value="<?=$p_good?>">
								<!--<br/><font size="-1">[ ช่วงคะแนน 0-1000 ]</font> -->
						  </td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>	
						<tr>
							<td align="right">คะแนนความร้าย ::</td>
							<td>
								<input name="p_bad" type="text"  size="10" maxlength="10" value="<?=$p_bad?>">
								<!--<br/><font size="-1">[ ช่วงคะแนน 0-1000 ] ใส่เครื่องหมายลบหน้าคะแนนด้วยนะครับ</font> -->
							</td>
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
						<tr>
							<td colspan="2"><hr/></td>
						</tr>		
						<tr>
							<td colspan="2"><u><font color="#006600">ข้อมูลผู้ฝากขาย</font></u></td>
						</tr>
						<tr>
							<td align="right">ชื่อ ::</td>
							<td><input name="help_name" type="text"  size="20" maxlength="20" value="<?=$help_name?>"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">อีเมล์ ::</td>
							<td><input name="help_email" type="text"  size="20" maxlength="20" value="<?=$help_email?>"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">เบอร์โทรศัพท์ ::</td>
							<td><input name="help_tel" type="text"  size="20" maxlength="20" value="<?=$help_tel?>"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">ที่อยู่ ::</td>
							<td><textarea name="help_address" rows="5" cols="30"><?=$help_address?></textarea></td>
						</tr>	
					</table>
					</fieldset>
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
			      	TRUE
					<br/>
					<input type="radio" name="p_network" value="HUTCH" <? if($p_network=="HUTCH"){?> checked="checked" <? } ?>>
				    HUTCH
				    <input type="radio" name="p_network" value="CATCDMA" <? if($p_network=="CATCDMA"){?> checked="checked" <? } ?>>
				    CATCDMA
				    <input type="radio" name="p_network" value="IMOBILE " <? if($p_network=="IMOBILE"){?> checked="checked" <? } ?>>
			      	IMOBILE 
				  </td>
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
					<td width="19%" align="right">สถานะการขาย :</td>
					<td width="33%" align="left">
						<input type="radio" name="p_sale" value="no" <? if($p_sale=="no"){?> checked="checked" <? } ?>>ยังไม่ได้ขาย
						<input type="radio" name="p_sale" value="yes" <? if($p_sale=="yes"){?> checked="checked" <? } ?>>ขายแล้ว
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>
				<tr>
					<td width="19%" align="right">สถานะการระงับ :</td>
					<td width="33%" align="left">
						<input type="radio" name="p_check" value="no"  <? if($p_check=="no") {?> checked="checked" <? } ?>>ระงับเบอร์
						<input type="radio" name="p_check" value="yes" <? if($p_check=="yes"){?> checked="checked" <? } ?>>ปลดเบอร์
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
		&nbsp;&nbsp;<a href="product_del.php?stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>&Page=<?=$_GET['Page']?>">[ ย้อนกลับ ]</a>					</td>
				</tr>
				
				<tr>
					<td colspan="3">&nbsp;</td>
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
		  <form name="list" method="post" action="?action=del_sel" onSubmit="return ConfAll()">
		  <table width="90%" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF">
			<tr> 
				<td colspan="13" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการเบอร์โทรศัพท์ระงับ</font></td>
			</tr>
			
			<tr>
				<td colspan="12">&nbsp;
				
				</td>
			</tr>
			
			<?
				$telway ="select  product.* , product_category.*
				           from   product   , product_category 
						   where  product.cat_id = product_category.cat_id and 
						   		  product.p_check = 'no'
						   ";
								  
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
					$_GET['type_stack'] = "DESC"; 
				}
			
				if($_GET['stack']=="")
				{ 
					$_GET['stack'] = "product.p_id"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysql_query($telway);
			?>
			
			<tr align="center" bgcolor="#CCCCCC">
				<td>
					<div style="width:30px;">
						<input type=checkbox id="checkAll" onClick="selectAll(<?=$Num_Rows?>)">
					</div>
				</td>
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
				<!--<td width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product_category.cat_id&type_stack=ASC"><font color="#000033">หมวดหมู่</font></a>
					<? }else { ?>
   						<a href="?stack=product_category.cat_id&type_stack=DESC"><font color="#000033">หมวดหมู่</font></a>
					<? } ?>
				</td> -->
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
				<td width="5%">
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
				
				<td width="15%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_good&type_stack=ASC"><font color="#000033">คะแนน</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_good&type_stack=DESC"><font color="#000033">คะแนน</font></a>
					<? } ?>
				</td>
				
				<td width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_sale&type_stack=ASC"><font color="#000033">สถานะการขาย</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_sale&type_stack=DESC"><font color="#000033">สถานะการขาย</font></a>
					<? } ?>
				</td>
				
				<td width="5%" align="center">แก้ไข</td>
				<td width="5%" align="center">ลบ</td>
			</tr>
			
			<?
				$rank=1;
				while($rs_p = mysql_fetch_array($objQuery))
				{
				
				$i++;
				
			?>
			
			<? if($i%2==0){ ?>
				<tr bgcolor="#FFFFCC" align="center" id="tr<?=$i?>">
			<? } else {?>
				<tr bgcolor="#CCCCFF" align="center" id="tr<?=$i?>">
			<? } ?>
						<td>
			<input type=checkbox id="check<?=$i?>" name="delete_id[<?=$i?>]" value="<?=$rs_p['p_id']?>" onClick="if(this.checked==true){ selectRow('tr<?=$i?>'); }else{ deselectRow('tr<?=$i?>'); }">
						</td>
						<td><?=$rs_p['p_id']?></td>
						<!--<td>
 
  <input name="p_id[<?=$i?>]" type="hidden" value="<?=$rs_p['p_id']?>" />
  <input name="rank_id[<?=$i?>]" type="text" style="width:20px;text-align:center" value="<?=$rs_p['rank_id'];?>" maxlength="3" id="txtQua[<?=$i?>]"/>
  
						</td> -->
						<!--<td><?=$rs_p['cat_title']?></td> -->
						<td>
							<?php if($rs_p['p_check']=="no"){ ?> <s><font color="#FF0000"><?php } ?>
							<font size="5">
							<?
								$num1 = substr($rs_p['p_number'],0,2);
								$num2 = substr($rs_p['p_number'],2,8);
								
								
								echo $num1."-".$num2;
							?>
							
							
							</font>
							
							<?php if($rs_p['p_check']=="no"){ ?> </font></s> <?php } ?>
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
							<?=$rs_p['p_good']?> /
							<?=$rs_p['p_bad']?>
							[ 	
								<? if($rs_p['p_point_status']=="yes"){?>
									<img src="../images/tick.png" width="12" height="12">
								<? } else {?>
									<img src="../images/publish_x.png">
								<? } ?>
							]
						</td>
						<td>
							
							
							<? if($rs_p['p_sale']=="yes"){?>
									<font color="green">ขายแล้ว</font>
							<? } else {?>
									<font color="red">ยังไม่ได้ขาย</font>
							<? } ?>
						</td>		
						<td>
							<a href="?fix=true&p_id=<?=$rs_p['p_id']?>&rank=<?=$rank?>&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>&Page=<?=$_GET['Page']?>"><img src="images/b_edit.png" width="16" height="16" border="0"></a>
						</td>
						<td>
							<a href="?del=true&p_id=<?=$rs_p["p_id"];?>" onClick="return Conf(<?=$rs_p["p_id"];?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>						
						</td>
			  </tr>
			<?
				//$i++;
				
				$rank++;
				}
			?>
			
			
			
			
  			
		  </table>
		 <!-- <br/>
		  <input type="submit" name="Submit2" value="Update Rank Id"> -->
		  
		  
		<!-- <form action="?action=update2" method="post">
		 	<input type="submit" name="Submit2" value="Set Sub Id">
		 </form> -->
		  
		  <hr>
		  
		
		  
<div align="left">

<input type="hidden" name="num_rows" id="num_rows" value="<?=$Num_Rows?>">
<input type="submit" name="Submit2" value="ลบรายการที่เลือก" />

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

  </form>
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