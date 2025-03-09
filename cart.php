<?php
session_start();

if (isset($_GET['add'])) {
    $itemId = $_GET['add'];

    // ตรวจสอบว่า ItemId มีอยู่ในตะกร้าหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // เพิ่มสินค้าในตะกร้า
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]++;
    } else {
        $_SESSION['cart'][$itemId] = 1;
    }
}

// ลิงก์ไปยังหน้า cart1.php
header('Location: cart1.php');
?>
