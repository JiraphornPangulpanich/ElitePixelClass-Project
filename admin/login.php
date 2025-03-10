<?php
session_start();
include_once("connectdb.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            // เก็บข้อมูลใน Session
            $_SESSION['username'] = $row['username'];
            header("Location: index.php"); // เปลี่ยนเส้นทางไปยังหน้า index.php
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    } else {
        $error = "Invalid username or password!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ElitePixel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --yellow: #FFC107;
            --gray-dark: #333;
            --gray-light: #666;
            --white: #fff;
        }
        body {
            background-color: var(--gray-dark);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: var(--white);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .login-box h2 {
            color: var(--yellow);
            margin-bottom: 10px;
        }
        .text-muted {
            color: var(--gray-light);
        }
        .form-group {
            text-align: left;
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            color: var(--gray-dark);
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--gray-light);
            border-radius: 6px;
            font-size: 16px;
        }
        .btn-yellow {
            background-color: var(--yellow);
            color: var(--gray-dark);
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-yellow:hover {
            background-color: #e0a800;
        }
        p a {
            color: var(--yellow);
            font-weight: bold;
            text-decoration: none;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<<?php
// เชื่อมต่อฐานข้อมูล
include_once("db.php");

// ตรวจสอบการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // ไม่ต้อง escape เพราะไม่ได้ใช้ใน SQL โดยตรง

    // ตรวจสอบ username ในฐานข้อมูล
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            // เข้าสู่ระบบสำเร็จ
            echo "<script>alert('Login successful! Welcome, $username.');</script>";
            // Redirect ไปหน้า dashboard
            header("Location: index.php");
            exit();
        } else {
            // รหัสผ่านไม่ถูกต้อง
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        // ไม่พบ username ในฐานข้อมูล
        echo "<script>alert('Username not found. Please try again.');</script>";
    }
}
?>

<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>
        <p class="text-muted">Please enter your credentials</p>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-yellow btn-block">Login</button>
        </form>
    </div>
</div>

<script>
    setTimeout(function () {
        let alert = document.querySelector(".alert");
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>

</body>
</html>
