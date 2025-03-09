<?php
session_start();
include 'db_connect.php'; // เชื่อมต่อฐานข้อมูล

include 'db_connect.php';

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];

    // ป้องกัน SQL Injection
    $search_query = $conn->real_escape_string($search_query);

    // ค้นหาสินค้า
    $sql = "SELECT * FROM Product WHERE Name LIKE '%$search_query%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>ผลลัพธ์การค้นหา: "<?php echo htmlspecialchars($search_query); ?>"</h2>

        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-3">
                        <div class="product-item">
                            <img src="img/' . $row["Iditem"] . '.jpg" class="product-img">
                            <h5>' . $row["Name"] . '</h5>
                            <p>ราคา: $' . $row["Price"] . '</p>
                            <a href="detail1.php?Iditem=' . $row["Iditem"] . '" class="btn btn-primary">ดูรายละเอียด</a>
                        </div>
                    </div>';
                }
            } else {
                echo "<p>ไม่พบสินค้า</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
