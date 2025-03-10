<?php
include 'condb.php';
session_start();

// รับข้อมูลจากฟอร์ม login
$username = $_POST['username'];
$password = $_POST['password'];

// คำสั่ง SQL เพื่อดึงข้อมูลผู้ใช้จากฐานข้อมูล
$stmt = $conn->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // ตรวจสอบรหัสผ่าน
    if (password_verify($password, $user['password'])) {
        // ถ้ารหัสผ่านถูกต้อง, เก็บข้อมูลใน session
        $_SESSION["id"] = $user['id'];
        $_SESSION["firstname"] = $user['firstname'];
        $_SESSION["lastname"] = $user['lastname'];
        // เปลี่ยนเส้นทางไปยังหน้าโปรไฟล์หรือหน้าที่ต้องการ
        header("Location: index1.php");
        exit();
    } else {
        // ถ้ารหัสผ่านผิด, ตั้งค่าข้อความผิดพลาด
        $_SESSION["Error"] = "รหัสผ่านไม่ถูกต้อง!";
        header("Location: login.php");
        exit();
    }
} else {
    // ถ้าไม่พบผู้ใช้ในฐานข้อมูล, ตั้งค่าข้อความผิดพลาด
    $_SESSION["Error"] = "ไม่พบผู้ใช้ที่มีชื่อผู้ใช้นี้!";
    header("Location: login.php");
    exit();
}
?>
