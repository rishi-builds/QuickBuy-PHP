<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>QuickBuy - Modern Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
    body { 
        font-family: 'Poppins', sans-serif; 
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); 
        min-height: 100vh;
        margin: 0;
    }
    .header { 
        background: #232f3e; 
        color: white; 
        padding: 20px; 
        text-align: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }
    .product-container { 
        display: flex; 
        flex-wrap: wrap; 
        justify-content: center; 
        gap: 25px; 
        padding: 40px 20px; 
    }

    .product-card { 
        background: white; 
        border-radius: 20px; 
        padding: 20px; 
        width: 240px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1); 
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        text-align: center;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .product-card:hover { 
        transform: translateY(-15px) scale(1.03); 
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        background: #fff;
    }

    .product-card img { 
        width: 100%; 
        height: 180px; 
        object-fit: contain; 
        border-radius: 15px;
        margin-bottom: 15px;
        transition: 0.3s;
    }

    .btn-add { 
        background: linear-gradient(45deg, #ff9900, #ffcc00); 
        color: black; 
        border: none; 
        padding: 12px 20px; 
        border-radius: 50px; 
        font-weight: bold; 
        cursor: pointer; 
        text-decoration: none; 
        display: inline-block;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(255, 153, 0, 0.3);
    }

    .btn-add:hover { 
        background: linear-gradient(45deg, #e68a00, #ff9900);
        box-shadow: 0 6px 20px rgba(255, 153, 0, 0.5);
        transform: scale(1.1);
    }
    
.logo {
    font-size: 28px;
    font-weight: 800;
    color: #ff9900; 
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    display: flex;
    align-items: center;
}

.logo span {
    color: #ffffff; 
    background: #ff9900;
    padding: 2px 8px;
    border-radius: 5px;
    margin-left: 5px;
}
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f4f7f6; color: #333; }

        
        header { 
            background: linear-gradient(135deg, #232f3e 0%, #37475a 100%); 
            color: white; padding: 20px 5%; 
            display: flex; justify-content: space-between; align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        header h2 { font-weight: 600; letter-spacing: 1px; }
        nav a { color: #ff9900; text-decoration: none; font-weight: bold; font-size: 18px; }

        .product-container { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 30px; padding: 40px 5%; 
        }


        .product-card { 
            background: white; border-radius: 15px; padding: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05); 
            transition: all 0.3s ease; text-align: center;
            border: 1px solid #eee;
        }
        .product-card:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 15px 30px rgba(0,0,0,0.1); 
        }

        .product-card img { 
            width: 100%; height: 200px; object-fit: contain; 
            margin-bottom: 15px; border-radius: 10px;
        }

        .product-card h3 { font-size: 1.2rem; margin-bottom: 10px; color: #222; }
        .product-card p { font-size: 1.1rem; color: #28a745; font-weight: 600; margin-bottom: 15px; }

        
        .btn-add { 
            background: #ff9900; color: white; border: none; padding: 12px 25px; 
            border-radius: 25px; font-weight: 600; cursor: pointer; 
            text-decoration: none; display: inline-block; transition: 0.3s;
        }
        .btn-add:hover { background: #e68a00; transform: scale(1.05); }

    </style>
</head>
<body>

<header>
    <div class="logo">Quick<span>Buy</span></div>
    <nav>
        <a href="cart.php">🛒 Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
    </nav>
</header>
<div class="product-container">
    <?php
    $res = mysqli_query($conn, "SELECT * FROM products");
    while($row = mysqli_fetch_assoc($res)) {
    ?>
        <div class="product-card">
            <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p>₹<?php echo number_format($row['price'], 2); ?></p>
            <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn-add">Add to Cart</a>
        </div>
    <?php } ?>
</div>


</body>
</html>