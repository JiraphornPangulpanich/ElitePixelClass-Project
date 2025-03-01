<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* พื้นหลังหรูหรา Gradient น้ำเงินเข้ม -> ทอง */
        body {
            background: linear-gradient(to right, #001f3f, #f1c40f);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        /* กล่อง Signup */
        .signup-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 450px;
            width: 100%;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* โลโก้ */
        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #f1c40f;
        }

        /* ช่องกรอกข้อมูล */
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            padding: 12px;
            font-size: 14px;
            border-radius: 50px;
            color: white;
            transition: 0.3s;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            outline: none;
            box-shadow: none;
        }

        /* ปุ่มสมัครสมาชิก */
        .btn-signup {
            background: linear-gradient(to right, #f1c40f, #ffdb58);
            border: none;
            color: #001f3f;
            font-weight: bold;
            padding: 12px;
            width: 100%;
            border-radius: 50px;
            font-size: 16px;
            transition: 0.3s;
        }

        .btn-signup:hover {
            background: linear-gradient(to right, #ffdb58, #f1c40f);
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(241, 196, 15, 0.5);
        }

        /* ลิงก์ไปหน้า Login */
        .login-link {
            text-decoration: none;
            color: #f1c40f;
            font-size: 14px;
        }

        .login-link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="signup-container">
        <div class="logo mb-4">🌟 Elite Signup</div>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-signup">Sign Up</button>
            <div class="mt-3">
                <a href="login.html" class="login-link">Already have an account? Login</a>
            </div>
        </form>
    </div>

</body>
</html>
