<?php
include 'condb.php';

// รับค่า id สินค้าที่ต้องการแก้ไข
$id = $_GET['id'];

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql = "SELECT * FROM Product WHERE IDitem = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

// ตรวจสอบว่ามีการกดปุ่มบันทึกหรือไม่
if (isset($_POST['submit'])) {
    // รับค่าจากฟอร์ม
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
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย'); window.location='product.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>แก้ไขสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">แก้ไขสินค้า</h2>

        <form method="POST">
            <div class="mb-3">
                <label>หมวดหมู่สินค้า (Categories):</label>
                <input type="text" name="Categories" class="form-control" value="<?= $row['Categories'] ?>" required>
            </div>

            <div class="mb-3">
                <label>ชื่อสินค้า (Name):</label>
                <input type="text" name="Name" class="form-control" value="<?= $row['Name'] ?>" required>
            </div>

            <div class="mb-3">
                <label>รายละเอียดสินค้า (Detail):</label>
                <textarea name="Detail" class="form-control" rows="4" required><?= $row['Detail'] ?></textarea>
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

            <button type="submit" name="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
            <a href="product.php" class="btn btn-secondary">ยกเลิก</a>
        </form>
    </div>
</body>

</html>
