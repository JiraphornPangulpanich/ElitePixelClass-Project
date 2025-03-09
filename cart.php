<?php
session_start();

// ถ้าไม่มีตะกร้า ให้สร้าง array เก็บสินค้า
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// รับค่าจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['Iditem'];
    $name = $_POST['Name'];
    $price = $_POST['Price'];

    // ถ้าสินค้าซ้ำให้เพิ่มจำนวน
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$id] = array(
            'name' => $name,
            'price' => $price,
            'quantity' => 1
        );
    }
}

// กลับไปหน้าเดิม
header("Location: index.php"); 
exit();
?>
