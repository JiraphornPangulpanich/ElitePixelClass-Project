<?php
session_start();
include('db_connection.php'); // ใช้การเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าได้ส่งค่า 'add' มาหรือไม่
if (isset($_GET['add'])) {
    $itemId = $_GET['add'];

    // ตรวจสอบว่า $itemId อยู่ใน $_SESSION['cart] หรือไม่
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId] += 1;  // เพิ่มจำนวนสินค้าในตะกร้า
    } else {
        $_SESSION['cart'][$itemId] = 1;  // ถ้ายังไม่มีสินค้าชิ้นนี้ในตะกร้า ให้เพิ่ม
    }

    // รีไดเรกไปที่ cart1.php เพื่อแสดงผล
    header('Location: cart1.php');
    exit;
}
?>
