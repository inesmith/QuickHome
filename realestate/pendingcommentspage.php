<?php
session_start(); // Start session for user authentication

require 'config.php'; // Include database configuration

// Fetch pending flagged comments from the database
$sql = "SELECT * FROM comments WHERE status = 'flagged'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Comments</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #2c2c3e;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar a:hover {
            background-color: #8EC546;
        }

        .sidebar a.active {
            background-color: #8EC546;
        }

        .content {
            margin-left: 220px; /* Margin left to make space for sidebar */
            padding: 20px;
        }

        .comment-card {
            background-color: #d3d3d3;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .comment-info {
            display: flex;
            flex-direction: column;
        }

        .comment-actions {
            display: flex;
            gap: 10px;
        }

        .approve-btn {
            background-color: #8EC546;
            border: none;
            padding: 10px 20px;
            color: white;
            border-radius: 20px;
            cursor: pointer;
        }

        .decline-btn {
            background-color: #fff;
            border: 1px solid #8EC546;
            padding: 10px 20px;
            color: #2c2c3e;
            border-radius: 20px;
            cursor: pointer;
        }

        .approve-btn:hover {
            background-color: #76a83e;
        }

        .decline-btn:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="home.php"><i class="fas fa-home"></i> Home</a>
        <a href="new_properties.php"><i class="fas fa-building"></i> New Properties</a>
        <a href="pending_comments.php" class="active"><i class="fas fa-comments"></i> Flagged Comments</a>
    </div>

    <div class="content">
        <h1>Pending Flagged Comments</h1>
        
        <!-- Display each flagged comment -->
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="comment-card">
                <div class="comment-info">
                    <p><strong>Username:</strong> <?php echo htmlspecialchars($row['username']); ?></p>
                    <p><?php echo htmlspecialchars($row['comment_text']); ?></p>
                    <p><strong>Comment ID:</strong> <?php echo $row['comment_id']; ?> <strong>Date:</strong> <?php echo $row['date']; ?></p>
                </div>
                <div class="comment-actions">
                    <form action="process_comment.php" method="post">
                        <input type="hidden" name="comment_id" value="<?php echo $row['comment_id']; ?>">
                        <button type="submit" name="action" value="approve" class="approve-btn">✔ Approve</button>
                        <button type="submit" name="action" value="decline" class="decline-btn">✖ Decline</button>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
