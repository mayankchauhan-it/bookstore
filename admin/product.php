<?php 
include "../admin/components/head.php";
include "../admin/connection.php";
	
if (isset($_GET['delete'])) {
    $i_id = intval($_GET['delete']); // Sanitize input
    $del = "DELETE FROM items WHERE i_id = $i_id";
    mysqli_query($db, $del); // Include the database connection
}
$s_id = intval($_GET['s_id']); // Sanitize the subcategory ID
?>

<style>
    table {
        width: 80%; /* Set the table width */
        margin: 20px auto; /* Center the table */
        border-collapse: collapse; /* Merge borders */
        font-family: Arial, sans-serif; /* Set the font */
    }
    th, td {
        border: 1px solid #ddd; /* Cell borders */
        padding: 10px; /* Cell padding */
        text-align: center; /* Center align text */
    }
    th {
        background-color: #0d6efd; /* Header background color */
        color: white; /* Header text color */
    }
    tr:nth-child(even) {
        background-color: #f2f2f2; /* Alternate row color */
    }
    tr:hover {
        background-color: #ddd; /* Hover effect for rows */
    }
    a {
        text-decoration: none; /* Remove underline from links */
        color: #000; /* Link color */
    }
    a:hover {
        text-decoration: underline; /* Underline on hover */
    }
    img {
        border-radius: 5px; /* Rounded corners for images */
    }
</style>

<br /><br /><br /><br /><br /><br />

<table align="center">           
    <tr>
        <td colspan="5" align="right" height="50">
            <a href="add_product.php?s_id=<?php echo $s_id; ?>" style="font-size:18px">Add New Product</a>
        </td>
    </tr>
    <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $sel = mysqli_query($db, "SELECT * FROM items WHERE s_id = $s_id");

    while ($prods = mysqli_fetch_array($sel)) {
    ?>
    <tr>
        <td height="80" width="70">
            <img src="../admin/images/<?php echo htmlspecialchars($prods['i_image']); ?>" alt="Img" width="120" height="180">
        </td>	
        <td height="80" width="100" style="font-size:18px">
            <?php echo htmlspecialchars($prods['i_nm']); ?>
        </td>	
        <td height="80" width="70" style="font-size:18px">
            <?php echo htmlspecialchars($prods['i_price']); ?>
        </td>
        <td><a href="edit_product.php?s_id=<?php echo $s_id .'&i_id='. htmlspecialchars($prods['i_id']); ?>" style="font-size:18px">Edit</a></td>
        <td><a href="product.php?s_id=<?php echo $s_id .'&delete='. htmlspecialchars($prods['i_id']); ?>" style="font-size:18px" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a></td>									    
    </tr>
    <?php } ?>
</table>

<?php include "../admin/components/footer.php"; ?>
