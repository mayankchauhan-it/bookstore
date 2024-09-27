
<?php
include "../website/header.php";
include "../website/connection.php";
session_start();
?>
<div id="tooplate_main">
<table align="center" style="margin-left:60px">
<tr>
	<th colspan="6">
		<h1 align="center">CATEGORY</h1>
	</th>
</tr>
	<?php
		$sel = mysqli_query($db,"select * from category");
		$count=1;
		while($cat=mysqli_fetch_array($sel))
		{
		if($count>2)
		{
	?>
	</tr>
	<tr>
	<?php
		$count=1;
		}
	?>
		<td width="120px">	

		<a href="subcategory.php?c_id=<?php echo $cat['c_id'];?>"style="font-size:32px"><img src="images/<?php echo $cat['c_image']; ?>." alt="Img" width="280" height="300" /><br />
	
		
	<?php 
		echo "<span><center>".$cat['c_nm']."</span></center><br><br>";
	?></a>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
		</td>
		
	
  	<?php
		$count++;
		}//end of while
	?>
	</tr>
	
	<?php 
		
	?>
	<tr><td><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></td></tr>
</table>


<?php
include "footer.php";
?>
</body>
</html>