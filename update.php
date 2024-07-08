<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $department = $_POST["department"];
    $place = $_POST["place"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET name = ?, department = ?, place = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $department, $place, $email, $id);

    if ($stmt->execute()) {
        echo "User updated successfully!";
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
