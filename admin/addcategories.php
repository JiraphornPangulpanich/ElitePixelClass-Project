<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มหมวดหมู่สินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-section {
            padding: 40px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            border-radius: 12px;
            font-size: 18px;
            padding: 12px 0;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include 'menu1.php'; ?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="form-section">
                <h2 class="text-center mb-4"><i class="fa fa-folder-plus me-2"></i> เพิ่มหมวดหมู่สินค้า</h2>
                
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">ชื่อหมวดหมู่</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="กรอกชื่อหมวดหมู่" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-custom">
                            <i class="fa fa-plus-circle me-1"></i> เพิ่มหมวดหมู่
                        </button>
                        <a href="admin_dashboard.php" class="btn btn-secondary btn-custom">
                            <i class="fa fa-arrow-left me-1"></i> กลับไปหน้าหลัก
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
