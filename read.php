<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["user"] = $user["id"]; // You can store more information in session as needed
            echo "Login successful!";
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "User not found. Please register.";
    }

    $stmt->close();
}
$conn->close();
?>
