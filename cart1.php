<?php
session_start();  // เริ่มต้น session

// ตรวจสอบว่ามีการเพิ่มสินค้าไปยังตะกร้าหรือไม่
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h3>สินค้าของคุณอยู่ในตะกร้าแล้ว</h3>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        // ตัวอย่างการดึงข้อมูลสินค้าจากฐานข้อมูลตาม id
        $sql = "SELECT Name, Price FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["Name"] . " - " . $quantity . " ชิ้น - ราคา: " . $row["Price"] . " บาท</li>";
            }
        }
    }
    echo "</ul>";
} else {
    echo "<h3>ตะกร้าของคุณยังว่างอยู่</h3>";
}
?>
