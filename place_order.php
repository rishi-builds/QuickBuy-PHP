<?php
include 'db.php';
unset($_SESSION['cart']); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
    <style>
        body { text-align: center; font-family: Arial; padding: 50px; }
        .success-box { border: 2px solid #28a745; padding: 20px; display: inline-block; border-radius: 10px; }
        h1 { color: #28a745; }
        .btn-home { background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="success-box">
        <h1>✔ Order Placed Successfully!</h1>
        <p>Your Order has been Confirm,Thank you </p>
        <br><br>
        <a href="index.php" class="btn-home">Continue Shopping</a>
    </div>
</body>
</html>