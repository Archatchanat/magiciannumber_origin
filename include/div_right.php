<img src="images/yell_07.png" width="260" height="24" />

<script language="JavaScript">
	function checkvalue(){
		if(form1.mobile_number.value == "") {
			alert("โปรดระบุ หมายเลขโทรศัพท์ของท่าน");
			form1.mobile_number.focus();
			return false
		}
		
		if(form1.mobile_number.value.length < 10){
			alert("โปรดระบุ หมายเลขโทรศัพท์ของท่านให้ครบ 10 หลัก");
			form1.mobile_number.focus();
			return false
		}
		
		return true;
	}
	
	function chkSubmit()
	{
		 if(isNaN(document.form1.mobile_number.value))
		 {
			alert('โปรดระบุ เพียงตัวเลข');
			document.form1.mobile_number.value=""
			return false;
		 }
	}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10">&nbsp;</td>
    <td><div id="text_white2"><strong>ทำนายเบอร์โทรศัพท์</strong></div></td>
  </tr>
	<form name="form1" method="post" action="result_number.php" enctype="multipart/form-data" onSubmit="return checkvalue()">
  	<tr>
    	<td width="10">&nbsp;</td>
    	<td align=""><input name="mobile_number" type="text" maxlength="10" onKeyUp="chkSubmit()" value=""/></td>
  	</tr>
  	<tr>
    	<td colspan="2" style="padding:5px;">
			&nbsp;
			<input type="image" src="images/magic_16.png" name="click_login" id="click_login" value="Submit"/>
		</td>
  	</tr>
	</form>
  
  <tr>
    <td colspan="2"><img src="images/yell_07.png" width="260" height="24" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div id="text_white2"><strong>เบอร์ตามหมวดหมู่อาชีพ</strong></div></td>
  </tr>
  	<tr>
  		<td colspan="2">&nbsp;</td>
	</tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<div id="text_white">
			
			<?
				$tel_job = "select * 
				           	  from   job_category
						   	  where  1=1 order by cat_title ASC";
				$get_job = mysql_query($tel_job);
				while($rs_job = mysql_fetch_array($get_job))
				{
			?>
				<fieldset style="padding:3px;">
			
				<a href="job_number.php?cat_id=<?=$rs_job['cat_id']?>">
					<?
					if($_GET['cat_id']==$rs_job['cat_id']){
				?>
				<font color="#FFCC33">
				<?
					}
				?>
					- <?=$rs_job['cat_title']?>
					</font>
					
				</a>
				
				</fieldset>
				<br/>
			<?
				}
			?>
		</div>
	</td>
  </tr>
  
  <!--<tr>
    <td colspan="2"><img src="images/yell_07.png" width="260" height="24" /></td>
  </tr> -->
 <!-- <tr>
    <td>&nbsp;</td>
    <td><div id="text_white2"><strong>เมนูรายการเบอร์</strong></div></td>
  </tr> -->
  <!--<tr>
    <td>&nbsp;</td>
    <td><div id="text_white">• รายการเบอร์ทั้งหมด •
<br /><a href="#">เบอร์ทั้งหมด เรียงตามราคา</a>
<br /><a href="#">เรียงตามเลขหมวด 081 - 089</a>
<br /><a href="#">เบอร์คู่ 1ใน10ล้าน 7ตัวหลังเหมือน</a>
<br /><a href="#">เบอร์คู่ 1 ในล้าน 6 ตัวหลังเหมือน</a>
<br /><a href="#">เบอร์โฟร์ เลขสี่ตัวท้ายเหมือนกัน</a>
<br /><a href="#">เบอร์โฟร์หน้า เลขสี่ตัวหน้าเหมือนกัน</a>
<br /><a href="#">เบอร์สองตอง มีสองตองในเบอร์</a>
<br /><a href="#">เบอร์ที่มีเลขเพียง 2 ตัวทั้งเบอร์</a>
<br /><a href="#">เบอร์มีเลข 2 ตัวใน 7 ตัวสุดท้าย</a>
<br /><a href="#">เบอร์เลขสูง เบอร์ที่มีเลข 7 8 9 </a>
<br /><a href="#">เบอร์สี่คู่</a>
<br /><a href="#">เบอร์สองชุด</a>
<br />
<a href="#">เบอร์ตองหลัง มีเลขตองด้านหลัง
</a><br />
<a href="#">เบอร์ที่มีเลข 3 ตัวทั้งเบอร์
</a><br />
<a href="#">เบอร์คู่ 5 ตัวหลังเหมือนกัน
</a><br />
<a href="#">เบอร์ 4 ตัวหลังเหมือนกัน</a><br />
<a href="#">เบอร์ 9 ตัวหน้าเหมือนกัน
</a><br />
<a href="#">เบอร์ 8 ตัวหน้าเหมือนกัน</a></div></td>
  </tr> -->
  <!--<tr>
    <td colspan="2"><img src="images/yell_07.png" width="260" height="24" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div id="text_white2"><strong>เรื่องทั่วไป</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<div id="text_white">
				<?
					$tel_text3 = "select * 
				           		from   text3
						   		where  1=1 order by text_id ASC";
					$get_text3 = mysql_query($tel_text3);
					while($rs_text3 = mysql_fetch_array($get_text3))
					{
				?>
						<a href="text_detail3.php?text_id=<?=$rs_text3['text_id']?>">
							- <?=$rs_text3['text_title']?>
						</a><br/>
				<?
					}
				?>
				<div class="linkbox2">
				<strong><a href="text_list3.php">อ่านกระทู้อื่นๆ...</a></strong>
			</div>
		</div>
	</td>
  </tr>
  <tr>
    <td colspan="2"><img src="images/yell_07.png" width="260" height="24" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<div id="text_white2">
			<strong>
				สาธารณประโยชน์
			</strong>
		</div>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div id="text_white"><?
					$tel_text4 = "select * 
				           		from   text4
						   		where  1=1 order by text_id ASC";
					$get_text4 = mysql_query($tel_text4);
					while($rs_text4 = mysql_fetch_array($get_text4))
					{
				?>
						<a href="text_detail4.php?text_id=<?=$rs_text4['text_id']?>">
							<?=$rs_text4['text_title']?>
						</a> |
				<?
					}
				?></div></td>
  </tr>
  <tr>
  	<td colspan="2">&nbsp;</td>
  </tr> -->
  <tr>
  	<td colspan="2" align="center">
		<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27 type=%27text/javascript%27%3E%3C/script%3E"));</script>
<a href="http://www.histats.com" target="_blank" title="how to add a hit counter to a website" ><script  type="text/javascript" >
try {Histats.start(1,1595455,4,426,112,75,"00011111");
Histats.track_hits();} catch(err){};
</script></a>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?1595455&101" alt="how to add a hit counter to a website" border="0"></a></noscript>
<!-- Histats.com  END  -->
	</td>
  </tr>
</table>
