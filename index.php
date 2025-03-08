<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #001f3f, #00509e);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: #fdd835;
            border-radius: 10px;
            padding: 30px;
            width: 350px;
            position: relative;
            box-shadow: 8px 8px 0px rgba(0, 0, 0, 0.2);
        }
        .card::before {
            content: "";
            position: absolute;
            top: 10px;
            left: 10px;
            width: 100%;
            height: 100%;
            background: #ffc107;
            border-radius: 10px;
            z-index: -1;
        }
        .form-control {
            border-radius: 5px;
            border: 2px solid #001f3f;
        }
        .btn-primary {
            background: #001f3f;
            border: none;
            transition: 0.3s;
        }
        .btn-primary:hover {
            background: #003366;
        }
        .social-icons a {
            margin: 5px;
            color: #001f3f;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="card text-center">
        <h2 class="mb-3">Log In</h2>
        <form action="index1.php">
            <input type="text" class="form-control mb-3" placeholder="Username" required>
            <input type="password" class="form-control mb-3" placeholder="Password" required>
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary w-100">Log In</button>
        </form>
        <p class="mt-3">Or</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-envelope"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p class="mt-3">I have an account <a href="singup.php" style="color: #001f3f;">Sign In</a></p>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
