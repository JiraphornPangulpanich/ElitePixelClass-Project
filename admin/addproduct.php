<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f0e1; /* Cream background */
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            background-color: #fff5e1; /* Cream menu bar */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .navbar-brand {
            color: #4a4a4a !important; /* Dark gray text */
        }
        .tm-block {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
        }
        h2 {
            color: #4a4a4a;
            font-weight: 700;
        }
        .btn-primary {
            background-color: #ff8a5c;
            border: none;
            border-radius: 50px;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #f56b45;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: none;
            padding: 10px 15px;
        }
        .form-label {
            font-weight: 600;
            color: #4a4a4a;
        }
        .footer {
            background-color: #fff5e1;
            color: #4a4a4a;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }
        .footer a {
            color: #ff8a5c;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-box-open"></i> Admin Dashboard</a>
        </div>
    </nav>

    <!-- Add Product Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="tm-block">
                    <h2 class="mb-4 text-center">Add New Product</h2>
                    <form method="POST" action="add_product.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-control" name="category" required>
                                <option value="">-- Select Category --</option>
                                <option>Keyboard</option>
                                <option>Gaming Laptop</option>
                                <option>Mouse</option>
                                <option>Gaming Chair</option>
                                <option>Gaming Mic</option>
                                <option>Joy Stick & Console</option>
                                <option>Speaker</option>
                                <option>Screen</option>
                                <option>Earphones</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price ($)</label>
                            <input type="number" class="form-control" name="price" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="product_image" accept="image/*" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-plus-circle"></i> Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Admin Dashboard. All rights reserved. | <a href="#">Privacy Policy</a></p>
    </div>

</body>
</html>
