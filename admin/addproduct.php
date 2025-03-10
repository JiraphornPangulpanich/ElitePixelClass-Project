<?php
session_start();
include 'condb.php';

if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('รหัสสินค้าไม่ถูกต้อง'); window.location='products.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM Product WHERE Iditem = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "<script>alert('ไม่พบสินค้า'); window.location='products.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categories = $_POST['categories'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $num = $_POST['num'];
    $ext = $product['Ext'];

    // ตรวจสอบว่ามีการอัปโหลดรูปใหม่หรือไม่
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array("jpg", "jpeg", "png");

        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // ลบรูปเก่าออก
                if (file_exists($product['Ext'])) {
                    unlink($product['Ext']);
                }
                $ext = $target_file;
            } else {
                echo "<script>alert('อัปโหลดรูปไม่สำเร็จ!'); window.history.back();</script>";
                exit;
            }
        } else {
            echo "<script>alert('อนุญาตเฉพาะไฟล์ JPG, JPEG, PNG เท่านั้น!'); window.history.back();</script>";
            exit;
        }
    }

    $update_sql = "UPDATE Product SET Categories=?, Name=?, Detail=?, Price=?, Ext=?, Num=? WHERE Iditem=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("issdsii", $categories, $name, $detail, $price, $ext, $num, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('แก้ไขสินค้าสำเร็จ!'); window.location='products.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด!'); window.history.back();</script>";
    }

    $update_stmt->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขสินค้า</title>
</head>
<body>
    <h2>แก้ไขสินค้า</h2>
    <form action="edit_product.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        หมวดหมู่: <input type="text" name="categories" value="<?= $product['Categories'] ?>" required><br>
        ชื่อสินค้า: <input type="text" name="name" value="<?= $product['Name'] ?>" required><br>
        รายละเอียด: <textarea name="detail" required><?= $product['Detail'] ?></textarea><br>
        ราคา: <input type="number" step="0.01" name="price" value="<?= $product['Price'] ?>" required><br>
        จำนวนสินค้า: <input type="number" name="num" value="<?= $product['Num'] ?>" required><br>
        รูปสินค้า: <input type="file" name="image" accept="image/*"><br>
        <img src="<?= $product['Ext'] ?>" alt="รูปสินค้า" width="100"><br>
        <button type="submit">บันทึกการแก้ไข</button>
    </form>
</body>
</html>
