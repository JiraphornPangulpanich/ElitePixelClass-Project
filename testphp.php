<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจัดส่งสินค้า</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>แบบฟอร์มการจัดส่งสินค้า</h2>
    <form action="#" method="post">
        <label for="name">ชื่อผู้รับ:</label>
        <input type="text" id="name" name="name" required>

        <label for="address">ที่อยู่:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <label for="phone">เบอร์โทรศัพท์:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="shipping-method">วิธีการจัดส่ง:</label>
        <select id="shipping-method" name="shipping-method" required>
            <option value="standard">จัดส่งแบบปกติ (3-5 วัน)</option>
            <option value="express">จัดส่งด่วน (1-2 วัน)</option>
            <option value="pickup">รับสินค้าด้วยตนเอง</option>
        </select>

        <button type="submit">ยืนยันการจัดส่ง</button>
    </form>
</div>

</body>
</html>
