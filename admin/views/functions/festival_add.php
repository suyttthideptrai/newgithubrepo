<?php
    $sql = "select CountryID, CountryName from country";
    $result = mysqli_query($conn, $sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addNewFestival"])) {
        $festivalName = $_POST["festival_name"];
        $dateStart = $_POST["date_start"];
        $countryID = $_POST["country_id"];
    
        $targetDirectory = "assets/img/";
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    
        // Insert festival data into the database
        $sql = "INSERT INTO festivals (FesName, DateStart, ImagePath, CountryID) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssi", $festivalName, $dateStart, $targetFile, $countryID);
            if (mysqli_stmt_execute($stmt)) {
                echo "Festival added successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    }
?>
<div>
    <h2>Add Festival</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div>
            <label for="festival_name">Festival Name:</label>
            <input type="text" name="festival_name" required><br><br>
        </div>

        <div>
            <label for="date_start">Date Start:</label>
            <input type="date" name="date_start" required><br><br>
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*" required><br><br>
        </div>

        <div>
            <label for="country_id">Country ID:</label>
            <select name="country_id" required>
                <option value="">Select a Country</option>
                <?php if(mysqli_num_rows($result) > 0){while ($row = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['CountryID'] ?>"><?php echo $row['CountryName'] ?></option>
                <?php }}else{
                    echo "<option>no data</option>";
                }?>
            </select><br><br>
        </div>

        <button type="submit" name="addNewFestival">Proceed</button>
    </form>
</div>
