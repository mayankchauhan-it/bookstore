<?php
include "../admin/components/head.php";
include "../website/connection.php";
if(isset($_GET['c_id']))
$c_id= $_GET['c_id'];
?>
<form action="../admin/save_subcatgory.php?c_id=<?php echo $c_id; ?>" method="post" enctype="multipart/form-data" ><br />
<br /><br /><br /><br /><br />

<table align="center" border="1" cellpadding="4">
<tr>
		<td colspan="2" align="right" height="50">
		<?php 
		if(isset($_GET['msg']))
		echo  $_GET['msg']; ?>
<input type="button" name="b1" onclick="tmp()" style="background-color:#999" value="Back" style="font-size:18px"/></td>			
</tr> 

<tr>
<td height="50" style="font-size:18px">Name : </td>
<td><input type="text" name="name" size="27"  /></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Image : </td>
<td><input type="file" name="image"  style="font-size:18px"/></td>
</tr>

<tr>
<td height="25"> </td>
<td><input type="submit" name="submit" value="save"  style="font-size:18px"/></td>
</tr>
</table>
</form>
<div class="article">
			  
  </div>
  <script>
	function tmp()
	{
		history.back();
	}	
</script>

<?php include "../admin/components/footer.php";?>