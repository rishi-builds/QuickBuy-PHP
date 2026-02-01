<?php 
include 'db.php'; 
$total_from_session = 0;
if(!empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $id => $quantity) {
        $id = mysqli_real_escape_string($conn, $id);
        $res = mysqli_query($conn, "SELECT price FROM products WHERE id = '$id'");
        $row = mysqli_fetch_assoc($res);
        if($row) { $total_from_session += ($row['price'] * $quantity); }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QuickBuy - Secure Payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #667eea; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .checkout-container { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); width: 450px; }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        .summary { background: #f8f9fa; padding: 15px; border-radius: 12px; margin-bottom: 20px; border-left: 5px solid #ff9900; }
        .input-group { margin-bottom: 15px; }
        input, textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; box-sizing: border-box; }
        .payment-option { border: 2px solid #eee; padding: 10px; border-radius: 10px; margin-bottom: 10px; cursor: pointer; display: flex; align-items: center; }
        .payment-option:hover { border-color: #ff9900; }
        .payment-option input { width: auto; margin-right: 10px; }
#qr-box h3 {
    background: #ff9900;
    color: white;
    display: inline-block;
    padding: 5px 15px;
    border-radius: 50px;
    font-size: 16px;
    margin-bottom: 15px;
}
        #qr-box { display: none; text-align: center; margin-top: 15px; background: #fffcf5; padding: 10px; border: 2px dashed #ff9900; border-radius: 10px; }
        .btn-order { width: 100%; background: #28a745; color: white; border: none; padding: 15px; border-radius: 50px; font-weight: bold; cursor: pointer; font-size: 16px; transition: 0.3s; margin-top: 10px; }
        .btn-order:hover { background: #218838; transform: scale(1.02); }
    </style>
</head>
<body>

<div class="checkout-container">
    <h2>Checkout & Payment</h2>
    <div class="summary">
        <p style="margin:0; font-weight:600;">Total Items: <?php echo count($_SESSION['cart']); ?></p>
        <p style="margin:5px 0 0; color:#28a745; font-size:18px;">Total Payable: ₹<?php echo number_format($total_from_session, 2); ?></p>
    </div>

    <form action="process_payment.php" method="POST">
        <div class="input-group"><input type="text" name="name" placeholder="Full Name" required></div>
        <div class="input-group"><input type="text" name="mobile" placeholder="Mobile Number" required></div>
        <div class="input-group"><textarea name="address" placeholder="Delivery Address" rows="2" required></textarea></div>

        <h4 style="margin:15px 0 10px;">Select Payment Method</h4>
        <label class="payment-option">
            <input type="radio" name="payment" value="COD" checked onclick="showQR(false)">
            <span>Cash on Delivery (COD)</span>
        </label>
        <label class="payment-option">
            <input type="radio" name="payment" value="UPI" onclick="showQR(true)">
            <span>UPI Payment (PhonePe/GPay)</span>
        </label>
        <div id="qr-box" style="display: block; text-align: center; margin-top: 15px; background: #fffcf5; padding: 15px; border: 2px dashed #ff9900; border-radius: 15px;">
    <h3 style="margin: 0 0 10px 0; color: #232f3e; letter-spacing: 1px;">QuickBuy Payments</h3>
    
    <p style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">Scan to Pay: ₹<?php echo number_format($total_from_session, 2); ?></p>
    
    <img src="image/qr.png" width="180" alt="Payment QR" style="border: 5px solid white; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    
    <p style="font-size: 11px; color: #666; margin-top: 10px;">Merchant: QuickBuy Online Store</p>
</div>

        <div id="qr-box">
            <p style="font-size:12px; font-weight:bold;">Scan to Pay ₹<?php echo number_format($total_from_session, 2); ?></p>
            <img src="image/qr.png" width="150" alt="Payment QR">
        </div>

        <button type="submit" class="btn-order">Place Order Now</button>
    </form>
    <p style="text-align:center;"><a href="cart.php" style="color:#666; text-decoration:none; font-size:14px;">← Back to Cart</a></p>
</div>

<script>
function showQR(status) {
    document.getElementById('qr-box').style.display = status ? 'block' : 'none';
}
</script>

</body>
</html>