<?php
require 'func.php';
$fullname = $_POST ["fullname"];
$username = $_POST ["username"];
$email = $_POST ["email"];
$password = $_POST ["password"];

$query_sql = "INSERT INTO regis (fullname, username, email, password)
            VALUES ('$fullname', '$username', '$email', '$password')";
            
if (mysqli_query($conn, $query_sql)) {
    header("Location: index.html");
} else {
    echo "Login failed : " . mysqli_error($conn);
}