<?php
// Include your database configuration file
require_once "config.php";

// Check if the 'id' parameter is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter to prevent SQL injection
    $contactID = intval($_GET['id']);

    // Prepare a DELETE statement to remove the contact entry
    $sql = "DELETE FROM `contact` WHERE `ID` = $contactID";

    if (mysqli_query($conn, $sql)) {
        // The contact entry has been successfully deleted
        header("Location: ../../home.php?view=Contact&delete_success=1");
        // echo "<p>deleted</p>";
    } else {
        echo "Error deleting contact: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
