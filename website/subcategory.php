<?php 
include "header.php";
include "connection.php";
session_start();

if(isset($_GET['c_id']))
$c_id=$_GET['c_id'];
?>
            
<div id="tooplate_main">
<table align="center" style="margin-left:60px">
	<tr>
    	<td colspan="6" align="left" height="5">
		<img src="images/<?php echo $cat['s_img']; ?>." onclick="tmp()" height="65" width="65"/></td>
   	</tr>
	
	<?php
	$sel = mysqli_query($db,"select * from subcategory where c_id=".$c_id);
	$count=1;
	while($prods=mysqli_fetch_array($sel))
	{
		if($count>2)
		{
	?>
	<tr>
		<?php
			$count=1;
		}
		?>

	<td align="center"  style="padding-right:15px;padding-left:15px;paddind-top:15px">
	<a href="product.php?s_id=<?php echo $prods['s_id'];?>">
	<img src="images/<?php echo $prods['s_img']; ?>." alt="Img" width="280" height="300"><br/></a>

	<a href="product.php?s_id=<?php echo $prods['s_id'];?>" style="font-size:24px"> 
	<?php echo $prods['s_nm'] ; ?><br /><br /></a>
	</td>

	<td>						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	
	<?php 
	$count++;
	}
	?>
	
	</tr>

	<tr>
		<td><br /><br /><br /><br /><br /><br /><br /><br /><br /></td>																					
	</tr>
</table>

<script>
	function tmp()
	{
		history.back();
	}	
</script>

<?php 
 include "footer.php";
 
 ?>