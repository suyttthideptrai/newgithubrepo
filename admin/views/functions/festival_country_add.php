<?php
require_once "config.php";

$errors = [];

if (isset($_POST['addCountry'])) {
    $countryName = mysqli_real_escape_string($conn, $_POST['country_name']);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileType = mime_content_type($fileTmpName);

        if (strpos($fileType, 'image/') === 0 || $fileType === 'image/svg+xml') {
            $uniqueFilename = uniqid() . '_' . $fileName;
            // subtract directory: admin\views\functions

            $substringToRemove = "\admin\\views\\functions";
            $targetDirectory= str_replace($substringToRemove, "", __DIR__);
            $uploadPath = $targetDirectory . "\assets\country_img/" . $uniqueFilename;

            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Start a transaction
                mysqli_begin_transaction($conn);

                // Insert country data
                $sqlCountry = "INSERT INTO country (CountryName) VALUES ('$countryName')";
                if (mysqli_query($conn, $sqlCountry)) {
                    //get last inserted id 
                    $lastInsertedCountryID = mysqli_insert_id($conn);
                    // Insert image path into country_gallery
                    $sqlGallery = "INSERT INTO country_gallery (ID, ImgPath) 
                    VALUES ('$lastInsertedCountryID', '$uniqueFilename')";
                    if (mysqli_query($conn, $sqlGallery)) {
                        // Commit the transaction if both inserts are successful
                        mysqli_commit($conn);
                        echo "Country added successfully!";
                    } else {
                        // Rollback the transaction if the second insert fails
                        mysqli_rollback($conn);
                        $errors[] = "Error inserting image path: " . mysqli_error($conn);
                    }
                } else {
                    $errors[] = "Error inserting country data: " . mysqli_error($conn);
                }
            } else {
                $errors[] = "Error uploading the image.";
            }
        } else {
            $errors[] = "Invalid file format. Please upload an image.";
        }
    } else {
        $errors[] = "Please select a country flag image.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Country</title>
</head>
<body>
    <div>
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <?php echo $error . "<br>"; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="country_name">Country Name:</label>
                <input type="text" name="country_name" required><br><br>
            </div>
            <div>
                <label for="image">Country Flag:</label>
                <input type="file" name="image" accept="image/*" required><br><br>
            </div>
            <div>
                <button type="submit" name="addCountry">ADD</button>
            </div>
        </form>
    </div>
</body>
</html>
