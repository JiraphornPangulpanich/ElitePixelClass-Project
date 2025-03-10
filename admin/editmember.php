<?php
session_start();
include 'condb.php'; // เชื่อมต่อฐานข้อมูล

$id = intval($_GET['id']); // แปลงเป็นตัวเลข

// ดึงข้อมูลสมาชิก
$sql = "SELECT * FROM member WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // เปลี่ยนจาก "id" เป็น "i"
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ถ้าไม่พบสมาชิก
if (!$row) {
    echo "<script>alert('ไม่พบสมาชิกที่ต้องการแก้ไข'); window.location='member.php';</script>";
    exit;
}

// ตรวจสอบการกดปุ่มบันทึก
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['firstname']) && !empty($_POST['firstname']) &&
        isset($_POST['lastname']) && !empty($_POST['lastname']) &&
        isset($_POST['phone']) && !empty($_POST['phone'])) {

        // รับค่าที่กรอกมา
        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $phone = trim($_POST['phone']);

        // อัพเดตข้อมูลสมาชิก
        $sql_update = "UPDATE member SET firstname = ?, lastname = ?, phone = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssi", $firstname, $lastname, $phone, $id);

        if ($stmt_update->execute()) {
            echo "<script>alert('แก้ไขข้อมูลสมาชิกสำเร็จ'); window.location='member.php';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการอัปเดตข้อมูล');</script>";
        }
    } else {
        echo "<script>alert('โปรดกรอกข้อมูลให้ครบถ้วน');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'menu1.php'; ?>

    <div class="container mt-5">
        <h2>แก้ไขข้อมูลสมาชิก</h2>
        <form method="POST">
            <div class="mb-3">
                <label>ชื่อ (Firstname):</label>
                <input type="text" name="firstname" class="form-control" value="<?= htmlspecialchars($row['firstname']) ?>" required>
            </div>

            <div class="mb-3">
                <label>นามสกุล (Lastname):</label>
                <input type="text" name="lastname" class="form-control" value="<?= htmlspecialchars($row['lastname']) ?>" required>
            </div>

            <div class="mb-3">
                <label>หมายเลขโทรศัพท์ (Phone):</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($row['phone']) ?>" required>
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
</html>
