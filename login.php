<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #0033cc, #ffcc00); /* น้ำเงินไปเหลือง */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .btn-login {
            background-color: #ffcc00;
            border: none;
            color: #0033cc;
            font-weight: bold;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #ffdb4d;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #0033cc;
        }
        .form-label {
            font-weight: bold;
            color: #0033cc;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2 class="mb-4 text-primary">Login</h2>
        <form action="index.html" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

</body>
</html>
