<?php
include 'condb.php';

$Id = $_GET['Id'];

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM Categories WHERE Id = '$Id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// เช็คว่ามีการกดปุ่มบันทึกหรือยัง
if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];


    // อัพเดตข้อมูลสินค้า
    $sql_update = "UPDATE Categories SET 
                    Name = '$Name',
                  WHERE Id = '$Id'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('แก้ไขข้อมูลสำเร็จ'); window.location='product.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php include 'menu1.php'; ?>

    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>แก้ไขสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2>แก้ไขหมวดหมู่สินค้าสินค้า</h2>
        <form method="POST">
          <div class="mb-3">
                <label>ชื่อหมวดหมู่สินค้า :</label>
                <input type="text" name="Name" class="form-control" value="<?= $row['Name'] ?>" required>
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
