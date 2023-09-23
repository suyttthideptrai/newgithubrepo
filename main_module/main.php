<body>

<?php
session_start();
print_r($_SESSION);
//đây là trang chủ index
echo 'Đây là trang chủ';
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
</body>
