<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "qq123456";
$dbname = "Product";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL เลือก Iditem และ Name จากตาราง items
$sql = "SELECT Iditem, Name FROM Product";
$result = $conn->query($sql);

// ตรวจสอบผลลัพธ์
if ($result->num_rows > 0) {
    // วนลูปดึงข้อมูล
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["Iditem"]. " - Name: " . $row["Name"]. "<br>";
    }
} else {
    echo "0 results";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>