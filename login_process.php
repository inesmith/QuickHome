<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on user role
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
            echo "<script>showPopup('Invalid password!');</script>";
        }
    } else {
        echo "<script>showPopup('No user found with this username!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
