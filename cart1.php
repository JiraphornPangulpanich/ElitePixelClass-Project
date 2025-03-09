<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่า $_SESSION['cart'] มีสินค้าหรือไม่
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h3>สินค้าของคุณอยู่ในตะกร้าแล้ว</h3>";
    echo "<ul>"; // เริ่มต้นรายการสินค้า

    // Loop ผ่านสินค้าในตะกร้า
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $sql = "SELECT Name, Price FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // ถ้ามีสินค้าตรงกับ $itemId ให้แสดงข้อมูล
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["Name"] . " - " . $quantity . " ชิ้น - ราคา: " . $row["Price"] . " บาท</li>";
            }
        } else {
            // ถ้าไม่มีสินค้าตรงกับ Iditem
            echo "<li>ไม่พบข้อมูลสินค้าที่คุณเลือก</li>";
        }
    }
    echo "</ul>"; // ปิดรายการสินค้า
} else {
    echo "<h3>ตะกร้าของคุณยังว่างอยู่</h3>";
}
?>
