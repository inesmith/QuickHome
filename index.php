<?php
session_start();
require 'config.php'; // Include the database configuration

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - QuickHome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navigation.php'; ?> <!-- Include the navigation header -->

    <!-- Hero Image Section -->
    <div class="hero" style="display: flex; justify-content: center; align-items: center; margin-top: 300px; flex-direction: column; border-radius: 5px">
        <!-- Hero Block -->
            <img src="images/pexels-scottwebb-1029599.jpg" style="height: 600px; width: auto; cursor: pointer; border-radius: 10px; border: 30px solid #262739;">  
            <div style="width: 1165px; height: 100px; background-color: #262739; margin: -15px auto; display: flex; justify-content: center; align-items: center; border-radius: 10px;">
            <div class="filter-bar-inner" style="display: flex; width: 95%; margin-top: -50px">
                    <input type="text" class="search-input" placeholder="Search for a City, Suburb, etc." style="flex: 1; ; border: none; border-radius: 5px; margin-right: 10px;" />
                    <button class="search-button" style="background-color: #8EC546; border: none; padding: 10px; border-radius: 5px; cursor: pointer; color: white; height:36px"><i class="fas fa-search"></i></button>
                </div>
            </div>


            <!-- Filter Options -->
            <div class="filter-options" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center; width: 100%; ">
                <select class="filter-dropdown" style="background-color: white; border: 1px solid #ddd; ; border-radius: 7px; cursor: pointer; margin-top: -40px; height: 40px; margin-left: -50px; width: 160px">
                    <option value="">Property Type</option>
                    <option value="Apartment">Apartment</option>
                    <option value="House">House</option>
                    <option value="Flat">Flat</option>
                    <option value="Condo">Condo</option>
                </select>
                <select class="filter-dropdown" style="background-color: white; border: 1px solid #ddd; padding: 10px 20px; border-radius: 7px; cursor: pointer; margin-top: -40px; height: 40px; margin-left: 0px; width: 160px">
                    <option value="">Minimum Price</option>
                    <option value="50000">$50,000</option>
                    <option value="100000">$100,000</option>
                    <option value="200000">$200,000</option>
                </select>
                <select class="filter-dropdown" style="background-color: white; border: 1px solid #ddd; padding: 10px 20px; border-radius: 7px; cursor: pointer;margin-top: -40px; height: 40px; margin-left: 0px; width: 160px">
                    <option value="">Maximum Price</option>
                    <option value="300000">$300,000</option>
                    <option value="500000">$500,000</option>
                    <option value="1000000">$1,000,000</option>
                </select>
                <select class="filter-dropdown" style="background-color: white; border: 1px solid #ddd; padding: 10px 20px; border-radius: 7px; cursor: pointer;margin-top: -40px; height: 40px; margin-left: 0px; width: 160px">
                    <option value="">Bedrooms</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                </select>
                <button class="filter-more" style="background-color: white; border: 1px solid #ddd; padding: 10px 20px; border-radius: 7px; cursor: pointer; margin-top: -40px; height: 40px; margin-left: 0px; width: 160px">More Filters &#9662;</button>
                <button class="clear-button" style="color: white; border: #8EC546; padding: 10px 20px; border-radius: 7px; cursor: pointer; margin-top: -40px; height: 40px; margin-left: 0px; width: 160px"><i class="fas fa-times"></i> Clear All</button>
            </div>
            <a href="properties.php" class="btn-user" style="width: 160px ;margin: 50px; justify-content: center; align-items: center;"> Properties</a>

        </div>
    </div>
</body>
</html>
