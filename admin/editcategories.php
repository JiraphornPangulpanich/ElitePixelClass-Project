<?php
session_start();
include 'condb.php';

// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่
if (!isset($_SESSION['username'])) {
    echo "<script>alert('โปรดเข้าสู่ระบบเพื่อเข้าใช้งาน'); window.location='login.php';</script>";
    exit;
}

// รับค่า id จาก URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ดึงข้อมูลหมวดหมู่จากฐานข้อมูล
$sql = "SELECT * FROM Categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ถ้าไม่พบข้อมูล
if (!$row) {
    echo "<script>alert('ไม่พบหมวดหมู่ที่ต้องการแก้ไข'); window.location='categories.php';</script>";
    exit;
}

// เช็คว่ามีการกดปุ่มบันทึกหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']); // ป้องกัน SQL Injection

    // อัพเดตข้อมูลหมวดหมู่
    $sql_update = "UPDATE Categories SET name = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $name, $id);

    if ($stmt_update->execute()) {
        echo "<script>alert('แก้ไขข้อมูลหมวดหมู่สำเร็จ'); window.location='categories.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "');</script>";
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
    <title>แก้ไขหมวดหมู่สินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>แก้ไขหมวดหมู่สินค้า</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ชื่อหมวดหมู่สินค้า:</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="categories.php" class="btn btn-secondary">กลับหน้าเดิม</a>
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
