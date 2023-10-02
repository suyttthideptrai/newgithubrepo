<?php
require_once "config.php";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
// Include your database configuration file (config.php or similar)
require_once "config.php";

    // Get the festival ID to be deleted
    $festivalID = $_GET["id"];

    // Retrieve the image path associated with the festival from the gallery table
    $sqlImagePath = "SELECT ImagePath FROM gallery WHERE ImageID IN (
        SELECT gallery_id FROM festivals_gallery WHERE festival_id = ?
    )";
    $stmtImagePath = $conn->prepare($sqlImagePath);
    $stmtImagePath->bind_param("i", $festivalID);
    $stmtImagePath->execute();
    $resultImagePath = $stmtImagePath->get_result();
    $rowImagePath = $resultImagePath->fetch_assoc();
    
    // Delete the record from the festivals_gallery table
    $sqlDeleteFestivalGallery = "DELETE FROM festivals_gallery WHERE festival_id = ?";
    $stmtDeleteFestivalGallery = $conn->prepare($sqlDeleteFestivalGallery);
    $stmtDeleteFestivalGallery->bind_param("i", $festivalID);

    // Delete the image record from the gallery table
    $sqlDeleteImage = "DELETE FROM gallery WHERE ImageID IN (
        SELECT gallery_id FROM festivals_gallery WHERE festival_id = ?
    )";
    $stmtDeleteImage = $conn->prepare($sqlDeleteImage);
    $stmtDeleteImage->bind_param("i", $festivalID);

    // Delete the festival record from the festivals table
    $sqlDeleteFestival = "DELETE FROM festivals WHERE FesID = ?";
    $stmtDeleteFestival = $conn->prepare($sqlDeleteFestival);
    $stmtDeleteFestival->bind_param("i", $festivalID);

    // Begin a transaction to ensure data consistency
    $conn->begin_transaction();
    if($stmtDeleteFestivalGallery->execute()){
        if($stmtDeleteImage->execute()){
            if($stmtDeleteFestival->execute()){
                $conn->commit();
                $imageFolder = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/";
                // Delete the image file from the web app folder
                if ($rowImagePath && file_exists($imageFolder . $rowImagePath['ImagePath'])) {
                    unlink($imageFolder . $rowImagePath['ImagePath']);
                }else{
                    echo "file not exists";
                }

                echo "<script>
                        window.alert('Image deleted successfully');
                        window.location.href = '/admin/home.php?view=FestivalManager';
                    </script>";
                $stmtDeleteFestival->close();
                $stmtDeleteFestivalGallery->close();
                $stmtDeleteImage->close();
                $stmtImagePath->close();
            }else{
                $conn->rollback();
                echo '<div style="width=100vw; text-align: center;"><span style="position: absolute;
                        border-top: 25px;
                        color: red;
                        text-align: center;
                        border: 1px solid black;
                        border-collapse: collapse;
                        border-radius: 5px;
                        padding: 5px;"
                >Error: failed 3rd step</span></div>';
            }
        }else{
            $conn->rollback();
            echo '<div style="width=100vw; text-align: center;"><span style="position: absolute;
                        border-top: 25px;
                        color: red;
                        text-align: center;
                        border: 1px solid black;
                        border-collapse: collapse;
                        border-radius: 5px;
                        padding: 5px;"
            >Error: failed 2nd step</span></div>';
        }
    }else{
        $conn->rollback();
        echo '<div style="width=100vw; text-align: center;"><span style="position: absolute;
                border-top: 25px;
                color: red;
                text-align: center;
                border: 1px solid black;
                border-collapse: collapse;
                border-radius: 5px;
                padding: 5px;"
        >Error: fail 1st step</span></div>';
    }
}
    // Execute the deletion queries
   // Rest of your HTML and PHP code here
?>
