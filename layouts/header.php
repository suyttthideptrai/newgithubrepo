<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<header>
    <?php
    session_start();
    echo "This is the header part";
    ?>
    <br>
    <?php
    if(isset($_SESSION['User'])){
        echo 'Hello User: ' . $_SESSION['User']['Username'];
    }
    ?>
    <br>
    <?php
    if(isset($_SESSION['User']) && $_SESSION['User']['Role'] === 0){
        echo '<a href="admin/home.php">page administration</a> <br>';
    }
    ?>
    <a href="main_module/contact.php">contact us</a>
    <?php
    if(!isset($_SESSION['User'])){
        echo '<br>
        <a href="main_module/login.php">login</a> <br>
        <a href="main_module/register.php">register</a> <br>';     
    }
    ?>
    <?php
    if(isset($_SESSION['User'])){
        echo '<a href="utils/logout.php">logout</a> <br>';
    }
    ?>
    <hr>
</header>