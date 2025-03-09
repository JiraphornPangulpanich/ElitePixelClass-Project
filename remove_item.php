<?php
session_start();

if(isset($_GET['id'])){
    $product_id = $_GET['id'];

    // ลบสินค้าจากตะกร้า
    foreach($_SESSION['cart'] as $key => $item){
        if($item['id'] == $product_id){
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    // รีเซ็ตดัชนีของอาเรย์
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    
    // ไปที่หน้าตะกร้า
    header("Location: cart.php");
    exit();
}
?>
