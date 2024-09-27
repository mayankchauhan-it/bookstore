<?php
include 'connection.php';  // Include the database connection

// Prepare and execute the SQL statement
$sel = mysqli_query($db, "SELECT * FROM user");

// Check if the query was successful
if ($sel) {
    // Start HTML structure
    echo "<table style='width: 100%; border-collapse: collapse;'>";
    echo "<tr style='background-color: #f2f2f2;'>
            <th style='border: 1px solid #000; padding: 8px;'>ID</th>
            <th style='border: 1px solid #000; padding: 8px;'>Username</th>
            <th style='border: 1px solid #000; padding: 8px;'>Password</th>
            <th style='border: 1px solid #000; padding: 8px;'>Address</th>
            <th style='border: 1px solid #000; padding: 8px;'>City</th>
            <th style='border: 1px solid #000; padding: 8px;'>State</th>
            <th style='border: 1px solid #000; padding: 8px;'>Email</th>
            <th style='border: 1px solid #000; padding: 8px;'>Phone Number</th>
          </tr>";

    // Fetch all users and populate the table
    while ($user = mysqli_fetch_assoc($sel)) {
        echo "<tr style='background-color: #ffffff;'>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['u_id']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['u_nm']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['password']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['address']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['city']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['state']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['email']) . "</td>";
        echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . htmlspecialchars($user['pno']) . "</td>";
        echo "</tr>";
    }

    echo "</table>"; // Close the table
} else {
    echo "No users found.";
}

// Close the database connection if needed
mysqli_close($db);
?>
