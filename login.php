<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #003366, #FFD700);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .btn-custom {
            background: #FFD700;
            color: #003366;
            border: none;
        }
        .btn-custom:hover {
            background: #e6c300;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-primary">Welcome Back</h2>
        <p class="text-muted">Please login to your account</p>
        <form>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Login</button>
        </form>
    </div>
</body>
</html>