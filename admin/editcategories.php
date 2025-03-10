<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    echo "<script>alert('โปรดเข้าสู่ระบบ'); window.location='login.php';</script>";
    exit;
}

// ตรวจสอบว่า ID ถูกส่งมาหรือไม่ และต้องเป็นตัวเลขเท่านั้น
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('รหัสหมวดหมู่ไม่ถูกต้อง'); window.location='categories.php';</script>";
    exit;
}

$id = intval($_GET['id']); // แปลงค่าให้เป็นตัวเลข

// ดึงข้อมูลหมวดหมู่ที่ต้องการแก้ไข
$sql = "SELECT * FROM categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ถ้าไม่พบหมวดหมู่ที่ต้องการแก้ไข
if (!$row) {
    echo "<script>alert('ไม่พบหมวดหมู่ที่ต้องการแก้ไข'); window.location='categories.php';</script>";
    exit;
}

// ตรวจสอบว่ามีการกดปุ่มบันทึกหรือไม่
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']); // ตัดช่องว่างออก
    $name = mysqli_real_escape_string($conn, $name); // ป้องกัน SQL Injection

    // ตรวจสอบว่าชื่อหมวดหมู่ว่างหรือไม่
    if (empty($name)) {
        echo "<script>alert('กรุณากรอกชื่อหมวดหมู่');</script>";
    } else {
        // อัพเดตข้อมูลหมวดหมู่
        $sql_update = "UPDATE categories SET name = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $name, $id);
        
        if ($stmt_update->execute()) {
            echo "<script>alert('แก้ไขข้อมูลหมวดหมู่สำเร็จ'); window.location='categories.php';</script>";
        } else {
            echo "เกิดข้อผิดพลาด: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>แก้ไขหมวดหมู่สินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'menu1.php'; ?> <!-- เมนูนำทาง -->

<div class="container mt-5">
    <h2>แก้ไขหมวดหมู่สินค้า</h2>
    <form method="POST">
        <div class="mb-3">
            <label>ชื่อหมวดหมู่สินค้า:</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']); ?>" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">บันทึก</button>
        <a href="categories.php" class="btn btn-secondary">กลับ</a>
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
