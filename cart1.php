<?php
session_start(); // เริ่มต้น session
include('db_connect.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีสินค้าที่ถูกเพิ่มในตะกร้าหรือไม่
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>ตะกร้าของคุณยังว่างอยู่</h2>";
} else {
    echo "<h2>สินค้าที่อยู่ในตะกร้าของคุณ</h2>";
    echo "<table border='1' cellpadding='10'>
            <thead>
                <tr>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                    <th>ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>";

    $totalPrice = 0;

    // ลูปผ่านสินค้าที่อยู่ในตะกร้า
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $sql = "SELECT Name, Price FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemName = $row['Name'];
                $itemPrice = $row['Price'];
                $totalItemPrice = $itemPrice * $quantity;

                // แสดงข้อมูลสินค้าในตะกร้า
                echo "<tr>
                        <td>$itemName</td>
                        <td>\$$itemPrice</td>
                        <td>$quantity</td>
                        <td>\$$totalItemPrice</td>
                        <td><a href='remove_from_cart.php?remove=$itemId'>ลบ</a></td>
                    </tr>";

                // คำนวณราคารวม
                $totalPrice += $totalItemPrice;
            }
        }
    }

    echo "</tbody></table>";
    echo "<h3>ราคารวมทั้งหมด: \$$totalPrice</h3>";
    echo "<br><a href='checkout.php'>ไปที่การชำระเงิน</a>";
    echo "<br><a href='product_page.php'>กลับไปเลือกสินค้าต่อ</a>";
}
?>
