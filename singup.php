<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #001f3f, #00509d);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: rgba(255, 215, 0, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        .form-control {
            border-radius: 5px;
        }
        .social-icons i {
            font-size: 24px;
            margin: 10px;
            cursor: pointer;
        }
        .btn-register {
            background-color: #001f3f;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="text-dark">Register</h2>
        <form action="index.html" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-register">Sign Up</button>
        </form>
        <p class="mt-3">Or Sign Up with</p>
        <div class="social-icons">
            <i class="fab fa-google text-danger"></i>
            <i class="fab fa-facebook text-primary"></i>
            <i class="fab fa-twitter text-info"></i>
        </div>
        <p class="mt-3">Already have an account? <a href="login.html">Login</a></p>
    </div>
</body>
</html>
