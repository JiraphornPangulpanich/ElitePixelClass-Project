<?php
// Database configuration
$host = '45.154.26.121'; // or your database host
$dbname = 'ElitePixel';
$username = 'root';
$password = 'qq123456';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$user_input = $_POST['username'];
$pass_input = $_POST['password'];

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    // ตรวจสอบรหัสผ่าน
    if (password_verify($pass_input, $row['password'])) {
        echo "Login Successful!";
        // ทำการ redirect หรือสร้าง session ได้ตามต้องการ
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>
