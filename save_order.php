<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    echo "<script>alert('โปรดเข้าสู่ระบบเพื่อสั่งสินค้า'); window.location='index.php';</script>";
    exit;
}

$username = $_SESSION['username']; // ดึง username จาก session

// ตรวจสอบว่าในตะกร้ามีสินค้า
if (empty($_SESSION['cart'])) {
    echo "<script>alert('ตะกร้าสินค้าของคุณว่างเปล่า'); window.location='index.php';</script>";
    exit;
}

// รับข้อมูลการจัดส่งจากฟอร์ม
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$shipping_method = $_POST['shipping-method'];

// คำนวณยอดรวมจากตะกร้าสินค้า
$totalAmount = 0;
foreach ($_SESSION['cart'] as $itemId => $quantity) {
    // ดึงข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT Price FROM product WHERE Iditem = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row) {
        $totalAmount += $row['Price'] * $quantity;
    }
}

// ตั้งค่าเริ่มต้นสถานะเป็น "รอการจัดส่ง"
$status = "รอการจัดส่ง";

// เริ่มต้นการบันทึกคำสั่งซื้อใหม่
$sql = "INSERT INTO orders (Username, OrderDate, TotalAmount, Status, Name, Address, Phone, ShippingMethod) 
        VALUES (?, NOW(), ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $username, $totalAmount, $status, $name, $address, $phone, $shipping_method);

// ตรวจสอบการบันทึกคำสั่งซื้อ
if ($stmt->execute()) {
    $orderId = $stmt->insert_id; // ได้หมายเลขคำสั่งซื้อที่เพิ่งบันทึก

    // บันทึกสินค้าที่สั่งซื้อในตะกร้าไปยังตาราง order_items
    foreach ($_SESSION['cart'] as $itemId => $quantity) {
        $sql = "INSERT INTO order_items (OrderID, ItemID, Quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $orderId, $itemId, $quantity);
        $stmt->execute();
    }

    // เคลียร์ตะกร้าสินค้าใน session หลังจากบันทึกคำสั่งซื้อ
    unset($_SESSION['cart']);

    echo "<script>alert('คำสั่งซื้อของคุณได้ถูกบันทึกแล้ว'); window.location='order_history.php';</script>";
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกคำสั่งซื้อ'); window.location='index.php';</script>";
}

$stmt->close();
$conn->close();
?>
