<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "qq123456";
$dbname = "ElitePixel";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ถ้ามีการส่งข้อมูลจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // สร้างคำสั่ง SQL สำหรับการเพิ่มข้อมูล
    $sql = "INSERT INTO products (product_name, price, description)
            VALUES ('$product_name', '$price', '$description')";

    // ตรวจสอบการเพิ่มข้อมูล
    if ($conn->query($sql) === TRUE) {
        echo "บันทึกข้อมูลสินค้าเรียบร้อยแล้ว";
    } else {
        echo "เกิดข้อผิดพลาด: " . $sql . "<br>" . $conn->error;
    }
}

// ปิดการเชื่อมต่อ
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลสินค้า</title>
</head>
<body>
    <h1>เพิ่มข้อมูลสินค้า</h1>
    <form action="index.php" method="POST">
        <label for="product_name">ชื่อสินค้า:</label><br>
        <input type="text" id="product_name" name="product_name" required><br><br>
        
        <label for="price">ราคา:</label><br>
        <input type="number" id="price" name="price" required><br><br>

        <label for="description">รายละเอียด:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <input type="submit" value="บันทึกข้อมูล">
    </form>
</body>
</html>
