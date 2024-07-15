<?php
$servername = "localhost";
$database = "db_users";
$username = "root";
$password =  "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
} else {
    header("Location: ../index.php");

    echo "Connection succeeded";
}

