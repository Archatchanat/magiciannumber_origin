<?
	ob_start();
	session_start();
	require("connect/connect.php");
	
	function num_record($p_number)
	{
		$sql      = "select * from product where p_number = '".$p_number."'";
		$dbquery  = mysql_query($sql);
		$num_rows = mysql_num_rows($dbquery);
		return $num_rows;
	}
?>

			<?
				//=====================================================================================================
				// start step 1 :: explode to seven
				
				if($_GET['p_id']!=""){
					$tel_pr = "select * from product where p_id = '".$_GET['p_id']."'";
					$get_pr = mysql_query($tel_pr);
					
					while($rs_pr = mysql_fetch_array($get_pr))
					{
						$_POST['mobile_number'] = $rs_pr['p_number'];
					}
				} 
				
				$explode[0] = substr($_POST['mobile_number'],2,2);
				$explode[1] = substr($_POST['mobile_number'],3,2);
				$explode[2] = substr($_POST['mobile_number'],4,2);
				$explode[3] = substr($_POST['mobile_number'],5,2);
				$explode[4] = substr($_POST['mobile_number'],6,2);
				$explode[5] = substr($_POST['mobile_number'],7,2);
				$explode[6] = substr($_POST['mobile_number'],8,2);
				
				
				for($i=0;$i<count($explode);$i++)
				{
					$number1 = substr($explode[$i],0,1);
					$number2 = substr($explode[$i],1,1);
					
					// new arrange
					if($number1 <= $number2){
						$result[$i] = $number1.$number2;
					} else {
						$result[$i] = $number2.$number1;
					}
					
					if($result[$i] == 13 || $result[$i] == 27 || $result[$i] == 37 || $result[$i]==48 || $result[$i]==67 || $result[$i] ==68){
						$red_zone = true;
					} else {
						$red_zone = false;
					}
					
					
					$tel = "select * 
							from   number_data 
							where num_number1 = '".$result[$i]."'";
					$get = mysql_query($tel);
						
					while($rs = mysql_fetch_array($get)){
							
							
							$result_good = $result_good + $rs['num_good_point'];
							$result_bad  = $result_bad  + $rs['num_bad_point'];
						
							$rs['num_good_point'] = 0;
							$rs['num_bad_point'] = 0;
						
					}
					
					$str_number .=  $result[$i];
				
				}
				//=====================================================================================================
				
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
		
			<div id="content">
			<!--<font color="#000000"><strong>ผลทำนายเบอร์โทรศัพท์</strong></font> -->
			<br/>
			<font size="+3" color="#993300">
			เบอร์โทรศัพท์ :: 
				<? 
				$numbersh = $_POST['mobile_number'];
				$ipuser = $_SERVER["REMOTE_ADDR"];
				$detailuser = $_SERVER["HTTP_USER_AGENT"];
				
				$refer_url = $_SESSION["refer_url"];

							
				
				//$nowdate = date('d/n/Y');
				$sqlnum = "INSERT INTO user2021 (ip_usermem,detail,refer_url, num_user, date_sh)VALUES ('$ipuser','$detailuser','$refer_url','$numbersh', NOW())";

					if (mysql_query($sqlnum) === TRUE) {
   								 echo "";
						} else {
  							  echo "Error: " . $sqlnum . "<br>" .mysql_error();
								}
				
					echo $numbersh; 
					echo "<br/><br/>"; 
				?> 
			</font>
			 
			 
				<?
					//echo $str_number;
					//echo "<br/>";
					//echo "Last Number";
					//echo $result[6];
					//echo "<br/>";
					
					
					$check = num_record($_POST['mobile_number']);
					if($check =="1"){
						//echo "มีเบอร์นี้อยูู่ในระบบ";
						
						$tel_ps = "select * from product where p_number = '".$_POST['mobile_number']."'";
						$get_ps = mysql_query($tel_ps);
						
						while($rs_ps = mysql_fetch_array($get_ps))
						{
							$p_good         = $rs_ps['p_good'];
							$p_bad          = $rs_ps['p_bad'];
							$p_point_status = $rs_ps['p_point_status'];
						} 
						
					} else {
						//echo "ไม่มีเบอร์นี้อยูู่ในระบบ";
					}
				?>
			
			
			
			<!------------------------------------------------------------------------------------------------------- -->
			<?
				
				
				// case this number already have in database
				if($check == "1"){
					if($p_point_status == "yes"){
						$good_point = $p_good/10;
						$bad_point  = $p_bad/10;
					} else if($result_good >= 1000){
						$good_point = 100;
					} else {
						$good_point = $result_good/10;
						$bad_point  = $result_bad/10;		
					}
				} 
				
				// case this number not already have in database
				if($check == "0"){
					$good_point = $result_good/10;
					$bad_point  = $result_bad/10;		
				}
			?>
			<!------------------------------------------------------------------------------------------------------- -->
			
			
			<?
				if($check == "0" && $good_point>= 100){
			?>
				<font color="#00CC33">ความสุข = [ 70 - 100 % ]</font>  
				<font color="#993333">ความทุกข์ = [ <?=$bad_point?> % ]</font>
			<?
				} else {
			?>
				<? 
					$sum = $good_point+$bad_point;
					if($red_zone || $sum < 0){?>
					<font color="#FF0000" size="+2">
				<? } else {?>
					<font color="#00CC33" size="+2">
				<? } ?>
				
					<u>อัตราส่วนเบอร์ดี = <?=$good_point+$bad_point?> % </u>
				</font> 
				
				<br/><br/>
				
				<font color="#00CC33">[ ความสุข = <?=$good_point?> % ]</font>  
				<font color="#993333">[ ความทุกข์ = <?=$bad_point?> % ]</font>
				
			<?
				}
			?>
			
			
			<br/><br/>
			<table width="550" style="color:#993333">
				<tr>
					<td>อัตราส่วน 80 - 100%</td>
					<td>= เบอร์ดีมาก</td>
					<td>อัตราส่วน 50 - 80%</td>
					<td>= เบอร์ดี</td>
				</tr>
				<tr>
					<td>อัตราส่วน 10 - 50%</td>
					<td>= เบอร์ปานกลาง</td>
					<td>อัตราส่วนน้อยกว่า 10%</td>
					<td>= ชีวิตเหนื่อยหน่อยนะครับ</td>
				</tr>
				<tr>
					<td>น้อยกว่า 0%</td>
					<td colspan="3">= เบอร์ร้าย</td>
					
				</tr>
			</table>
			
			<br/>
			<font size="+2" color="green">
				<b>พฤติกรรมของผู้ใช้เบอร์ <?=$_POST['mobile_number']?> เป็นประจำ</b>
			</font>
			<hr>
			<?
				//=====================================================================================================
				// start step 2 :: result of unique seven
				$final_result = array_unique($result);
				for($k=0;$k<count($result);$k++)
				{
					if($final_result[$k]!=""){
						
						$tel = "select * 
								from   number_data where num_number1 = '".$final_result[$k]."'";
						$get = mysql_query($tel);
						
						while($rs = mysql_fetch_array($get)){
							//echo $rs['num_number1'];
							
							
							
							echo "-&nbsp;";
							echo "<font size=2 >".$rs['num_detail']."</font>";
							echo "<br>";
							echo "<font color=green>( ตรรกะโดยสถิติ = ";
							
							if($rs['num_number1'] == $result[6]){
								echo substr_count($str_number, $rs['num_number1'])+2;
							} else {
								echo substr_count($str_number, $rs['num_number1']);
							}
							
							echo " )</font>";
					
							
							echo "<hr>";
							
							
						
						}
					}
				}
				//=====================================================================================================
			?>
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