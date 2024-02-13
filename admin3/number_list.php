<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_POST["add"]=="true")
	{
		//------------------------------------------------------------------------------------------------------------
		// generate auto
			$one = substr($_POST['num_number1'],0,1);
			$two = substr($_POST['num_number1'],1,1);
		
			$num_number1 = $_POST['num_number1'];
			$num_number2 = $two.$one;
		
			$tel1  = "select * from number_data where num_number1 = '".$num_number1."'";
			$get1  = mysql_query($tel1);
			$have1 = mysql_num_rows($get1);
		
			$tel2  = "select * from number_data where num_number2 = '".$num_number1."'";
			$get2  = mysql_query($tel2);
			$have2 = mysql_num_rows($get2);
		
			$tel3  = "select * from number_data where num_number1 = '".$num_number2."'";
			$get3  = mysql_query($tel3);
			$have3 = mysql_num_rows($get3);
		
			$tel4  = "select * from number_data where num_number2 = '".$num_number2."'";
			$get4  = mysql_query($tel4);
			$have4 = mysql_num_rows($get4);
		
			$ready = $have1 + $have2 + $have3 + $have4;
		
			if($ready != 0){
				echo"<script language='JavaScript'>";
				echo"alert('This number already have in number list');";
				echo"</script>";
				echo "<script>history.back()</script>";
				exit();
			}		
		//------------------------------------------------------------------------------------------------------------
		
		$tellway  = "INSERT INTO number_data VALUES(";
		$tellway .= "0
					,'$_POST[num_number1]'
					,'$num_number2'
					,'$_POST[num_detail]'
					,'$_POST[num_good_point]'
					,'$_POST[num_bad_point]'
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		 
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='number_list.php?add=true';";
		echo "</script>";
    }
?>

