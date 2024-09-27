<?php
include "../admin/components/head.php";
include "connection.php";
if(isset($_GET['s_id']))
$s_id= $_GET['s_id'];
?>
<form action="save_product.php?s_id=<?php echo $s_id; ?>" method="post" enctype="multipart/form-data" ><br />
<br /><br /><br /><br /><br />

<table align="center" border="1" cellpadding="4">
<tr>
<td colspan="3" align="right" height="50">
<?php 
if(isset($_GET['msg']))
echo $_GET['msg'];?>
<input type="button" name="b1" onclick="tmp()" style="background-color:#999"value="Back" style="font-size:18px"/></td>
</tr>
            
<tr>
<td height="50" style="font-size:18px">Item Name : </td>
<td><input type="text" name="name" size="27" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Item Image : </td>
<td><input type="file" name="image" style="font-size:18px"/></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Item Price : </td>
<td><input type="text" name="price" size="27" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Item Quantiry : </td>
<td><input type="text" name="qty" size="27" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px"> </td>
<td><input type="submit" name="submit" value="save"  style="font-size:18px" /></td>
</tr>
</table>
<script>
	function tmp()
	{
		history.back();
	}	
</script>
</form>
<?php include "../admin/components/footer.php";