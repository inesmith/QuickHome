<?php 
    session_start(); // Start the session

    // Check if the session variable 'username' is set
    if(!isset($_SESSION['username'])){
        header("Location: login.php"); // Redirect to login page
        exit(); // Terminate the script to ensure redirection
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php include 'nav.php'; ?> <!-- This imports the navbar -->
    
    <!-- Display the welcome message with the username stored in session -->
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is the home page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>

