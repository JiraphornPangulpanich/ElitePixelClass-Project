<?php
include 'condb.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// เข้ารหัส password ด้วย sha512
$password = hash('sha512', $password);

// แก้ไข SQL (FROM แทน FORM)
$sql = "SELECT * FROM member WHERE username='$username' AND password='$password' ";
$result = mysqli_query($conn, $sql);

// แก้ไข mysqli_fetch_array()
$row = mysqli_fetch_array($result);

if ($row) {
    $_SESSION["username"] = $row['username'];
    $_SESSION["pw"] = $row['password'];
    $_SESSION["firstname"] = $row['firstname'];
    $_SESSION["lastname"] = $row['lastname'];
    
    // ใช้ header() และ exit เพื่อป้องกันปัญหา
    header("Location: index1.php");
    exit();
} else {
    $_SESSION["Error"] = "<p> Your username or password is invalid </p>";
    
    // ใช้ header() และ exit เพื่อป้องกันปัญหา
    header("Location: index.php");
    exit();
}
?>
