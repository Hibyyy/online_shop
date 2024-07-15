<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM cart WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Product removed from cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: cart.php");
?>
