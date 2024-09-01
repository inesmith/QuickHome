<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Listings</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'navigation.php'; ?> <!-- This imports the navbar -->

    <div class="content">
        <h1>New Properties</h1>
        <button class="submit-btn">Submit for Review</button>
        <div class="form-container">
            <div class="section property-details">
                <h2>Property Details</h2>
                <label for="property-title">Property Title</label>
                <input type="text" id="property-title" name="property-title" placeholder="Property Title">
    
                 <label for="property-description">Property Description</label>
                 <textarea id="property-description" name="property-description" placeholder="Property Description ..."></textarea>
    
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Address">
    
                <label for="property-type">Property Type</label>
                 <select id="property-type" name="property-type">
                    <option value="apartment">Apartment</option>
                    <option value="flat">Flat</option>
                </select>
    
                <label for="available-from">Available From</label>
                <input type="date" id="available-from" name="available-from">
            </div>

            
            <div class="section interior">
                <h2>Interior</h2>
                <label for="total-floors">Total Floors</label>
                <input type="number" id="total-floors" name="total-floors" placeholder="2">

                <label for="floor-size">Floor Size</label>
                <input type="number" id="floor-size" name="floor-size" placeholder="105">

                <label for="rooms">Rooms</label>
                <input type="number" id="rooms" name="rooms" placeholder="2">
            </div>

            <div class="section interior">
                <h2>Interior</h2>
                <label for="total-floors">Total Floors</label>
                <input type="number" id="total-floors" name="total-floors" placeholder="2">

                <label for="floor-size">Floor Size</label>
                <input type="number" id="floor-size" name="floor-size" placeholder="105">

                <label for="rooms">Rooms</label>
                <input type="number" id="rooms" name="rooms" placeholder="2">
            </div>
            
            <div class="section exterior">
                <h2>Exterior</h2>
                <label for="lot-size">Lot Size</label>
                <input type="number" id="lot-size" name="lot-size" placeholder="12105">
                
                <label for="exterior-spaces">Exterior Spaces</label>
                <input type="number" id="exterior-spaces" name="exterior-spaces" placeholder="1">
            </div>
            
            <div class="section imagery">
                <h2>Imagery</h2>
                <!-- Imagery upload functionality here -->
            </div>
        </div>
        
    </div>
</body>
</html>