<?php
include "../admin/components/head.php";
include "../admin/connection.php";

// Check if the delete parameter is set
if (isset($_GET['delete'])) {
    $s_id = intval($_GET['delete']); // Sanitize input
    $del = "DELETE FROM subcategory WHERE s_id = $s_id";
    mysqli_query($db, $del); // Include the database connection
}

// Sanitize the category ID input
$c_id = intval($_GET['c_id']);
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

<table>
    <tr>
        <td colspan="5" align="right">
            <a href="add_subcategory.php?c_id=<?php echo $c_id; ?>" style="font-size:18px">Add New SubCategory</a>
        </td>
    </tr>
    <tr>
        <th>Subcategory ID</th>
        <th>Image</th>
        <th>Subcategory Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $sel = mysqli_query($db, "SELECT * FROM subcategory WHERE c_id = $c_id");
    while ($prods = mysqli_fetch_array($sel)) {
    ?>
    <tr>
        <td><?php echo htmlspecialchars($prods['s_id']); ?></td>
        <td><img src="../admin/images/<?php echo htmlspecialchars($prods['s_img']); ?>" alt="Img" width="100" height="100"></td>
        <td><a href="product.php?s_id=<?php echo htmlspecialchars($prods['s_id']); ?>" style="font-size:22px"><?php echo htmlspecialchars($prods['s_nm']); ?></a></td>
        <td><a href="edit_subcategory.php?c_id=<?php echo $c_id . '&s_id=' . htmlspecialchars($prods['s_id']); ?>" style="font-size:18px">Edit</a></td>
        <td><a href="subcategory.php?c_id=<?php echo $c_id . '&delete=' . htmlspecialchars($prods['s_id']); ?>" style="font-size:18px" onclick="return confirm('Are you sure you want to delete this subcategory?');">Delete</a></td>		
    </tr>
    <?php } ?>
</table>

<?php include "../admin/components/footer.php"; ?>
