<?php
//when edit button clicked
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $festivalID = $_GET["id"];
    // Retrieve festival details from the database based on $festivalID
    $sql = "SELECT * FROM festivals WHERE FesID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $festivalID);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $festival = $result->fetch_assoc();

        $sql = "select * from festivals_gallery where festival_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $festivalID);
        if($stmt->execute()) {
            $result = $stmt->get_result();
            $festivalImages = $result->fetch_assoc();
        }else{
            die("Error: " . $stmt->error);
        }
    } else {
        // Handle query execution error
        die("Error: " . $stmt->error);
    }

    // Close the statement
    $stmt->close();
}
//when update button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateFestival"])) {
    // Retrieve form data
    $festivalName = $_POST["festival_name"];
    $date = $_POST["date_start"];
    $countryID = $_POST["country_id"];

    // Update festival information in the database based on $festivalID
    $updateSql = "UPDATE festivals SET FesName = ?, DateStart = ?, CountryID = ? WHERE FesID = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("ssii", $festivalName, $date, $countryID, $festivalID);

    if ($updateStmt->execute()) {
        // Redirect to a page indicating successful update or take other action
        header("Location: festival_updated.php");
        exit();
    } else {
        // Handle update error
        die("Error: " . $updateStmt->error);
    }

    // Close the statement
    $updateStmt->close();
}
?>
<body>
    <h2>Edit Festival</h2>
    <form method="POST" action="">
        <input type="hidden" name="festival_id" value="<?php echo $festivalID; ?>">
        <div>
            <label for="festival_name">Festival Name:</label>
            <input type="text" name="festival_name" value="<?php echo $festival["FesName"]; ?>" required><br><br>
        </div>

        <div>
            <label for="date_start">Date Start:</label>
            <input type="date" name="date_start" value="<?php echo $festival["DateStart"]; ?>" required><br><br>
        </div>

        <div>
            <label for="country_id">Country ID:</label>
            <select name="country_id" required>
                <!-- Populate the select options based on your country data -->
            </select><br><br>
        </div>

        <button type="submit" name="updateFestival">Update</button>
    </form>
</body>
