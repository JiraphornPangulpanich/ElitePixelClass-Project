<?php
session_start(); // เริ่มต้น session

// ตรวจสอบว่ามีสินค้าภายในตะกร้าใน session หรือไม่
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h2>สินค้าที่อยู่ในตะกร้าของคุณ</h2>";
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        // ดึงข้อมูลสินค้า เช่น ชื่อ, ราคา, จำนวน ที่มีอยู่ในตะกร้า
        $sql = "SELECT Name, Price FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>ชื่อสินค้า: " . $row['Name'] . "<br>";
                echo "ราคา: $" . $row['Price'] . "<br>";
                echo "จำนวน: " . $quantity . "<br><br>";
            }
        } else {
            echo "ไม่พบข้อมูลสินค้า";
        }
    }
} else {
    echo "<h2>ตะกร้าของคุณยังว่างอยู่</h2>";
}
?>
