<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* พื้นหลังไล่เฉดสี น้ำเงิน -> เหลือง */
        body {
            background: linear-gradient(to right, #002855, #ffcc00);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        
        /* กล่องล็อกอิน */
        .login-container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        /* โลโก้ */
        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #002855;
        }

        /* ปุ่มล็อกอิน */
        .btn-login {
            background-color: #ffcc00;
            border: none;
            color: #002855;
            font-weight: bold;
            padding: 12px;
            width: 100%;
            border-radius: 50px;
            transition: 0.3s;
            font-size: 16px;
        }

        .btn-login:hover {
            background-color: #ffd633;
        }

        /* ช่องกรอกข้อมูล */
        .form-control {
            border-radius: 50px;
            border: 1.5px solid #002855;
            padding: 12px;
            font-size: 14px;
        }

        /* ลิงก์ Forgot Password */
        .forgot-password {
            text-decoration: none;
            color: #002855;
            font-size: 14px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="login-container">
        <div class="logo mb-3">🔒 Login</div>
        <form action="index1.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
            <div class="mt-3">
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
        </form>
    </div>

    <?php
include_once("../connectdb.php");

if (isset($_POST['Submit'])) {
    $usr = mysqli_real_escape_string($conn, $_POST['usr']);
    $pwd = $_POST['pwd'];
    
    // ดึงข้อมูลจากฐานข้อมูลโดยใช้ prepared statement
    $sql = "SELECT * FROM admin WHERE a_usr = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $usr);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        // ตรวจสอบรหัสผ่าน
        if (password_verify($pwd, $row['a_pwd'])) {
            $_SESSION['s_id'] = $row['a_id'];
            $_SESSION['s_name'] = $row['a_name'];
            echo "<script>window.location='index1.php';</script>";
            exit();
        } else {
            echo "Username or Password incorrect";
            exit();
        }
    } else {
        echo "Username or Password incorrect";
        exit();
    }
}
?>

</body>
</html>
