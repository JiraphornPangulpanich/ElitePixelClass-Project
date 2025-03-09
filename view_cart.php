<?php
session_start();
echo "<h2>ตะกร้าสินค้า</h2>";

if (!empty($_SESSION['cart'])) {
    echo "<table border='1'>";
    echo "<tr><th>สินค้า</th><th>ราคา</th><th>จำนวน</th><th>รวม</th><th>ลบ</th></tr>";
    
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $item) {
        $sum = $item['price'] * $item['quantity'];
        $total += $sum;
        echo "<tr>
                <td>{$item['name']}</td>
                <td>\${$item['price']}</td>
                <td>{$item['quantity']}</td>
                <td>\${$sum}</td>
                <td><a href='remove_cart.php?Iditem={$id}'>ลบ</a></td>
              </tr>";
    }
    echo "<tr><td colspan='3'>รวมทั้งหมด</td><td>\$$total</td><td></td></tr>";
    echo "</table>";
} else {
    echo "ตะกร้าว่างเปล่า";
}
?>
