<?
	ob_start();
	session_start();
	require("../connect/connect.php");
?>

<?
	if($_GET["action"]=="insert")
	{
		//-----------------------------------------------------------------------------------------------------------------------
		// start resize picture
			
		if(trim($_FILES["fileUpload"]["tmp_name"]) != "")
		{
			// start detect eror on picture ----------------------------------------
			$picture_name	= $_FILES["fileUpload"]["name"];
			$picture_size   = $_FILES["fileUpload"]["size"];
			$picture_type	= $_FILES["fileUpload"]["type"];
			$picture        = strtoupper(substr($picture_name, -4));
			
			//size
			if($picture_size > 200000){
				echo"<script language='JavaScript'>";
				echo"alert('Picture is too large');";
				echo"</script>";
				echo "<script>history.back()</script>";
				exit();
			}
		
			//type
			if($picture != ".JPG" && $picture != ".GIF") {
				echo"<script language='JavaScript'>";
				echo"alert('Picture is only JPG of GIF');";
				echo"</script>";
				echo "<script>history.back()</script>"; 
				exit();
			}
			// end__ detect eror on picture ----------------------------------------
			
			
			// start process resize picture  ---------------------------------------
			$images       = $_FILES["fileUpload"]["tmp_name"];
			$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
			copy($_FILES["fileUpload"]["tmp_name"],"../pic_text/".$_FILES["fileUpload"]["name"]);
			$width=85; //*** Fix Width & Heigh (Autu caculate) ***//
			$size=GetimageSize($images);
			$height=round($width*$size[1]/$size[0]);
			$images_orig = ImageCreateFromJPEG($images);
			$photoX = ImagesX($images_orig);
			$photoY = ImagesY($images_orig);
			$images_fin = ImageCreateTrueColor($width, $height);
			ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
			ImageJPEG($images_fin,"../pic_text/".$new_images);
			ImageDestroy($images_orig);
			ImageDestroy($images_fin);
			// end__ process resize picture  ---------------------------------------
		}
		
		// end__ resize picture
		//-----------------------------------------------------------------------------------------------------------------------
		
		$tellway  = "INSERT INTO text1 VALUES(";
		$tellway .= "0
					,'".$new_images."'
					,'".$_FILES["fileUpload"]["name"]."'
					,'$_POST[text_title]'
					,'$_POST[text_content]'
					,'$_POST[text_post]'
					,''
					,NOW()
					";
		$tellway .= ")";
		$dbquery = mysql_query($tellway);
		 
		echo "<script language=\"JavaScript\">";
		echo "alert('Add Complete');";
		echo "window.location='about_our_house.php';";
		echo "</script>";
    }
?>

