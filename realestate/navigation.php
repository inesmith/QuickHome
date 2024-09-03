<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
    // Get the current page name
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <nav class="navbar">
        <div class="navbar-logo">
            <!-- Replace button with an image for the brand logo -->
            <a href="index.php">
                <img src="images/Untitled-43.png" alt="Brand Logo" style="height: 45px; width: 45px; cursor: pointer; margin-right: 20px; margin-top: 5px">
            </a>
        </div>
        <ul class="navbar-links">
            <!-- Add 'active' class dynamically based on the current page -->
            <li><a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>"><i class="fas fa-home"></i> Home </a></li>
            <li><a href="properties.php" class="<?php echo ($current_page == 'properties.php') ? 'active' : ''; ?>"><i class="fas fa-building"></i> Properties </a></li>
            <!-- Add more links as needed -->
        </ul>
        <div class="navbar-user">
            <!-- Change button to a link to the profile page -->
            <a href="profilepage.php" class="btn-user"><i class="fas fa-user" style="padding-right: 10px"></i> Jane Doe <i class="fas fa-chevron-down"></i></a>
        </div>
    </nav>
</body>
</html>
