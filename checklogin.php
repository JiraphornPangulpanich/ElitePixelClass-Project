<?php
include 'condb.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM member WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // ตรวจสอบว่าพบ username และตรวจสอบ password
    if ($row && password_verify($password, $row['password'])) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["firstname"] = $row['firstname'];
        $_SESSION["lastname"] = $row['lastname'];

        header("Location: index1.php");
        exit();
    } else {
        $_SESSION["Error"] = "❌ Username or Password is incorrect.";
        header("Location: index.php?error=1");
        exit();
    }
}
?>
