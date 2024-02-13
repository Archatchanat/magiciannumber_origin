	<?
	if($_POST["logout"]=="true")
	{
		// logout
		session_destroy();

		echo "<script language=\"JavaScript\">";
		echo "window.location='index.php';";
		echo "</script>";
	}
	?>
	<div id="profile">
	
	<!---------------------------------------------------------------------------------------------------------------------------------- -->
	<div class="head">
    	<img src="images/customer.gif" style="margin-top:5px; vertical-align:baseline"> Menu List 
			<a href="home.php"><img src="images/large_folder-home-icon-128.png" width="20" height="20" border="0"/></a>		
	</div>

	<div class="panel">
	
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<div class="box1">
			<span class="txt">
				ยินดีต้อนรับ คุณ :: <?=$_SESSION["str_admin_us"]?> 
				<p align="center"><a href="change_password.php">[ เปลี่ยนรหัสผ่าน ]</a></p>
			</span>
			
		</div>
		<div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			<form name="logout" method="post" action="">
				<input type="hidden" name="logout" value="true">
			    <input type="submit" name="Submit" value="ออกจากระบบ" style="width:150px;"/>
		  	</form>
			</span>
		</div>
		<div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
				---------------------------
			</span>
		</div>
		<div class="clear"></div>
		
		
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" />จัดการเบอร์โทพศัพท์</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<!--<div class="box1">
			<span class="txt">
			   <a href="product_add_category.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>หมวดหมู่</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
		<div class="box1">
			<span class="txt">
			   <a href="product_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>เบอร์โทรศัพท์</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="payment.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>รายการชำระเงิน</a>
			</span>
		</div>
		
        <div class="clear"></div>
	
		<div class="box1">
			<span class="txt">
			   	<a href="new_reserve.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>รายการจองใหม่</a>
			</span>
		</div>
		
		<div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   	<a href="product_del.php"><img src="images/plus_16.png" width="16" height="16" border="0"/><font color="#FF0000">เบอร์โทรศัพท์ระงับ</font></a>
			</span>
		</div>
		
        
		
		<div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   	<a href="product_sale.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>เบอร์โทรศัพท์ที่ขายแล้ว</a>
			</span>
		</div>
		
		
		 <div class="clear"></div>
		
		<div class="clear"></div>
		
		
		
		
		<!--
		<div class="box1">
			<span class="txt">
			   <a href="excel_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Import as excel</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
		<div class="box1">
			<span class="txt">
				---------------------------
			</span>
		</div>
		<div class="clear"></div>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" />จัดการคำทำนาย</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="number_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>คำทำนาย</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="job_add_category.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>หมวดหมู่อาชีพ</a>
			</span>
		</div>
        <div class="clear"></div>
		
		
		
		<div class="box1">
			<span class="txt">
				---------------------------
			</span>
		</div>
		<div class="clear"></div>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> จัดการทั่วไป</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="forecast.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>ทำนายเบอร์โทร</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="about_us.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>เกี่ยวกับเรา</a>
			</span>
		</div>
        <div class="clear"></div>
		<!--
		<div class="box1">
			<span class="txt">
			   <a href="faqs.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>คำถามที่พบบ่อย</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
			<div class="box1">
			<span class="txt">
			   <a href="contact_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>ข้อมูลผู้มาติดต่อ</a>
			</span>
		</div>
        <div class="clear"></div>
		
		
		<div class="box1">
			<span class="txt">
			   <a href="webboard_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>กระดานสนทนา</a>
			</span>
		</div>
        <div class="clear"></div>
		
	
		
		
		<div class="box1">
			<span class="txt">
				---------------------------
			</span>
		</div>
		<div class="clear"></div>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> จัดการบทความ </span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<!--<div class="box1">
			<span class="txt">
			   <a href="text_add_category.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>เพิ่มหมวดหมู่บทความ</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
		<!--<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="text_list.php">รายการบทความ</a>
			</span>
		</div>
		<div class="clear"></div>  -->
		
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="text_list1.php">บทความ เด่น</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="text_list2.php">บทความ เบอร์</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="text_list3.php">บทความ ทั่วไป</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="text_list4.php">บทความ สาธารณ</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		
		
		<div class="box1">
			<span class="txt">
				---------------------------
			</span>
		</div>
		<div class="clear"></div>
		
		
		<!--------------------------------------------------------------------------------------------------------- -->
		
	<!--	<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> จัดการโปรโมชั่น</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div> -->
		
		<!--<div class="box1">
			<span class="txt">
			   <a href="promotion_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>เพิ่มโปรโมชั่น</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<!--<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> จัดการคำทำนาย</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div> -->
		
		<!--<div class="box1">
			<span class="txt">
			   <a href="number_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>คำทำนายตัวเลข</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		
		
		
	</div>
	
  	</div>
	

