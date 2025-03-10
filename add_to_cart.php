<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าได้รับค่าจาก URL หรือไม่
if (isset($_GET['add'])) {
    $itemId = $_GET['add']; // ดึง Iditem จาก URL
    $username = $_SESSION['username']; // ดึง username จาก session

    // เชื่อมต่อฐานข้อมูลและบันทึกสินค้าในตะกร้า
    $sql = "INSERT INTO cart_items (username, Iditem, quantity) 
            VALUES ('$username', '$itemId', 1)
            ON DUPLICATE KEY UPDATE quantity = quantity + 1"; 
    mysqli_query($conn, $sql);

    // รีไดเร็คไปยังหน้า cart1.php
    header('Location: cart1.php');
    exit; // อย่าลืมใส่ exit เพื่อหยุดการทำงานของสคริปต์หลังจาก redirect
} else {
    // ถ้าไม่ได้ส่งค่า 'add' มา ให้แสดงข้อความ หรือทำอะไรเพิ่มเติม
    echo "ไม่มีข้อมูลสินค้า";
}

?>
