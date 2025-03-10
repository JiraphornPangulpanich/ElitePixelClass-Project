<?php
include_once("condb.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];
    $category_name = $_POST['category'];
    $categories_map = [
        'Keyboard' => 1,
        'Gaming Laptop' => 2,
        'Mouse' => 3,
        'Gaming Chair' => 4,
        'Gaming Mic' => 5,
        'Joy Stick & Console' => 6,
        'Speaker' => 7,
        'Screen' => 8,
        'Earphones' => 9
    ];
    $category = $categories_map[$category_name];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // ตรวจสอบว่ามีรหัสสินค้าซ้ำหรือไม่
    $check_sql = "SELECT * FROM Product WHERE Iditem = '$product_id'";
    $result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('รหัสสินค้านี้มีอยู่แล้ว กรุณาใช้รหัสใหม่');</script>";
    } else {
        if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
            $fileTmpPath = $_FILES['product_image']['tmp_name'];
            $fileName = $_FILES['product_image']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedExtensions)) {
                $newFileName = $product_id . '.' . $fileExtension;
                $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $newFileName;

                $sqlInsert = "INSERT INTO Product (Iditem, Categories, Name, Detail, Price, Num, Ext) 
                              VALUES ('$product_id', $category, '$product_name', '$description', $price, $quantity, '$fileExtension')";
                
                if (mysqli_query($conn, $sqlInsert)) {
                    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                        echo "<script>alert('เพิ่มสินค้าเรียบร้อยแล้ว'); window.location='product.php';</script>";
                    } else {
                        mysqli_query($conn, "DELETE FROM Product WHERE Iditem = '$product_id'");
                        echo "<script>alert('ไม่สามารถอัปโหลดรูปภาพได้');</script>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง อนุญาตเฉพาะ JPG, JPEG, PNG, GIF เท่านั้น');</script>";
            }
        } else {
            echo "<script>alert('กรุณาเลือกรูปภาพสินค้า');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<?php include 'menu1.php'; ?>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>เพิ่มสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>แก้ไขสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="text-center">เพิ่มสินค้าใหม่</h3>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">รหัสสินค้า</label>
                                <input type="text" class="form-control" name="product_id" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">หมวดหมู่สินค้า</label>
                                <select class="form-control" name="category" required>
                                    <option value="">-- เลือกหมวดหมู่ --</option>
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
                                <label class="form-label">ชื่อสินค้า</label>
                                <input type="text" class="form-control" name="product_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">รายละเอียดสินค้า</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ราคา (บาท)</label>
                                <input type="number" step="0.01" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">จำนวนสินค้า</label>
                                <input type="number" class="form-control" name="quantity" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">เลือกรูปสินค้า</label>
                                <input type="file" class="form-control" name="product_image" accept="image/*" onchange="previewImage(event)" required>
                                <img id="preview" src="#" class="img-fluid mt-2" style="max-height: 200px; display: none;">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">เพิ่มสินค้า</button>
                            <a href="product.php" class="btn btn-secondary w-100 mt-2">กลับไปหน้าหลัก</a>
                        </form>
                    </div>
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