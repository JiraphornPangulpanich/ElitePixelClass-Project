<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล



$id = intval($_GET['id']); // แปลงเป็นตัวเลข

// ดึงข้อมูลหมวดหมู่
$sql = "SELECT * FROM member WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // เปลี่ยนจาก "id" เป็น "i"
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ถ้าไม่พบหมวดหมู่
if (!$row) {
    echo "<script>alert('ไม่พบหมวดหมู่ที่ต้องการแก้ไข'); window.location='member.php';</script>";
    exit;
}

// ตรวจสอบการกดปุ่มบันทึก
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = trim($_POST['name']); // ลบช่องว่างซ้าย-ขวา

        // อัพเดตข้อมูล
        $sql_update = "UPDATE member SET name = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $name, $id);

        if ($stmt_update->execute()) {
            echo "<script>alert('แก้ไขข้อมูลหมวดหมู่สำเร็จ'); window.location='member.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');</script>";
        }
    } else {
        echo "<script>alert('โปรดกรอกชื่อหมวดหมู่สินค้า');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขหมวดหมู่สินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* จัดการตารางทั้งหมด */
        #datatablesSimple td {
            word-wrap: break-word;
            white-space: normal;
            max-width: 300px;
            vertical-align: top;
        }

        #datatablesSimple td:nth-child(4) {
            max-width: 350px;
        }

        .action-btn a {
            margin-right: 5px;
        }

        .btn-add {
            margin-bottom: 15px;
            display: inline-block;
            padding: 8px 16px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
    
</head>
<body>
<?php include 'menu1.php'; ?>

    <div class="container mt-5">
        <h2>แก้ไขหมวดหมู่สินค้า</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ชื่อหมวดหมู่สินค้า:</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="member.php" class="btn btn-secondary">กลับหน้าเดิม</a>
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
</body>
</html>
