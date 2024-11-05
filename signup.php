<?php
session_start();
require 'config.php';

$message = ""; // Initialize an empty message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role']; // This could be "admin" or "standard_user"
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    try {
        $sql = "INSERT INTO users (role, name, surname, username, email, password) VALUES (:role, :name, :surname, :username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            $message = "Registration Complete"; // Success message
        } else {
            $message = "Error: Could not execute the query."; // Error message
        }
    } catch (PDOException $e) {
        $message = "Error: User may already exist."; // Simplified error message for duplicate entries
    }
    $conn = null;
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
    <div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>
    <div id="popupCard" class="popup-card hidden">
        <div class="popup-content">
            <p id="popupMessage"><?php echo $message; ?></p>
            <button onclick="closePopup()">Close</button>
        </div>
    </div>

    <div class="container">
        <div class="left-side">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 654 798" class="svg-bg">
                <path d="M-2.7785 797.026L653.624 796.775L391.67 0.411015L-2.40284 0.561889L-2.7785 797.026Z" fill="#262739"/>
            </svg>
        </div>

        <div class="right-side">
            <h1 class="BrandName">QuickHome Real Estate</h1>
            <form action="signup.php" method="post">
                <select id="role" name="role" required>
                    <option value="" disabled selected>Select user type</option>
                    <option value="standard_user">Standard User</option>
                    <option value="admin">Admin</option>
                </select>

                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                <input type="text" id="surname" name="surname" placeholder="Enter your surname" required>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
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
        function showPopup(message) {
            document.getElementById("popupMessage").textContent = message;
            document.getElementById("popupCard").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popupCard").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        function togglePassword() {
            var passwordField = document.getElementById('password');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }

        <?php if (!empty($message)) : ?>
            showPopup("<?php echo $message; ?>");
        <?php endif; ?>
    </script>
</body>
</html>
