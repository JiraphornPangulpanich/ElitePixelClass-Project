<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีข้อมูลที่ส่งมาจากฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าจากฟอร์ม
    $id = $_POST['id'];
    $username = $_POST['username']; // username จะไม่ถูกแก้ไข
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];

    // สร้างคำสั่ง SQL เพื่ออัพเดตข้อมูล
    $sql = "UPDATE member SET firstname = ?, lastname = ?, phone = ? WHERE id = ?";
    
    // ใช้การเตรียมคำสั่ง (prepared statement) เพื่อป้องกัน SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $firstname, $lastname, $phone, $id); // binding parameters

        // ตรวจสอบการอัพเดตข้อมูล
        if ($stmt->execute()) {
            // ถ้าอัพเดตสำเร็จ
            $_SESSION['message'] = "ข้อมูลถูกบันทึกสำเร็จ!";
            header("Location: edit_profile.php?id=$id"); // กลับไปที่หน้าโปรไฟล์
            exit;
        } else {
            // ถ้ามีข้อผิดพลาด
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล!";
            header("Location: edit_profile.php?id=$id");
            exit;
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "ไม่สามารถเตรียมคำสั่ง SQL ได้!";
        header("Location: edit_profile.php?id=$id");
        exit;
    }
}

$conn->close();
?>
