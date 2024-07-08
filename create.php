<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $department = $_POST["department"];
    $place = $_POST["place"];
    $planning = $_POST["planning"];
    $family_size = $_POST["family_size"];

    $sql = "INSERT INTO users (name, email, password, department, place, planning, family_size) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $email, $password, $department, $place, $planning, $family_size);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
