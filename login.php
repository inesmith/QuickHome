<?php 
session_start(); // Start the session
require 'config.php'; // Include the config file for database connection

// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ensure the username and password are provided and not empty
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        // Check if fields are empty
        if (empty($username) || empty($password)) {
            echo "Please fill in both fields.";
        } else {
            // SQL query to find the user by username 
            $sql = "SELECT * FROM users WHERE username = ?";
            
            // Prepare the SQL statement
            if ($stmt = $conn->prepare($sql)) {
                // Bind the username to the SQL statement
                $stmt->bind_param("s", $username);
                
                // Execute the SQL statement
                $stmt->execute();
                
                // Store the result in the 'result' variable
                $result = $stmt->get_result();
                
                // Check if user exists
                if ($result->num_rows > 0) {
                    // Fetch user data
                    $user = $result->fetch_assoc();
                    
                    // Check if the password is not null
                    if (isset($user['password']) && !is_null($user['password'])) {
                        // Verify the input password with the hashed password stored in the database
                        if (password_verify($password, $user['password'])) {
                            // Password is correct, store user information in session
                            $_SESSION['username'] = htmlspecialchars($user['username']);

                            // Redirect to home page
                            header("Location: home.php");
                            exit();
                        } else {
                            echo "Invalid username or password."; // Invalid password
                        }
                    } else {
                        echo "Invalid username or password."; // No password set for the user
                    }
                } else {
                    echo "Invalid username or password."; // User not found
                }
                
                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing SQL statement.";
            }
        }
    } else {
        echo "Please fill in both fields.";
    }

    // Close the database connection
    $conn->close(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                
                <p class="login-link">Not registered yet? <a href="signup.php">Sign Up</a></p>
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
