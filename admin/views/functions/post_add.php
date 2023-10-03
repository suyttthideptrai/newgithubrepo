<?php
require_once "config.php";

if (isset($_POST['submit'])) {
    $description = $_POST['description'];
    $post_content = $_POST['post_content'];

    $headerImageName = $_FILES['header_image']['name'];
    $headerImageTmpName = $_FILES['header_image']['tmp_name'];
    $substringToRemove = "\admin\\views\\functions";
    $targetDirectory= str_replace($substringToRemove, "", __DIR__);
    $uploadPath = $targetDirectory . "\assets\blog_img\\" . $headerImageName;

    if (move_uploaded_file($headerImageTmpName, $uploadPath)) {
        // Insert the blog post into the 'blog' table
        $sql = "INSERT INTO `blog` (`author_userID`, `description`, `post_content`) 
                VALUES (1, '$description', '$post_content')";
        if(mysqli_query($conn, $sql)){

        // Get the last inserted blog post ID
        $lastInsertID = mysqli_insert_id($conn);

        // Insert the header image path into the 'blog_gallery' table
        $sql = "INSERT INTO `blog_gallery` (`blog_ID`, `blog_img_path`) 
                VALUES ($lastInsertID, '$headerImageName')";
        if(mysqli_query($conn, $sql)){
            echo "<p>Blog post added successfully!</p>";
            }else{
                echo "Error: ". $sql. "<br>". mysqli_error($conn);
            }
        }else{
            echo "Error: ". $sql. "<br>". mysqli_error($conn);
        }
    } else {
        echo "Error uploading the header image.";
    }
}

mysqli_close($conn);
?>

<h1>Add Blog Post</h1>
<form action="" method="POST" enctype="multipart/form-data">
        <label for="description">Description:</label>
        <input type="text" name="description" required><br><br>

        <label for="post_content">Post Content:</label>
        <textarea name="post_content" rows="4" required></textarea><br><br>

        <label for="header_image">Header Image:</label>
        <input type="file" name="header_image" accept="image/*" required><br><br>

        <input type="submit" name="submit">
</form>