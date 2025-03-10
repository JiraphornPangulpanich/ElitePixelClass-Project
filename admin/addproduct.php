<?php
include_once("condb.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // รับค่าจากฟอร์ม
    $product_id = $_POST['product_id']; // รับรหัสสินค้าจากผู้ใช้
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
    $category = $categories_map[$category_name]; // แปลงชื่อเป็นเลข id

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // ตรวจสอบว่ารหัสสินค้าซ้ำหรือไม่
    $check_sql = "SELECT Iditem FROM Product WHERE Iditem = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $product_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "<script>alert('รหัสสินค้านี้มีอยู่แล้ว! กรุณาใช้รหัสอื่น'); window.history.back();</script>";
        exit;
    }

    $check_stmt->close();

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $fileTmpPath = $_FILES['product_image']['tmp_name'];
        $fileName = $_FILES['product_image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            // บันทึกข้อมูลสินค้า
            $sqlInsert = "INSERT INTO Product (Iditem, Categories, Name, Detail, Price, Num, Ext) 
                          VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("sissdis", $product_id, $category, $product_name, $description, $price, $quantity, $fileExtension);

            if ($stmt->execute()) {
                $uploadPath = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $product_id . '.' . $fileExtension;

                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    echo "<script>alert('เพิ่มสินค้าเรียบร้อยแล้ว'); window.location='product.php';</script>";
                } else {
                    // ลบข้อมูลที่เพิ่มไปถ้าอัปโหลดรูปไม่สำเร็จ
                    $delete_sql = "DELETE FROM Product WHERE Iditem = ?";
                    $delete_stmt = $conn->prepare($delete_sql);
                    $delete_stmt->bind_param("s", $product_id);
                    $delete_stmt->execute();

                    echo "<script>alert('ไม่สามารถอัปโหลดรูปภาพได้');</script>";
                }
            } else {
                echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง อนุญาตเฉพาะ JPG, JPEG, PNG, GIF เท่านั้น');</script>";
        }
    } else {
        echo "<script>alert('กรุณาเลือกรูปภาพสินค้า');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขสินค้า</title>
</head>
<body>
    <h2>แก้ไขสินค้า</h2>
    <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="product_id" class="form-label">รหัสสินค้า</label>
        <input type="text" class="form-control" id="product_id" name="product_id" required>
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">หมวดหมู่สินค้า</label>
        <select class="form-control" id="category" name="category" required>
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
        <label for="product_name" class="form-label">ชื่อสินค้า</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">รายละเอียดสินค้า</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">ราคา (บาท)</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>

    <div class="mb-3">
        <label for="product_image" class="form-label">เลือกรูปสินค้า</label>
        <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" required>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">จำนวนสินค้า</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">เพิ่มสินค้า</button>
    <a href="product.php" class="btn btn-secondary w-100 mt-2">กลับไปหน้าหลัก</a>
</form>

</body>
</html>
