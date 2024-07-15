<?php
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $product['name']; ?> - Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        body{
            background-image: url(cartt.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <img src="images/<?php echo $product['image']; ?>" width="150px" alt="<?php echo $product['name']; ?>">
    <p><?php echo $product['description']; ?></p>
    <p>$<?php echo $product['price']; ?></p>
    <form action="add_to_cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="1" min="1">
        <input type="submit" value="Add to Cart">
    </form>
    <a href="index.php">Back to Shop</a>
</body>
</html>
