<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล


// ดึงข้อมูลหมวดหมู่
$sql = "SELECT * FROM Categories WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("id", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ถ้าไม่พบหมวดหมู่
if (!$row) {
    echo "<script>alert('ไม่พบหมวดหมู่ที่ต้องการแก้ไข'); window.location='categories.php';</script>";
    exit;
}

// ตรวจสอบการกดปุ่มบันทึก
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']); // ป้องกัน SQL Injection

    // อัพเดตข้อมูล
    $sql_update = "UPDATE Categories SET name = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $name, $id);

    if ($stmt_update->execute()) {
        echo "<script>alert('แก้ไขข้อมูลหมวดหมู่สำเร็จ'); window.location='categories.php';</script>";
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขหมวดหมู่สินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>แก้ไขหมวดหมู่สินค้า</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ชื่อหมวดหมู่สินค้า:</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="categories.php" class="btn btn-secondary">กลับหน้าเดิม</a>
        </form>
    </div>
</body>
</html>
