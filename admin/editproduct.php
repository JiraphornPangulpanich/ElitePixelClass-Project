<?php
include_once("condb.php");

// ดึงข้อมูลสินค้าตาม id
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE Iditem = '$id' ";
$rs = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($rs);
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>แก้ไขสินค้าของฉัน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">แก้ไขสินค้าของฉัน</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">หมวดหมู่สินค้า</label>
                    <input type="text" name="categories" class="form-control" value="<?php echo $data['Categories']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">ชื่อสินค้า</label>
                    <input type="text" name="pname" class="form-control" value="<?php echo $data['Name']; ?>" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">รายละเอียดสินค้า</label>
                    <textarea name="pdetail" class="form-control" rows="4" required><?php echo $data['Detail']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">ราคา</label>
                    <input type="number" name="pprice" class="form-control" value="<?php echo $data['Price']; ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">รูปภาพปัจจุบัน</label><br>
                    <img src="../images/<?php echo $data['Iditem'] . '.' . $data['Ext']; ?>" width="150" class="rounded" alt="Product Image">
                </div>
                <div class="mb-3">
                    <label class="form-label">เลือกรูปภาพใหม่ (ถ้ามี)</label>
                    <input type="file" name="pimage" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">จำนวนสินค้า</label>
                    <input type="number" name="num" class="form-control" value="<?php echo $data['Num']; ?>" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูลสินค้า</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// ส่วนประมวลผลการบันทึก
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categories = $_POST['categories'];
    $pname = $_POST['pname'];
    $pdetail = $_POST['pdetail'];
    $pprice = $_POST['pprice'];
    $num = $_POST['num'];
    $pimageUpdated = false;

    // อัปโหลดรูปใหม่ถ้ามี
    if (isset($_FILES['pimage']) && $_FILES['pimage']['error'] == 0) {
        $fileTmpPath = $_FILES['pimage']['tmp_name'];
        $fileName = $_FILES['pimage']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            $newFileName = $data['Iditem'] . '.' . $fileExtension;
            $uploadPath = "../images/" . $newFileName;

            // ลบไฟล์เก่าก่อน
            $oldFilePath = "../images/" . $data['Iditem'] . '.' . $data['Ext'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            // ย้ายไฟล์ใหม่
            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                $pimageUpdated = true;
            } else {
                echo "<script>alert('ไม่สามารถอัปโหลดรูปภาพได้');</script>";
            }
        } else {
            echo "<script>alert('ชนิดไฟล์ไม่ถูกต้อง');</script>";
        }
    }

    // สร้างคำสั่ง SQL สำหรับอัปเดต
    if ($pimageUpdated) {
        $sqlUpdate = "UPDATE products 
                      SET Categories='$categories', Name='$pname', Detail='$pdetail', Price='$pprice', Num='$num', Ext='$fileExtension' 
                      WHERE Iditem='$id'";
    } else {
        $sqlUpdate = "UPDATE products 
                      SET Categories='$categories', Name='$pname', Detail='$pdetail', Price='$pprice', Num='$num' 
                      WHERE Iditem='$id'";
    }

    // ประมวลผล SQL
    if (mysqli_query($conn, $sqlUpdate)) {
        echo "<script>alert('แก้ไขข้อมูลสินค้าเรียบร้อยแล้ว'); window.location='my_products.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการแก้ไขข้อมูล');</script>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
