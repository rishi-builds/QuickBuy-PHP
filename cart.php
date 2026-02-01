<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - QuickBuy</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; margin: 0; padding: 20px; 
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
    font-family: 'Poppins', sans-serif;
}
        .cart-container { max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #232f3e; margin-bottom: 25px; }
        .cart-item { display: flex; justify-content: space-between; padding: 15px 0; border-bottom: 1px solid #eee; }
        .total-section { margin-top: 20px; text-align: right; border-top: 2px solid #eee; padding-top: 15px; }
        .total-price { font-size: 22px; font-weight: 600; color: #28a745; }
        .btn-group { display: flex; gap: 10px; margin-top: 25px; justify-content: center; }
        .btn { padding: 12px 25px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: 0.3s; text-align: center; border: none; cursor: pointer; color: white; }
        .btn-pay { background: #28a745; }
        .btn-clear { background: #dc3545; }
        .btn:hover { transform: translateY(-3px); opacity: 0.9; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #666; text-decoration: none; }
    </style>
</head>
<body>

<div class="cart-container">
    <h2>Your Shopping Cart</h2>
    
    <?php
    $total = 0;
    if(!empty($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $id => $quantity) {
            $id = mysqli_real_escape_string($conn, $id);
            $res = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
            $row = mysqli_fetch_assoc($res);
            if($row) {
                $subtotal = $row['price'] * $quantity;
                $total += $subtotal;
                echo "<div class='cart-item'>
                        <span><strong>{$row['name']}</strong> (x{$quantity})</span>
                        <span>₹" . number_format($subtotal, 2) . "</span>
                      </div>";
            }
        }
    } else {
        echo "<p style='text-align:center;'>Aapka cart khaali hai.</p>";
    }
    ?>

    <div class="total-section">
        <span class="total-price">Total Payable: ₹<?php echo number_format($total, 2); ?></span>
    </div>

    <div class="btn-group">
        <?php if($total > 0): ?>
            <a href="payment.php" class="btn btn-pay">Proceed to Payment</a>
        <?php endif; ?>
        <a href="clear_cart.php" class="btn btn-clear">Clear All</a>
    </div>

    <a href="index.php" class="back-link">← Continue Shopping</a>
</div>

</body>
</html>