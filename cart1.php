<?php
session_start(); // เริ่มต้น session

// ตรวจสอบค่าของ $_SESSION['cart']
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>ตะกร้าของคุณยังว่างอยู่</h2>";
} else {
    echo "<h2>สินค้าที่อยู่ในตะกร้าของคุณ</h2>";
    // ส่วนแสดงข้อมูลสินค้าจากตะกร้า
}

?>
