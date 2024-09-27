<?php
include "../admin/components/head.php";
include "connection.php";

	echo $Name = $_REQUEST['name'];
	$path = $_FILES['image']['name'];
	//echo $path;
	if($path!="")
	{
	//$new_file_name=$Name.".";
	//$path="image/".$new_file_name; 
	
	$new_file_name=$path;
	$path= "../admin/images/".$path; 
//	echo $path;
//	exit();

move_uploaded_file($_FILES['image'] ['tmp_name'],$path);
	}
		

if(isset($_POST['submit']))
{
	
$insert=(mysqli_query("insert into category(c_nm,c_image)values('$Name','$new_file_name')"));
		if($insert)
			$msg='Category has been added successfully';
		else
			$msg='Category has not been added successfully';
	}
	
	header("Location:view_product.php?msg=$msg");

<?php 
include "../admin/components/footer.php";?>
