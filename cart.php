<?php
include 'db.php';

$sql = "SELECT cart.id, products.name, products.price, cart.quantity
        FROM cart
        JOIN products ON cart.product_id = products.id";
$result = $conn->query($sql);

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart - Online Shop</title>
    <link rel="stylesheet" type="text/css" href="css/stylesss.css">
    <style>
    body{
        background-image : url("wan.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { 
            $subtotal = $row['price'] * $row['quantity'];
            $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td>
                <form action="update_cart.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1">
                    <input type="submit" value="Update">
                </form>
            </td>
            <td>$<?php echo $subtotal; ?></td>
            <td>
                <form action="remove_from_cart.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Remove">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
    <h2>Total: $<?php echo $total; ?></h2>
    <a href="index.php">Continue Shopping</a>
</body>
</html>
