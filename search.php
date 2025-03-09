<?php
session_start();
include 'db_connect.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];
    
    // ป้องกัน SQL Injection
    $search_query = $conn->real_escape_string($search_query);

    // ค้นหาสินค้าในฐานข้อมูล
    $sql = "SELECT * FROM Product WHERE Name LIKE '%$search_query%'";
    $result = $conn->query($sql);

    echo "<h3>ผลลัพธ์การค้นหา: '$search_query'</h3>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>สินค้า: " . $row["Name"] . " - ราคา: $" . $row["Price"] . "</p>";
        }
    } else {
        echo "<p>ไม่พบสินค้า</p>";
    }
}
?>
