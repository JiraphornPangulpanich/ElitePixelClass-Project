<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มหมวดหมู่สินค้า</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body style="background-color: #fff;">
<?php include 'menu1.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">เพิ่มหมวดหมู่สินค้า</h3>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อหมวดหมู่" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">เพิ่มหมวดหมู่</button>
                        <a href="admin_dashboard.php" class="btn btn-secondary w-100 mt-2">กลับไปหน้าหลัก</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
