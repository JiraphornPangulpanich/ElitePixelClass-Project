<?php
include 'condb.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // เข้ารหัสรหัสผ่าน

    // ตรวจสอบว่าชื่อผู้ใช้ซ้ำหรือไม่
    $checkUser = "SELECT * FROM member WHERE username = ?";
    $stmt = mysqli_prepare($conn, $checkUser);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists!'); window.location='singup.php';</script>";
        exit();
    }

    // บันทึกข้อมูลลงฐานข้อมูล
    $sql = "INSERT INTO member (firstname, lastname,  username, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname,  $username, $password);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Sign up successful!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: singup.php");
    exit();
}
?>
