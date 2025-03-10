<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามี iditem ถูกส่งมาหรือไม่
if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('รหัสสินค้าไม่ถูกต้อง'); window.location='product.php';</script>";
    exit;
}

$id = intval($_GET['id']); // แปลงเป็นตัวเลข

// ลบข้อมูลสินค้า
$sql = "DELETE FROM Product WHERE Iditem = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('ลบสินค้าสำเร็จ!'); window.location='product.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการลบสินค้า'); window.location='product.php';</script>";
}

$stmt->close();
$conn->close();
?>
