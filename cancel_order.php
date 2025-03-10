<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    echo "<script>alert('โปรดเข้าสู่ระบบเพื่อยกเลิกคำสั่งซื้อ'); window.location='index.php';</script>";
    exit;
}

// ตรวจสอบว่าได้รับ `order_id` หรือไม่
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    
    // คำสั่ง SQL เพื่ออัพเดตสถานะคำสั่งซื้อเป็น "ยกเลิก"
    $sql = "UPDATE orders SET Status = 'ยกเลิก' WHERE OrderID = ? AND Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $order_id, $_SESSION['username']);
    
    // ตรวจสอบว่าอัพเดตสำเร็จหรือไม่
    if ($stmt->execute()) {
        echo "<script>alert('คำสั่งซื้อถูกยกเลิกแล้ว'); window.location='order_history.php';</script>";
    } else {
        echo "<script>alert('ไม่สามารถยกเลิกคำสั่งซื้อได้'); window.location='order_history.php';</script>";
    }
} else {
    echo "<script>alert('ไม่พบคำสั่งซื้อที่ต้องการยกเลิก'); window.location='order_history.php';</script>";
}

?>
