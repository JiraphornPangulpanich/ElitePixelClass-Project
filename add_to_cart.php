<?php
session_start(); // เริ่มต้น session
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

if (isset($_GET['add'])) {
    $itemId = $_GET['add']; // รับค่า Id ของสินค้าที่จะเพิ่ม

    // ตรวจสอบว่า session['cart'] ถูกสร้างหรือยัง ถ้ายังให้สร้างขึ้น
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); // ถ้ายังไม่มีตะกร้าใน session ให้สร้างตะกร้าขึ้น
    }

    // เพิ่มสินค้าลงในตะกร้า
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]++; // ถ้ามีสินค้าก็เพิ่มจำนวน
    } else {
        $_SESSION['cart'][$itemId] = 1; // ถ้ายังไม่มีสินค้าก็เพิ่มไป 1 ชิ้น
    }

    // ตรวจสอบว่าเพิ่มสินค้าลงใน session หรือไม่
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';

    // หลังจากเพิ่มสินค้าสำเร็จแล้วให้เปลี่ยนเส้นทางไปหน้า cart1.php
    header('Location: cart1.php');
    exit();
} else {
    echo "ไม่มีสินค้าให้เพิ่ม";
}
?>
