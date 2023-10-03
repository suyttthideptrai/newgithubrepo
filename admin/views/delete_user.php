<?php
require_once '../../utils/config.php';

session_start();
?>

<?php
if (isset($_GET['UserID'])){
    $UserID = $_GET['UserID'];
    $sql = "DELETE FROM users WHERE UserID = $UserID";
    $result = $conn->query($sql);
    if ($result){
        header("Location: " . BASE_URL . "/admin/home.php?view=Registering");
    }
}
?>
