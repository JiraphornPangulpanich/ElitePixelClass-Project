<?php
$servername = "localhost";
$username = "root";
$password = "qq123456";
$dbname = "ElitePixel";

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
  die("เชื่อมต่อไม่สำเร็จ: " . $conn->connect_error);
}
echo "เชื่อมต่อสำเร็จ";
?>
