<?php
include "connection.php";
include "../admin/components/head.php";

if (isset($_GET['delete'])) {
    // Sanitize the input to prevent SQL injection
    $delete_id = intval($_GET['delete']);
    $del = "DELETE FROM bill WHERE u_id = $delete_id";
    $rs = mysqli_query($db, $del); // Pass the database connection here

    // Optionally, check if the query was successful
    if ($rs) {
        header("Location: billing.php?msg=Record deleted successfully");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
}
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4; /* Light background color */
        margin: 20px;
    }
    table {
        width: 80%; /* Set the table width */
        margin: 20px auto; /* Center the table */
        border-collapse: collapse; /* Merge borders */
        background-color: white; /* White background for the table */
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
        color: #000; /* Link color */
        text-decoration: none; /* Remove underline from links */
    }
    a:hover {
        text-decoration: underline; /* Underline on hover */
    }
</style>

<div id="contents">
    <div id="adbox">
        <br /><br /><br /><br /><br />

        <form action="" method="post">
            <?php
            if (isset($_GET['msg'])) {
                echo "<div style='text-align: center; color: green;'>" . htmlspecialchars($_GET['msg']) . "</div>";
            }
            ?>
            <table>
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
                $sel = mysqli_query($db, "SELECT * FROM bill");
                while ($res = mysqli_fetch_array($sel)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($res['b_id']); ?></td>
                        <td><?php echo htmlspecialchars($res['u_id']); ?></td>
                        <td><?php echo htmlspecialchars($res['i_id']); ?></td>
                        <td><?php echo htmlspecialchars($res['i_nm']); ?></td>
                        <td><?php echo htmlspecialchars($res['i_price']); ?></td>
                        <td><?php echo htmlspecialchars($res['c_id']); ?></td>
                        <td><a href="billing.php?delete=<?php echo htmlspecialchars($res['u_id']); ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    </div>
</div>
<br />
<br />
