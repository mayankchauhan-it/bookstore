<?php
//include "header.php";
include "connection.php";?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" />

<link href="style.css" media="screen" title="shadow" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 600, //animation speed
			bg_alpha: 0.5, //background opacity
			radius: 4, //caption rounded corner
			scrollImage : false, // true == image follows the page, false == image remains in the same open position
			pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
			pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
			close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
			slideShow : 'slideshow', // just delete slideshow between '' if you don't want it.
			slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
	});
});
</script>
<?php
session_start();
$s_id=$_GET['s_id'];
?>

<div id="product-box">    
<table align="left" style="margin-left:60px">
	<tr>
    	<td colspan="3" align="left" height="50">
		<img src="images/<?php echo $cat['s_img']; ?>." onclick="tmp()" height="65" width="65"/>
		</td>
	</tr>
    <tr>
<?php

$sel = mysqli_query($db,"select * from items where s_id=$s_id");
$count=1;
while($prods=mysqli_fetch_array($sel))
{	
//$cnt = 0;
if($count>4)
{
?>
<tr>
<?php
$count=1;
}
	
?>
	
<td style="padding-left:15px;">
	<!--	<div id="gallery">
        	<div class="gallery_box">-->
<a class="pirobox" href="images/<?php echo $prods['i_image']; ?>" >
<img src="images/<?php echo $prods['i_image']; ?>" alt="img" height="300" width="280">
<br />
</a>
        	 
<div style="font-size:24px"> 
<?php echo $prods['i_nm'] ;?><br />
<?php echo "price:".$prods['i_price']; ?><br />
<?php if(isset($_SESSION['u_nm']))
	echo "<a href='cart.php?i_id=".$prods['i_id']."'>Add to Cart</a>";?>

<!--              <a href= "cart1.php?i_id= -->
<?php /* echo $prods['i_id'];*/ ?>
<!--" style="font-size:24px">    Add To Cart           
</a>-->
</div>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
               
		 <!-- 	</div>
          </div> -->
		  			
			<?php 
		  	$count++;
			}//end of while							
			?>	
					
</tr><tr><td><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></td></tr>
		</table>
<script>
	function tmp()
	{
		history.back();
	}	
</script>
	</div>	
<?php
include "footer.php";

?>
