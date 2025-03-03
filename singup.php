<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #001f3f, #003366);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            background: #f1c40f;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 400px;
        }
        .form-control {
            background: #fdfdfd;
            border: none;
            border-radius: 10px;
        }
        .btn-primary {
            background: #001f3f;
            border: none;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background: #003366;
        }
        .social-icons a {
            font-size: 20px;
            margin: 0 10px;
            color: #001f3f;
        }
    </style>
</head>
<body>
    <div class="card p-4">
        <h3 class="text-center text-dark">ElitePixel</h3>
        <form action="index.php">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="First Name" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" placeholder="Age" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
        <div class="text-center mt-3">
            <p>Or sign up with</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</body>
</html>