<?
	if($_GET["action"]=="save")
	{
		$sql_up = "update number_data
				   set    num_detail  = '$_POST[num_detail]'
						 ,num_good_point  = '$_POST[num_good_point]'
						 ,num_bad_point   = '$_POST[num_bad_point]'
				   where  num_id      = '".$_POST['num_id']."'";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "</script>";
		echo "<script>history.back()</script>";
    }
	
	if($_GET["del"]=="true")
	{
		$sql_del= "delete from number_data where num_id='".$_GET["num_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='number_list.php';";
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
	if(form1.num_number1.value == "") {
		alert("โปรดระบุ หมายเลขคำทำนาย");
		form1.num_number1.focus();
		return false
	}
	
	if(form1.num_good_point.value == "") {
		alert("โปรดระบุ คะแนนความดีความสุข");
		form1.num_good_point.focus();
		return false
	}
	
	if(form1.num_bad_point.value == "") {
		alert("โปรดระบุ คะแนนความร้ายความทุกข์");
		form1.num_bad_point.focus();
		return false
	}
	
	return true;
}
</script>

<script language="JavaScript">
	function chkSubmit()
	{
		 if(isNaN(document.form1.num_number1.value))
		 {
			alert('Please input Number only.');
			document.form1.num_number1.value=""
			return false;
		 }
		 
		 if(isNaN(document.form1.num_good_point.value))
		 {
			alert('Please input Number only.');
			document.form1.num_good_point.value=""
			return false;
		 }
		 
		  if(isNaN(document.form1.num_bad_point.value))
		 {
			alert('Please input Number only.');
			document.form1.num_bad_point.value=""
			return false;
		 }
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
			 <? if($_GET['add']=="true"){ ?>
				<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			 <form name="form1" method="post" action="" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr>
				<td align="right" colspan="2">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="number_list.php">รายการคำทำนาย</a>				</td>
			</tr>
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+0">&nbsp;เพิ่มคำทำนาย</font>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">หมายเลขคำทำนาย :</td>
				<td width="84%"><input name="num_number1" type="text" size="2" maxlength="2" onKeyUp="chkSubmit()"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td align="right">เนื้อหา :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('num_detail');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '700' ;
						$oFCKeditor->Height = '250' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="" align="right">คะแนนความสุข :</td>
				<td width=""><input name="num_good_point" type="text" size="5" maxlength="4"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="" align="right">คะแนนความทุกข์ :</td>
				<td width=""><input name="num_bad_point" type="text" size="5" maxlength="4"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="add" value="true">
					<input type="submit" name="Submit" value="เพิ่มข้อมูล" style="width:120px; font-size:20px; height:45px;" >
					<input type="reset" name="Submit" value="ลบข้อมูล" style="width:120px; font-size:20px; height:45px;" >				
				</td>
			</tr>
			
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2"><hr/></td>
			</tr>
  			</form>
		  </table>
			 <? } ?>
			 <!--------------------------------------------------------------------------------------------------------------- -->
            <!--------------------------------------------------------------------------------------------------------------- -->
            <?
				if($_GET['fix']=="true"){
				
				$tel_text = "select * 
				             from   number_data
							 where  num_id = '".$_GET['num_id']."'";
							 
				$get_text = mysql_query($tel_text);
				
				while($rs_text = mysql_fetch_array($get_text))
				{
					$num_id       = $rs_text['num_id'];
					$num_number1  = $rs_text['num_number1'];
					$num_number2  = $rs_text['num_number2'];
					$num_detail   = $rs_text['num_detail'];
					$num_good_point   = $rs_text['num_good_point'];
					$num_bad_point    = $rs_text['num_bad_point'];
				}
			?>
<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="form1" method="post" action="?action=save" onSubmit="return checkvalue()">
			
			<tr>
				<td align="right" colspan="2">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="number_list.php">รายการคำทำนาย</a>				</td>
			</tr>
			
			
			
			<tr> 
				<td colspan="2" align="left" bgcolor="#999999">
					<font color="#FFFFFF" size="+0">&nbsp;แก้ไข คำทำนาย หมายเลข :: 
						<? echo "<font color=red>[ ".$num_number1." ] / [ ".$num_number2." ] </font>"?>
					</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">หมายเลขคำทำนาย :</td>
				<td width="84%" align="left">
					<?=$num_number1?> / <?=$num_number2?>
					&nbsp;
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;				</td>
			</tr>
			
			<tr>
				<td align="right">เนื้อหา :</td>
				<td>
					<?php 
 						include("FCKeditor/fckeditor.php");
						$oFCKeditor = new FCKeditor('num_detail');
						$oFCKeditor->BasePath = 'FCKeditor/';
						$oFCKeditor->Width = '700' ;
						$oFCKeditor->Height = '250' ;
						$oFCKeditor->ToolbarSet = 'write2'; 
						$oFCKeditor->Value = $num_detail ;
						$oFCKeditor->Create(); 
					?>				
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="" align="right">คะแนนความสุข :</td>
				<td width=""><input name="num_good_point" type="text" size="5" maxlength="4" value="<?=$num_good_point?>" ></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="" align="right">คะแนนความทุกข์ :</td>
				<td width=""><input name="num_bad_point" type="text" size="5" maxlength="4" value="<?=$num_bad_point?>" ></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="num_id" value="<?=$num_id?>">
					<input type="submit" name="Submit"  value="บันทึก" style="width:120px; font-size:20px; height:45px;" >
					&nbsp;&nbsp;<a href="number_list.php">[ ย้อนกลับ ]</a>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;				</td>
			</tr>
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td colspan="2"><hr/></td>
			</tr>
  			</form>
		  </table>
		  	<?
		  		}
		  	?>
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  
		  <!--------------------------------------------------------------------------------------------------------------- -->
		  <table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
  			<form name="login" method="post" action="?action=insert">
			
			<tr> 
				<td colspan="8" align="right">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="number_list.php?add=true">เพิ่มคำทำนาย</a></span>
				</td>
			</tr>
			
			<tr> 
				<td colspan="8" background="images/bghead.png"align="left">
					<font color="#FFFFFF" size="+1">&nbsp;รายการคำทำนาย</font>				
				</td>
			</tr>
			
			<tr>
				<td colspan="7">&nbsp;				</td>
			</tr>
			
			
			
			
			
			<?
				$telway = "select * 
				           from   number_data
						   ";
				
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
					$_GET['stack'] = "num_id"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysql_query($telway);
			?>
			
			<tr bgcolor="#CCCCCC" height="22px;">
				<td align="center" width="10%">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=num_number1&type_stack=ASC"><font color="#000033">หมายเลข</font></a>
					<? }else { ?>
   						<a href="?stack=num_number1&type_stack=DESC"><font color="#000033">หมายเลข</font></a>
					<? } ?>
				</td>
				
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=num_detail&type_stack=ASC"><font color="#000033">เนื้อหาคำทำนาย</font></a>
					<? }else { ?>
   						<a href="?stack=num_detail&type_stack=DESC"><font color="#000033">เนื้อหาคำทำนาย</font></a>
					<? } ?>
				</td>
				
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=num_good_point&type_stack=ASC"><font color="#000033">ความดี</font></a>
					<? }else { ?>
   						<a href="?stack=num_good_point&type_stack=DESC"><font color="#000033">ความดี</font></a>
					<? } ?>
				</td>
				
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=num_bad_point&type_stack=ASC"><font color="#000033">ความร้าย</font></a>
					<? }else { ?>
   						<a href="?stack=num_bad_point&type_stack=DESC"><font color="#000033">ความร้าย</font></a>
					<? } ?>
				</td>
				
				<td width="5%" align="center">แก้ไข</td>
				<td width="5%" align="center">ลบ</td>
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
						
						<td>
							<?=$rs_text['num_number1']?> / <?=$rs_text['num_number2']?>
						</td>
						<td align="left" style="padding:5px;">
							<font size="-1">
							<?
								//$filter = substr($rs_text['num_detail'],0,1000);
								//echo $filter;
							?>
							<?=$rs_text['num_detail']?>
							</font>
						</td>
						<td align="center" width="7%">
							<?=$rs_text['num_good_point']?>
						</td>
						<td align="center" width="7%">
							<?=$rs_text['num_bad_point']?>
						</td>
						<td align="center">
							<a href="?fix=true&num_id=<?=$rs_text['num_id']?>&Page=<?=$_GET['Page']?>">
								<img src="images/b_edit.png" width="16" height="16" border="0">
							</a>
						</td>
						<td align="center">
							<a href="?del=true&num_id=<?=$rs_text["num_id"];?>" onClick="return Conf(<?=$rs_text["num_id"];?>)">
								<img src="images/_delete_data.png" width="16" height="16" border="0">
							</a>
						</td>
					</tr>
			<?
				}
			?>
			
			<tr>
				<td colspan="4">&nbsp;				</td>
			</tr>
  			</form>
		  </table>
		  
		  <br/>
		  <div align="left">
			จำนวนคำทำนาย <?= $Num_Rows;?> คำทำนาย :
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