<?php 
session_start(); // Starts or resumes a session.
require 'config.php'; // Includes the config file for database connection.

// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request method is POST, which indicates that the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get values of user input from form
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Debugging: Print the hashed password (remove this in production)
    // echo "Hashed Password: " . $hashedPassword; 

    // Define the SQL query to insert the user's details into the users table
    $sql = "INSERT INTO users (name, surname, username, email, password) VALUES (?, ?, ?, ?, ?)";

    // Prepare the SQL statement for execution
    $stmt = $conn->prepare($sql);

    // Add the values of the user's input into the SQL statement
    $stmt->bind_param("sssss", $name, $surname, $username, $email, $hashedPassword);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Registration Complete"; // If execution is successful, display a success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // If there is an error, display the error message
    }
    
    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 654 798" class="svg-bg">
                <path d="M-2.7785 797.026L653.624 796.775L391.67 0.411015L-2.40284 0.561889L-2.7785 797.026Z" fill="#262739"/>
            </svg>
        </div>

        <div class="right-side">
            <h1 class="BrandName">Brand Name</h1>
            <form action="signup.php" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                <label for="surname">Surname</label>
                <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
                
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <div class="show-password">
                    <input type="checkbox" id="show-password" onclick="togglePassword()">
                    <label for="show-password">Show Password</label>
                </div>
                
                <button type="submit" class="sign-up-btn">Sign Up</button>
                
                <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById('password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }
    </script>
</body>
</html>
