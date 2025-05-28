<?php 

$dbhost = "localhost";
$dbname = "shelteroflight";
$dbuser = "root";
$dbpass = "";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection Error". $conn->connect_error);
} else {
}

?>