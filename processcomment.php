<?php
require 'config.php'; // Include database configuration

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment_id = $_POST['comment_id'];
    $action = $_POST['action'];

    if ($action === 'approve') {
        // Approve the comment
        $sql = "UPDATE comments SET status = 'approved' WHERE comment_id = ?";
    } elseif ($action === 'decline') {
        // Decline the comment
        $sql = "UPDATE comments SET status = 'declined' WHERE comment_id = ?";
    } else {
        die("Invalid action.");
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);

    if ($stmt->execute()) {
        // Redirect back to the pending comments page
        header("Location: pending_comments.php");
        exit();
    } else {
        echo "Error updating comment: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
