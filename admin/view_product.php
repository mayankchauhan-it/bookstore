<?php
include "../admin/components/head.php";
include "connection.php"; // Make sure the connection file is correctly included

if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']); // Sanitize the input
    $del = "DELETE FROM category WHERE c_id = $delete_id";
    $rs = mysqli_query($db, $del); // Pass the database connection
    if ($rs) {
        header("Location: category.php?msg=Category deleted successfully");
        exit();
    } else {
        echo "Error deleting category: " . mysqli_error($db);
    }
}
?>

<style>
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #0d6efd;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    a {
        text-decoration: none;
        color:#000;
    }
    a:hover {
        text-decoration: underline;
    }
    img {
        border-radius: 5px;
    }
</style>

<br /><br /><br /><br /><br />

<table>
    <tr>
        <td colspan="5" align="right">
            <a href="add_product.php" style="font-size:18px">Add New Category</a>
        </td>
    </tr>
    <tr>
        <th>Category ID</th>
        <th>Image</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    $sel = mysqli_query($db, "SELECT * FROM category");
    while ($prods = mysqli_fetch_array($sel)) {
    ?>
    <tr>
        <td style="font-size:25px"><?php echo $prods['c_id']; ?></td>
        <td><img src="../admin/images/<?php echo $prods['c_image']; ?>" alt="Img" width="200" height="200"></td>
        <td><a href="../admin/subcategory.php?c_id=<?php echo $prods['c_id']; ?>" style="font-size:25px"><?php echo $prods['c_nm']; ?></a></td>
        <td><a href="edit_category.php?c_id=<?php echo $prods['c_id']; ?>" style="font-size:18px">Edit</a></td>
        <td><a href="category.php?delete=<?php echo $prods['c_id']; ?>" style="font-size:18px" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a></td>
    </tr>
    <?php } ?>
