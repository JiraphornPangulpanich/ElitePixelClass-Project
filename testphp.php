<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าชำระเงิน</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .payment-container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; }
        .hidden { display: none; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, button { width: 100%; padding: 8px; margin-top: 5px; }
        button { background: #28a745; color: white; border: none; cursor: pointer; margin-top: 15px; }
        button:hover { background: #218838; }
    </style>
</head>
<body>

    <div class="payment-container">
        <h2>เลือกวิธีการชำระเงิน</h2>
        
        <form id="paymentForm">
            <label>
                <input type="radio" name="payment_method" value="cod" onclick="togglePayment(false)"> ชำระเงินปลายทาง (COD)
            </label>
            
            <label>
                <input type="radio" name="payment_method" value="credit_card" onclick="togglePayment(true)"> ชำระผ่านบัตรเครดิต
            </label>
            
            <!-- ฟอร์มบัตรเครดิต (ซ่อนอยู่เริ่มต้น) -->
            <div id="creditCardForm" class="hidden">
                <label>ชื่อบนบัตร:</label>
                <input type="text" name="card_name">

                <label>หมายเลขบัตร:</label>
                <input type="text" name="card_number" maxlength="16">

                <label>วันหมดอายุ (MM/YY):</label>
                <input type="text" name="expiry">

                <label>CVV:</label>
                <input type="text" name="cvv" maxlength="3">
            </div>

            <button type="submit">ดำเนินการชำระเงิน</button>
        </form>
    </div>

    <script>
        function togglePayment(show) {
            document.getElementById("creditCardForm").classList.toggle("hidden", !show);
        }

        document.getElementById("paymentForm").addEventListener("submit", function(event) {
            let selectedMethod = document.querySelector('input[name="payment_method"]:checked');
            if (!selectedMethod) {
                alert("กรุณาเลือกวิธีการชำระเงิน");
                event.preventDefault();
            }
        });
    </script>

</body>
</html>
