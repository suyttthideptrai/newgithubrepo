<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $festivalName = $_POST["festival_name"];
    echo "<p style=\"color: green; text-align: center;\">" . $festivalName . "</p>";
    // Handle image upload (you can customize this part as needed)
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    var_dump($_FILES);
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

    // Insert festival data into the database
    // $sql = "INSERT INTO festivals (FesName, DateStart, ImagePath, CountryID) VALUES (?, ?, ?, ?)";
    // $stmt = mysqli_prepare($conn, $sql);

    // if ($stmt) {
    //     mysqli_stmt_bind_param($stmt, "sssi", $festivalName, $dateStart, $targetFile, $countryID);
    //     if (mysqli_stmt_execute($stmt)) {
    //         echo "Festival added successfully.";
    //     } else {
    //         echo "Error: " . mysqli_error($conn);
    //     }
    //     mysqli_stmt_close($stmt);
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
    
}
?>
<div>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="festival_name"> <br>
        <input type="file" name="image">
        <button name="submit" type="submit">submit</button>
    </form>
</div>
</body>
</html>