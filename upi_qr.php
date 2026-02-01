<?php 
include 'db.php'; 
$total = 0;

if(!empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $id => $quantity) {
        $id = mysqli_real_escape_string($conn, $id);
        $res = mysqli_query($conn, "SELECT price FROM products WHERE id = $id");
        $p = mysqli_fetch_assoc($res);
        if($p) {
            $total += ($p['price'] * $quantity);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>UPI Payment - QuickBuy</title>
    <style>
        body { text-align: center; font-family: 'Arial', sans-serif; background-color: #f4f4f4; padding: 30px; }
        .payment-card { background: white; padding: 20px; display: inline-block; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .amount { color: #28a745; font-size: 24px; font-weight: bold; margin: 10px 0; }
        .qr-img { width: 250px; border: 5px solid #fff; border-radius: 10px; margin: 15px 0; }
        .btn-confirm { background-color: #007bff; color: white; padding: 12px 30px; text-decoration: none; border-radius: 25px; display: inline-block; font-weight: bold; }
        .btn-confirm:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="payment-card">
        <h2>QuickBuy Payment</h2>
        <p>Scan the QR code to pay</p>
        <div class="amount">Total Amount: ₹<?php echo $total; ?></div>
        
        <div class="qr-card">
    <h2>Scan to Pay</h2>
    
    <img src="image/qr.png" width="250" alt="UPI QR Code" style="border: 2px solid #ccc; padding: 10px; border-radius: 10px;">
    
    <p>After making the payment, click on the button below</p>
    <a href="place_order.php" class="btn-confirm">I Have Paid - Confirm Order</a>
</div>
</body>
</html>