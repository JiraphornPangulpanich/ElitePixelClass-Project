<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            font-weight: 600;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-radius: 12px;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0069d9;
        }
        .btn-secondary {
            border-radius: 12px;
        }
        label {
            font-weight: 500;
            margin-bottom: 6px;
        }
        .form-control {
            border-radius: 12px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
        }
    </style>
</head>

<body>
<?php include 'menu1.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card p-4">
                <h3 class="text-center mb-4"><i class="fa fa-folder-plus me-2"></i>เพิ่มหมวดหมู่สินค้า</h3>

                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อหมวดหมู่</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อหมวดหมู่" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2"><i class="fa fa-plus-circle me-1"></i> เพิ่มหมวดหมู่</button>
                    <a href="admin_dashboard.php" class="btn btn-secondary w-100 mt-3 py-2"><i class="fa fa-arrow-left me-1"></i> กลับไปหน้าหลัก</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
