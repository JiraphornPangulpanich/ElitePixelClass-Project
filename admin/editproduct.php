<?php
include 'condb.php';

$id = $_GET['id'];

// ดึงข้อมูลสินค้า
$sql = "SELECT * FROM Product WHERE IDitem = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$old_image = $row['Ext']; // เก็บชื่อไฟล์รูปเดิม

if (isset($_POST['submit'])) {
    $Categories = $_POST['Categories'];
    $Name = $_POST['Name'];
    $Detail = $_POST['Detail'];
    $Price = $_POST['Price'];
    $Num = $_POST['Num'];

    // ตรวจสอบว่ามีการอัปโหลดรูปใหม่หรือไม่
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "img/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // ตรวจสอบว่าเป็นไฟล์ภาพจริง
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        } else {
            echo "<script>alert('Invalid image file.');</script>";
            exit;
        }
    } else {
        $image_name = $old_image; // ใช้รูปเดิมถ้าไม่ได้อัปโหลดใหม่
    }

    // อัพเดตข้อมูลสินค้า
    $sql_update = "UPDATE Product SET 
                    Categories = '$Categories',
                    Name = '$Name',
                    Detail = '$Detail',
                    Price = '$Price',
                    Ext = '$image_name',
                    Num = '$Num'
                  WHERE IDitem = '$id'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Updated successfully!'); window.location='product.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
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
        <h2 class="text-warning">Edit Product</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Categories:</label>
                <input type="text" name="Categories" class="form-control" value="<?= $row['Categories'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Product Name:</label>
                <input type="text" name="Name" class="form-control" value="<?= $row['Name'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Detail:</label>
                <textarea name="Detail" class="form-control" rows="3" required><?= $row['Detail'] ?></textarea>
            </div>

            <div class="mb-3">
                <label>Price:</label>
                <input type="number" name="Price" class="form-control" value="<?= $row['Price'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Stock:</label>
                <input type="number" name="Num" class="form-control" value="<?= $row['Num'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Current Image:</label><br>
                <?php 
        $id = $row['Iditem']; // ดึง ID ของสินค้า
        $image_path = glob("img/$id.*")[0] ?? "img/no-image.png"; // ค้นหาภาพที่ชื่อขึ้นต้นด้วย ID เช่น 101.1.jpg

        echo "<img src='$image_path' alt='Product Image' style='max-width: 100px;'>";
    ?>
            </div>

           

            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
            <a href="product.php" class="btn btn-secondary">Back</a>
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
