<?php 
session_start(); // Starts or resumes a session.
require 'config.php'; // Includes the config file for database connection.

// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the request method is POST, which indicates that the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get values of user input from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Define the SQL query to select the user's details from the users table
        $sql = "SELECT * FROM users WHERE username = :username";

        // Prepare the SQL statement for execution
        $stmt = $conn->prepare($sql);

        // Bind the value of the user's input to the SQL statement
        $stmt->bindParam(':username', $username);

        // Execute the prepared statement
        $stmt->execute();

        // Fetch the user's details from the database
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debugging: Check if the user was fetched
        if (!$user) {
            echo "User not found. Debugging info: ";
            var_dump($stmt->errorInfo());
        } else {
            // Debugging: Print out fetched user details
            echo "Fetched User: ";
            var_dump($user);

            // Debugging: Print entered password and hashed password from DB
            echo "Entered Password: " . $password . "<br>";
            echo "Hashed Password from DB: " . $user['Password'] . "<br>";

            // Check if the password is correct
            if (isset($user['Password']) && password_verify($password, $user['Password'])) {
                // Set session variables
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect to the homepage or user dashboard
                header("Location: index.php"); // Changed to redirect to index.php
                exit;
            } else {
                echo "Invalid username or password."; // If credentials are incorrect, display an error message
            }
        }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // If there is a PDOException, display the error message
    }
    
    // Close the database connection
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
            <h1 class="BrandName">QuickHome Real Estate</h1>
            <form action="login.php" method="post">

                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <div class="show-password">
                    <input type="checkbox" id="show-password" onclick="togglePassword()">
                    <label for="show-password">Show Password</label>
                </div>
 
                <button type="submit" class="login-btn">Log In</button>
                
                <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
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
