<?php
include "connection.php";
include "../admin/components/head.php";


	if(isset($_GET['delete']))
	{
		$del="delete from bill where u_id=".$_GET['delete'];
		$rs=mysql_query($del);
	}

?>


<div id="contents">
		<div id="adbox">
			<!--	<img src="image/1624390.jpg" alt="Img" height="600" width="1258">--><br />
<br /><br /><br /><br /><br />


		<form action="" method="post">
        <?php
		if(isset($_GET['msg']))
			echo $_GET['msg'];
			?>  			
			<table align="center" border="1" >
	<tr>
		<th>Bill ID</th>
		<th>User ID</th>
		<th>Item ID</th>
		<th>Item Name</th>
		<th>Item Price</th>
		<th>Checkout ID</th>
		<th>Delete</th>
	</tr>
	<?php
		$sel = mysqli_query($db,"select * from bill");
		
		while($res=mysqli_fetch_array($sel))
		{
	?>
	<tr>
		<td><?php echo $res['b_id']; ?></td>
		<td><?php echo $res['u_id']; ?></td>
		<td><?php echo $res['i_id']; ?></td>
		<td width="50"><?php echo $res['i_nm']; ?></td>
		<td width="50"><?php echo $res['i_price']; ?></td>
		<td width="50"><?php echo $res['c_id']; ?></td>
		<td><a href="billing.php?delete=<?php echo $res['u_id']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
	</table>
	</form>
	</div></div>
			<br />
<br />

	

