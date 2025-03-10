<?php
session_start();
include('connectdb.php'); // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['username'])) {
    echo "<script>alert('โปรดเข้าสู่ระบบเพื่อสั่งสินค้า'); window.location='index.php';</script>";
    exit;
}

$username = $_SESSION['username']; // ดึง username จาก session

// ตรวจสอบว่าในตะกร้ามีสินค้า
if (empty($_SESSION['cart'])) {
    echo "<p>ตะกร้าสินค้าของคุณว่างเปล่า</p>";
    exit;  // ถ้าไม่มีสินค้าจะหยุดการทำงาน
}

// ดึงข้อมูลสินค้าจากตะกร้าใน session
$itemIds = implode(',', array_keys($_SESSION['cart'])); // สร้างรายการ id ของสินค้าในตะกร้า

// ตรวจสอบว่ามี itemIds หรือไม่
if (empty($itemIds)) {
    echo "ตะกร้าสินค้าของคุณว่างเปล่า";
    exit;  // ถ้าไม่มี id สินค้าให้หยุดการทำงาน
}

// ตรวจสอบค่าของ $itemIds
echo "Item IDs: " . $itemIds . "<br>"; // แสดง itemIds เพื่อการตรวจสอบ

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM products WHERE id IN ($itemIds)";
$result = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีสินค้าที่ตรงกับรายการในตะกร้าหรือไม่
if (mysqli_num_rows($result) == 0) {
    echo "<p>ไม่พบสินค้าที่คุณสั่งซื้อในฐานข้อมูล</p>";
    exit;
}

$items = [];
while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
}

// รับข้อมูลที่ส่งมาจากฟอร์มการจัดส่ง
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$shipping_method = $_POST['shipping-method'];

?>

<div class="container">
    <h2>สรุปรายการสั่งซื้อ</h2>

    <h3>ข้อมูลการจัดส่ง</h3>
    <p><strong>ชื่อผู้รับ:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>ที่อยู่:</strong> <?php echo nl2br(htmlspecialchars($address)); ?></p>
    <p><strong>เบอร์โทรศัพท์:</strong> <?php echo htmlspecialchars($phone); ?></p>
    <p><strong>วิธีการจัดส่ง:</strong> <?php echo htmlspecialchars($shipping_method); ?></p>

    <hr>
    <h3>รายการสินค้าที่สั่งซื้อ</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ชื่อสินค้า</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>รวม</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $totalAmount = 0;
            foreach ($items as $item): 
                $itemId = $item['id'];
                $quantity = $_SESSION['cart'][$itemId];
                $totalPrice = $item['price'] * $quantity;
                $totalAmount += $totalPrice;
            ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo number_format($item['price'], 2); ?> บาท</td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo number_format($totalPrice, 2); ?> บาท</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>
    <h4><strong>ยอดรวม: </strong><?php echo number_format($totalAmount, 2); ?> บาท</h4>
    
    <p>ขอบคุณสำหรับการสั่งซื้อสินค้าจากเรา!</p>
</div>
