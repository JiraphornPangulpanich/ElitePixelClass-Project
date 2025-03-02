<!DOCTYPE html>
<html lang="en">
<head>
 
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "qq123456";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("เชื่อมต่อไม่สำเร็จ: " . $conn->connect_error);
}
echo "เชื่อมต่อสำเร็จ";
?>
</body>
</html>