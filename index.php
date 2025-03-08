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

    <div class="login-container">
        <h3 class="text-center">Log In</h3>
        <form onsubmit="return loginUser()">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="singup.php">Sign Up</a></p>
    </div>

    <script>
        function loginUser() {
            // เมื่อกด login ให้เปลี่ยนไปหน้า index.html
            window.location.href = "index1.php";
            return false; // ป้องกัน form รีเฟรชหน้า
        }
    </script>

</body>
</html>
