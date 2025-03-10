<?php
session_start();
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

<?php
if (isset($error)) {
    echo '<div class="alert alert-danger text-center">' . $error . '</div>';
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


<?php
include_once("db.php");

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
            echo "<script>window.location='index.php';</script>";
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