<?php
include 'config.php'; // Include your DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Start session and set session variables
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect users based on their role
            switch ($user['role']) {
                case 'admin':
                    header("Location: admin_dashboard.php");
                    break;
                case 'agency':
                    header("Location: agency_dashboard.php");
                    break;
                case 'standard_user':
                default:
                    header("Location: user_dashboard.php");
                    break;
            }
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this username!";
    }

    $stmt->close();
    $conn->close();
}
?>
