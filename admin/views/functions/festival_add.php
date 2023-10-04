<?php
    require_once "config.php";
    $sql = "select CountryID, CountryName from country";
    $result = mysqli_query($conn, $sql);
    $conn->autocommit(FALSE);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addNewFestival"])) {
        //add image to designated path
        $currentDirectory = __DIR__;
        $substringToRemove = "/admin/views/functions";
        
        $targetDirectory = removeSubstringFromPath($currentDirectory, $substringToRemove) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;
        $fileName = basename($_FILES["image"]["name"]);
        $targetFile = $targetDirectory . $fileName;
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
            //get form elements
            $festivalName = $_POST["festival_name"];
            $date = $_POST["date_start"];
            $description = $_POST["description"];
            $countryID = $_POST["country_id"];
            $t = time();
            $currentDatetime = date('Y-m-d H:i:s', $t);
            //1st data insertion
            $sqlFestival = "INSERT INTO festivals (FesName, DateStart, Description, CountryID) VALUES (?, ?, ?, ?)";
            $stmtFestival = $conn->prepare($sqlFestival);
            $stmtFestival->bind_param("ssss", $festivalName, $date, $description, $countryID);

            if ($stmtFestival->execute()) {
                //get last inserted ID
                
                $lastInsertedFestivalID = $stmtFestival->insert_id;
                // Insert image data into the database
                $sqlImage = "INSERT INTO gallery (ImageTitle, ImagePath, UploadDate) VALUES ('title', '$fileName', '$currentDatetime');";

                if (mysqli_query($conn, $sqlImage)) {
                    //get last inserted imageID
                    $lastInsertedImageID = $conn->insert_id;
                    
                    // Link festival and image
                    $sqlLink = "INSERT INTO festivals_gallery (gallery_id, festival_id) VALUES (?, ?)";
                    $stmtLink = $conn->prepare($sqlLink);
                    $stmtLink->bind_param("ii", $lastInsertedImageID, $lastInsertedFestivalID);
        
                        if ($stmtLink->execute()) {
                            $conn->commit();
                            // Insert successful
                            echo '<div style="width=100vw; text-align: center;"><span style="position: absolute;
                                            border-top: 25px;
                                            color: green;
                                            text-align: center;
                                            border: 1px solid black;
                                            border-collapse: collapse;
                                            border-radius: 5px;
                                            padding: 5px;"
                                >Successfully added ' . $festivalName . ' to the database!</span></div>';
            } else {
                $conn->rollback();
                // Insert failed
                echo '<div style="width=100vw; text-align: center;"><span style="position: absolute;
                                    border-top: 25px;
                                    color: red;
                                    text-align: center;
                                    border: 1px solid black;
                                    border-collapse: collapse;
                                    border-radius: 5px;
                                    padding: 5px;"
                    >Error: Adding festival image link step</span></div>';
            }
        }
         else {
            $conn->rollback();
            // Insert failed
        echo ' <div style="width=100vw; text-align: center;"><span style="position: absolute;
                        border-top: 25px;
                        color: red;
                        text-align: center;
                        border: 1px solid black;
                        border-collapse: collapse;
                        border-radius: 5px;
                        padding: 5px;"
            >Error: Adding festival image directory
             step</span></div>';
                }
            }else{
                $conn->rollback();
                // Insert failed
                echo'<div style="width=100vw; text-align: center;"><span style="position: absolute;
                            border-top: 25px;
                            color: red;
                            text-align: center;
                            border: 1px solid black;
                            border-collapse: collapse;
                            border-radius: 5px;
                            padding: 5px;"
                >Error: Adding festival step</span></div>';
            }
        }else{
            //image upload failed
            echo'<div style="width=100vw; text-align: center;"><span style="position: absolute;
                        border-top: 25px;
                        color: red;
                        text-align: center;
                        border: 1px solid black;
                        border-collapse: collapse;
                        border-radius: 5px;
                        padding: 5px;"
                >Sorry, there were some issue whilst uploading your image!</span></div>';
        }
        $conn->autocommit(TRUE);
    }
?>
<div>
    <h2>Add Festival</h2>
    <form method="POST" id="addForm" action="" type="hidden" enctype="multipart/form-data">
        <div>
            <label for="festival_name">Festival Name:</label>
            <input type="text" name="festival_name" required><br><br>
        </div>

        <div>
            <label for="date_start">Date Start:</label>
            <input type="date" name="date_start" required><br><br>
        </div>

        <div>
            <label for="date_start">Festival Description: </label>
            <input type="text" name="description" required><br><br>
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

        <button type="submit" id="addFormSubmit" name="addNewFestival">Proceed</button>
    </form>
</div>
<script>
// $(document).ready(function() {
//     $("#addFormSubmit").click(function() {
//         var formData = $("#myForm").serialize(); // Serialize form data

//         $.ajax({
//             type: "POST",
//             url: "process.php", // Replace with the PHP script that handles form submission
//             data: formData,
//             success: function(response) {
//                 // Update the result div with the response from the server
//                 $("#result").html(response);
//             }
//         });
//     });
// });
</script>
