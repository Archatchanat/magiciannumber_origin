<?
	ob_start();
	session_start();
	require("../connect/connect.php");
	require("../connect/function.php");
	
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
					,'$_POST[help_name]'
					,'$_POST[help_email]'
					,'$_POST[help_tel]'
					,'$_POST[help_addresss]'
					,'$_POST[p_sale]'
					,'yes'					
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
					,help_name      = '$_POST[help_name]'
					,help_email     = '$_POST[help_email]'
					,help_tel       = '$_POST[help_tel]'
					,help_address   = '$_POST[help_address]'
					,p_sale         = '$_POST[p_sale]'
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
		
		//$sql_del= "delete from product where p_id='".$_GET["p_id"]."'";
		//$dbquery_del = mysql_query($sql_del);
		
		$sql_up = "update product set 
				   p_check = 'no'
				   where  p_id ='".$_GET["p_id"]."'";
		$dbquery = mysql_query($sql_up);
		
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
			?><?
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
				}
			?>
				<!------------------------------------------------------------------------------------------------------- -->
                <!------------------------------------------------------------------------------------------------------- -->
                <?
		  		}
		  	?>
                <!--############################################################################################################# -->
                <!--------------------------------------------------------------------------------------------------------------- -->
<form action="?action=update&stack=<?=$_GET['stack']?>&type_stack=<?=$_GET['type_stack']?>&Page=<?=$_GET['Page']?>" method="post">
		  <table width="90%" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF">

			<tr> 
				<td colspan="12" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการจองใหม่</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="12">&nbsp;
				
				</td>
			</tr>
			
			<?
			   
				$telway ="select  product.* , number_owner.*
				           from   product   , number_owner 
						   where  product.p_id = number_owner.p_id and 
                                  product.p_sale = 'No' ";
								  
				$objQuery = mysql_query($telway) or die ("Error Query [".$telway."]");
				$Num_Rows = mysql_num_rows($objQuery);
		
				$Per_Page = 20;   // Per Page

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
					$_GET['stack'] = "number_owner.owner_date"; 
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
				<td width="6%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_id&type_stack=ASC"><font color="#000033">ลำดับ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_id&type_stack=DESC"><font color="#000033">ลำดับ</font></a>
					<? } ?>				</td>
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
				<td width="9%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_network&type_stack=ASC"><font color="#000033">เครือข่าย</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_network&type_stack=DESC"><font color="#000033">เครือข่าย</font></a>
					<? } ?>				</td>
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
				<td width="12%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_date&type_stack=ASC"><font color="#000033">วันหมดอายุ</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_date&type_stack=DESC"><font color="#000033">วันหมดอายุ</font></a>
					<? } ?>				
				</td>
				<td width="12%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_status&type_stack=ASC"><font color="#000033">สถานะการจอง</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_status&type_stack=DESC"><font color="#000033">สถานะการจอง</font></a>
					<? } ?>				
				</td>
				<td width="7%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_show&type_stack=ASC"><font color="#000033">แสดง</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_show&type_stack=DESC"><font color="#000033">แสดง</font></a>
					<? } ?>				</td>
				<!--<td>
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_detail&type_stack=ASC"><font color="#000033">รายละเอียด</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_detail&type_stack=DESC"><font color="#000033">รายละเอียด</font></a>
					<? } ?>
				</td> -->
				
				<!--<td width="15%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_good&type_stack=ASC"><font color="#000033">คะแนน</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_good&type_stack=DESC"><font color="#000033">คะแนน</font></a>
					<? } ?>
				</td> -->
				
				<td width="13%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=product.p_sale&type_stack=ASC"><font color="#000033">สถานะการขาย</font></a>
					<? }else { ?>
   						<a href="?stack=product.p_sale&type_stack=DESC"><font color="#000033">สถานะการขาย</font></a>
					<? } ?>				
				</td>
				<td width="13%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=number_owner.owner_date&type_stack=ASC"><font color="#000033">วันที่จอง</font></a>
					<? }else { ?>
   						<a href="?stack=number_owner.owner_date&type_stack=DESC"><font color="#000033">วันที่จอง</font></a>
					<? } ?>				
				</td>
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
						<td><?=$rs_p['owner_id']?></td>
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
						<td width="6%" style="padding:5px;"><strong><?=number_format($rs_p['p_price']);?></strong></td>
						
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
								<a href="product_owner.php?p_id=<?=$rs_p['p_id']?>&stack=product.p_number&type_stack=<?=$_GET['type_stack']?>" title="คลิกที่นี่ เพื่อดูชื่อผู้จอง">
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
						
						<!--<td>
							<?=$rs_p['p_good']?> /
							<?=$rs_p['p_bad']?>
							[ 	
								<? if($rs_p['p_point_status']=="yes"){?>
									<img src="../images/tick.png" width="12" height="12">
								<? } else {?>
									<img src="../images/publish_x.png">
								<? } ?>
							]
						</td> -->
						<td>
							<? if($rs_p['p_sale']=="yes"){?>
									<font color="green">ขายแล้ว</font>
							<? } else {?>
									<font color="red">ยังไม่ได้ขาย</font>
							<? } ?>
						</td>
						<td>
							<?=dtpf($rs_p['owner_date'])?>
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