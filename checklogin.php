<?php
include 'condb.php'
session_start();

$username = $_POST['username'];
$password = $_POSt['password'];

//เข้ารหัส password ด้วย sha512
$password=hash('sha512',$password);

$sql="SELECT * FORM member WHERE username='$username' and password = '$password' ";
$result=mysqli_query($conn,$sql);
$row=mysql_fetch_array($result);

if($row > 0){
    $_SESSION["username"] = $row['username'];
    $_SESSION["pw"] = $row['password'];
    $_SESSION["firstname"] = $row['firstname'];
    $_SESSION["lastname"] = $row['lastname'];
    $show=hader("location:index1.php");
}else{
    $_SESSION["Error"] = "<p> Your username or password is invalid </p>"
    $show=hader("location:index.php");
}
echo $show;
?>