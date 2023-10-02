<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Festival</title>
</head>
<?php
require_once "config.php";

//get countries
$sql = "select CountryID, CountryName from country order by CountryName asc";
$Result = mysqli_query($conn, $sql);
$countryAssoc = array();
while($row = mysqli_fetch_assoc($Result)){
    $countryAssoc[] = $row; 
}
$countryName = array();
    //convert to 2 dimensional array to get country name value 
foreach ($countryAssoc as $country) {
    $countryName[$country['CountryID']] = $country['CountryName'];
}

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
    //check if directory exists
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    } 
    //attempt adding images
    foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['image']['name'][$key];
        $file_tmp = $_FILES['image']['tmp_name'][$key];
        $file_type = $_FILES['image']['type'][$key];

        // Check if the file is an image
        if (strpos($file_type, 'image') !== false) {
            $destination = 'uploads/' . $file_name;

            // Move the uploaded file to the "uploads" folder
            if (move_uploaded_file($file_tmp, $destination)) {
                echo 'File ' . $file_name . ' uploaded successfully.<br>';
            } else {
                echo 'Error uploading file ' . $file_name . '<br>';
            }
        } else {
            echo 'Invalid file type: ' . $file_name . '<br>';
        }
    }
    // Close the statement
    $updateStmt->close();
}
?>
<body>
    <h2>Edit Festival</h2>
    <form method="POST" action="" enctype="multipart/form-data">
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
                <option value="<?php echo $festival["CountryID"]?>"><?php echo $countryName[$festival["CountryID"]] ?></option>
                <?php if(!empty($countryAssoc)){
                    foreach ($countryAssoc as $country){ 
                    echo '<option value="' . $country['CountryID'] . '">' . $country['CountryName'] . '</option>';
                 }}else{
                    echo "<option>no data</option>";
                }?>
            </select><br><br>
        </div>

        <div>
            <label for="image">Select Images (Multiple):</label>
            <input type="file" name="image[]" id="image" multiple accept="image/*">
        </div>

        <button type="submit" name="updateFestival">Update</button>
    </form>

</body>
</html>