<?php
include "../admin/components/head.php";
include "connection.php";

$i_id = $_GET['i_id'];
if ($i_id != "") {
    $sel = mysqli_query($db, "SELECT * FROM items WHERE i_id = $i_id");
    while ($prods = mysqli_fetch_array($sel)) {
        $i_nm = $prods['i_nm'];
        $i_id = $prods['i_id'];
        $s_id = $prods['s_id'];
        $i_image = $prods['i_image'];
        $i_price = $prods['i_price'];
        $tot_qty = $prods['tot_qty'];
    }
}    

if (isset($_POST['submit']) && $_POST['submit'] == "update") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $path = $_FILES['image']['name'];

    if ($path != "") {
        $new_file_name = $path;
        $path = "../admin/images/" . $path; 
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
    } else {
        $new_file_name = $_POST['h1'];
    }

    $upd = "UPDATE items SET i_image='$new_file_name', i_nm='$name', i_price='$price', tot_qty='$qty' WHERE i_id=$i_id";
    mysqli_query($db, $upd); // Include the database connection here
    header("Location: product.php?s_id=$s_id");
    exit(); // Always call exit after header redirection
}
?>
<br /><br /><br /><br /><br /><br />

<form action="" method="post" enctype="multipart/form-data">
<table align="center" border="1">

<tr>
<td colspan="3" align="right" height="50">
<?php 
if (isset($_GET['msg'])) {
    echo $_GET['msg'];
}
?>
<input type="button" name="b1" onclick="tmp()" style="background-color:#999" value="Back" style="font-size:18px"/>
</td>
</tr>
            
<tr>
<td height="50" style="font-size:18px">Item Name:</td>
<td><input type="text" name="name" size="27" value="<?php echo htmlspecialchars($i_nm); ?>" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Item Image:</td>
<td>
<img src="../admin/images/<?php echo htmlspecialchars($i_image); ?>" height="100" width="100" />
<input type="hidden" name="h1" value="<?php echo htmlspecialchars($i_image); ?>" />
<br />
<input type="file" name="image" style="font-size:18px" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Item Price:</td>
<td><input type="text" name="price" size="27" value="<?php echo htmlspecialchars($i_price); ?>" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px">Item Quantity:</td>
<td><input type="text" name="qty" size="27" value="<?php echo htmlspecialchars($tot_qty); ?>" /></td>
</tr>

<tr>
<td height="50" style="font-size:18px"></td>
<td><input type="submit" name="submit" value="update" style="font-size:18px" /></td>
</tr>

</table>
<script>
function tmp() {
    history.back();
}	
</script>
</form>
<?php include "../admin/components/footer.php"; ?>