<?
	if($_GET["action"]=="save")
	{
		//-----------------------------------------------------------------------------------------------------------------------
		// start resize picture
			
		if(trim($_FILES["fileUpload"]["tmp_name"]) != "")
		{
			// start detect eror on picture ----------------------------------------
			$picture_name	= $_FILES["fileUpload"]["name"];
			$picture_size   = $_FILES["fileUpload"]["size"];
			$picture_type	= $_FILES["fileUpload"]["type"];
			$picture        = strtoupper(substr($picture_name, -4));
			
			//size
			if($picture_size > 200000){
				echo"<script language='JavaScript'>";
				echo"alert('Picture is too large');";
				echo"</script>";
				echo "<script>history.back()</script>";
				exit();
			}
		
			//type
			if($picture != ".JPG" && $picture != ".GIF") {
				echo"<script language='JavaScript'>";
				echo"alert('Picture is only JPG of GIF');";
				echo"</script>";
				echo "<script>history.back()</script>"; 
				exit();
			}
			// end__ detect eror on picture ----------------------------------------
			
			
			// start process resize picture  ---------------------------------------
			$images       = $_FILES["fileUpload"]["tmp_name"];
			$new_images = "Thumbnails_".$_FILES["fileUpload"]["name"];
			copy($_FILES["fileUpload"]["tmp_name"],"../pic_text/".$_FILES["fileUpload"]["name"]);
			$width=85; //*** Fix Width & Heigh (Autu caculate) ***//
			$size=GetimageSize($images);
			$height=round($width*$size[1]/$size[0]);
			$images_orig = ImageCreateFromJPEG($images);
			$photoX = ImagesX($images_orig);
			$photoY = ImagesY($images_orig);
			$images_fin = ImageCreateTrueColor($width, $height);
			ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
			ImageJPEG($images_fin,"../pic_text/".$new_images);
			ImageDestroy($images_orig);
			ImageDestroy($images_fin);
			// end__ process resize picture  ---------------------------------------
		}
		else {
			$new_images                   = $_POST['new_pic'];
			$_FILES["fileUpload"]["name"] = $_POST['real_pic'];
		}
		
		// end__ resize picture
		//-----------------------------------------------------------------------------------------------------------------------
		$sql_up = "update text1
				   set    new_pic      = '".$new_images."'
				   		 ,real_pic     = '".$_FILES["fileUpload"]["name"]."'
				   		 ,text_title   = '$_POST[text_title]'
				   		 ,text_content = '$_POST[text_content]'
						 ,text_post    = '$_POST[text_post]'
				   where  text_id      = '".$_POST['text_id']."'";
				   
		$dbquery = mysql_query($sql_up);
			
		echo "<script language='JavaScript'>";
		echo "alert('Save Complete');";
		echo "window.location='about_our_house.php';";
		echo "</script>";
    }
	
	if($_GET["del"]=="true")
	{
		$sql_del= "delete from text1 where text_id='".$_GET["text_id"]."'";
		$dbquery_del = mysql_query($sql_del);
		
		echo "<script language='JavaScript'>";
		echo "alert('Delete Complete');";
		echo "window.location='about_our_house.php';";
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
		alert("Please Enter Image Name");
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
          		 <? include("top.php");?>
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
  			 <form name="form1" method="post" action="?action=insert" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr>
				<td align="right" colspan="2">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="about_our_house.php">Image List</a>
				</td>
			</tr>
			<tr> 
				<td colspan="2" background="images/bghead.png"align="left" style="padding:3px;">
					<font color="#FFFFFF" size="+0">&nbsp;About Us :: Our House</font>			
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">Image :</td>
				<td width="84%"><input type="file" name="fileUpload"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">Image Name :</td>
				<td width="84%"><input type="text" name="text_title" style="width:250px;"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			
			
			
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="Submit" value="Submit"  >
					<input type="reset" name="Submit" value="Clear"  >				
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
				             from   text1
							 where  text_id = '".$_GET['text_id']."'";
							 
				$get_text = mysql_query($tel_text);
				
				while($rs_text = mysql_fetch_array($get_text))
				{
					$text_id      = $rs_text['text_id'];
					
					$new_pic      = $rs_text['new_pic'];
					$real_pic     = $rs_text['real_pic'];
					
					$text_title   = $rs_text['text_title'];
					$text_content = $rs_text['text_content'];
					$text_post    = $rs_text['text_post'];
				}
			?>
<table width="90%" border="0" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF">
			<form name="form1" method="post" action="?action=save" enctype="multipart/form-data" onSubmit="return checkvalue()">
			<tr>
				<td align="right" colspan="2">
				<img src="images/plus_16.png" width="16" height="16" /> <a href="about_our_house.php">Image List</a>				</td>
			</tr>
			
			
			
			<tr> 
				<td colspan="2" align="left" bgcolor="#999999">
					<font color="#FFFFFF" size="+0">&nbsp;Fix Image No :: <? echo "<font color=red>[ ".$_GET['text_id']." ]</font>"?></font>	
				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">Image :</td>
				<td width="84%"><img src="../pic_text/<?=$new_pic?>" width="84" height="82"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="file" name="fileUpload"></td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td width="16%" align="right">Image Name :</td>
				<td width="84%" align="left"><input type="text" name="text_title" value="<?=$text_title?>" style="width:250px;">&nbsp;</td>
			</tr>
			
			
			
			
			
			
			
			
			
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="text_id"  value="<?=$text_id?>">
					<input type="hidden" name="new_pic"  value="<?=$new_pic?>">
					<input type="hidden" name="real_pic" value="<?=$real_pic?>">
					<input type="submit" name="Submit"   value="Save Change"  >
					&nbsp;&nbsp;<a href="about_our_house.php">[ Back ]</a>				</td>
			</tr>
			
			<tr>
				<td colspan="2">&nbsp;</td>
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
				<img src="images/plus_16.png" width="16" height="16" /> <a href="about_our_house.php?add=true">Add Image</a></span>
				</td>
			</tr>
			
			<tr> 
				<td colspan="8" background="images/bghead.png"align="left" style="padding:3px;">
					<font color="#FFFFFF" size="+0">&nbsp;About Us :: Our House</font>			
				</td>
			</tr>
			
			<tr>
				<td colspan="7">&nbsp;				</td>
			</tr>
			
			
			
			
			
			<?
				$telway = "select *
				           from   text1
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
					$_GET['type_stack'] = "ASC"; 
				}
			
				if($_GET['stack']=="")
				{ 
					$_GET['stack'] = "text_id"; 
				}
			
			
				$telway .=" ORDER  BY ".$_GET['stack']." ".$_GET['type_stack']." LIMIT $Page_Start , $Per_Page";
				$objQuery  = mysql_query($telway);
			?>
			
			<tr bgcolor="#CCCCCC" height="22px;">
				<td width="10%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=text_id&type_stack=ASC"><font color="#000033">No</font></a>
					<? }else { ?>
   						<a href="?stack=text_id&type_stack=DESC"><font color="#000033">No</font></a>
					<? } ?>
				</td>
				
				<td width="10%" align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=new_pic&type_stack=ASC"><font color="#000033">Image</font></a>
					<? }else { ?>
   						<a href="?stack=new_pic&type_stack=DESC"><font color="#000033">Image</font></a>
					<? } ?>
				</td>
				
				<td align="center">
					<? if($_GET['type_stack']=="" || $_GET['type_stack']=="DESC"){?>
   						<a href="?stack=text_title&type_stack=ASC"><font color="#000033">Image Name</font></a>
					<? }else { ?>
   						<a href="?stack=text_title&type_stack=DESC"><font color="#000033">Image Name</font></a>
					<? } ?>
				</td>
				
			
				
				<td width="5%" align="center">Fix</td>
				<td width="5%" align="center">Del</td>
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
						<td align="center">
							<?=$rs_text['text_id']?>
						</td>
						<td>
							<img src="../pic_text/<?=$rs_text['new_pic']?>">
						</td>
						<td align="center" style="padding:5px;">
							<?=$rs_text['text_title']?>
						</td>
					
						<td align="center">
							<a href="?fix=true&text_id=<?=$rs_text['text_id']?>"><img src="images/b_edit.png" width="16" height="16" border="0"></a>
						</td>
						<td align="center">
							<a href="?del=true&text_id=<?=$rs_text["text_id"];?>" onClick="return Conf(<?=$rs_text["text_id"];?>)">
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
			Total <?= $Num_Rows;?> Picture :
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