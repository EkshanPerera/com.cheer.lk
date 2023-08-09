<?php
$servername = "localhost";
$username = "cheerlk_ekshan";
$password = "990212@Ekshan";
$dbname="cheerlk_slimnfit";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>