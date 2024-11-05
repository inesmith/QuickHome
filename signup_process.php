<?php
include 'config.php'; // Include your DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt the password
    $role = $_POST['role']; // Get the selected user role

    // Insert user data into the database
    $sql = "INSERT INTO users (name, surname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $surname, $username, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
        // Redirect to the login page or any other page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
