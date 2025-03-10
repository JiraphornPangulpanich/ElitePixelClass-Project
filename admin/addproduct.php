<?php
include_once("condb.php");

// ส่วนบันทึกข้อมูลเมื่อกดปุ่ม submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // รับค่าจากฟอร์ม
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // ตรวจสอบและจัดการไฟล์ภาพ
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $fileTmpPath = $_FILES['product_image']['tmp_name'];
        $fileName = $_FILES['product_image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedExtensions)) {
            // เพิ่มสินค้าเข้า DB ก่อน เพื่อเอา ID สินค้า
            $sqlInsert = "INSERT INTO products (Categories, Name, Detail, Price, Num, Ext) 
                          VALUES ('$category', '$product_name', '$description', '$price', '$quantity', '$fileExtension')";

            if (mysqli_query($conn, $sqlInsert)) {
                // ดึง ID ล่าสุด (AUTO_INCREMENT)
                $last_id = mysqli_insert_id($conn);

                // ตั้งชื่อไฟล์รูปภาพใหม่ตาม ID สินค้า
                $newFileName = $last_id . '.' . $fileExtension;
                $uploadPath = "../images/" . $newFileName;

                // ย้ายไฟล์ไปยังโฟลเดอร์ภาพ
                if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                    echo "<script>alert('เพิ่มสินค้าเรียบร้อยแล้ว'); window.location='admin_dashboard.php';</script>";
                } else {
                    // ลบข้อมูลออกถ้าอัปโหลดรูปไม่สำเร็จ
                    mysqli_query($conn, "DELETE FROM products WHERE Iditem = '$last_id'");
                    echo "<script>alert('ไม่สามารถอัปโหลดรูปภาพได้');</script>";
                }
            } else {
                echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกสินค้า');</script>";
            }
        } else {
            echo "<script>alert('ประเภทไฟล์ไม่ถูกต้อง อนุญาตเฉพาะ JPG, JPEG, PNG, GIF เท่านั้น');</script>";
        }
    } else {
        echo "<script>alert('กรุณาเลือกรูปภาพสินค้า');</script>";
    }
}
?>
