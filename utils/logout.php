<?php
session_start();
session_destroy();
echo "<script>window.alert('logged out');
window.location.href = '../index.php';
</script>";
