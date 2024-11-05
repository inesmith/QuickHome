<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <!-- Sidebar Navigation -->
    <?php include 'adminNav.php'; ?> <!-- Include the sidebar here -->

    <!-- Main Content for New Properties -->
    <main class="main-content">
        <section class="property-section">
            <h1 style="margin-top: 20px; margin-left: 30px">Pending Property Listings</h1>
            <div class="property-card">
            <div class="property-header">
    <div class="image-container">
        <img src="property.image" alt="Property Image" class="property-image">
    </div>
    <div class="property-info">
        <h3 style="margin-top: 20px; font-weight: normal; margin-bottom: 5px">Modern Riversands Flat</h3>
        <p style="margin-bottom: 30px">Apartment / Flat</p>
        <p style="margin-bottom: 30px; font-weight: bold">22 Century Boulevard, Riversands, Johannesburg, 1684</p>
        <p style="margin-bottom: 30px; font-size: 15px; width: 560px">Modern bedroom with en-suite bathroom available in two-bedroom apartment. Are you looking for a vibrant living experience in the heart of Riversands?</p>
    </div>
</div>


                <div class="property-details">
                    <div class="detail-block">
                        <div class="exterior-card">
                            <h3 class="card-title">Exterior</h3>
                            <div class="lot-size">
                                <p class="lot-label">Lot Size</p>
                                <div class="lot-value">
                                    <span class="lot-number">12,105</span>
                                    <span class="lot-unit">square meters</span>
                                </div>
                            </div>
                            <h4 class="exterior-spaces-title">Exterior Spaces</h4>
                            <div class="exterior-space">
                                <span class="space-count">1</span>
                                <img src="icons/directions_car.png" alt="Parking Icon" class="space-icon">
                                <span class="space-label">Parking Spaces</span>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">0</span>
                                <img src="icons/deceased.png" alt="Garden Icon" class="space-icon">
                                <span class="space-label">Gardens</span>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">0</span>
                                <img src="icons/deck.png" alt="Patio Icon" class="space-icon">
                                <span class="space-label">Patio / Deck</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="detail-block">
                        <div class="exterior-card2">
                            <h3 class="card-title">Interior</h3>
                            <div class="lot-size">
                                <p class="lot-label">Total Floors</p>
                                <div class="lot-value">
                                    <span class="lot-number">2</span>
                                    <span class="lot-unit" style="height: 30px; align-content: center; width: 95px">floor(s)</span>
                                </div>
                            </div>
                            <div class="lot-size">
                                <p class="lot-label">Floor Size</p>
                                <div class="lot-value">
                                    <span class="lot-number">105</span>
                                    <span class="lot-unit">square meters</span>
                                </div>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">2</span>
                                <img src="icons/bed.png" alt="Bed Icon" class="space-icon">
                                <span class="space-label">Bedrooms</span>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">1</span>
                                <img src="icons/shower.png" alt="Bathroom Icon" class="space-icon">
                                <span class="space-label">Bathrooms</span>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">1</span>
                                <img src="icons/oven_gen.png" alt="Kitchen Icon" class="space-icon">
                                <span class="space-label">Kitchens</span>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">1</span>
                                <img src="icons/restaurant.png" alt="Dining Room Icon" class="space-icon">
                                <span class="space-label">Diningrooms</span>
                            </div>
                            <div class="exterior-space">
                                <span class="space-count">1</span>
                                <img src="icons/foundation.png" alt="Basement Icon" class="space-icon">
                                <span class="space-label">Basements</span>
                            </div>
                        </div>
                    </div>

                    <div class="detail-block">
                        <div class="pricing-card">
                            <h3 class="card-title" style="margin-top: 0px; margin-left: 5px">Pricing</h3>
                            <div class="lot-size">
                                <div class="lot-value" style="background-color: #8ec546; width: 180px; margin-left: 5px; height: 40px">
                                    <img src="icons/currency_exchange.png" alt="Currency Icon" class="space-icon" style="margin-left: 40px">
                                    <span class="lot-unit" style="color: white;">To Rent</span>
                                </div>
                            </div>
                            <div class="lot-value" style="background-color: #d1d5db; margin-left: 5px; width: 180px;" >
                                <span class="lot-number" style="margin-left: 5px; height: 30px; align-content: center; width: 180px;">R 6500</span>
                                <span class="lot-unit" style="margin-left: -125px; color: #2c2c3e;">per month</span>
                            </div>
                        </div>
                    </div>
                    <!-- Features Section -->
                    <div class="features-card">
    <button class="learn-more-btn">Learn More</button>
    <div class="features-content">
        <h2>Features</h2>
        <div class="feature-category">
            <h3>Interior</h3>
            <p><img src="icons/nest_remote_comfort_sensor.png" alt="Wifi Icon" class="feature-icon"> Wifi / Internet</p>
        </div>
        <div class="feature-category">
            <h3>Exterior / Community</h3>
            <p><img src="icons/fence.png" alt="Gated Community Icon" class="feature-icon"> Gated Community</p>
            <p><img src="icons/garden_cart.png" alt="Garden Services Icon" class="feature-icon"> Garden Services</p>
            <p><img src="icons/pool.png" alt="Pool Access Icon" class="feature-icon"> Pool Access</p>
            <p><img src="icons/exercise.png" alt="Fitness Centre Icon" class="feature-icon"> Fitness Centre</p>
        </div>
    </div>
    <div class="action-buttonsP">
        <button class="approve-btnP">Approve</button>
        <button class="decline-btnP">Decline</button>
    </div>
</div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
