<?php
session_start(); // เริ่มต้น session
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h2>สินค้าที่อยู่ในตะกร้าของคุณ</h2>";
    echo '<pre>';
    print_r($_SESSION['cart']); // แสดงสินค้าทั้งหมดในตะกร้า
    echo '</pre>';
} else {
    echo "<h2>ตะกร้าของคุณยังว่างอยู่</h2>";
}
?>
