<?php
session_start();
session_destroy();
echo "<script>window.alert('logged out');
</script>";
header('Location:../index.php');
