<?php
$query = "SELECT festivals.FesID, festivals.FesName, country.CountryName, festivals.DateStart
FROM festivals
JOIN country ON festivals.CountryID = country.CountryID
ORDER BY festivals.FesID;";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Database query failed! Check the connection";
}

//handling event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn-find"])) {
        $findBy = $_POST["findBy"];
        if (!empty($_POST["searchQuery"])) {
            $searchQuery = $_POST["searchQuery"];
            $query = "SELECT festivals.FesID, festivals.FesName, country.CountryName, festivals.DateStart
                      FROM festivals
                      JOIN country ON festivals.CountryID = country.CountryID";
            if ($findBy === "byName") {
                $query .= " WHERE festivals.FesName LIKE '%" . $searchQuery . "%'";
            } else {
                $query .= " WHERE country.CountryName LIKE '%" . $searchQuery . "%'";
            }
            $result = mysqli_query($conn, $query);
        } else {
            echo "Please enter a search query.";
    }
}
?>
<div class="festival-find">
    <form action="" method="POST">
        <div>
            <span>Find by:</span>
            <input type="radio" name="findBy" value="byName" checked> <label for="">Name</label>
            <input type="radio" name="findBy" value="byCountry"> <label for="">Country</label>
        </div>
        <div>
            <input type="text" name="searchQuery" placeholder="What are you looking for?" required> 
            <button name="btn-find">Find</button>
        </div>
    </form>
</div>
<div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Festival Name</th>
            <th>Country</th>
            <th>Date Start</th>
            <th>Action</th>
        </tr>
        <?php if(mysqli_num_rows($result) > 0){while ($row = mysqli_fetch_assoc($result)){  ?>
            <tr>
                <td><?php echo $row['FesID']; ?></td>
                <td><?php echo $row['FesName']; ?></td>
                <td><?php echo $row['CountryName']; ?></td>
                <td><?php echo $row['DateStart']; ?></td>
                <td>
                    <button onclick="<?php echo 'openPopup(' . $row['FesID'] .')' ?>">Edit</button>
                    <a href="views/functions/festival_delete.php?id=<?php echo $row['FesID']; ?>">Delete</a>
                </td>
            </tr>
        <?php }}else{
            echo "<td></td><td>Cannot find anything!</td>";
        } ?>
    </table>
</div>
<script>
    function openPopup(id) {
        // Define the URL of the PHP file to be displayed in the pop-up
        var popupURL = 'views/functions/festival_edit.php?id=';
        popupURL += id;


        // Define window properties
        var popupWidth = 600;
        var popupHeight = 500;

        // Calculate the center position of the pop-up
        var left = (screen.width - popupWidth) / 2;
        var top = (screen.height - popupHeight) / 2;

        // Open the pop-up window
        window.open(popupURL, 'Pop-up Window', 'width=' + popupWidth + ', height=' + popupHeight + ', left=' + left + ', top=' + top);
    }
</script>

