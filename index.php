<?php
include 'db.php';
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
    body {
    font-family: Arial, sans-serif;
    background-image : url("cutblu.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0;
    padding: 0;
}
    </style>
</head>
<body>
    <h1>Welcome to Our Online Shop</h1>
    <a href="logout.php">Logout</a>
    <div class="products">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="product">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h2><?php echo $row['name']; ?></h2>
                <p><?php echo $row['description']; ?></p>
                <p>$<?php echo $row['price']; ?></p>
                <a href="product.php?id=<?php echo $row['id']; ?>">View Product</a>
                <a href="cart.php?id=<?php echo $row['id']; ?>">Look the cart</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
