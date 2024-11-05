<?php 
session_start();
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ""; // Initialize an empty message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'];
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
            $message = "Registration Complete"; // Set success message
        } else {
            $message = "Error: Could not execute the query."; // Set error message
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry error code
            $message = "User already exists, try logging in.";
        } else {
            $message = "Error: " . addslashes($e->getMessage()); // Set error message with exception details
        }
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

<!-- Pop-up Message Box HTML -->
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>
<div id="popupCard" class="popup-card hidden">
    <div class="popup-content">
        <p id="popupMessage">Message goes here</p>
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<!-- Main Sign Up Form -->
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
                <option value="agency">Agency</option>
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

<!-- JavaScript for Pop-up Functionality -->
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

// Show pop-up if there's a message from the server-side PHP
<?php if (!empty($message)) : ?>
    showPopup("<?php echo $message; ?>");
<?php endif; ?>
</script>

<!-- Pop-up Card Styling -->
<style>
.popup-card {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    padding: 20px;
    background-color: white;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
    border-radius: 8px;
    text-align: center;
    z-index: 1000;
    display: none;
}

.popup-content p {
    font-size: 1rem;
    color: #333;
    margin-bottom: 20px;
}

.popup-content button {
    padding: 10px 20px;
    font-size: 1rem;
    color: white;
    background-color: #8EC546;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.popup-content button:hover {
    background-color: #76b03f;
}

/* Style for the select dropdown to match input placeholders */
select#role {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #8ec546;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 13px;
    color: #8ec546;
    appearance: none;
    background-color: white;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2210%22 height=%2210%22 viewBox=%220 0 24 24%22><path fill=%22gray%22 d=%22M7 10l5 5 5-5H7z%22/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px top 50%;
    background-size: 12px;
}

select#role option {
    color: #333;
}
</style>

</body>
</html>
