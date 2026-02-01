<?php 
include 'db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed - QuickBuy</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        
        .success-card { background: white; padding: 50px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); text-align: center; max-width: 400px; animation: popIn 0.5s ease; }
        
        @keyframes popIn {
            0% { transform: scale(0.5); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .check-icon { font-size: 80px; color: #28a745; margin-bottom: 20px; }

        h2 { color: #232f3e; margin-bottom: 10px; }
        p { color: #666; line-height: 1.6; margin-bottom: 25px; }

        .btn-home { background: #ff9900; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: 0.3s; display: inline-block; box-shadow: 0 4px 15px rgba(255,153,0,0.3); }
        .btn-home:hover { transform: scale(1.1); background: #e68a00; }
    </style>
</head>
<body>

<div class="success-card">
    <div class="check-icon">✓</div>
    <h2>Order Placed Successfully!</h2>
    <p>Thank you for shopping with <strong>QuickBuy</strong>. Your order has been received and will be delivered soon.</p>
    <a href="index.php" class="btn-home">Back to Shop</a>
</div>

<?php 
unset($_SESSION['cart']); 
?>
</body>
</html>