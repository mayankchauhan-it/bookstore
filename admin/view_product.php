<?php
include "../admin/components/head.php";
include "../admin/components/sidebar.php";
include "connection.php";

	if(isset($_GET['delete']))
	{
		$del="delete from category where c_id=".$_GET['delete'];
		$rs=mysqli_query($del);
	}
?>
<br /><br /><br /><br /><br />

<table align="center" cellpadding="6" border="1" height="" width="400">
<tr>
<td colspan="5" align="right">
<a href="add_product.php" style="font-size:18px">Add New Category</a>
</td>
</tr>
<br />
<?php
$sel = mysqli_query($db,"select * from category");
while($prods=mysqli_fetch_array($sel))
{
?>
<tr>
		
			<td style="font-size:25px"><?php echo $prods['c_id']; ?></td>
            
			<td><img src="../admin/images/<?php echo $prods['c_image']; ?>." alt="Img" width="200" height="200"></td>

			<td><a href="../admin/subcategory.php?c_id=<?php echo $prods['c_id']; ?>"  style="font-size:25px"><?php echo $prods['c_nm']; ?></a></td>
<td height="80" width="80"><a href="edit_category.php?c_id=<?php echo $prods['c_id']; ?>" style="font-size:18px">Edit</a></td>
<td><a href="../website/category.php?delete=<?php echo $prods['c_id'];  ?>" style="font-size:18px">delete</a></td>
		</tr>
		
	
 <?php } 

	
?>

</table><br /><br /><br /><br /><br /><br /><br />




