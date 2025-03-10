<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เปลี่ยนรหัสผ่าน</title>
</head>

<body>
<form method="post" action="">
    <input type="password" name="current_password" placeholder="รหัสผ่านเดิม" required>
    <input type="password" name="new_password" placeholder="รหัสผ่านใหม่" required>
    <input type="password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" required>
    <button type="submit">เปลี่ยนรหัสผ่าน</button>
</form>

<?php
session_start();
include_once("db.php");

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบหรือไม่
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('กรุณาเข้าสู่ระบบก่อน'); window.location='login.php';</script>";
    exit();
}

$user_id = $_SESSION['user_id']; // รับ user_id จาก session

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // ดึงรหัสผ่านเก่าจากฐานข้อมูล
    $stmt = $conn->prepare("SELECT password FROM admin WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // เช็ครหัสผ่านเดิม
        if (!password_verify($current_password, $hashed_password)) {
            echo "<script>alert('รหัสผ่านเดิมไม่ถูกต้อง');</script>";
        } elseif ($new_password !== $confirm_password) {
            echo "<script>alert('รหัสผ่านใหม่ไม่ตรงกัน');</script>";
        } else {
            // เข้ารหัสรหัสผ่านใหม่
            $new_hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE admin SET password = ? WHERE id = ?");
            $update_stmt->bind_param("si", $new_hashed, $user_id);
            $update_stmt->execute();

            if ($update_stmt->affected_rows > 0) {
                echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('ไม่สามารถเปลี่ยนรหัสผ่านได้');</script>";
            }
        }
    } else {
        echo "<script>alert('ไม่พบผู้ใช้ในระบบ');</script>";
    }
}
?>
</body>
</html>
