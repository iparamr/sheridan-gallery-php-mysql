<?php
$servername = '172.17.0.2';
$username = 'root';
$password = 'dev123';
$dbname = 'art_gallery';

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
