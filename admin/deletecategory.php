<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่า id ถูกส่งมาหรือไม่
if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('รหัสหมวดหมู่ไม่ถูกต้อง'); window.location='categories.php';</script>";
    exit;
}

$id = intval($_GET['id']); // แปลงเป็นตัวเลข

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ลบหมวดหมู่
$sql = "DELETE FROM categories WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $id); // ใช้ "i" แทน "id"

if ($stmt->execute()) {
    echo "<script>alert('ลบหมวดหมู่สำเร็จ!'); window.location='categories.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบ: " . $stmt->error . "'); window.location='categories.php';</script>";
}

$stmt->close();
$conn->close();
?>
