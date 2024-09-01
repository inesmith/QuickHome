<?php
require 'config.php'; // Include your database configuration file

// Fetch all properties from the database
$sql = "SELECT * FROM properties";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='property-result'>";
        echo "<h3>" . htmlspecialchars($row['property_name']) . "</h3>";
        echo "<p>Type: " . htmlspecialchars($row['property_type']) . "</p>";
        echo "<p>Price: $" . number_format($row['price']) . "</p>";
        echo "<p>Bedrooms: " . $row['bedrooms'] . "</p>";
        echo "<p>Location: " . htmlspecialchars($row['city']) . ", " . htmlspecialchars($row['suburb']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No properties found.</p>";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Search and Filters</title>
    <link rel="stylesheet" href="style.css">
    <!-- Include FontAwesome for icons (ensure you have internet connection or download the library locally) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="bar">
        
        <div class="filter-bar">
            <div class="filter-options">
                <button class="filter-button active">For Sale &#9662;</button>
                <input type="text" class="search-input" placeholder="Search for a City, Suburb, etc." id="searchInput">
                <button class="search-button" onclick="applyFilters()"><i class="fas fa-search"></i></button>
            </div>
            <div class="filter-dropdowns">
                <select class="dropdown-button" id="propertyType">
                    <option value="">Property Type</option>
                    <option value="Apartment">Apartment</option>
                    <option value="House">House</option>
                    <option value="Flat">Flat</option>
                    <option value="Condo">Condo</option>
                </select>
                <select class="dropdown-button" id="minPrice">
                    <option value="">Minimum Price</option>
                    <option value="50000">$50,000</option>
                    <option value="100000">$100,000</option>
                    <option value="200000">$200,000</option>
                </select>
                <select class="dropdown-button" id="maxPrice">
                    <option value="">Maximum Price</option>
                    <option value="300000">$300,000</option>
                    <option value="500000">$500,000</option>
                    <option value="1000000">$1,000,000</option>
                </select>
                <select class="dropdown-button" id="bedrooms">
                    <option value="">Bedrooms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                </select>
                <button class="dropdown-button">More Filters &#9662;</button>
                <button class="clear-button" onclick="clearFilters()"><i class="fas fa-times"></i> Clear All</button>
            </div>
        </div>
    </div>

    <!-- Container to display the filtered results -->
    <div id="resultsContainer"></div>

    <!-- JavaScript for dropdown functionality and filtering -->
    <script>
        function applyFilters() {
            // Get filter values
            const searchQuery = document.getElementById('searchInput').value;
            const propertyType = document.getElementById('propertyType').value;
            const minPrice = document.getElementById('minPrice').value;
            const maxPrice = document.getElementById('maxPrice').value;
            const bedrooms = document.getElementById('bedrooms').value;

            // Send an AJAX request to the server with the filter values
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `filter_properties.php?search=${searchQuery}&propertyType=${propertyType}&minPrice=${minPrice}&maxPrice=${maxPrice}&bedrooms=${bedrooms}`, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('resultsContainer').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function clearFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('propertyType').value = '';
            document.getElementById('minPrice').value = '';
            document.getElementById('maxPrice').value = '';
            document.getElementById('bedrooms').value = '';
            document.getElementById('resultsContainer').innerHTML = '';
        }
    </script>
</body>
</html>