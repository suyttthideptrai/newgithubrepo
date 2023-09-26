<?php 
require_once "utils.php";
//define server variables
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "moonlightfestival");

//set default timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

//establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>