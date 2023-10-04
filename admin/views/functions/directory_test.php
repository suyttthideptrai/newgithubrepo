<?php
function removeSubstringFromPath($path, $substring) {
    $directorySeparator = DIRECTORY_SEPARATOR;
    $substring = str_replace('/', $directorySeparator, $substring);
    $path = str_replace($substring, '', $path);
    return $path;
}

$currentDirectory = __DIR__;
$substringToRemove = "/admin/views/functions";

$targetDirectory = removeSubstringFromPath($currentDirectory, $substringToRemove) . DIRECTORY_SEPARATOR . "assets" . DIRECTORY_SEPARATOR . "img";

echo $targetDirectory;