<?php


include 'condb.php';
//รับค่าตัวแปลจากไฟล์ singup 
$name = $_POST['firstname']
$lastname = $_POST['lastname']
$phone = $_POST['phone']
$username = $_POST['username']
$password = $_POST['password']

//คำสั่งเพิ่มข้อมูลลงตาราง member
$sql = "INSERT INTO member(name, lastname, telephone, username, password) 
VALUES ('$name', '$lastname', '$phone', '$username', '$password')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย')</script>";
    echo "<script> window.location='singup.php'; </script>";
}else {
    echo "Error:".$sql ."<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ')</script>";
}
mysql_close($conn);

?>