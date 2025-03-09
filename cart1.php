<?php
session_start();
include('db_connect.php');

// ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "ตะกร้าสินค้าของคุณยังว่างอยู่";
} else {
    echo "<h2>ตะกร้าสินค้าของคุณ</h2>";
    echo "<table border='1'>
            <tr>
                <th>ชื่อสินค้า</th>
                <th>ราคาต่อหน่วย</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
            </tr>";

    $totalPrice = 0;

    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        $sql = "SELECT Name, Price FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemName = $row['Name'];
                $itemPrice = $row['Price'];
                $totalItemPrice = $itemPrice * $quantity;
                
                echo "<tr>
                        <td>$itemName</td>
                        <td>\$$itemPrice</td>
                        <td>$quantity</td>
                        <td>\$$totalItemPrice</td>
                    </tr>";

                $totalPrice += $totalItemPrice;
            }
        }
    }

    echo "<tr>
            <td colspan='3' style='text-align:right;'><strong>ราคารวมทั้งหมด</strong></td>
            <td><strong>\$$totalPrice</strong></td>
          </tr>";

    echo "</table>";
    echo "<br><a href='checkout.php'>ไปที่การชำระเงิน</a>";
}
?>
