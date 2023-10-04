<?php
// Include your database configuration file
require_once "config.php";

// Query to retrieve blog posts and their images from the database
$sql = "SELECT b.post_ID, b.author_userID, b.description, b.post_content, b.publish_date, bg.blog_img_path
        FROM blog b
        LEFT JOIN blog_gallery bg ON b.post_ID = bg.blog_ID
        ORDER BY b.publish_date DESC";

$result = mysqli_query($conn, $sql);

// Check if there are blog posts
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h2>" . htmlspecialchars($row["description"]) . "</h2>";
        echo "<p>Author: User ID " . $row["author_userID"] . "</p>";
        echo "<p>Published on: " . $row["publish_date"] . "</p>";
        echo "<p>" . htmlspecialchars($row["post_content"]) . "</p>";

        // Check if there is an associated image
        if (!empty($row["blog_img_path"])) {
            echo "<img src='" . htmlspecialchars($row["blog_img_path"]) . "' alt='Post Image'>";
        }

        echo "</div>";
    }
} else {
    echo "No blog posts found.";
}

// Close the database connection
mysqli_close($conn);
?>
