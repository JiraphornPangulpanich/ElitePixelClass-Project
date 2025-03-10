<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เปลี่ยนรหัสผ่าน</title>
</head>

<body>
<form method="post" action="">
    <input type="text" name="username" placeholder="ชื่อผู้ใช้ (Username)" required>
    <input type="password" name="new_password" placeholder="รหัสผ่านใหม่" required>
    <input type="password" name="confirm_password" placeholder="ยืนยันรหัสผ่านใหม่" required>
    <button type="submit">เปลี่ยนรหัสผ่าน</button>
</form>

<?php
include_once("db.php"); // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // ตรวจสอบว่ามี username นี้ในระบบหรือไม่
    $stmt = $conn->prepare("SELECT id FROM admin WHERE user = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        if ($new_password !== $confirm_password) {
            echo "<script>alert('❌ รหัสผ่านใหม่ไม่ตรงกัน');</script>";
        } else {
            // เข้ารหัสรหัสผ่านใหม่
            $new_hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE admin SET password = ? WHERE user = ?");
            $update_stmt->bind_param("ss", $new_hashed, $username);
            $update_stmt->execute();

            if ($update_stmt->affected_rows > 0) {
                echo "<script>alert('✅ เปลี่ยนรหัสผ่านสำเร็จ');</script>";
            } else {
                echo "<script>alert('⚠️ ไม่สามารถเปลี่ยนรหัสผ่านได้');</script>";
            }
        }
    } else {
        echo "<script>alert('❌ ไม่พบชื่อผู้ใช้ในระบบ');</script>";
    }
}
?>
</body>
</html>
