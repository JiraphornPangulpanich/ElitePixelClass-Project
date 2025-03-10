<?php
session_start();
include 'db.php';

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
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
        /* 🎨 Color Theme */
        :root {
            --yellow: #FFC107;
            --gray-dark: #333;
            --gray-light: #666;
            --white: #fff;
        }

        /* 🔹 Body Styles */
        body {
            background-color: var(--gray-dark);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* 🔹 Login Box */
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

        /* 🔹 Form Inputs */
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

        /* 🔹 Login Button */
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

        /* 🔹 Register Link */
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

<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>
        <p class="text-muted">Please enter your credentials</p>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php } ?>

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

</body>
</html>
