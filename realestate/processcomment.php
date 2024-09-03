<?php
include 'config.php'; // Include the database connection configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user information from session or use a hidden form field for UserID
    $userID = $_POST['UserID']; // Use session variable or form input for UserID
    $listingID = $_POST['ListingID']; // Get the ListingID from the form input
    $commentText = $_POST['CommentText']; // Get the comment text from the form input

    // Validate the input
    if (!empty($userID) && !empty($listingID) && !empty($commentText)) {
        try {
            // Insert the comment into the Comments table
            $sql = "INSERT INTO Comments (UserID, ListingID, CommentText, Date) VALUES (:userID, :listingID, :commentText, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':userID' => $userID,
                ':listingID' => $listingID,
                ':commentText' => $commentText
            ]);

            echo "Comment added successfully!";
        } catch (PDOException $e) {
            echo "Error adding comment: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
?>

