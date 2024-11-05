<?php
include 'config.php';

$property_id = $_GET['id']; // Get property ID from URL
$sql = "SELECT * FROM properties WHERE property_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $property_id]);
$property = $stmt->fetch(PDO::FETCH_ASSOC);

if ($property) {
    echo "<h1>" . $property['property_name'] . "</h1>";
    echo "<p>Address: " . $property['address'] . "</p>";
    echo "<p>Type: " . $property['property_type'] . "</p>";
    echo "<p>Price: " . $property['price'] . "</p>";
    // Add more details as needed
} else {
    echo "Property not found.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navigation.php'; ?>

    <div class="listing-detail">
        <h1><?php echo htmlspecialchars($row['property_name']); ?></h1>
        <p>Type: <?php echo htmlspecialchars($row['property_type']); ?></p>
        <p>Price: $<?php echo number_format($row['price']); ?></p>
        <p>Bedrooms: <?php echo $row['bedrooms']; ?></p>
        <p>Location: <?php echo htmlspecialchars($row['city']) . ", " . htmlspecialchars($row['suburb']); ?></p>
        <!-- Add more details as needed -->
    </div>
</body>
</html>
