<?php
include "../admin/components/head.php";
include "connection.php";

$c_id = $_GET['c_id'];
if ($c_id != "") {
    $sel = mysqli_query($db, "SELECT * FROM category WHERE c_id = $c_id");
    while ($prods = mysqli_fetch_array($sel)) {
        $c_nm = $prods['c_nm'];
        $c_image = $prods['c_image'];
    }
}    

if (isset($_POST['submit']) && $_POST['submit'] == "update") {
    $name = $_POST['name'];
    $path = $_FILES['image']['name'];
    
    if ($path != "") {
        $new_file_name = $path;
        $path = "../admin/images/" . $path; 
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
    } else {
        $new_file_name = $_POST['h1'];
    }

    // Make sure to update the correct table and use existing variables appropriately
    $upd = "UPDATE category SET c_image='$new_file_name', c_nm='$name' WHERE c_id=$c_id";
    
    // Ensure $db is defined
    if (mysqli_query($db, $upd)) {
        header("Location:view_product.php?s_id=$s_id");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table align="center" border="1">
<tr>
    <td colspan="3" align="right" height="50">
        <?php if (isset($_GET['msg'])) echo $_GET['msg']; ?>
        <input type="button" name="b1" onclick="tmp()" style="background-color:#999" value="Back" style="font-size:18px"/>
    </td>
</tr>
<tr>
    <td height="50" style="font-size:18px">Name:</td>
    <td><input type="text" name="name" size="27" value="<?php echo htmlspecialchars($c_nm); ?>" /></td>
</tr>
<tr>
    <td height="50" style="font-size:18px">Image:</td>
    <td>
        <img src="../admin/images/<?php echo htmlspecialchars($c_image); ?>" height="100" width="100" />
        <input type="hidden" name="h1" value="<?php echo htmlspecialchars($c_image); ?>" />
        <br />
        <input type="file" name="image" style="font-size:18px"/>
    </td>
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
