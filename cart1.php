<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    echo "กรุณาล็อกอินก่อนทำการซื้อสินค้า";
    exit;
}

$username = $_SESSION['username']; // ดึง username จาก session

// ตรวจสอบการทำงานของการเพิ่ม ลด หรือ ลบสินค้า
if (isset($_GET['action']) && isset($_GET['id'])) {
    $itemId = $_GET['id'];
    $action = $_GET['action'];

    // เพิ่มสินค้า
    if ($action == 'add') {
        // ตรวจสอบจำนวนสินค้าที่มีในฐานข้อมูล
        $sql = "SELECT Num FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $availableQuantity = $row['Num']; // จำนวนสินค้าที่มีในฐานข้อมูล

            // ตรวจสอบว่ามีสินค้าที่เหลือพอหรือไม่
            $sql = "SELECT quantity FROM user_cart WHERE username = '$username' AND itemId = '$itemId'";
            $cartResult = $conn->query($sql);

            if ($cartResult->num_rows > 0) {
                // ถ้ามีสินค้าในตะกร้าแล้ว, เพิ่มจำนวน
                $cartRow = $cartResult->fetch_assoc();
                if ($cartRow['quantity'] < $availableQuantity) {
                    // อัพเดตจำนวนในตะกร้า
                    $newQuantity = $cartRow['quantity'] + 1;
                    $updateSql = "UPDATE user_cart SET quantity = '$newQuantity' WHERE username = '$username' AND itemId = '$itemId'";
                    $conn->query($updateSql);
                } else {
                    echo "<script>alert('จำนวนสินค้าที่มีในตะกร้ามีมากที่สุดแล้ว');</script>";
                }
            } else {
                // ถ้ายังไม่มีสินค้าตัวนี้ในตะกร้า, เพิ่มสินค้าใหม่
                $insertSql = "INSERT INTO user_cart (username, itemId, quantity) VALUES ('$username', '$itemId', 1)";
                $conn->query($insertSql);
            }
        }
    }

    // ลดจำนวนสินค้า
    if ($action == 'decrease') {
        $sql = "SELECT quantity FROM user_cart WHERE username = '$username' AND itemId = '$itemId'";
        $cartResult = $conn->query($sql);

        if ($cartResult->num_rows > 0) {
            $cartRow = $cartResult->fetch_assoc();
            if ($cartRow['quantity'] > 1) {
                $newQuantity = $cartRow['quantity'] - 1;
                $updateSql = "UPDATE user_cart SET quantity = '$newQuantity' WHERE username = '$username' AND itemId = '$itemId'";
                $conn->query($updateSql);
            }
        }
    }

    // ลบสินค้าออกจากตะกร้า
    if ($action == 'remove') {
        $sql = "DELETE FROM user_cart WHERE username = '$username' AND itemId = '$itemId'";
        $conn->query($sql);
    }
}

echo "<h3>สินค้าของคุณในตะกร้า</h3>";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // ดึงข้อมูลสินค้าจากตะกร้าของผู้ใช้
    $sql = "SELECT c.itemId, c.quantity, p.Name, p.Price FROM user_cart c JOIN Product p ON c.itemId = p.Iditem WHERE c.username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $totalQuantity = 0; // ตัวแปรสำหรับเก็บผลรวมจำนวนสินค้า
        $totalPrice = 0; // ตัวแปรสำหรับเก็บผลรวมราคา

        echo "<ul>"; // เริ่มต้นรายการสินค้า
        while ($row = $result->fetch_assoc()) {
            $totalPrice += $row["Price"] * $row["quantity"];
            $totalQuantity += $row["quantity"];

            echo "<li>" . $row["Name"] . " - " . $row["quantity"] . " ชิ้น - ราคา: " . number_format($row["Price"], 2) . " บาท";
            echo " <a href='cart1.php?action=decrease&id=" . $row["itemId"] . "' class='btn btn-warning'>ลด</a>";
            echo " <a href='cart1.php?action=remove&id=" . $row["itemId"] . "' class='btn btn-danger'>ลบ</a>";
            echo " <a href='cart1.php?action=add&id=" . $row["itemId"] . "' class='btn btn-success'>เพิ่ม</a>";
            echo "</li>";
        }
        echo "</ul>"; // ปิดรายการสินค้า

        // แสดงผลรวม
        echo "<h4>จำนวนสินค้าทั้งหมด: " . $totalQuantity . " ชิ้น</h4>";
        echo "<h4>ราคาทั้งหมด: " . number_format($totalPrice, 2) . " บาท</h4>";
    } else {
        echo "<h3>ตะกร้าของคุณยังว่างอยู่</h3>";
    }
} else {
    echo "กรุณาล็อกอินเพื่อดูตะกร้าของคุณ";
}
?>

<!-- ปุ่มกลับไปหน้า index1.php -->
<a href="index1.php" class="btn btn-primary">กลับไปหน้าหลัก</a>
