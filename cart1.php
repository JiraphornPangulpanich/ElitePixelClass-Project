<?php
session_start();

// ตรวจสอบว่าผู้ใช้คลิกปุ่ม "เพิ่มไปที่ตะกร้า"
if(isset($_POST['add_to_cart'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = 1; // กำหนดจำนวนเริ่มต้นเป็น 1

    // ตรวจสอบว่าในเซสชันมีตะกร้าหรือไม่
    if(isset($_SESSION['cart'])){
        // ถ้ามีแล้วให้เช็คว่ามีสินค้าในตะกร้านั้นหรือไม่
        $cart = $_SESSION['cart'];
        $found = false;
        
        // ตรวจสอบว่าในตะกร้ามีสินค้าที่ผู้ใช้เพิ่มเข้าไปหรือยัง
        foreach($cart as $key => $item){
            if($item['id'] == $product_id){
                // ถ้ามีสินค้าแล้ว เพิ่มจำนวน
                $_SESSION['cart'][$key]['quantity'] += 1;
                $found = true;
                break;
            }
        }

        // ถ้ายังไม่มีสินค้าในตะกร้า ให้เพิ่มสินค้าใหม่เข้าไป
        if(!$found){
            $_SESSION['cart'][] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $product_quantity
            ];
        }
    } else {
        // ถ้ายังไม่มีตะกร้าในเซสชัน ให้สร้างใหม่
        $_SESSION['cart'] = [
            [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $product_quantity
            ]
        ];
    }
    
    // ไปที่หน้าตะกร้า
    header("Location: cart.php");
    exit();
}
?>
