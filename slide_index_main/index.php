<?
	require("../connect/connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lof JSliderNews 1.0 - Jquery 1.3</title>
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){	
		var buttons = { previous:$('#lofslidecontent45 .lof-next') ,
						next:$('#lofslidecontent45 .lof-previous') };
						
		$obj = $('#lofslidecontent45').lofJSidernews( { interval : 4000,
												direction		: 'opacitys',	
											 	easing			: 'easeInOutExpo',
												duration		: 1200,
												auto		 	: true,
												maxItemDisplay  : 4,
												navPosition     : 'horizontal', // horizontal
												navigatorHeight : 15,
												navigatorWidth  : 20,
												mainWidth:690,
												buttons			: buttons} );	
	});
</script>

</head>
<body>
	<div id="container">
          
<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="lofslidecontent45" class="lof-slidecontent" style="width:690px; height:323px;">
<div class="preload"><div></div></div>
 <!-- MAIN CONTENT --> 
  <div class="lof-main-outer" style="width:690px; height:323px;">
  	<ul class="lof-main-wapper">
    	<?
		$count = 0;
		$tell_slide = "SELECT * FROM slide_main ORDER BY slide_id ASC LIMIT 0,23";
		$get_slide = mysql_query($tell_slide);
		
		while($rs_slide = mysql_fetch_array($get_slide))
		{
		$count++
		?>
			<li><img src="../picture_slide/<?=$rs_slide['slide_picture']?>" title="Newsflash 2" width="690px" height="323px" /></li>
		<?
			}
		?>
  		
      </ul>  	
  </div>
  <!-- END MAIN CONTENT --> 
    <!-- NAVIGATOR -->
    <div class="lof-navigator-wapper">
    	<div onclick="return false" href="" class="lof-next">Next</div>
          	<div class="lof-navigator-outer">
                <ul class="lof-navigator">
                	<?
					for($i = 0; $i<$count; $i++){
						echo "<li>".($i+1)."</li>";
					}
					?>      		
                </ul>
          	</div>
       		<div onclick="return false" href="" class="lof-previous">Previous</div>
     </div> 
  <!----------------- --------------------->
 </div> 
<script type="text/javascript">

</script>

<!------------------------------------- END OF THE CONTENT ------------------------------------------------->

</body>
</html>
