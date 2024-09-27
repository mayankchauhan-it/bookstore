<?php
session_start();
include "../website/connection.php";
include "../website/header.php";
?>
<?php

	if(isset($_POST['s1']))
	{
	$msg=" ";
	//p1 is an array of products added by user into the cart
	$arr = $_POST['p1'];
		/*foreach($arr as $key=>$value)
		{
		echo $key . "   ";
		}
		exit;*/
	foreach ($arr as $key => $value)
		{
			$cart="select i_id from cart where c_id=".$key;
			$tmp=mysqli_query($cart);
			$tmp1=mysqli_fetch_row($tmp);
			$item="select * from item where i_id=".$tmp1[0];
			$item1=mysqli_query($item);
			$item2=mysqli_fetch_row($item1);
			if($value>$item2[6])
			{
			$msg=$msg."<br><h3 align='center'>only $item2[6] $item2[2] is available</h3>";
			}
			else
			{
			//$msg="";
			$upd="update cart set i_qnt=".$value." where c_id=".$key;
			mysqli_query($upd);				
			}
		}
	}
	if(isset($_GET['i_id']))
	{
		$i_id=$_GET['i_id'];
	}
	if(!isset($_POST['s1']))
	{
	if(isset($_GET['i_id']))
			{
		if(!isset($_GET['msg']))
//if(!$_GET['msg'])
		{
	//to fetch item from item table
			
			$sql="select * from items where i_id=$i_id";
			$res = mysqli_query($sql);
			$row = mysqli_fetch_row($res);
			
//echo $res;
		}
//to fetch userid from user table
		$sql1="select * from user where u_nm='".$_SESSION['u_nm']."'";
		$res1 = mysqli_query($sql1);
		$row1 = mysqli_fetch_row($res1); 
		$_SESSION['u_id'] = $row1[0] ;
        
 	
		if(!isset($_GET['msg']))
		{
		if($row[6]<=0)
		{
			$msg="<h3 align='center'>$row[2] is not available</h3>";
		}
		else
		{
		$msg="";
 $sql2 = "INSERT INTO cart(c_id,i_id,u_id,i_nm,i_price,i_image,i_qnt) VALUES ('".$row[0] ."','".$row1[0]."','".$row[2] ."','".$row[3] ."','". $row[4]."','".$row[5]."')";

			$res2 = mysqli_query($sql2);
			header("Location:../website/index.php");
		}
		}
	}
	}
 $q = "select * from cart where u_id = ".$_SESSION['u_id'];
 $r = mysqli_query($q);
 
?>
<form name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<table align="center" border="1" bordercolor="#333333"  cellpadding="5">
      
				<br><h3 align="center">Shopping Cart</h3></br>
                
  <!-- <table cellpadding="10" cellspacing="5" id="checkout">
<tr><td colspan="2"></td>-->

                       <tr>
                <td colspan="4" align="left" height="50">
<img src="images/ onclick="tmp()" height="65" width="65"/> 
<?php if(isset($msg))
		echo $msg;
	  if(isset($_GET['msg']))
	  	echo $_GET['msg'];
	  
	  ?>
  			 </tr>
   			
<tr>
	<td style="font-size:18px">Price</td>
	<td style="font-size:18px">Quantity</td>
	<td style="font-size:18px">Total</td>
	<td style="font-size:18px">Remove</td>
</tr>
        	

				
								
<?php
	$tot = 0;
	// while($result=mysqli_fetch_row($r))
	{ 
?>	
	<tr> 
	<td> 
	<img src="images/<?php echo $result[5]; ?>" alt="Img" width="150" height="150">
	
	</td> 
 	<td style="font-size:18px"> 	<?php
			// echo $result[3]."<br>";  
			// echo "Rs.: ".$result[4];
		?> 
	</td>
	
	<td align="center"><input type="text" size="3" value="<?php echo $result[6]; ?>" name="p1[<?php echo $result[0] ?>]" /></td>
	<td>
	
 	 <a href="delete1.php?c_id=<?php echo $result[0];?>"  style="font-size:18px"><?php echo "Remove";?></a> 
	</td>
	<?php 
	// $tot = $tot + $result[4]*$result[6]; ?>
	
<?php          
   } 
?>            
</head></body>

<tr>
<td style="font-size:18px"> Total payable amt: </td>
<td colspan="2" align="left"  style="font-size:18px"><?php echo "Rs.: ".$tot; ?> </td>
<td><input type="submit" name="s1" value="update" /></td>
</tr></tr>
    <tr><td colspan="3"><a href="checkout.php" style="font-size:22px">checkout</a></td></tr>

				</table>
				</form>
				
				

</div>
	</div>
	<div class="article">
</div>
</div>
<script>
	function tmp()
	{
		history.back();
	}	
</script>
<?php

 include "../website/footer.php";
 ?>
