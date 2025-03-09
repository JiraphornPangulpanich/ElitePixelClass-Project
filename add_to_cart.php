<?php
session_start(); // เริ่ม session

// ตรวจสอบว่าเราได้รับค่า 'add' จาก URL หรือไม่
if (isset($_GET['add'])) {
    $itemId = $_GET['add']; // รับ ID ของสินค้า

    // ถ้ายังไม่มีตะกร้าใน session ให้สร้างใหม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); // สร้างตะกร้าใน session
    }

    // เพิ่มสินค้าลงในตะกร้า
    if (isset($_SESSION['cart'][$itemId])) {
        $_SESSION['cart'][$itemId]++; // เพิ่มจำนวนสินค้าในตะกร้า
    } else {
        $_SESSION['cart'][$itemId] = 1; // ถ้ายังไม่มีสินค้าในตะกร้า ให้เพิ่ม 1 ชิ้น
    }

    // ตรวจสอบข้อมูลในตะกร้าก่อนรีไดเรก
    echo '<pre>';
    print_r($_SESSION['cart']); // ตรวจสอบข้อมูลในตะกร้า
    echo '</pre>';

    // เปลี่ยนเส้นทางไปที่หน้าตะกร้า
    header('Location: cart1.php');
    exit();
} else {
    echo "ไม่มีสินค้าให้เพิ่ม";
}
?>
