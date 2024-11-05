<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_name = $_POST['property_name'];
    $address = $_POST['address'];
    $property_type = $_POST['property_type'];
    $price = $_POST['price'];
    $bedrooms = $_POST['bedrooms'];
    $city = $_POST['city'];
    $suburb = $_POST['suburb'];
    $description = $_POST['description'];
    $agent_id = $_POST['agent_id']; // Assuming this is included

    $sql = "INSERT INTO properties (property_name, address, property_type, price, bedrooms, city, suburb, description, agent_id, created_at) 
            VALUES (:property_name, :address, :property_type, :price, :bedrooms, :city, :suburb, :description, :agent_id, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':property_name' => $property_name,
        ':address' => $address,
        ':property_type' => $property_type,
        ':price' => $price,
        ':bedrooms' => $bedrooms,
        ':city' => $city,
        ':suburb' => $suburb,
        ':description' => $description,
        ':agent_id' => $agent_id
    ]);

    echo "Property listing created successfully!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Listings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?> <!-- Include the navigation header -->
    <div class="content">
        <h1>Create New Property Listing</h1>
        <form action="createlisting.php" method="POST">
            <!-- Form fields for property details -->
            <!-- Add input fields similar to the original create listing page -->
            <button type="submit" class="submit-btn">Submit for Review</button>
        </form>
    </div>
</body>
</html>
