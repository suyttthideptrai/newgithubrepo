<?php
$sql = "SELECT * FROM contact";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output table header
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Created_at</th><th>Message</th><th>actions</th></tr>";

    // Loop through the results and display each row in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["PhoneNumber"] . "</td>";
        echo "<td>" . $row["Created_at"] . "</td>";
        echo "<td>" . $row["Message"] . "</td>";
        echo "<td><button onlick=\"reply(" . $row["ID"] . ")'\">reply</button></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
