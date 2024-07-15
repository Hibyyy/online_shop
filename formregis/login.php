<?php
require 'func.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT * FROM regis WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the login is successful
        if ($result->num_rows > 0) {
            header("Location: ../toko/index.php");
        } else {
            echo "<center><h1>Email or Password is wrong. Please try again.</h1>
                <button><strong><a href='index.html'>Login</a></strong></button></center>";
        }
    }
}
?>
