<?php
ob_start(); // Start output buffering
ini_set('display_errors', '1');
error_reporting(E_ALL);
?>

<?php
setcookie("loginGallery", "", time() - 1800);
header("Location: index.php");
ob_end_flush(); // Flush the output buffer
?>