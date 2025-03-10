<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่า id ถูกส่งมาหรือไม่
if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('รหัสหมวดหมู่ไม่ถูกต้อง'); window.location='categories.php';</script>";
    exit;
}

$id = intval($_GET['id']); // แปลงเป็นตัวเลข

// ลบหมวดหมู่
$sql = "DELETE FROM categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("id", $id);

if ($stmt->execute()) {
    echo "<script>alert('ลบหมวดหมู่สำเร็จ!'); window.location='categories.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบ'); window.location='categories.php';</script>";
}
?>
