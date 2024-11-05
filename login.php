<?php 
session_start();
require 'config.php';

// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ""; // Initialize message variable

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

        if ($user && isset($user['Password']) && password_verify($password, $user['Password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect to the homepage or user dashboard
            header("Location: index.php");
            exit;
        } else {
            $message = "Invalid username or password. Please try again";
        }
        
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
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

<!-- Pop-up Message Box HTML -->
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>
<div id="popupCard" class="popup-card hidden">
    <div class="popup-content">
        <p id="popupMessage">Message goes here</p>
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

    <form action="login.php" method="post">
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            
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

// Display the message if it exists
<?php if (!empty($message)): ?>
    showPopup("<?php echo addslashes($message); ?>");
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
</style>

</body>
</html>
