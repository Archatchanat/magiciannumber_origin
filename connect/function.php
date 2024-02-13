<?php
					// Function  sub str
					function subtext($input, $range, $encoding="UTF-8", $dotted = true){
						if($dotted and (mb_strlen($input) > $range))
							return mb_substr($input, 0, $range, $encoding) . "...";
						else
							return mb_substr($input, 0, $range, $encoding);
							
							
					}
					// Function  sub str
					
					
					//== Function conver data and show time am or pm ========
					function trim_empty($temp){
						$temp = ereg_replace('[[:space:]]+', '', trim($temp));
						return ( $temp ) ; 	
					}
					
					//== Function conver data and show time am or pm and how long past ========
					function dtpf($getdate){
						$date  = substr($getdate,8,2);
						$month = substr($getdate,5,2);
						$year  = substr($getdate,0,4);
						
						$str_date = $date."-".$month."-".$year;
						$str_time = date('h:i A', strtotime($getdate));
						
						
						$str_past = mastertimediff($getdate);
						$str_last = $str_date." , ".$str_time ." , ".$str_past; 
						
						return "<font size=-1>".$str_last."</font>";
					}
					
					//== Function conver data and show time am or pm ========
					function datetimeform($getdate){
						$date  = substr($getdate,8,2);
						$month = substr($getdate,5,2);
						$year  = substr($getdate,0,4);
						
						$str_date = $date."-".$month."-".$year;
						$str_time = date('h:i A', strtotime($getdate));
						$str_last = $str_date." , ".$str_time;
						return $str_last;
					}
					
					//=============== Function plus_random ==================
					function plus_random($table,$condition,$point)
					{
						$tel_max = "select * from $table where $condition order by $point DESC LIMIT 0,1";
						$get_max = mysql_query($tel_max);
						
						while($rs_max = mysql_fetch_array($get_max)){
							$max = $rs_max[$point];
						}
						
						$random = rand(1,9);
						
						$plus = $max + $random;
						
						$sql = "UPDaTE $table SET $point = $plus where $condition";
						$result = mysql_query($sql);
					}
					
					//=============== Function how long past ==================
					function mastertimediff($target_time)
					{
						$today = today_real();
						
						$timeFirst  = strtotime($target_time);
						$timeSecond = strtotime($today);
						$differenceInSeconds = $timeSecond - $timeFirst;
											
						$df_second = floor($differenceInSeconds);
						$df_minute = floor($differenceInSeconds/60);
						$df_hour   = floor($df_minute/60);
						$df_day    = floor($df_hour/24);
						$df_month  = floor($df_day/31);
						$df_year   = floor($df_day/365);
						
						if($df_year>=1){
							$result_time = $df_year." ปี มาแล้ว ";
						} else if($df_month>=1){
							$result_time = $df_month." เดือน มาแล้ว ";
						} else if($df_day>=1){
							$result_time = $df_day." วัน มาแล้ว ";
						} else if($df_hour>=1){
							$result_time = $df_hour." ชม มาแล้ว ";
						} else if($df_minute>=1){
							$result_time = $df_minute." นาที มาแล้ว ";
						} else if($df_second>=1){
							$result_time = $df_second." วินาที มาแล้ว ";
						} else {
							$result_time = " ไม่กี่วินาที ที่แล้ว ";
						}
						
						return $result_time; 
					}
					//-------------------------------------------------
					
					
					//=============== Function today real ==================
					function today_real()
					{
						$year  = date('Y');
						$month = date('m');
						$day   = date('d');
						
						
						$Hour = date('H');
						$Min  = date('i');
						$Year = date('s');
						
						$str_date = $year."-".$month."-".$day;
						$str_time = $Hour.":".$Min.":".$Year;
						
						$combine = $str_date." ".$str_time;
						
						return $combine; 
					}
					
					// Function plus one for update number of read
					function plus_one($table,$condition,$point)
					{
						$tel_max = "select * from $table where $condition order by $point DESC LIMIT 0,1";
						$get_max = mysql_query($tel_max);
						
						while($rs_max = mysql_fetch_array($get_max)){
							$max = $rs_max[$point];
						}
	
						$plus = $max + 1;
						
						$sql = "UPDaTE $table SET $point = $plus where $condition";
						$result = mysql_query($sql);
					}
					
					// Function auto_rank with condtion
					function auto_rank_condition($table,$where,$point)
					{
					
						$tel = "select * from $table where $where order by $point DESC LIMIT 0,1";
						$get = mysql_query($tel);
						
						while($rs = mysql_fetch_array($get)){
							$max_rank = $rs[$point];
						}
						
						$next_rank = $max_rank + 1;
						
						return $next_rank; 
					}
					
					// Function Random String 4-1-2555
					function random_char($len)
					{
						$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
						$ret_char = "";
						$num = strlen($chars);
						for($i = 0; $i < $len; $i++)
						{
							$ret_char.= $chars[rand()%$num];
							$ret_char.=""; 
						}
						return $ret_char; 
					}
					
					
					// Function Diff
					function DateDiff($strDate1,$strDate2)
	 				{
						return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 				}
					
					
					// Function dateform
					function dateform($getdate){
						$date  = substr($getdate,8,2);
						$month = substr($getdate,5,2);
						$year  = substr($getdate,0,4);
						$str_date = $date."-".$month."-".$year;
						return $str_date;
					}
					
					
					// Function Delete Thumb && Image
					function delete_image($folder,$thumb,$image)
					{
						if($thumb !="" && $image !=""){
						$flgDelete_thumb = unlink("$folder/".$thumb."");
						$flgDelete_image = unlink("$folder/".$image."");
						
						if($flgDelete_thumb && $flgDelete_image){
							$result = "File Deleted";
						}
						else{
							$result = "File can not deleted";
						}
						return $result;
						}
					}
					
					
					// Function Delete Image
					function delete_one_image($folder,$image)
					{
						if($image !=""){
						
							$flgDelete_image = unlink("$folder/".$image."");
						
							if($flgDelete_image){
								$result = "File Deleted";
							}
							else{
								$result = "File can not deleted";
							}
							
							return $result;
						}
					}
					
					
					// Function Insert
					function insert($field,$value,$table)
					{
						$sql = "INSERT INTO $table ($field) VaLUES ($value)";
						//echo $sql;
						$result= mysql_query($sql);
						return $result;
					}
							
							
					// Function Delete 
					function delete($table,$condition)
					{
						$sql ="delete from $table $condition";
						$result = mysql_query($sql);
						return $result;
					}
					
							
					// Function Update
					function update($table,$command,$condition)
					{
						$sql = "UPDaTE $table SET $command $condition";
						$result = mysql_query($sql);
						return $result;
					}
					
							
					// Function Select		
					function select($table,$condition)
					{
						$sql = "select * from $table $condition";
						//echo $sql;
						$dbquery = mysql_query($sql);
						$result= mysql_fetch_array($dbquery);
						return $result;
					}
					
					
					// Function Select Alldate	
					function selectalldate($table,$condition,$listby)
					{
						$sql = "select * from  $table  $condition $listby";
						//echo $sql;
						$dbquery = mysql_query($sql);
						return $dbquery;	
					}
					
									
					// Function Select MaxorMin
					function selectMaxOrMin($maxormin,$field,$table,$condition)
					{
						$sql = "select $maxormin($field) as $field from $table $condition";
						$dbquery = mysql_query($sql);
						$result= mysql_fetch_array($dbquery);
						return $result;
					}
					
							
					// Function Select First or Last 
					function selectFistOrLast($table,$condition,$fieldlist,$bylist)
					{
						$sql 	 = "select * from $table $condition order by $fieldlist $bylist";
						$dbquery = mysql_query($sql);
						$result	 = mysql_fetch_array($dbquery);
						return $result;
					}
					
					
					// Function Check Charactor
					function checkcharector($temp)
					{
						$temp=Trim(eregi_replace ( "'" , "" , $temp));
						$temp=Trim(eregi_replace ( "\"" , "&quot;" , $temp));
						return $temp;
					}
																				
					
					// Function Check Num Record		
					function num_record($table,$condition)
					{
						$sql = "select * from $table $condition";
						$dbquery = mysql_query($sql);
						$num_rows = mysql_num_rows($dbquery);
						return $num_rows;
					}
					
					
					// Function Check Null Value		
					function JscheckValueNull($form,$field,$msg)
					{
						echo"\nif(trim(document.$form.$field.value)=='')\n";
						echo"{\n";
						echo"alert('$msg');\n";
						echo"document.$form.$field.focus();\n";
						echo"return false;\n";
						echo"}\n\n";
					}
?>