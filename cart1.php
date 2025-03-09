<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล


// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    header('Location: index.php');;
    echo "<script>alert('โปรดเข้าสู่ระบบเพื่อสั่งสินค้า');</script>";
    exit;
}

$username = $_SESSION['username']; // ดึง username จาก session


// ตรวจสอบการทำงานของการเพิ่ม ลด หรือ ลบสินค้า
if (isset($_GET['action']) && isset($_GET['id'])) {
    $itemId = $_GET['id'];
    $action = $_GET['action'];

    // ตรวจสอบว่ามีตะกร้าหรือไม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // เพิ่มสินค้า
    if ($action == 'add') {
        // ตรวจสอบจำนวนสินค้าที่มีในฐานข้อมูล
        $sql = "SELECT Num FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $availableQuantity = $row['Num']; // จำนวนสินค้าที่มีในฐานข้อมูล

            // ตรวจสอบว่ามีสินค้าที่เหลือพอหรือไม่
            if (isset($_SESSION['cart'][$itemId])) {
                // ถ้ามีสินค้าในตะกร้าแล้ว, ตรวจสอบว่าจำนวนสินค้าที่จะเพิ่มไม่เกินจำนวนที่มีในฐานข้อมูล
                if ($_SESSION['cart'][$itemId] < $availableQuantity) {
                    $_SESSION['cart'][$itemId]++; // เพิ่มจำนวนสินค้าในตะกร้า
                    // ลดจำนวนสินค้าที่เหลือในคลัง
                    $availableQuantity--;
                    $conn->query("UPDATE Product SET Num = '$availableQuantity' WHERE Iditem = '$itemId'");
                } else {
                    
                }
            } else {
                $_SESSION['cart'][$itemId] = 1; // เพิ่มสินค้าใหม่เข้าไปในตะกร้า
                // ลดจำนวนสินค้าที่เหลือในคลัง
                $availableQuantity--;
                $conn->query("UPDATE Product SET Num = '$availableQuantity' WHERE Iditem = '$itemId'");
            }
        }
    }

    // ลดจำนวนสินค้า
    if ($action == 'decrease') {
        if (isset($_SESSION['cart'][$itemId]) && $_SESSION['cart'][$itemId] > 1) {
            $_SESSION['cart'][$itemId]--; // ลดจำนวนสินค้าในตะกร้า
            // เพิ่มจำนวนสินค้าที่เหลือในคลัง
            $sql = "SELECT Num FROM Product WHERE Iditem = '$itemId'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $availableQuantity = $row['Num'];
                $availableQuantity++;
                $conn->query("UPDATE Product SET Num = '$availableQuantity' WHERE Iditem = '$itemId'");
            }
        }
    }

    // ลบสินค้าออกจากตะกร้า
    if ($action == 'remove') {
        unset($_SESSION['cart'][$itemId]); // ลบสินค้าออกจากตะกร้า
        // เพิ่มจำนวนสินค้าที่เหลือในคลัง
        $sql = "SELECT Num FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $availableQuantity = $row['Num'];
            $availableQuantity++;
            $conn->query("UPDATE Product SET Num = '$availableQuantity' WHERE Iditem = '$itemId'");
        }
    }
}

// แสดงสินค้าในตะกร้า
echo "<h3>สินค้าของคุณในตะกร้า</h3>";

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $totalQuantity = 0; // ตัวแปรสำหรับเก็บผลรวมจำนวนสินค้า
    $totalPrice = 0; // ตัวแปรสำหรับเก็บผลรวมราคา

    echo "<ul>"; // เริ่มต้นรายการสินค้า

    // Loop ผ่านสินค้าในตะกร้า
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $sql = "SELECT Name, Price, Num FROM Product WHERE Iditem = '$itemId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // ถ้ามีสินค้าตรงกับ $itemId ให้แสดงข้อมูล
            while ($row = $result->fetch_assoc()) {
                $availableQuantity = $row["Num"]; // จำนวนสินค้าที่มีในคลัง
                $price = $row["Price"]; // ราคาสินค้า

                // คำนวณราคาทั้งหมดของสินค้าตัวนี้
                $totalPrice += $price * $quantity;
                // คำนวณผลรวมจำนวนสินค้าทั้งหมด
                $totalQuantity += $quantity;

                echo "<li>" . $row["Name"] . " - " . $quantity . " ชิ้น - ราคา: " . number_format($price, 2) . " บาท" ;
                echo " <a href='cart1.php?action=decrease&id=$itemId' class='btn btn-warning'>ลด</a>";
                echo " <a href='cart1.php?action=remove&id=$itemId' class='btn btn-danger'>ลบ</a>";

                // เช็คจำนวนที่เหลือในคลัง, ไม่ให้เพิ่มเกินจำนวนที่มีในคลัง
                if ($quantity < $availableQuantity) {
                    echo " <a href='cart1.php?action=add&id=$itemId' class='btn btn-success'>เพิ่ม</a>";
                } else {
                    echo " <span>จำนวนสินค้าในคลังเหลือ: " . $availableQuantity . " ชิ้น</span>";
                }
                

                echo "</li>";
            }
        } else {
            // ถ้าไม่มีสินค้าตรงกับ Iditem
            echo "<li>ไม่พบข้อมูลสินค้าที่คุณเลือก</li>";
        }
    }
    echo "</ul>"; // ปิดรายการสินค้า

    // แสดงผลรวม
    echo "<h4>จำนวนสินค้าทั้งหมด: " . $totalQuantity . " ชิ้น</h4>";
    echo "<h4>ราคาทั้งหมด: " . number_format($totalPrice, 2) . " บาท</h4>";
} else {
    echo "<h3>ตะกร้าของคุณยังว่างอยู่</h3>";
}
?>

<a href="index1.php" class="btn btn-primary">กลับไปหน้าหลัก</a>