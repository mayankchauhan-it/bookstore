<?php
include "../admin/components/head.php";
include "connection.php";
$Name = $_REQUEST['name'];
$qty = $_REQUEST['qty'];
echo $Name."<br>";
	
$s_id=$_REQUEST['s_id'];
echo $s_id."<br>";
	
$price=$_REQUEST['price'];
echo $price."<br>";
	
$path = $_FILES['image']['name'];
echo $path."<br>";
	
	if($path!="")
	{
	
	$new_file_name=$path;
	$path= "../admin/images/".$path; 
	
	//$new_file_name=$path;
	//$path1= "image/".$new_file_name; 
	//$img=$new_file_name;

move_uploaded_file($_FILES['image']['tmp_name'],$path);
	}
			
if(isset($_POST['submit']))
{


$insert=(mysqli_query($db,"insert into items(i_nm,s_id,i_image,i_price,i_qnt,tot_qty) values('$Name',$s_id,'$new_file_name',$price,1,$qty)"));
		if($insert)
			$msg='Item has been added successfully';
		else
			$msg='Item has not been added successfully';
	}
	
	header("Location:view_product.php?msg=$msg & s_id=$s_id");
?>
<?php 
include "../admin/components/footer.php";?>