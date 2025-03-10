<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #1E3A5F, #FFC107);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #F8F9FA;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
        .btn-primary {
            background-color: #002855;
            border: none;
        }
        .btn-primary:hover {
            background-color: #001f3f;
        }
    </style>
</head>
<body>

<?php
session_start();  // เริ่ม session

// ตรวจสอบว่ามีข้อความผิดพลาดใน session หรือไม่
if (isset($_SESSION["Error"])) {
    echo '<div class="alert alert-danger text-center" id="error-alert">' . $_SESSION["Error"] . '</div>';
    unset($_SESSION["Error"]); // ลบข้อความแจ้งเตือนหลังจากแสดงแล้ว
}
?>

<div class="login-container">
    <h3 class="text-center">Log In</h3>
    <form method="POST" action="checklogin.php">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="text-center mt-3">Don't have an account? <a href="singup.php">Sign Up</a></p>
</div>

<script>
// ตั้งเวลาให้ข้อความผิดพลาดหายไปหลังจาก 3 วินาที
setTimeout(function () {
    let alert = document.getElementById("error-alert"); // เข้าถึงข้อความผิดพลาดโดยใช้ id
    if (alert) {
        alert.style.transition = "opacity 0.5s"; // เพิ่ม transition ให้ข้อความค่อยๆ หายไป
        alert.style.opacity = "0"; // ทำให้ข้อความหาย
        setTimeout(() => alert.remove(), 500); // ลบ element หลังจากทำให้ opacity เป็น 0
    }
}, 3000); // 3 วินาที
</script>


</body>
</html>
