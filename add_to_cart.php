<?php
session_start(); // เริ่มต้น session

// เช็คว่า parameter 'add' มีการส่งมาใน URL หรือไม่
if (isset($_GET['add'])) {
    $itemId = $_GET['add']; // รับค่าจาก URL ว่าเพิ่มสินค้าอะไร

    // ถ้ายังไม่มี session สำหรับตะกร้าให้สร้างขึ้น
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); // สร้างตะกร้าใน session
    }

    // เพิ่มสินค้าลงในตะกร้า
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]++; // ถ้ามีสินค้าในตะกร้าแล้วเพิ่มจำนวน
    } else {
        $_SESSION['cart'][$itemId] = 1; // ถ้ายังไม่มีสินค้าในตะกร้าก็เพิ่มไป 1 ชิ้น
    }

    // เปลี่ยนเส้นทางไปหน้า cart1.php
    header('Location: cart1.php');
    exit();
} else {
    echo "ไม่มีสินค้าให้เพิ่ม";
}
?>
