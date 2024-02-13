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
				Welcome :: <?=$_SESSION["str_admin_us"]?> 
			</span>
			
		</div>
		<div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			<form name="logout" method="post" action="">
				<input type="hidden" name="logout" value="true">
			    <input type="submit" name="Submit" value="Log Out" style="width:150px;"/>
		  	</form>
			</span>
		</div>
		<div class="clear"></div>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<hr/>
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> About Us</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="about_detail.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Detail</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="about_our_house.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Our House</a>
			</span>
		</div>
        <div class="clear"></div>
		
		
		
		
		<!--
		<div class="box1">
			<span class="txt">
			   <a href="excel_list.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Import as excel</a>
			</span>
		</div>
        <div class="clear"></div> -->
		
		<hr/>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> Portfollio</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="port_tvc_company.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>TVC</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="port_tvc_company.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Print Ads</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="port_tvc_company.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Radio</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="port_tvc_company.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Graphic Designs</a>
			</span>
		</div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="port_tvc_company.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Event</a>
			</span>
		</div>
        <div class="clear"></div>

		
		<hr/>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<!--------------------------------------------------------------------------------------------------------- -->
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> Client List</span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <a href="client_list_detail.php"><img src="images/plus_16.png" width="16" height="16" border="0"/>Detail</a>
			</span>
		</div>
        <div class="clear"></div>
		
		
		<hr/>
		<!--------------------------------------------------------------------------------------------------------- -->
		
		
		<!--------------------------------------------------------------------------------------------------------- -->
		
		<div class="box1">
			<span class="txt">
				<img src="images/promotion.gif" width="16" height="16" /> Contact </span>		
		    <span class="txt"><img src="images/promotion.gif" width="16" height="16" /></span></div>
        <div class="clear"></div>
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="contact_address.php">Address</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="contact_map.php">Map</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		<div class="box1">
			<span class="txt">
			   <img src="images/plus_16.png" width="16" height="16" /><a href="contact_join.php">Join Us</a>
			</span>
		</div>
		<div class="clear"></div> 
		
		
	</div>
	
  	</div>
	

