<?php
include 'condb.php';

$id = $_GET['id'];

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM Product WHERE IDitem = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// เช็คว่ามีการกดปุ่มบันทึกหรือยัง
if (isset($_POST['submit'])) {
    $Categories = $_POST['Categories'];
    $Name = $_POST['Name'];
    $Detail = $_POST['Detail'];
    $Price = $_POST['Price'];
    $Ext = $_POST['Ext'];
    $Num = $_POST['Num'];

    // อัพเดตข้อมูลสินค้า
    $sql_update = "UPDATE Product SET 
                    Categories = '$Categories',
                    Name = '$Name',
                    Detail = '$Detail',
                    Price = '$Price',
                    Ext = '$Ext',
                    Num = '$Num'
                  WHERE IDitem = '$id'";

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
        <h2>แก้ไขสินค้า</h2>
        <form method="POST">
            <div class="mb-3">
                <label>หมวดหมู่ (Categories):</label>
                <input type="text" name="Categories" class="form-control" value="<?= $row['Categories'] ?>" required>
            </div>

            <div class="mb-3">
                <label>ชื่อสินค้า (Name):</label>
                <input type="text" name="Name" class="form-control" value="<?= $row['Name'] ?>" required>
            </div>

            <div class="mb-3">
                <label>รายละเอียด (Detail):</label>
                <textarea name="Detail" class="form-control" rows="3" required><?= $row['Detail'] ?></textarea>
            </div>

            <div class="mb-3">
                <label>ราคา (Price):</label>
                <input type="number" name="Price" class="form-control" value="<?= $row['Price'] ?>" required>
            </div>

            <div class="mb-3">
                <label>นามสกุลไฟล์รูป (Ext):</label>
                <input type="text" name="Ext" class="form-control" value="<?= $row['Ext'] ?>" required>
            </div>

            <div class="mb-3">
                <label>จำนวนสินค้า (Num):</label>
                <input type="number" name="Num" class="form-control" value="<?= $row['Num'] ?>" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
            <a href="product.php" class="btn btn-secondary">กลับหน้าเดิม</a>
        </form>
    </div>
</body>
</html>
