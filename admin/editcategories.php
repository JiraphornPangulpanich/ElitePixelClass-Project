<?php
include_once("condb.php");

// ดึงข้อมูลหมวดหมู่
if (isset($_GET['Id'])) {
    $Id = intval($_GET['Id']);
    $sql = "SELECT * FROM Categories WHERE Id = $Id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "<script>alert('ไม่พบข้อมูลหมวดหมู่'); window.location='categories.php';</script>";
        exit;
    }
}

// อัพเดทข้อมูล
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $id = intval($_POST['Id']); // ต้องได้ค่า Id

    // ดูค่าที่จะรัน
    $sqlUpdate = "UPDATE Categories SET Name = '$name' WHERE Id = $id";
    echo "DEBUG SQL: " . $sqlUpdate . "<br>"; // Debug ดูคำสั่ง SQL

    // ลองอัพเดทจริง
    if (mysqli_query($conn, $sqlUpdate)) {
        echo "<script>alert('แก้ไขหมวดหมู่สำเร็จ'); window.location='categories.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn); // แสดง error ถ้าเกิด
    }
}
?>







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
</head>
<body style="background-color: #fff;">
<?php include 'menu1.php'; ?>

<div class="container mt-5">
    <h2>แก้ไขหมวดหมู่สินค้า</h2>
    <form method="POST">
    <input type="hidden" name="Id" value="<?= htmlspecialchars($row['Id']) ?>"> <!-- ซ่อน ID เพื่อนำไปแก้ไข -->
    <div class="mb-3">
        <label>ชื่อหมวดหมู่สินค้า :</label>
        <input type="text" name="Name" class="form-control" value="<?= htmlspecialchars($row['Name']) ?>" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
    <a href="categories.php" class="btn btn-secondary">กลับหน้าเดิม</a>
</form>

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
