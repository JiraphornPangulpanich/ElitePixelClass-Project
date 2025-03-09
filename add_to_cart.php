<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าได้รับค่าจาก URL หรือไม่
if (isset($_GET['add'])) {
    $itemId = $_GET['add']; // ดึง Iditem จาก URL

    // ตรวจสอบว่า $_SESSION['cart'] มีค่าหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // ถ้ายังไม่มีให้สร้างตะกร้า
    }

    // ถ้ามีสินค้าตัวนี้แล้วในตะกร้า ให้เพิ่มจำนวนสินค้า
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]++; // เพิ่มจำนวนสินค้าตัวนี้ในตะกร้า
    } else {
        $_SESSION['cart'][$itemId] = 1; // ถ้ายังไม่มีให้เพิ่มสินค้าใหม่
    }

    // แสดงค่าของ $_SESSION['cart'] สำหรับการทดสอบ
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';

    // รีไดเร็คไปยังหน้า cart1.php
    header('Location: cart1.php');
    exit; // อย่าลืมใส่ exit เพื่อหยุดการทำงานของสคริปต์หลังจาก redirect
} else {
    // ถ้าไม่ได้ส่งค่า 'add' มา ให้แสดงข้อความ หรือทำอะไรเพิ่มเติม
    echo "ไม่มีข้อมูลสินค้า";
}
?>
