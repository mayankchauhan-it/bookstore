<?php
include "../admin/components/head.php";
include "../website/connection.php";
echo $Name = $_REQUEST['name'];
echo $c_id = $_REQUEST['c_id'];
	
	
	$path = $_FILES['image']['name'];
	echo $path;
	if($path!="")
	{
	//echo "hello";
	//$new_file_name=$Name.".";
	//$path="image/".$new_file_name; 
	
	$new_file_name=$path;
	$path= "../admin/images/".$path; 

move_uploaded_file($_FILES['image'] ['tmp_name'],$path);
	}
		
	
	
if(isset($_POST['submit']))
{
	
$insert=(mysqli_query($db,"insert into subcategory(c_id,s_nm,s_img)values('$c_id','$Name','$new_file_name')"));
		if($insert)
			$msg='Subcategory has been added successfully';
		else
			$msg='Subcategory has not been added successfully';
	}
	
	header("Location:subcategory.php?msg=$msg & c_id=$c_id");
?>
<?php
include "footer.php";
?>