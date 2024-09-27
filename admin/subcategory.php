<?php
include "../admin/components/head.php";
include "connection.php";

	if(isset($_GET['delete']))
	{
		$del="delete from subcategory where s_id=".$_GET['delete'];
		$rs=mysql_query($del);
	}
	$c_id= $_GET['c_id'];
?>
<br /><br /><br /><br /><br /><br />


<table align="center" border="1" cellpadding="6" width="40%">
<tr>
<td colspan="5" align="right">
<a href="add_subcategory.php?c_id=<?php echo $c_id; ?>" style="font-size:18px">Add New SubCategory</a>

	
    </td>
</tr>
<?php
$sel = mysqli_query($db,"select * from subcategory where c_id= $c_id");
while($prods=mysqli_fetch_array($sel))
{
?>
<tr>
<td><?php echo $prods['s_id']; ?></td>
<td><img src="../admin/images/<?php echo $prods['s_img']; ?>." alt="Img" width="100" height="100"></td>
<td><a href="product.php?s_id=<?php echo $prods['s_id'];?>"  style="font-size:22px"><?php echo $prods['s_nm']; ?></a></td>

<td height="80" width="80"><a href="edit_subcategory.php?c_id=<?php echo $c_id .' '.'& s_id='.$prods['s_id'];  ?> " style="font-size:18px">Edit</a></td>

<td><a href="subcategory.php?c_id=<?php echo $c_id .' '.'& delete='.$prods['s_id'];  ?> "style="font-size:18px">delete</a></td>		
		</tr>
		
	
 <?php }?>
 </table>
 <?php 
	
?>
<?php include "../admin/components/footer.php";