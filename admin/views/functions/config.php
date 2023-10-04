<?php 
//define server variables
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "moonlightfestival");
$substringToRemove = "\admin\\views\\functions";
$applicationFolderPath = str_replace($substringToRemove, "", __DIR__);
define("APPLICATION_PATH", $applicationFolderPath );
define("ADMIN_HOME", $applicationFolderPath . "\admin\home.php");
//set default timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');

function removeSubstringFromPath($path, $substring) {
    $directorySeparator = DIRECTORY_SEPARATOR;
    $substring = str_replace('/', $directorySeparator, $substring);
    $path = str_replace($substring, '', $path);
    return $path;
}

//establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>