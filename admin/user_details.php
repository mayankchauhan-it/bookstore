<?php
include 'connection.php';  // Include the database connection

// Prepare and execute the SQL statement
$sel = mysqli_query($db, "SELECT * FROM user");

// Check if the query was successful
if ($sel) {
    // Fetch all users
    while ($user = mysqli_fetch_assoc($sel)) {
        echo "ID: " . htmlspecialchars($user['u_id']) . "<br>";
        echo "Username: " . htmlspecialchars($user['u_nm']) . "<br>";
        echo "Password: " . htmlspecialchars($user['password']) . "<br>";
        echo "Address: " . htmlspecialchars($user['address']) . "<br>";
        echo "City: " . htmlspecialchars($user['city']) . "<br>";
        echo "State: " . htmlspecialchars($user['state']) . "<br>";
        echo "Email: " . htmlspecialchars($user['email']) . "<br>";
        echo "Phone Number: " . htmlspecialchars($user['pno']) . "<br>";
        //echo "Created At: " . htmlspecialchars($user['created_at']) . "<br><br>";
    }
} else {
    echo "No users found.";
}

// Close the database connection if needed
mysqli_close($db);
?>
