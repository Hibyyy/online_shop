<?php
include 'db.php';

$id = $_POST['id'];
$quantity = $_POST['quantity'];

$sql = "UPDATE cart SET quantity = $quantity WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Cart updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: cart.php");
?>
