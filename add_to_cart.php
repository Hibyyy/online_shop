<?php
include 'db.php';

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Check if the product is already in the cart
$sql = "SELECT * FROM cart WHERE product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Update the quantity if the product is already in the cart
    $sql = "UPDATE cart SET quantity = quantity + $quantity WHERE product_id = $product_id";
} else {
    // Insert a new record if the product is not in the cart
    $sql = "INSERT INTO cart (product_id, quantity) VALUES ($product_id, $quantity)";
}

if ($conn->query($sql) === TRUE) {
    echo "Product added to cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: cart.php");
?>
